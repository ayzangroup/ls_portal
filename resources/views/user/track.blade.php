<!DOCTYPE html>
<html>
<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  @include('user.includes.meta')

  @include('user.includes.css')
    
<style>

#map {height: 100%;}
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
#floating-panel {
  position: absolute;
  top: 10px;
  right: 1%;
  z-index: 5;
  background-color: #fff;
  border: 1px solid #999;
  text-align: center;
}

</style>

</head>

<body class="hold-transition skin-blue-light sidebar-mini">

<div class="wrapper">
  
  @include('user.includes.header')

  @include('user.includes.sidebar')

 <div class="content-wrapper">

  <section class="content container-fluid dashboard">

        <div class="content-header">

           <h1>Track Order</h1>

        </div>

       <div class="common-background">
 
          <div class="steps track-order-list">

              <ol>

                  <li class="step-border-none active">

                      <a href="#">

                          <span class="step">

                            <img src="{{URL::asset('dist/img/user.svg')}}" alt="">

                          </span>

                          <!-- <span class="step-name">Customer</span> -->

                      </a>

                  </li><li class="inactive">

                      <a href="#">

                          <span class="step">

                            <img src="{{URL::asset('dist/img/truck.svg')}}" alt="">

                          </span>

                          <!-- <span class="step-name">Driver</span> -->

                      </a>

                  </li><li class="inactive">

                      <a href="#">

                          <span class="step">

                            <img src="{{URL::asset('dist/img/wm.svg')}}" alt="">

                          </span>

                          <!-- <span class="step-name">Laundry</span> -->

                      </a>

                  </li><li class="inactive">

                      <a href="#">

                          <span class="step">

                            <img src="{{URL::asset('dist/img/truck.svg')}}" alt="">

                          </span>

                          <!-- <span class="step-name">Customer</span> -->

                      </a>

                  </li><li class="inactive">

                      <a href="#" class="none-margin">

                          <span class="step">

                            <img src="{{URL::asset('dist/img/dry-clean.svg')}}" alt="">

                          </span>

                          <!-- <span class="step-name">Driver</span> -->

                      </a>

                  </li>

              </ol>                

            </div> <!-- track-order-list -->

            
              <button type="button" class="btn btn-default trace-loaction" style="margin-bottom: 30px;">Trace Driver Location</button>

              <div id="floating-panel">
            
                <input type="hidden" id="start1" value="muser pvt. ltd."><!-- Starting Location -->
            
                <input type="hidden" id="end1" value="{{$order->pickaddress}},{{$order->pickcity}},{{$order->pickstate}},{{$order->pickpincode}}"><!-- Ending Location -->
              </div>
            
              <div id="map" style="height: 600px;"></div>
            
              <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAma7zFTAKRgv0aCRWJ5DaTHQMu_9wcYX8&callback=initMap&libraries=places,geometry"></script>
 
      </div> 

</div>

</section><!-- /.content -->

<footer class="main-footer">

    @include('user.includes.footer')

</footer>

 <script>
function calcDistance(p1, p2) {//p1 and p2 in the form of google.maps.LatLng object
  return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(3);//distance in KiloMeters
}

function getLocation() {
  if (navigator.geolocation) {navigator.geolocation.getCurrentPosition(showPosition, showError);} 
  else {alert("Geolocation is not supported by this browser.");}
}
function showPosition(position) {
  alert("Latitude: " + position.coords.latitude + " Longitude: " + position.coords.longitude); 
}
function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("User denied the request for Geolocation.");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable.");
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.");
      break;
  }
}

function initMap() {
  
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: { lat: 18.9965041, lng: 72.8194209 }
  });
  
  var waypts = [];//origin to destination via waypoints
  //waypts.push({location: 'indore', stopover: true});
  
  // function continuouslyUpdatePosition(location){//Take current location from location.php and set marker to that location
  //   var xhttp = new XMLHttpRequest();
  //   xhttp.onreadystatechange = function() {
  //     if (this.readyState == 4 && this.status == 200) {
  //       var pos = JSON.parse(this.responseText);
  //       location.setPosition(new google.maps.LatLng(pos.lat,pos.lng));
  //       setTimeout(function(){
  //         continuouslyUpdatePosition(location);
  //       },5000);
  //     }
  //   };
  //   xhttp.open("GET", "/corpuser/track1/location1", true);
  //   xhttp.send();
  // }
  
  /* Distance between p1 & p2
  var p1 = new google.maps.LatLng(45.463688, 9.18814);
  var p2 = new google.maps.LatLng(46.0438317, 9.75936230000002);
  alert(calcDistance(p1,p2)+" Kilimeters");
  */
  
  //Make marker at any position in form of {lat,lng}
  function makeMarker(position /*, icon*/) {
    var marker = new google.maps.Marker({
      position: position,
      map: map,
      /*animation: google.maps.Animation.DROP,*/
      /*icon: icon,*/
    });
    return marker;
  }
  
  var icons = {
    end: new google.maps.MarkerImage('http://icons.iconarchive.com/icons/icons-land/vista-map-markers/32/Map-Marker-Push-Pin-1-Left-Pink-icon.png'),
    start: new google.maps.MarkerImage('http://icons.iconarchive.com/icons/icons-land/vista-map-markers/32/Map-Marker-Push-Pin-1-Left-Chartreuse-icon.png')
  };
  
  //Show suggestions for places, requires libraries=places in the google maps api script link
  var autocomplete1 = new google.maps.places.Autocomplete(document.getElementById('start1'));
  var autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('end1'));
  
  var directionsService1 = new google.maps.DirectionsService;
  var directionsDisplay1 = new google.maps.DirectionsRenderer({
    polylineOptions: {strokeColor: "green"}, //path color
    //draggable: true,// change start, waypoints and destination by dragging
    /* Start and end marker with same image
    markerOptions : {icon: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/32/Map-Marker-Push-Pin-1-Left-Pink-icon.png'},
    */
    //suppressMarkers: true
  });
  directionsDisplay1.setMap(map);
  var onChangeHandler1 = function() {calculateAndDisplayRoute(directionsService1, directionsDisplay1, $('#start1'),$('#end1'));};
  $('#start1,#end1').change(onChangeHandler1);    
  
  function calculateAndDisplayRoute(directionsService, directionsDisplay, start, end) { 
    directionsService.route({
      origin: start.val(),
      destination: end.val(),
      waypoints: waypts,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
        var leg = response.routes[ 0 ].legs[ 0 ];
        // Move marker along path from A to B
        // var markers = [];
        // for(var i=0; i<leg.steps.length; i++){
        //   var marker = makeMarker(leg.steps[i].start_location);
        //   markers.push(marker);
        //   marker.setMap(null);
        // }
        // tracePath(markers, 0);
        
        var location = makeMarker(leg.steps[0].start_location);
        continuouslyUpdatePosition(location);
        
      } else {window.alert('Directions request failed due to ' + status);}
    });
  }
  
  function tracePath(markers, index){// move marker along path from A to B
    if(index==markers.length) return;
    markers[index].setMap(map);
    setTimeout(function(){
      markers[index].setMap(null);
      tracePath(markers, index+1);
    },500);
  }
  
  calculateAndDisplayRoute(directionsService1, directionsDisplay1, $('#start1'),$('#end1'));
}
 </script>


@include('user.includes.js')
 
</body>
</html>