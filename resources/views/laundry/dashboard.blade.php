@extends('laundry.layouts.app')
@section('content')

   

    <section class="content container-fluid dashboard dashboard-wrapper">
      
      <!-- page content starts here -->    

   
             
            <div class="row">
                <div class="cards">
                    
                    <!-- <h2 class="heading">Please select service</h2>     -->

                    <div class="col-md-4">
                        <div class="dashboard-card dashboard-btn">
                          <h2 class="dashboard-service-head">Order In Process</h2>
                          <div class="order-box">
                            <span>Order ID <span>45767</span></span>
                            <a class="pull-right" href="#"></a>

                            <h4>Wash and Iron</h4>

                            <!-- <ul class="dropdown-menu login-dropdown-menu dashborad-order-more">
                              <li>
                                <a href="#">
                                    <span>Order ID <span>#56958941</span></span>
                                    <h6>Wash and Fold</h6>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                    <span>Order ID <span>#5696750</span></span>
                                    <h6>Wash and Fold</h6>
                                </a>
                              </li>
                            </ul> --><!-- dashborad-order-more -->

                            <p><b>Current Order Status:</b> Driver on the way to drop the laundry at launder</p>
                            <button class="btn btn-default">Track Order</button>

                          </div><!-- order-box -->
                        </div><!-- dashboard-card -->
                    </div>

                     <div class="col-md-4">
                        <div class="dashboard-card dashboard-btn">
                          <h2 class="dashboard-service-head">Saved Order</h2>
                          <div class="order-box">
                            <span>Order ID <span>235</span></span>
                            <h4>Dry Clean</h4>                         
                            <p>3 Trousers</p>
                            <p>7 T-shirts</p>
                            <button class="btn btn-default btn2">Checkout</button>

                          </div><!-- order-box -->
                        </div><!-- dashboard-card -->
                    </div>

                     <div class="col-md-4">
                       <div class="dashboard-card dashboard-btn">
                          <h2 class="dashboard-service-head">Favorite order</h2>
                          <div class="order-box">
                            <span>Order ID <span>947</span></span>                          
                            <h4>Wash and Fold</h4>
                            <p>8 Hand Towels</p>
                            <p>4 Blankets...</p>
                            
                            <button class="btn btn-default btn3">Repeat order</button>

                          </div><!-- order-box -->
                        </div><!-- dashboard-card -->
                    </div>


                </div><!-- /.cards -->
            </div>
            
   
      
      <!-- page content ends here -->

    </section><!-- /.content -->

@endsection