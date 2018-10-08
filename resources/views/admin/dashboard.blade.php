<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  @include('admin.includes.head')
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    @include('admin.includes.header')
  </header>

  <aside class="main-sidebar">
    @include('admin.includes.sidebar')
  </aside><!-- left-side menu -->

  <div class="content-wrapper">
    <section class="content container-fluid">

       <!-- page content starts here -->
          
          <div class="box-content dashboard_wrapper">
                <div class="dashboard_admin">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                          <a href="#" class="dashboard_box">
                            <div class="card_dasboard">
                              
                                <h4>Individual Users</h4>
                                <h1>{{ $userCount }} <span><img src="{{ URL::to('/') }}/dist/img/user.svg" alt="Individual Users"></span></h1>
                            </div><!-- /.card_dasboard -->
                          </a>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <a href="#" class="dashboard_box">
                            <div class="card_dasboard">
                              
                                <h4>Corporate Users</h4>
                                <h1>{{ $userCorpCount }} <span><img src="{{ URL::to('/') }}/dist/img/user.svg" alt="Corporate Users"></span></h1>
                            </div><!-- /.card_dasboard -->
                          </a>
                      </div>

                      <div class="col-lg-3 col-md-6">
                          <a href="#" class="dashboard_box">
                            <div class="card_dasboard">
                                <h4>Laundry Man</h4>
                                <h1>{{ $laundrymanCount }}<span><img src="{{ URL::to('/') }}/dist/img/user.svg" alt="Laundry Man"></span></h1>
                            </div><!-- /.card_dasboard -->
                          </a>
                      </div>

                      <div class="col-lg-3 col-md-6">
                          <a href="#" class="dashboard_box">
                            <div class="card_dasboard">
                                <h4>Driver</h4>
                                <h1>{{ $driverCount }} <span><img src="{{ URL::to('/') }}/dist/img/truck.svg" alt="Driver"></span></h1>
                            </div><!-- /.card_dasboard -->
                          </a>
                      </div>
                    </div><!-- /.row -->
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                          <a href="#" class="dashboard_box">
                            <div class="card_dasboard">
                                <h4>Order</h4>
                                <h1>{{ $orderCount }} <span><img src="{{ URL::to('/') }}/dist/img/dry-clean.svg" alt="Order"></span></h1>
                            </div><!-- /.card_dasboard -->
                          </a>
                      </div>
                    </div>

                  
                </div><!-- dashboard_admin -->
          </div><!-- /.box-content -->
      
      <!-- page content ends here -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<footer class="main-footer">
@include('admin.includes.footer') 
</footer>

</div>
<!-- ./wrapper -->

@include('admin.includes.foot')

</body>
</html>