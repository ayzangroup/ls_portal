@extends('layouts.app')



@section('content')





<div class="common-inner-head">



        <div class="container">



            <h3>List your business now</h3>



        </div>



    </div><!-- common-inner-head -->









<div class="common-padding-laundary list-business">



    <div class="container">



        <div class="row">



        <form class="col-md-8 ml-0 request" action="{{route('request')}}" method="post">



            {{csrf_field()}}

              <div class="form-group row">



                <label class="col-sm-3 col-form-label label-name">Name</label>



                <div class="col-sm-9">



                  <input type="text" class="form-control business-input" name="name">



                </div>



              </div><!-- form-group -->







              <div class="form-group row">



                <label class="col-sm-3 col-form-label label-name">Email</label>



                <div class="col-sm-9">



                  <input type="email" class="form-control business-input" name="email">



                </div>



              </div><!-- form-group -->







              <div class="form-group row">



                <label class="col-sm-3 col-form-label label-name">Phone</label>



                <div class="col-sm-9">



                  <input type="text" class="form-control business-input" name="phone">



                </div>



              </div><!-- form-group -->







               <div class="form-group row select-wrapper">



                <label for="statictext" class="col-sm-3 col-form-label select-services label-name">Your Services </label>



                <div class="col-sm-9">



                    <div class="bussiness-box">



                       <div class="s-input s-input--rounded">



                          <input type="radio" name="service" value="laundry" id="laundry" checked>



                          <label for="laundry">



                            <i class="aria-hidden">&nbsp;</i>



                            Laundry



                          </label>



                      </div>







                       <div class="s-input s-input--rounded">



                          <input type="radio" name="service" value="driver"  id="driver">



                          <label for="driver"> 



                            <i class="aria-hidden">&nbsp;</i>



                            Driver



                          </label>



                      </div>



                    </div>



                </div>



              </div><!-- form-group -->







              <div class="form-group row">



                <label class="col-sm-3 col-form-label label-name">Address</label>



                <div class="col-sm-9">



                  <textarea name="address" rows="4" class="w-100"></textarea>



                </div>



              </div><!-- form-group -->







                <div class="col-sm-6 btn-send-list">



                  <button type="submit" class="readMore">Send</button>



                </div>











        </form><!-- form -->



</div>







    </div>



</div><!-- list-business -->



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

                        service: {

                           required: true,

                        },
                        address:{
                                                required:true,
                                                minlength:8
                                                }



                                   

                    }

                });

            });

        </script>







@endsection

@endsection