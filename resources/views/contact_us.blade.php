@extends('layouts.app')

@section('css')

@endsection

@section('content')



    <div class="common-inner-head">



        <div class="container">



            <h3>Contact Us</h3>



        </div>



    </div>







<div class="common-padding-laundary contact">



    <div class="container">



        <div class="row">



            <div class="col-md-7 col-sm-12">



                <div class="contact-box">



                    <h4>Get In Touch</h4>



                    {!! $data->iframe !!}







                   <ul>

                        @php

                            $data1=json_decode($data->data);

                        @endphp



                    @foreach ($data1 as $key => $value)

                    <li>

                    <p class="common-span"><i class="fa fa-phone" aria-hidden="true"></i> 

                    <span class="minus-space">+91 {{ $value }}</span> :&nbsp; &nbsp; {{ $key}}</p>

                    

                    </li>

                    @endforeach







                          <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{ $data->email }}"><span>{{ $data->email }}</span></a></li>



                      </ul>



                      



                </div>



            </div>







            <div class="col-md-5 col-sm-12">



                <div class="contact-box contact-form-rt">



                    <h4>Send Message</h4>



                    <div class="contact-form ">



                        <form class="contact_us request" action="{{route('help')}}" method="post">

                            {{csrf_field()}}



                            <div class="row">



                                <div class="col-md-6">



                                    <div class="input-group">



                                        <input type="text" class="form-control" name="name" placeholder="Name"/>



                                    </div>



                                </div>







                                <div class="col-md-6">



                                    <div class="input-group">                                    



                                        <input type="text" class="form-control"  name="phone" placeholder="Phone"/>



                                    </div>



                                </div>







                                <div class="col-md-12">



                                    <div class="input-group">                                    



                                        <input type="email" class="form-control" name="email" placeholder="Email"/>



                                    </div>



                                </div>







                                <div class="col-md-12">



                                    <div class="form-group">



                                        <textarea class="form-control" placeholder="Message" name="message" rows="3"></textarea>



                                    </div>



                                </div>







                                <div class="col-md-12">



                                    <button class="readMore readMore-btn" type="submit">Sumbit</button>







                                </div>



                            </div>



                        </form>



                    </div>



                </div>



            </div>







        </div>



    </div>



</div>

@section('js')

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)

<script>

$(function() {

    $('#sign_social').modal('show');

});

@endif

</script>

 <script>

             $(document).ready(function(){

                $('.request').validate({



                    rules: {                       

                       name: {

                           required: true,

                        },

                        phone: {

                           required: true,

                        },

                        email: {

                           required: true,

                        },
                        message:{
                                                required:true,
                                                minlength:8
                                                }

                                     

                    }

                });

            });

        </script>







@endsection



@endsection

