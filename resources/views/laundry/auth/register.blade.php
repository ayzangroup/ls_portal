@extends('admin.layouts.app')

@section('css')

<style>

.form-horizontal .form-group{

    margin-left:0px;

     margin-right:0px;

}

</style> 

@endsection

@section('content')

<div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Add Laundry Man User</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

    

                    <form class="form-horizontal driver-register" role="form" method="POST" action="{{ route('laundry.register') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}



                        <div class="box-body">



                              <div class="form-group col-md-2">

                                <label >Name:<span class="required"> * </span></label>

                            </div>

                            <div class="form-group col-md-4">

                                <input id="name" type="text" class="form-control" name="laundryName">

                                @php

                                $createdOn=time();

                                @endphp

                                <input type="hidden" class="form-control" name="createdOn" value="{{$createdOn}}">

                             </div>

                           

                        

                        <div class="form-group col-md-2">

                            <label>E-Mail:<span class="required"> * </span></label>

                        </div>

                            <div class="form-group col-md-4">

                                <input  type="email" class="form-control" name="emailId">

                            </div>



                        </div>

                        <div class="box-body"> 



                        <div class="form-group col-md-2">

                            <label>Phone:<span class="required"> * </span></label>

                        </div>

                            <div class="form-group col-md-4 ">

                                <input  type="text" class="form-control" name="phone">

                            </div>

                        



                        <div class="form-group col-md-2">

                            <label >Address:<span class="required"> * </span></label>

                        </div>

                            <div class="form-group col-md-4">

                                <input  type="text" class="form-control" name="address">



                            </div>



                        </div>

                        <div class="box-body"> 

                            <div class="form-group col-md-2">

                                <label >City:<span class="required"> * </span></label>

                            </div>

                            <div class="form-group col-md-4">

                                <input  type="text" class="form-control" name="city">



                            </div>

                            <div class="form-group col-md-2">

                                <label >State:<span class="required"> * </span></label>

                            </div>

                                <div class="form-group col-md-4">

                                    <input type="text" class="form-control" name="state">



                                </div>

                        </div>

                        

                        <div class="box-body"> 

                        <div class="form-group col-md-2">

                            <label >Pincode:<span class="required"> * </span></label>

                        </div>

                            <div class="form-group col-md-4">

                                <input type="text" class="form-control" name="pincode">

                            </div>

                        <div class="form-group col-md-2">

                            <label >Pan Number</label>

                        </div>

                            <div class="form-group col-md-4">

                                <input type="text" class="form-control" name="panNumber">



                            </div> 



                        </div>



                        <div class="box-body"> 



                            <div class="form-group col-md-2">

                                <label >License Number</label>

                            </div>

                                <div class="form-group col-md-4">

                                    <input  type="text" class="form-control" name="licenseNumber">

                                </div>



                            <div class="form-group col-md-2">

                                <label >License Number Image</label>

                            </div>

                                <div class="form-group col-md-4">

                                    <input type="file" class="form-control" name="licenseImage">

                                </div>



                        </div>



                        <div class="box-body">

                             <div class="form-group col-md-2">

                                <label >Aadhar Card Number</label>

                            </div>

                            <div class="form-group col-md-4">

                                <input  type="text" class="form-control" name="nationalIdNumber">

                            </div>



                            <div class="form-group col-md-2">

                                <label >Aadhar Card Number Image</label>

                            </div>

                                <div class="form-group col-md-4">

                                    <input  type="file" class="form-control" name="UIDImage">



                                </div>                         

                        </div>

                       

                        

                       <div class="modal-footer center-btn" style="display: flex;justify-content: center">

                        <button type="submit" class="btn btn-default fill pull-left"  id="saveBtn">Save</button>

                        <button type="reset" class="btn btn-default outline pull-left" data-dismiss="modal">Cancel</button>

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

                $('.driver-register').validate({



                     rules: {                       

                        laundryName: {

                           required: true,

                        },

                        emailId: {

                           required: true,

                        },

                        phone:{

                            required: true,

                        },

                        address: {

                           required: true,

                        },
                        city: {

                           required: true,

                        },
                        state: {

                           required: true,

                        },
                        pincode:
                        {
                            required: true,

                        }
                    }

                });

            });

        </script>

@endsection

@endsection

