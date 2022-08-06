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
                  <a href="{{asset('/cart')}}">
                    Giỏ hàng
                  </a>
                </li>
                <li>
                  <a href="{{asset('/cart')}}">
                    kiểm tra đơn hàng
                  </a>
                </li>
                <li>
                  <a href="{{asset('/contact')}}">
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
            <img src="img/the_gioi_noi_that.png" alt="logo" width="70px"/>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link" href="{{asset('/')}}">Trang chủ</a>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="{{asset('/product')}}" class="nav-link">Sản phẩm</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{asset('/contact')}}">Liên hệ</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{asset('/cart')}}" class="icons">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('auth.getLogin')}}" class="icons">
                      <i class="ti-user" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>