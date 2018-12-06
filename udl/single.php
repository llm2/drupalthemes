<?php
/**
 * The template for displaying all single posts and formats.
 */

get_header();
?>

<div class="wrapper" id="page-wrapper">

	<div class="container" id="content" tabindex="-1">

		<?php while ( have_posts() ) : the_post(); ?>
		<div class="row">
		<?php if ( has_post_format('video') ) { ?>
					<div class="col-md-12">
						<hr>
						<h3 class="sub-titles">← <?php the_category( ' ' ); ?></h3>
						<h1 class="post-title"><?php the_title(); ?></h1>
						<h5 class="date mt-3 mb-3"><?php the_time('F j, Y'); ?></h5>
						<div class="byline mb-3"><span class="author-name">By <?php the_author_posts_link(); ?></span></div>
					</div>
		<?php } elseif ( has_post_format('gallery') ) { ?>
					<div class="col-md-12">
						<hr>
						<h3 class="sub-titles">← <?php the_category( ' ' ); ?></h3>
						<h1 class="post-title"><?php the_title(); ?></h1>
						<h5 class="date mt-3 mb-3"><?php the_time('F j, Y'); ?></h5>
						<div class="byline mb-3"><span class="author-name">By <?php the_author_posts_link(); ?></span></div>
					</div>

		<?php } else { ?>
					<div class="col-md-12">
						<hr>
						<h3 class="sub-titles">← <?php the_category( ' ' ); ?></h3>
						<h1 class="post-title"><?php the_title(); ?></h1>
						<h5 class="date mt-3 mb-3"><?php the_time('F j, Y'); ?></h5>
						<div class="byline mb-3"><span class="author-name">By <?php the_author_posts_link(); ?></span></div>
					</div>
					<div class="col-md-10 offset-md-1">
						<?php	if ( has_post_thumbnail() ) { ?>
						    <div class="single-wrapper mb-5"><?php the_post_thumbnail('full'); ?></div>
						<?php }
						else {
						}
						?>
					</div>
		<?php } ?>
		</div><!-- .row -->

		<div class="row">
		<?php if ( has_post_format('video') ) { ?>
					<div class="col-md-8">
								<div class="mb-5"><?php the_content(); ?></div>
					</div><!-- .col-md-8 -->
					<div class="col-md-4 mb-5 thumb-desc">
						<?php the_tags( '<h5 class="tag-title mb-1"><span class="box-wide-sm-black"></span>Topics</h5><span class="box-sm-black"></span>', '<br/><span class="box-sm-black"></span>', '' ); ?>
					</div><!-- .col-md-8 -->
		<?php } elseif ( has_post_format('gallery') ) { ?>
					<div class="col-md-8">
								<div class="mb-5"><?php the_content(); ?></div>
					</div><!-- .col-md-8 -->
					<div class="col-md-4 mb-5 thumb-desc">
						<?php the_tags( '<h5 class="tag-title mb-1"><span class="box-wide-sm-black"></span>Topics</h5><span class="box-sm-black"></span>', '<br/><span class="box-sm-black"></span>', '' ); ?>
					</div><!-- .col-md-8 -->
		<?php } else { ?>
					<div class="col-md-8">
								<div class="mb-5"><?php the_content(); ?></div>
					</div><!-- .col-md-8 -->
					<div class="col-md-4 mb-5 thumb-desc">
						<?php the_tags( '<h5 class="tag-title mb-1"><span class="box-wide-sm-black"></span>Topics</h5><span class="box-sm-black"></span>', '<br/><span class="box-sm-black"></span>', '' ); ?>
					</div><!-- .col-md-8 -->
		<?php } ?>
		</div><!-- .row -->

		<?php endwhile; // end of the loop. ?>
		</div><!-- .row -->


		<?php
		$posts = get_field('news_posts');
		if( $posts ): ?>
		<div class="d-flex align-items-end row mb-3 mt-3">
			<div class="col-md-6"><h2>Related Articles &amp; Media</h2></div>
			<div class="col-md-6">
				<div class="">
    			<div class=""><h3 class="text-left text-sm-left text-md-right text-lg-right"><a href="<?php echo home_url(); ?>/media">View All →</a></h3></div>
				</div>
			</div>
			<div class="col-md-12"><hr/></div>
		</div>
			<div class="row">
			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
				<div class="col-md-4 mb-5">
					<a aria-label="Read more about <?php $p->post_title; ?> <?= rand(0, 10000); ?>" href="<?php echo get_permalink( $p->ID ); ?>">
					<div class="recent-border">
						<div class="photo-wrapper">
							<div class="image-container">
								<div class="thumbnail-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
							</div>
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
					</a>
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
    			<div class=""><h3 class="text-left text-sm-left text-md-right text-lg-right"><a href="<?php echo home_url(); ?>/events">View All →</a></h3></div>
				</div>
			</div>
			<div class="col-md-12"><hr/></div>
		</div>
			<div class="row">
			<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
				<article class="col-md-4 mb-5">
				  <a aria-label="Read more about <?php $p->post_title; ?> <?= rand(0, 10000); ?>" href="<?php echo get_permalink( $p->ID ); ?>">
				  <div class="recent-border">
							<div class="photo-wrapper">
								<div class="image-container">
									<div class="thumbnail-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
								</div>
							</div>
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
				  </a>
				</article>
			<?php endforeach; ?>
		<?php endif; ?>
		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
