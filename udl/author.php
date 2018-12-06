<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

get_header();
?>


<div class="wrapper" id="author-wrapper">

	<div class="container" id="content" tabindex="-1">

				<header class="page-header row author-header">

					<div class="col-12 mb-5">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
						$author_name ) : get_userdata( intval( $author ) );
					?>

					<h2><?php esc_html_e( '', 'understrap' ); ?><?php echo esc_html( $curauth->nickname ); ?></h2>

					<dl>
						<?php if ( ! empty( $curauth->user_url ) ) : ?>
							<dt><?php esc_html_e( 'Website', 'understrap' ); ?></dt>
							<dd>
								<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
							</dd>
						<?php endif; ?>

						<?php if ( ! empty( $curauth->user_description ) ) : ?>
							<dt><?php esc_html_e( 'Profile', 'understrap' ); ?></dt>
							<dd><?php echo esc_html( $curauth->user_description ); ?></dd>
						<?php endif; ?>
					</dl>

				</div>

				</header><!-- .page-header -->

				<div class="row">

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
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
						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				</div><!-- row -->

					<!-- End Loop -->

			</div><!-- container -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
