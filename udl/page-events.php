<?php /* Template Name: Events */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="container full">
		<div class="row">
			<div class="col-md-12"><hr/></div>
		   <div class="col-md-8 col-md-offset-2 mb-5">
		      <h1 class="category-title"><?php the_title(); ?></h1>
          <?php if ( strlen(get_the_content()) > 0 ) : ?>
            <h5 class="category-description"><?php the_content(); ?></h5>
          <?php endif; ?>
		   </div>
		</div>
	</div>
<?php endwhile; ?>

<?php endif; ?>
<div id="page-wrapper">
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
        'order' => 'ASC'
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

  <div class="container">
    <div class="d-flex align-items-center"><h2 class="header-titles">Past</h2></div>
      <div class="past-row row">
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
                  <a aria-label="Read more about <?php the_title() ; ?> <?= rand(0, 10000); ?>" href="<?php the_permalink(); ?>">
                  <div class="recent-border">
                      <div class="photo-wrapper">
                        <div class="image-container">
                          <div class="thumbnail-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
                        </div>
                      </div>
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
                  </a>
                </article>

              <?php } ?>
            </div>
            <?php wp_reset_query(); ?>
    </div>
  </div>
<div>

<?php get_footer(); ?>
