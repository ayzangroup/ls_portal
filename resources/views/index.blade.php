@extends('layouts.app')

@section('content')

                <!-- Banner IMage -->

                <div id="carouselExampleIndicators" class="carousel slide slider__wrapper" data-ride="carousel">

                    <div class="loader-main">


                            <div class="holder">


                              <div class="preloader">


                                <div></div>



                                <div></div>



                                <div></div>



                                <div></div>



                                <div></div>



                                <div></div>



                                <div></div>



                                <div></div>



                                <div></div>



                                <div></div>



                              </div>



                        </div>



                    </div>



                  <ol class="carousel-indicators">



                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

                        @php



                        $count =(count($data));



                        @endphp



                        @for($i=1;$i<=$count-1;$i++)

                            

                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>

                        

                        @endfor



                  </ol>



                    <div class="carousel-inner">



                        @foreach($data as $d)   



                            @if($d->id=='1')

                                <div class="carousel-item active">



                                  <div class="back_slider" style="background: url(images/banner_images/{{$d->image}}) no-repeat;">



                                        <div class="carousel-caption-slider fadeInUp animated">



                                            <h3>{!! ucfirst($d->description) !!}</h3>



                                            <p>{{ ucfirst($d->title) }}</p>



                                            <a href="#">Explore our services</a>



                                        </div>



                                    </div><!-- back_slider -->



                                 </div><!-- carousel-item -->

                            @else



                                <div class="carousel-item">



                                  <div class="back_slider" style="background: url(images/banner_images/{{$d->image}}) no-repeat;">



                                        <div class="carousel-caption-slider fadeInUp animated">



                                            <h3>{!! $d->description !!}</h3>



                                            <p>{{ ucfirst($d->title) }}</p>



                                            <a href="#">Explore our services</a>



                                        </div>



                                    </div><!-- back_slider -->



                                </div><!-- carousel-item -->

                            @endif



                        @endforeach



                    </div>



                </div>

                <!-- slider__wrapper -->





                <!-- Process Data -->



                <a name="process" id="process"></a>



                <div class="common-padding-laundary process_wrapper">



                    <div class="container">



                        <h3 class="common-head">Our Process</h3>



                        <div class="row">



                        @foreach($process as $process_data)

                            <div class="col-lg-3 col-md-4 col-sm-12" >



                                <div class="process-box">



                                    <div class="process-box-inner">



                                        <img src="{{URL::asset('images/process_images/'.$process_data->logo)}}" alt="">



                                    </div>



                                    <h4>{{$process_data->title}}</h4>



                                    <p>{{$process_data->description}}</p>



                                </div>



                            </div>

                        @endforeach



                        </div>



                    </div><!-- container -->



                </div>

                <!-- process_wrapper -->





                <!-- whyus Data -->

                <a name="why_us" id="why_us"></a>



                <div class="common-padding-laundary why_us_wrapper">



                    <div class="container">



                        <h3 class="common-head">Why Us?</h3>



                        <div class="why_us_box">



                    @foreach($whyus as $whyus_item )



                            <div class="why_us_box_inner">



                                <div class="why_us_box_inner_lt">



                                    <img class="w-100" src="{{URL::asset('images/whyus_images/'.$whyus_item->image)}}" alt="">



                                </div>



                                <div class="why_us_box_inner_rt">



                                    <h4>{{$whyus_item->heading}}</h4>



                                    <p>{{$whyus_item->description}}</p>



                                </div>



                            </div><!-- why_us_box_inner -->



                    @endforeach

                        </div>

                    </div><!-- container -->

                </div>

                <!-- why_us_wrapper -->

                

                <!-- Whyus Data -->





                <div class="common-padding-laundary who_we_wrapper">



                    <div class="container">



                        <h3 class="common-head">Who We Serve?</h3>



                        <div class="who_we_wrapper_flex">



                            @foreach($serve as $serve_item)

                            <div class="who_we_wrapper_flex_inner_box">



                                <div class="who_we_wrapper_flex_inner_box_inner first-serve">



                                    <img src="{{URL::asset('images/serve_images/'.$serve_item->logo)}}" alt="">



                                </div>



                                <p>{{ucfirst($serve_item->title)}}</p>



                            </div><!-- who_we_wrapper_flex_inner_box -->

                            @endforeach





                        </div><!-- who_we_wrapper_flex -->



                        <div class="text-center readMore_wrapper">



                            <a class="readMore" href="{{route('serve')}}">Read more</a>



                        </div>



                    </div><!-- container -->



                </div>

                <!-- who_we_wrapper -->







<div class="common-padding-laundary application_wrapper">



    <div class="container">



        <div class="row">



            <div class="col-md-6 col-sm-6 col-xs-12">



                <div class="app_lt">



                    <img src="{{URL::asset('images/blog_images/'.$blog->image)}}" class="w-100" alt="">



                </div>



            </div>





            <div class="col-md-6 col-sm-6 col-xs-12">



                <div class="app_rt">



                    <h4>{{$blog->heading}}</h4>



                    <p>{{$blog->description}}</p>



                    <a class="play_app andorid" href="#">GOOGLE PLAY</a>



                    <a class="play_app apple" href="#">Apple Store</a>



                </div>



            </div>



        </div>



    </div><!-- container -->



</div><!-- application_wrapper -->





<!-- after login google and facebook -->



<div class="modal fade modal-center bd-example-modal-lg forgot" data-backdrop="static" data-keyboard="false" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <!-- <div class="modal-header">

                <h3 class="modal-title">Select Role</h3>

            </div> -->

            <div class="modal-body">

                <h3>Select Role</h3>



                <form action="{{route('submit_user')}}" method="Post">

                    {!! csrf_field() !!}

                    <div class="form-check Individual2">
                            @php
                            $refer_code=(Session::get('refer_code'));
                            @endphp

                        <input type="hidden" name="refer_code" value="{{$refer_code}}">

                        <input class="form-check-input" type="radio" name="userType" id="individual2" value="user" checked>

                        <label class="form-check-label" for="individual2">

                            <span>Individual</span>

                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to</p>

                        </label>

                    </div>

                    <div class="form-check corporate2">

                        <input class="form-check-input" type="radio" name="userType" id="corporate2" value="corp">

                        <label class="form-check-label" for="corporate2">

                            <span>Corporate</span>

                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to</p>

                        </label>

                    </div>

                    <button type="submit" class="model_submit_btn">Submit</button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--End google modal -->





@endsection



@section('js')



@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)

<script>

$(function() {

    $('#myModal').modal('show');

});

</script>

@endif



@if(!empty(Session::get('error_code')) && Session::get('error_code') == 4)

<script>

$(function() {

    $('#login').modal('show');

});

</script>

@endif



@if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)

<script>

$(function() {

    $('#sign_social').modal('show');

});

</script>

@endif


@if(!empty(Session::get('error_code')) && Session::get('error_code') == 8)

<script>

$(function() {

    $('#signupmodal').modal('show');

});

</script>

@endif







@endsection

