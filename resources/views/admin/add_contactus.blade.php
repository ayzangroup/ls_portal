@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Contact Us/h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-contactus"  method="post" action="{{route('admin.submit_contactus')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                <div class="input_fields_wrap">

                  <button class="add_field_button" style="margin-bottom: 25px">Add More Fields</button>

                  <div class="form-group">

                    <label >Languages:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <select class="form-control select2 select2-hidden-accessible" name="language[]" style="width: 100%;" tabindex="-1" aria-hidden="true">

                           <option value="">--Please Select the language --</option>

                          <option value="English">English</option>

                          <option value="Hindi">Hindi</option>



                    </select>

                     </div>



                <div class="form-group">

                    <label >Phone:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="phone[]" >

                     </div>

                </div>



                <div class="form-group">

                    <label >Email:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="email" class="form-control" name="email">

                     </div>



                

                <div class="form-group">

                    <label >Google Link:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control" name="iframe" style="height:100px;"></textarea>

                     </div>

                </div>

                



              <div class="modal-footer center-btn" style="display: flex;justify-content: center">

                <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Save</button>

                <button type="button" class="btn btn-default outline pull-left" data-dismiss="modal" onclick="history.go(-1);">Cancel</button>

              </div>

          </form>

            



          </div><!-- /.box-content -->

        </div><!-- box -->

      <!-- page content ends here -->



    </section><!-- /.content -->

</div><!-- /.content-wrapper -->



@section('js')

<script>

             $(document).ready(function(){

                $('.add-contactus').validate({



                    rules: {                       

                        title: {

                           required: true,

                        },

                        email: {

                           required: true,

                        },

                        iframe: {

                           required: true,

                        },

                        phone: {

                           required: true,

                        }

                                   

                    }

                });

            });

        </script>

@endsection

@endsection