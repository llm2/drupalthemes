<a href="<?php echo $sub_link ?>">
  <div class="card-wrapper">
    <div class="mb-md-4">
        <h4 class="card-title"><?php echo $sub_title ?></h4>
        <?php echo wp_trim_words( $sub_description, $num_words = 55, $more = '...</br>' ); ?>
        <a class="more-link text-uppercase" href="<?php echo $sub_link ?>">Learn More</a>
    </div>
  </div>
</a>
