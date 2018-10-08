<!DOCTYPE html>

<html lang="en">

<head>

@include('includes.meta')

@include('includes.css')


@yield('css')

<style>

label.error

{

	color:firebrick;

	font-size: 14px;

}

</style>

</head>



<body>



@include('includes.header')



<!-- content -->

         

@yield('content')



<footer class="common-padding-laundary">



@include('includes.footer')

</footer><!-- footer -->



<div class="end_footer">



    <div class="container">



        <p>© 2017 Launder Services. All rights reserved.</p>



    </div><!-- container -->



</div><!-- end_footer -->



@include('includes.model')



@include('includes.js')

@yield('js')

</body>

</html>

