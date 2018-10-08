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

           <h1>Edit Offer</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal edit-offer"  method="post" action="{{route('admin.update_offers')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Offer Code:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="offerCode" value="{{$offers->offerCode}}">

                     </div>

                  <div class="form-group">

                    <label >Offer Description:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control" name="offerDescription" style="height:150px;">{{$offers->offerDescription}}</textarea>

                     </div>

                  <div class="form-group">

                    <label >Offer Image:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input class="form-control" name="image" type="file" >

                     </div>

                  <div class="form-group">

                    <label >Offer Previous Image:<span class="required"> * </span></label>

                </div>

                <div class="form-group">

                     <img src="{{URL::asset('images/offers_images/'.$offers->offerImage)}}" style="height:100px;width:75px;">
                </div>

                  <div class="form-group">

                    <label >Offer Type:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="offerType" value="{{$offers->offerType}}">

                     </div>



                <div class="form-group">

                    <label >Offer Start Date:<span class="required"> * </span></label>

                </div>

                    <div class="form-group demo-div mt20px">

                      <input type="text" class="mt10px form-control" id="J-demo-02" name="offerStartDate" placeholder="MM/DD/YYYY"  value="{{$offers->offerStartDate}}" style="background-color:#fff;">

                   </div>

                <div class="form-group">

                    <label >Offer End Date:<span class="required"> * </span></label>

                </div>

                   <div class="form-group demo-div mt20px">

                      <input type="text" class="mt10px form-control" id="J-demo-01" value="{{$offers->offerEndDate}}" placeholder="MM/DD/YYYY" name="offerEndDate" style="background-color:#fff;">

                   </div>

                <div class="form-group">

                    <label >User Type<span class="required"> * </span></label>

                </div>

                <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name='userType'>    

                      <option value="user" @if($offers->userType=='user') selected @endif >User</option>
                      <option value="corp" @if($offers->userType=='corp') selected @endif >Corporate</option>
                    
                    </select>

                  </div>

                <div class="form-group">

                    <label >Customer:<span class="required"> * </span></label>

                </div>
                    @php
                    $customerId=explode(', ',$offers->introducingCustomerId);
                    @endphp

                    <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible"  name='introducingCustomerId[]' id="select-2" multiple="multiple" required style="width: 100%;">


                    @foreach($user as $d)  
                      <option value="{{$d->indvCustId}}" @foreach($customerId as $value) @if($d->indvCustId == $value) selected @endif  @endforeach >{{$d->indvCustEmail}}</option>
                    @endforeach
                    </select>

                  </div>


                <div class="form-group">

                    <label >Min Order Value:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="minOrderValue" value="{{$offers->minOrderValue}}">
                     </div>

                <div class="form-group">

                    <label >Discount Value(%):<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="discountPercent" value="{{$offers->discountPercent}}">
                     </div>


                  <div class="form-group">

                    <label >Max Discount Value:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="maxdiscVal" value="{{$offers->maxdiscVal}}">
                     </div>

                </div>

                <input type="hidden" class="form-control" name="id" value="{{$offers->id}}">

                <input type="hidden" class="form-control" name="old_image" value="{{$offers->offerImage}}">

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

                $('.edit-offer').validate({



                                        rules: {                       

                        offerCode: {

                           required: true,

                        },

                        discVal: {

                           required: true,

                        },

                        minOrderValue: {

                           required: true,

                        },

                        pointsSpent: {

                           required: true,

                        },
                        pointsEarned: {

                           required: true,
                          
                        },
                        userType: {
                           required: true,
                        },
                        offerEndDate: {
                          required: true,
                        },
                        offerStartDate: {
                          required: true,
                        },
                        offerType:{
                          required: true,
                        },
                        offerDescription:{
                          required: true,
                        },
                                   

                    }

                });

            });

        </script>

@endsection

@endsection