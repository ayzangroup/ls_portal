<!-- login -->



<div class="modal fade modal-center bd-example-modal-lg" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-lg login-dialog" role="document">



    <div class="modal-content">     



      <div class="modal-body">



         <button type="button" class="close" data-dismiss="modal" aria-label="Close">



          <span aria-hidden="true">&times;</span>



        </button>



            <form class="login_modal login_modal12" id="login_form" action="{{route('login')}}" method="post">

                {{csrf_field()}}

                <div class="login_signUp">



                  <a href="{!! url('auth/facebook') !!}" class="login_signUp_custom"><i class="fa fa-facebook" aria-hidden="true"></i>

                      <span> Log in with Facebook</span>

                  </a>



                  <a href="{!! url('auth/google') !!}" class="login_signUp_custom google"><i class="fa fa-google" aria-hidden="true"></i><span>Log in with Google</span>

                  </a>





                </div>



                <div class="or_modal"><span>or</span></div>





            

                <div class="form-group">



                    <input type="email" class="form-control"  placeholder="Email Address" name="email">



                </div>



                <div class="form-group">



                    <input type="Password" class="form-control"  placeholder="Password" name="password">

                    <input type="hidden" name="web_player_id" id="login_player_field">



                </div>



                <div class="form-group remb-forgot">



                    <div class="form-check checkbox-laundery remember">



                      <input class="form-check-label" type="checkbox" id="remember-me">



                      <label for="remember-me" class="block"><span>Remember Me</span></label>



                    </div>



                </div>



                <div class="form-group">



                    <button type="submit" class="readMore readMore_login">Log in</button>



                </div>

            </form>  



                <div class="form-group text-center">



                    <div class="form-check form-check1">



                      <label class="form-check-label">



                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#forgot" >Forgot password?</a>



                      </label>



                    </div>



                </div>



                <p class="text-center">Don’t have an account? <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#signUp" class="sign_up_modal">Sign up</a></p>



            



      </div>



    </div>



  </div>



</div> <!-- end login -->











<!-- forgot -->



<div class="modal fade modal-center bd-example-modal-lg forgot" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >



    <div class="modal-dialog modal-lg" role="document">



        <div class="modal-content">



            <div class="modal-body">



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                    <span aria-hidden="true">&times;</span>



                 </button>



                 <h3>Reset Password</h3>



                 <p>Please enter your email address. You will receive a link to create a new password via email.</p>







                 <form class="login_modal forgot_password" action="{{route('forgot_password')}}" method="post">

                  {{csrf_field()}}



                     <div class="form-group">



                        <input type="email" name="email" class="form-control"  placeholder="Email Address">



                    </div>



                        <button type="submit" class="readMore readMore_login">Send</button>



                </form>



            </div>



        </div>



    </div>



</div><!--End forgot -->











<!-- signUp -->



<div class="modal fade modal-center bd-example-modal-lg forgot" id="signUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >



    <div class="modal-dialog modal-lg" role="document">



        <div class="modal-content">



            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                    <span aria-hidden="true">&times;</span>



                 </button>







                 <form class="login_modal">



                 <div class="login_signUp">



                    <a href="{!! url('auth/facebook') !!}" class="login_signUp_custom"><i class="fa fa-facebook" aria-hidden="true"></i>

                      <span> Log in with Facebook</span>

                  </a>







                    <a href="{!! url('auth/google') !!}" class="login_signUp_custom google"><i class="fa fa-google" aria-hidden="true"></i><span>Log in with Google</span>

                  </a>



            



                    <div class="or_modal"><span>or</span></div>



                 



                    <button  class="login_signUp_custom email" data-toggle="modal" data-dismiss= "modal" data-target="#signupmodal"><i class="fa fa-envelope" aria-hidden="true"></i><span>Sign up with Email</span></button>



                     </div>



                 <hr>







                 <p class="text-center">Already have an account? <a href="#" class="sign_up_modal" data-toggle="modal" data-dismiss= "modal" data-target="#login">Log in</a></p>



                </form>



            </div>



        </div>



    </div>



</div><!-- End signUp -->











<!-- signupmodal -->

    <div class="modal fade modal-center bd-example-modal-lg forgot" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

        aria-hidden="true">

        <div class="modal-dialog modal-lg login-dialog" role="document">

            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <form class="login_modal signup_facebook_option login_signUp12" method="post" action="{{route('register')}}">

                        {{csrf_field()}}

                        <div class="first_signUp_form" id="first_signUp_form">

                            <p class="text-center">Sign up with

                                <a href="{!! url('auth/facebook') !!}" class="sign_up_modal">Facebook</a> or

                                <a href="{!! url('auth/google') !!}" class="sign_up_modal">Google</a>

                            </p>

                            @php
                            $refer_code=Session::get('refer_code');
                            @endphp

                            <input type="hidden" name="refer_code" value="{{$refer_code}}"> 

                            <div class="or_modal">

                                <span>or</span>

                            </div>



                            <div class="form-group select-option" id="account-type-radio">

                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="userType" id="individual" value="user" checked>

                                    <label class="form-check-label" for="individual">Individual</label>

                                </div>

                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="userType" id="corporate" value="corp">

                                    <label class="form-check-label" for="corporate">corporate</label>

                                </div>

                            </div>



                            <div class="hide-corporate">

                                <div class="form-group">

                                    <input type="text" name="name" class="form-control" placeholder="Name">

                                </div>



                                <div class="form-group">

                                    <input type="text" name="phone" class="form-control" placeholder="Mobile Number">

                                </div>



                                <div class="form-group">

                                    <input type="email" name="email" class="form-control" placeholder="Email">

                                </div>



                            </div>

                            <div class="hidden-box-signup hide_individual">

                                <div class="form-group">

                                    <input type="text" name="companyname" class="form-control" placeholder="Company Name">

                                </div>

                                <div class="form-group">

                                    <input type="email" name="email1" class="form-control" placeholder="Email">

                                </div>
                                <div class="form-group">

                                    <input type="text" name="concernemail" class="form-control" placeholder="Concerm Email Id">

                                </div>

                                <div class="form-group">

                                    <input type="text" name="concernperson" class="form-control" placeholder="Concern Person Name">

                                </div>


                                <div class="form-group">

                                    <input type="text" name="mobile" class="form-control" placeholder="Concern Person Mobile Number">

                                </div>

                            </div>

                            <div class="form-group">

                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">

                            </div>



                            <div class="form-group">

                                <input type="password" name="confirmPassword" id="confirmpasswrd" class="form-control" placeholder="Confirm Password">

                            </div>

                            <button type="button" id="form_continue" class="readMore readMore_login">Continue</button>

                        </div>

                        <div class="second_form" id="second_signUp_form">

                            <h3> <span id="return_form_first"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>Address</h3>

                            <div class="form-group">

                                <input type="text" name="line1" class="form-control" placeholder="Line 1">

                            </div>

                            <div class="form-group">

                                <input type="text" name="line2" class="form-control" placeholder="Line 2">

                            </div>



                            <div class="form-group">

                                <input type="text" name="city" class="form-control" placeholder="City">

                            </div>

                            <div class="form-group">

                                <input type="text" name="state" class="form-control" placeholder="State">

                            </div>

                            <div class="form-group">

                                <input type="text" name="pinCode" class="form-control" placeholder="Pin Code" >

                            </div>



                            <div class="clearfix"></div>

                            <div class="form-group remb-forgot">

                                <div class="form-check checkbox-laundery remember remember-signup">

                                    <input class="form-check-label" type="checkbox" id="click" checked>

                                    <label for="click" class="block agree-condtions">

                                        <span>By clicking Sign up, you agree to Launder Services'

                                            <a href="{{route('terms_and_condition')}}" class="sign_up_modal">Terms of Services</a> &amp;

                                            <a href="{{route('privacy_policy')}}" class="sign_up_modal">Privacy Policy.</a>

                                        </span>

                                    </label>

                                </div>

                            </div>

                            <div class="second_form_btn">

                                <!-- <button type="button" id="return_form_first" class="readMore readMore_login">Back</button> -->

                                <button type="submit" class="readMore readMore_login">Submit</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- signupmodal -->





<!-- message -->



<div class="modal fade modal-center bd-example-modal-lg forgot" id="sign_social" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >



    <div class="modal-dialog modal-lg" role="document">



        <div class="modal-content">



            <div class="modal-body">



                 @php

                    $user=Auth::guard('user')->user();

                    $corpuser=Auth::guard('corpuser')->user();    

                @endphp



                @if($user && Session::get('error_code') == 3)



                <a href="{{ url('/user/dashboard') }}" class="close">



                    <span aria-hidden="true">&times;</span>



                </a>



                 <h3>SignUp Successfully</h3>



                 <p>Thank you for singup the launder services.</p>





                 <a href="{{ url('/user/dashboard') }}" class="readMore readMore_login">Submit</a>

                 @elseif($corpuser && Session::get('error_code') == 3)



                 <a href="{{ url('/corpuser/dashboard') }}" class="close">



                    <span aria-hidden="true">&times;</span>



                </a>



                 <h3>SignUp Successfully</h3>



                 <p>Thank you for singup the launder services.</p>





                 <a href="{{ url('/corpuser/dashboard') }}" class="readMore readMore_login">Submit</a>

                 @else

                 @php

                 $message=Session::get('message');

                 $status=Session::get('status');

                 @endphp

                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                 </button>



                 <h3 style="color: @if ($status=='Signup Failed') red @else green @endif ">{{$status}}</h3>



                 <p style="text-transform:capitalize;">{{ ucfirst($message)}}.</p>

                 @endif



            </div>



        </div>



    </div>



</div><!--End forgot -->


<!-- Price caluclator -->
<div class="modal fade modal-center bd-example-modal-lg forgot" id="price_calculator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >



    <div class="modal-dialog modal-lg" role="document">



        <div class="modal-content">



            <div class="modal-body">



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                    <span aria-hidden="true">&times;</span>



                 </button>



                 <h3>Price Calculator Estimation</h3>



                 <p>First Login the website. Then You check the price estimation of laundry.</p>







                 <form class="login_modal forgot_password">


                <a class="nav-link" href="{{route('user.price_calculator')}}" style="text-align:center;color: #fff;background-color: #1669b4;">Submit</a>

                </form>



            </div>



        </div>



    </div>



</div><!--End forgot -->











