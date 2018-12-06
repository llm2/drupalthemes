<?php
/**
 * Post block template.
 *
 * @package wp-theme-aya-affiliate
 */
?>
<div class="col-md-4 mb-5">
  <a aria-label="Read more about <?php the_title() ; ?> <?= rand(0, 10000); ?>" href="<?php the_permalink(); ?>">
  <div class="recent-border">
    <div class="photo-wrapper">
      <div class="image-container">
        <div class="thumbnail-image" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
      </div>
    </div>
    <div class="thumb-desc">
      <span class="box-sm-black"></span><?php $categories = get_the_category();
      if ( ! empty( $categories ) ) {
          echo '<span class="initiative"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
      }
      ?><br/>
      <?php if( get_field('external_link') ) { ?>
        <h4><span class="box-sm-black"></span><a href="<?php the_field('external_link'); ?>"><?php the_title(); ?></a></h4>
        <span class="box-wide-sm-black"></span><?php the_time('F j, Y'); ?>
      <?php } else { ?>
        <h4><span class="box-sm-black"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <span class="box-wide-sm-black"></span><?php the_time('F j, Y'); ?>
      <?php } ?>
    </div>
  </div>
  </a>
</div>
