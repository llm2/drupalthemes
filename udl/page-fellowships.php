<?php /* Template Name: Fellowships */ ?>

<?php get_header(); ?>

<div class="wrapper" id="page-wrapper">
	<div class="container" id="content" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>

		<div class="row">
			<div class="col-md-12">
				<?php if ( $post->post_parent ) { ?>
				 <h3 class="sub-titles"><a href="<?php echo get_permalink( $post->post_parent ); ?>" >← <?php echo get_the_title( $post->post_parent ); ?></a></h3>
				<?php } ?>
				<h1 class="sub-titles"><?php the_title(); ?></h1><hr>
			</div>
			<div class="col-md-10 mt-3">
			<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- Container end -->

	<?php include get_stylesheet_directory().'/page-templates/page-block.php'; ?>

		<!-- <hr>
		<h1>A Two-Semester Program<hr class="two-hr"></h1>
		<div class="program row">
			<div class="col-md-4 col-lg-6" style="padding-right:150px;">
				<div class="border">
					<h4>Spring Semester</h4>
					Fellows are required to attend and participate actively in a two-credit
					seminar during which they will engage in background reading on their
					topics and study cities, review the ethical framework of
					community-engaged research, and learn research methods. The seminar will
					culminate in a required, week-to-week research plan devised in
					collaboration with partner organizations and faculty mentors.
				</div>
			</div>
			<div class="col-md-4 col-lg-6" style="padding-right:200px;">
				<div class="border">
					<h4>Summer Term</h4>
					Fellows must commit  up to 10 weeks of work on a summer project with a
					partnering community organization. This means living on-site for the
					entire fellowship period and devoting at least 20 hours per week to the
					organization. Note: The length of the summer research term is determined
					by the community partner and, in the case of research taking place in
					cities where NYU has a site, by the site’s summer calendar.<br>Fellows will
					be supported in their work by a supervisor at the organization, a local
					faculty mentor, and the fellowship coordinator. They are required to be
					accountable to each of these stakeholders through regular meetings, the
					successful completion of on-line assignments, and a pre-determined
					reporting schedule. When appropriate, all stakeholders will meet in
					person or via web conferencing at the midterm of the summer research
					period.
				</div>
			</div>
		</div>
		<hr>

		<div class="application row">
			<div class="col-lg-5">
					<h1>Application Procedures</h1>
					The program is open to all Gallatn students, undergraduate and M.A.
					students in Sociology and Social and Cultural Analysis, and M.A.-only
					students in Latn American Studies and Wagner. Students should have a
					clear academic focus on urbanism or urban studies. All fellows must
					plan to be in residence at NYU Washington Square in Spring 2017.<br>
					Te applicaton deadline is November 3, 2016.
			</div>
			<div class="area_desc col-5">
					<div class="box-sm"></div>
					<div class="box-sm"></div>
					Please note that advanced language profciency in Spanish for Madrid
					fellows is required and desirable for New York, Chicago, and Oakland
					sites. Bengali and Hindi language skills are encouraged for Kolkata,
					though also are not required.
			</div>
		</div>


	<div class="row">
		<div class="col-lg-5">
		   <h1>After reading about the program, interested students should:</h1>
		</div>
		<div class="col-lg-5">
			<span class="box-sm"></span>Go to the Gallatin Global Fellowship in Urban Practice
			Application form for specific instructions and requirements.<br>
			<span class="box-sm"></span>Commit to participate in all elements of the program as
			outlined above, including the spring seminar, summer research
			collaboration, and on-line component.<br>
			<span class="box-sm"></span><span class="gray-txt">Plan to attend one of the following Information Sessions
			(all locations are at 1 Washington Place):<br>
			Tursday, October 20, 12:30 PM – 2:00 PM – Room 620<br>
			Monday, October 24, 12:30 PM – 2:00 PM – Room 801<br>
			Friday, October 28, 2016, 2:00 PM – 3:00 PM – Room 620<br>
			For more informaton, check out our Frequently Asked Questons (FAQs) page
			or contact the Urban Democracy Lab at urbandemos@nyu.edu.</span>
		</div>
	</div> -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
