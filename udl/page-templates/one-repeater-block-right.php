<?php
/**
 * Post block template.
 *
 * @package wp-theme-aya-affiliate
 */
$post = $section_repeater;
setup_postdata($post);
?>
<div class="col-md-4">
  <h3 class=""><?php the_sub_field('title'); ?></h3>
  <h5 class=""><?php the_sub_field('subtitle'); ?></h5>
  <p class=""><?php the_sub_field('description'); ?></p>
  <?php

  $link = get_sub_field('link');

  if( $link ): ?>

  	<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

  <?php endif; ?>
</div>
<div class="col-md-8">
  <?php
    $image = get_sub_field('photo');
    $size = 'large'; // (thumbnail, medium, large, full or custom size)
    if( $image ) {
      echo wp_get_attachment_image( $image, $size );
    }
    ?>
</div>
<?php wp_reset_postdata(); ?>
