<?php

include "header.php";
?>


<script>
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
				<div class="container">
					<a href="http://localhost.com/jobify/" title="Jobify" rel="home" class="site-branding">
												<h1 class="site-title">
											
							
							<span>Food Chain</span>
						</h1>
					</a>

					<nav id="site-navigation" class="site-primary-navigation slide-left">
						<a href="#" class="primary-menu-toggle"><i class="icon-cancel-circled"></i> <span>Close</span></a>
						<form role="search" method="get" id="searchform" action="http://localhost.com/jobify/">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s">
        <button type="submit" id="searchsubmit"><i class="icon-search"></i></button>
    </div>
</form>						<div class="menu-main-menu-container"><ul id="menu-main-menu" class="nav-menu-primary"><li id="menu-item-30" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children has-children menu-item-30"><a href="http://localhost.com/jobify/jobs/">Kitchens</a>
<ul class="sub-menu" onchange="calcRoute();">
	<!--populate with kitchens from database-->
	<li id="menu-item-2054" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2054"><a onclick="calcRoute();">Palo Alto</a></li>
	<li id="menu-item-2055" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2055"><a href="http://localhost.com/jobify/job-region/san-francisco/">San Francisco</a></li>
	<li id="menu-item-2056" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2056"><a href="http://localhost.com/jobify/job-region/san-jose/">San Jose</a></li>
	<li id="menu-item-2053" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2053"><a href="http://localhost.com/jobify/job-region/mountain-view/">Mountain View</a></li>
</ul>
</li>

<li id="menu-item-1783" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children has-children menu-item-1783"><a href="#">Routes</a>
<ul class="sub-menu">
	<!--populate with route options per kitchen, with script to auto-update-->
	<li id="menu-item-1791" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1791"><a href="http://localhost.com/jobify/blog/">Blog</a></li>
	<li id="menu-item-1790" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1790"><a href="http://localhost.com/jobify/jobs/">Jobs</a></li>
	<li id="menu-item-1789" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1789"><a href="http://localhost.com/jobify/post-a-job/">Post a Job</a></li>
	<li id="menu-item-2276" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2276"><a href="http://localhost.com/jobify/my-alerts/">My Alerts</a></li>
	<li id="menu-item-1785" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1785"><a href="http://localhost.com/jobify/pricing-plans/">Pricing &amp; Plans</a></li>
	<li id="menu-item-1782" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1782"><a href="http://localhost.com/jobify/testimonials/">Testimonials</a></li>
	<li id="menu-item-1786" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1786"><a href="http://localhost.com/jobify/privacy-policy/">Privacy Policy</a></li>
	<li id="menu-item-1787" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1787"><a href="http://localhost.com/jobify/terms-and-conditions/">Our Terms</a></li>
	<li id="menu-item-2182" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2182"><a href="http://localhost.com/jobify/contact/">Contact</a></li>
</ul>
</li>
<li id="menu-item-2541" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2541"><a href="http://localhost.com/jobify/testimonials/">Uploads</a></li>

<li id="login-modal" class="login menu-item menu-item-type-post_type menu-item-object-page menu-item-1676"><a href="http://localhost.com/jobify/login/">Login</a></li>
</ul></div>					</nav>

										<a href="#" class="primary-menu-toggle in-header"><i class="icon-menu"></i></a>
									</div>
			</header><!-- #masthead -->


		
			<div id="map-canvas-wrap">
								<div class="map-filter animated fadeInUp">
					<form class="live-map" method="post" action="http://demo.astoundify.com/jobify/job/user-experience-designer-lead-systems-analyst/">
						<div class="search_jobs">
							
							<div class="search_keywords">
								<label for="search_keywords">Keywords</label>
								<input type="text" name="search_keywords" id="search_keywords" placeholder="All Jobs" />
							</div>
							<div class="search_location">
								<label for="search_location">Location</label>
								<input type="text" name="search_location" id="search_location" placeholder="Any Location" />
							</div>
															<div class="search_category">
									<label for="search_category">Category</label>
									<select name="search_category" id="search_category">
										<option value="">All Job Categories</option>
																					<option value="design">Design</option>
																					<option value="developement">Developement</option>
																			</select>
								</div>
							
								<input type="submit" name="submit" value="Search" />
						</div>
					</form>
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