@extends('user.layouts.app')

@section('content')

<section class="content container-fluid dashboard">

      

      <!-- page content starts here -->    



   

        <div class="content-header">

           <h1>Order History</h1>

       </div>



       <div class="common-background order-history">

          <div class="row">

              <div class="col-md-12">



                  <div class="order-tabs">

                    <ul class="nav nav-tabs tabs-services">

                      <li class="active"><a data-toggle="tab" href="#openorders">Open Orders</a></li>

                      <li><a data-toggle="tab" href="#orders">Orders</a></li>

                      <li><a data-toggle="tab" href="#saved-orders">Saved Orders</a></li>                      

                      <li><a data-toggle="tab" href="#cancelorders">Cancel Orders</a></li>

                    </ul>

                  </div><!-- order-tabs -->


                 
                  <div class="tab-content">
                    
                     <div id="openorders" name="tabpane" class="tab-pane fade in active">
                      @foreach($order as $orders)
                        <div class="tab-content-box">

                            <div class="placed-order-details-wrapper">

                                <div class="placed-order-details">

                                    <div class="placed-order-top-head">

                                    
                                        <div class="placed-order-top-head-lt">

                                            <ul>

                                              <li>

                                                  <span class="product-label">Order PickUp Date</span>

                                                  <span class="label-details">{{date('d M Y', strtotime(str_replace('-','/',$orders->actPickUpDate)))}}</span>

                                              </li>

                                              <li>

                                                  <span class="product-label">Order Deliver Date</span>

                                                  <span class="label-details">{{date('d M Y', strtotime(str_replace('-','/',$orders->actDeliveryDate)))}}</span>

                                              </li>

                                              <li>

                                                  <span class="product-label">Receipt to</span>

                                                  <span class="label-details"><a href="#">John</a></span>

                                              </li>

                                              <li>

                                                  <span class="product-label">ORDER NO</span>

                                                  <span class="label-details">#{{$orders->orderId}}</span>

                                              </li>

                                            </ul>

                                        </div><!-- placed-order-top-head-lt -->

                                        <div class="placed-order-top-head-rt">

                                            <span class="product-label"><a href="{{route('user.order_history_detail',$orders->orderId)}}">View order details</a></span>

                                        </div><!-- placed-order-top-head-rt -->

                                    </div><!-- placed-order-top-head -->

                                </div><!-- placed-order-details -->



                                <div class="package-details">

                                      <div class="col-lg-8 col-md-8">

                                          <div class="package-details-rt">

                                              <h5>In Progress</h5>

                                              <p>Your package was in progress</p>

                                              <div class="package-details-rt-inner">

                                                  <div class="package-details-rt-inner-rt">

                                                        <div class="package-details-rt-img">

                                                            <img src="{{URL::asset('images/services_images/'.$orders->serviceImage)}}" alt="" class="img-responsive">

                                                        </div>

                                                  </div><!-- package-details-rt-inner-rt -->



                                                  <div class="package-details-rt-inner-lt">

                                                      <h5><a href="#"></a>{{$orders->serviceName}}</h5>

                                                      <span class="price">&#8377; {{$orders->netAmount}}.00</span>

                                                      <p>Rate this service</p>

                                                      <div class="star-rating">

                                                        <span class="fa fa-star-o" data-rating="1"></span>

                                                        <span class="fa fa-star-o" data-rating="2"></span>

                                                        <span class="fa fa-star-o" data-rating="3"></span>

                                                        <span class="fa fa-star-o" data-rating="4"></span>

                                                        <span class="fa fa-star-o" data-rating="5"></span>

                                                        <input type="hidden" name="whatever2" class="rating-value" value="4.0">

                                                      </div>

                                                  </div><!-- package-details-rt-inner-lt -->

                                              </div><!-- package-details-rt-inner -->

                                          </div><!-- package-details-rt -->

                                      </div>



                                      <div class="col-lg-4 col-md-4">

                                          <div class="package-details-lt">

                                              <a href="{{route('user.track',$orders->orderId)}}" class="btn btn-default">Track Laundry </a>

                                              <a href="{{route('user.complaint')}}" class="btn btn-default btn-border">File a Complaint</a>

                                              <a href="#cancel_order{{$orders->orderId}}" data-toggle="modal" class="btn btn-default btn-border">Cancel Order</a>

                                          </div><!-- package-details-lt -->

                                      </div>



                                </div><!-- package-details -->

                              </div><!-- placed-order-details-wrapper -->

                        </div><!-- tab-content-box -->

                              <!-- forgot -->



<div class="modal fade modal-center bd-example-modal-sm forgot" id="cancel_order{{$orders->orderId}}" tabindex="-1"  aria-hidden="true" role="basic" >

    <div class="modal-dialog modal-sm" role="document">

        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                 </button>

                 <h3>Cancel Order</h3>

                 <p style="margin:20px;">Can You Cancel this order.</p>

               <form class="login_modal forgot_password" action="{{route('user.cancel_order')}}" method="post">

                  {{csrf_field()}}
                        <input type="hidden" name="orderId" value="{{$orders->orderId}}"> 

                        <button type="submit" class="readMore readMore_login" style="width: 100px;height: 35px;border-radius: 10px;">submit</button>

                </form>

            </div>

        </div>

    </div>

</div><!--End forgot -->
                        @endforeach
                    </div>
                 



                    <div id="orders" name="tabpane" class="tab-pane fade">

                        <div class="tab-content-box">


                          @foreach($past_order as $past_orders)

                            <div class="placed-order-box-main">

                                <div class="placed-order-details-wrapper">

                                <div class="placed-order-details">

                                    <div class="placed-order-top-head">

                                        <div class="placed-order-top-head-lt">

                                            <ul>

                                              <li>

                                                  <span class="product-label">Order Pick Up Date</span>

                                                  <span class="label-details">{{date('d M Y', strtotime(str_replace('-','/',$past_orders->actPickUpDate)))}}</span>

                                              </li>

                                              <li>

                                                  <span class="product-label">Order Deliver Date</span>

                                                  <span class="label-details">{{date('d M Y', strtotime(str_replace('-','/',$past_orders->actDeliveryDate)))}}</span>

                                              </li>

                                              <li>

                                                  <span class="product-label">Receipt to</span>

                                                  <span class="label-details"><a href="#">John</a></span>

                                              </li>

                                              <li>

                                                  <span class="product-label">ORDER NO</span>

                                                  <span class="label-details">#{{$past_orders->orderId}}</span>

                                              </li>

                                            </ul>

                                        </div><!-- placed-order-top-head-lt -->

                                        <div class="placed-order-top-head-rt">

                                            <span class="product-label"><a href="{{route('user.order_history_detail',$past_orders->orderId)}}">View order details</a></span>

                                        </div><!-- placed-order-top-head-rt -->

                                    </div><!-- placed-order-top-head -->

                                </div><!-- placed-order-details -->

                                <div class="package-details">

                                      <div class="col-lg-8 col-md-8">

                                          <div class="package-details-rt">

                                              <h5>In Progress</h5>

                                              <p>Your package was in progress</p>

                                              <div class="package-details-rt-inner">

                                                  <div class="package-details-rt-inner-rt">

                                                        <div class="package-details-rt-img">

                                                            <img src="{{URL::asset('images/services_images/'.$past_orders->serviceImage)}}" alt="" class="img-responsive">

                                                        </div>

                                                  </div><!-- package-details-rt-inner-rt -->

                                                  <div class="package-details-rt-inner-lt">

                                                      <h5><a href="#">{{$past_orders->serviceName}}</a></h5>

                                                      <span class="price">&#8377; {{$past_orders->netAmount}}.00</span>

                                                      <p>Rate this service</p>

                                                      <div class="star-rating">

                                                        <span class="fa fa-star-o" data-rating="1"></span>

                                                        <span class="fa fa-star-o" data-rating="2"></span>

                                                        <span class="fa fa-star-o" data-rating="3"></span>

                                                        <span class="fa fa-star-o" data-rating="4"></span>

                                                        <span class="fa fa-star-o" data-rating="5"></span>

                                                        <input type="hidden" name="whatever2" class="rating-value" value="4.0">

                                                      </div>

                                                  </div><!-- package-details-rt-inner-lt -->

                                              </div><!-- package-details-rt-inner -->

                                          </div><!-- package-details-rt -->

                                      </div>


                                      <div class="col-lg-4 col-md-4">

                                          <div class="package-details-lt">

                                              <a href="{{route('user.repeat_order',$past_orders->orderId)}}" class="btn btn-default btn-border">Repeat </a>

                                              <a href="{{route('user.feedback')}}" class="btn btn-default btn-border">Leave feedback</a>

                                          @if($past_orders->isFavorite==1)
                                             <a href="{{route('user.unfavorite',$past_orders->orderId)}}" class="readMore tooltipcustom" data-toggle="tooltip" data-placement="top" title="" data-original-title="" style="float:left">
                                              <i class="fa fa-heart"></i>
                                             </a>
                                          @else
                                             <a href="{{route('user.favorite',$past_orders->orderId)}}" class="readMore tooltipcustom" data-toggle="tooltip" data-placement="top" title="" data-original-title="" style="float:left;background:#d2d6de;">
                                              <i class="fa fa-heart"></i>
                                             </a>
                                          @endif

                                              <a href="{{route('user.complaint')}}" class="btn btn-default btn-border" style="float:right">File a Complaint</a>

                                          </div><!-- package-details-lt -->

                                      </div>
                                  </div>

                                </div><!-- package-details -->

                              </div><!-- placed-order-details-wrapper -->
                        @endforeach

                    </div>
                  </div>                   



                    <div id="cancelorders" name="tabpane" class="tab-pane fade">
                      @foreach($cancel_order as $cancel_orders)
                        <div class="tab-content-box">

                              <div class="placed-order-box-main">

                                <div class="placed-order-details-wrapper">



                                <div class="placed-order-details">

                                    <div class="placed-order-top-head">

                                        <div class="placed-order-top-head-lt">

                                            <ul>

                                              <li>

                                                  <span class="product-label">Order Pick Up Date</span>

                                                  <span class="label-details">{{date('d M Y', strtotime(str_replace('-','/',$cancel_orders->pickId->actPickUpDate)))}}</span>

                                              </li>

                                              <li>

                                                  <span class="product-label">Order Deliver Date</span>

                                                  <span class="label-details">{{date('d M Y', strtotime(str_replace('-','/',$cancel_orders->deliverId->actDeliveryDate)))}}</span>

                                              </li>

                                              <li>

                                                  <span class="product-label">Receipt to</span>

                                                  <span class="label-details"><a href="#">John</a></span>

                                              </li>

                                              <li>

                                                  <span class="product-label">ORDER NO</span>

                                                  <span class="label-details">#{{$cancel_orders->orderId}}</span>

                                              </li>

                                            </ul>

                                        </div><!-- placed-order-top-head-lt -->


                                    </div><!-- placed-order-top-head -->

                                </div><!-- placed-order-details -->



                                <div class="package-details">

                                      <div class="col-lg-8 col-md-8">

                                          <div class="package-details-rt">

                                              <h5>Canceled</h5>

                                              <div class="package-details-rt-inner">

                                                  <div class="package-details-rt-inner-rt">

                                                        <div class="package-details-rt-img">

                                                            <img src="{{URL::asset('images/services_images/'.$cancel_orders->service->serviceImage)}}" alt="" class="img-responsive">

                                                        </div>

                                                  </div><!-- package-details-rt-inner-rt -->



                                                  <div class="package-details-rt-inner-lt">

                                                      <h5><a href="#">{{$cancel_orders->service->serviceName}}</a></h5>

                                                      <span class="price">&#8377; {{$cancel_orders->netAmount}}.00</span>

                                                      <p>Rate this service</p>

                                                      <div class="star-rating">

                                                        <span class="fa fa-star-o" data-rating="1"></span>

                                                        <span class="fa fa-star-o" data-rating="2"></span>

                                                        <span class="fa fa-star-o" data-rating="3"></span>

                                                        <span class="fa fa-star-o" data-rating="4"></span>

                                                        <span class="fa fa-star-o" data-rating="5"></span>

                                                        <input type="hidden" name="whatever2" class="rating-value1" value="1.9">

                                                      </div>

                                                  </div><!-- package-details-rt-inner-lt -->

                                              </div><!-- package-details-rt-inner -->

                                          </div><!-- package-details-rt -->

                                      </div>



                                      <div class="col-lg-4 col-md-4">

                                          <div class="package-details-lt">

                                              <a href="{{route('user.repeat_order',$cancel_orders->orderId)}}" data-toggle="modal" class="btn btn-default btn-border">Repeat</a>

                                          </div><!-- package-details-lt -->

                                      </div>



                                </div><!-- package-details -->

                              </div><!-- placed-order-details-wrapper -->

                            </div><!-- placed-order-box-main -->

                        </div><!-- tab-content-box -->
                    @endforeach

                    </div>

                   
                  <div id="saved-orders" name="tabpane" class="tab-pane fade">
                      @foreach($save_order as $save_orders)
                       
                        <div class="tab-content-box">

                              <div class="placed-order-box-main">

                                <div class="placed-order-details-wrapper">



                                <div class="placed-order-details">

                                    <div class="placed-order-top-head">

                                        <div class="placed-order-top-head-lt">

                                            <ul>

                                              <li>

                                                  <span class="product-label">ORDER NO</span>

                                                  <span class="label-details">#{{$save_orders->orderId}}</span>

                                              </li>

                                            </ul>

                                        </div><!-- placed-order-top-head-lt -->



                                        <div class="placed-order-top-head-rt">

                                            <span class="product-label"><a href="{{route('user.save_order',$save_orders->orderId)}}">View order details</a></span>

                                        </div><!-- placed-order-top-head-rt -->

                                    </div><!-- placed-order-top-head -->

                                </div><!-- placed-order-details -->



                                <div class="package-details">

                                      <div class="col-lg-8 col-md-8">

                                          <div class="package-details-rt">

                                              <h5>Save Order</h5>

                                              <div class="package-details-rt-inner">

                                                  <div class="package-details-rt-inner-rt">

                                                        <div class="package-details-rt-img">

                                                            <img src="{{URL::asset('images/services_images/'.$save_orders->service->serviceImage)}}" alt="" class="img-responsive">

                                                        </div>

                                                  </div><!-- package-details-rt-inner-rt -->



                                                  <div class="package-details-rt-inner-lt">

                                                      <h5><a href="#">{{$save_orders->service->serviceName}}</a></h5>

                                                      <span class="price">&#8377; {{$save_orders->netAmount}}.00</span>

                                                      <p>Rate this service</p>

                                                      <div class="star-rating">

                                                        <span class="fa fa-star-o" data-rating="1"></span>

                                                        <span class="fa fa-star-o" data-rating="2"></span>

                                                        <span class="fa fa-star-o" data-rating="3"></span>

                                                        <span class="fa fa-star-o" data-rating="4"></span>

                                                        <span class="fa fa-star-o" data-rating="5"></span>

                                                        <input type="hidden" name="whatever2" class="rating-value1" value="1.9">

                                                      </div>

                                                  </div><!-- package-details-rt-inner-lt -->

                                              </div><!-- package-details-rt-inner -->

                                          </div><!-- package-details-rt -->

                                      </div>



                                      <div class="col-lg-4 col-md-4">

                                       
                                       

                                          <div class="package-details-lt">

                                          @if($save_orders->isFavorite==1)
                                             <a href="{{route('user.unfavorite',$save_orders->orderId)}}" class="readMore tooltipcustom" data-toggle="tooltip" data-placement="top" title="" data-original-title="" style="float:left">
                                              <i class="fa fa-heart"></i>
                                             </a>
                                          @else
                                             <a href="{{route('user.favorite',$save_orders->orderId)}}" class="readMore tooltipcustom" data-toggle="tooltip" data-placement="top" title="" data-original-title="" style="float:left;background:#d2d6de;">
                                              <i class="fa fa-heart"></i>
                                             </a>
                                          @endif
                                              <a href="{{route('user.save_order',$save_orders->orderId)}}" data-toggle="modal" class="btn btn-default btn-border" style="float:right">Order Place</a>

                                          </div><!-- package-details-lt -->



                                      </div>



                                </div><!-- package-details -->

                              </div><!-- placed-order-details-wrapper -->

                            </div><!-- placed-order-box-main -->

                        </div><!-- tab-content-box -->
                    @endforeach

                    </div>
               

                </div>

            </div>

          </div><!-- col-md-5 -->

      </div>

      <!-- page content ends here -->
   </section><!-- /.content -->

@endsection

<div class="modal fade modal-center bd-example-modal-sm forgot" id="sign_social" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >



    <div class="modal-dialog modal-sm" role="document">



        <div class="modal-content">



            <div class="modal-body">



                 @php

                 $message=Session::get('message');

                 $status=Session::get('status');

                 @endphp

                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                 </button>



                 <h3 style="color: @if ($status=='Signup Failed') red @else green @endif ">{{$status}}</h3>



                 <p style="text-transform:capitalize;">{{ ucfirst($message)}}.</p>





            </div>



        </div>



    </div>



</div><!--End forgot -->





@section('js')

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)

<script>

$(function() {

    $('#sign_social').modal('show');

});

</script>

@endif
@endsection
