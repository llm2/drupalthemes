    <?php
			if( have_rows('sections') ):// check if the flexible content field has rows of data
				while ( have_rows('sections') ) : the_row();// loop through the rows of flexible content data
        ?>

					<?php
					//---------------------- News & Updates -----------------------//
					if( get_row_layout() == 'news_and_updates' ): // check that it exists ?>
          <div class="container mt-3 mb-3">
						<div class="row"><div class="col-md-12 text-center mb-sm-3"><h2 class="color-accent text-uppercase"><?php the_sub_field('section_title'); ?></h2></div></div>
						<div class="row <?php the_sub_field('spacing'); ?>">
						<?php
						$section_post_count = count(get_sub_field('news_posts'));// store the post data array into a variable
						$section_posts = get_sub_field('news_posts');// store the post data array into a variable
						foreach ($section_posts as $section_post) {
							if ($section_post_count == 1 ) {
								echo '<div class="col-md-12">';
									include "one-post-block.php";// pass the data into the news-post template
								echo '</div>';
							} else if ($section_post_count == 2 ) {
								echo '<div class="col-md-6 mb-3">';
									include "post-block.php";// pass the data into the news-post template
								echo '</div>';
							} else if ($section_post_count == 3 ) {
								echo '<div class="col-md-4 mb-3">';
									include "post-block.php";// pass the data into the news-post template
								echo '</div>';
							}
						}
						echo '</div>';?>
          </div>
					<?php endif;?>


					<?php
					//---------------------- Events -----------------------//
					if( get_row_layout() == 'events' ): // check that it exists ?>
          <div class="container mt-3 mb-3">
						<div class="row"><div class="col-md-12 text-center mb-3"><h2 class="color-accent text-uppercase"><?php the_sub_field('section_title'); ?></h2></div></div>
						<div class="row <?php the_sub_field('spacing'); ?>">
						<?php $section_post_count = count(get_sub_field('event_posts'));// store the post data array into a variable
						$section_posts = get_sub_field('event_posts');// store the post data array into a variable
						foreach ($section_posts as $section_post) {
							if ($section_post_count == 1 ) {
								echo '<div class="col-md-12">';
									include "one-event-block.php";// pass the data into the news-post template
								echo '</div>';
							} else if ($section_post_count == 2 ) {
								echo '<div class="col-md-6 mb-3">';
									include "event-block.php";// pass the data into the news-post template
								echo '</div>';
							} else if ($section_post_count == 3 ) {
								echo '<div class="col-md-4 mb-3">';
									include "event-block.php";// pass the data into the news-post template
								echo '</div>';
							}
						}
						echo '</div>'; ?>
          </div>
					<?php endif;?>


					<?php
					//---------------------- Video -----------------------//
					if( get_row_layout() == 'video' ): // check that it exists ?>
          <div class="container mt-3 mb-3">
  					<div class="row <?php the_sub_field('spacing'); ?>">
  						<div class="col-md-12">
  									<h3 class="large-color-header-line"><?php the_sub_field('title'); ?></h3>
                    <div class="row">
                      <div class="col-sm-12 mb-sm-2">
                        <div class="mt-2 mr-0"><div class="embed-responsive embed-responsive-16by9"><?php the_sub_field('video_url'); ?></div></div>
                      </div>
                    </div>
								</div>
							</div>
						</div>
					<?php endif; ?>

          <?php
					//---------------------- Events -----------------------//
					if( get_row_layout() == 'pages' ): // check that it exists ?>
          <div class="container mt-3 mb-3">
						<div class="row"><div class="col-md-12 text-center mb-3"><h2><?php the_sub_field('section_title'); ?></h2></div></div>
						<div class="row <?php the_sub_field('spacing'); ?>">
						<?php $section_post_count = count(get_sub_field('subpages'));// store the post data array into a variable
						$section_posts = get_sub_field('subpages');// store the post data array into a variable
						foreach ($section_posts as $section_post) {
							if ($section_post_count == 1 ) {
								echo '<div class="col-md-12">';
									include "one-post-block.php";// pass the data into the news-post template
								echo '</div>';
							} else if ($section_post_count == 2 ) {
								echo '<div class="col-md-6">';
									include "page-block.php";// pass the data into the news-post template
								echo '</div>';
							} else if ($section_post_count == 3 ) {
								echo '<div class="col-md-4">';
									include "page-block.php";// pass the data into the news-post template
								echo '</div>';
							} else if ($section_post_count == 4 ) {
								echo '<div class="col-md-3">';
									include "page-block.php";// pass the data into the news-post template
								echo '</div>';
							}
						}
						echo '</div>'; ?>
          </div>
					<?php endif;?>

          <?php
					//---------------------- Custom Row -----------------------//
					if( get_row_layout() == 'image_left_row' ): // check that it exists ?>
          <div class="container mt-3 mb-3">
						<div class="row">
              <div class="col-md-12 mb-3">
                <div class="d-flex"><h2 class="header-titles"><?php the_sub_field('section_title'); ?></h2></div>
              </div>
            </div>
						<div class="row <?php the_sub_field('spacing'); ?>">
              <?php

              // check if the repeater field has rows of data
              if( have_rows('row_repeater') ):

               	// loop through the rows of data
                  while ( have_rows('row_repeater') ) : the_row(); ?>
                        <?php include "one-repeater-block-left.php"; ?>
                <?php   endwhile; ?>
              </div>
              </div>
              <?php else :
                  // no rows found
              endif;
              ?>

					<?php endif; ?>

          <?php
          //---------------------- Custom Row -----------------------//
          if( get_row_layout() == 'image_right_row' ): // check that it exists ?>
          <div class="container mt-3 mb-3">
            <?php if( get_sub_field('section_title') ): ?>
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="d-flex"><h2 class="header-titles"><?php the_sub_field('section_title'); ?></h2></div>
              </div>
            </div>
            <?php endif; ?>
            <div class="row <?php the_sub_field('spacing'); ?>">
              <?php

              // check if the repeater field has rows of data
              if( have_rows('row_repeater') ):

                // loop through the rows of data
                  while ( have_rows('row_repeater') ) : the_row(); ?>
                        <?php include "one-repeater-block-right.php"; ?>
                <?php   endwhile; ?>
              </div>
              </div>
              <?php else :
                  // no rows found
              endif;
              ?>

          <?php endif; ?>

          <?php
					//---------------------- Custom Row -----------------------//
					if( get_row_layout() == '2col_row' ): // check that it exists ?>
            <?php if( get_sub_field('section_title') ): ?>
            <div class="container mt-3">
						<div class="row">
              <div class="col-md-12">
                <div class="d-flex"><h2 class="header-titles"><?php the_sub_field('section_title'); ?></h2><hr></div>
              </div>
            </div>
            <?php endif; ?>
            <div class="container mb-3">
						<div class="row <?php the_sub_field('spacing'); ?>">
              <?php

              // check if the repeater field has rows of data
              if( have_rows('row_repeater') ):

               	// loop through the rows of data
                  while ( have_rows('row_repeater') ) : the_row(); ?>
                    <div class="col-md-6 mb-4">
                        <?php include "repeater-block.php"; ?>
                    </div>
                <?php   endwhile; ?>
              </div>
              </div>
              <?php else :
                  // no rows found
              endif;
              ?>

					<?php endif; ?>

          <?php
					//---------------------- Custom Row -----------------------//
					if( get_row_layout() == '3col_row' ): // check that it exists ?>
            <?php if( get_sub_field('section_title') ): ?>
            <div class="container mt-3">
						<div class="row">
              <div class="col-md-12">
                <div class="d-flex"><h2 class="header-titles"><?php the_sub_field('section_title'); ?></h2><hr></div>
              </div>
            </div>
            <?php endif; ?>
            <div class="container mb-3">
						<div class="row <?php the_sub_field('spacing'); ?>">
              <?php

              // check if the repeater field has rows of data
              if( have_rows('row_repeater') ):

               	// loop through the rows of data
                  while ( have_rows('row_repeater') ) : the_row(); ?>
                    <div class="col-sm-4 mb-4">
                        <?php include "repeater-block.php"; ?>
                    </div>
                <?php   endwhile; ?>
              </div>
              </div>
              <?php else :
                  // no rows found
              endif;
              ?>

					<?php endif; ?>

          <?php
					//---------------------- Custom Row -----------------------//
					if( get_row_layout() == '4col_row' ): // check that it exists ?>
            <?php if( get_sub_field('section_title') ): ?>
            <div class="container mt-3">
						<div class="row">
              <div class="col-md-12">
                <div class="d-flex"><h2 class="header-titles"><?php the_sub_field('section_title'); ?></h2><hr></div>
              </div>
            </div>
            <?php endif; ?>
            <div class="container mb-3">
						<div class="row <?php the_sub_field('spacing'); ?>">
              <?php

              // check if the repeater field has rows of data
              if( have_rows('row_repeater') ):

               	// loop through the rows of data
                  while ( have_rows('row_repeater') ) : the_row(); ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <?php include "repeater-block.php"; ?>
                    </div>
                <?php   endwhile; ?>
              </div>
              </div>
              <?php else :
                  // no rows found
              endif;
              ?>

					<?php endif; ?>

					<?php
					//---------------------- Page Links -----------------------//
					if( get_row_layout() == 'subpages' ): // check that it exists ?>
					<?php if( have_rows('pages') ): ?>
              <div class="container mt-3 mb-3">
              <div class="row mb-5"><div class="col-md-12"><hr></div></div>
							<div class="row <?php the_sub_field('spacing'); ?>">
										<?php while ( have_rows('pages') ) : the_row(); ?>
										<div class="col-md-6">
                        <?php $link = get_sub_field('page_link');
                        if( $link ): ?>
                          <a class="page-button border-color-secondary d-block p-5 mb-md-7 mb-sm-3 mb-3" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                          <h2 class=""><?php the_sub_field('page_title'); ?></h2>
                          <h4 class=""><?php the_sub_field('subtitle'); ?></h4>
                          <p class="action-lead"><?php the_sub_field('description'); ?></p>
                          </a>
                        <?php endif; ?>
										</div>
										<?php endwhile; ?>
							</div>
						<?php else:
											// no rows found
						endif; ?>
					<?php endif;

					if( get_row_layout() == 'color_block_section' ): // check that it exists ?>
          <div class="row full color-primary-bg-tint p-lg-7 p-md-5 p-2 <?php the_sub_field('spacing'); ?>">
					<div class="container mt-3 mb-3">
						<div class="row">
							<div class="col-md-12 p-lg-5 p-md-3 p-sm-3 p-1 color-bg text-center">
								<h2 class="color-white text-uppercase mb-2"><?php the_sub_field('title'); ?></h2>
								<div class="color-white mb-3"><?php the_sub_field('description'); ?></div>
								<a class="btn btn-block btn-primary color-white" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
							</div>
							</div>
						</div>
          </div>
					<?php endif;

					if( get_row_layout() == 'form_embed' ): // check that it exists ?>
          <div class="row full color-primary-bg-tint p-lg-7 p-md-5 p-2 <?php the_sub_field('spacing'); ?>">
					<div class="container mt-3 mb-3">
						<div class="row justify-content-center">
							<div class="col-md-10 p-lg-5 p-md-3 p-sm-3 p-1 color-bg text-center">
								<h2 class="color-white text-uppercase mb-2"><?php the_sub_field('title'); ?></h2>
								<div class="mb-3"><?php the_sub_field('form'); ?></div>
							</div>
							</div>
						</div>
          </div>
					<?php endif;

          if( get_row_layout() == 'title_wysiwyg_link' ): // check that it exists ?>
  					<div class="row <?php the_sub_field('spacing'); ?>">
  						<div class="col-md-10">
                <div class="d-flex"><h2 class="header-titles"><?php the_sub_field('title'); ?></h2><hr></div>
                <div class="my-3">
                  <div class="ngp-form"><?php the_sub_field('section_text'); ?></div>
                  <?php if( get_sub_field('button_text') ): ?>
                  <a class="btn btn-block btn-primary color-primary-bg color-white" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
                  <?php endif; ?>
                </div>
              </div>
  				  </div>
					<?php endif; ?>

			  <?php endwhile; // Closing the core_page_sections loop
			else :
					// no layouts on this page
			endif;?>
