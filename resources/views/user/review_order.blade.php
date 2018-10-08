@extends('user.layouts.app')

@section('content')



<section class="content container-fluid dashboard">

      

      <!-- page content starts here -->    


       <div class="content-header">

           <h1>BOOK a LAUNDRY</h1>

       </div>



       <div class="common-background review-order-wrapper">

            

            <div class="steps">

              <ol>

                  <li class="green-steps">

                      <a href="{{url('user')}}">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Select Service</span>

                      </a>

                  </li><li class="green-steps">

                    @php
                    $orderId=Session::get('orderId');
                    $createdOn= time();
                    @endphp
                      <a href="{{route('user.edit_item',$orderId)}}">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Add Items</span>

                      </a>

                  </li><li class="green-steps">

                      <a href="{{route('user.schedule')}}">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Schedule</span>

                      </a>

                  </li><li class="step-border-none">

                      <a href="#">

                          <span class="step">4</span>

                          <span class="step-name">Review Order</span>

                      </a>

                  </li><li class="inactive">

                      <a href="#" class="none-margin">

                          <span class="step">5</span>

                          <span class="step-name">Payment</span>

                      </a>

                  </li>

              </ol>                

            </div><!-- steps -->



            <hr class="common-hr">



            <div class="cards common-card-head ">

              <h2 class="heading">Review Your Order</h2>

            </div>


            <p class="order-cart">You have selected 
              <span style="color:#026ab4;">{{$order->service_name}} 
              <a href="#edit_service{{$order->orderId}}" data-toggle="modal">
              <i class="fa fa-pencil"></i> 
              </a></span> services.
              <!-- forgot -->
            </p>

<div class="modal fade modal-center bd-example-modal-lg forgot" id="edit_service{{$order->orderId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                 </button>

                 <h3>Select the services</h3>

                 <form class="login_modal forgot_password" action="{{route('user.update_service')}}" method="post">

                  {{csrf_field()}}

                    <input type="hidden" name="id"  value="{{$order->orderId}}">

                     <div class="form-group">

                        @foreach($services as $service)
                          <div class="s-input s-input--rounded" style="margin:0px 10px !important;">

                            <input type="radio" name="service" id="{{$service->serviceName}}" value="{{$service->serviceId}}" @if ($service->serviceId == $order->serviceId ) checked @endif>

                            <label for="{{$service->serviceName}}">

                              <i class="aria-hidden">&nbsp;</i>

                              {{$service->serviceName}}

                            </label>

                          </div>
                        @endforeach

                    </div>

                        <button type="submit" class="readMore readMore_login">Submit</button>
                </form>
            </div>
        </div>



    </div>



</div><!--End forgot -->





              <div class="row">

              <div class="col-md-6 review-col">

                  <div class="calculator-details-box review-dtls">

                    <h4>Selected items <a href="{{route('user.edit_item',$orderId)}}"><i class="fa fa-pencil"></i> </a></h4>



                     <div class="calculator-estimate estimate-review">

                          <span class="name">Name</span>

                          <span class="quantity">Quantity</span>

                          <span class="price">Price</span>

                      </div><!-- calculator-estimate -->



                    <div class="calculator-details-price">
                      
                        <div class="calculator-estimate-box">                        
                          @foreach($order->orderDetail as $orderDetails)                            
                       

                            <div class="calculator-estimate">

                                <span>{{$orderDetails->itemName}}</span>

                                <span>{{$orderDetails->quantity}}</span>

                                <span>Rs. {{$orderDetails->subTotal}}.00</span>

                            </div><!-- calculator-estimate -->

                          @endforeach

                        </div><!-- calculator-estimate-box -->



                        <div class="estimate-total-box">

                            <div class="estimate-total">

                                <b>Sub Total</b>

                                <b>Rs. {{$order->orderValue}}.00</b>

                            </div>



                            <div class="estimate-total estimate-total-discount">

                                <span>GST 5%</span>

                                <span>Rs. {{($order->netAmount)-($order->orderValue)}}.00</span>

                            </div>

                            <div class="estimate-total estimate-total-discount">

                                <span>Discount 10%</span>

                                <span>Rs. 00.00</span>

                            </div>

                        </div>



                         <div class="estimate-total-box">

                            <div class="estimate-total">

                                <b>Grand Total</b>

                                <b>Rs. {{$order->netAmount}}.00</b>

                            </div>

                        </div>



                         

                    </div>

                </div>



              </div>


              <div class="col-md-6">

                <div class="pickup-review-box">



                <div class="col-md-6 review-col-pickup">

                  <div class="review-pickup-dtls">

                      <h4>Scheduled Pickup <a href="{{route('user.schedule')}}"><i class="fa fa-pencil"></i> </a></h4>

                    <div class="review-pickup-dtls-inner">

                          <span>Address</span>

                          <span class="common-pickup-dtls">{{$order->pickaddress}}, {{$order->pickcity}},{{$order->pickstate}} ({{$order->pickpincode}})</span>

                      </div><!-- review-pickup-dtls-inner -->



                      <div class="review-pickup-dtls-inner">

                          <span>Date</span>

                          <span  class="common-pickup-dtls">{{$order->pickup_date}}</span>

                      </div><!-- review-pickup-dtls-inner -->



                      <div class="review-pickup-dtls-inner">

                          <span>Time</span>

                          <span class="common-pickup-dtls">{{$order->pickupstarttime}} to {{$order->pickupendtime}}</span>

                      </div><!-- review-pickup-dtls-inner -->

                  </div><!-- review-pickup-dtls -->

                </div>



                <div class="col-md-6 review-col-delivery">

                  <div class="review-pickup-dtls">

                      <h4>Scheduled Delivery <a href="{{route('user.schedule')}}"><i class="fa fa-pencil"></i> </a></h4>



                      <div class="review-pickup-dtls-inner">

                          <span>Address</span>

                          <span class="common-pickup-dtls">{{$order->deliveraddress}}, {{$order->delivercity}},{{$order->deliverstate}} ({{$order->deliverpincode}})</span>

                      </div><!-- review-pickup-dtls-inner -->



                      <div class="review-pickup-dtls-inner">

                          <span>Date</span>

                          <span  class="common-pickup-dtls">{{$order->deliver_date}}</span>

                      </div><!-- review-pickup-dtls-inner -->



                      <div class="review-pickup-dtls-inner">

                          <span>Time</span>

                          <span class="common-pickup-dtls">{{$order->deliverstarttime}} to {{$order->deliverendtime}}</span>

                      </div><!-- review-pickup-dtls-inner -->

                  </div><!-- review-pickup-dtls -->  

                </div>

              </div>

            </div><!-- pickup-review-box -->

            

              <div class="clearfix"></div>



              <div class="col-md-12">

                <div class="checkout-save-btn">

                        <a href="{{route('user.schedule')}}" class="readMore">Back</a>

                        <a href="{{route('user.payments',$orderId)}}" class="readMore">Payment</a>

                    </div>

              </div>

              </div>



              <div class="clearfix"></div>

            

        

       </div>

   

      

      <!-- page content ends here -->



    </section><!-- /.content -->



@endsection