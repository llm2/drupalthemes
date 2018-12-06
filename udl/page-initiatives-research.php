<?php /* Template Name: Initiatives & Research */ ?>

<?php get_header(); ?>

<div class="wrapper" id="page-wrapper">
	<div id="main-content-container" class="container" >
		<?php while ( have_posts() ) : the_post(); ?>

		<div class="row">
			<div class="col-md-12">
				<h1 class="sub-titles"><?php the_title(); ?></h1><hr>
			</div>
			<div class="col-md-10">
			</div>
			<div class="col-md-10">
			<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; // end of the loop. ?>

				<?php

				$terms = get_field('current_initiatives');

				if( $terms ): ?>
				<div class="row"><div class="col-md-12"><h2 class="header-titles">Current Initiatives</h2></div></div>
				<div class="initiatives row mb-3">

					<?php foreach( $terms as $term ):


						$initiative = get_term($term);
            $image = get_field('initiative_image', $initiative);

						?>
						<div class="col-md-6 mb-5">

							<div class="thumb-photo mb-3"><a aria-label="See more <?= $initiative->name; ?>" href="<?php echo get_term_link( $term ); ?>"><img src="<?php echo $image['url']; ?>" alt="<?= $initiative->name; ?> - <?php echo $image['alt']; ?>" /></a></div>
							<h4><a href="<?php echo get_term_link( $term ); ?>"><?php echo $initiative->name; ?></a></h4>
							<p><?php echo wp_trim_words( $initiative->description, $num_words = 55, $more = '...</br>' ); ?></p>
							<a class="more-link" href="<?php echo get_term_link( $term ); ?>" aria-label="More about <?php echo $initiative->name; ?>">More →</a>

						</div>

					<?php endforeach; ?>

				<?php endif; ?>
		</div>
				<?php

				$terms = get_field('past_initiatives');

				if( $terms ): ?>

				<div class="row"><div class="col-md-12"><h2 class="header-titles">Past Initiatives</h2></div></div>
				<div class="initiatives row mb-3">

					<?php foreach( $terms as $term ):


						$initiative = get_term($term);
						$image = get_field('initiative_image', $initiative);

						?>
						<div class="col-md-6 mb-5">

							<div class="thumb-photo mb-3"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
							<h4><a href="<?php echo get_term_link( $term ); ?>"><?php echo $initiative->name; ?></a></h4>
							<p><?php echo wp_trim_words( $initiative->description, $num_words = 55, $more = '...</br>' ); ?></p>
							<a aria-label="More about <?= $initiative->name; ?>" class="more-link" href="<?php echo get_term_link( $term ); ?>">More →</a>

						</div>

					<?php endforeach; ?>

				<?php endif; ?>
				<?php

				$terms = get_field('working_groups');

				if( $terms ): ?>

				<div class="row"><div class="col-md-12"><h2 class="header-titles">Working Groups</h2></div></div>
				<div class="initiatives row mb-3">

					<?php foreach( $terms as $term ):


						$initiative = get_term($term);
						$image = get_field('initiative_image', $initiative);

						?>
						<div class="col-md-6 mb-5">

							<div class="thumb-photo mb-3"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
							<h4><a href="<?php echo get_term_link( $term ); ?>"><?php echo $initiative->name; ?></a></h4>
							<p><?php echo wp_trim_words( $initiative->description, $num_words = 55, $more = '...</br>' ); ?></p>
							<a aria-label="More about <?= $initiative->name; ?>" class="more-link" href="<?php echo get_term_link( $term ); ?>">More →</a>

						</div>

					<?php endforeach; ?>

				<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer();?>
