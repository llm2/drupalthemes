<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<div class="wrapper" id="page-wrapper">
	<div class="container" id="content" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="col-md-12">
					<h1 class="sub-titles"><?php the_title(); ?></h1><hr>
				</div>
				<div class="col-md-10 pb-5">
				<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>

		<?php if( have_rows('areas_of_interest') ): ?>
				<div class="row">
					<div class="col-md-12 mt-3 mb-4">
						<h4 class="sans-md-title"><?php the_field('section_title'); ?></h4>
					</div>
				</div>
				<?php while( have_rows('areas_of_interest') ): the_row(); ?>
				<div class="container">
				<div class="row mb-5">
						<div class=" col-md-2 area-interest-title">
							<h5><?php the_sub_field('title'); ?></h5>
						</div>
						<div class="staff-desc-box col-md-6 mt-sm-5 mt-md-0 mt-lg-0">
							<div class="border p-3">
								<span class="staff-desc"><?php the_sub_field('description'); ?></span>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
		<?php endif; ?>

		<?php if( have_rows('staffMembers') ): ?>
				<div class="row">
					<div class="col-md-12 mt-3 mb-4">
						<h2 class="header-titles"><?php the_field('staff_title'); ?></h2>
					</div>
				</div>
				<?php while( have_rows('staffMembers') ): the_row(); ?>
				<div class="row mb-5">
					<div class="staff-blankbox col-md-1 d-none d-md-block"><div class="border d-none d-md-block"></div></div>
					<div class="staff-desc-box col-md-6 mt-sm-5 mt-md-0 mt-lg-0">
						<div class="border p-3">
							<h3><?php the_sub_field('name'); ?></h3>
							<div class="staff-title"><?php the_sub_field('jobTitles'); ?> | <a href="mailto:<?php the_sub_field('contact_info'); ?>" class="more-link">Contact <?php the_sub_field('name'); ?></a></div><br>
							<span class="staff-desc"><?php the_sub_field('bio'); ?></span>
						</div>
					</div>
					<div class="staff-graybox col-md-3">
						<div class="border">
						<?php
						$image = get_sub_field('photo');
						$size = 'large'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
		<?php endif; ?>

		<?php if( have_rows('visiting_scholars') ): ?>
		<div class="row">
			<div class="col-md-12 mt-5 mb-4">
				<h2 class="sub-titles"><?php the_field('scholar_title'); ?></h2>
			</div>
		</div>
		<div class="row">
		<?php while( have_rows('visiting_scholars') ): the_row(); ?>
			<div class="scholar col-md-6 mb-5">
				<div class="border">
					<h4 class="scholar-name"><?php the_sub_field('name'); ?></h4>
					<p><?php the_sub_field('bio'); ?></p>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
		<?php endif; ?>

		<!-- Visiting Scholar -->

		</div><!-- Container end -->
		<?php include get_stylesheet_directory().'/page-templates/page-block.php'; ?>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
