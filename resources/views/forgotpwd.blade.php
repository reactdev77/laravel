<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Reminder</title>
    @if(env('APP_ENV') === 'prod')
        <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline' www.google-analytics.com www.googletagmanager.com; connect-src 'self'; img-src 'self' 'unsafe-inline' * data:; style-src 'self' 'unsafe-inline' fonts.googleapis.com; font-src 'self' 'unsafe-inline' fonts.gstatic.com fonts.googleapis.com data:; frame-src 'self' 'unsafe-inline' dmmdev.com;">
        <script>(function(b,m,h,a,g){b[a]=b[a]||[];b[a].push({"gtm.start":new Date().getTime(),event:"gtm.js"});var k=m.getElementsByTagName(h)[0],e=m.createElement(h),c=a!="dataLayer"?"&l="+a:"";e.async=true;e.src="https://www.googletagmanager.com/gtm.js?id="+g+c;k.parentNode.insertBefore(e,k)})(window,document,"script","dataLayer","GTM-K6GM83G");</script>
    @endif
<!--global css starts-->
    @if(env('APP_ENV') === 'prod')
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/css/bootstrap.min.css') }}">
        <link rel="shortcut icon" href="{{ secure_asset('assets/images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ secure_asset('assets/images/favicon.png') }}" type="image/x-icon">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    @endif
<!--end of global css-->
    <!--page level css starts-->
    @if(env('APP_ENV') === 'prod')
        <link type="text/css" rel="stylesheet" href="{{secure_asset('assets/vendors/iCheck/css/all.css')}}"/>
        <link href="{{ secure_asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}"
              rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/css/frontend/login.css') }}">
    @else
        <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}"/>
        <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}"
              rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/login.css') }}">
@endif
<!--end of page level css-->
</head>
<?php
URL::forcescheme('http');
?>
<?php
if (env('APP_ENV') === 'prod') {
    $pass_url = secure_url('forgot-password');
} else {
    $pass_url = url('forgot-password');
}
?>
<body>
@if(env('APP_ENV') === 'prod')
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6GM83G"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif
<div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box">
            <div class="box1">
                <a href="{{ route('home', session('custom_lang')) }}">
                    @if(env('APP_ENV') === 'prod')
                        <img src="{{ secure_asset('assets/images/logodmmx.jpg') }}" alt="logo"
                             class="img-responsive mar">
                    @else
                        <img src="{{ asset('assets/images/logodmmx.jpg') }}" alt="logo" class="img-responsive mar">
                    @endif
                </a>
                <h3 class="text-primary">{{ __('loginsignup.logintitle') }}</h3>
                <!-- Notifications -->
                @include('notifications')

                <form action="{{ $pass_url }}" class="omb_loginForm" autocomplete="off" method="POST">
                    {!! Form::token() !!}
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input type="email" class="form-control email" name="email" placeholder="Email"
                               value="{!! old('email') !!}">
                        <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-primary" type="submit" value="Reset Your Password">
                    </div>
                </form>

            </div>
            <div class="bg-light animation flipInX">
                <a href="{{ route('login') }}" id="forgot_pwd_title">login</a>
            </div>
        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
@if(env('APP_ENV') === 'prod')
    <script type="text/javascript" src="{{ secure_asset('assets/js/frontend/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('assets/js/frontend/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript" src="{{ secure_asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('assets/js/frontend/login_custom.js') }}"></script>
@else
    <script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/login_custom.js') }}"></script>
@endif
<!--global js end-->
</body>
</html>
