@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Why Us </h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-whyus"  method="post" action="{{route('admin.submit_whyus')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Heading:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control" name="heading" style="height:100px;"></textarea>

                     </div>



                <div class="form-group">

                    <label >Description:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control" name="description" style="height:150px;"></textarea>

                     </div>

                

                <div class="form-group">

                    <label >Image:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="file" name="image">

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

                $('.add-whyus').validate({



                    rules: {                       

                        heading: {

                           required: true,

                        },

                        image: {

                           required: true,

                        },
                        description:{
                           required: true,
                           minlength:8
                        }


                                   

                    }

                });

            });

        </script>

@endsection

@endsection