<?php
/**
 * Post block template.
 *
 * @package wp-theme-aya-affiliate
 */
?>

<?php
  $image = get_sub_field('photo');
  $size = 'large'; // (thumbnail, medium, large, full or custom size)
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
  <?php if( get_sub_field('title') ): ?>
    <?php

    $link = get_sub_field('link');

    if( $link ): ?>
	   <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><h3 class="mt-3"><?php the_sub_field('title'); ?></h3></a>
     <?php endif; ?>
  <?php endif; ?>
  <?php if( get_sub_field('subtitle') ): ?>
	   <h5 class="mt-2"><?php the_sub_field('subtitle'); ?></h5>
  <?php endif; ?>
  <?php if( get_sub_field('description') ): ?>
	   <p class="mt-1 mb-1"><?php the_sub_field('description'); ?></p>
  <?php endif; ?>
<?php

$link = get_sub_field('link');

if( $link ): ?>

	<a class="more-link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
