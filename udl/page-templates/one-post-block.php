<?php
/**
 * Post block template.
 *
 * @package wp-theme-aya-affiliate
 */
?>

<div class="row">
  <div class="col-md-8">
    <?php if ( has_post_thumbnail() ) { ?>
	           <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('campaigns-post-thumb'); ?> </a>
        <?php } ?>
  </div>
  <div class="col-md-4">
    <a href="<?php the_permalink(); ?>">
      <h1><?php the_title(); ?></h1>
    </a>
    <p> <?php the_excerpt(); ?> </p>
    <!-- <a href="" class="more-link">More</a> -->
  </div>
</div>
<?php wp_reset_postdata(); ?>
