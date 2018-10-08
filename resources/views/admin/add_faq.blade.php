@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Faq</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

             <form class="form-horizontal add-faq"  method="post" action="{{route('admin.submit_faq')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">

                  <div class="form-group">

                    <label >Title:<span class="required"> * </span></label>

                </div>

                  <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" name="title" style="width: 100%;" tabindex="-1" aria-hidden="true">

                      <option value="">-- Please select the Title--</option>

                      @foreach($data as $d)

                      <option value="{{$d->id}}">{{$d->title}}</option>

                      @endforeach

                    </select>

                  </div>

                <div class="form-group">

                    <label >Sub Title:<span class="required"> * </span></label>

                </div>

                <div class="form-group" style="margin-left:0px;">

                    <input class="form-control" name="sub_title">

                </div>

                

                <div class="form-group">

                    <label >Description:<span class="required"> * </span></label>

                </div>

                <div class="form-group" style="margin-left:0px;">

                   <textarea class="form-control mymce" name="description" style="height:200px;"></textarea>

                </div>



              <div class="modal-footer center-btn" style="display: flex;justify-content: center">

                <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Save</button>

                <button type="button" class="btn btn-default outline pull-left" onclick="history.go(-1);" data-dismiss="modal">Cancel</button>

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

                $('.add-faq').validate({



                    rules: {                       

                        title: {

                            required: true

                        },

                        description: {

                            required: true

                        },

                        sub_title: {

                            required: true

                        }                      

                    }

                });

            });

        </script>

@endsection

@endsection