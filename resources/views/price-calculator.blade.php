@extends('layouts.app')
@section('css')
@endsection

@section('content')

<div class="common-inner-head">

        <div class="container">

            <h3>Price Calculator</h3>

        </div>

    </div><!-- common-inner-head -->


<div class="common-padding-laundary price-calculator">

    <div class="container">

        <div class="services-ls">

          <div class="price-serives-box" id="showServices">

            <h4 id="hideServices">Select service</h4>

            @foreach($services as $service)
           <div class="s-input s-input--rounded">

              <input type="radio" name="service" id="{{$service->serviceName}}" value="{{$service->serviceId}}">

              <label for="{{$service->serviceName}}">

                <i class="aria-hidden">&nbsp;</i>

                {{$service->serviceName}}

              </label>

          </div>
          @endforeach
            

        </div>

        </div>
        <span class="alert" id="alert" style="color:red"></span>


        <div class="tabs-services-box">

            <ul class="nav nav-pills tabs-services" id="pills-tab" role="tablist">
            @php
            $i=1;
            @endphp
            @foreach($categories as $category)
              @if($i==1)
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home{{$i}}" role="tab" aria-controls="pills-home" aria-selected="true">{{$category->categoryName}}</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home{{$i}}" role="tab" aria-controls="pills-home" aria-selected="true">{{$category->categoryName}}</a>
              </li>
              @endif
              @php
              $i++;
              @endphp
            @endforeach
            </ul>

        </div>


        <div class="row">

            @php
            $k=1;
            @endphp
            @foreach($categories as $category)
            <div class="col-md-7 col-sm-12 toggle prevActives" id="pills-home{{$k}}" style="display:none">

                    <div class="tab-content" id="pills-tabContent{{$k}}" >

                      <div class="tab-pane show active"  role="tabpanel" aria-labelledby="pills-home-tab">

                        <div class="table-responsive">                    

                            <table class="table table-bordered table table-striped">                            

                                <thead>

                                    <tr>

                                        <th>Item</th>

                                        <th>Cost</th>

                                        <th>No. of items</th>

                                    </tr>

                                </thead>

                                <tbody>

                                @php
                                $j=1;
                                @endphp
                                  @if(in_array($category->categoryId,$categoryid))
                                 @foreach($price as $price_list)
                               
                                   @if($price_list->category_id == $category->categoryId)
                                    <tr>

                                        <td>{{ucfirst($price_list->item_name)}}</td>

                                        <td>Rs. {{ceil($price_list->rate)}}</td>

                                        <td>

                                        <div class="item-from " id="fieldId{{$j}}" style="display:flex;">

                                            <input type="text" name="quant[1]{{$j}}" id="code{{$j}}" value="0" min="0" max="10">
                                            <input type="hidden" name="item" id="item{{$j}}" value="{{$price_list->item_name}}">
                                            <input type="hidden" name="price" id="price{{$j}}" value="{{$price_list->rate}}">
                                            <input type="hidden" name="itemId" id="itemId{{$j}}" value="{{$price_list->itemId}}">
                                            <input type="hidden" name="category" id="category{{$j}}" value="{{$price_list->category_id}}">
                                        

                                        <span class="text-right plus-minus-box">
                                            <button type="button" class="plus-minus-btn btn-number" data-target-number="{{$j}}"  id="add{{$j}}" data-type="plus" data-field="quant[1]{{$j}}">
                                                <i class="fa fa-plus" aria-hidden="true"></i> </button>
          
                                            <button type="button" class="plus-minus-btn btn-number"  data-target-number="{{$j}}" id="subtract{{$j}}"  data-type="minus" id="dwm" data-field="quant[1]{{$j}}">
                                            <i class="fa fa-minus" aria-hidden="true"></i></button>
                                         </span>              
                                        </div>
                                                    <!-- <button class="plus-minus-btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>

                                                    <button class="plus-minus-btn" type="button" id="dwm"><i class="fa fa-minus" aria-hidden="true"></i></button> -->


                                        </td>
                                        <input type="hidden" name="hdItemVal" id="hdItemVal{{$j}}" value="" />
                                    </tr>
                                    @endif
                                    @php
                                    $j++;
                                    @endphp
                                    @endforeach
                                        <input type="hidden" name="hdCode" id="hdCode" value="" />
                                        <input type="hidden" name="hdItem" id="hdItem" value="">
                                        <input type="hidden" name="hdPrice" id="hdPrice" value="">
                                    @else
                                    <tr>
                                        <td colspan="3">Data not exist.</td>
                                    </tr>
                                    @endif
                            

                                </tbody>

                            </table>

                        </div><!-- table-responsive -->



                      </div>

                    </div><!-- tab-content -->

               
            </div><!-- col-md-7 -->
            @php
            $k++;
            @endphp
            @endforeach

            <div class="col-md-5 col-sm-12">
                <div class="calculator-details-box">
                    <h4>Price Estimator</h4>
                    <div class="calculator-details-price">
                        <b>Get an estimate of your launder bag</b>
                        <div id="ajax">
                            <!-- <div class="calculator-estimate-box">
                                <div class="estimate-total-box">
                                    <div class="estimate-total">
                                        <b>Sub Total</b>
                                        <b></b>
                                    </div>
                                    <div class="estimate-total estimate-total-discount">
                                        <span>GST 18%</span>
                                        <span>Rs. 72.00</span>
                                    </div>
                                    <div class="estimate-total estimate-total-discount">
                                        <span>Discount 10%</span>
                                        <span>Rs. 00.00</span>
                                    </div>
                                </div>
                                <div class="estimate-total-box none-border">
                                    <div class="estimate-total">
                                        <b>Grand Total</b>
                                        <b></b>
                                    </div>
                                </div>
                            </div> 
                            <div class="checkout-save-btn">
                                <a href="#" class="readMore">Save</a>
                                <a href="#" class="readMore">Checkout</a>
                            </div>-->
                        </div>
                    </div><!-- calculator-details-box -->
                </div><!-- col-md-5 -->
            </div>
    </div>

</div>
</div>
@section('js')
<script>
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            // if(parseInt(input.val()) == input.attr('min')) {
            //     $(this).attr('disabled', true);
            // }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            // if(parseInt(input.val()) == input.attr('max')) {
            //     $(this).attr('disabled', true);
            // }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<script>

$('#pills-tab a.nav-link').click(function(e){
    $('#pills-tab a.nav-link').removeClass('active');
    $(this).addClass('active');
    $('.prevActives').hide();
    $($(this).attr('href')).show();
})

$($('#pills-tab a.nav-link.active').attr('href')).show();

</script>

<script>
  $(document).ready(function(){
    $(document).on('click','.plus-minus-btn',function(e){
            
            var data_code  =  $(this).attr('data-target-number');
            //var codeValue = $('#hdCode').val();
            // var itemValue = $('#hdItem'+data_code).val();
            // var priceValue = $('#hdPrice'+data_code).val();
            
             //codeValue += codeValue ==  "" ? $('#code'+data_code).val() : ","+$('#code'+data_code).val();
            // var itemValue += itemValue ==  "" ? $('#item'+data_code).val() : ","+$('#item'+data_code).val();
            // var priceValue += priceValue ==  "" ? $('#price'+data_code).val() : ","+$('#price'+data_code).val();

            


            //alert(codeValue);
            var code=$('#code'+data_code).val();
            var item=$('#item'+data_code).val();
            var price=$('#price'+data_code).val();
            var itemId=$('#itemId'+data_code).val();
            var categoryId=$('#category'+data_code).val();   
            var val = code + "," + item + "," + price + "," + itemId + "," + categoryId;
            if(code != 0)
            $('#hdItemVal'+data_code).val(val);
            else
            $('#hdItemVal'+data_code).val('');

            var codeValue = "";
            var itemVal = $("input[name='hdItemVal']");
            for(var i = 0;i < itemVal.length;i++)
            {
                if(itemVal[i].value != undefined && itemVal[i].value != "") 
                codeValue += codeValue == "" ? itemVal[i].value : "#"+ itemVal[i].value;
            }
            //alert(codeValue);
                
        var path={!! json_encode(url('/')) !!};
        $.ajax({
          url:path+"/add_item",
          method:"POST",
          data:{"_token":"{{ csrf_token() }}","codeValue":codeValue},
          success:function(data){
            $("#ajax").html(data);
          }
        });
            e.preventDefault();

        });


        $(document).on('click','#orderSave',function(e){
            var service = 0;
            var chk = false;
            if ($('input[name=service]').is(':checked')){
                service = $("input[name='service']:checked").val();
                chk = true;
                document.getElementById("alert").innerHTML = "";
            }
            else 
            {
                 document.getElementById("alert").innerHTML = "Please choose the service";
    
            }
            if(chk){
                var subTotal = tax = netAmount = 0;
                var userType = "";
                subTotal = $('#orderValue').val();
                tax = $('#tax').val();
                netAmount = $('#netAmount').val();


                let order = {serviceId:"",itemCount:"",item:"",subTotal:"",tax:"",netAmount:""} 
                
                var itemId = $('input[name=itemadId]');
                var itemName = $('input[name=adproduct]');
                var categoryId = $('input[name=categoryadId]');
                var qunatity = $('input[name=adqunatity]');
                var rate = $('input[name=adrate]');
                var indvSubTotal = $('input[name=indvSubTotal]');

                var item = new Array();
                var cnt = 0;
                for(var i = 0;i < itemId.length;i++){
                    let itemObj = {itemId:"",itemName : "",categoryId : "",quantity : "", rate : "", indvSubTotal : ""};
                    if(itemId[i].value != ""){
                        itemObj.itemId = itemId[i].value;
                        itemObj.itemName = itemName[i].value;
                        itemObj.categoryId = categoryId[i].value;
                        itemObj.quantity = qunatity[i].value;
                        itemObj.rate = rate[i].value;
                        itemObj.indvSubTotal = indvSubTotal[i].value;
                        item[i] = itemObj;
                        cnt++;
                    }
                }
                order.serviceId = service;
                order.item = item;
                order.itemCount = cnt;
                order.subTotal = subTotal;
                order.tax = tax;
                order.netAmount = netAmount;
                var orderStr = JSON.stringify(order);
                console.log(order);
                var path={!! json_encode(url('/')) !!};
                $.ajax({
                    url:path+"/save-item",
                    method:"POST",
                    data:{"_token":"{{ csrf_token() }}","orderStr":orderStr},
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                    success:function(data){
                        //$("#loading-image").hide();
                        // $("#ajax").html(data);
                        window.location.href =  data ;
                    }
                });
            }
        });
    });


</script>


@endsection
@endsection