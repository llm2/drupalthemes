<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $html_attributes:  String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: An array of attribute values for the HTML element.
 *   It is flattened into a string within the variable $html_attributes.
 * - $body_attributes:  String of attributes for the BODY element. It can be
 *   manipulated through the variable $body_attributes_array from preprocess
 *   functions.
 * - $body_attributes_array: An array of attribute values for the BODY element.
 *   It is flattened into a string within the variable $body_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup templates
 */
?><!DOCTYPE html>
<html<?php print $html_attributes;?><?php print $rdf_namespaces;?>>
<head>
  <link rel="profile" href="<?php print $grddl_profile; ?>" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php print $scripts; ?>

  <?php if(!user_is_logged_in()){ ?>
 <!-- JS FOR GLOBAL NAV -->
 <link rel="stylesheet" href="//globalnav.digicomm.home.nyu.edu/v2.1.0/global-nav.css">
 <link rel="icon" href="/common/images/favicon.ico" type="image/x-icon" /> 
<script src="//globalnav.digicomm.home.nyu.edu/v2.1.0/global-nav.js"></script>
        <script type="text/javascript">globalNavObject || document.write("<script type='text/javascript' src='//www.nyu.edu/globalnav/v2.1.0/global-nav.js'>\x3C/script>")</script>
        <script>
        document.addEventListener('DOMContentLoaded', function(event) {
          globalNavObject.init({
            homepage: '//gallatin.nyu.edu',
            logoPathDesktop: '///s3.amazonaws.com/nyu.edu/logos/gallatin.svg',
            logoPathMobile: '//s3.amazonaws.com/nyu.edu/logos/gallatin-small.svg',
            logoAlt: 'NYU Gallatin School of Individualized Study',
            searchDomain: '//gallatin.nyu.edu/utilities/search.html',
            searchFormMethod: 'GET',
            searchInputName: 'q',
            searchPlaceholder: 'SEARCH GALLATIN',
            searchEnabled: true,
            breakPoints: {
              desktop: 992,
              tablet: 768,
              phone: 290
            },
            isResponsive: true,
            el: 'GN-container'
            // isFullWidth: false,
            // localNavFunc: "toggleSchoolNav",
              // showLocalNavAlways: true
          });
        });
      </script>

      <?php } ?>

<style>
[class^="GN-"] :focus, [id^="GN-"] :focus {
    outline: none;
    box-shadow: inset 0 0 0 3px #e7e469;
}
</style>
</head>
<body<?php print $body_attributes; ?>>
<div role="complimentary">
  <a class="bypass-block" href="#main-nav" tabIndex="0" aria-label="Skip to Gallatin Navigation">Skip to Gallatin Navigation</a>
  <a class="bypass-block" href="#skipToContent" tabIndex="0" aria-label="Skip to Gallatin Main Content">Skip to Gallatin Main Content</a>
</div>
  <div id="GN-container"></div>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

<?php if(!user_is_logged_in()){ ?>
<script>
/* requires jQuery */

(function ($) {

'use strict';
        $(document).ready(function () {
            // initialize the megamenu
            $('.megamenu').accessibleMegaMenu();

            // hack so that the megamenu doesn't show flash of css animation after the page loads.
            setTimeout(function () {
                $('body').removeClass('init');
            }, 500);
        });



        $("nav:first").accessibleMegaMenu({

            /* Button that toggles navigation at mobile */
            navToggle: '',

            /* Id of navigation */
            navId: '#main-nav',

            /* mobile breakpoint in pixels that determines when the menu goes to mobile */
            mobileBreakpoint: '480',
            /* prefix for generated unique id attributes, which are required
               to indicate aria-owns, aria-controls and aria-labelledby */
            uuidPrefix: 'accessible-megamenu',

            /* css class used to define the megamenu styling */
            menuClass: 'nav-menu',

            /* css class for a top-level navigation item in the megamenu */
            topNavItemClass: 'nav-item',

            /* css class for a top-level icon in the megamenu (displayed at mobile) */
            topNavIconClass: '.icon',

            /* css class for a megamenu panel */
            panelClass: 'sub-nav',

            /* css class for a group of items within a megamenu panel */
            panelGroupClass: 'sub-nav-group',

            /* css class for the hover state */
            hoverClass: 'hover',

            /* css class for the focus state */
            focusClass: 'focus',

            /* css class for the open state */
            openClass: 'open'
        });
        $("aside:first").accessibleMegaMenu({

            /* Button that toggles navigation at mobile */
            navToggle: '',

            /* Id of navigation */
            navId: '#primary-mobile-nav',

            /* mobile breakpoint in pixels that determines when the menu goes to mobile */
            mobileBreakpoint: '290',
            /* prefix for generated unique id attributes, which are required
               to indicate aria-owns, aria-controls and aria-labelledby */
            uuidPrefix: 'accessible-megamenu',

            /* css class used to define the megamenu styling */
            menuClass: 'nav-menu',

            /* css class for a top-level navigation item in the megamenu */
            topNavItemClass: 'nav-item',

            /* css class for a top-level icon in the megamenu (displayed at mobile) */
            topNavIconClass: '.icon',

            /* css class for a megamenu panel */
            panelClass: 'sub-nav',

            /* css class for a group of items within a megamenu panel */
            panelGroupClass: 'sub-nav-group',

            /* css class for the hover state */
            hoverClass: 'hover',

            /* css class for the focus state */
            focusClass: 'focus',

            /* css class for the open state */
            openClass: 'open'
        });



})(jQuery);




    </script>
      <?php } ?>

</body>
</html>
