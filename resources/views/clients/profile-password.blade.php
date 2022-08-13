@extends('layouts.main')
@section('content-title', 'Trang cá nhân')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2></h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
          <a href="{{route('home')}}">Trang chủ</a>
          <a href="">Trang cá nhân</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                @if(Auth::user()->avatar == Null)
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                @else
                <img src="{{asset(Auth::user()->avatar)}}" alt="Admin" class="rounded-circle" width="150">
                @endif
                <div class="mt-3">
                  <h4>{{Auth::user()->name}}</h4>
                  <a href="{{route('profile')}}" class="btn btn-outline-primary">Quay lại</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <form action="{{route('updateUserPassword', Auth::user()->id)}}" method="post" autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-3">Mật khẩu mới</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu cũ ..." name="password">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-3">Nhập lại mật khẩu mới</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="password" class="form-control" placeholder="Nhập mật khẩu mới ..." name="password_new">
                    @if ($errors->has('password_new'))
                    <span class="text-danger">{{$errors->first('password_new')}}</span>
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-3">Mật khẩu cũ</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới ..." name="password_new_xn">
                    @if ($errors->has('password_new_xn'))
                    <span class="text-danger">{{$errors->first('password_new_xn')}}</span>
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <button class="btn btn-info" style="width: 50%;">Lưu</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!--================End Product Description Area =================-->

<!--================ start footer Area  =================-->
@endsection