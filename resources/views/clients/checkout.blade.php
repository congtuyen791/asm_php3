@extends('layouts.main')
@section('content-title', 'Thanh toán')
@section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Thanh toán</h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
  <div class="container">
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-12">
          <form class="row contact_form" action="#" method="post" novalidate="novalidate">
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" placeholder="" disabled />
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="number" name="phone" value="{{Auth::user()->phone}}" disabled />
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="email" value="{{Auth::user()->email}}" name="email" disabled />
            </div>
            <!-- @if (Auth::user()->address == null)
            <input type="text">
            @else -->
            <div class="col-md-12 form-group p_star">
              <select class="country_select" disabled>
                <option value="{{Auth::user()->address}}">{{Auth::user()->address}}</option>
              </select>
            </div>
            <!-- @endif -->
            <!-- <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="add1" name="add1" />
              <span class="placeholder" data-placeholder="Address line 01"></span>
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="add2" name="add2" />
              <span class="placeholder" data-placeholder="Address line 02"></span>
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="city" name="city" />
              <span class="placeholder" data-placeholder="Town/City"></span>
            </div> -->
            <!-- <div class="col-md-12 form-group p_star">
              <select class="country_select">
                <option value="1">District</option>
                <option value="2">District</option>
                <option value="4">District</option>
              </select>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />
            </div>
            <div class="col-md-12 form-group">
              <div class="creat_account">
                <input type="checkbox" id="f-option2" name="selector" />
                <label for="f-option2">Tạo một tài khoản?</label>
              </div>
            </div> -->
            <!-- <div class="col-md-12 form-group">
              <div class="creat_account">
                <h3>Chi tiết vận chuyển</h3>
                <input type="checkbox" id="f-option3" name="selector" />
                <label for="f-option3">Gửi đến một địa chỉ khác?</label>
              </div>
              <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
            </div> -->
          </form>
        </div>
        <div class="col-lg-12">
          <div class="order_box">
            <h2>Đơn hàng của bạn</h2>
            <ul class="list">
              <li>
                <a href="#">Sản phẩm
                  <span>Thành tiền</span>
                </a>
              </li>
              @foreach($cart as $cart)
              <li>
                <a href="#">{{$cart->product->name}}
                  <span class="middle">X{{$cart->quantity}}</span>
                  <span class="last">{{$cart->tong_tien}} <sup>đ</sup></span>
                </a>
              </li>
              @endforeach
            </ul>
            <ul class="list list_2">
              <li>
                <a href="#">Tổng tiền
                  <span>{{$tt}} <sup>đ</sup></span>
                </a>
              </li>
            </ul>
            <!-- <div class="creat_account">
              <input type="checkbox" id="f-option4" name="selector" />
              <label for="f-option4">I've read and accept the </label>
              <a href="#">terms & conditions*</a>
            </div> -->
            <a class="main_btn" href="{{route('addOrder', $tt)}}">Đặt hàng</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Checkout Area =================-->

<!--================ start footer Area  =================-->
@endsection