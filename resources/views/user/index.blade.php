@extends('user.layouts.app')

@section('content')


    <section class="content container-fluid">

@if(session('success') )
             <!-- page content starts here -->

       <div class="content-header">

           <h1>Your Booking submit successfully</h1>

       </div><!-- content-header -->

@elseif(session('error') )
             <!-- page content starts here -->

       <div class="content-header">

           <h1>Your payment is not submit, something issue in it.</h1>

       </div><!-- content-header -->

@endif
@php
  session()->forget('success');
  session()->forget('error');
@endphp

       <!-- page content starts here -->

       <div class="content-header">

           <h1>Book a Laundry</h1>

       </div><!-- content-header -->


      <div class="box">

          

          <div class="box-content">

              

            <div class="steps">

              <ol>

                  <li class="step-border-none">

                      <a href="#">

                          <span class="step">1</span>

                          <span class="step-name">Select Service</span>

                      </a>

                  </li><li class="inactive">

                      <a href="#">

                          <span class="step">2</span>

                          <span class="step-name">Add Items</span>

                      </a>

                  </li><li class="inactive">

                      <a href="#">

                          <span class="step">3</span>

                          <span class="step-name">Schedule</span>

                      </a>

                  </li><li class="inactive">

                      <a href="#">

                          <span class="step">4</span>

                          <span class="step-name">Review Order</span>

                      </a>

                  </li><li class="inactive">

                      <a href="#" class="none-margin">

                          <span class="step">5</span>

                          <span class="step-name">Payment</span>

                      </a>

                  </li>

              </ol>                

            </div><!-- /.steps-->

             

             <hr>

             

            <div class="row">

                <div class="cards">

                    

                    <h2 class="heading">Please select service</h2>    



                    @foreach($services as $service)

                    <div class="col-md-4">

                        <div class="card">

                           <div class="card-bg service1">

                            <div class="icon-main">

                                <img src="{{URL::asset('images/services_images/'.$service->serviceImage)}}" alt="">

                              </div>

                               <div class="header">

                                   <h2>{{ucfirst($service->serviceName)}}</h2>

                               </div>

                           </div>

                           <div class="card-content">

                              <a href="{{route('user.add_item',$service->serviceId)}}" class="btn btn-default">Select Items</a>

                           </div>

                        </div>                    

                    </div>

                    @endforeach



                </div><!-- /.cards -->

            </div>

            

              

          </div><!-- /.box-content -->

          

      </div><!-- /.box -->

      

      <!-- page content ends here -->



    </section><!-- /.content -->



@endsection