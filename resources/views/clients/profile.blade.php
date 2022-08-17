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
                <img src="{{asset(img/avatar7.png)}}" alt="avatar" class="rounded-circle" width="150">
                @else
                <img src="{{asset(Auth::user()->avatar)}}" alt="avatar" class="rounded-circle" width="150">
                @endif
                <div class="mt-3">
                  <h4>{{Auth::user()->name}}</h4>
                  <a href="{{route('getUpdateUserPassword')}}" class="btn btn-outline-primary">Đổi mật khẩu</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <form action="{{route('updateUser', Auth::user()->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-3">Họ và tên</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Ngày sinh</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="date" class="form-control" name="birthday" value="{{Auth::user()->birthday}}">
                    @if ($errors->has('birthday'))
                    <span class="text-danger">{{$errors->first('birthday')}}</span>
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Số điện thoại</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                    @if ($errors->has('phone'))
                    <span class="text-danger">{{$errors->first('phone')}}</span>
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Địa chỉ</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
                    @if ($errors->has('address'))
                    <span class="text-danger">{{$errors->first('address')}}</span>
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Ảnh đại diện</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="hidden" class="form-control" name="avatar" value="{{Auth::user()->avatar}}">
                    <input type="file" class="form-control" name="avatar_up">
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