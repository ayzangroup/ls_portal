@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Items</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-items"  method="post" action="{{route('admin.update_items')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Item Name:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="itemCode" value="{{$items->itemCode}}">

                     </div>


                     <input type="hidden"  name="id" value="{{$items->itemId}}">
              

                <div class="form-group">

                    <label >Category:<span class="required"> * </span></label>

                </div>

                  <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" name="categoryId" style="width: 100%;" tabindex="-1" aria-hidden="true">

                      <option value="">-- Please Select the Caetgory --</option>

                      @foreach($categories as $category)

                      <option value="{{$category->categoryId}}" @if ( $items->categoryId == $category->categoryId) selected @endif>{{$category->categoryName}}</option>

                      @endforeach

                    </select>

                  </div>



                  <div class="form-group">

                    <label >Packaging:<span class="required"> * </span></label>

                </div>

                  <div class="form-group" style="margin-left:0px;">

                    <select class="form-control select2 select2-hidden-accessible" name="packageId" style="width: 100%;" tabindex="-1" aria-hidden="true">

                      <option value="">-- Please Select the Packaging --</option>

                      @foreach($packagings as $packaging)

                      <option value="{{$packaging->packagingId}}" @if ($packaging->packagingId == $items->packagingId) selected @endif>{{$packaging->packagingName}}</option>

                      @endforeach

                    </select>

                  </div>



                  <div class="form-group">

                    <label >Price:</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="price" value="{{$items->price}}">

                     </div>



                  <div class="form-group">

                    <label >Quantity:</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="quantity" value="{{$items->quantity}}">

                     </div>



                  <div class="form-group">

                    <label >Item Description:</label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control mymce" name="itemDesc" style="height:150px;">{{$items->itemDesc}}</textarea>

                     </div>





                  <div class="form-group">

                    <label >Remark:</label>

                </div>

                    <div class="form-group">

                        <textarea class="form-control" name="remarks" style="height:100px;">{{$items->remarks}}</textarea>

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

                $('.add-items').validate({



                    rules: {                       

                        itemCode: {

                            required: true,

                        },

                        packageId: {

                            required: true

                        },

                        categoryId: {

                            required: true

                        },

                        price: {

                            required: true,
                            number: true

                        },

                        quantity: {

                            required: true,
                            number: true

                        }                        

                    }

                });

            });

        </script>

@endsection

@endsection