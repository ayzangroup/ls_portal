<!DOCTYPE html>

<html lang="en-US">

<head>

    <meta charset="utf-8">

</head>



<body style='margin: 0;padding: 0;background-color: #f5f5f5;'>

    <div style='width: 600px;margin: 0 auto;'>

        <div style='float: left;width: 100%;padding: 10%;background-color:#fff;'>

            <span style='float: left;width: 100%;'><img src='{{ URL::to('/') }}/assets/image/logo.png' width="180"></span>

            <span style='float: left;width: 100%;font-size: 17px;color: #646464;font-family: sans-serif;margin-top: 20px;'>

                <br/>

                Hi {{ $name }},

                <br/>

                <br/>

                We heard that you lost your password. Sorry about that!<br/>

                But don’t worry! You can use the following link to reset your password:<br/>

                <span style='float: left;width: 100%;margin-top: 15px;'> 

                    <a style='text-decoration: underline;font-size:15px;' href='{{ url("user/reset/". $verification_code."/".$userType)}}'>Reset Password</a>

                    <!-- <a style='text-decoration: underline;font-size:15px;' href='javascript:void();'>Reset Link</a> -->

                    <span style='float: left;width: 100%;font-size: 17px;color: #646464;font-family: sans-serif;margin-top: 10px;'><br>Warm Regards,<br>The Laundry Service Team</span>

                    <span style='float: left;width: 100%;font-size: 12px;color: #9c9c9c;font-family: sans-serif;margin-top: 20px;'>

                        Note: This is a system generated email. Please don’t reply on this mail.

                    </span>

                </span>

            </span>

        </div>

    </div>

</body>

</html>

