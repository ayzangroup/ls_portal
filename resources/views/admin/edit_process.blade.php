@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')





  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Edit Process</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal edit-process"  method="post" action="{{route('admin.update_process')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Title:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="title" value="{{$data->title}}">

                     </div>



                <div class="form-group">

                    <label >Description:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control" name="description" style="height:150px;">{{$data->description}}</textarea>

                     </div>

                

                <div class="form-group">

                    <label >Serve Logo:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="file" name="image">

                     </div>

                     <div class="form-group">

                      <img src="{{URL::asset('images/process_images/'.$data->logo)}}" style="height:240px;width:210px">

                    </div>

                </div>

                <input type="hidden" name="id" value="{{$data->id}}">

                <input type="hidden" name="image_old" value="{{$data->logo}}">

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

                $('.edit-process').validate({



                    rules: {                       

                        title: {

                           required: true,

                        }                                 

                    }

                });

            });

        </script>

@endsection

@endsection