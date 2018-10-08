@extends('user.layouts.app')
@section('css')
<style>
.error{
  color:red ! important;
}
</style>
@endsection
@section('content')



<section class="content container-fluid dashboard">

      

      <!-- page content starts here -->    



   

             

       <div class="content-header">

           <h1>BOOK a LAUNDRY</h1>

       </div>



       <div class="common-background payment-wrapper">

            

            <div class="steps">

              <ol>

                  <li class="green-steps">

                      <a href="{{route('user.booking')}}">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Select Service</span>

                      </a>

                  </li><li class="green-steps">

                      <a href="#">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Add Items</span>

                      </a>

                  </li><li class="green-steps">

                      <a href="#">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Schedule</span>

                      </a>

                  </li><li class="green-steps">

                      <a href="#">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Review Order</span>

                      </a>

                  </li><li class="step-border-none">

                      <a href="#" class="none-margin">

                          <span class="step">5</span>

                          <span class="step-name">Payment</span>

                      </a>

                  </li>

              </ol>                

            </div><!-- steps -->



            <hr class="common-hr">



            <div class="cards common-card-head">

              <h2 class="heading">Please select a payment method</h2>

            </div>



             

            <div class="row">



              <div class="payment-box">

@php
$total=session('cart');
$total=$total['0']->netAmount;
@endphp

                  
        <form action="{{route('user.payment')}}" class="paymentmethod" method="post">

          {{Csrf_field()}}
          <div class="s-input s-input--rounded" style="margin:0px 10px !important;">

              <input type="radio" name="paymentmethod" id="cash" value="cash">
              
              <label for="cash">

                <i class="aria-hidden">&nbsp;</i>

                Cash

              </label>

              <input type="radio" name="paymentmethod" id="online" value="online">
              

              <label for="online">

                <i class="aria-hidden">&nbsp;</i>

                Online

              </label>

          </div>
          <input type="hidden" name="id"  value="{{$order->orderId}}">
          <input type="hidden" name="payment"  value="{{$total}}">
          <input type="hidden" name="couponDiscValue" value="0">
          <input type="hidden" name="coupoanid" value="0">
          <div class="estimate-total-box">
                <div class="estimate-total">
                    <span>Sub Total</span>
                    <span>Rs. {{$order->orderValue}}</span>
                </div>
                <div class="estimate-total estimate-total-discount">
                    <span>GST 5%</span>
                    <span>Rs. {{($order->netAmount)-($order->orderValue)}}</span>
                </div>

          <div class="estimate-total estimate-total-discount">
            <div id="ajax" style="width:100%">
              <div class="cart-border">
                    <div id="vaucher_code">
                      <div class="col-md-6 contact-form">
                          <input  placeholder="Add Voucher Code" name="code"  id="code" type="text" class="contact-form" style="padding: 6px 10px;border: 1px solid #d9d18c;margin-bottom: 20px;width:100%">
                      </div>
                      <div class="col-md-4">
                          <button id="voucher" class="btn submit-btn qbuuton btn-lg" type="button" style="margin:0px">Verify</button>
                      </div>
                      <div class="clearfix"></div>
                    </div>
              </div>
              <div class="estimate-total-box none-border">
                <div class="estimate-total">
                    <span>Grand Total</span>
                    <span>Rs. {{$order->netAmount}}</span>
                </div>
            </div>
          </div>
        </div>
 
        </div>

              <!-- payment-box -->



         
          <div class="col-md-12">

                <div class="checkout-save-btn">

                 <input type="submit" class="readMore" value="payment"></>

                </div>

        </div>
      </form>
         </div>


         </div>

        

      

      <!-- page content ends here -->



    </section><!-- /.content -->



@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#voucher',function(e){
    // $('#vaucher_code').submit();
            var code=$("#code").val();           
            var path={!! json_encode(url('/')) !!};
        $.ajax({
          url:path+"/user/voucher_payment",
          method:"POST",
          data:{"_token":"{{ csrf_token() }}","code":code},
          success:function(data){
            $("#ajax").html(data);
            var postcode=$("#postcode").val();

          }
        });
            e.preventDefault();

        });


        
         $(document).on('click','#remove_voucher',function(e){
            
            var path={!! json_encode(url('/')) !!};
        $.ajax({
          url:path+"/user/remove_voucher",
          method:"POST",
          data:{"_token":"{{ csrf_token() }}"},
          success:function(data){
            $("#ajax").html(data);
            var postcode=$("#postcode").val();
            
          }
        });
            e.preventDefault();

        });


    });
</script>

<script>

                $('.paymentmethod').validate({


                    rules: {                       

                       paymentmethod: {

                           required: true,

                        },
                       
                    }

                });

</script>
@endsection