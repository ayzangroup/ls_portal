@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Edit Services</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal edit-services"  method="post" action="{{route('admin.update_services')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Service Name:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="serviceName" value="{{$services->serviceName}}">

                        <input type="hidden" class="form-control" name="id" value="{{$services->serviceId}}">

                        <input type="hidden" class="form-control" name="image_old" value="{{$services->serviceImage}}">

                     </div>



                <div class="form-group">

                    <label >Service Description:</label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control mymce" name="serviceDescription" style="height:150px;">{{$services->serviceDescription}}</textarea>

                     </div>

                

                <div class="form-group">

                    <label >Service Image:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="file" name="image">

                     </div>

                </div>

                

                <img src="{{URL::asset('images/services_images/'.$services->serviceImage)}}" style="height:100px;width:75px;">



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

                $('.edit-services').validate({



                    rules: {                       

                        serviceName: {

                            required: true

                        }                       

                    }

                });

            });

        </script>

@endsection

@endsection