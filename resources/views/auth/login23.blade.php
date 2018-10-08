<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>laundry - Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}">
    <link rel="icon" href="{{ URL::to('/') }}/assets/image/favicon.ico" type="img/x-icon">
</head>
<body class="main-wrapper">
    <div class="login-wrapper">
        <div class="login-wrapper-inner">
            <h1><img src="{{ URL::to('/') }}/img/logo.png" alt="Logo"></h1>
        </div>

         @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
        <form class="form" id="frmLogin" action="{{ route('login') }}" method="post">
            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
            <div class="contact-form-group">
               <input type="email" class="contact-form-control" id="email" name="email" placeholder="Email Address">
            </div>

            <div class="contact-form-group">
               <input type="password" class="contact-form-control" id="password" name="password" placeholder="Password">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">
                    <i class="aria-hidden"></i>Remember Me
                </label>
             </div>
             <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
            <div class="text-center">
                <button type="submit" class="submit-login">Login</button>
            </div>
        </form>
        <a href="{{ URL::to('/') }}/forgot-password" class="forgot">Forgot password?</a>
    </div>
</body>
<script src="{!! 'js/jquery.min.js' !!}"></script>
</html>
