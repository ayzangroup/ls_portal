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
<style>
.error
{
color:red;
}
</style>

</head>

<body class="main-wrapper">

    <div class="login-wrapper">

        <div class="login-wrapper-inner">

            <h3 style="color:#036ab5;margin-bottom:30px;">Reset Password</h3>

            <h1><img src="{{ URL::to('/') }}/img/logo.png" alt="Logo"></h1>

        </div>


        <form class="form add-password" id="frmLogin" action="{{ route('admin_forgot_password') }}" method="post">

            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

            <div class="contact-form-group">

               <input type="text" class="contact-form-control" id="email" name="email" placeholder="Enter Email">

            </div>

            <div class="contact-form-group">

               <input type="password" class="contact-form-control" id="password" name="password" placeholder="New Password">

            </div>

            <div class="contact-form-group">

               <input type="password" class="contact-form-control" id="password1" name="confirm_password" placeholder="cofirm New Password">

            </div>

             <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

            <div class="text-center">

                <button type="submit" class="submit-login">Reset Password</button>

            </div>

        </form>

    </div>

</body>

<script src="{!! 'js/jquery.min.js' !!}"></script>

<script src="{{ URL::asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>

<script src="{{ URL::asset('/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function(){

                $('.add-password').validate({

                    rules: {                       

                        password: {

                           required: true,

                        },

                        email:
                        {

                            required: true,
                        },

                        confirm_password: {

                           required: true,
                           equalTo:'#password',

                        }
                                   

                    }

                });

            });

        </script>

</html>

