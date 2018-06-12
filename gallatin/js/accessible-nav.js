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
            navToggle: '#GN-toggle-left-nav',

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



})(jQuery);














        
