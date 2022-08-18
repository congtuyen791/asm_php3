@extends('layouts.main')
@section('content-title', 'Giỏ hàng')
@section('content')

<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Giỏ hàng</h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
          <a href="{{route('home')}}">Trang chủ</a>
          <a href="{{route('listCart')}}">cart</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        @if(Auth::user())
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cart as $item)
            <tr>
              <td>
                <div class="media">
                  <div class="d-flex">
                    <img src="{{asset($item->product->avatar)}}" style="width: 80px; height: 80px" alt="" />
                  </div>
                  <div class="media-body">
                    <p>{{$item->product->name}}</p>
                  </div>
                </div>
              </td>
              <td>
                <h5>{{$item->price}}</h5>
              </td>
              <td>
                <div class="product_count">
                  <input type="text" name="qty" id="sst" maxlength="12" value="{{$item->quantity}}" title="Quantity:" class="input-text qty" />
                  <button class="increase items-count" type="button">
                    <i class="lnr lnr-chevron-up"></i>
                  </button>
                  <button class="reduced items-count" type="button">
                    <i class="lnr lnr-chevron-down"></i>
                  </button>
                </div>
              </td>
              <td>
                <h5>{{$item->tong_tien}}</h5>
              </td>
              <td>
                <h5><a href="{{route('delete', [$item->id])}}"><i class="ti-trash"></i></a></h5>
              </td>
            </tr>
            <input type="hidden" value="{{$tong_tien += ($item->tong_tien)}}">

            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td>
                <h4>Tổng tiền:</h4>
              </td>
              <td>
                <h4>{{$tong_tien}}</h4>
              </td>
            </tr>
            <tr class="out_button_area">
              <td></td>
              <td></td>
              <td></td>
              <td>
                <div class="checkout_btn_inner">
                  <a class="gray_btn" href="{{asset('/product')}}">Tiếp tục mua sắm</a>
                  <a class="main_btn" href="{{route('order', $tong_tien)}}">Thanh toán</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        @else
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center">
              <h3>Bạn cần đăng nhập để xem giỏ hàng!</h3>
            </tr>
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</section>
<!--================End Cart Area =================-->

<!--================ start footer Area  =================-->
@endsection