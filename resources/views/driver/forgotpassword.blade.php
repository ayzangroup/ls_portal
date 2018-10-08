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

            <h3 style="color:#036ab5;margin-bottom:30px;">Reset Password</h3>

            <h1><img src="{{ URL::to('/') }}/img/logo.png" alt="Logo"></h1>

        </div>

         



        <p style="margin-bottom: 30px;text-align: justify;">Please enter your email address. You will receive a link to create a new password via email.</p>



         @foreach ($errors->all() as $error)

        {{ $error }}

        @endforeach

        <form class="form" id="frmLogin" action="{{ route('driver_forgot_password') }}" method="post">

            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

            <div class="contact-form-group">

               <input type="email" class="contact-form-control" id="email" name="email" placeholder="Email Address">

            </div>

             <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

            <div class="text-center">

                <button type="submit" class="submit-login">Reset Password</button>

            </div>

        </form>

    </div>

</body>

<script src="{!! 'js/jquery.min.js' !!}"></script>

</html>

