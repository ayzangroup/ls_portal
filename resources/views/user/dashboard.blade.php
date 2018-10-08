@extends('user.layouts.app')
@section('css')
<style>
.row{
      margin-bottom: 15px;
}
</style>
@endsection

@section('content')

    <section class="content container-fluid dashboard dashboard-wrapper">

      <!-- page content starts here -->      

            <div class="row">

                <div class="cards">
                  
                @php
                $i=1;
                @endphp  
                  @foreach($order as $orders)
                   @if($i <= 3)
                    <div class="col-md-4">

                        <div class="dashboard-card dashboard-btn">

                          <h2 class="dashboard-service-head">{{$i}}:- Order In Process</h2>

                          <div class="order-box">

                            <span>Order ID <span>{{$orders->orderId}}</span></span>

                            <a class="pull-right" href="#"></a>

                            <h4>{{$orders->serviceName}}</h4>

                            <p><b>Current Order Status:</b> Driver on the way to drop the laundry at launder</p>

                            <a class="btn btn-default" href="{{route('user.track',$orders->orderId)}}">Track Order</a>

                          </div><!-- order-box -->

                        </div><!-- dashboard-card -->

                    </div>
                  @endif
                  @php
                  $i++;
                  @endphp
                  @endforeach
                </div>
              </div>

                 <div class="row">

                <div class="cards">
                  @php
                  $i=1;
                  @endphp  
                  
                  @foreach($save_order as $save_orders)
                   @if($i <= 3)

                     <div class="col-md-4">

                        <div class="dashboard-card dashboard-btn">

                          <h2 class="dashboard-service-head">{{$i}}:- Saved Order</h2>

                          <div class="order-box">

                            <span>Order ID <span>{{$save_orders->orderId}}</span></span>

                            <h4>{{$save_orders->serviceName}}</h4>                         

                            @foreach($save_orders->order_items as $item_details)
                            <p>{{$item_details->quantity}} {{$item_details->itemName}}</p>
                            @endforeach

                           <a class="btn btn-default" href="{{route('user.save_order', $save_orders->orderId )}}">Checkout</a>



                          </div><!-- order-box -->

                        </div><!-- dashboard-card -->

                    </div>
                    @endif
                  @php
                  $i++;
                  @endphp
                  @endforeach

                  </div>
                </div>

              <div class="row">

                <div class="cards">
                  @php
                  $i=1;
                  @endphp  
                  
                  @foreach($fav_order as $fav_orders)
                   @if($i <= 3)

                     <div class="col-md-4">

                       <div class="dashboard-card dashboard-btn">

                          <h2 class="dashboard-service-head">{{$i}}:- Favorite order</h2>

                          <div class="order-box">

                            <span>Order ID <span>{{$fav_orders->orderId}}</span></span>                          

                            <h4>{{$fav_orders->serviceName}}</h4>

                            @foreach($fav_orders->order_items as $item_details)
                            <p>{{$item_details->quantity}} {{$item_details->itemName}}</p>
                            @endforeach

                            <a href="{{route('user.repeat_order',$fav_orders->orderId)}}" class="btn btn-default btn3">Repeat order</a>

                          </div><!-- order-box -->

                        </div><!-- dashboard-card -->

                    </div>
                  @endif
                  @php
                  $i++;
                  @endphp
                  @endforeach





                </div><!-- /.cards -->

            </div>

            

   

      

      <!-- page content ends here -->



    </section><!-- /.content -->



@endsection