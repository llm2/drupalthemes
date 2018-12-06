<?php /* Template Name: Incubator */ ?>

<?php get_header(); ?>

<div class="wrapper" id="page-wrapper">

	<?php while ( have_posts() ) : the_post(); ?>
	    <div class="container full">
			<div class="row">
				<div class="col-md-12"><hr/></div>
			   <div class="col-md-8 col-md-offset-2 mb-5">
			      <h1 class="category-title"><?php the_title(); ?></h1>
			      <?php the_content(); ?>
			   </div>
			</div>
		</div>
	<?php endwhile; ?>

	<?php include get_stylesheet_directory().'/page-templates/page-block.php'; ?>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
