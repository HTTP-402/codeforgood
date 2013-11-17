/**
 * Functionality specific to Jobify
 *
 * Provides helper functions to enhance the theme experience.
 */

var Jobify = {}

Jobify.App = ( function($) {
	var currentPopup;

	function avoidSubmission() {
		$( '.job_filters' ).submit(function(e) {
			return false;
		});
	}

	function mobileMenu() {
		var $items = $( '.site, .site-primary-navigation' );
		var $content = $('.outer-wrapper');
		
		var open = function() {
			$( 'body' ).addClass( 'mobile-open' );
			$content.addClass( 'open' );
			$items.removeClass('close').addClass('open');
		}

		var close = function() { 
			$( 'body' ).delay(300).removeClass( 'mobile-open' );
			$content.removeClass( 'open' );
			$items.removeClass('open').addClass('close');
		}

		$( '.primary-menu-toggle' ).click(function(e){
			e.preventDefault();

			$content.hasClass( 'open' ) ? $(close) : $(open);
		});
	}

	return {
		init : function() {
			avoidSubmission();
			mobileMenu();

			$( '.field, .search_category, .search_categories' )
				.find( 'select:not([multiple])' )
				.wrap( '<div class="select"></div>' )
				.parents( '.field' )
				.addClass( 'has-select' );

			$( '.site-primary-navigation .login a, .nav-menu-primary .register a' ).click(function(e) {
				e.preventDefault();

				if ( currentPopup )
					currentPopup.close();
				
				currenetPopup = Jobify.App.popup({
					items : {
						src : '#' + $(this).parent().attr( 'id' ) + '-wrap'
					}
				});
			});

			$( '.rcp_subscription_level' ).click(function(e) {
				e.preventDefault();

				$( '.rcp_subscription_level' ).removeClass( 'selected' );

				$(this)
					.addClass( 'selected' )
					.find( 'input[type="radio"]' )
					.attr( 'checked', true );
			});

			$( '.rcp_subscription_level_fake' ).click(function(e) {
				e.preventDefault();

				window.location = $(this).data( 'href' );
			});

			$( '.open-share-popup' ).click(function(e) {
				e.preventDefault();

				$(this).prev().fadeToggle( 'fast' );
			});
		},

		popup : function( args ) {
			return $.magnificPopup.open( $.extend( args, { 
				type            : 'inline',
				fixedContentPos : false,
				callbacks       : {
					close : function() {
						$( '.mfp-content' )
							.find( '.animated' )
							.removeClass( 'fadeInDownBig' )
							.addClass( 'fadeOutDownBig' );
					}
				}
			} ) );
		},

		/**
		 * Check if we are on a mobile device (or any size smaller than 980).
		 * Called once initially, and each time the page is resized.
		 */
		isMobile : function( width ) {
			var isMobile = false;

			var width = 1180;
			
			if ( $(window).width() <= width )
				isMobile = true;

			return isMobile;
		}
	}
} )(jQuery);

Jobify.Widgets = ( function($) {
	return {
		init : function() {
			if ( jobifySettings.pages.is_widget_home ) { 
				$.each( jobifySettings.widgets, function(m, value) {
					var fn = Jobify.Widgets[m];

					if ( typeof fn === 'function' )
						fn();
				} );
			}
			
			if ( jobifySettings.pages.is_testimonials ) {
				Jobify.Widgets.jobify_widget_testimonials();
			}
		},

		jobify_widget_companies : function() {
			var companySlider = $( '.company-slider' ).flexslider({
				selector   : '.testimonials-list .company-slider-item',
				controlNav : false,
				animation  :  'slide',
				prevText   : '<i class="icon-left-open"></i>',
				nextText   : '<i class="icon-right-open"></i>',
				maxItems   : 5,
				minItems   : 1,
				itemWidth  : 200,
				slideshow  : false,
				move       : 1
			});

			return true;
		},

		jobify_widget_testimonials : function() {
			if ( jobifySettings.widgets.jobify_widget_testimonials.animate ) {
				$( '.jobify_widget_testimonials' ).waypoint(function(direction) {
					if ( 'down' != direction )
						return;

					$( '.testimonials-list blockquote' ).each(function(i) {
						var _el = $(this);

						setTimeout(function(){
							_el
								.addClass( 'animated fadeInUp' )
						}, i * 400);
					});
				}, { 'offset' : '50%' } );
			}

			var testimonialSlider = $( '.testimonial-slider' ).flexslider({
				selector   : '.testimonials-list .individual-testimonial',
				controlNav : false,
				animation  :  'slide',
				prevText   : '<i class="icon-left-open"></i>',
				nextText   : '<i class="icon-right-open"></i>',
				maxItems   : 4,
				minItems   : 1,
				itemWidth  : 220,
				slideshow  : false,
				move       : 1
			});
		},

		jobify_widget_stats : function() {
			if ( jobifySettings.widgets.jobify_widget_stats.animate === 0 )
				return;

			$( '.job-stats li strong' ).each(function() {
				$(this)
					.attr( 'data-count', parseInt( $(this).html(), 10 ) )
					.html(0);
			});

			$( '.jobify_widget_stats' ).waypoint(function(direction) {
				if ( 'down' != direction )
					return;

				$( '.job-stats li strong' ).each(function(i) {
					$(this).delay(500 * i).queue(function(next){
						$(this).addClass( 'animated bounceIn' );
						Jobify.Widgets.count( $(this) );
					});
				});
			}, { 
				triggerOnce : true,
				offset      : '50%'
			});
		},

		jobify_widget_video : function() {
			if ( jobifySettings.widgets.jobify_widget_video.animate === 0 )
				return;

			$( '.jobify_widget_video' ).waypoint(function(direction) {
				if ( 'down' != direction )
					return;

				$( '.video-preview' ).fadeIn().addClass( 'animated fadeInRightBig' );
			}, { 'offset' : '50%' } );  
		},

		count : function($this){
			var current = parseInt( $this.html(), 10 ),
			    goal    = $this.data( 'count' );

			if ( 0 == goal )
				return;

			$this.html(++current);
			
			if ( current !== goal ) {
				setTimeout( function(){ 
					Jobify.Widgets.count( $this )
				}, 75 );
			}

			return this;
		} 
	}
} )(jQuery);

Jobify.Jobs = ( function($) {
	var $applicationDetails;

	function applyForJob() {
		$( '.application_button' ).click( function(e) {
			e.preventDefault();

			$applicationDetails.show();
			
			Jobify.App.popup({
				items : {
					src : $applicationDetails
				}
			});

			return false;
		} );
	}

	return {
		init : function() {
			$applicationDetails = $( '.application_details' );

			$applicationDetails.hide();

			applyForJob();
		}
	}
} )(jQuery);

jQuery( document ).ready(function($) {
	Jobify.App.init();

	Jobify.Widgets.init();
	
	if ( jobifySettings.pages.is_job )
		Jobify.Jobs.init();
});

Jobify.Map = ( function($) {
	var geocoder,
	    $map,
	    items = new Array();

	function setupMap() {
		$map     = $( '#jobify-map-canvas' );
		geocoder = new google.maps.Geocoder();

		$map.gmap( {
			mapTypeId          : google.maps.MapTypeId.ROADMAP,
			streetViewControl  : false,
			scrollwheel        : false,
			center             : new google.maps.LatLng( jobifyMapSettings.center.lat, jobifyMapSettings.center.long ),
			zoom               : jobifyMapSettings.zoom == 'auto' ? 8 : parseFloat( jobifyMapSettings.zoom ),
			zoomControlOptions : {
				position : google.maps.ControlPosition.LEFT_CENTER
			}
		} ).bind( 'init', function(evt, map) {
			addLocations( jobifyMapSettings.points );

			$( '.map-filter' ).show();
		} );
	}

	function convertAddress( address, callback ) {
		geocoder.geocode( { 
			'address' : address 
		}, function(results, status) {
			if ( status == google.maps.GeocoderStatus.OK ) {
				callback( results[0].geometry.location );
			}
		});
	}

	function addLocations( points ) {
		$.each( points, function( index, value ) {
			var _item = value;

			if ( ! _item.location )
				return;

			convertAddress( _item.location, function( latlong ) {
				$map.gmap( 'addMarker', {
					'position'  : latlong,
					'bounds'    : jobifyMapSettings.center.long && ( jobifyMapSettings.zoom != 'auto' ) ? false : true,
					'animation' : google.maps.Animation.DROP,
					'title'     : _item.title,
					'tooltip'   : false
				}, function(map, marker) {
					new Tooltip({
						marker   : marker,
						content  : _item.title,
						cssClass : 'map-tooltip'
					});
				}).click(function(event, map) {
					window.location = _item.permalink;
				});
			} );
		});
	}

	function bindFilter() {
		var data,
		    xhr;

		$( '.live-map' ).submit(function() {
			data = {
				'action'          : 'jobify_update_map',
				'search_keywords' : $( '#search_keywords' ).val(),
				'search_location' : $( '#search_location' ).val(),
				'search_category' : $( '#search_category' ).val()
			}

			xhr = $.ajax({
				type    : 'POST',
				url     : jobifySettings.ajaxurl,
				data    : data,
				success : function( response ) {
					points = response;

					$map.gmap( 'clear', 'markers' );
					
					addLocations( $.parseJSON( response ) );
				}
			});

			return false;
		});
	}

	return {
		init : function() {
			setupMap();
			bindFilter();

			$( '#search_keywords, #search_location, .job_types input, #search_category' ).change( function() {
				$( '.live-map' ).trigger( 'submit' );
			} );
		}
	}
} )(jQuery);