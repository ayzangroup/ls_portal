<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    @include('admin.includes.head')
    @yield('css')
 <style>
 label.error
 {
    color:red;
 }
 .required
 {
   color:red;
 }
 </style>   
</head>
<body>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
 @include('admin.includes.header')
  </header>

  <aside class="main-sidebar">
    @include('admin.includes.sidebar')
  </aside><!-- left-side menu -->
<!-- content -->
         
@yield('content')

<footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="#">Muser Pvt.Ltd</a>.</strong> All rights reserved.
  </footer>


@include('admin.includes.foot')
@yield('js')
</body>
</html>
