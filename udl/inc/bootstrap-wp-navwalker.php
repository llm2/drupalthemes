<?php
/**
 * Adapted from Edward McIntyre's wp_bootstrap_navwalker class.
 * Removed support for glyphicon and added support for Font Awesome.
 *
 * @package understrap
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WP_Bootstrap_Navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 4
 * navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
	/**
	 * The starting level of the menu.
	 *
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth Depth of page. Used for padding.
	 * @param mixed  $args Rest of arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\" dropdown-menu\" role=\"menu\">\n";
	}

	/**
	 * Open element.
	 *
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int    $depth Depth of menu item. Used for padding.
	 * @param mixed  $args Rest arguments.
	 * @param int    $id Element's ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li class="divider" role="presentation">';
		} else if ( strcasecmp( $item->title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li class="divider" role="presentation">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li class="dropdown-header" role="presentation">' . esc_html( $item->title );
		} else if ( strcasecmp( $item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li class="disabled" role="presentation"><a href="#">' . esc_html( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[]   = 'nav-item menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			/*
			if ( $args->has_children )
			  $class_names .= ' dropdown';
			*/
			if ( $args->has_children && $depth === 0 ) {
				$class_names .= ' dropdown';
			} elseif ( $args->has_children && $depth > 0 ) {
				$class_names .= ' dropdown-submenu';
			}
			if ( in_array( 'current-menu-item', $classes ) ) {
				$class_names .= ' active';
			}
			// remove Font Awesome icon from classes array and save the icon
			// we will add the icon back in via a <span> below so it aligns with
			// the menu item
			if ( in_array( 'fa', $classes ) ) {
				$key         = array_search( 'fa', $classes );
				$icon        = $classes[ $key + 1 ];
				$class_names = str_replace( $classes[ $key + 1 ], '', $class_names );
				$class_names = str_replace( $classes[ $key ], '', $class_names );
			}

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names . '>';
			$atts           = array();
			$atts['title']  = ! empty( $item->title ) ? $item->title : '';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
			// If item has_children add atts to a.

			if ( $args->has_children && $depth === 0 ) {
				$atts['href']        = '#';
				$atts['data-toggle'] = 'dropdown';
				$atts['class']       = 'nav-link dropdown-toggle';
			} else {
				$atts['href']  = ! empty( $item->url ) ? $item->url : '';
				$atts['class'] = 'nav-link';
			}
			$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;


			// Font Awesome icons
			if ( ! empty( $icon ) ) {
				$item_output .= '<a' . $attributes . '><span class="fa ' . esc_attr( $icon ) . '"></span>&nbsp;';
			} else {
				$item_output .= '<a' . $attributes . '>';
			}

			// if ($item[])
			$socialtitle = strtolower(trim($item->title));
			$social = array("facebook", "twitter", "instagram", "google", "youtube", "linkedin", "pinterest", "reddit", "snapchat", "tumblr", "whatsapp", "vimeo", "foursquare", "medium");

			if (in_array($socialtitle, $social)) {
				$item_output .= $args->link_before;

				switch ($socialtitle) {
					case "facebook":
						$item_output .= '<?xml version="1.0" encoding="utf-8"?>
						<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
						<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
						<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
						<path class="social-icons" d="M288,192v-38.1c0-17.2,3.8-25.9,30.5-25.9H352V64h-55.9c-68.5,0-91.1,31.4-91.1,85.3V192h-45v64h45v192h83V256h56.4l7.6-64
							H288z"/>
						</svg>';
						break;
					case "instagram":
							$item_output .= '<?xml version="1.0" encoding="utf-8"?>
							<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
							<g>
								<circle cx="256" cy="255.833" r="80"/>
							</g>
							<g>
								<path class="social-icons" d="M177.805,176.887c21.154-21.154,49.279-32.929,79.195-32.929s58.041,11.837,79.195,32.991
									c13.422,13.422,23.011,29.551,28.232,47.551H448.5v-113c0-26.51-20.49-47-47-47h-288c-26.51,0-49,20.49-49,47v113h85.072
									C154.794,206.5,164.383,190.309,177.805,176.887z M416.5,147.7c0,7.069-5.73,12.8-12.8,12.8h-38.4c-7.069,0-12.8-5.73-12.8-12.8
									v-38.4c0-7.069,5.73-12.8,12.8-12.8h38.4c7.069,0,12.8,5.73,12.8,12.8V147.7z"/>
								<path class="social-icons" d="M336.195,335.279c-21.154,21.154-49.279,32.679-79.195,32.679s-58.041-11.462-79.195-32.616
									c-21.115-21.115-32.759-49.842-32.803-78.842H64.5v143c0,26.51,22.49,49,49,49h288c26.51,0,47-22.49,47-49v-143h-79.502
									C368.955,285.5,357.311,314.164,336.195,335.279z"/>
							</g>
							</svg>';
							break;
					case "twitter":
							$item_output .= '<?xml version="1.0" encoding="utf-8"?>
							<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
							<path class="social-icons" d="M492,109.5c-17.4,7.7-36,12.9-55.6,15.3c20-12,35.4-31,42.6-53.6c-18.7,11.1-39.4,19.2-61.5,23.5
								C399.8,75.8,374.6,64,346.8,64c-53.5,0-96.8,43.4-96.8,96.9c0,7.6,0.8,15,2.5,22.1c-80.5-4-151.9-42.6-199.6-101.3
								c-8.3,14.3-13.1,31-13.1,48.7c0,33.6,17.2,63.3,43.2,80.7C67,210.7,52,206.3,39,199c0,0.4,0,0.8,0,1.2c0,47,33.4,86.1,77.7,95
								c-8.1,2.2-16.7,3.4-25.5,3.4c-6.2,0-12.3-0.6-18.2-1.8c12.3,38.5,48.1,66.5,90.5,67.3c-33.1,26-74.9,41.5-120.3,41.5
								c-7.8,0-15.5-0.5-23.1-1.4C62.8,432,113.7,448,168.3,448C346.6,448,444,300.3,444,172.2c0-4.2-0.1-8.4-0.3-12.5
								C462.6,146,479,129,492,109.5z"/>
							</svg>';
							break;
					case "youtube":
							$item_output .= '<?xml version="1.0" encoding="utf-8"?>
							<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
							<g>
								<path class="social-icons" d="M508.6,148.8c0-45-33.1-81.2-74-81.2C379.2,65,322.7,64,265,64c-3,0-6,0-9,0s-6,0-9,0c-57.6,0-114.2,1-169.6,3.6
									c-40.8,0-73.9,36.4-73.9,81.4C1,184.6-0.1,220.2,0,255.8C-0.1,291.4,1,327,3.4,362.7c0,45,33.1,81.5,73.9,81.5
									c58.2,2.7,117.9,3.9,178.6,3.8c60.8,0.2,120.3-1,178.6-3.8c40.9,0,74-36.5,74-81.5c2.4-35.7,3.5-71.3,3.4-107
									C512.1,220.1,511,184.5,508.6,148.8z M207,353.9V157.4l145,98.2L207,353.9z"/>
							</g>
							</svg>';
							break;
					case "google":
							$item_output .= '<?xml version="1.0" encoding="utf-8"?>
							<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
							<g>
								<path class="social-icons" d="M325.862,275.558l-18.187-13.653l-0.063-0.051c-5.827-4.579-9.952-8.313-9.952-14.685c0-6.979,5.049-11.824,10.896-17.436
									l0.466-0.449c20.025-15.171,44.726-34.286,44.726-74.556c0-26.934-11.916-44.729-23.28-57.729h12.969l60.322-33H270.308
									c-25.324,0-62.68,3.225-94.561,28.576l-0.128,0.25c-21.809,18.111-34.828,44.584-34.828,70.691
									c0,21.197,8.706,42.159,23.885,57.447c21.428,21.579,48.302,26.127,67.074,26.127c1.462,0,2.956-0.028,4.47-0.093
									c-0.759,2.969-1.25,6.321-1.25,10.321c0,10.926,3.628,19.301,8.083,26.195c-23.963,1.932-58.148,6.477-84.897,22.278
									c-39.335,22.562-42.396,55.875-42.396,65.551c0,38.207,35.707,76.762,115.479,76.762c91.611,0,139.543-49.792,139.543-98.979
									C370.781,311.966,347.945,293.457,325.862,275.558z M200.485,139.894c0-13.359,3.02-23.457,9.255-30.9
									c6.514-7.852,18.18-13.129,29.028-13.129c19.881,0,32.938,15.008,40.388,27.598c9.199,15.539,14.913,36.095,14.913,53.643
									c0,4.942,0,19.983-10.188,29.796c-6.951,6.686-18.707,11.353-28.59,11.353c-20.503,0-33.453-14.705-40.707-27.041
									C204.189,173.53,200.485,153.109,200.485,139.894z M321.6,367.974c0,27.444-25.212,44.493-65.799,44.493
									c-48.058,0-80.347-20.603-80.347-51.265c0-26.14,21.54-36.789,37.8-42.521c18.944-6.064,44.297-7.305,50.062-7.305
									c3.907,0,6.087,0,8.683,0.229C308.7,336.816,321.6,347.733,321.6,367.974z"/>
							</g>
							</svg>';
							break;
					case "linkedin":
							$item_output .= '<?xml version="1.0" encoding="utf-8"?>
							<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
							<g>
								<path class="social-icons" d="M417.2,64H96.8C79.3,64,64,76.6,64,93.9v321.1c0,17.4,15.3,32.9,32.8,32.9h320.3c17.6,0,30.8-15.6,30.8-32.9V93.9
									C448,76.6,434.7,64,417.2,64z M183,384h-55V213h55V384z M157.4,187H157c-17.6,0-29-13.1-29-29.5c0-16.7,11.7-29.5,29.7-29.5
									c18,0,29,12.7,29.4,29.5C187.1,173.9,175.7,187,157.4,187z M384,384h-55v-93.5c0-22.4-8-37.7-27.9-37.7
									c-15.2,0-24.2,10.3-28.2,20.3c-1.5,3.6-1.9,8.5-1.9,13.5V384h-55V213h55v23.8c8-11.4,20.5-27.8,49.6-27.8
									c36.1,0,63.4,23.8,63.4,75.1V384z"/>
							</g>
							</svg>';
							break;
					case "snapchat":
							$item_output .= '<?xml version="1.0" encoding="utf-8"?>
							<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
							<g>
								<path class="social-icons" d="M495.998,360.389l-0.189-14.501l-14.398-1.278c-15.413-1.396-43.8-7.219-54.301-16.9
									c-16.281-15.011-35.688-36.199-35.688-51.893c0-1.014,0-2.546,4.15-5.186c4.985-3.174,12.589-5.584,19.297-7.71
									c5.217-1.654,10.144-3.217,14.394-5.236c9.236-4.39,18.498-15.978,17.471-28.807c-1.215-15.166-14.424-27.046-30.072-27.046
									c-4.021,0-8.068,0.76-12.027,2.259c-8.027,3.041-13.743,4.41-17.705,4.962c0.747-9.319,1.791-20.12,3.211-30.67
									c5.111-37.948-5.281-73.509-29.264-101.042C335.498,48.208,297.376,32,256.283,32H256c-41.093,0-79.215,16.208-104.591,45.341
									c-23.982,27.534-34.375,63.345-29.265,101.292c1.416,10.51,2.46,21.231,3.21,30.618c-3.97-0.559-9.686-1.998-17.703-5.034
									c-3.965-1.502-8.017-2.295-12.043-2.295c-15.641-0.001-28.844,11.852-30.057,27.003c-1.027,12.818,8.235,24.393,17.47,28.783
									c4.251,2.02,9.181,3.578,14.4,5.232c6.707,2.125,14.309,4.532,19.293,7.703c4.147,2.639,4.147,4.168,4.147,5.182
									c0,8.66-6.191,24.691-35.688,51.888c-10.499,9.681-39.055,15.501-54.588,16.897l-14.572,1.311L16,360.603
									c0,1.679,0.312,10.546,6.485,20.319c5.246,8.306,16.073,19.283,37.863,24.407c6.179,1.453,11.186,2.563,15.208,3.454
									c2.306,0.512,4.555,1.01,6.454,1.453c0.027,0.209,0.054,0.417,0.081,0.623c0.9,7.004,1.611,12.535,4.392,17.75
									c2.453,4.6,8.574,12.316,22.015,12.316c2.478,0,5.249-0.246,8.472-0.751c1.672-0.263,3.386-0.554,5.2-0.863
									c7.116-1.212,15.182-2.587,23.451-2.587c10.277,0,18.732,2.188,25.846,6.688c4.531,2.867,8.892,5.972,13.509,9.26
									C202.967,465.481,223.358,480,256,480c32.726,0,53.293-14.582,71.439-27.446c4.576-3.244,8.898-6.309,13.377-9.142
									c7.113-4.5,15.568-6.688,25.846-6.688c8.27,0,16.334,1.375,23.449,2.586c1.814,0.311,3.529,0.602,5.202,0.864
									c3.223,0.505,5.993,0.751,8.472,0.751c13.44,0,19.562-7.715,22.015-12.313c2.781-5.214,3.492-10.746,4.392-17.749
									c0.027-0.208,0.055-0.418,0.082-0.629c1.898-0.441,4.148-0.941,6.455-1.452c4.023-0.892,9.029-2.001,15.206-3.454
									c21.851-5.139,32.611-16.17,37.79-24.518C495.822,370.982,496.021,362.074,495.998,360.389z M208,128c8.836,0,16,10.745,16,24
									s-7.164,24-16,24s-16-10.745-16-24S199.164,128,208,128z M311.615,205.698C296.368,220.725,276.617,229,256,229
									c-20.838,0-40.604-8.29-55.657-23.343c-3.125-3.124-3.124-8.189,0-11.313c3.125-3.124,8.19-3.124,11.313,0
									C223.688,206.374,239.436,213,256,213c16.387,0,32.15-6.64,44.385-18.698c3.148-3.102,8.213-3.063,11.312,0.082
									C314.799,197.531,314.762,202.597,311.615,205.698z M304,176c-8.836,0-16-10.746-16-24s7.164-24,16-24s16,10.746,16,24
									S312.836,176,304,176z"/>
							</g>
							</svg>';
							break;
					case "pinterest":
							$item_output .= '<?xml version="1.0" encoding="utf-8"?>
							<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
							<g>
								<path class="social-icons" d="M256,32C132.3,32,32,132.3,32,256c0,91.7,55.2,170.5,134.1,205.2c-0.6-15.6-0.1-34.4,3.9-51.4
									c4.3-18.2,28.8-122.1,28.8-122.1s-7.2-14.3-7.2-35.4c0-33.2,19.2-58,43.2-58c20.4,0,30.2,15.3,30.2,33.6
									c0,20.5-13.1,51.1-19.8,79.5c-5.6,23.8,11.9,43.1,35.4,43.1c42.4,0,71-54.5,71-119.1c0-49.1-33.1-85.8-93.2-85.8
									c-67.9,0-110.3,50.7-110.3,107.3c0,19.5,5.8,33.3,14.8,43.9c4.1,4.9,4.7,6.9,3.2,12.5c-1.1,4.1-3.5,14-4.6,18
									c-1.5,5.7-6.1,7.7-11.2,5.6c-31.3-12.8-45.9-47-45.9-85.6c0-63.6,53.7-139.9,160.1-139.9c85.5,0,141.8,61.9,141.8,128.3
									c0,87.9-48.9,153.5-120.9,153.5c-24.2,0-46.9-13.1-54.7-27.9c0,0-13,51.6-15.8,61.6c-4.7,17.3-14,34.5-22.5,48
									c20.1,5.9,41.4,9.2,63.5,9.2c123.7,0,224-100.3,224-224C480,132.3,379.7,32,256,32z"/>
							</g>
							</svg>';
							break;
					case "medium":
							$item_output .= '<?xml version="1.0" encoding="utf-8"?>
							<!-- Generator: Adobe Illustrator 16.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
							<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
							<svg  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" x="0px" y="10px" width="503px" height="503px" viewBox="0 0 503 503"><g><path d="M256.62962,5.00461C117.66263,5.00461,5,117.6468,5,256.61377c0,138.968,112.66263,251.62962,251.62962,251.62962,138.95677,0,251.61938-112.6616,251.61938-251.62962S395.58639,5.00461,256.62962,5.00461ZM199.8722,376.62043a3.86425,3.86425,0,0,1-.02452.45576,3.4858,3.4858,0,0,1-.421-.18395L112.349,333.35343a5.783,5.783,0,0,1-2.55972-4.14357l.00511-199.62276L199.8722,174.627Zm10.991-95.08177V190.64748l80.79634,131.28373Zm36.02315-53.325L308.8061,128.02976,399.683,173.46614,306.43442,324.99058ZM402.00154,376.554a4.0742,4.0742,0,0,1-.02452.4547c-.12056-.048-.2616-.10626-.41588-.18394L314.29446,333.1991l87.70708-142.5322Z" transform="translate(-5 -5.00461)"/></g>
							</svg>';
							break;
			default:
						break;
				}

				$item_output .= $args->link_after;
			} else {
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			}

			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$item_output .= '';

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array  $children_elements List of elements to continue traversing.
	 * @param int    $max_depth Max depth to traverse.
	 * @param int    $depth Depth of current element.
	 * @param array  $args
	 * @param string $output Passed by reference. Used to append additional content.
	 *
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return;
		}
		$id_field = $this->db_fields['id'];
		// Display this element.
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_class ) {
					$fb_output .= ' class="' . $container_class . '"';
				}
				if ( $container_id ) {
					$fb_output .= ' id="' . $container_id . '"';
				}
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_class ) {
				$fb_output .= ' class="' . $menu_class . '"';
			}
			if ( $menu_id ) {
				$fb_output .= ' id="' . $menu_id . '"';
			}
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container ) {
				$fb_output .= '</' . $container . '>';
			}
			echo $fb_output;
		}
	}
}
