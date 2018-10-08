@extends('user.layouts.app')

@section('content')

<section class="content container-fluid dashboard">

      

      <!-- page content starts here -->    

         <div class="content-header">

           <h1>Refer & Earn</h1>

       </div>



       <div class="common-background refer">

        <div class="commonBox">

          <div class="row">  
                        @php
                        $user=Auth::guard('user')->user();
                        @endphp


            <div class="col-md-12">

                <div class="points-box">

                    <p>{{$user->points}}</p>

                    <span>Points Earned</span>

                </div><!-- points-box -->

              </div>



              <div class="col-md-12">

                <div class="envelope-box envelope-box-social">

                  <img src="{{URL::asset('dist/img/envelope.svg')}}" alt="">

                  <P>Share we have by invite your friends and both of you will get discounts points</P>

                  <h5>Share you code</h5>



                   <form class="refer-code">

                      <div class="form-group">

                        
                        <input type="text" value="{{$user->referralCode}}">

                        <button type="button" class="share-btn"><i class="fa fa-share-alt" aria-hidden="true"></i></button>

                      </div>

                   </form>



                </div><!-- envelope-box -->

              </div>



              



              <div class="col-md-12">

                <div class="envelope-box envelope-box-social">

                    <h5>Sbumit to your friends using this:</h5>

                    <ul>

                      <li>

                        <a href="https://www.facebook.com/sharer/sharer.php
?s=100
&p[title]=Example Title
&p[summary]=Example description text
&p[url]=https://developer.launderservices.com/refer_register/{{$user->referralCode}}
&p[images][0]=https://developer.launderservices.com/dist/img/logo.png" target="_blank">

                          <i class="fa fa-facebook"></i>

                          Facebook

                        </a>

                      </li>



                      <li>

                        <a href="https://twitter.com/intent/tweet?url=https://developer.launderservices.com/refer_register/{{$user->referralCode}}" target="_blank">

                          <i class="fa fa-twitter"></i>

                          Twitter

                        </a>

                      </li>



                      <li>

                        <a href="{{route('user.gplus',$user->referralCode)}}" target="_blank">

                          <i class="fa fa-google-plus"></i>

                          Google Plus

                        </a>

                        </li>



                      <li>

                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=https://developer.launderservices.com/refer_register/{{$user->referralCode}}&title=launder-services&img src=https://developer.launderservices.com/dist/img/logo.png" target="_blank">

                          <i class="fa fa-linkedin"></i>

                          Linkedin

                        </a>

                      </li>



                    </ul>

                </div><!-- envelope-box -->

              </div>



          </div>

        </div><!-- commonBox -->

       </div><!-- refer -->

      

            

   

      

      <!-- page content ends here -->



    </section><!-- /.content -->

@endsection