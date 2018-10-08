<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  @include('laundry.includes.meta')
  @include('laundry.includes.css')
  @yield('css')
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
     @include('laundry.includes.header')
     @include('laundry.includes.sidebar')
    
    <!-- End Header -->
    <div class="content-wrapper">
    {{-- Page Content --}}
    @yield('content')
    <!-- end Page Content -->
    </div> 
    
    <!-- Start Footer -->
    <footer class="main-footer">
    @include('laundry.includes.footer')
   </footer>
    
  <!-- End Modal login, register, custom gallery -->
    
    <!-- End Footer -->
  </div>
  
 @include('laundry.includes.js')
 @yield('js')
</body>
</html>