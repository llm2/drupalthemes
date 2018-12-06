<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

add_image_size( 'post-event-thumb', 740, 440, array( 'center', 'top' ) );

add_image_size( 'initiative-thumb', 1140, 680, array( 'center', 'top' ) );

function wp_get_menu_array($current_menu) {
	    $array_menu = wp_get_nav_menu_items($current_menu);
	    $menu = array();
	    foreach ($array_menu as $m) {
	        if (empty($m->menu_item_parent)) {
	            $menu[$m->ID] = array();
	            $menu[$m->ID]['ID']          =   $m->object_id;
							$menu[$m->ID]['type']        =   $m->object;
	            $menu[$m->ID]['title']       =   $m->title;
	            $menu[$m->ID]['url']         =   $m->url;

	            $menu[$m->ID]['children']    =   array();
	        }
	    }
	    $submenu = array();
	    foreach ($array_menu as $m) {
	        if ($m->menu_item_parent) {
	            $submenu[$m->ID] = array();
	            $submenu[$m->ID]['ID']       =   $m->object_id;
							$submenu[$m->ID]['type']     =   $m->object;
	            $submenu[$m->ID]['title']    =   $m->title;
	            $submenu[$m->ID]['url']      =   $m->url;
	            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
	        }
	    }
	    return $menu;
	}

function udl_custom_post_types() {

         // Events
         $event_labels = array(
             'name' => 'Events',
             'singular_name' => 'Event',
             'add_new_item' => 'Add New Event',
             'edit_item' => 'Edit Event',
             'new_item' => 'New Event',
             'view_item' => 'View Event',
             'search_items' => 'Search Events',
             'not_found' => 'No Events Found',
             'not_found_in_trash' => 'No Events Found In Trash'
         );
         $event_args = array(
             'public' => true,
             'label' => 'Events',
             'labels' => $event_labels,
             'menu_icon' => 'dashicons-calendar-alt',
             'exclude_from_search' => false,
             'taxonomies' => array('type','category', 'post_tag', 'organizer', 'sponsor'),
             'supports' => array('title','editor','thumbnail','comments','excerpt','revisions')
         );
         register_post_type( 'event', $event_args );

         // Resources
         $resource_labels = array(
             'name' => 'Resources',
             'singular_name' => 'Resource',
             'add_new_item' => 'Add New Resource',
             'edit_item' => 'Edit Resource',
             'new_item' => 'New Resource',
             'view_item' => 'View Resource',
             'search_items' => 'Search Resources',
             'not_found' => 'No Resources Found',
             'not_found_in_trash' => 'No Resources Found In Trash'
         );
         $resource_args = array(
             'public' => true,
             'label' => 'Resources',
             'labels' => $resource_labels,
             'menu_icon' => 'dashicons-admin-links',
             'exclude_from_search' => false,
             'taxonomies' => array('category', 'post_tag'),
             'supports' => array('title','editor','thumbnail','comments','excerpt','revisions')
         );
         register_post_type( 'resource', $resource_args );

         // Jobs
         $job_labels = array(
             'name' => 'Jobs',
             'singular_name' => 'Job',
             'add_new_item' => 'Add New Job',
             'edit_item' => 'Edit Job',
             'new_item' => 'New Job',
             'view_item' => 'View Job',
             'search_items' => 'Search Jobs',
             'not_found' => 'No Jobs Found',
             'not_found_in_trash' => 'No Jobs Found In Trash'
         );
         $job_args = array(
             'public' => true,
             'label' => 'Jobs',
             'labels' => $job_labels,
             'menu_icon' => 'dashicons-groups',
             'exclude_from_search' => false,
             'taxonomies' => array(),
             'supports' => array('title','editor','comments','excerpt','revisions')
         );
         register_post_type( 'job', $job_args );

         // Courses
         $course_labels = array(
             'name' => 'Courses',
             'singular_name' => 'Course',
             'add_new_item' => 'Add New Course',
             'edit_item' => 'Edit Course',
             'new_item' => 'New Course',
             'view_item' => 'View Course',
             'search_items' => 'Search Courses',
             'not_found' => 'No Courses Found',
             'not_found_in_trash' => 'No Courses Found In Trash'
         );
         $course_args = array(
             'public' => true,
             'label' => 'Courses',
             'labels' => $course_labels,
             'menu_icon' => 'dashicons-book-alt',
             'exclude_from_search' => false,
             'taxonomies' => array('category', 'post_tag'),
             'supports' => array('title','editor','comments','excerpt','revisions')
         );
         register_post_type( 'course', $course_args );
     }

    add_action( 'init', 'udl_custom_post_types' );

    // create two taxonomies, genres and writers for the post type "book"
    function create_organizer_categories() {
    	// Add new taxonomy, make it hierarchical (like categories)
    	$organizer_labels = array(
    		'name'              => _x( 'Organizers', 'taxonomy general name', 'textdomain' ),
    		'singular_name'     => _x( 'Organizer', 'taxonomy singular name', 'textdomain' ),
    		'search_items'      => __( 'Search Organizers', 'textdomain' ),
    		'all_items'         => __( 'All Organizers', 'textdomain' ),
    		'parent_item'       => __( 'Parent Organizer', 'textdomain' ),
    		'parent_item_colon' => __( 'Parent Organizer:', 'textdomain' ),
    		'edit_item'         => __( 'Edit Organizer', 'textdomain' ),
    		'update_item'       => __( 'Update Organizer', 'textdomain' ),
    		'add_new_item'      => __( 'Add New Organizer', 'textdomain' ),
    		'new_item_name'     => __( 'New Organizer Name', 'textdomain' ),
    		'menu_name'         => __( 'Organizers', 'textdomain' ),
    	);

    	$organizer_args = array(
    		'hierarchical'      => true,
    		'labels'            => $organizer_labels,
    		'show_ui'           => true,
    		'show_admin_column' => true,
    		'query_var'         => true,
    		'rewrite'           => array( 'slug' => 'organizer' ),
    	);

    	register_taxonomy( 'organizer', 'event', $organizer_args );

    }

    add_action( 'init', 'create_organizer_categories' );

    // create two taxonomies, genres and writers for the post type "book"
    function create_sponsor_categories() {
    	// Add new taxonomy, make it hierarchical (like categories)
    	$sponsor_labels = array(
    		'name'              => _x( 'Sponsors', 'taxonomy general name', 'textdomain' ),
    		'singular_name'     => _x( 'Sponsor', 'taxonomy singular name', 'textdomain' ),
    		'search_items'      => __( 'Search Sponsors', 'textdomain' ),
    		'all_items'         => __( 'All Sponsors', 'textdomain' ),
    		'parent_item'       => __( 'Parent Sponsor', 'textdomain' ),
    		'parent_item_colon' => __( 'Parent Sponsor:', 'textdomain' ),
    		'edit_item'         => __( 'Edit Sponsor', 'textdomain' ),
    		'update_item'       => __( 'Update Sponsor', 'textdomain' ),
    		'add_new_item'      => __( 'Add New Sponsor', 'textdomain' ),
    		'new_item_name'     => __( 'New Sponsor Name', 'textdomain' ),
    		'menu_name'         => __( 'Sponsors', 'textdomain' ),
    	);

    	$sponsor_args = array(
    		'hierarchical'      => true,
    		'labels'            => $sponsor_labels,
    		'show_ui'           => true,
    		'show_admin_column' => true,
    		'query_var'         => true,
    		'rewrite'           => array( 'slug' => 'sponsor' ),
    	);

    	register_taxonomy( 'sponsor', 'event', $sponsor_args );

    }

    add_action( 'init', 'create_sponsor_categories' );

    function create_type_categories() {
    	// Add new taxonomy, make it hierarchical (like categories)
    	$type_labels = array(
    		'name'              => _x( 'Types', 'taxonomy general name', 'textdomain' ),
    		'singular_name'     => _x( 'Type', 'taxonomy singular name', 'textdomain' ),
    		'search_items'      => __( 'Search Types', 'textdomain' ),
    		'all_items'         => __( 'All Types', 'textdomain' ),
    		'parent_item'       => __( 'Parent Type', 'textdomain' ),
    		'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
    		'edit_item'         => __( 'Edit Type', 'textdomain' ),
    		'update_item'       => __( 'Update Type', 'textdomain' ),
    		'add_new_item'      => __( 'Add New Type', 'textdomain' ),
    		'new_item_name'     => __( 'New Type Name', 'textdomain' ),
    		'menu_name'         => __( 'Types', 'textdomain' ),
    	);

    	$type_args = array(
    		'hierarchical'      => true,
    		'labels'            => $type_labels,
    		'show_ui'           => true,
    		'show_admin_column' => true,
    		'query_var'         => true,
    		'rewrite'           => array( 'slug' => 'type' ),
    	);

    	register_taxonomy( 'type', 'event', $type_args );

    }

    add_action( 'init', 'create_type_categories' );

    function udl_change_tag_object() {
        global $wp_taxonomies;
        $labels = &$wp_taxonomies['post_tag']->labels;
        $labels->name = 'Topics';
        $labels->singular_name = 'Topic';
        $labels->add_new = 'Add Topic';
        $labels->add_new_item = 'Add Topic';
        $labels->edit_item = 'Edit Topic';
        $labels->new_item = 'Topic';
        $labels->view_item = 'View Topic';
        $labels->search_items = 'Search Topics';
        $labels->not_found = 'No Topics found';
        $labels->not_found_in_trash = 'No Topics found in Trash';
        $labels->all_items = 'All Topics';
        $labels->menu_name = 'Topics';
        $labels->name_admin_bar = 'Topic';
    }
    add_action( 'init', 'udl_change_tag_object' );

    function udl_add_post_formats() {
      	add_theme_support( 'post-formats', array(
      		'gallery',
      		'quote',
      		'video',
      		'aside',
      		'image',
      		'link',
      		'status',
      		'audio',
      		'chat'
      	) );
    }

    add_action( 'after_setup_theme', 'udl_add_post_formats' );

		function udl_print_taxonomy_links( $post_id, $taxonomy_name, $link_classes, $comma_separated = false, $before = '', $after = '' ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy_name );
			if( is_wp_error( $terms ) ) {
				return;
			}

			$term_links = array();

			foreach( $terms as $term ) {

					$term_link = get_term_link( $term );

				if( is_wp_error( $term_link ) ) {
					continue;
				}
				else {
					if( strlen( $term->name ) > 0 ) {
						$term_links[] = '<span class="box-sm-black"></span><a href="'.esc_url($term_link).'" rel="'.esc_attr($link_classes).'">'.$term->name.'</a>';
					}
				}
			}

			$terms_output = '';

			if( $comma_separated ) {
				switch( sizeof( $term_links ) ) {
					case 0:
						break;
					case 1:
						$terms_output = $term_links[0];
						break;
					case 2:
						$terms_output = $term_links[0] . '<br>' . $term_links[1];
					default:
						$terms_output = implode( $term_links, '<br>' );
						break;
				}
			}
			else {
				$terms_output = implode( $term_links );
			}

			if( !empty( $terms_output ) ) {
				echo $before . $terms_output . $after;
			}
		}
/*
		function my_acf_google_map_api(){
			acf_update_setting('google_api_key','key_here');
		}
		add_action('acf/init', 'my_acf_google_map_api');
*/


		function wrap_embed_with_div($html, $url, $attr) {
			return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
		}

		add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);


		add_filter( 'post_gallery', 'bootstrap_gallery', 10, 3 );

		function bootstrap_gallery( $output = '', $atts, $instance )
		{
		    $atts = array_merge(array('columns' => 3), $atts);

		    $columns = $atts['columns'];
		    $images = explode(',', $atts['ids']);

		    $col_class = 'col-md-4'; // default 3 columns
		    if ($columns == 1) { $col_class = 'col-md-12';}
		    else if ($columns == 2) { $col_class = 'col-md-6'; }
		    // other column counts

		    $return = '<div class="row gallery">';

		    $i = 0;

		    foreach ($images as $key => $value) {

		        if ($i%$columns == 0 && $i > 0) {
		            $return .= '</div><div class="row gallery">';
		        }

            $image_attributes = wp_get_attachment_image_src($value, 'full');

            $image_alt = get_post_meta( $value, '_wp_attachment_image_alt', true);

		        $return .= '
                <div class="'.$col_class.'">
		                <a data-gallery="gallery" aria-label="Click to view a larger version of image '. $i .'" href="'. $image_attributes[0] .'">
		                    <img src="'.$image_attributes[0].'" alt="'.$image_alt.'" class="img-fluid mb-5">
		                </a>
		            </div>';

		        $i++;
		    }

		    $return .= '</div>';

		    return $return;
		}


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';
