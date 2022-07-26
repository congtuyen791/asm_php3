@extends('layouts.main')
@section('content-title', 'Trang liên hệ')
@section('content')
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Contact Us</h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
          <a href="{{route('home')}}">Trang chủ</a>
          <a href="{{route('contact')}}">Liên hệ</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!-- ================ contact section start ================= -->
<section class="section_gap">
  <div class="container">
    <div class="d-none d-sm-block mb-5 pb-4">
      <div id="map" style="height: 480px;"></div>
      <script>
        function initMap() {
          var uluru = {
            lat: 21.0364771,
            lng: 105.7488437
          };
          var grayStyles = [{
              featureType: "all",
              stylers: [{
                  saturation: -90
                },
                {
                  lightness: 60
                }
              ]
            },
            {
              elementType: 'labels.text.fill',
              stylers: [{
                color: '#f2ffe8'
              }]
            }
          ];
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {
              lat: 21.0364771,
              lng: 105.7488437
            },
            zoom: 16,
            styles: grayStyles,
            scrollwheel: false
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

    </div>


    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Liên hệ</h2>
      </div>
      <div class="col-lg-8 mb-4 mb-lg-0">
        @if(Auth::user())
        <form class="form-contact contact_form" action="{{route('lienHe')}}" method="post" id="contactForm" novalidate="novalidate">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <input class="form-control" name="title" id="title" type="text" placeholder="Nhập vào chủ đề">
                @if ($errors->has('title'))
                <span class="text-danger">{{$errors->first('title')}}</span>
                @endif
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9" placeholder="Nhập vào nội dung"></textarea>
                @if ($errors->has('content'))
                <span class="text-danger">{{$errors->first('content')}}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group mt-lg-3">
            <button type="submit" class="main_btn">Gửi đi</button>
          </div>
        </form>
        @else
        <h3>Bạn cần đăng nhập để thực hiện chức năng này!</h3>
        @endif
      </div>
      <div class="col-lg-4">
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3>FPT Polytechnic</h3>
            <p>Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-tablet"></i></span>
          <div class="media-body">
            <h3><a href="tel:454545654">+84 983 358 791</a></h3>
            <p>Làm việc từ 6-21h từ thứ 2 đến chủ nhật</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3><a href="mailto:support@colorlib.com">tuyenvcph14814@fpt.edu.vn</a></h3>
            <p>Gửi cho chúng tôi bất cứ lúc nào!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ contact section end ================= -->

<!--================ start footer Area  =================-->
@endsection