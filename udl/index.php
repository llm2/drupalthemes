<?php get_header(); ?>

<div class="wrapper" id="page-wrapper">

	<div class="container">
		<div class="row mb-5">
			<div class="col-sm-12">
				<hr>
				<h1 class="category-title">
					<?php single_post_title(); ?>
				</h1>
				<div class="main-lead">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	<div class="row mb-5">

				<?php
					$args = array(
						'post_type' => array('post'),
						'posts_per_page' => -1,
						'post_status' => 'publish',
					);

					$media_query = new WP_Query( $args );
					$rowNumber = 0;
					if( $media_query->have_posts() ) {
						while( $media_query->have_posts() ){
							$media_query->the_post();
							?>

							<div class="col-md-4 mb-3">
								<a aria-label="Read more about <?php the_title() ; ?> <?= rand(0, 10000); ?>" href="<?php the_permalink(); ?>">
								<div class="recent-border">
									<div class="thumb-photo mb-2"><?php the_post_thumbnail('post-event-thumb'); ?></div>
									<div class="thumb-desc">
										<span class="box-sm-black"></span><span class="initiative"><?php $categories = get_the_category();
										if ( ! empty( $categories ) ) {
												echo '<span class="initiative"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
										}
										?></span><br/>
										<h4><span class="box-sm-black"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<span class="box-wide-sm-black"></span><?php the_time('F j, Y'); ?>
									</div>
								</div>
								</a>
							</div>

							<?php
							$rowNumber++;
							if($rowNumber==3){
								echo('</div><div class="row mb-5">');//new row at 3rd post.
								$rowNumber = 0;
								}
							}
						}
					wp_reset_query();
			?>

			</div>
		</div>
	</div>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
