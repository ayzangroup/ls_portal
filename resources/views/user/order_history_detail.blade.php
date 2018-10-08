@extends('user.layouts.app')

@section('content')


            <section class="content container-fluid dashboard">

                <!-- page content starts here -->

                <div class="content-header">
                    <h1>view order details</h1>
                </div>

                <div class="common-background order-history viewOrderDetails">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="tab-content-box">

                                <div class="placed-order-box-main">
                                    <div class="placed-order-details-wrapper">


                                        
                                        <div class="placed-order-details">
                                            <div class="placed-order-top-head">
                                                <div class="placed-order-top-head-lt">
                                                    <ul>
                                                        <li>

                                                              <span class="product-label">Order PickUp Date</span>

                                                              <span class="label-details">{{date('d M Y', strtotime(str_replace('-','/',$order->pickup_date)))}}</span>

                                                          </li>

                                                          <li>

                                                              <span class="product-label">Order Deliver Date</span>

                                                              <span class="label-details">{{date('d M Y', strtotime(str_replace('-','/',$order->deliver_date)))}}</span>

                                                        </li>
                                                        <li>
                                                            <span class="product-label">Receipt to</span>
                                                            <span class="label-details"><a href="#">John</a></span>
                                                        </li>
                                                        <li>
                                                            <span class="product-label">ORDER NO</span>
                                                            <span class="label-details">#{{$order->orderId}}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- placed-order-top-head-lt -->
                                            </div>
                                            <!-- placed-order-top-head -->
                                        </div>
                                        <!-- placed-order-details -->

                                        <div class="package-details">
                                            <div class="col-lg-8 col-md-8">
                                                <div class="package-details-rt">
                                                    <h5>In Progress</h5>
                                                    <p>Your package was in progress</p>
                                                    <div class="package-details-rt-inner">
                                                        <div class="package-details-rt-inner-rt">
                                                            <div class="package-details-rt-img">
                                                                <img src="{{URL::asset('images/services_images/'.$order->service_image)}}" alt="" class="img-responsive">
                                                            </div>
                                                        </div>
                                                        <!-- package-details-rt-inner-rt -->
                                                        <div class="package-details-rt-inner-lt">
                                                            <h5><a href="#">{{$order->service_name}}</a></h5>
                                                            <span class="price">&#8377; {{$order->netAmount}}.00</span>
                                                        </div>
                                                        <!-- package-details-rt-inner-lt -->
                                                    </div>
                                                    <!-- package-details-rt-inner -->
                                                </div>
                                                <!-- package-details-rt -->
                                            </div>

                                            <div class="col-lg-4 col-md-4">
                                                <div class="package-details-lt">
                                                    <a href="{{route('user.track',$order->orderId)}}" class="btn btn-default">Track Laundry </a>
                                                    <a href="{{route('user.complaint')}}" class="btn btn-default btn-border">File a Complaint</a>
                                                    <a href="#cancel_order{{$order->orderId}}" data-toggle="modal" class="btn btn-default btn-border">Cancel Order</a>
                                                </div>
                                                <!-- package-details-lt -->
                                            </div>

                                                <!--cancel  model -->
                                                <div class="modal fade modal-center bd-example-modal-sm forgot" id="cancel_order{{$order->orderId}}" tabindex="-1"  aria-hidden="true" role="basic" >

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
                                                                        <input type="hidden" name="orderId" value="{{$order->orderId}}"> 

                                                                        <button type="submit" class="readMore readMore_login" style="width: 100px;height: 35px;border-radius: 10px;">submit</button>

                                                                </form>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div><!--End modal --> 

                                        </div>
                                        <!-- package-details -->
                                    </div>
                                    <!-- placed-order-details-wrapper -->

                                </div>
                                <!-- placed-order-box-main -->

                                <div class="row top-space-wrapper">
                                    <div class="col-md-4 review-col">
                                        <div class="calculator-details-box review-dtls">
                                            <h4>Selected items</a></h4>

                                            <div class="calculator-estimate estimate-review">
                                                <span class="name">Name</span>
                                                <span class="quantity">Quantity</span>
                                                <span class="price">Price</span>
                                            </div>
                                            <!-- calculator-estimate -->

                                            <div class="calculator-details-price">
                                                <div class="calculator-estimate-box">

                                                @foreach($order->orderDetail as $orders)
                                                    <div class="calculator-estimate">
                                                        <span>{{$orders->itemName}}</span>
                                                        <span>{{$orders->quantity}}</span>
                                                        <span>Rs. {{$orders->rate}}.00</span>
                                                    </div>
                                                    <!-- calculator-estimate -->
                                                @endforeach

                                                </div>
                                                <!-- calculator-estimate-box -->

                                                <div class="estimate-total-box">
                                                    <div class="estimate-total">
                                                        <b>Sub Total</b>
                                                        <b>Rs. {{$order->orderValue}}.00</b>
                                                    </div>

                                                    <div class="estimate-total estimate-total-discount">
                                                        <span>GST 5%</span>
                                                        <span>Rs.{{$order->netAmount-$order->orderValue}}.00</span>
                                                    </div>
                                                    <div class="estimate-total estimate-total-discount">
                                                        <span>Discount 10%</span>
                                                        <span>Rs. 00.00</span>
                                                    </div>
                                                </div>

                                                <div class="estimate-total-box">
                                                    <div class="estimate-total">
                                                        <b>Grand Total</b>
                                                        <b>Rs.{{$order->netAmount}}.00</b>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-8">
                                        <div class="pickup-review-box">

                                            <div class="col-md-6 review-col-pickup">
                                                <div class="review-pickup-dtls">
                                                    <h4>Scheduled Pickup</a></h4>
                                                    <div class="review-pickup-dtls-inner">
                                                        <span>Address</span>
                                                        <span class="common-pickup-dtls">{{$order->pickaddress}}, {{$order->pickcity}}, {{$order->pickstate}} ({{$order->pickpincode}}) </span>
                                                    </div>
                                                    <!-- review-pickup-dtls-inner -->

                                                    <div class="review-pickup-dtls-inner">
                                                        <span>Date</span>
                                                        <span class="common-pickup-dtls">{{date('d M Y', strtotime(str_replace('-','/',$order->pickup_date)))}}</span>
                                                    </div>
                                                    <!-- review-pickup-dtls-inner -->

                                                    <div class="review-pickup-dtls-inner">
                                                        <span>Time</span>
                                                        <span class="common-pickup-dtls">{{$order->pickupstarttime}} to {{$order->pickupendtime}}</span>
                                                    </div>
                                                    <!-- review-pickup-dtls-inner -->
                                                </div>
                                                <!-- review-pickup-dtls -->
                                            </div>

                                            <div class="col-md-6 review-col-delivery">
                                                <div class="review-pickup-dtls">
                                                    <h4>Scheduled Delivery</a></h4>

                                                    <div class="review-pickup-dtls-inner">
                                                        <span>Address</span>
                                                        <span class="common-pickup-dtls">{{$order->deliveraddress}}, {{$order->delivercity}}, {{$order->deliverstate}} ({{$order->deliverpincode}})</span>
                                                    </div>
                                                    <!-- review-deliverup-dtls-inner -->

                                                    <div class="review-pickup-dtls-inner">
                                                        <span>Date</span>
                                                        <span class="common-pickup-dtls">{{date('d M Y', strtotime(str_replace('-','/',$order->deliver_date)))}}</span>
                                                    </div>
                                                    <!-- review-pickup-dtls-inner -->

                                                    <div class="review-pickup-dtls-inner">
                                                        <span>Time</span>
                                                        <span class="common-pickup-dtls">{{$order->deliverstarttime}} to {{$order->deliverendtime}}</span>
                                                    </div>
                                                    <!-- review-pickup-dtls-inner -->
                                                </div>
                                                <!-- review-pickup-dtls -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- pickup-review-box -->

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                            <!-- tab-content-box -->

                        </div>
                    </div>
                </div>

                <!-- page content ends here -->

            </section>
@endsection