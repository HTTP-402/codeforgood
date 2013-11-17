<?php

include "header.php";
?>


<script>
$(document).ready(function(){
  $('a.kitchen').click(function (eventObject){
  
	//update values of routes

  });
});
function calcRoute() {
  var start = document.getElementById('start').value; //start at selected kitchen, first node of route
  var end = document.getElementById('end').value; //end at last point in selected route
  waypoints = [];
  //for each of the rest of the points in selected route
  waypoints.push({
      location: "joplin, mo", //this point
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
</script>
<body class="home page page-id-25 page-template page-template-page-templatesjobify-php custom-background custom-font wp-job-manager-categories">

	<div class="outer-wrapper">
	<div id="page" class="hfeed site slide-right">
	
			<header id="masthead" class="site-header" role="banner">
				</header><!-- #masthead -->


		
			<div id="map-canvas-wrap">
				<div class="map-filter animated fadeInUp">
				</div>
				
				<div id="jobify-map-canvas"></div>

			
			</div>



			



		</div><!-- #page -->
	</div>

	
<div id="login-modal-wrap" class="modal-login modal animated fadeIn">
	<h2 class="modal-title">Login</h2>

	
		<form name="loginform" id="loginform" action="http://demo.astoundify.com/jobify/wp-login.php" method="post">
			
			<p class="login-username">
				<label for="user_login">Username</label>
				<input type="text" name="log" id="user_login" class="input" value="" size="20" />
			</p>
			<p class="login-password">
				<label for="user_pass">Password</label>
				<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
			</p>
			<p class="has-account"><i class="icon-help-circled"></i> <a href="http://demo.astoundify.com/jobify/my-account/lost-password/">Forgot Password?</a></p>
			<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked" /> Remember Me</label></p>
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Sign In" />
				<input type="hidden" name="redirect_to" value="http://demo.astoundify.com/jobify" />
			</p>
			
		</form></div>



<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?v=3.exp&#038;sensor=false&#038;ver=3.7.1'></script>
<script type='text/javascript' src='http://demo.astoundify.com/jobify/wp-content/themes/jobify/js/jquery.ui.map.min.js?ver=3.7.1'></script>
<script type='text/javascript' src='http://demo.astoundify.com/jobify/wp-content/themes/jobify/js/tooltip.js?ver=3.7.1'></script>
<script type='text/javascript' src='http://demo.astoundify.com/jobify/wp-content/themes/jobify/js/jobify-map.js?ver=3.7.1'></script>
<script type='text/javascript' src='http://demo.astoundify.com/jobify/wp-content/themes/jobify/js/jquery.flexslider-min.js?ver=3.7.1'></script>


</body>
</html>