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
           <h1 style="float:left;">Driver Profile</h1>

            @if($data->isAuthorized=='0')
            <span class="search-controls" style="float:right;">
                <a href="#" class="btn btn-default1 fill" > Unauthorised </a>  
            </span>
                            
         @else
        <span class="search-controls" style="float:right;">
            <a class="btn btn-default fill"  href="#" style="width:200px;" >Authorised</a>
        </span>
                    
                @endif
        </div>

        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info" style="background-color:#b2b8b9!important;border-color:#b2b8b9;">
                    <div class="row">
                        <label class="col-md-2">Driver Name :</label>
                        <div class="col-md-4"> {{ucfirst($data->driverName)}} </div>
                        <label class="col-md-2"> Email :</label>
                        <div class="col-md-4">{{ $data->email }} </i></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <label class="col-md-2">Mobile Number :</label>
                        <div class="col-md-4"> {{$data->phone}} </div>
                        <label class="col-md-2">State :</label>

                        <div class="col-md-4"> {{ucfirst($address->state)}} </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <label class="col-md-2">City :</label>
                        <div class="col-md-4"> {{ucfirst($address->city)}} </div>
                        <label class="col-md-2">Address :</label>
                        <div class="col-md-4"> {{ucfirst($address->companyAddress1)}} </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <label class="col-md-2">Pincode :</label>
                        <div class="col-md-4"> {{($address->pincode)}} </div>
                    </div>
                    <div class="clearfix"></div>  
                </div>

                 @if($data->licenseVerify=='0')
                        <span class="search-controls" style="float:right;">
                            <a href="#" class="btn btn-default1 fill" onclick="alertApprove<?php echo $i;?>(<?php echo $i;?>,{{ $data->driverId }})"> Approve License Card </a>  
                        </span>
                            
                         @else
                        <span class="search-controls" style="float:right;">
                            <a class="btn btn-default fill"  href="#" style="width:200px;" >Approved</a>
                        </span>
                    
                @endif
                    <h4 class="block" style="margin-bottom:30px;">License Detail</h4>
                    
                    <div class="alert alert-warning" style="background-color:#d2d6de! important;border-color: #d2d6de">
                        <div class="row">
                            <label class="col-md-3">License Number :</label>
                            <div class="col-md-4"> {{($data->licenseNumber)}}
                            </div>
                            <div class="col-md-4" style="text-align: center;">
                        <a href="{{ URL::asset('images/driverdocument_images/'.$data->licenseImage) }}" target="_blank"><img src="{{ URL::asset('images/driverdocument_images/'.$data->licenseImage) }}" style="height:200px; width:200px;" alt="Pan Image"></a>
                    </div>
                            
                        </div>
                    </div>
                                        
                    @if($data->nationalVerify == '0')
                                    
                    <span class="search-controls" style="float:right;">
                            <a href="#" class="btn btn-default1 fill" onclick="alertApprove<?php echo $k;?>(<?php echo $k;?>,{{ $data->driverId }})"> Approve Aadhar Card </a>  
                        </span>
                            
                         @else
                        <span class="search-controls" style="float:right;">
                            <a class="btn btn-default fill"  href="#" style="width:200px;" >Approved</a>
                        </span>
                    @endif

                    <h4 class="block" style="margin-bottom:30px;">Addhar Card Detail</h4>
                    
                    <div class="alert alert-warning" style="background-color:#9fb9d4! important;border-color: #9fb9d4">
                        <div class="row">
                            <label class="col-md-3">Aadhar Number :</label>
                            <div class="col-md-4"> {{($data->nationalIdNumber)}}  
                            </div>
                            <div class="col-md-4" style="text-align: center;">
                                <a href="{{ URL::asset('images/driverdocument_images/'.$data->UIDImage) }}" target="_blank"> <img src="{{ URL::asset('images/driverdocument_images/'.$data->UIDImage) }}" style="height:200px; width:200px;" alt="Aadher Image"></a>
                             </div>
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
                                url: APP_URL+"/admin/approve_driverdocument",
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
                                url: APP_URL+"/admin/approve_driverdocument",
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

