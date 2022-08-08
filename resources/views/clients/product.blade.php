@extends('layouts.main')
@section('content-title', 'Trang sản phẩm')
@section('content')
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Shop Category</h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
          <a href="{{route('home')}}">Trang chủ</a>
          <a href="{{route('product')}}">Sản phẩm</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="product_top_bar">
          <form action="{{route('searchProduct')}}" class="input-group" width="500px" method="get">
            @csrf
            <input type="text" width="400px" name="name" placeholder="nhập vào sản phẩm muốn tìm..." class="form-control">
            <button class="btn btn-primary">Tìm kiếm</button>
          </form>
        </div>
        <div class="latest_product_inner">
          <div class="row">
            @foreach($product as $item)
            <div class="col-lg-4 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="card-img" src="{{asset($item->avatar)}}" style="width: 254px; height: 254px;" alt="" />
                  <div class="p_icon">
                    <a href="{{route('productDetail', $item->id)}}">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                    <a href="{{route('addCart', $item->id)}}">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="{{route('productDetail', $item->id)}}" class="d-block">
                    <h4>{{$item->name}}</h4>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">{{$item->price}} <sup>đ</sup></span>
                    <!-- <del>{{$item->price}} <sup>đ</sup></del> -->
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div>
            {{ $product->links() }}
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="left_sidebar_area">
          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Danh mục sản phẩm</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                @foreach($category as $category)
                <li>
                  <a href="{{route('categoryProducts', $category->id)}}">{{$category->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </aside>

          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Lọc theo kích thước</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
              @foreach($size as $size)
                <li>
                  <a href="{{route('sizeProducts', $size->id)}}">{{$size->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection