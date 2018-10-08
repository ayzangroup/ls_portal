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

        <p style="color:red">{{ $error }}</p>

        @endforeach
    
        @if(!empty ($errors1=Session::get('errors1')))
        <p style="color:red">{{ $errors1 }}</p>
        @endif

        <form class="form login" id="frmLogin" action="{{ url('driver/login') }}" method="post">

            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

            <div class="contact-form-group">

               <input type="email" class="contact-form-control" id="email" name="email" placeholder="Email Address">
               <input type="hidden" name="web_player_id" id="login_player_field">
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

        <a href="{{route('driver_forgot_password_form')}}" class="forgot">Forgot password?</a>

    </div>

</body>

<script src="{{URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>

<script>

  var OneSignal = window.OneSignal || [];

  OneSignal.push(function() {

    OneSignal.init({

      appId: "95fac06d-591c-4cab-afd6-5cdf6387a235",

      autoRegister: true,

      notifyButton: {

          enable: true

      }

      });

        OneSignal.getUserId(function(userId) {
    console.log("OneSignal User ID:", userId);
    $('#login_player_field').val(userId);
  });

  });

</script>

</html>

