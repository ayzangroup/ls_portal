@extends('user.layouts.app')
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

           <h1>Feedback</h1>

       </div>



       <div class="common-background help">

            <div class="row">

              <div class="col-md-5">

                  <div class="help-box">

                     @php

                      $user=Auth::guard('user')->user();                

                     @endphp

                      <form class="add_help" action="{{route('user.update_feedback')}}" method="post">

                        {{csrf_field()}}

                        <div class="row">

                            <div class="col-md-12">

                              <div class="form-group">

                                  <input type="hidden" placeholder="User Name" name="user_id" value="{{ $user->indvCustId }}">    
                                  <input type="hidden" placeholder="User Type" name="user_type" value="{{ $user->userType }}">
                                  <input type="text" placeholder="Subject" name="subject">
                                  <input type="hidden" placeholder="message_type" name="message_type" value="feedback">
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

              </div>

            </div>
    </section><!-- /.content -->

    <!-- message -->

@endsection
@section('js')
<script>

             $(document).ready(function(){

                $('.add_help').validate({


                    rules: {                       

                        
                        message: {
                           required:true,
                           minlength:8,
                        },
                        subject:{
                          required:true,
                        }
                        

                                   

                    }

                });

            });

        </script>

@endsection



