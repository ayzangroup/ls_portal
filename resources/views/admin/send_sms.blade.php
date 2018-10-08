@extends('admin.layouts.app')

@section('css')

        <link rel="stylesheet" href="{{ URL::asset('/plugins/multiselect/docs/css/bootstrap-example.min.css') }}" type="text/css">

        <link rel="stylesheet" href="{{ URL::asset('/plugins/multiselect/docs/css/prettify.min.css') }}" type="text/css">

        <script type="text/javascript" src="{{ URL::asset('/plugins/multiselect/docs/js/prettify.min.js') }}"></script>

        <link rel="stylesheet" href="{{ URL::asset('/plugins/multiselect/dist/css/bootstrap-multiselect.css') }}" type="text/css">





@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Send Sms</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

            

            <div class="row">



            <div class="col-md-6">

                <div class="white-box">

                    <h2>Send Sms to User</h2>

                </div>  

                    <form class="form-horizontal add-notification1"  method="post" action="{{route('admin.send_sms_user_submit')}}" enctype="multipart/form-data">

                        

                         {{ csrf_field()}} 



                        <div class="box-body">

                        @php

                        $createdOn= time();

                        @endphp

                        <input type="hidden" name="createdOn" value="{{$createdOn}}">

                        </div>

                        <div class="form-group" style="margin-bottom: 10px;">

                            <label for="users" class="col-md-12" style="margin-left: -18px;">Select Users</label>

                            <select name='users[]' id="select-1" multiple="multiple" required>    

                            @foreach($users as $user)

                                <option value={{ $user->indvCustId }}>{{ ucfirst($user->indvCustName )}}(ID:{{ $user->indvCustId }})</option>

                            @endforeach

                            </select>

                        </div>  

                        <div class="form-group">



                            <label for="description" class="col-md-12">Description</label>



                            <div class="col-md-12">



                                <textarea rows="5" name="message" class="form-control"></textarea> 
                            </div>



                        </div>

                      <div class="modal-footer center-btn" style="display: flex;justify-content: center">

                        <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Send</button>

                      </div>

                  </form>

            </div>


            <div class="col-md-6">

                <div class="white-box">

                    <h2>Send Sms to Corporate User</h2>

                </div>  

                    <form class="form-horizontal add-notification"  method="post" action="{{route('admin.send_sms_corpuser_submit')}}" enctype="multipart/form-data">

                        

                         {{ csrf_field()}} 



                        <div class="box-body">

                        @php

                        $createdOn= time();

                        @endphp

                        <input type="hidden" name="createdOn" value="{{$createdOn}}">

                        </div>



                        <div class="from-group" style="margin-bottom: 10px;">

                            <label for="users" class="col-md-12" style="margin-left: -18px;">Select Users</label>

                            <select name='users[]' id="select-2" multiple="multiple" required>    

                            @foreach($corpusers as $corpuser)

                                <option value={{ $corpuser->corpCustId }}>{{ ucfirst($corpuser->corporationName )}}(ID:{{ $corpuser->corpCustId }})</option>

                            @endforeach

                            </select>

                        </div>  

                        <div class="form-group">



                            <label for="description" class="col-md-12">Description</label>



                            <div class="col-md-12">



                                <textarea rows="5" name="message" class="form-control"></textarea> </div>



                        </div>

                      <div class="modal-footer center-btn" style="display: flex;justify-content: center">

                        <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Send</button>

                      </div>

                  </form>

            </div>

            </div>

            



          </div><!-- /.box-content -->

        </div><!-- box -->

      <!-- page content ends here -->



    </section><!-- /.content -->

</div><!-- /.content-wrapper -->



@endsection

@section('js')

<script type="text/javascript" src="{{ URL::asset('/plugins/multiselect/dist/js/bootstrap-multiselect.js') }}"></script>

    <script type="text/javascript">

            $(document).ready(function() {

                window.prettyPrint() && prettyPrint();

            });

        </script>

    <script type="text/javascript">

    $(document).ready(function() {

        $('#select-1').multiselect({

            includeSelectAllOption: true,

            enableFiltering: true,

            enableCaseInsensitiveFiltering: true,

            filterPlaceholder: 'Search by user name..',

            maxHeight: 500,

            buttonWidth: '470px'

        });



        $('#select-2').multiselect({

            includeSelectAllOption: true,

            enableFiltering: true,

            enableCaseInsensitiveFiltering: true,

            filterPlaceholder: 'Search by user name..',

            maxHeight: 500,

            buttonWidth: '470px'

        });

    });

</script>

<script>

             $(document).ready(function(){

                $('.add-notification1').validate({



                    rules: {                       

                        
                        message: {

                           required: true,
                           minlength: 8,
                        },

                    }

                });

            });

        </script>

        <script>

             $(document).ready(function(){

                $('.add-notification').validate({



                    rules: {                       

                        
                        message: {

                           required: true,
                           minlength: 8,
                        }

                                   

                    }

                });

            });

        </script>


@endsection

