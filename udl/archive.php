<?php
/**
 * The template used to display Tag Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header();?>

<div class="wrapper" id="page-wrapper">

<?php

$queried_object = $wp_query->get_queried_object();

$subject = $wp_query->get_queried_object();
$image = get_field('initiative_image', $queried_object);
$stewards = get_field('stewards', $queried_object);

if( $queried_object->taxonomy ) {
  ?>
  <div class="container tax-header">
    <div class="row mt-3">
      <div class="col-md-12">
        <hr>
				<div class="row mt-4 mb-3">
					<div class="col-2">
						<div class="archive-border"></div>
					</div>
					<div class="col-10">
						<h1 class="single-category-title mb-3"><?php echo $queried_object->name; ?></h1>
					</div>
				</div>
      </div>
      <div class="col-md-8">
        <?php

        $description = $queried_object->description;
        if( !empty( $description ) ) {
          echo '<p>'.$queried_object->description.'</p>';
        }

        ?>
      </div>
<?php
}

/**
 *
 * Store a basic config for each post type
 *
 */
$subject_post_types = array(
  'event' => array(
    'see_all_text' => 'See All Events',
    'no_items_found' => '<p class="none-found">No events found.</p>',
    'section_title' => 'Events',
    'posts_per_page' => -1
  ),
  'post' => array(
    'see_all_text' => 'See All Media Posts',
    'no_items_found' => '<p class="none-found">No posts found.</p>',
    'section_title' => 'Articles & Media',
    'posts_per_page' => -1
  ),
  'resource' => array(
    'see_all_text' => 'See All Resources',
    'no_items_found' => '<p class="none-found">No resources found.</p>',
    'section_title' => 'Resources',
    'posts_per_page' => -1
  )
);


/**
 *
 * Setup some default query args
 *
 */
$query_args = array(
  'tax_query' => array(
    array(
      'taxonomy' => $subject->taxonomy,
      'field' => 'slug',
      'terms' => $subject->slug
    )
  )
);

/**
 *
 * Figure out which post types we're going to print
 *
 */
$post_types_to_print = array(
  'event',
  'post',
  'resource'
);

$selected_post_type = get_query_var( 'udl-post-type', '' );

if( ! empty( $selected_post_type ) && in_array( $selected_post_type, $post_types_to_print ) ) {
  $post_types_to_print = array( $selected_post_type );
}


$subject_found_posts = array();


echo '<div class="container">';
foreach( $post_types_to_print as $post_type_to_print ) {
  $post_type_settings = $subject_post_types[ $post_type_to_print ];

  // Set post type for query
  $query_args[ 'post_type' ] = $post_type_to_print;


  // Set the number of posts to display
  $posts_per_page = $post_type_settings['posts_per_page'];
  // Are we on a post-type page? If so, show ALL the matching posts
  if( sizeof( $post_types_to_print ) > 0 ) {
    $posts_per_page = -1;
  }
  $query_args['posts_per_page'] = $posts_per_page;


  $posts_query = new WP_Query( $query_args );

  $subject_found_posts[ $post_type ] = $posts_query->found_posts;

  if( !empty( $subject_found_posts ) >= 1 ) {

  ?>
  <div class="row mt-5 post-type-name">
    <div class="col-md-12">
      <h3 class="other"><?php echo $post_type_settings['section_title']; ?> <span class="badge color-secondary"><?php echo $posts_query->found_posts; ?></span></h3>
      <hr class="">
    </div>
  </div>
  <?php

  $num_posts_printed = 0;
  $num_posts_in_row = 0;

  echo '<div class="row mb-5">';

  while( $posts_query->have_posts() ) {
    $posts_query->the_post();
    get_template_part('page-templates/' . get_post_type() );

    $num_posts_printed++;
    $num_posts_in_row++;

    if( $num_posts_in_row === 4 && $num_posts_printed !== $posts_query->found_posts ) {
      echo '';
      $num_posts_in_row = 0;
    }
  }
}

  wp_reset_postdata();

  echo '</div>';

}

echo '</div>';
?>

<?php get_footer(); ?>
