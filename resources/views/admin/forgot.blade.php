<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<title>laundry - Forgot</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="icon" href="{{ URL::to('/') }}/assets/image/favicon.ico" type="img/x-icon">
</head>
<body class="main-wrapper">

	<div class="login-wrapper forgot-wrapper">
		<div class="login-wrapper-inner">
			<h1><img src="{{ URL::to('/') }}/assets/image/logo.png" alt="Logo"></h1>
		</div>

		<form class="form" id="frmForgot" action="{{ URL::to('/') }}/forgot" method="post">
			<div class="contact-form-group">
               <input type="email" class="contact-form-control" placeholder="Email Address">
            </div>

            <p>Please enter your email address. You will receive a link to create a new password via email.</p>

            <div class="text-center">
            	<button type="button" class="submit-login">Send</button>
            </div>

            <div class="member">
            <span>Not a member?</span><a href="{{ URL::to('/') }}/login"> Login</a>
          </div>

		</form>
	</div>
	<script src="{!! 'js/jquery.min.js' !!}"></script>
<!-- <script src="js/custom.js"></script> -->

</body>
</html>