<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPakzl_ukgJuuX57EqNggNZfJT2IT7p0A"></script>
	<script type="text/javascript">
	(function($) {

	/*
	*  new_map
	*
	*  This function will render a Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$el (jQuery element)
	*  @return	n/a
	*/

	function new_map( $el ) {

		// var
		var $markers = $el.find('.marker');


		// vars
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};


		// create map
		var map = new google.maps.Map( $el[0], args);


		// add a markers reference
		map.markers = [];


		// add markers
		$markers.each(function(){

				add_marker( $(this), map );

		});


		// center map
		center_map( map );


		// return
		return map;

	}

	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function add_marker( $marker, map ) {

		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {

				infowindow.open( map, marker );

			});
		}

	}

	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function center_map( map ) {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
				map.setCenter( bounds.getCenter() );
				map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}

	}

	/*
	*  document ready
	*
	*  This function will render each map when the document is ready (page has loaded)
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	// global var
	var map = null;

	$(document).ready(function(){

		$('.acf-map').each(function(){

			// create map
			map = new_map( $(this) );

		});

	});

	})(jQuery);
	</script>
</head>

<body <?php body_class(); ?>>
<aside id="skip-aside"><a class="skip-to-main" href="#page-wrapper">Skip to main content</a></aside>

<main aria-label="Site Content" class="hfeed site" id="page">


	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<nav aria-label="Primary Navigation Container" class="navbar navbar-expand-md navbar-dark bg-dark pt-3">
			<div class="container">

				<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button> -->

				<div id="myNav" class="overlay">
				  <div class="overlay-content nav-container container pt-3">
						<div class="row">
							<div class=" col-lg-4">
								<div class="row">
									<div class="col-8 col-lg-12">
										<a id="header-open-logo" tabindex="-1" rel="home" class="open-logo" tabindex="0" href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<ul class="pl-0 mb-0 nav-open-ul">
											<li class="nav-logo mb-3"><span class="nav-open-box-urban mr-2"></span><span class="pl-2">Urban</span></li>
											<li class="nav-logo mb-3"><span class="nav-open-box-demo mr-2"></span><span class="pl-2">Democracy</span></li>
											<li class="nav-logo mb-3"><span class="nav-open-box-lab mr-2"></span><span class="pl-2">Lab</span></li>
										</ul>
										</a>
									</div>
									<div class="col-4 col-lg-12">
										<a href="javascript:void(0)" class="closebtn hamburger-open mobile-close" onclick="closeNav()">
											<div class="hamburger-open-ul">
												<div class="menu-bar"></div>
												<div class="menu-bar"></div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<span class="nav-text center-header-nav-text pb-2">We promote critical, creative, just, and sustainable forms of urbanism, through
								  scholarship, curricular activities, public engagement, and programming.</span>
								<div class="nav-text-box mt-4 p-3"><span style="font-family: sans-serif;">A program of NYU Gallatin School of<br>Individualized Study.</span></div>
							</div>
							<div class="col-lg-4 menu-list-col">
								<div class="row">
									<div class="col-12 mt-3 mb-5">
										<a id="hamburger-close" tabindex="-1" aria-expanded="false" href="javascript:void(0)" class="closebtn hamburger-open pb-4" onclick="closeNav()">
											<div class="hamburger-open-ul desktop-close mb-0 d-block">
												<div class="menu-bar"></div>
												<div class="menu-bar"></div>
											</div>
										</a>
									</div>
									<div class="col-12">
									<nav aria-label="Primary Navigation List" class="menu-list-container mt-3">
										<ul class="menu-list-ul">
									    <li><a href="<?php echo home_url(); ?>/about" tabindex="-1"><span class="menu-item">About</span></a></li>
									    <li><a href="<?php echo home_url(); ?>/initiatives-research" tabindex="-1"><span class="menu-item">Initiatives &amp; Research</span></a></li>
									    <li><a href="<?php echo home_url(); ?>/events" tabindex="-1"><span class="menu-item">Events</span></li></a>
									    <li><a href="<?php echo home_url(); ?>/fellowships" tabindex="-1"><span class="menu-item">Fellowships</span></a></li>
											<li><a href="<?php echo home_url(); ?>/media" tabindex="-1"><span class="menu-item">Media</span></a></li>
										</ul>
									</nav>
									<h6 class="pt-4">1 Washington Place<br>New York, NY 10003<br>(212) 998-7370</h6>
									</div>
								</div>
							</div>
						</div>
				  </div>
				</div>
				<a id="home-logo-link" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="nav-container">
					<ul class="pl-0 mb-0">
						<li class="nav-logo"><span class="box-sm nav-closed-box"></span>Urban</li>
						<li class="nav-logo"><span class="box-sm nav-closed-box"></span>Democracy</li>
						<li class="nav-logo"><span class="box-sm nav-closed-box"></span>Lab</li>
					</ul>
				</div>
				</a>
				<!-- <div class="nav-icon">&#9776;</div> -->
				<div id="hamburger-open" aria-hidden="false" aria-collapsed tabindex="0" class="hamburger" onclick="openNav()">
					<ul class="hamburger-ul mb-0">
						<li class="menu-bar"></li>
						<li class="menu-bar mt-2 mb-2"></li>
						<li class="menu-bar"></li>
					</ul>
				</div>

				<script>
          var canOpenMenu = 1;
          var canCloseMenu = 1;
					var bodyNavOpen = "nav-open";
          var menuItems = document.querySelectorAll('#myNav nav.menu-list-container ul li a');
          document.getElementById('hamburger-open').addEventListener('keyup', function (e) {
            if (e.key === 'Enter' && canOpenMenu === 1) {
              openNav();
            }
          });
          document.getElementById('hamburger-close').addEventListener('keyup', function (e) {
            if (e.key === 'Enter' && canCloseMenu === 1) {
              closeNav();
            }
          });
					function openNav() {
						document.getElementById("myNav").style.height = "100%";
						if (document.body.classList){
					 		document.body.classList.add(bodyNavOpen);
						} else {
							document.body.classList += " " + bodyNavOpen;
						}

            menuItems.forEach(function (el) {
              el.setAttribute('tabindex', '0');
              el.setAttribute('aria-hidden', 'false');
            });

            document.getElementById('hamburger-close').setAttribute('tabindex', '0');
            document.getElementById('hamburger-close').setAttribute('aria-hidden', 'false');
            canCloseMenu = 0;
            document.getElementById('hamburger-close').focus();
            setTimeout(function () {
              canCloseMenu = 1;
            }, 300);
					}

					function closeNav() {
            document.getElementById("myNav").style.height = "0%";

            if (document.body.classList){
              document.body.classList.remove(bodyNavOpen);
            } else {
              var className = bodyNavOpen;
              document.body.className = document.body.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
            }

            menuItems.forEach(function (el) {
              el.setAttribute('tabindex', '-1');
              el.setAttribute('aria-hidden', 'true');
            });

            document.getElementById('hamburger-close').setAttribute('tabindex', '-1');
            document.getElementById('hamburger-close').setAttribute('aria-hidden', 'true');
            canOpenMenu = 0;
            document.getElementById('hamburger-open').focus();
            setTimeout(function () {
              canOpenMenu = 1;
            }, 300);
					}

          document.body.addEventListener('focusout', function (e) {
            if (document.body.classList.contains('nav-open')) {
              if ($('#myNav').find(e.relatedTarget).length === 0) {
                closeNav();
              }
            }
          });
				</script>


				<!-- The WordPress Menu goes here -->
				<?php //wp_nav_menu(
					// array(
					// 	'theme_location'  => 'primary',
					// 	'container_class' => 'collapse navbar-collapse',
					// 	'container_id'    => 'navbarNavDropdown',
					// 	'menu_class'      => 'navbar-nav',
					// 	'fallback_cb'     => '',
					// 	'menu_id'         => 'main-menu',
					// 	'walker'          => new WP_Bootstrap_Navwalker(),
					// )
				//); ?>
			<?php //if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php //endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->
