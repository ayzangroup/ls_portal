<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  @include('corpuser.includes.meta')
  @include('corpuser.includes.css')
  @yield('css')
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
     @include('corpuser.includes.header')
     @include('corpuser.includes.sidebar')
    
    <!-- End Header -->
    <div class="content-wrapper">
    {{-- Page Content --}}
    @yield('content')
    <!-- end Page Content -->
    </div> 
    
    <!-- Start Footer -->
    <footer class="main-footer">
    @include('corpuser.includes.footer')
   </footer>
    
  <!-- End Modal login, register, custom gallery -->
    
    <!-- End Footer -->
  </div>
  
 @include('corpuser.includes.js')
 @yield('js')
</body>
</html>