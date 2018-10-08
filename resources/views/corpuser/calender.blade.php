@extends('corpuser.layouts.app')

@section('content')

<section class="content container-fluid calender-wrapper">
    

      <!-- page content starts here -->    

                <div class="cards">

                   <div class="content-header">

                     <h1>Calendar</h1>

                 </div>


                 <div class="row">

                    <div class="col-md-9">

                       <div class="box box-primary calender-box">

                         <div class="box-body no-padding">

                            <div id="calendar"></div>    

                         </div>

                       </div>

                      </div>


                      <div class="col-md-3">

                            <div class="box box-solid">

                              <div class="box-header with-border">

                                <h4 class="box-title">Services</h4>

                              </div>

                              <div class="box-body">

                                <!-- the events -->

                                <div class="events-wrapper">

                                  @foreach($services as $service)  
                                    @if($service->serviceId =='1')
                                    <button type="button" class="event-btn btn btn-default">{{$service->serviceName}}</button>
                                    @elseif($service->serviceId =='2')
                                    <button type="button" class="event-btn btn btn-default">{{$service->serviceName}}</button>
                                    @elseif($service->serviceId =='3')
                                    <button type="button" class="event-btn btn btn-default">{{$service->serviceName}}</button>
                                    @endif
                                  @endforeach
                                </div>

                              </div>

                              <!-- /.box-body -->

                      </div>

                  </div>

                </div><!-- /.cards -->
        
      <!-- page content ends here -->

    </section><!-- /.content -->

@endsection
@section('js')
<script>
$(document).ready(function(){
  var jsArray = <? echo $events; ?>;
  /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next',
        center: 'title',
        prev: 'left-single-arrow',
        next: 'right-single-arrow',
      },
           //Random default events
      events    : jsArray,
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    });
  });
</script>
@endsection