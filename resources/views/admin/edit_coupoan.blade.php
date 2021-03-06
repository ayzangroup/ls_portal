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

           <h1>Edit Coupoan</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-offer"  method="post" action="{{route('admin.update_coupoan')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Coupoan Code:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="couponCode" value="{{$coupoan->couponCode}}">

                     </div>

                  <div class="form-group">

                    <label >Coupoan Type:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="codeType" value="{{$coupoan->codeType}}">

                     </div>



                <div class="form-group">

                    <label >Coupoan Start Date:<span class="required"> * </span></label>

                </div>

                    <div class="form-group demo-div mt20px">

                      <input type="text" class="mt10px form-control" name="validFrom" value="{{$coupoan->validFrom}}" id="J-demo-02" placeholder="MM/DD/YYYY"  style="background-color:#fff;">

                   </div>

                <div class="form-group">

                    <label >Coupoan End Date:<span class="required"> * </span></label>

                </div>

                   <div class="form-group demo-div mt20px">

                      <input type="text" class="mt10px form-control" id="J-demo-01" placeholder="MM/DD/YYYY" name="validUpto" value="{{$coupoan->validUpto}}" style="background-color:#fff;">

                   </div>

                <div class="form-group">

                    <label > Coupon Category<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="couponCategory" value="{{$coupoan->couponCategory}}">

                     </div>

                <div class="form-group">

                    <label > Use Limit<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="useLimit" value="{{$coupoan->useLimit}}" >

                     </div>

                <div class="form-group">

                    <label >Min Order Value:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="minOrderValue" value="{{$coupoan->minOrderValue}}">
                     </div>

                <div class="form-group">

                    <label >Max Discount Value:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="discVal"  value="{{$coupoan->discVal}}">
                     </div>

                 <div class="form-group">

                    <label >Discount Value(%):<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="discountPercent" value="{{$coupoan->discountPercent}}" >
                     </div>

                  <div class="form-group">

                    <label >Status<span class="required"> * </span></label>

                </div>

                <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name='status'>    

                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    
                    </select>

                  </div>

                </div>

                <input type="hidden" name="uniqueId" value="{{$coupoan->uniqueId}}">

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