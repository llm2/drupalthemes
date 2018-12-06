<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article aria-label="<?php the_title(); ?>" <?php post_class( 'col-md-4 mb-5' ); ?>>
	<a aria-label="Read more about <?php the_title() ; ?> <?= rand(0, 10000); ?>" href="<?php the_permalink(); ?>">
	<div class="recent-border">
			<div class="thumb-photo mb-2"><?php the_post_thumbnail('post-thumb'); ?></div>
			<div class="thumb-desc p-3">
				<span class="box-sm-black"></span><span class="initiative"><?php $categories = get_the_category();
				if ( ! empty( $categories ) ) {
						echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
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
	</a>
</article>
