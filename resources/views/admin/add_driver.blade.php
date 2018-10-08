@extends('admin.layouts.app')
@section('css') 
@endsection
@section('content')

  <div class="content-wrapper">
    <section class="content container-fluid">

       <!-- page content starts here -->     
        <div class="content-header">
           <h1>Add Driver User</h1>
       </div>
           
       <div class="box" style="border:none">
          <div class="box-content">
              
            <form class="form-horizontal add-serve"  method="post" action="{{route('driver./register')}}" enctype="multipart/form-data">
                
                 {{ csrf_field()}} 

                <div class="box-body">

                  <div class="form-group">
                    <label >Name:<span class="required"> * </span></label>
                </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name">
                     </div>

                <div class="form-group">
                    <label >Email:<span class="required"> * </span></label>
                </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email">
                     </div>

                <div class="form-group">
                    <label >Password:<span class="required"> * </span></label>
                </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password">
                     </div>
                
                <div class="form-group">
                    <label >Confirm Password:<span class="required"> * </span></label>
                </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirmed">
                     </div>

              <div class="modal-footer center-btn" style="display: flex;justify-content: center">
                <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Save</button>
                <button type="button" class="btn btn-default outline pull-left" data-dismiss="modal">Cancel</button>
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
                $('.add-serve').validate({

                    rules: {                       
                        name: {
                           required: true,
                        },
                        email: {
                           required: true,
                        },
                        password: {
                           required: true,
                        },
                        confirm_password: {
                           required: true,
                        }
                                   
                    }
                });
            });
        </script>
@endsection
@endsection