@extends('layouts.app')

@section('content')

<div class="common-inner-head">



        <div class="container">



            <h3>Who we serve?</h3>



        </div>



    </div>











<div class="common-padding-laundary who-we-serve">



    <div class="container">





            @foreach ($data as $d)

                <div class="serve-box">



                    <div class="serve-box-lt">



                        <div class="serve-box-lt-inner">



                            <div class="serve-box-lt-img serve-box-lt-img-first">



                                <img src="{{URL::asset('images/serve_images/'.$d->logo)}}"  style="width: 100px;

    height: 100px;" alt="">



                            </div>



                            <h4>{{$d->title}}</h4>



                        </div>



                    </div><!-- serve-box-lt -->



                    <div class="serve-box-rt">



                        <h4>{{$d->heading}}</h4>



                        <p>{{$d->description}}</p>



                    </div><!-- serve-box-rt -->



                </div><!-- serve-box -->



        @endforeach







                <div class="text-center who-serve">



                    <a class="readMore" href="{{route('user.booking')}}">Book You service now</a>
                
                </div>


    </div>

</div>


@endsection
