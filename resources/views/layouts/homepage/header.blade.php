<header id="header" class="">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('public/images/layouts/logo3.png')}}" width="100%" height="100%" /></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-home"></i> Loại Nhà<span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach($loai as $l)
                <li><a href="#"> {{$l->ten}}</a></li>
                @endforeach
            </ul>
          </li>
          <li class=""><a href="#"><i class="glyphicon glyphicon-search"></i> Tìm Kiếm<span class="sr-only">(current)</span></a></li>
          
          @if(Auth::user())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-address-card-o" aria-hidden="true"></i> {{Auth::user()->name}}<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('profile')}}"><i class="glyphicon glyphicon-user"></i> Thông tin</a></li>
              <li><a href="{{route('getPostNews')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Đăng tin</a></li>
              <li><a style="cursor: pointer;" id="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
            </ul>
          </li>
          @else
          <li class=""><a href="{{route('loginUser')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng Nhập<span class="sr-only">(current)</span></a></li>
          <li class=""><a href="{{route('registerUser')}}"><i class="fa fa-user-circle" aria-hidden="true"></i> Đăng Ký<span class="sr-only">(current)</span></a></li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header><!-- /header -->
<div style="height: 55px"></div>