@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Term And Condition</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-term" id="frmAddUser" name="frmAddUser" method="post" action="{{url('admin/submit_term_and_condition')}}">

                

                {{ csrf_field()}} 



                <div class="box-body">

                <div class="form-group">

                    <label >Description:<span class="required"> * </span></label>

                </div>

                    <div class="form-group" style="margin:0px;">

                      @if(!empty($data))

                        <textarea class="form-control mymce" name="description" style="height:200px;">{{ $data->description }}</textarea>

                        <input type="hidden" name="id" value="{{encrypt($data->id)}}">

                      @else

                       <textarea class="form-control mymce" name="description" style="height:200px;"></textarea>

                       @endif

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

                $('.add-term').validate({

                    rules: {                       

                        description: {

                           required:true,
                           minlength:8
                        }                                   

                    }

                });

            });

        </script>

@endsection

@endsection