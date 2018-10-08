@php
    $items=json_decode($data1);
    $subTotal = $tax = 0;
@endphp
@if(count($items) > 0)
<div class="calculator-estimate-box">
    <img id="loading-image" src="{{ URL::to('/') }}/assets/image/ajax-loader.gif" style="display:none;"/>

    <!-- @if(count($data1) == 0)
    @php
    $items=json_decode($data);  
    @endphp

        <div class="calculator-estimate">

            <span>{{$items[0]->product}}</span>

            <input type="text" value="{{$items[2]->qunatity}}">

            <span>Rs. {{$sub_total=(($items[2]->qunatity)*ceil($items[1]->rate))}}.00</span>

        </div>
    @else -->
    
    
    @php $p = 0; @endphp
    @foreach($items as $item_product)
                                
        <div class="calculator-estimate">

            <span>{{$item_product->product}}</span>

            <span>{{$item_product->qunatity}}</span>

            <span>Rs. {{$sub_total=(($item_product->qunatity)*ceil($item_product->rate))}}.00</span>
            @php $subTotal += $sub_total;@endphp
        </div><!-- calculator-estimate -->
        <input type="hidden" id="itemadId{{$p}}" name="itemadId" value="{{$item_product->itemId}}" />
        <input type="hidden" id="categoryadId{{$p}}" name="categoryadId" value="{{$item_product->categoryId}}" />
        <input type="hidden" id="adproduct{{$p}}" name="adproduct" value="{{$item_product->product}}" />
        <input type="hidden" id="adqunatity{{$p}}" name="adqunatity" value="{{$item_product->qunatity}}" />
        <input type="hidden" id="adrate{{$p}}" name="adrate" value="{{$item_product->rate}}" />
        <input type="hidden" id="indvSubTotal{{$p}}" name="indvSubTotal" value="{{$sub_total}}" />
        @php $p++;@endphp
    @endforeach
<!-- @endif -->

</div><!-- calculator-estimate-box -->
<div class="estimate-total-box">
    <div class="estimate-total">
        <b>Sub Total</b>
        <b>Rs. {{$subTotal}}.00</b>
    </div>
    <div class="estimate-total estimate-total-discount">
        <span>GST 5%</span>
        <span>Rs. {{$tax = ceil($subTotal * 0.05) }}.00</span>
    </div>
    <!-- <div class="estimate-total estimate-total-discount">
        <span>Discount 10%</span>
        <span>Rs. 00.00</span>
    </div> -->
</div>
<div class="estimate-total-box none-border">
    <div class="estimate-total">
        <b>Grand Total</b>
        <b>Rs. {{ ($subTotal + $tax) }}.00</b>
    </div>
</div>
<input type="hidden" id="orderValue" name="orderValue" value="{{$subTotal}}" />
<input type="hidden" id="tax" name="tax" value="{{$tax}}" />
<input type="hidden" id="netAmount" name="netAmount" value="{{($subTotal + $tax)}}" />
<input type="hidden" id="url1" name="url1" value="{{$url1}}" />
<div class="checkout-save-btn">
    
   @if($url != 'repeat_order')
    <a href="javascript:void(0);" id="orderSave12" name="orderSave12" class="readMore">Save</a>
   @endif
    <a href="javascript:void(0);" id="orderSave" name="orderSave" class="readMore">Checkout</a>
</div>
@endif