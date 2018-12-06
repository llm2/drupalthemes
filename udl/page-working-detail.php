<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="page-wrapper">

	<?php if ( is_page('working-detail') ) : ?>


	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<h4>Initiatives &amp; Research</h4>
		<h1>Working Group: Culture Politcs</h1>
		<h4 class="col-lg-8">In partnership with Richard Sennett of Theatrum Mundi, the Urban
			Democracy Lab launched the Culture Politics Working Group in the Fall of
			2014.  The intent of the group is to bring together scholars, filmmakers,
			writers, activists, artists, and other change-makers throughout the city
			to share their works in progress, develop new ideas, and foster stronger
			collaborations.  We aim to meet for lunch on the first Monday of each
			month.  Works in progress will be distributed the Wednesday prior to
			each meeting.</h4>
		<hr>	

		<h1>Upcomming Events<span class="view-all">View All</h1>
		<div class="initiatives row">
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
			<div class="col-md-6 col-lg-4">
					<div class="thumb-photo"></div>
					<h4>Urban Humanites and Teir Publics</h4>
					As our planet grows more urban by the day, the need to understand the
					histories, representations, interpretations, physical designs, and
					experiences of city life grows ever more critical.
					Humanities scholars have become major caretakers of this important
					direction in knowledge-production, offering new opportunities for idea
					exchange across disciplines, reconceptions of how we talk about the
					urban, and fresh terminology for understanding processes of
					urbanization.
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
		</div>


		<h1>Past Events<span class="view-all">View All</span></h1>
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
    </div>

		<h1>Articles &amp; Media<span class="view-all">View All</span></h1>
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
    </div>

		<h1>Resources &amp; References<span class="view-all">View All</span></h1>
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="thumb-photo"></div>
				<h4>Democratzing the Green City</h4>
				Everyone agrees that our future lies in cities and that these cities
				need to be greener and more sustainable. But zoom in on any given
				project and over and over the same problem presents itself: too often
				green progress reinforces social inequality. Greening an area—either by
				reducing pollution or increasing livability—raises a place’s economic
				value; those who cannot afford to stay find themselves forced out.
				<div></div>
			</div>
    </div>


		<?php endif; ?>

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<div class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #main -->

    </div>

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
