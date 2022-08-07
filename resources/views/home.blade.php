@extends('layouts.main')
@section('content-title', 'Trang chủ')
@section('content')

<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="col-lg-12">
                    <p class="sub text-uppercase">Thế giới nội thất</p>
                    <h3><span>Thể hiện</span> Phong cách <br />cá nhân <span>của bạn</span></h3>
                    <h4>Phòng khách là không gian chính của ngôi nhà, là nơi sum họp gia đình</h4>
                    <a class="main_btn mt-40" href="{{asset('/product')}}">Xem các sản phẩm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!-- Start feature Area -->
<section class="feature-area section_gap_bottom_custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-money"></i>
                        <h3>Money back gurantee</h3>
                    </a>
                    <p>Shall open divide a one</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-truck"></i>
                        <h3>Free Delivery</h3>
                    </a>
                    <p>Shall open divide a one</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-support"></i>
                        <h3>Alway support</h3>
                    </a>
                    <p>Shall open divide a one</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-blockchain"></i>
                        <h3>Secure payment</h3>
                    </a>
                    <p>Shall open divide a one</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feature Area -->

<!--================ Feature Product Area =================-->
<section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>SẢN PHẨM NỔI BẬT</span></h2>
                    <p>Cập nhật liên tục</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($product as $product)
            <div class="col-lg-4 col-md-6">
                <div class="single-product">
                    <div class="product-img">
                        <img class="img-fluid w-100" src="{{asset($product->avatar)}}" style="width:350px; height:419px" alt="" />
                        <div class="p_icon">
                            <a href="{{route('productDetail', $product->id)}}">
                                <i class="ti-eye"></i>
                            </a>
                            <a href="#">
                                <i class="ti-heart"></i>
                            </a>
                            <a href="{{route('addCart', $product->id)}}">
                                <i class="ti-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-btm">
                        <a href="{{route('productDetail', $product->id)}}" class="d-block">
                            <h4>{{$product->name}}</h4>
                        </a>
                        <div class="mt-3">
                            <span class="mr-4">{{$product->promotion}} <sup>đ</sup></span>
                            <del>{{$product->name}} <sup>đ</sup></del>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Feature Product Area =================-->

<!--================ Offer Area =================-->
<section class="offer_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="offset-lg-4 col-lg-6 text-center">
                <div class="offer_content">
                    <h3 class="text-uppercase mb-40"></h3>
                    <!-- <h2 class="text-uppercase">50% off</h2>
                    <a href="#" class="main_btn mb-20 mt-5">Discover Now</a>
                    <p>Limited Time Offer</p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Offer Area =================-->

<!--================ New Product Area =================-->
<section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Sản phẩm mới</span></h2>
                    <p>những mặt hàng mới về</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
            @foreach($sofa as $item)
                <div class="new_product">
                    <h5 class="text-uppercase">Mẫu Sofa mới nhất 2022</h5>
                    <h3 class="text-uppercase">{{$item->name}}</h3>
                    <div class="product-img">
                        <img class="img-fluid" src="{{asset($item->avatar)}}" style="width: 400px; height:200px;" alt="" />
                    </div>
                    <h4>{{$item->price}} <sup>đ</sup></h4>
                    <a href="{{route('addCart', $product->id)}}" class="main_btn">Add to cart</a>
                </div>
                @endforeach
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="row">
                    @foreach($product_2 as $product)
                    <div class="col-lg-6 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="{{asset($product->avatar)}}" style="width:255px; height:255px" alt="" />
                                <div class="p_icon">
                                    <a href="{{route('productDetail', $product->id)}}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                    <a href="{{route('addCart', $product->id)}}">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="{{route('productDetail', $product->id)}}" class="d-block">
                                    <h4>{{$product->name}}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">{{$product->promotion}} <sup>đ</sup></span>
                                    <del>{{$product->price}} <sup>đ</sup></del>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End New Product Area =================-->

<!--================ Inspired Product Area =================-->
<!--================ End Inspired Product Area =================-->

<!--================ Start Blog Area =================-->
<section class="blog-area section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>BLOG MỚI NHẤT</span></h2>
                    <p>Bring called seed first of third give itself now ment</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{asset('/img/noi-that/ghe-lv-1.jpg')}}" alt="">
                    </div>
                    <div class="short_details">
                        <div class="meta-top d-flex">
                            <a href="#">By Admin</a>
                            <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
                        </div>
                        <a class="d-block" href="single-blog.html">
                            <h4>Ford clever bed stops your sleeping
                                partner hogging the whole</h4>
                        </a>
                        <div class="text-wrap">
                            <p>
                                Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                                Forth.
                            </p>
                        </div>
                        <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{asset('/img/noi-that/ghe-lv-1.jpg')}}" alt="">
                    </div>
                    <div class="short_details">
                        <div class="meta-top d-flex">
                            <a href="#">By Admin</a>
                            <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
                        </div>
                        <a class="d-block" href="single-blog.html">
                            <h4>Ford clever bed stops your sleeping
                                partner hogging the whole</h4>
                        </a>
                        <div class="text-wrap">
                            <p>
                                Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                                Forth.
                            </p>
                        </div>
                        <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{asset('/img/noi-that/ghe-lv-1.jpg')}}" alt="">
                    </div>
                    <div class="short_details">
                        <div class="meta-top d-flex">
                            <a href="#">By Admin</a>
                            <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
                        </div>
                        <a class="d-block" href="single-blog.html">
                            <h4>Ford clever bed stops your sleeping
                                partner hogging the whole</h4>
                        </a>
                        <div class="text-wrap">
                            <p>
                                Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                                Forth.
                            </p>
                        </div>
                        <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection