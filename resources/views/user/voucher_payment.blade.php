@php
                                    $total=session('cart');
                                    $total=$total['0']->netAmount;
                                    $sub_total=$total;
@endphp
@if($match =='remove')

<div class="cart-border">
<div id="vaucher_code">
                            <div class="col-md-6 contact-form">
                                <input  placeholder="Add Voucher Code" name="code"  id="code" type="text" class="contact-form" style="padding: 6px 10px;border: 1px solid #d9d18c;margin-bottom: 20px;width:100%">
                                </div>
                                <div class="col-md-4">
                                    <button id="voucher" class=" btn submit-btn qbuuton btn-lg" type="submit" style="margin:0px">Verify</button>
                                </div>
                                 
                                <div class="clearfix"></div>                    
</div>
</div>
<div class="estimate-total-box none-border">
                <div class="estimate-total">
                    <span>Grand Total</span>
                    <span>{{$total}}</span>
                </div>
                <input type="hidden" name="payment" value="{{$total}}">
                <input type="hidden" name="couponDiscValue" value="0">
                <input type="hidden" name="coupoanid" value="0">
</div>
@elseif($match!='')

@if(($total > $match->minOrderValue) && ($match->useLimit > $coupoanLimit))
<div class="cart-border">
                                <div class="col-md-9">
                                    <h5>Discount (%)</h5>
                                    <h3 style="color:#17b51a;font-size:12px">Now you get the {{ $match->discountPercent }} % </h3>
                                </div>
                                <div class="col-md-2">
                                    @php
                                    $discount_money=round($total*($match->discountPercent/100));
                                    @endphp
                                    @if($match->discVal > $discount_money )
                                    <h4>Rs. {{ $discount_money }}<a href="#"></h4>
                                    @else
                                    <h3 style="color:red;font-size:12px;background:none">Max discount Rs. {{$discount_money=$match->discVal }}.</h3>
                                    @endif
                                </div>
                                <div class="col-md-1">
                                    <span class="fa fa-close" id="remove_voucher"></i></span>
                                </div>
                                <div class="clearfix"></div>
</div>
<fieldset>
    <legend></legend>
    <div class="cart-border">
                                <div class="col-md-9">
                                    <h5>Total Money</h5>
                                </div>
                                <div class="col-md-3">
                                    @php
                                    $total = $sub_total - $discount_money;
                                    session(['total'=>$total]);

                                    @endphp
                                    <h6>Rs. {{$sub_total}} - Rs. {{$discount_money}} = Rs. {{$total}}</h6>
                                </div>
                                <div class="clearfix"></div>
    </div>
</fieldset>
                <div class="estimate-total-box none-border">
                <div class="estimate-total">
                    <span>Grand Total</span>
                    <span>{{$total}}</span>
                </div>
                <input type="hidden" name="payment" value="{{$total}}">
                <input type="hidden" name="couponDiscValue" value="{{$discount_money}}">
                <input type="hidden" name="coupoanid" value="{{$match->uniqueId}}">
                </div>
@elseif($match->useLimit < $coupoanLimit)
<div class="cart-border">
                                <div class="col-md-12" style="color:red;">
   
                                    Only {{$match->useLimit}} Limit is applicable for this coupoan.
                                    
                                </div>
                                <div class="clearfix"></div>
</div>

<div class="cart-border">
<div id="vaucher_code">
                            <div class="col-md-6 contact-form">
                                <input  placeholder="Add Voucher Code" name="code"  id="code" type="text" class="contact-form" style="padding: 6px 10px;border: 1px solid #d9d18c;margin-bottom: 20px;width:100%">
                                </div>
                                <div class="col-md-4">
                                    <button id="voucher" class=" btn submit-btn qbuuton btn-lg" type="submit" style="margin:0px">Verify</button>
                                </div>
                                 
                                <div class="clearfix"></div>                    
</div>
</div>
<div class="estimate-total-box none-border">
                <div class="estimate-total">
                    <span>Grand Total</span>
                    <span>{{$total}}</span>
                </div>
                <input type="hidden" name="payment" value="{{$total}}">
                <input type="hidden" name="couponDiscValue" value="0">
                <input type="hidden" name="coupoanid" value="0">
</div>

@else

<div class="cart-border">
                                <div class="col-md-12" style="color:red;">
   
                                    Min order Rs.{{$match->minOrderValue}} is applicable for this coupoan.
                                </div>
                                <div class="clearfix"></div>
</div>

<div class="cart-border">
<div id="vaucher_code">
                            <div class="col-md-6 contact-form">
                                <input  placeholder="Add Voucher Code" name="code"  id="code" type="text" class="contact-form" style="padding: 6px 10px;border: 1px solid #d9d18c;margin-bottom: 20px;width:100%">
                                </div>
                                <div class="col-md-4">
                                    <button id="voucher" class=" btn submit-btn qbuuton btn-lg" type="submit" style="margin:0px">Verify</button>
                                </div>
                                 
                                <div class="clearfix"></div>                    
</div>
</div>
<div class="estimate-total-box none-border">
                <div class="estimate-total">
                    <span>Grand Total</span>
                    <span>{{$total}}</span>
                </div>
                <input type="hidden" name="payment" value="{{$total}}">
                <input type="hidden" name="couponDiscValue" value="0">
                <input type="hidden" name="coupoanid" value="0">
</div>
@endif

@else
<div class="cart-border">
                                <div class="col-md-12" style="color:red;">
                                    This {{session('code')}} Voucher Code is not applicable. 
                                </div>
                                <div class="clearfix"></div>
</div>
<div class="cart-border">
<div id="vaoucher_code">
                                <div class="col-md-6 contact-form">
                                <input  placeholder="Add Voucher Code" name="code" value="{{session('code')}}" id="code" type="text" class="contact-form" style="padding: 6px 10px;border: 1px solid #d9d18c;margin-bottom: 20px;width:100%">
                                </div>
                                <div class="col-md-4">
                                    <button id="voucher" class="btn submit-btn qbuuton btn-lg" type="submit" style="margin:0px">Verify</button>
                                </div>
                                <div class="clearfix"></div>
</div>
</div>

<div class="estimate-total-box none-border">
                <div class="estimate-total">
                    <span>Grand Total</span>
                    <span>{{$total}}</span>
                </div>
                <input type="hidden" name="payment"  value="{{$total}}">
                <input type="hidden" name="couponDiscValue" value="0">
                <input type="hidden" name="coupoanid" value="0">
</div>
@endif



