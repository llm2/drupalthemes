<?php
/**
 *  Event template
 *
 * @package wp-theme-aya-affiliate
 */
?>
<div class="row">
  <div class="col-md-8">
    <?php if ( has_post_thumbnail() ) { ?>
	           <div class="thumb-photo"><a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('full'); ?> </a></div>
        <?php } ?>
  </div>
  <div class="col-md-4">
    <div class="thumb-desc p-3">
      <span class="box-sm-black"></span><span class="initiative"><?php $categories = get_the_category();
      if ( ! empty( $categories ) ) {
          echo '<span class="initiative"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
      }
      ?></span><br/>
      <h4><span class="box-sm-black"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <div class=""><?php the_field( 'subtitle'); ?></div>
      <div class="event-meta">
        <span class="small-header">When</span>
        <div class="event-data mb-2">
          <?php the_field( 'exact_dates_times'); ?>
        </div>
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
</div>
<?php wp_reset_postdata(); ?>
