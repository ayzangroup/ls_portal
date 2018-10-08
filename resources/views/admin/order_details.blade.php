@extends('admin.layouts.app')

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/sweetalert.css')}}">



<style>

.btn-default1 {

    background: firebrick;

    color: #fff;

    width: 200px;

    height: 39px;

    border-radius: 50px;

    display: flex;

    -webkit-box-align: center;

    align-items: center;

    -webkit-box-pack: center;

    justify-content: center;

    text-transform: uppercase;

    transition: all ease-in-out 0.3s;

    font-weight: bold;

    font-size: 15px;

    line-height: initial;

    border: none;

}

</style>

@endsection

@section('content')

@php $j=1; @endphp

@php $i=2; @endphp

@php $k=3; @endphp



<div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">Order Detail</h1>

        @if($order->status == 8)
           <h4 style="float:right;color:#20c882">Cancel Order</h4>
        @endif
        @if($order->status == 3)
           <h4 style="float:right;color:#20c882">Order in process </h4>
        @endif
        </div>



        <div class="box">

            <!-- /.box-header -->

            <div class="box-body">


            @if($order->userType=='user')

                <div class="alert alert-info" style="background-color:#b2b8b9!important;border-color:#b2b8b9;">


                    @if($order->user_details != '')
                    <div class="row">

                        <label class="col-md-2">User Name :</label>

                        <div class="col-md-4"> {{ucfirst($order->user_details->indvCustName)}} </div>

                        <label class="col-md-2"> Email :</label>

                        <div class="col-md-4">{{ $order->user_details->indvCustEmail }} </i></div>

                    </div>

                    <div class="clearfix"></div>



                    <div class="row">

                        <label class="col-md-2">Mobile Number :</label>

                        <div class="col-md-4"> {{$order->user_details->indvCustMobile}} </div>

                        <label class="col-md-2">User Type :</label>

                        <div class="col-md-4"> User </div>

                    </div>

                    <div class="clearfix"></div>
                @endif

            </div>

            @elseif($order->userType=='corp')

            <div class="alert alert-info" style="background-color:#b2b8b9!important;border-color:#b2b8b9;">

                    @if($order->corp_details != '')
                    <div class="row">

                        <label class="col-md-2">User Name :</label>

                        <div class="col-md-4"> {{ucfirst($order->corp_details->concernPerson)}} </div>

                        <label class="col-md-2"> Email :</label>

                        <div class="col-md-4">{{ $order->corp_details->corpoarateEmail }} </i></div>

                    </div>

                    <div class="clearfix"></div>



                    <div class="row">

                        <label class="col-md-2">Mobile Number :</label>

                        <div class="col-md-4"> {{$order->corp_details->concerPersonMobile}} </div>

                        <label class="col-md-2">User Type :</label>

                        <div class="col-md-4"> Corporate </div>

                    </div>

                    <div class="clearfix"></div>
                    @endif
            </div>


            @endif

            <h4 class="block" style="margin-bottom:30px;">Pick Up Detail</h4>

                    

                    @if($order->pickId !='')
                    <div class="alert alert-warning" style="background-color:#9fb9d4! important;border-color: #9fb9d4">

                        <div class="row">

                        <label class="col-md-2">PickUp Date :</label>

                        <div class="col-md-4"> {{$order->pickId->actPickUpDate}} </div>

                        <label class="col-md-2">PickUp Start Time :</label>

                        <div class="col-md-4"> {{$order->pickId->pickupStartTimestamp}} </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="row">

                        <label class="col-md-2">PickUp End Time :</label>

                        <div class="col-md-4"> {{$order->pickId->pickupEndTimestamp}} </div>

                        @if($order->pickId->pickaddress != '')
                        <label class="col-md-2">PickUp address:</label>

                        <div class="col-md-4"> {{$order->pickId->pickaddress->companyAddress1}},{{$order->pickId->pickaddress->companyAddress2}},{{$order->pickId->pickaddress->state}},{{$order->pickId->pickaddress->city}},({{$order->pickId->pickaddress->pincode}}) </div>
                        @endif

                        </div>

                        <div class="clearfix"></div>

                    </div>
                    @endif


            <h4 class="block" style="margin-bottom:30px;">Deliver Detail</h4>

                    

                    <div class="alert alert-warning" style="background-color:#d2d6de! important;border-color: #9fb9d4">

                        <div class="row">

                        <label class="col-md-2">Deliver Date :</label>

                        <div class="col-md-4"> {{$order->deliverId->actDeliveryDate}} </div>

                        <label class="col-md-2">Deliver Start Time :</label>

                        <div class="col-md-4"> {{$order->deliverId->deliveryStartTime}} </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="row">

                        <label class="col-md-2">Deliver End Time :</label>

                        <div class="col-md-4"> {{$order->deliverId->deliveryEndTime}} </div>

                        @if($order->deliverId->deliveraddress != '')
                        <label class="col-md-2">Deliver address:</label>

                        <div class="col-md-4"> {{$order->deliverId->deliveraddress->companyAddress1}},{{$order->deliverId->deliveraddress->companyAddress2}},{{$order->deliverId->deliveraddress->state}},{{$order->deliverId->deliveraddress->city}},({{$order->deliverId->deliveraddress->pincode}}) </div>
                        @endif

                        </div>

                        <div class="clearfix"></div>

                    </div>

            <h4 class="block" style="margin-bottom:30px;">Item Details</h4>

                    <div class="alert alert-warning" style="background-color:#666! important;border-color: #666">

                        <div class="row">

                        <label class="col-md-3"><h4>Service Name:</h4></label>

                        <label class="col-md-3"><h4>{{$order->service->serviceName}}</h4></label>

                        </div>

                        <div class="clearfix"></div>

                        <div class="row">

                        <label class="col-md-4">Item Name</label>

                        <label class="col-md-4">Item Quantity</label>

                        <label class="col-md-4">Item Price</label>

                        </div>

                        <div class="clearfix"></div>

                        @foreach($order->itemDetails as $items)
                        <div class="row">

                        <label class="col-md-4">{{$items->itemName}}</label>

                        <label class="col-md-4">{{$items->quantity}}</label>

                        <label class="col-md-4">{{ceil($items->rate)}}</label>

                        </div>

                        <div class="clearfix"></div>
                        @endforeach

                         <div class="row">

                        <label class="col-md-4"></label>

                        <label class="col-md-4">Sub Total:</label>

                        <label class="col-md-4">{{$order->orderValue}}</label>

                        </div>

                        <div class="clearfix"></div>

                        <div class="row">

                        <label class="col-md-4"></label>

                        <label class="col-md-4">Tax (5%):</label>

                        <label class="col-md-4">{{($order->netAmount)-($order->orderValue)}}</label>

                        </div>

                        <div class="clearfix"></div>

                        <div class="row">

                        <label class="col-md-4"></label>

                        <label class="col-md-4">Total:</label>

                        <label class="col-md-4">{{$order->netAmount}}</label>

                        </div>

                        <div class="clearfix"></div>

                    </div>

        </div>


    </div>


        <!-- addres-dtls-first -->



    </section>

    </div>

    <!-- commonBox -->



<!-- page content ends here -->



@section('js')

<script src="{{ URL::asset('js/sweetalert.min.js')}}"></script>

<script>



            function alertApprove<?php echo $i;?>(index,user_id){

                

                                

                var APP_URL = {!! json_encode(url('/')) !!}

                var token=$('input[name="_token"]').val();

                swal({

                        title: "Are you sure?",

                        text: "You approve License CARD!",

                        type: "warning",

                        showCancelButton: true,

                        closeOnConfirm: false,

                        confirmButtonText: "Yes, approve it!",

                        showLoaderOnConfirm: true,

                    },

                    function(){

                        $.ajax(

                            {

                                type: "post",

                                url: APP_URL+"/admin/approve_document",

                                data: {user_id:user_id,index:index,_token:token},

                                success: function(data){

                                    $("#share-records-image"+index).hide();

                                }

                            }

                        )

                            .done(function(data) {

                                swal("success!", "Approve successfully !", "success");

                                $('#orders-history').load(document.URL +  ' #orders-history');

                                

                                location.reload(true);

                            })

                            .error(function(data) {

                                swal("Oops", "We couldn't connect to the server!", "error");

                            });

                    });

            };

        </script>

<script>



            function alertApprove<?php echo $k;?>(index,user_id){

                

                                

                var APP_URL = {!! json_encode(url('/')) !!}

                var token=$('input[name="_token"]').val();

                swal({

                        title: "Are you sure?",

                        text: "You approve AADHAR CARD!",

                        type: "warning",

                        showCancelButton: true,

                        closeOnConfirm: false,

                        confirmButtonText: "Yes, approve it!",

                        showLoaderOnConfirm: true,

                    },

                    function(){

                        $.ajax(

                            {

                                type: "post",

                                url: APP_URL+"/admin/approve_document",

                                data: {user_id:user_id,index:index,_token:token},

                                success: function(data){

                                    $("#share-records-image"+index).hide();

                                }

                            }

                        )

                            .done(function(data) {

                                swal("success!", "Approve successfully !", "success");

                                $('#orders-history').load(document.URL +  ' #orders-history');

                                

                                location.reload(true);

                            })

                            .error(function(data) {

                                swal("Oops", "We couldn't connect to the server!", "error");

                            });

                    });

            };

        </script>

@endsection

@endsection



