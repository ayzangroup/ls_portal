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

           <h1>Edit Refer Code Detail</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-offer"  method="post" action="{{route('admin.update_refercode_detail')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Point Earned:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="pointearned" value="{{$refer->pointearned}}">

                     </div>

                  <div class="form-group">

                    <label >Introduced Point Earned:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="introducepointearned" value="{{$refer->introducepointearned}}">

                     </div>

                <div class="form-group">

                    <label >Introduce Point Used<span class="required"> * </span></label>

                </div>

                <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name='introducepointstatus'>    

                      <option value="1" @if($refer->introducepointstatus=='1') selected @endif>True</option>
                      <option value="0" @if($refer->introducepointstatus=='0') selected @endif>False</option>
                    
                    </select>

                  </div>

                  <div class="form-group">

                    <label >Max Point Spent:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="pointspent" value="{{$refer->pointspent}}">

                     </div>



                <div class="form-group">

                    <label >Rate Per Point:<span class="required"> * </span></label>

                </div>

                    <div class="form-group demo-div mt20px">

                      <input type="text" class="mt10px form-control" name="rateperpoint" value="{{$refer->rateperpoint}}" id="J-demo-02" placeholder="MM/DD/YYYY"  style="background-color:#fff;">

                   </div>

                  <div class="form-group">

                    <label >Point Used<span class="required"> * </span></label>

                </div>

                <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name='pointsUsed'>    

                      <option value="1" @if($refer->pointsUsed=='1') selected @endif>Publish</option>
                      <option value="0" @if($refer->pointsUsed=='0') selected @endif>Unpublish</option>
                    
                    </select>

                  </div>

                </div>

                <input type="hidden" name="id" value="{{$refer->id}}">

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
<script src="{{URL::asset('/dist/date-time-picker.min.js')}}"></script>
 <script type="text/javascript">
            $('#J-demo-01').dateTimePicker();
        </script>
         <script type="text/javascript">
            $('#J-demo-02').dateTimePicker();
        </script>
<script>

             $(document).ready(function(){

                $('.add-offer').validate({



                    rules: {                       

                        discVal: {

                           required: true,

                        },

                        minOrderValue: {

                           required: true,

                        },

                        couponCategory: {

                           required: true,

                        },

                        couponCode: {

                           required: true,

                        },
                        codeType: {

                           required: true,
                          
                        },
                        validFrom: {

                           required: true,
                          
                        },
                        validUpto: {

                           required: true,
                          
                        },
                        discountPercent: {

                           required: true,
                          
                        },


                                   

                    }

                });

            });

        </script>

@endsection

@endsection