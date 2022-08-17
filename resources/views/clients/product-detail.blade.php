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
              <a class="" href="#">
                <span>size</span>: {{ isset($product->size) ? $product->size->name : '' }}</a>
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
              @foreach($comments as $comment)
              <div class="review_item">
                <div class="media">
                  @if(isset($comment->user->avatar))
                  <div class="d-flex">
                    <img src="{{asset($comment->user->avatar)}}" style="width: 60px; height: 60px; border-radius: 50%" alt="" />
                  </div>
                  @else
                  <div class="d-flex">
                    <img src="{{asset('img/avatar7.png')}}" style="width: 60px; height: 60px; border-radius: 50%" alt="" />
                  </div>
                  @endif
                  <div class="media-body">
                    <h4>{{$comment->user->name}}</h4>
                    <h5 style="padding-left: 20px;">{{$comment->created_at}}</h5>
                    <!-- <a class="reply_btn" href="#">Reply</a> -->
                  </div>
                </div>
                <p>
                  {{$comment->content}}
                </p>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Đăng bình luận</h4>
              @if(Auth::user())
              <form class="row contact_form" action="{{route('comment', $product->id)}}" method="post" id="contactForm" novalidate="novalidate">
                @csrf
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="content" id="content" rows="4" placeholder="Message"></textarea>
                    @if ($errors->has('content'))
                    <span class="text-danger">{{$errors->first('content')}}</span>
                    @endif
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn submit_btn">
                    Đăng bình luận
                  </button>
                </div>
              </form>
              @else
              <h3>Bạn cần đăng nhập để thực hiện chức năng này!</h3>
              @endif
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