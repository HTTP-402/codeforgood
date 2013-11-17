<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Food Chain Routes</title>
  <meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<?php include "header.php";?>


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  //centre on selected kitchen
  //var kitchen = new google.maps.LatLng(,);
  var chicago = new google.maps.LatLng(41.850033, -87.6500523);
  var mapOptions = {
    zoom:7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: chicago
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
}

function calcRoute() {
  var start = document.getElementById('start').value; //start at selected kitchen
  var end = document.getElementById('end').value; //end at last point in selected route
  waypoints = [];
  //for each of the rest of the points in selected route
  waypoints.push({
      location: new google.maps.LatLng(51.5072, 0.1275);
      stopover: true
    });
  var request = {
      origin:start,
      destination:end,
          waypoints: waypoints,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }

  });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

</head>
<body>
 <!-- <nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display
  <div class="navbar-header">
    <a class="navbar-brand" href="#">Map</a>
  </div>

    <ul class="nav navbar-nav">
      <li class="active"><a href="upload.php">Upload</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kitchens<b class="caret"></b></a>
        <ul class="dropdown-menu">
		  <!--pull entries from database
          <li><a href="#">Kitchen1</a></li>
          <li><a href="#">Kitchen2</a></li>
        </ul>
      </li>
	  </ul>
	  
	  <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Routes<b class="caret"></b></a>
        <ul class="dropdown-menu">
		  <!--get routes for selected kitchen
          <li><a href="#">Route1</a></li>
          <li><a href="#">Route2</a></li>
        </ul>
      </li>
	  </ul>
</nav>-->

 <button type="button" class="btn btn-danger drop"><span class="glyphicon glyphicon-thumbs-up"></span>  Give me routes! </button>

 <div id="panel">
    <b>Start: </b>
    <select id="start" onchange="calcRoute();">
      <option value="chicago, il">Chicago</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>
    <b>End: </b>
    <select id="end" onchange="calcRoute();">
      <option value="chicago, il">Chicago</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>
    </div>
    <div id="map-canvas"></div>

</body>
</html>