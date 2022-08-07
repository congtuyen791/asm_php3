@extends('layouts.main')
@section('content-title', 'Chi tiết sản phẩm')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Thông tin chi tiết sản phẩm</h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
          <a href="{{route('home')}}">Trang chủ</a>
          <a href="{{route('productDetail', $product->id)}}">Chi tiết sản phẩm</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->
<!--================Single Product Area =================-->
<div class="product_image_area">
  <div class="container">
    <div class="row s_product_inner">
      <div class="col-lg-6">
        <div class="s_product_img">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset($product->avatar)}}" alt="First slide" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="s_product_text">
          <h3>{{$product->name}}</h3>
          <h2>{{$product->price}}</h2>
          <ul class="list">
            <li>
              <a class="" href="#">
                <span>Loại</span>: {{ isset($product->category) ? $product->category->name : '' }}</a>
            </li>
            <li>
              @if($product->status == 1)
                <a href="#"> <span>Trạng thái</span>: Còn hàng </a>
              @else
                <a href="#"> <span>Trạng thái</span>: Hết hàng </a>
              @endif
            </li>
          </ul>
          <p>
            Mô tả:
            {{$product->description}}
          </p>
          <div class="product_count">
            <label for="qty">Số lượng:</label>
            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty" />
            <button class="increase items-count" type="button">
              <i class="lnr lnr-chevron-up"></i>
            </button>
            <button class="reduced items-count" type="button">
              <i class="lnr lnr-chevron-down"></i>
            </button>
          </div>
          <div class="card_area">
            <a class="main_btn" href="{{route('addCart', $product->id)}}">Thêm vào giỏ hàng</a>
            <a class="icon_btn" href="#">
              <i class="lnr lnr lnr-diamond"></i>
            </a>
            <a class="icon_btn" href="#">
              <i class="lnr lnr lnr-heart"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Bình luận</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="comment_list">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/single-product/review-1.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item reply">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/single-product/review-2.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/single-product/review-3.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2017 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Đăng bình luận</h4>
              <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn submit_btn">
                    Submit Now
                  </button>
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