<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>@yield('content-title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/jquery-ui/jquery-ui.css')}}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />

</head>

<body>
    <!--================Header Menu Area =================-->
    @include('layouts.header')
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    @if(session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('false'))
    <div class="alert alert-danger text-center">
        {{ session()->get('false') }}
    </div>
    @endif
    @yield('content')
    <!--================ End Blog Area =================-->

    <!--================ start footer Area  =================-->

    <!--================ End footer Area  =================-->
    <!-- footer -->
    @include('layouts.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/stellar.js')}}"></script>
    <script src="{{asset('vendors/lightbox/simpleLightbox.min.js')}}"></script>
    <script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('vendors/isotope/isotope-min.js')}}"></script>
    <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('vendors/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendors/counter-up/jquery.counterup.js')}}"></script>
    <script src="{{asset('js/mail-script.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>
</body>

</html>