<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ url('frontend-assets/img/logo1.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>
        <?php $te = isset($data) ? $data['title'] : 'Selamat Datang di Website Pelangi Bike'; echo $te;?>
    </title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="{{ url('frontend-assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend-assets/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend-assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/main.css') }}">
</head>

<body>

    <!-- Start Header Area -->
    @include('frontend.layouts.header')
    <!-- End Header Area -->


    <!-- Start Content Area -->
    @yield('content')
    <!-- End Content Area -->


    <!-- start footer Area -->
    @include('frontend.layouts.footer')
    <!-- End footer Area -->

    <script src="{{ url('frontend-assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ url('frontend-assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend-assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ url('frontend-assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('frontend-assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ url('frontend-assets/js/nouislider.min.js') }}"></script>
    <script src="{{ url('frontend-assets/js/countdown.js') }}"></script>
    <script src="{{ url('frontend-assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('frontend-assets/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <script src="{{ url('frontend-assets/js/main.js') }}"></script>
    @yield('script')
</body>

</html>