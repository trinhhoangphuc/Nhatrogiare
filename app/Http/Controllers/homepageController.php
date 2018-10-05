<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
Use Hash;
use Validator;
use Auth;
use Mail;
use DB;
use App\User, App\Nha, App\Hinh, App\Loai, App\Tinh;
use Illuminate\Support\MessageBag;
use Illuminate\PHPImageWorkshop\ImageWorkshop;

class homepageController extends Controller
{

	public function getLoginUser(){
		if(Auth::user()){
			return redirect()->intended("trang-chu");
		}else{
			return view('homepage.login');
		}
	}
    public function postLoginUser(Request $request){
    	$rule 		= ['email'=>'required|email', 'password'=>'required'];
    	$messages 	= [
    		'email.required' 	=> 'Vui lòng nhập email',
    		'email.email' 	 	=> 'Email không đúng định dạng',
    		'password.required' => 'Vui lòng nhập mật khẩu',
    	];
    	$validator = Validator::make($request->all(), $rule, $messages);
    	if($validator->fails()){
            return response()->json(['error'=>true, 'message'=>$validator->errors()]);
    	}else{
    		$email = $request->email;
    		$password = $request->password;
    		if(Auth::attempt(['email'=>$email, 'password'=>$password, 'approve'=>1, 'role'=>0])){
    			return response(['error'=>false, 'messages'=>'success'], 200);
    		}else{
    			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return response()->json(['error' => true, 'message' => $errors]);
    		}
    	}
    }

    public function getIndex(){
		$count_view = DB::table("nha")->select("nha.*", "tinh.ten as tinh_ten", "users.avatar as users_hinh", "users.name as users_ten")
					->join("tinh", "tinh.ma", "nha.tinh_ma")
					->join("users", "users.id", "user_ma")
					->where("nha.trangthai", 1)->orderBy("nha.luotxem", "desc")->limit(8)->get();
		$new = DB::table("nha")->select("nha.*", "tinh.ten as tinh_ten", "users.avatar as users_hinh", "users.name as users_ten")
				->join("tinh", "tinh.ma", "nha.tinh_ma")
				->join("users", "users.id", "user_ma")
				->where("nha.trangthai", 1)->orderBy("nha.capnhat", "asc")->limit(8)->get();
		$tinh = DB::table("tinh")->where("trangthai", 1)->get();
		$loai = DB::table("loai")->where("trangthai", 1)->get();
		$max  = DB::table("nha")->max("gia");
		return view("homepage.index", compact("count_view", "new", "tinh", "loai", "max"));
    }

    public function postLogoutUser(Request $request){
        Auth::logout();
        return response(['error'=>false,'message'=>true], 200);
	}
	
	public function getRoomDetail($id){
		$room = Nha::where("ma", $id)->first();
		if($room){
			$room->luotxem += 1;
			$room->save();
			$tinh = DB::table("tinh")->where("ma", $room->tinh_ma)->first();
			$loai = DB::table("loai")->where("ma", $room->loai_ma)->first();
			$hinh = DB::table("hinh")->where("nha_ma", $room->ma)->get();
			$user = DB::table("users")->where("id", $room->user_ma)->first();
			$same_room = DB::table("nha")->select("nha.*", "tinh.ten as tinh_ten", "users.avatar as users_hinh", "users.name as users_ten")
				->join("tinh", "tinh.ma", "nha.tinh_ma")
				->join("users", "users.id", "user_ma")
				->where('nha.loai_ma','=', $room->loai_ma)
				->where('nha.tinh_ma','=', $room->tinh_ma)
				->where('nha.ma','<>', $room->ma)
				->orderBy(DB::raw('RAND()'))->take(6)->get();
			return view("homepage.detail", compact("room", "hinh", "tinh", "loai", "user", "same_room"));
		}else{
			return redirect()->intended("error");
		}
	}
	public function sttHinhMoi($sp_ma){
        $hinhanh = Hinh::where("nha_ma", $sp_ma)->orderBy('stt', 'DESC')->first();
        $stt = !$hinhanh? 0: $hinhanh["stt"];
        return ++$stt;
    }

    public function getPostNews(){
    	if(Auth::user()){
    		$loai = Loai::where("trangthai", 1)->get();
    		$tinh = Tinh::where("trangthai", 1)->get();
    		return view("homepage.post", compact("loai", "tinh"));
    	}else return redirect()->intended("dang-nhap");
    }

    public function getRegister(){
    	if(!Auth::user())
    		return view("homepage.register");
    	else 
    		return redirect()->intended("trang-chu");
    }

    public function postRegisterUser(Request $request){
    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->avatar = "user.png";
    	$user->role = 0;
    	$user->approve = 1;
    	if($user->save()) 
    		return redirect()->intended("dang-nhap")->with("success", "Đăng ký thành công, bạn có thể đăng nhập tài khoản");
    	else
    		return redirect()->back()->with("error", "Đăng ký thất bại vui lòng kiểm tra lại thông tin");
    }
	public function postNews(Request $request){
		$nha = new Nha();
		$nha->tieude 	= 	$request->txttitle;
		$nha->mota 		= 	$request->txtdescription;
		$nha->gia 		= 	$request->txtprice;
		$nha->dientich 	= 	$request->txtarea;
		$nha->luotxem 	= 	0;
		$nha->diachi 	=	$request->txtaddress;
		$nha->dienthoai = 	$request->txtphone;
		$nha->lat 		=	$request->txtlat;
		$nha->lng		=	$request->txtlng;
		$nha->hinh 		= 	"noimg.jpg";
		$nha->user_ma   = 	Auth::user()->id;
		$nha->loai_ma	=	$request->idcategory;
		$nha->tinh_ma	=	$request->iddistrict;
		$nha->trangthai	=	1;
		if($nha->save()){
			if($request->hasFile("hinhanh")){
				$img = $request->file("hinhanh");		
				foreach($img as $item){

					$dirImg  = __DIR__.'\..\..\..\public\images\rooms\\';
		            $pathWM =  $dirImg.'logo4.png';

		            $src= ImageWorkshop::initFromPath($item->getRealPath());
		            $wm = ImageWorkshop::initFromPath($pathWM);
		            $src->resizeInPixel(900, 600, false);
		            $src->addLayerOnTop($wm, 10, 10, "RB");

		            $createFolders = true;
		            $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
		            $imageQuality = 80; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

					$namefile = "nhatrogiare-".rand(100,100000000)."-".$item->getClientOriginalName();
					$order 			= $this->sttHinhMoi($nha->ma);
					$hinh 			= new Hinh();
					$hinh->nha_ma 	= $nha->ma;
					$hinh->stt 		= $order;
					$hinh->ten 		= $namefile;
					$hinh->save();
					$src->save($dirImg, $namefile, $createFolders, $backgroundColor, $imageQuality);
				}
				$hinh = Hinh::where("nha_ma", $nha->ma)->where("stt", 1)->first();
				$nha->hinh = $hinh->ten;
				$nha->save();
			}else{
				$hinh 			= new Hinh();
				$hinh->nha_ma 	= $nha->ma;
				$hinh->stt 		= 1;
				$hinh->ten 		= "noimg.jpg";
				$hinh->save();
			}
			return redirect()->intended("danh-sach")->with("success", "Đăng tin thành công!");
		}else{
			return redirect()->back()->with("error", "Đăng tin thất bại vui lòng kiểm tra thông tin");
		}
	}

	public function getListNews(){
		if(Auth::user()){
			$nha = Nha::where("user_ma", Auth::user()->id)->get();
			return view("homepage.listnews", compact("nha"));
		}else{
			return redirect()->intended("dang-nhap");
		}
	}

	public function changePass(Request $request){
		if(Auth::user()){
			$user = User::where("email", Auth::user()->email)->first();
			if(Hash::check($request->oldpass, $user->password)){
				$user->password = bcrypt($request->newpass);
				$user->save();
				Auth::logout();
				if(Auth::attempt(["email"=>$user->email, "password"=>$request->newpass]))
					return redirect()->back()->with("success", "Đổi mật khẩu thành công");
			}else{
				return redirect()->back()->with("error", "Đổi mật khẩu không thành công");
			}
		}
	}

	public function editInfo(Request $request){
		if(Auth::user()){
			$user = User::where("email", Auth::user()->email)->first();
			if($user){
				if($request->hasFile("avtuser")){
					$img = $request->file("avtuser");
					$name = "avatar-".rand(1000,100000000)."-".$img->getClientOriginalName();
					$user->name = $request->name;
					if($user->avatar == "user.png")
						$user->avatar = $name;
					else{
						unlink(public_path('images/avatar/'.$user->avatar));
						$user->avatar = $name;
					}
					$img->move("public/images/avatar", $name);
					if($user->save())
						return redirect()->back()->with("success", "Cập nhật thông tin thành công");
					else 
						return redirect()->back()->with("error", "Cập nhật thông tin  không thành công");
				}else{
					if($user->save())
						return redirect()->back()->with("success", "Cập nhật thông tin thành công");
					else 
						return redirect()->back()->with("error", "Cập nhật thông tin  không thành công");
				}
			}
		}
	}
}
