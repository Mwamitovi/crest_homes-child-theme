jQuery(document).ready(function( $ ){

	/**
     * Header changes onScroll
	 */
	$( window ).scroll(function() {

        // define various header elements
        const header = `
            .site-header   .inside-header, 
            .inside-header .site-logo .header-image,
            .inside-header .main-navigation li:not(:last-child),
            .inside-header .main-navigation a
        `;

        // define social-icon elements
        const socialIcons = `
            .ch-social-icons
        `;

        // define mobile-menu element
        const menuIcon = `
            #rmp_menu_trigger-617
        `;
          
    	if ($( this ).scrollTop() > 100) {
          
            // handle header changes onScroll
      		$(header).addClass('scroll');        
        
            // handle icons to disappear onScroll
        	$(socialIcons).addClass('scroll');

            // handle menu-icon to move onScroll
            $(menuIcon).addClass('scroll');
              
        } else {

      		$(header).removeClass('scroll');

            $(socialIcons).removeClass('scroll');
            
            $(menuIcon).removeClass('scroll');
        };
      
    });

    /**
     * Highlight "Our Homes" on product pages
     */
    $('.woocommerce .inside-header .main-navigation .main-nav ul li:nth-child(3)')
        .addClass("current-menu-item");

    /**
     * Link to Whatsapp
     */
    $('#whatsapp').on('click', function() { 
        window.open(
            'https://api.whatsapp.com/send?phone=256759906350&amp;text=I-am-interested-in-booking-a-home',
            '_blank'
        )
    });
  
});
