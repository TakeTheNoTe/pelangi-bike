<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php $te = isset($data) ? $data['title'] : 'Selamat Datang di Website Pelangi Bike';
    echo $te; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('auth.component.head')
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url({{ asset('backend-assets/images/bg-01.jpg') }});">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="GET" action="{{ route('auth.login') }}">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <span class="login100-form-logo">
                        <img src="{{ asset('frontend-assets/img/logo3.png') }}" alt="">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" id="username" name="username" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    @include('auth.component.script')

</body>

</html>
