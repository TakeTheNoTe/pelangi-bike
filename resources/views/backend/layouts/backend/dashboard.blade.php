<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php $te = isset($data) ? $data['title'] : 'Selamat Datang di Website Pelangi Bike';
    echo $te; ?></title>
    <link rel="stylesheet" href="{{ asset('backend-assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet"
        href=" {{ asset('backend-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/home.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontend-assets/img/logo1.png') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

<body onload=display_ct();>
    <div class="container-scroller">
        @include('backend.layouts.backend.topbar')
        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.backend.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('header')

                    @yield('main-content')
                </div>
                @include('backend.layouts.backend.footer')
            </div>
        </div>
    </div>
    @include('backend.layouts.backend.script_dashboard')
</body>

</html>
