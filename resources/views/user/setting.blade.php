@extends('user.layouts.app')

@section('content')

 @php

$user=Auth::guard('user')->user();

$notification=$user->userNotification;

$notification_old=$user->userNotification_old;                

@endphp



<section class="content container-fluid dashboard">



                <!-- page content starts here -->



                <div class="content-header">

                    <h1>Setting</h1>

                </div>



                <div class="common-background manageAdress">

                    <div class="commonBox">



                        <div class="addres-dtls-first">

                            <div class="profile-box">

                                <div class="profile-img">

                                    @if(!empty($user->socialImage))

                                      <img src="{{$user->socialImage}}" class="user-image " alt="User Image" >

                                      @else

                                      <img src="{{ URL::to('/') }}/dist/img/user.png" class="user-image " alt="User Image">

                                      @endif

              

                                </div><!-- profile-img -->



                                <div class="profile-text">

                                    <h4>{{ $user->indvCustName }}</h4>

                                    <span class="ls-email">{{ $user->indvCustEmail }}</span>

                                </div>

                            </div><!-- profile-box -->

                        </div>

                        <!-- addres-dtls-first -->



                        <div class="clearfix"></div>

                        <hr>



                        <div class="cards">

                            <h2 class="heading">Manage Address</h2>

                            <a href="{{route('user.address')}}" class="add-address btn-default">Add Address</a>

                        </div>



                        <div class="row">

                          @foreach($address as $details)  

                            <div class="col-md-4">

                                <div class="address-box edit-box" id="dafaultfirst">

                                    <div class="address-box-inner-warp">

                                        <div class="s-input s-input--rounded">

                                            <label for="home">

                                                {{ucfirst($details->addressType)}}

                                            </label>

                                        </div>



                                        <div class="address-box-inner">

                                            <span>Name</span>

                                            <span class="dtls-address">{{ $user->indvCustName }}</span>

                                        </div>

                                        <!-- address-box-inner -->



                                        <div class="address-box-inner">

                                            <span>Email</span>

                                            <span class="dtls-address">{{ $user->indvCustEmail }}</span>

                                        </div>

                                        <!-- address-box-inner -->



                                        <div class="address-box-inner">

                                            <span>Address</span>

                                            <span class="dtls-address">{{$details->companyAddress1}}, {{$details->city}}, 

                                                {{$details->state}} ({{$details->pincode}})

                                            </span>

                                        </div>

                                        <!-- address-box-inner -->



                                         <div class="address-box-inner">

                                            <ul>

                                                <li><a href="{{route('user.edit_address',$details->uniqueId)}}">Edit</a></li>

                                                <li><a href="{{route('user.delete_address',$details->uniqueId)}}">Delete</a></li>

                                            </ul>

                                        </div>

                                        <!-- address-box-inner -->



                                    </div>

                                    <!-- address-box-inner-warp -->

                                </div>

                                <!-- address-box -->

                            </div>

                        @endforeach



                        </div>

                        <!-- row -->

                        <div class="clearfix"></div>

                        

                        <hr>



                        <div class="clearfix"></div>



                        <div class="payment-wrapper wrapper-pay">

                            <h4>Qucik Pay</h4>



                            <div class="row">

                                <div class="col-md-5 tab-width-box">

                                    <div class="bank-dtls-cd">   

                                      <h3>Credit/Debit Cards <span><a href="#"><i class="fa fa-pencil"></i></a></span></h3>                                    

                                        <div class="bank-dtls-inner">

                                            <div class="bank-dtls-inner-img">

                                                <img src="{{URL::asset('dist/img/ms-card.png')}}" alt="">

                                            </div>



                                            <div class="bank-dtls-inner-text">

                                                <h5>Union bank of india</h5>

                                                <span>xxxx-xxxx-xxxx-5687 | Exp on 2/20</span>

                                            </div>



                                            <div class="bank-dtls-inner-close">

                                                <a href="#">

                                                    <i class="fa fa-times"></i>

                                                </a>

                                            </div><!-- bank-dtls-inner-close -->





                                        </div><!-- bank-dtls-inner -->





                                         <div class="bank-dtls-inner">

                                            <div class="bank-dtls-inner-img">

                                                <img src="{{URL::asset('dist/img/visa.png')}}" alt="">

                                            </div>



                                            <div class="bank-dtls-inner-text">

                                                <h5>Union bank of india</h5>

                                                <span>xxxx-xxxx-xxxx-5687 | Exp on 2/20</span>

                                                <span class="expired">Expired</span>

                                            </div>

                                            <div class="bank-dtls-inner-close">

                                                <a href="#">

                                                    <i class="fa fa-times"></i>

                                                </a>

                                            </div><!-- bank-dtls-inner-close -->

                                        </div><!-- bank-dtls-inner -->





                                    </div><!-- bank-dtls-cd -->



                                </div><!-- col-md-4 -->





                                <div class="col-md-5 tab-width-box">

                                   <div class="bank-dtls-cd">   

                                      <h3>Net Banking <span><a href="#"><i class="fa fa-pencil"></i></a></span></h3>



                                        <div class="bank-dtls-inner net_banking">

                                            <a href="#">

                                                <img src="{{URL::asset('dist/img/hdfc-bank.jpg')}}" alt="">

                                            </a>

                                        </div><!-- bank-dtls-inner -->





                                        <div class="bank-dtls-inner net_banking">

                                            <a href="#">

                                                <img src="{{URL::asset('dist/img/icici-bank.jpg')}}" alt="">

                                            </a>

                                        </div><!-- bank-dtls-inner -->









                                    </div>

                                </div>















                            </div>



                        </div>



                        <hr>





                        <div class="payment-wrapper" id="notification">

                            <h4>Notifications</h4>

                        </div>



                        <div class="notifications-box" id="scrollbaar">


                    @if(count($notification) != '0' || count($notification_old) != '0' )
                        @foreach($notification as $message)

                            <div class="notify-inner unread">

                                <img src="{{$message->notificationDetail->image}}" style="width: 50px;height: 50px;border-radius: 50%;" class="user-image " alt="User Image">

                                <div class="notification-inner">

                                    <h4>{{$message->notificationDetail->title}} <span>{{date("d/m/Y H:i:s", strtotime($message->notificationDetail->created_at))}}</span></h4>

                                    <p>{{$message->notificationDetail->message}}  </p>

                                </div><!-- notification-inner -->

                            </div><!-- notify-inner -->



                        @endforeach

                        @foreach($notification_old as $message_old)

                            <div class="notify-inner ">

                                <img src="{{$message_old->notificationDetail->image}}" style="width: 50px;height: 50px;border-radius: 50%;" class="user-image " alt="User Image">

                                <div class="notification-inner">

                                    <h4>{{$message_old->notificationDetail->title}} <span>{{date("M d,Y (h:i A)", strtotime($message_old->notificationDetail->created_at))}}</span></h4>

                                    <p>{{$message_old->notificationDetail->message}}  </p>

                                </div><!-- notification-inner -->

                            </div><!-- notify-inner -->



                        @endforeach

                    @else
                    <div class="notify-inner unread">

                                <div class="notification-inner">

                                    <p style="color:#ccc;text-size:12px;">Any Notification is not found. </p>

                                </div><!-- notification-inner -->

                            </div><!-- notify-inner -->
                    @endif





                           



                           



                        </div><!-- notifications-box -->

                        



                    </div>

                    <!-- commonBox -->



                </div>



                <!-- page content ends here -->



            </section>



@endsection