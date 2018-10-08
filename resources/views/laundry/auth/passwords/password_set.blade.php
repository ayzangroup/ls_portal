<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laundry Password Set</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css" />
    <style>
        html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}
        *{
            padding: 0;
            margin: 0 auto;
        }
        body{
            background-color: #f5f5f5;
            color:#4c5667;
            font-family: Roboto,sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
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
        .submit-btn{
        display: block;
        text-align: center;
        }
        form a.btn.btn-primary{
            width:110px;
            margin-top: 10px;
            padding: 6px 14px;
            font-size: 14px;
            font-weight: 400;
            text-align: center;
            background-color: #228bdf;
            border: 1px solid #228bdf;
            border-bottom: 2px solid #1a70b4;
            border-radius: 2px;
        }
        form a.btn.btn-primary:hover{
            background-color: #007ac6;
            border-bottom: 2px solid #006eb0;
        }    

        .form-header p{
            text-align: center;
            margin: 20px auto;
            
        }
        .form-wrapper .form-control{
            height: 40px;
            background-color: #fafafa;
            font-size: 14px;
            border-radius: 2px;
            border: 1px solid #eee;
            border-left: none;
            padding-left: 0;
            margin:0;
        }
        .form-wrapper .form-control:focus{
            box-shadow: none;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-left: none;
        }
        .form-wrapper .input-group-text{
            color: rgba(76,86,103,.4);
            background-color: #fafafa;
            border-radius: 2px;
            border: 1px solid #eee;
            border-right:none;
            margin:0;
            
            
        }
        .form-wrapper .input-group-text i{
            margin:11px;
        }
        .form-wrapper input::placeholder{
            color:rgba(76,86,103,.6);
            font-size: 14px;
            padding-top: 5px;
        }
        .form-wrapper .form-control:focus + .input-group-text {
            border: 1px solid #e0e0e0;
            background-color: #fff;
            border-right:none;
        }

        .fa{
        font-size: 18px;
        }
        .menu-wrapper{
            margin-top: 100px;
        }
        .main-menu{
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-content: center;
            margin: auto;
            height: 250px;
        }
        .main-menu a{
            width: 200px;
            padding: 10px;  
            margin: 20px auto;
        }
        .main-menu a{
            text-decoration: none;
            color:#fff;
        }

        .input-group-prepend {
            width: 100%;

        }
        .input-group-append, .input-group-prepend {
            display:flex;            
            flex-direction: row-reverse;
            justify-content:center;
            margin-bottom : 15px;
        }
        .medirec-app-logo{
            text-align: center;
        }
        .medirec-app-logo img{
            width: 250px;
        }
        .input-group label{
            margin-left: 0;
        }
        .msg{
            text-align: center;
            margin-top: 20px;
        }
        .error_msg{
            color: red;
        }

        @media (max-width: 500px) {
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
        }
    </style>
    <!-- stylesheet -->
    <script>
    function validationForm(){
        document.getElementById('error_msg').innerHTML = "";
        var newPassword = document.getElementById('txtPassword').value;
        var confirmPassword = document.getElementById('txtCnfPassword').value;
        
        if(newPassword == ''){

            document.getElementById('error_msg').innerHTML = 'New Password is empty';
            return false;
        } else if(confirmPassword == ''){
            document.getElementById('error_msg').innerHTML = 'Confirm Password is empty';
            return false;
        } else if(newPassword != confirmPassword){
            document.getElementById('error_msg').innerHTML = 'New Password and Confirm Password has not Matched';
            return false;
        } else {
            document.getElementById("frmReset").submit();
        }
    }
    </script>
</head>
<body>
    <div class="form-wrapper">
        <form class="form" id="frmReset" action="{{route('laundry.password')}}" method="post">
            {{csrf_field()}}
            <div class="medirec-app-logo">
                <img src="{{ URL::to('/') }}/assets/image/logo.png"/>
                
            </div>
            @if($isShow)
            <div class="form-header">
                <p>Laundry Password Set</p>
            </div>
            <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                    <input type="password" name="password" id="txtPassword" class="form-control" placeholder="New Password" aria-label="New Password" aria-describedby="basic-addon1" />
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
            @php
            $id=Request::segments(2);
            $id=decrypt($id['2']);
            @endphp
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <input type="password" name="CnfPassword" id="txtCnfPassword" class="form-control"  placeholder="Confirm New Password" aria-label="Confirm Password" aria-describedby="basic-addon1" />
                    <input type="hidden" name="driverId" value="{{$id}}">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
            </div>
            <div class="submit-btn">
                <!-- <button type="submit" id="reset" name='reset' value="submit" class="btn btn-primary">Reset</button> -->
                <a href="javascript:void(0);" id="resetBtn" name="resetBtn" class="btn btn-primary" onclick="javascript:return validationForm();">Submit</a>
            </div>
            <div class="msg" >
                <p class="error_msg" id="error_msg"></p>
            </div>
            @else
            <div class="msg" >
                <p class="error_msg" id="error_msg">{{ $message or 'empty string' }}</p>
            </div>
            @endif
        </form>
    </div>
    <script src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <!-- <script src="{!! asset('js/script.js') !!}"></script> -->
</body>
</html>