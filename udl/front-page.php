<?php get_header(); ?>

<?php
// Printing out the homepage statement
if( have_posts() ) {
	while( have_posts() ) {
		the_post();
	}
}
?>

	<div class="wrapper" id="page-wrapper">
    <h1 class="visually-hidden">NYU UDL Front Page</h1>
		<div class="wrapper" id="page-wrapper">
			<?php
				$today = date('Y-m-d H:i:s');
		    $args = array(
		        'post_type' => array('event'),
						'posts_per_page' => -1,
		        'meta_key' => 'end_date_time',
		        'meta_query' => array(
		            array(
		                'key' => 'end_date_time'
		            ),
		            array(
		                'key' => 'end_date_time',
		                'value' => $today,
		                'compare' => '>='
		            )
		        ),
		        'orderby' => 'meta_value',
		        'order' => 'DESC'
		    );
			$upcoming_events_query = new WP_Query($args);
			$numPost = $upcoming_events_query->post_count;
			?>
			<?php if ( $upcoming_events_query->have_posts() ) : ?>
			<div class="container-fluid hero" id="content" tabindex="-1">
				<div class="upcoming-container container">
					<div class="row pb-3">
						<div class="col-sm-12 pt-3 mb-3">
							<h2>Upcoming</h2>
						</div>
						<?php  while ( $upcoming_events_query->have_posts() ) : $upcoming_events_query->the_post(); ?>

						<?php if($numPost==1) { ?>
						<div <?php post_class( 'col-md-4 upcoming pt-0' ); ?>>
							<a href="<?php the_permalink(); ?>">
									<div class="thumb-desc">
										<span class="box-sm"></span><span class="upcoming-initiative-link"><?php $categories = get_the_category();
										if ( ! empty( $categories ) ) {
												echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
										}
										?></span><br/>
									<h4 class="hero-s-title"><span class="box-sm"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class=""><?php the_field( 'subtitle'); ?></div>
									<div class="event-meta">
		                  <?php if( get_field('exact_dates_times') ): ?>
		                  <span class="small-header">When</span>
		                  <div class="event-data mb-2">
		                    <?php the_field( 'exact_dates_times'); ?>
		                  </div>
		                  <?php endif; ?>
												<?php
													$event_address = get_field('location');
													if ( ! empty( $event_address ) ) {
													?>
													<span class="small-header">Where</span>
													<div class="event-data">
													<address class="street-address">
													<?php $address = explode( "," , $event_address['address']);
													echo $address[0].'<br/>'; // location name
													echo $address[1].'<br/>'; // street address
													echo $address[2].','.$address[3]; // city, state zip
													?>
													</address>
													</div>
										<?php } ?>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-8 pb-3">
							<div class="hero-thumb-photo"><?php the_post_thumbnail('post-thumb'); ?></div>
						</div>
						<?php } ?>

						<?php if($numPost==2) { ?>
						<a href="<?php the_permalink(); ?>">
							<div <?php post_class( 'col-md-6 upcoming' ); ?>>
									<div class="hero-thumb-photo"><?php the_post_thumbnail('post-thumb'); ?></div>
									<div class="thumb-desc">
										<span class="box-sm"></span><span class="upcoming-initiative-link"><?php $categories = get_the_category();
										if ( ! empty( $categories ) ) {
												echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
										}
										?></span><br/>
									<h4 class="hero-s-title"><span class="box-sm"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class=""><?php the_field( 'subtitle'); ?></div>
									<div class="event-meta">
		                  <?php if( get_field('exact_dates_times') ): ?>
		                  <span class="small-header">When</span>
		                  <div class="event-data mb-2">
		                    <?php the_field( 'exact_dates_times'); ?>
		                  </div>
		                  <?php endif; ?>
												<?php
													$event_address = get_field('location');
													if ( ! empty( $event_address ) ) {
													?>
													<span class="small-header">Where</span>
													<div class="event-data">
													<address class="street-address">
													<?php $address = explode( "," , $event_address['address']);
													echo $address[0].'<br/>'; // location name
													echo $address[1].'<br/>'; // street address
													echo $address[2].','.$address[3]; // city, state zip
													?>
													</address>
													</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</a>
						<?php } ?>

						<?php if($numPost>=3) { ?>
						<a href="<?php the_permalink(); ?>">
							<div <?php post_class( 'col-md-4 upcoming' ); ?>>
									<div class="hero-thumb-photo"><?php the_post_thumbnail('post-thumb'); ?></div>
									<div class="thumb-desc">
										<span class="box-sm"></span><span class="upcoming-initiative-link"><?php $categories = get_the_category();
										if ( ! empty( $categories ) ) {
												echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
										}
										?></span><br/>
									<h4 class="hero-s-title"><span class="box-sm"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class=""><?php the_field( 'subtitle'); ?></div>
									<div class="event-meta">
		                  <?php if( get_field('exact_dates_times') ): ?>
		                  <span class="small-header">When</span>
		                  <div class="event-data mb-2">
		                    <?php the_field( 'exact_dates_times'); ?>
		                  </div>
		                  <?php endif; ?>
												<?php
													$event_address = get_field('location');
													if ( ! empty( $event_address ) ) {
													?>
													<span class="small-header">Where</span>
													<div class="event-data">
													<address class="street-address">
													<?php $address = explode( "," , $event_address['address']);
													echo $address[0].'<br/>'; // location name
													echo $address[1].'<br/>'; // street address
													echo $address[2].','.$address[3]; // city, state zip
													?>
													</address>
													</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</a>
						<?php } ?>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</div><!-- row -->
				</div><!-- Container -->
			</div><!-- Container-fluid -->
		</div><!-- Wrapper -->

		<div class="container" id="content" tabindex="-1">
		<div class="d-flex align-items-end row mb-3 mt-3">
			<div class="col-md-8"><h2>Initiatives &amp; Research</h2></div>
			<div class="col-md-4">
				<div class="">
    			<div class=""><h3 class="text-left text-sm-left text-md-right text-lg-right"><a aria-label="View all initiatives and research" href="<?php echo home_url(); ?>/initiatives-research">View All →</a></h3></div>
				</div>
			</div>
			<div class="col-md-12"><hr/></div>
		</div>
		<div class="initiatives row">
			<?php

			$terms = get_field('featured_initiatives');

			if( $terms ): ?>

				<?php foreach( $terms as $term ):


					$initiative = get_term($term);
					$image = get_field('initiative_image', $initiative);

					?>
					<div class="col-md-6 col-lg-6 mb-5">

						<div class="thumb-photo mb-4"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
						<h4><a href="<?php echo get_term_link( $term ); ?>"><?php echo $initiative->name; ?></a></h4>
						<p><?php echo wp_trim_words( $initiative->description, $num_words = 55, $more = '...</br>' ); ?></p>
						<a class="more-link" href="<?php echo get_term_link( $term ); ?>" alt="More about <?php echo $initiative->name; ?>">More →</a>

					</div>

				<?php endforeach; ?>

			<?php endif; ?>
		</div>


		<div class="d-flex align-items-end row mb-3 mt-3">
			<div class="col-md-6"><h2>Recent Media</h2></div>
			<div class="col-md-6">
				<div class="">
    			<div class=""><h3 class="text-left text-sm-left text-md-right text-lg-right"><a aria-label="View all recent media" href="<?php echo home_url(); ?>/media">View All →</a></h3></div>
				</div>
			</div>
			<div class="col-md-12"><hr/></div>
		</div>
		<div class="recent-row row">
			<?php
				$args = array(
					'post_type' => array('post'),
					'posts_per_page' => 3,
					'post_status' => 'publish',
				);

				$recent_media_query = new WP_Query( $args );
				$rowCounter = 0;
				if( $recent_media_query->have_posts() ) {
					while( $recent_media_query->have_posts() ){
						$recent_media_query->the_post();
						?>

						<div class="col-md-4 mb-5">
              <div class="recent-border">
                <a style="display: block;" tabindex="0" aria-label="Read more about <?php the_title() ; ?> <?= rand(0, 10000); ?>" href="<?php the_permalink(); ?>">
									<div class="photo-wrapper">
							      <div class="image-container">
							        <div class="thumbnail-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
							      </div>
							    </div>
                </a>
                <div class="thumb-desc">
                  <span class="box-sm-black"></span><span class="initiative">
                    <?php $categories = get_the_category();
                      if ( ! empty( $categories ) ) {
                          echo '<span class="initiative"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
                      }
                    ?>
                  </span>
                  <br/>
                  <h4>
                    <span class="box-sm-black"></span>
                    <a href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                    </a>
                  </h4>
                  <span class="box-wide-sm-black"></span>
                  <?php the_time('F j, Y'); ?>
                </div>
              </div>
						</div>

						<?php
						$rowCounter++;
						if($rowCounter==3){
							echo('</div><div class="row">');//new row at 3rd post.
							$rowCounter = 0;
							}
						}
					}
				wp_reset_query();
		?>
		</div>

		<div class="d-flex align-items-end row mb-3 mt-3">
			<div class="col-md-6"><h2>Recent Events</h2></div>
			<div class="col-md-6">
				<div class="">
    			<div class=""><h3 class="text-left text-sm-left text-md-right text-lg-right"><a aria-label="View All Recent Events" href="<?php echo home_url(); ?>/events">View All →</a></h3></div>
				</div>
			</div>
			<div class="col-md-12"><hr/></div>
		</div>
			<div class="past-row row">
				<?php
				$today = date('Y-m-d H:i:s');
				$args = array(
						'post_type' => array('event'),
						'posts_per_page' => 3,
						'meta_key' => 'end_date_time',
						'meta_query' => array(
								array(
										'key' => 'end_date_time'
								),
								array(
										'key' => 'end_date_time',
										'value' => $today,
										'compare' => '<='
								)
						),
						'orderby' => 'meta_value',
						'order' => 'DESC'
				);
			$past_events_query = new WP_Query($args);
			$numPost = $past_events_query->post_count;
			 ?>
					<?php  while( $past_events_query->have_posts() ){
							$past_events_query->the_post();
							//
							// var_dump(get_post_meta(get_the_ID(), "end_date_time"));
					?>
			          <article aria-label="Event Post: <?php the_title(); ?>" <?php post_class( 'col-md-4 mb-5' ); ?>>
									<div class="recent-border">
                    <a style="display: block;" aria-label="Read more about <?php the_title() ; ?> <?= rand(0, 10000); ?>" href="<?php the_permalink(); ?>">
											<div class="photo-wrapper">
									      <div class="image-container">
									        <div class="thumbnail-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
									      </div>
									    </div>
                    </a>
                    <div class="thumb-desc p-3">
                      <span class="box-sm-black"></span><?php $categories = get_the_category();
                      if ( ! empty( $categories ) ) {
                          echo '<span class="initiative"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
                      }
                      ?><br/>
                      <h4><span class="box-sm-black"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <div class=""><?php the_field( 'subtitle'); ?></div>
                      <div class="event-meta">
                        <?php if( get_field('exact_dates_times') ): ?>
                        <span class="small-header">When</span>
                        <div class="event-data mb-2">
                          <?php the_field( 'exact_dates_times'); ?>
                        </div>
                        <?php endif; ?>
                          <?php
                            $event_address = get_field('location');
                            if ( ! empty( $event_address ) ) {
                            ?>
                            <span class="small-header">Where</span>
                            <div class="event-data">
                            <address class="street-address">
                            <?php $address = explode( "," , $event_address['address']);
                            echo $address[0].'<br/>'; // location name
                            echo $address[1].'<br/>'; // street address
                            echo $address[2].','.$address[3]; // city, state zip
                            ?>
                            </address>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                  </div>
			          </article>

							<?php } ?>
						</div>
						<?php wp_reset_query(); ?>
		</div>
	</div><!-- Wrapper end -->

<?php get_footer(); ?>
