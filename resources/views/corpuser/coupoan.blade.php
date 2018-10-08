@extends('corpuser.layouts.app')

@section('content')



 <section class="content container-fluid dashboard">
     
      <!-- page content starts here -->    

        <div class="content-header">

           <h1>Coupoan</h1>

       </div>


       <div class="common-background">

         <div class="row">

          @foreach($coupoan as $d)

            <div class="offer-row">
            
            <div class="offer-card-wrapper">
              <div class="offer-card card">
                <img src="{{URL::asset('images/offers_images/offer-coupon2.jpg')}}" alt="" class="img-responsive card-img-top w-100">
                <div class="card-body">
                  <h5 class="card-title">{{$d->codeType}}</h5>
                  <button class="offer-code">{{$d->couponCode}}</button>

                  <p class="offer-valid">Coupoan Valid <b>{{date("d M,Y", strtotime($d->validFrom))}}</b> to <b>{{date("d M,Y", strtotime($d->validUpto))}}</b> upto </p>

                  <div class="min-max">
                      <p><b>Max. Discount:</b> Rs. {{$d->discVal}} </p>
                      <p><b>Min. Order:</b> Rs. {{$d->minOrderValue}} </p>
                  </div>

              </div><!-- offer-box -->

           </div>

         </div><!-- row -->

       </div><!-- common-background -->

          @endforeach

      </div><!-- row -->

       </div><!-- common-background -->

    </section><!-- /.content -->



@endsection