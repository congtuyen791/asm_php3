<header class="header_area">
  <div class="top_menu">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="float-left">
            <p>Phone: +84 0983 358 791</p>
            <p>email: vucongtuyen.hn@gmail.com</p>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="float-right">
            <ul class="right_side">
              <li>
                <a href="{{route('listCart')}}">
                  Giỏ hàng
                </a>
              </li>
              <li>
                <a href="{{route('orderDetail')}}">
                  kiểm tra đơn hàng
                </a>
              </li>
              <li>
                <a href="{{route('contact')}}">
                  Liên hệ với chúng tôi
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main_menu">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light w-100">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand logo_h" href="{{asset('/')}}">
          <img src="{{asset('img/the_gioi_noi_that.png')}}" alt="logo" width="70px" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
          <div class="row w-100 mr-0">
            <div class="col-lg-7 pr-0">
              <ul class="nav navbar-nav center_nav pull-right">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('home')}}">Trang chủ</a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a href="{{route('product')}}" class="nav-link">Sản phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('contact')}}">Liên hệ</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-5 pr-0">
              <ul class="nav navbar-nav navbar-right right_nav pull-right">
                <li class="nav-item">
                  <a href="{{route('listCart')}}" class="icons">
                    <i class="ti-shopping-cart"></i>
                  </a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @if(Auth::check())
                @if(Auth::user()->role == 1)
                <li class="nav-item submenu dropdown mb-3">
                  <a href="#" class="nav-link dropdown-toggle m-b" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a href="{{route('auth.getLogin')}}" class="icons">
                        Trang Admin
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('profile')}}" class="icons">
                        Tài khoản của tôi
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('logout')}}" class="icons">Đăng xuất</a>
                      </a>
                    </li>
                  </ul>
                </li>
                @else
                <li class="nav-item submenu dropdown mb-3">
                  <a href="#" class="nav-link dropdown-toggle m-b" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a href="{{route('profile')}}" class="icons">
                        Tài khoản của tôi
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('logout')}}" class="icons">Đăng xuất</a>
                      </a>
                    </li>
                  </ul>
                </li>
                @endif
                @else
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="ti-user" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a href="{{route('auth.getLogin')}}" class="icons">
                        Đăng nhập</i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('auth.getRegister')}}" class="icons">Đăng ký</a>
                      </a>
                    </li>
                  </ul>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>