@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Contact Us </h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal"  method="post" action="{{route('admin.update_contactus')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                @php

                $data1=json_decode($data->data);

                @endphp



                @foreach($data1 as $key => $value)

                  <div class="form-group">

                    <label >Languages:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <select class="form-control select2 select2-hidden-accessible" name="language[]" style="width: 100%;" tabindex="-1" aria-hidden="true">

                          <option value="{{$key}}">{{$key}}</option>

                          <option value="English">English</option>

                          <option value="Hindi">Hindi</option>



                    </select>

                     </div>



                <div class="form-group">

                    <label >Phone:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="phone[]" value="{{$value}}" >

                     </div>



                  @endforeach



                <div class="input_fields_wrap">

                  <button class="add_field_button" style="margin-bottom: 25px">Add More Fields</button>

                </div>



                <div class="form-group">

                    <label >Email:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="email" class="form-control" name="email" value="{{$data->email}}">

                        <input type="hidden" name="id" value="{{$data->id}}">

                     </div>



                

                <div class="form-group">

                    <label >Google Link:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control" name="iframe" style="height:100px;" >{{$data->iframe}}</textarea>

                     </div>

                </div>



                <span>{!! $data->iframe !!}</span>

                



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



    <script>

$(document).ready(function() {

    var max_fields      = 10; //maximum input boxes allowed

    var wrapper         = $(".input_fields_wrap"); //Fields wrapper

    var add_button      = $(".add_field_button"); //Add button ID

    

    var x = 1; //initlal text box count

    $(add_button).click(function(e){ //on add input button click

        e.preventDefault();

        if(x < max_fields){ //max input box allowed

            x++; //text box increment

            $(wrapper).append('<div><div class="form-group"><label >Languages:<span class="required"> * </span></label></div><div class="form-group"><select class="form-control select2 select2-hidden-accessible" name="language[]" style="width: 100%;" tabindex="-1" aria-hidden="true"><option value="english">English</option><option value="hindi">Hindi</option></select></div><div class="form-group"><label >Phone:<span class="required"> * </span></label></div><div class="form-group"><input type="text" class="form-control" name="phone[]" ></div><button class="remove_field" style="margin-bottom: 25px">Remove</button></div>'); //add input box

        }

    });

    

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text

        e.preventDefault(); $(this).parent('div').remove(); x--;

    })

});

</script>

@endsection

@endsection

