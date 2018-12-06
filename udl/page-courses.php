<?php /* Template Name: Courses */ ?>

<?php get_header(); ?>

<div class="wrapper" id="page-wrapper">

  <?php if ( have_posts() ): ?>

  <?php while ( have_posts() ) : the_post(); ?>
      <div class="container full">
  		<div class="row">
  			<div class="col-md-12"><hr/></div>
  		   <div class="col-md-8 col-md-offset-2 mb-5">
  		      <h1 class="category-title"><?php the_title(); ?></h1>
  		      <h5 class="category-description"><?php the_content(); ?></h5>
  		   </div>
  		</div>
  	</div>
  <?php endwhile; ?>

  <?php endif; ?>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
