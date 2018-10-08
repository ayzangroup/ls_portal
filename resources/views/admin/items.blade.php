<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    @include('admin.includes.head')
   
  
  <style>
      .loading {
          background: lightgrey;
          padding: 15px;
          position: fixed;
          border-radius: 4px;
          left: 50%;
          top: 50%;
          text-align: center;
          margin: -40px 0 0 -50px;
          z-index: 2000;
          display: none;
      }

      .form-group.required label:after {
          content: " *";
          color: red;
          font-weight: bold;
      }
  </style>
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    @include('admin.includes.header')
  </header>

  <aside class="main-sidebar">
    @include('admin.includes.sidebar')
  </aside><!-- left-side menu -->

  <div class="content-wrapper">
    <section class="content container-fluid">

       <!-- page content starts here -->     
        <div class="content-header">
           <h1>Items Management</h1>
       </div>
           
       <div class="box">
          <div class="box-content">
              
            <!-- <ul class="nav nav-tabs tabs-services">
              <li class="active"><a data-toggle="tab" href="#individual" aria-expanded="false">Individual</a></li>
              <!-- <li><a data-toggle="tab" href="#corporate" aria-expanded="true">Corporate</a></li> 
            </ul> -->
            
            <div class="tab-content">
                @include('admin.ajax.ajaxItems')
            </div><!-- tab-content -->

            

          </div><!-- /.box-content -->
        </div><!-- box -->
      <!-- page content ends here -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="#">Muser Pvt.Ltd</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->



<!-- Modal - Add User -->
<div class="modal edit-user-info fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="add-user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Items</h4>
      </div>
      <div class="modal-body">
      
          <form class="form-horizontal" id="frmItems" name="frmItems" method="post" action="saveItems">
            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
              <div class="form-group">
                <label class="col-sm-3 control-label">Item Name: </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="itemName" id="itemName" value="" placeholder="Item Name" required />
                </div>
              </div><!-- full name -->
              <div class="form-group">
                <label class="col-sm-3 control-label">Item Description: </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="itemDesc" id="itemDesc" value="" placeholder="Item Description" required />
                </div>
              </div><!-- full name -->
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Category: </label>
                <div class="col-sm-9">
                  <select class="form-control" id="ddlCategory" name="ddlCategory" required>
                      <option value="0">select</option>
                      @foreach($categoryList as $category)
                      <option value="{{ $category->categoryId }}">{{ $category->categoryName }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Status: </label>
                <div class="col-sm-9">
                  <select class="form-control" id="ddlStatus" name="ddlStatus" required>
                      <option value="-1">Select Status:</option>
                      <option value="0">Inactive</option>
                      <option value="1">Active</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Quantity: </label>
                <div class="col-sm-9">
                  <select class="form-control" id="ddlQuantity" name="ddlQuantity" required>
                      <option value="-1">Select Quantity:</option>
                      <?php 
                      for($i = 1;$i < 20;$i++){
                      ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                      <?php 
                      }
                      ?>
                      
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Price: </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="itemPrice" id="itemPrice" onkeypress='validate(event)' value="" placeholder="Price in 0.00 format" required />
                </div>
              </div><!-- full name -->
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Package: </label>
                <div class="col-sm-9">
               
                @foreach($packageList as $package)
                  <div class="col-sm-4">
                    <label for="pckgCheck<?php echo $package->packagingId;?>" class="control-label">
                      <input type="checkbox" name="pckgCheck[]" data-chkpckgid="<?php echo $package->packagingId;?>" pckgCheck<?php echo $package->packagingId;?>" value="{{$package->packagingId }}">
                      <span>{{$package->packagingName }}</span>
                    </label>
                  </div>  
                @endforeach
                </div>
              </div>
             <input type="hidden" id="hdItemId" name="hdItemId" value="" />
              <div class="modal-footer center-btn">
                <input type="hidden" id="hdServiceId" name="hdServiceId" value="" />
                <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Save</button>
                <button type="button" class="btn btn-default outline pull-left" data-dismiss="modal">Cancel</button>
              </div>
          </form>
          
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade confirm" id="block">
  <div class="modal-dialog">
    <div class="modal-content confirm">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Block Contact</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you would like to block this user?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fill pull-left">Block</button>
        <button type="button" class="btn btn-default outline pull-left" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade confirm" id="delete-contact">
  <div class="modal-dialog">
    <div class="modal-content confirm">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Contact</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you would like to delete?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fill pull-left">Delete</button>
        <button type="button" class="btn btn-default outline pull-left" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div><!-- /.modal -->

 <div class="loading">
    <i class="fa fa-refresh fa-spin fa-2x fa-tw"></i>
    <br>
    <span>Loading</span>
  </div>
<!-- REQUIRED JS SCRIPTS -->
@include('admin.includes.foot')
<script src="{{ asset('js/ajaxcrud.js') }}"></script>

<script>
$(document).ready(function(){
  $(document).on('click','.edit-user',function(){
    var itemCode = packageIds = categoryId = itemDesc = itemStatus = itemId = price = quantity = "";
    $(':not([data-itemcode=""])')
    itemCode = $(this).data('itemcode');
    $(':not([data-packageid=""])')
    packageIds = $(this).data('packageid');
    $(':not([data-categoryid=""])')
    categoryId = $(this).data('categoryid');
    $(':not([data-itemdesc=""])')
    itemDesc = $(this).data('itemdesc');
    $(':not([data-itemstatus=""])')
    itemStatus = $(this).data('itemstatus');
    $(':not([data-itemid=""])')
    itemId = $(this).data('itemid');
    $(':not([data-price=""])')
    price = $(this).data('price');
    $(':not([data-quantity=""])')
    quantity = $(this).data('quantity');
    //alert(categoryId);

    var pckgId = packageIds.toString().split(",");
    
    var totalPackage = document.getElementsByName("pckgCheck[]");
    for(var j=0;j< totalPackage.length;j++){
      var num = $(totalPackage[j]).data('chkpckgid');
      num = num.toString();
      //alert(typeof(num.toString()));
      //if($(totalPackage[j]).data('chkpckgid') == );
      //jQuery.inArray($(totalPackage[j]).data('chkpckgid'), pckgId)
      //alert(pckgId.indexOf(num));
      if(pckgId.indexOf(num) > -1)
      $(totalPackage[j]).prop('checked',true);
      else
      $(totalPackage[j]).prop('checked',false);
      
    }
    
  
    $("#itemName").val(itemCode);
    $("#itemDesc").val(itemDesc);
    $("#ddlCategory").val(categoryId);
    $("#ddlStatus").val(itemStatus);
    $("#itemPrice").val(price);
    $("#ddlQuantity").val(quantity);
    $("#hdItemId").val(itemId);
    //$("#hdServiceId").val(serviceId);
    //$("#userNameE").val(custName);
    
  });
});
function validate(e) {
  var ev = e || window.event;
  var key = ev.keyCode || ev.which;
  key = String.fromCharCode( key );
  var regex = /[.0-9]/;
  if( !regex.test(key) ) {
    ev.returnValue = false;
    if(ev.preventDefault) ev.preventDefault();
  }
}
</script>

</body>
</html>