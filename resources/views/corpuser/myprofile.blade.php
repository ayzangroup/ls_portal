@extends('corpuser.layouts.app')

@section('content')



<section class="content container-fluid dashboard">



<!-- page content starts here -->



<div class="content-header">

    <h1>My Profile</h1>

</div>



    @php

            $corpuser=Auth::guard('corpuser')->user();                

    @endphp

<div class="common-background manageAdress userProfileWrapper" >

    <div class="commonBox">



        <div class="addres-dtls-first">

            <div class="profile-box">

                <a href="#" class="profile-img">

                    @if(!empty($corpuser->socialImage))

                        <img src="{{$corpuser->socialImage}}" class="user-image " alt="User Image" >

                    @else

                        <img src="{{ URL::to('/') }}/dist/img/user.png" class="user-image " alt="User Image">

                        <span class="profile-change-overlay"><i class="fa fa-pencil" aria-hidden="true"></i></span>

                    @endif



                </a><!-- profile-img -->



                <div class="profile-text">

                    <h4 class="data-edit">{{ $corpuser->concernPerson }}

                    @if(empty($corpuser->socialImage))

                        <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                    @endif

                    </h4>

                    

                </div>

            </div><!-- profile-box -->



        <div class="clearfix"></div>

            <div class="data-section row" >

                

                <div class="col-sm-2">Email</div>

                <div class="col-sm-10">

                    <span class="data-edit">{{ $corpuser->corpoarateEmail }}

                    </span>

                </div>

                

                <div class="col-sm-2">Phone No.</div>

                <div class="col-sm-10">

                    <span class="data-edit">{{ $corpuser->concerPersonMobile }}

                    <a href="#change_phone" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                    </span>

                </div>


                <div class="change-password-link">

                    <a href="#change_password" data-toggle="modal">Change Password</a>

                </div>

                

            </div>

        </div>

        <!-- addres-dtls-first -->





    </div>

    <!-- commonBox -->



</div>



<!-- page content ends here -->



</section>





<!-- Edit Model -->



                                <div class="modal fade" id="change_password" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-md">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Change Password</h4>

                                                </div>

                                            <form action="{{route('corpuser.update_password')}}"  method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body">

                                                    <label >Password:<span class="required"> * </span></label>

                                                </div>

                                                <div class="modal-body"> 

                                                    <input type="password" name="password"  class="form-control" placeholder="New Password" />

                                                </div>

                                                <div class="modal-body">

                                                <input type="password" name="Cnfpassword" class="form-control"  placeholder="Confirm New Password"  />

                                                </div>

                                                <input type="hidden" name="id" value="{{$corpuser->corpCustId}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                                                    <input type="submit" class="btn green">

                                                </div>

                                                <div class="msg" >

                                                    <p class="error_msg" id="error_msg"></p>

                                                </div>

                                            </form>

                                            </div>

                                    </div>

                                </div>



                                <!-- Edit Model -->



                                <div class="modal fade" id="change_phone" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog modal-sm">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Update Phone</h4>

                                                </div>

                                            <form action="{{route('corpuser.update_phone')}}"  method="post">

                                            {{csrf_field() }}

                                                <div class="modal-body">

                                                    <label >Phone Number:<span class="required"> * </span></label>

                                                </div>

                                                <div class="modal-body"> 

                                                    <input type="text" name="phone" class="form-control" value="{{ $corpuser->indvCustMobile }}" required="required">

                                                </div>

                                                <input type="hidden" name="id" value="{{$corpuser->corpCustId}}">

                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

                                                    <input type="submit" class="btn green">

                                                </div>

                                            </form>

                                            </div>

                                    </div>

                                </div>





<div class="modal fade modal-center bd-example-modal-lg forgot" id="sign_social" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >



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



                 <h3 style="color: @if ($status=='Profile Update Failed') red @else green @endif ">{{$status}}</h3>



                 <p style="text-transform:capitalize;">{{ ucfirst($message)}}.</p>





            </div>



        </div>



    </div>



</div><!--End forgot -->

@endsection





@section('js')

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 6)

<script>

$(function() {

    $('#sign_social').modal('show');

});

</script>

@endif

@endsection

