@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Price</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-price"  method="post" action="{{route('admin.submit_price')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  

                <div class="form-group">

                    <label >Item:<span class="required"> * </span></label>

                </div>

                  <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" name="itemId" style="width: 100%;">

                      <option value="">--Please Select the Item --</option>

                      @foreach($items as $item)

                      <option value="{{$item->itemId}}">{{ucfirst($item-> itemCode)}}</option>

                      @endforeach

                    </select>

                  </div>



                  <div class="form-group">

                    <label >User Type:<span class="required"> * </span></label>

                </div>

                  <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" name="customerType" style="width: 100%;" tabindex="-1" aria-hidden="true">

                      <option value="">-- Please Slect User Type --</option>

                      <option value="user">Indvidual User</option>

                      <option value="corp">Corporate User</option>

                    </select>

                  </div>



                  <div class="form-group">

                    <label >List Number:</label><span class="required"> * </span>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="listNumber">

                     </div>



                  <div class="form-group">

                    <label >Price:</label><span class="required"> * </span>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="costPrice">

                     </div>



                   <div class="form-group">

                    <label >Discount (%):</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="discount">

                     </div>



                <div class="form-group">

                    <label >Discount Max Value:</label>

                </div>

                <div class="form-group">

                        <input type="text" class="form-control" name="discFixVale">

                </div>



                  <div class="form-group">

                    <label >Margin (%):</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="margin">

                     </div>



                  <div class="form-group">

                    <label >Tax (%):</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="tax">

                     </div>



                <div class="form-group">

                    <label >Status:<span class="required"> * </span></label>

                </div>

                  <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" name="status" style="width: 100%;" tabindex="-1" aria-hidden="true">

                      <option value="">--Please Select the Status --</option>

                      <option value="1">Active</option>

                      <option value="0">In Active</option>

                    </select>

                  </div>



                <div class="form-group">

                    <label >Remark:</label>

                </div>

                  <div class="form-group" style="margin-left:0px;">

                    <textarea class="form-control" style="height:100px" name="remarks"></textarea>

                  </div>

                  

                      @php

                        $admin=Auth::guard('admin')->user();

                        $createdOn= time();

                      @endphp



                     <input type="hidden" name="createdBy" value="{{$admin->id}}">



                     <input type="hidden" name="createdOn" value="{{$createdOn}}">

                



              <div class="modal-footer center-btn" style="display: flex;justify-content: center">

                <button type="submit" class="btn btn-default fill pull-left"  id="saveBtn">Save</button>

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

                $('.add-price').validate({



                    rules: {                       

                        itemId: {

                            required: true

                        },

                        customerType: {

                            required: true

                        },

                        listNumber: {

                            required: true,
                            number: true

                        },

                        costPrice: {

                            required: true,
                            number: true

                        },

                        status: {

                            required: true

                        },
                        tax: {

                            number: true

                        },
                        margin: {

                            number: true

                        },
                        discount: {

                            number: true

                        },
                        discFixVale: {

                            number: true

                        }


                    }

                });

            });

        </script>

@endsection

@endsection