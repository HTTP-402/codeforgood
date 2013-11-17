<?php
/* if(!$_SESSION["logged"]){
	 header("Location: login.php");
 } */
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />

	<title>Food Chain</title>


	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

	<!--[if lt IE 9]>
	<script src="js/html5.js" type="text/javascript"></script>
	<![endif]-->

<link rel='stylesheet' id='jobify-fonts-css'  href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Varela+Round&#038;subset=latin' type='text/css' media='all' />
<link rel='stylesheet' id='animate-css'  href='css/animate.css?ver=3.7' type='text/css' media='all' />
<link rel='stylesheet' id='entypo-css'  href='css/entypo.css?ver=3.7' type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-css'  href='css/magnific-popup.css?ver=3.7' type='text/css' media='all' />
<link rel='stylesheet' id='jobify-css'  href='css/style.css?ver=20130814' type='text/css' media='all' />
<link rel='stylesheet' id='jobify-responsive-css'  href='css/responsive.css?ver=3.7' type='text/css' media='all' />
<script type='text/javascript' src='js/jquery.js?ver=1.10.2'></script>
<script type='text/javascript' src='js/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='js/jquery.magnific-popup.min.js?ver=3.7'></script>
<script type='text/javascript' src='js/waypoints.min.js?ver=3.7'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var jobifySettings = {"ajaxurl":"http:\/\/localhost\/wordpress\/wp-admin\/admin-ajax.php","i18n":[],"pages":{"is_widget_home":false,"is_job":false,"is_testimonials":false},"widgets":{"widget_search":{"animate":0},"widget_recent_entries":{"animate":0},"widget_recent_comments":{"animate":0},"widget_archive":{"animate":0},"widget_categories":{"animate":0},"widget_meta":{"animate":0}}};
/* ]]> */
/* <![CDATA[ */

var jobifyMapSettings = {"points":[{"job":1728,"location":["37.7598648","-122.41479770000001"],"permalink":"http:\/\/demo.astoundify.com\/jobify\/job\/graphic-designer\/","title":"Graphic Designer at Foursquare"},{"job":1726,"location":["37.4688273","-122.14107509999997"],"permalink":"http:\/\/demo.astoundify.com\/jobify\/job\/senior-designer\/","title":"Senior Designer at Disney Interactive"},{"job":1721,"location":["37.7777984","-122.40909369999997"],"permalink":"http:\/\/demo.astoundify.com\/jobify\/job\/product-designer\/","title":"Product Designer at DropBox"},{"job":8,"location":["37.7467314","-122.4863492"],"permalink":"http:\/\/demo.astoundify.com\/jobify\/job\/design-technologist-shopping-innovation\/","title":"Design Technologist at Amazon"},{"job":7,"location":["37.42410599999999","-122.1660756"],"permalink":"http:\/\/demo.astoundify.com\/jobify\/job\/front-end-engineer\/","title":"Front-End Engineer at Next Big Sound"},{"job":6,"location":["37.3860517","-122.0838511"],"permalink":"http:\/\/demo.astoundify.com\/jobify\/job\/user-experience-designer-lead-systems-analyst\/","title":"User Experience Designer (Lead Systems Analyst) at GE"}],"zoom":"auto","center":{"lat":0,"long":0}};
/* ]]> */
</script>
<script type='text/javascript' src='js/jobify.js?ver=20130718'></script>

<meta name="generator" content="WordPress 3.7" />
<meta name="viewport" content="initial-scale=1">	<style id="jobify-custom-css">
		a,
		.button:hover,
		a.button-secondary,
		.load_more_jobs,
		#wp-submit:hover,
		.btt:hover i,
		#submitcomment:hover,
		#searchsubmit:hover,
		.jobify_widget_slider .button-secondary:hover,
		input[type="submit"]:hover,
		.site-primary-navigation #searchform button {
			color: #01da90;
		}

		.site-header,
		.button,
		.button-secondary:hover,
		.search_jobs,
		.load_more_jobs:hover,
		.paginate-links .page-numbers:hover,
		#wp-submit,
		button.mfp-close,
		#submitcomment,
		#searchsubmit,
		input[type="submit"],
		.content-grid .featured-image .overlay,
		.nav-menu-primary .sub-menu,
		.nav-menu-primary .children,
		.site-primary-navigation.open,
		.site-primary-navigation.close,
		#pmc_mailchimp div input[type="submit"] {
			background: #01da90;
		}

		.button:hover,
		a.button-secondary,
		.load_more_jobs,
		.paginate-links .page-numbers:hover,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		select:focus,
		textarea:focus,
		#wp-submit:hover,
		#submitcomment:hover,
		#searchsubmit:hover,
		input[type="submit"]:hover {
			border-color: #01da90;
		}

		.footer-cta {
			color: #ffffff;
			background: #3399cc;
		}

		ul.job_listings .job_listing:hover {
			box-shadow: inset 5px 0 0 #01da90;
		}
	</style>
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
	<style type="text/css">
		.site-branding,
	.site-description,
	.nav-menu-primary ul li a,
	.nav-menu-primary li a,
	.primary-menu-toggle i,
	.site-primary-navigation .primary-menu-toggle,
	.site-primary-navigation #searchform input[type="text"] {
		color: #ffffff;
	}

	.nav-menu-primary li.login > a {
		border-color: #ffffff;	
	}

	.site-primary-navigation:not(.open) li.login > a:hover {
		color: #01da90;
		background: #ffffff;
	}
	</style>
	
	    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  //centre on selected kitchen
  //var kitchen = new google.maps.LatLng(,);
  var london = new google.maps.LatLng(51.5072, 0.1275);
  var mapOptions = {
    zoom:7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: london
  }
  map = new google.maps.Map(document.getElementById('jobify-map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
}
$(document).ready(function(){ 
function calcRoute() {
  waypoints = [ { "_id" : ObjectId("5288886719142d15233c9869"), "Nickname" : "Barr", "Status(onlyDeliverToOn-service)" : "On-Service", "PrimaryPostalCode" : "E10 7NL", "Location" : { "lat" : "51.570312", "lng" : "-0.032224" }, "NoMeals": "6", "MealType" : [  "Regular / Traditional",        "Regular / Traditional",        "Regular / Traditional",        "Regular / Traditional",                                                    "Regular / Traditional",        "Regular / Traditional" ], "BookingID" : [      "500A000000DrZW7",      "500A000000DrZW7",      "500A000                                            000DrZW7",      "500A000000DrZW7",      "500A000000DrZW7",      "500A000000DrZW7" ], "Comments" : [     "No couscous or rice please. ONLY sandwi                                            ch for light meals.",   "nil",  "nil",  "Child Born 2008. Dislikes vegetables",         "Child Born 2005. Likes sausages.",     "Child Born 2001                                            " ], "Kitchen" : "", "RouteAndCode" : "", "Birthdate" : "14/09/1975", "Cake?" : "No", "NotesFromKitchen" : "" },
{ "_id" : ObjectId("5288886719142d15233c986a"), "Nickname" : "Eric", "Status(onlyDeliverToOn-service)" : "On-Service", "PrimaryPostalCode" : "E14 8AH", "Location" : { "lat" : "51.509936", "lng" : "-0.029567" }, "NoMeals": "1", "MealType" : [  "Vegetarian" ], "BookingID" : [  "500A00000047EiL" ], "Comments" : [  "nil" ], "Kitchen" : "", "RouteAndCode" : "", "Bir                                            thdate" : "28/06/1971", "Cake?" : "No", "NotesFromKitchen" : "" },
{ "_id" : ObjectId("5288886719142d15233c986b"), "Nickname" : "Hesh", "Status(onlyDeliverToOn-service)" : "On-Service", "PrimaryPostalCode" : "E15 3EP", "Location" : { "lat" : "51.535035", "lng" : "0.012741" }, "NoMeals" : "1", "MealType" : [  "Regular / Traditional" ], "BookingID" : [  "500A000000BOohY" ], "Comments" : [  "Likes fish and lamb. No white bread. No                                             pork. No cabbage." ], "Kitchen" : "", "RouteAndCode" : "", "Birthdate" : "05/11/1945", "Cake?" : "No", "NotesFromKitchen" : "" },
{ "_id" : ObjectId("5288886719142d15233c986c"), "Nickname" : "Dann", "Status(onlyDeliverToOn-service)" : "Off-Service", "PrimaryPostalCode" : "E15 3LE", "Location" : { "lat" : "51.534446", "lng" : "0.007207" }, "NoMeals" : "2", "MealType" : [  "African/Afro-Caribbean",  "African/Afro-Caribbean" ], "BookingID" : [  "500A000000DXOKE",  "500A000000DXOKE" ], "Commen                                            ts" : [  "nil",  "nil" ], "Kitchen" : "", "RouteAndCode" : "", "Birthdate" : "16/06/1970", "Cake?" : "No", "NotesFromKitchen" : "" },
{ "_id" : ObjectId("5288886719142d15233c986d"), "Nickname" : "Stac", "Status(onlyDeliverToOn-service)" : "On-Service", "PrimaryPostalCode" : "E15 3LF", "Location" : { "lat" : "51.534446", "lng" : "0.007207" }, "NoMeals" : "1", "MealType" : [  "African/Afro-Caribbean" ], "BookingID" : [  "500A000000DtNp9" ], "Comments" : [  "nil" ], "Kitchen" : "", "RouteAndCode"                                             : "", "Birthdate" : "20/11/1985", "Cake?" : "No", "NotesFromKitchen" : "" },
{ "_id" : ObjectId("5288886719142d15233c986e"), "Nickname" : "Edmu", "Status(onlyDeliverToOn-service)" : "Pending Service", "PrimaryPostalCode" : "E16 4LB", "Location" : { "lat" : "51.523115", "lng" : "0.011999" }, "NoMeals" : "1", "MealType" : [  "Regular / Traditional" ], "BookingID" : [  "500A000000E4qbe" ], "Comments" : [  "nil" ], "Kitchen" : "", "RouteAndC                                            ode" : "", "Birthdate" : "15/08/1964", "Cake?" : "No", "NotesFromKitchen" : "" },
{ "_id" : ObjectId("5288886719142d15233c986f"), "Nickname" : "Stev", "Status(onlyDeliverToOn-service)" : "Temporarily off Service", "PrimaryPostalCode" : "E2 8QU", "Location" : { "lat" : "51.534206", "lng" : "-0.063571"}, "NoMeals" : "1", "MealType" : [  "Diabetic" ], "BookingID" : [  "500A000000DtgmZ" ], "Comments" : [  "cholesterol lowering, diabetes" ], "Kit                                            chen" : "", "RouteAndCode" : "", "Birthdate" : "10/05/1970", "Cake?" : "No", "NotesFromKitchen" : "" },
{ "_id" : ObjectId("5288886719142d15233c9870"), "Nickname" : "Steph", "Status(onlyDeliverToOn-service)" : "On-Service", "PrimaryPostalCode" : "E3 3GH", "Location" : { "lat" : "51.530775", "lng" : "-0.029351" }, "NoMeals": "1", "MealType" : [  "African/Afro-Caribbean" ], "BookingID" : [  "500A000000F3zzV" ], "Comments" : [  "No pork; High energy and high density                                             food" ], "Kitchen" : "", "RouteAndCode" : "", "Birthdate" : "08/11/1991", "Cake?" : "No", "NotesFromKitchen" : "" } ];
  

  var start = waypoints[0].PrimaryPostalCode; //start at selected kitchen, first node of route
  var end = waypoints[waypoints.length-1].PrimaryPostalCode; //end at last point in selected route
  
  alert("WOW");
  
  //for each of the rest of the points in selected route
  var i = 1;
  for(i; i < Objects.keys(waypoints).length-1; i++)
  {
	  waypoints.push({
      location: waypoints[i].PrimaryPostalCode,
      stopover: true
    });
	}
	alert(waypoints);
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
}
</script>
	
	<style>
      html, body, #map-canvas {
        height: 600px;
        margin: 0px;
        padding: 0px
      }
	  </style>
	  

	</head>

<body class="home page page-id-25 page-template page-template-page-templatesjobify-php custom-background custom-font wp-job-manager-categories">

	<div class="outer-wrapper">
	<div id="page" class="hfeed site slide-right">
	
			<header id="masthead" class="site-header" role="banner">
				<div class="container">
					<a href="index.php" title="Food Chain" rel="home" class="site-branding">
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
<ul class="sub-menu" onclick="updateroutes();">
	<!--populate with kitchens from database--> 
    <li id="0"><a>Albrighton Community Centre</a></li>
	<li id="1"><a>Acorn House</a></li>
	<li id="2"><a>Highgate Centre</a></li>
</ul>
</li>

<li id="menu-item-1783" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children has-children menu-item-1783"><a href="#">Routes</a>
<ul class="sub-menu">
</ul>
</li>

<li id="upload-modal" class="login menu-item menu-item-type-post_type menu-item-object-page menu-item-1676"><a href="upload.php">Upload</a></li>

<li id="login-modal" class="login menu-item menu-item-type-post_type menu-item-object-page menu-item-1676"><a href="login.php">Login</a></li>
</ul></div>					</nav>

										<a href="#" class="primary-menu-toggle in-header"><i class="icon-menu"></i></a>
									</div>
</header><!-- #masthead -->
