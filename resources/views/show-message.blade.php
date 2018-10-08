<!-- <!DOCTYPE html>

<html lang="en" >

<head>

  <meta charset="UTF-8">

  <title>Show Message</title>

</head>



<body>

    <div class="wrapper">

        <div class="container">

            <p>{{ $message }}</p>

        </div>

    </div>

</body>

</html> -->

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Response</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css" />

    <style>

       .medirec-logo-header{

            background-color: #f5f5f5;

            margin: 0;

        }

        body{            

             background-color: #f5f5f5;  

        }

        .thankyou{

            font-size: 50px;

            margin: auto;

            padding-top: 0;

            color: #56c4c3;

            text-align: center;

        }

        .medirec-icon{

            padding: 10px;

           

        }

        .medirec-icon img{

            width: 200px;

        }

        .thankyou p {

            padding-top: 10px;

            font-size: 18px;

            color: #555;

        }

        .form-wrapper{        

            height: 382px;

            max-width: 470px;

            margin: auto;    

            position: absolute;

            top:0;

            left: 0;

            right:0;

            bottom: 0;

            background: #fff;

        }

        .form-wrapper{

            padding: 50px 50px;

        }

        .medirec-app-logo img{

            width: 250px;

        }

        .medirec-app-logo {

            text-align: center;

        }

        .thank-wrapper {

            height: 355px;

        }

        .thankyou img {

            width: 36px;

        }

        .icon-box {

            line-height: 0;

            padding: 15px;

        }

         @media (max-width: 500px) {

            .thank-wrapper {

                height: 250px !important;

            }

            .form-wrapper {

                padding: 20px;

                height: 309px;

                margin: auto;

                margin-left: 15px !important;

                margin-right: 15px !important;

            }

            .medirec-app-logo img {

                width: 200px;

            }

            .thankyou p {

                font-size: 17px;

            }

            .thankyou h1 {

                margin-bottom: 0;

                font-size: 28px;

            }

            .thankyou img {

                    width: 30px;

                }

        }

    </style>

    <!-- stylesheet -->

</head>

<body>

        <div class="form-wrapper thank-wrapper">

            <div class="medirec-app-logo">

            <img src="{{ URL::asset('img/logo.png')}}"/>

            </div>



            <div class="thankyou">

                <div class="icon-box">

                    <img src="{{ URL::to('/') }}/assets/image/tick.jpg"/>

                    

                </div>

                @if($status == 1)

                <h1>Success</h1>

                <p>{{ $message }}</p>

                @else

                <h1>Oops !</h1>

                <p>{{ $message }}</p>

                @endif

                <a href="{{route('/')}}"><p style="background-color: #036ab5;color: #fff;text-size:20px;" class="login_signUp_custom">Submit<p></a>
            </div>


        </div>

</body>

</html>