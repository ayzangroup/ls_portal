@extends('corpuser.layouts.app')
@section('css')
<style>
.error
{
  color:red !important;
}
</style>
@endsection

@section('content')


<section class="content container-fluid dashboard">

      <!-- page content starts here -->    

       <div class="content-header">

           <h1>BOOK a LAUNDRY</h1>

       </div>



       <div class="common-background schedule-wrapper">

            

            <div class="steps">

              <ol>

                  <li class="green-steps">

                      <a href="{{route('corpuser.booking')}}">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Select Service</span>

                      </a>

                  </li><li class="green-steps">

            @php
            $orderId=Session::get('orderId');
            $createdOn= time();
            @endphp
                      <a href="{{route('corpuser.edit_item',$orderId)}}">

                          <span class="step"><i class="fa fa-check" aria-hidden="true"></i></span>

                          <span class="step-name">Add Items</span>

                      </a>

                  </li><li class="step-border-none">

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

            </div><!-- steps -->



            <hr class="common-hr">



            <div class="cards common-card-head">

              <h2 class="heading">Schedule</h2>

            </div>



             
          <form class="form-horizontal add-schedule" action="{{route('corpuser.add_schedule')}}" method="post">
            {{csrf_field()}}
            
            <input type="hidden" name="orderId" value="{{$orderId[0]}}">
            <input type="hidden" name="createdOn" value="{{$createdOn}}">
            <div class="row">



                <div class="col-md-4">

                  <div class="schedule-shadow-box">

                 <h4>Schedule Pickup</h4>

                  <div class="schedule-box">

                    @if(count($address)=='0')
                    <div ><a href="#address{{$orderId[0]}}" data-toggle="modal" class="add-address btn-default">Add Address</a></div>
                    <span class="alert" id="alert" style="color:red"></span>
                    @else
                      @foreach($address as $details)
                      @if(((strlen($details->companyAddress1) >2) && (strlen( $details->companyAddress2) >2) && (strlen($details->state) >2) && (strlen($details->city) >2 ) ) != '')  
                        
                        <div class="s-input s-input--rounded">
                        @if($details->addressType=='home')
                        
                          <input type="radio" name="pickup_address" id="pickup_address" value="{{$details->uniqueId}}" @if($details->uniqueId == $order->pickid) checked @elseif(count($address)=='1') checked @endif id="toggle-data"  onclick="homeclick();"><!-- class="hide" -->

                          <label for="toggle-data">

                              <i class="aria-hidden">&nbsp;</i> {{ucfirst($details->addressType)}}

                          </label>


                        
                          <div class="toggle-data">

                              <p>{{$details->companyAddress1}}, {{$details->companyAddress2}}, {{$details->city}}, 

                                {{$details->state}} ({{$details->pincode}})</p>

                          </div>
                        @else
                          <input type="radio" name="pickup_address"  id="pickup_address" @if($details->uniqueId == $order->pickid) checked @elseif(count($address)=='1') checked @endif  value="{{$details->uniqueId}}"  onclick="{{($details->addressType)}}click();"><!-- class="hide" -->

                          <label for="{{($details->addressType)}}">

                              <i class="aria-hidden">&nbsp;</i> {{ucfirst($details->addressType)}}

                          </label>

                          <div class="{{($details->addressType)}}-data">

                              <p>{{$details->companyAddress1}}, {{$details->companyAddress2}}, {{$details->city}}, 

                                {{$details->state}} ({{$details->pincode}})</p>

                          </div>
                        @endif

                      </div>
                    @else
                     <div ><a href="#address{{$orderId[0]}}" data-toggle="modal" class="add-address btn-default">Add Address</a></div>
                    <span class="alert" id="alert" style="color:red"></span>
                     @endif
                    @endforeach
                  @endif

                      <div class="form-group">
                        @php

                        $pickup_date=date('m/d/Y', strtotime(str_replace('-','/',$order->pickup_date)));
                        $deliver_date=date('m/d/Y', strtotime(str_replace('-','/',$order->deliver_date)));

                        @endphp

                          <input type="text" class="form-control calendar" placeholder="MM/DD/YYYY" name="pickup_date" value="{{$pickup_date}}" id="datepicker" onchange="myFunction()">

                      </div>





                      <div class="form-group">

                        <div class="row">

                          <div class="col-md-6 col-sm-6 col-xs-6 first-time">

                              <input type="text" class="form-control" placeholder="Start Time" name="starttime" value="{{$order->pickupstarttime}}" id="stepExample1" onblur="return checktime()">

                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6 second-time">

                            <input type="text" class="form-control" placeholder="End Time" name="endtime" value="{{$order->pickupendtime}}" id="stepExample2" onblur="return checktime()">

                          </div>
                          

                        </div>

                      </div>
                      <span class="alert" id="alert1" style="color:red"></span>


                  </div><!-- schedule-box -->

                </div><!-- schedule-shadow-box -->

                </div>



                <div class="col-md-4">



                  <div class="schedule-shadow-box">

                    <h4>Schedule Delivery</h4> 

                  <div class="schedule-box">
                  
                    @if(count($address) =='0')
                    <div ><a href="#address{{$orderId[0]}}" data-toggle="modal" class="add-address btn-default">Add Address</a></div>
                    <span class="alert" id="alert" style="color:red">Please choose the address</span>
                    @else

                       @foreach($address as $details)
                       @if(((strlen($details->companyAddress1) >2) && (strlen( $details->companyAddress2) >2) && (strlen($details->state) >2) && (strlen($details->city) >2 ) ) != '')
                        <div class="s-input s-input--rounded">

                            @if($details->addressType=='home')
                          <input type="radio" name="deliver_address" id="toggle-data-rt" value="{{$details->uniqueId}}" @if($details->uniqueId == $order->deliverid) checked @elseif(count($address)=='1') checked @endif onclick="homeclickrt();"><!-- class="hide" -->

                          <label for="toggle-data-rt">

                              <i class="aria-hidden">&nbsp;</i> {{ucfirst($details->addressType)}}

                          </label>


                              <div class="toggle-data-rt">

                                  <p>{{$details->companyAddress1}}, {{$details->companyAddress2}}, {{$details->city}}, 

                                    {{$details->state}} ({{$details->pincode}})</p>

                              </div>
                            @else
                              <input type="radio" name="deliver_address" id="{{($details->addressType)}}rt" value="{{$details->uniqueId}}" @if($details->uniqueId == $order->deliverid) checked @elseif(count($address)=='1') checked @endif  onclick="{{$details->addressType}}clickrt();"><!-- class="hide" -->

                          <label for="{{($details->addressType)}}rt">

                              <i class="aria-hidden">&nbsp;</i> {{ucfirst($details->addressType)}}

                          </label>
                              <div class="{{($details->addressType)}}-data-rt">

                                  <p>{{$details->companyAddress1}}, {{$details->companyAddress2}}, {{$details->city}}, 

                                    {{$details->state}} ({{$details->pincode}})</p>

                              </div>
                            @endif

                          </div>
                        @else
                     <div ><a href="#address{{$orderId[0]}}" data-toggle="modal" class="add-address btn-default">Add Address</a></div>
                    <span class="alert" id="alert" style="color:red"></span>
                     @endif
                        @endforeach
                    @endif


                      <div class="form-group">

                          <input type="text" class="form-control calendar" placeholder="MM/DD/YYYY"  name="deliverdate" value="{{$deliver_date}}" id="datepicker2">

                          <div class="clearfix"></div>

                      </div>



                     <div class="form-group">

                        <div class="row">

                         <div class="col-md-6 col-sm-6 col-xs-6 first-time">

                              <input type="text" class="form-control" placeholder="Start Time" name="deliverstarttime" value="{{$order->deliverstarttime}}" id="stepExample3" onblur="return checktime1()">

                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6 second-time">

                            <input type="text" class="form-control" placeholder="End Time" name="deliverendtime" value="{{$order->deliverendtime}}" id="stepExample4" onblur="return checktime1()">

                          </div>

                        </div>

                      </div>

                      <span class="alert" id="alert2" style="color:red"></span>


                  </div><!-- schedule-box -->



                </div><!-- schedule-shadow-box -->



                </div>



                <div class="clearfix"></div>

                <div class="col-md-8 btn-full">

                    <div class="checkout-save-btn">

                        <a href="{{route('corpuser.edit_item',$orderId)}}" class="readMore">Back</a>

                        <input type="submit" class="readMore" value="continue">

                    </div>

                </div>



            </div>
          </form>


         </div>

   

      

      <!-- page content ends here -->



    </section><!-- /.content -->


     <!-- add address Model -->

        <div class="modal fade" id="address{{$orderId[0]}}" tabindex="-1"  aria-hidden="true" role="basic">

                <div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                            <h4 class="modal-title">Add Address</h4>

                        </div>

                    <form  class="save_address" action="{{route('corpuser.save_address')}}" method="post">

                    {{csrf_field() }}

                        <div class="form-group col-md-6">

                                    <label>Line1</label>

                                    <input type="text" name="line1" class="form-control">
                                    <input type="hidden" name="url" class="form-control" value="schedule">

                                </div>



                                <div class="form-group col-md-6">

                                    <label>Line2</label>

                                    <input type="text" name="line2" class="form-control">

                                </div>





                                <div class="form-group col-md-6">

                                    <label>State</label>

                                    <input type="text" name="state" class="form-control">

                                </div>



                                <div class="form-group col-md-6">

                                    <label>City</label>

                                    <input type="text" name="city" class="form-control">

                                </div>

                                <div class="form-group col-md-12">

                                    <label>Pincode</label>

                                    <input type="number" name="pincode" class="form-control">

                                </div>

                               

                            



                                <div class="form-group col-md-12 selectCountry">

                                    <label>Country Name</label>

                                    <select class="form-control" name="countryName">

                                        <option value="">Select Country Name</option>

                                        <option value="india">India</option>

                                    </select>

                                </div>



                                <div class="form-group col-md-6">

                                    <label>Building Name</label>

                                    <input type="text" name="buildingName" class="form-control">

                                </div>

                                <div class="form-group col-md-6">

                                    <label>Building Floor</label>

                                    <input type="number" name="buildingFloor" class="form-control">

                                </div>

                                <div class="form-group col-md-12">

                                    <label>Flat Number or House Number</label>

                                    <input type="test" name="buildingNumber" class="form-control">

                                </div>

                                <div class="form-group col-md-12 selectCountry">

                                    <label>Building Type</label>

                                    <select class="form-control" name="buildingType">

                                        <option value=""></option>

                                        <option value="flat">Flat</option>

                                        <option value="villa">Villa</option>

                                        <option value="tower">Tower</option>

                                    </select>

                                </div>

                                 <div class="form-group col-md-12 selectCountry">

                                    <label>Lift</label>

                                    <select class="form-control" name="isLift">

                                        <option value=""></option>

                                        <option value="1">Yes</option>

                                        <option value="0">No</option>

                                    </select>

                                </div>



                                <div class="col-md-12 extra-dtls">

                                    <h4>Additional Address Details</h4>

                                    <p>Preferences are used to plan your delivery. However, shipments can sometimes arrive early or later than planned.</p>

                                </div>



                                <div class="form-group col-md-12 type-addAddress">

                                    <label>Select an Address Type</label>

                                    <div class="schedule-box">

                                            <div class="s-input s-input--rounded">

                                                <input type="radio" name="addressType" value="home" id="home" >

                                                <label for="home">

                                                    <i class="aria-hidden">&nbsp;</i> Home

                                                </label>

                                            </div>



                                            <div class="s-input s-input--rounded">

                                                <input type="radio" name="addressType" value="office" id="office">

                                                <label for="office">

                                                    <i class="aria-hidden">&nbsp;</i> Office

                                                </label>

                                            </div>



                                            <div class="s-input s-input--rounded">

                                                <input type="radio" name="addressType" value="other" id="other">

                                                <label for="other">

                                                    <i class="aria-hidden">&nbsp;</i> Other

                                                </label>

                                            </div>



                                    </div>

                                </div>

                        <input type="hidden" name="id" value="{{Auth::guard('corpuser')->user()->corpCustId}}">

                        <div class="modal-footer">

                            <button type="button" class="btn" style="border: 1px solid;background: white;width:80px ! important" data-dismiss="modal">Close</button>

                            <input type="submit" id="saveorder" class="btn green">

                        </div>

                    </form>

                    </div>

            </div>

              </div>



@endsection
@section('js')
<script>
var d = new Date();
var d1 = new Date();
var hours = d.getHours();
var month = d.getUTCMonth() + 1;

var today = month + '/' + d.getDate() + '/' + d.getFullYear();
var myToday = new Date(today);

var timestamp1=myToday.getTime();

var datepicker1 = document.getElementById("datepicker").value;
var pickerdate1 = new Date(datepicker1);

      if(hours <= '9')
      {
        var hours = d.getHours();
        hours= '0'+hours;
        var pickertime = hours + ":" + d.getMinutes();
      }
      else
      {
      var pickertime = d.getHours() + ":" + d.getMinutes();
      var deliverendtime = d.getHours()+3 + ":" + d.getMinutes(); 
      }


      if(pickertime > '07:00' && pickertime < '18:30')
      {
          var hours = d.getHours();
          var minutes = d.getMinutes();
          var ampm = hours >= 12 ? 'pm' : 'am';
          hours = hours % 12;
          hours = hours ? hours : 12; // the hour '0' should be '12'
          minutes = minutes < 10 ? '0'+minutes : minutes;
          if(minutes > 30)
          {
            minutes= '00';
            strhours= hours+1;
            endminutes= '30';
            strendhours= hours+1;
            endhours= hours+3;
            deliverendhours= hours+3;

          }
          else
          {
            minutes= '30';
            endminutes= '00';
            strhours= hours;
            strendhours= hours+1; 
            endhours= hours+2;
            deliverendhours= hours+3;

          }
          

          var strTime = strhours + ':' + minutes + ' ' + ampm;
          var endTime = strendhours + ':' + endminutes + ' ' + ampm;
          var deliverstrTime = endhours + ':' + minutes + ' ' + ampm;
          var deliverendTime = deliverendhours + ':' + endminutes + ' ' + ampm;

          var minTime = strTime;
          var maxTime = '7.00pm';

      }
      else
      {
          var minTime= '7:00am';
          var maxTime= '7:00pm';
          var endTime= '7:30am';
          var startdate = d.setDate(d.getDate() + 1);
          var startdate=new Date(startdate);
          var startmonth = startdate.getUTCMonth() + 1; //months from 1-12
          var startday = startdate.getUTCDate();
          var startyear = startdate.getUTCFullYear();

          startnewdate = "0" + startmonth +  "/" + startday + "/" + startyear ;
         $('#datepicker').val(startnewdate);
      }

      if(deliverendtime > '19:00' && pickertime < '18:30')
      {
         var deliverstrTime= '7:00am';
         var deliverendTime= '7:30am';
         var enddate = d1.setDate(d1.getDate() + 1);
         var deliverenddate=new Date(enddate);
         var month = deliverenddate.getUTCMonth() + 1; //months from 1-12
          var day = deliverenddate.getUTCDate();
          var year = deliverenddate.getUTCFullYear();

          newdate = "0" + month +  "/" + day + "/" + year ;

         $('#datepicker2').val(newdate);
      }
      else if(deliverendtime > '19:00' && pickertime > '18:30' )
      {
        var deliverstrTime= '9:00am';
         var deliverendTime= '9:30am';
         var enddate = d1.setDate(d1.getDate() + 1);
         var deliverenddate=new Date(enddate);
         var month = deliverenddate.getUTCMonth() + 1; //months from 1-12
          var day = deliverenddate.getUTCDate();
          var year = deliverenddate.getUTCFullYear();

          newdate = "0" + month +  "/" + day + "/" + year ;

         $('#datepicker2').val(newdate);

      }

 $(function () {

        jQuery('#stepExample1').timepicker({
          
            'minTime': minTime,
            'maxTime': maxTime,

            //format: 'H:i'
        });
        jQuery('#stepExample2').timepicker({
            'minTime': endTime,
            'maxTime': maxTime,
            
            //format: 'H:i'
        });
        jQuery('#stepExample3').timepicker({
            'minTime': deliverstrTime,
            'maxTime': maxTime,
            
            //format: 'H:i'
        });
        jQuery('#stepExample4').timepicker({
            'minTime': deliverendTime,
            'maxTime': maxTime,
            
            //format: 'H:i'
        });
    });
$('#datepicker').datepicker({ 
    startDate: new Date()
});
$('#datepicker2').datepicker({ 
    startDate: new Date() 
});

function myFunction() {
    var datepicker1 = document.getElementById("datepicker").value;
    pickerdate1 = new Date(datepicker1);
    var timestamp=pickerdate1.getTime();
    console.log(timestamp);
    console.log(timestamp1);

if(timestamp1 == timestamp)
{

      if(hours <= '9')
      {
        var hours = d.getHours();
        hours= '0'+hours;
        var pickertime = hours + ":" + d.getMinutes();
      }
      else
      {
      var pickertime = d.getHours() + ":" + d.getMinutes();
      var deliverendtime = d.getHours()+3 + ":" + d.getMinutes(); 
      }


      if(pickertime > '07:00' && pickertime < '18:30')
      {
          var hours = d.getHours();
          var minutes = d.getMinutes();
          var ampm = hours >= 12 ? 'pm' : 'am';
          hours = hours % 12;
          hours = hours ? hours : 12; // the hour '0' should be '12'
          minutes = minutes < 10 ? '0'+minutes : minutes;
          if(minutes > 30)
          {
            minutes= '00';
            strhours= hours+1;
            endminutes= '30';
            strendhours= hours+1;
            endhours= hours+3;
            deliverendhours= hours+3;

          }
          else
          {
            minutes= '30';
            endminutes= '00';
            strhours= hours;
            strendhours= hours+1; 
            endhours= hours+2;
            deliverendhours= hours+3;

          }
          

          var strTime = strhours + ':' + minutes + ' ' + ampm;
          var endTime = strendhours + ':' + endminutes + ' ' + ampm;
          var deliverstrTime = endhours + ':' + minutes + ' ' + ampm;
          var deliverendTime = deliverendhours + ':' + endminutes + ' ' + ampm;

          var minTime = strTime;
          var maxTime = '7.00pm';
          $('#datepicker2').val(datepicker1);

      }
      else
      {
          var minTime= '7:00am';
          var maxTime= '7:00pm';
          var endTime= '7:30am';
          var startdate = d.setDate(d.getDate() + 1);
          var startdate=new Date(startdate);
          var startmonth = startdate.getUTCMonth() + 1; //months from 1-12
          var startday = startdate.getUTCDate();
          var startyear = startdate.getUTCFullYear();

          startnewdate = "0" + startmonth +  "/" + startday + "/" + startyear ;
         $('#datepicker').val(startnewdate);
      }

      if(deliverendtime > '19:00' && pickertime < '18:30')
      {
         var deliverstrTime= '7:00am';
         var deliverendTime= '7:30am';
         var enddate = d1.setDate(d1.getDate() + 1);
         var deliverenddate=new Date(enddate);
         var month = deliverenddate.getUTCMonth() + 1; //months from 1-12
          var day = deliverenddate.getUTCDate();
          var year = deliverenddate.getUTCFullYear();

          newdate = "0" + month +  "/" + day + "/" + year ;

         $('#datepicker2').val(newdate);
      }
      else if(deliverendtime > '19:00' && pickertime > '18:30' )
      {
        var deliverstrTime= '9:00am';
         var deliverendTime= '9:30am';
         var enddate = d1.setDate(d1.getDate() + 1);
         var deliverenddate=new Date(enddate);
         var month = deliverenddate.getUTCMonth() + 1; //months from 1-12
          var day = deliverenddate.getUTCDate();
          var year = deliverenddate.getUTCFullYear();

          newdate = "0" + month +  "/" + day + "/" + year ;

         $('#datepicker2').val(newdate);

      }     

}
else
{

          var minTime= '7:00am';
          var maxTime= '7:00pm';
          var endTime= '7:30am';
          var deliverstrTime= '9:00am';
          var deliverendTime= '9:30am';
          $('#datepicker2').val(datepicker1);
           
}

$(function () {

        jQuery('#stepExample1').timepicker({
          
            'minTime': minTime,
            'maxTime': maxTime,

            //format: 'H:i'
        });
        jQuery('#stepExample2').timepicker({
            'minTime': endTime,
            'maxTime': maxTime,
            
            //format: 'H:i'
        });
        jQuery('#stepExample3').timepicker({
            'minTime': deliverstrTime,
            'maxTime': maxTime,
            
            //format: 'H:i'
        });
        jQuery('#stepExample4').timepicker({
            'minTime': deliverendTime,
            'maxTime': maxTime,
            
            //format: 'H:i'
        });
    });


}


</script>




<script>

             $(document).ready(function(){
             

                $('.add-schedule').validate({


                    rules: {                       

                        pickup_address: {

                           required: true,

                        },
                        deliver_address: {
                           required: true,
                        },
                        deliverendtime: {
                           required:true,
                        },
                        deliverstarttime: {
                           required:true,
                        },
                        endtime: {
                           required:true,
                        },
                        starttime: {
                           required:true,
                        },
                        deliverdate: {
                           required:true,
                        },
                        pickup_date:{
                          required:true,
                        }

                                   

                    }

                });

                $('.save_address').validate({


                    rules: {                       

                        line1: {

                           required: true,

                        },
                        state: {
                           required: true,
                        },
                        city: {
                           required:true,
                        },
                        pincode: {
                           required:true,
                        },
                        countryName: {
                           required:true,
                        },
                    }

                });

            });

        </script>

<script>
    $('.add-schedule').submit(function() {
        if($('#pickup_address').attr('checked')) {
            return true;
        } else {
            $("#error").show();
            return false;
        }
    });
</script>



<script>
function checktime()
{
    var pickstart = document.getElementById("stepExample1").value;
    var pickend = document.getElementById("stepExample2").value;
    var pickend1 = moment(pickend, ["h:mm A"]).format("HH:mm");
    var pickstart1 = moment(pickstart, ["h:mm A"]).format("HH:mm");
    document.getElementById("alert1").innerHTML = "";
    
    
    if(pickend1=='Invalid date' || pickstart1=='Invalid date')
    {
        document.getElementById("alert1").innerHTML = "";
    }
    else if(pickend1 < pickstart1)
    {
      document.getElementById("alert1").innerHTML = "End time Will be greater than start time"; 

    }
    else if (pickend1 == pickstart1)
    {
        document.getElementById("alert1").innerHTML = "Start time and end time cannot be same";
    }
    return false;
}

function checktime1()
{
    var deliverstart = document.getElementById("stepExample3").value;
    var deliverend = document.getElementById("stepExample4").value;
    var deliverend1 = moment(deliverend, ["h:mm A"]).format("HH:mm");
    var deliverstart1 = moment(deliverstart, ["h:mm A"]).format("HH:mm");

    document.getElementById("alert2").innerHTML = "";
    
    if(deliverend1=='Invalid date' || deliverstart1=='Invalid date')
    {
        document.getElementById("alert2").innerHTML = "";
    }
    else if(deliverend1 < deliverstart1)
    {
      document.getElementById("alert2").innerHTML = "End time Will be greater than start time"; 
    }
    else if(deliverstart1 < deliverend1)
    {
      document.getElementById("alert2").innerHTML = "";
    }
    else if (deliverend1 == deliverstart1)
    {
        document.getElementById("alert2").innerHTML = "Start time and end time cannot be same";
    }
    return false;
}
</script>

@endsection