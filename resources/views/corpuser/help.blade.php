@extends('corpuser.layouts.app')
@section('css')
<style>
.error
{
  color:red;
}
</style>
@endsection
@section('content')

<section class="content container-fluid dashboard">

      

      <!-- page content starts here -->    

      <div class="content-header">

           <h1>Help</h1>

       </div>



       <div class="common-background help">

            <div class="row">

              <div class="col-md-5">

                  <div class="help-box">

                     @php

                      $user=Auth::guard('corpuser')->user();                

                     @endphp

                      <form class="add_help" action="{{route('help')}}" method="post">

                        {{csrf_field()}}

                        <div class="row">

                            <div class="col-md-6">

                              <div class="form-group">

                                  <input type="hidden" placeholder="Name" name="name" value="{{ $user->corporationName }}">    

                              </div>

                            </div>



                            <div class="col-md-6">

                              <div class="form-group">

                                  <input type="hidden" placeholder="Email" name="email" value="{{ $user->corpoarateEmail }}">    

                              </div>

                            </div>



                            <div class="col-md-12">

                              <div class="form-group">

                                  <input type="hidden" placeholder="Phone" name="phone" value="{{ $user->concerPersonMobile }}">    

                              </div>

                            </div>



                            <div class="col-md-12">

                                <div class="form-group">

                                    <textarea class="form-control" placeholder="Message" name="message" rows="3"></textarea>

                                </div>

                            </div>



                            <div class="col-md-12">

                              <button class="btn btn-default" type="submit">Sumbit</button>

                            </div>



                        </div>

                      </form>

                  </div><!-- help-box -->

              </div>

              <div class="col-md-6">

                  <div class="help-box">

                        @php

                          $data1=json_decode($data->data);

                        @endphp

                        <ul>

                           @foreach ($data1 as $key => $value)

                          <li>

                              <p class="common-span"><i class="fa fa-phone" aria-hidden="true"></i> <span class="minus-space">+91 {{ $value }} </span> : &nbsp; &nbsp; {{ $key}}</p>

                              

                          </li>

                          @endforeach



                          <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{ $data->email }}"><span>{{ $data->email }}</span></a></li>

                      </ul>

                  </div><!-- help-box -->

              </div>

            </div>

       </div>

      

      <!-- page content ends here -->



    </section><!-- /.content -->





    <!-- message -->

@endsection

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



                 <h3 style="color: @if ($status=='Signup Failed') red @else green @endif ">{{$status}}</h3>



                 <p style="text-transform:capitalize;">{{ ucfirst($message)}}.</p>





            </div>



        </div>



    </div>



</div><!--End forgot -->





@section('js')

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)

<script>

$(function() {

    $('#sign_social').modal('show');

});

</script>

@endif


<script>

             $(document).ready(function(){

                $('.add_help').validate({


                    rules: {                       

                        
                        message: {
                           required:true,
                           minlength:8,
                        },
                        

                                   

                    }

                });

            });

        </script>


@endsection



