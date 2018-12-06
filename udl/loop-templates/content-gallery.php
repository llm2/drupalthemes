<?php
/**
 * Gallery
 */

?>
<article aria-label="<?php the_title(); ?>" <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_date(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
