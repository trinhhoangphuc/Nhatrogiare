<div class="profile-sidebar">                          
	<div class="profile-userpic">                 
		<img src="{{asset('public/images/avatar/'.Auth::user()->avatar)}}" class="img-responsive" alt="Thông tin cá nhân" id="output">
	</div>                                            
	<div class="profile-usertitle">                   
		<div class="profile-usertitle-name">                     
			{{Auth::user()->name}}          
		</div>                  
		<div class="profile-usertitle-job">                      
			Tham gia: {{ date('d/m/Y',strtotime(Auth::user()->created_at)) }}                   
		</div>              
	</div>                                                
	<div class="profile-userbuttons">                 
		<button type="button" class="btn btn-warning btn-sm">Trang chủ</button>
		<button type="button" class="btn btn-default btn-sm">Thoát ra</button>       
	</div>                                            
	<div class="profile-usermenu">                    
		<ul class="nav">                      
			<li class='{{(\Request::path() == "thong-tin") ? "active" : ""}}'>
				<a href="{{route('profile')}}"><i class="glyphicon glyphicon-info-sign"></i>Cập nhật thông tin cá nhân </a>
			</li>                       
			<li class='{{(\Request::path() == "danh-sach") ? "active" : ""}}'>
				<a href="{{route('listnews')}}"><i class="glyphicon glyphicon-heart"></i>Đanh sách tin</a>                     
			</li>                       
			<li>
				<a href="https://hocwebgiare.com/" target="_blank"><i class="fa fa-comment-o" aria-hidden="true"></i> Góp ý</a>                       
			</li>                       
			<li class='{{(\Request::path() == "dang-tin") ? "active" : ""}}'>
				<a href="{{route('getPostNews')}}" class=""><i class="fa fa-upload" aria-hidden="true"></i> Đăng Tin</a>                       
			</li>                   
		</ul>                
	</div>                            
</div> 