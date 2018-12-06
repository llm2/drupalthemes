<div class="wrapper" id="wrapper-footer">

	<footer class="site-footer" id="colophon">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-6 mb-3">
				<div class="row">
					<div class="col-sm-6">
					<div><h6 class="text-uppercase mb-md-1">Navigation</h6></div>

						<?php
							if( has_nav_menu( 'footer' ) ) {
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'container' => false,
									'depth' => -1,
									'menu_class' => 'list-unstyled',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
								) );
							}
						?>
					</div><!--col end -->
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-12 mb-2">
								<div><h6 class="text-uppercase mb-md-1">Social</h6></div>
									<?php
										if( has_nav_menu( 'social' ) ) {
											wp_nav_menu( array(
												'theme_location' => 'social',
												'container' => false,
												'depth' => -1,
												'menu_id' => 'social-menu',
												'menu_class' => 'list-unstyled',
												'walker'          => new WP_Bootstrap_Navwalker(),
												'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
											) );
										}
									?>
							</div><!--col end -->
							<div class="col-sm-12 color-secondary">
								<div><h6 class="text-uppercase mb-md-1">Contact Us</h6></div>
								<div>
									<h5>Urban Democracy Lab<br>
									NYU Gallatin<br>
									1 Washington Place<br>
									5th Floor<br>
									New York, NY 10003<br>
									urbandemos@nyu.edu<br></h5>
								</div>
							</div><!--col end -->
						</div><!--row end -->
					</div><!--col end -->
				</div><!--row end -->
			</div><!--col end -->

			<div class="col-md-12 col-lg-5 offset-lg-1">
					<div><h6 class="text-uppercase mb-md-1">Mailing List</h6></div>
					<div id="contact-sign-up">
<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://nyu.us8.list-manage.com/subscribe/post?u=d7e07141852d3e3ca4d58dd74&amp;id=3fd9ae4619" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
	<label for="mce-EMAIL" style="color:#000;">Subscribe to our mailing list</label>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d7e07141852d3e3ca4d58dd74_3fd9ae4619" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->
					</div>
			</div>

		</div><!-- row end -->

		<div class="row mt-1">
			<div class="col-md-12">
					<div>
						<?php
						if( has_nav_menu( 'legal' ) ) {
							wp_nav_menu( array(
								'theme_location' => 'legal',
								'container' => false,
								'depth' => -1,
								'menu_class' => 'list-unstyled',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
							) );
						}
						?>
						<h5 class="copyright mb-1">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?></h5>
					</div>
			</div>
		</div><!-- row end -->

	</div><!-- container end -->

</footer><!-- #colophon -->

</div><!-- wrapper end -->

</main><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<!-- JS FOR GLOBAL NAV -->

<link rel="stylesheet" href="//globalnav.digicomm.home.nyu.edu/v2.1.0/global-nav.css">
<script src="//globalnav.digicomm.home.nyu.edu/v2.1.0/global-nav.js"></script>
<script type="text/javascript">globalNavObject || document.write("<script type='text/javascript' src='//www.nyu.edu/globalnav/v2.1.0/global-nav.js'>\x3C/script>")</script>
<script>
document.addEventListener('DOMContentLoaded', function(event) {
  globalNavObject.init({
    homepage: '//gallatin.nyu.edu',
    logoPathDesktop: '///s3.amazonaws.com/nyu.edu/logos/gallatin.svg',
    logoPathMobile: '//s3.amazonaws.com/nyu.edu/logos/gallatin-small.svg',
    logoAlt: 'NYU Gallatin School of Individualized Study',
    searchDomain: '//urbandemos.nyu.edu/',
    searchFormMethod: 'GET',
    searchInputName: '?s',
    searchPlaceholder: 'Search Urban Democracy Lab',
    searchEnabled: true,
    breakPoints: {
      desktop: 1140,
      tablet: 960,
      phone: 480
    },
    isResponsive: true,
    el: 'GN-container'
    // isFullWidth: false,
    // localNavFunc: "toggleSchoolNav",
      // showLocalNavAlways: true
  });
});
</script>

<script>
  $(document).ready(function () {
    const $skipMain = $('#skip-aside');
    if ($skipMain.length > 0) {
      $skipMain.prependTo($(document.body));
    }

    $('#GN-accordion').attr('aria-label', 'NYU Shared Navigation Bar');

    $('#GN-banner').attr('aria-label', 'NYU Shared Navigation Banner');

    $('#GN-search-form-desktop').attr('aria-label', 'NYU Shared Navigation Search Form for Desktop');

    $('#GN-search-form').attr('aria-label', 'NYU Shared Navigation Search Form');

    $('button[type="button"]').removeAttr('type');
  });
</script>

</body>

</html>
