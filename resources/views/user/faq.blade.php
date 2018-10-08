@extends('user.layouts.app')
@section('content')
<section class="content container-fluid faq">
      
      <!-- page content starts here -->    

   
            <div class="cards">
               <div class="content-header">
                 <h1>FAQ</h1>
             </div>


             <div class="common-background">

              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

@php
$i=1;
@endphp

@foreach ($title_name as $name)
              <div class="panel panel-default">
                  <div class="panel-heading common-faqHead" role="tab" id="headingOne{{$i}}">
                      <h4 class="panel-title">
                          <a class=" @if($i>1) collapsed  @endif " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$i}}" aria-expanded="true" aria-controls="collapseOne{{$i}}">                        
                              
                              {{ $name->title }}
                          </a>
                      </h4>
                  </div>
              </div>

            <div id="collapseOne{{$i}}" class="panel-collapse collapse @if ($i==1) in @endif " role="tabpanel" aria-labelledby="headingOne{{$i}}">
                 @foreach($data as $d)
                        
                        @if( $d->title == $name->id)
                <div class="panel-body">               
                    
                <div class="panel-group-inner" id="accordion-inner" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default panel-question">
                        <div class="panel-heading" role="tab" id="headingOneone{{$i}}">
                            <h4 class="panel-title">

                                <a role="button" data-toggle="collapse" data-parent="#accordion-inner" href="#collapseQues{{$i}}" aria-expanded="true" aria-controls="collapseQues{{$i}}">
                                    {{ $d->sub_title}}
                                </a>


                            </h4>
                        </div>
                        <div id="collapseQues{{$i}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOneone{{$i}}">
                            <div class="panel-body">
                                <p>{!! $d->description !!}</p>
                            </div>
                        </div>
                    </div><!-- panel-question -->
                    
                </div><!-- panel-group -->

                </div>
           
       
             @endif
             
             @php
                $i++;
            @endphp
            
            @endforeach 
       

                 </div>
             @endforeach
                 </div>
                </div>
            </div> 
      <!-- page content ends here -->

    </section><!-- /.content -->
@endsection