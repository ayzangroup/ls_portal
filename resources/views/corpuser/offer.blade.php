@extends('corpuser.layouts.app')

@section('content')
 <section class="content container-fluid dashboard">
      <!-- page content starts here -->    
      <div class="content-header">
          <h1>Offer</h1>
      </div>

      <div class="common-background">
        
          @php
              $user=Auth::guard('corpuser')->user();                
          @endphp

          @foreach($offers as $offer)
          @php
              $userId=explode(', ',$offer->introducingCustomerId);                
          @endphp

          @if(in_array($user->corpCustId,$userId))

          <div class="offer-row">
            
            <div class="offer-card-wrapper">
              <div class="offer-card card">
                <img src="{{URL::asset('images/offers_images/offer-coupon2.jpg')}}" alt="" class="img-responsive card-img-top w-100">
                <div class="card-body">
                  <h5 class="card-title">{{$offer->offerType}} Special Offer</h5>
                  <button class="offer-code">{{$offer->offerCode}}</button>
                  <p class="offer-valid">Offer Valid <b>{{date("d M,Y", strtotime($offer->offerStartDate))}}</b> to <b>{{date("d M,Y", strtotime($offer->offerStartDate))}}</b></p>
                  
                  <div class="min-max">
                    <p><b>Max. Discount:</b> Rs. {{$offer->maxdiscVal}} </p>
                    <p><b>Min. Order:</b> Rs. {{$offer->minOrderValue}} </p>
                  </div>

                  <div class="social-icons-wrapper">
                    <ul>
                      @php
                      $sharing=explode(', ', $offer->sharedBy);
                      @endphp

                      @foreach($sharing as $share)
                      @if($share == '1')
                      <li><a href="{{route('user.facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a>
                      </li>
                      @endif
                      @if($share == '2')
                      <li><a href="{{route('user.twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a>
                      </li>
                      @endif
                      @if($share == '3')
                      <li><a href="{{route('user.gplus')}}" target="_blank"><i class="fa fa-google-plus"></i></a>
                      </li>
                      @endif
                      @if($share == '4')
                      <li><a href="{{route('user.linkedin')}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                      </li>
                      @endif
                      @endforeach
                    </ul>
                  </div>
                  <a class="terms-and-conditons" href="#term-and-condition-modal{{$offer->id}}" data-toggle="modal" data-target="#term-and-condition-modal{{$offer->id}}">* Terms &amp; conditions</a>
                  <div class="modal fade term-and-condition-modal" id="term-and-condition-modal{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="term-and-condition-modal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Terms &amp; Conditons</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                              <p>
                                {{$offer->offerDescription}}
                              </p>              
                          
                          </div>
                        </div>
                      </div>
                    </div>
                </div> <!-- card-body -->
              </div> <!-- offer-card -->
            </div> <!-- offer-card-wrapper -->
            
          </div> <!-- offer-row -->          
          @endif
          @endforeach
        
      </div><!-- common-background -->
      <!-- page content ends here -->
    </section><!-- /.content -->

@endsection