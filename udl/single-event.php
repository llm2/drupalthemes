<?php
/**
 * The template for displaying all single events.
 */

get_header();
?>

<div class="wrapper" id="page-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row mb-3">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-md-12">
					<hr>
						<h4 class="sub-titles">← <?php the_category( ' ' ); ?></h4>
						<h1 class="post-title mb-3"><?php the_title(); ?></h1>
						<?php	if ( has_post_thumbnail() ) { ?>
						    <div class="single-wrapper"><?php the_post_thumbnail('full'); ?></div>
						<?php }
						else {
						}
						?>
				</div>
		</div><!-- .row -->
		<div class="row">
			<div class="col-md-8 mt-3">
					<div class="row">
						<div class="col-lg-6 order-2 mb-5">
							<?php if( get_field('exact_dates_times') ): ?>
							<span class="small-header">When</span>
							<div class="event-data mb-2">
								<?php the_field( 'exact_dates_times'); ?>
							</div>
							<?php endif; ?>
							<?php
								/*$location = get_field('location');*/
								$location=null;

							if( !empty($location) ):
							?>
							<div class="acf-map">
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-lg-6 order-1 mb-5">
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
							<?php } else {
								$exact_address = get_field('exact_address');
								if ( ! empty( $exact_address ) ) {
							?>
							<span class="small-header">Where</span>
							<address class="street-address">
							<?php
							echo $exact_address; // exact address
							?>
							</address>
							<?php }
							}
							?>
						</div>
					</div>
					<div class="mb-3"><?php the_content(); ?></div>
					<div class="event-meta">
						<div class="row">
							<?php if( get_field('registration_link') ): ?>
							<div class="col-md-12 mb-5">
							<a class="btn btn-block btn-primary" href="<?php the_field('registration_link'); ?>" target="_blank">RSVP</a>
							</div>
							<?php endif; ?>
	        </div>
			</div><!-- .event-meta -->
			</div><!-- .col-md-8 -->
			<div class="col-md-3 offset-md-1 mb-5 thumb-desc mt-3">
				<?php the_tags( '<h5 class="tag-title mb-1"><span class="box-wide-sm-black"></span>Topics</h5><span class="box-sm-black"></span>', '<br/><span class="box-sm-black"></span>', '' ); ?>
				<?php udl_print_taxonomy_links( get_the_ID(), 'organizer', 'tag', true, '<h5 class="tag-title mt-5 mb-1"><span class="box-wide-sm-black"></span>Organizers</h5>' , '' ); ?>
				<?php udl_print_taxonomy_links( get_the_ID(), 'sponsor', 'tag', true, '<h5 class="tag-title mt-5 mb-1"><span class="box-wide-sm-black"></span>Sponsors</h5>', '' ); ?>

				<?php

				// check if the repeater field has rows of data
				if( have_rows('list_of_presenters') ):

					echo '<h5 class="tag-title mt-5 mb-1"><span class="box-wide-sm-black"></span>Presenters</h5>';

				 	// loop through the rows of data
				  while ( have_rows('list_of_presenters') ) : the_row(); ?>

		        <a href="<?php the_sub_field('link'); ?>" target="_blank"><h5 class="mt-3 mb-1"><?php the_sub_field('presenter_name'); ?></h5></a>
						<span class="org-name"><?php the_sub_field('organization'); ?></span>

				<?php endwhile;
				else :
				    // no rows found
				endif;
				?>
			</div><!-- .col-md-3 -->
			<?php endwhile; // end of the loop. ?>
		</div><!-- .row -->

		<?php
		$posts = get_field('news_posts');
		if( $posts ): ?>
			<div class="d-flex align-items-end row mb-3 mt-3">
				<div class="col-md-6"><h2>Related Articles &amp; Media</h2></div>
				<div class="col-md-6">
					<div class="">
						<div class=""><h3 class="text-left text-sm-left text-md-right text-lg-right"><a aria-label="View all related articles" href="<?php echo home_url(); ?>/media">View All →</a></h3></div>
					</div>
				</div>
				<div class="col-md-12"><hr/></div>
			</div>
			<div class="row">
			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
				<div class="col-md-4 mb-5">
          <div class="recent-border">
            <div class="thumb-photo mb-2">
              <a aria-label="Read more about <?php the_title(); ?> <?= rand(0, 10000); ?>" href="<?php echo get_permalink( $p->ID ); ?>">
                <?php echo get_the_post_thumbnail( $p->ID, 'post-event-thumb'); ?>
              </a>
            </div>
            <div class="thumb-desc">
              <span class="box-sm-black"></span><?php $categories = get_the_category($p->ID);
              if ( ! empty( $categories ) ) {
                  echo '<span class="initiative"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
              }
              ?><br/>
              <h4><span class="box-sm-black"></span><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></h4>
              <span class="box-wide-sm-black"></span><?php echo get_the_time('F j, Y', $p->ID ); ?>
            </div>
          </div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
		</div><!-- .row -->
		<?php
		$posts = get_field('events');
		if( $posts ): ?>
			<div class="d-flex align-items-end row mb-3 mt-3">
				<div class="col-md-6"><h2>Related Events</h2></div>
				<div class="col-md-6">
					<div class="">
						<div class=""><h3 class="text-left text-sm-left text-md-right text-lg-right"><a aria-label="View all related events" href="<?php echo home_url(); ?>/events">View All →</a></h3></div>
					</div>
				</div>
				<div class="col-md-12"><hr/></div>
			</div>
			<div class="row">
      <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT)
      ?>
				<article aria-label="Event Post: <?= get_the_title($p->ID); ?>" class="col-md-4 mb-5">
				  <div class="recent-border">
				      <div class="thumb-photo mb-2"><a aria-label="Read more about event post - <?= get_the_title($p->ID); ?>" href="<?= get_permalink($p->ID); ?>"><?php echo get_the_post_thumbnail( $p->ID, 'post-event-thumb'); ?></a></div>
				      <div class="thumb-desc p-3">
								<span class="box-sm-black"></span><?php $categories = get_the_category($p->ID);
								if ( ! empty( $categories ) ) {
										echo '<span class="initiative"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
								}
								?><br/>
				        <h4><span class="box-sm-black"></span><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></h4>
				        <div class=""><?php the_field( 'subtitle', $p->ID); ?></div>
				        <div class="event-meta">
				          <?php if( get_field('exact_dates_times', $p->ID) ): ?>
				          <span class="small-header">When</span>
				          <div class="event-data mb-2">
				            <?php the_field( 'exact_dates_times', $p->ID); ?>
				          </div>
				          <?php endif; ?>
				            <?php
				              $event_address = get_field('location', $p->ID);
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
			<?php endforeach; ?>
		<?php endif; ?>
		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
