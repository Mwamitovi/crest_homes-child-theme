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

        // Define <li> element and remove class (only homepage)
        const removeClassFromList = $(`
            .home .inside-header .main-navigation .main-nav ul li
        `).removeClass("current-menu-item");

        // returns nth <li> element and adds class (only homepage)
        function addClassToItem(child) {
            return $(`
                .home .inside-header .main-navigation .main-nav ul li:nth-child(${child})
            `).addClass("current-menu-item");
        };
      
        
        if ($( this ).scrollTop() > 800 && $( this ).scrollTop() < 1600) {
          
            removeClassFromList;        
            addClassToItem(2);
          
        } else if ($( this ).scrollTop() > 1600 && $( this ).scrollTop() < 2400) {
          
            removeClassFromList;
            addClassToItem(3);

        } else if ($( this ).scrollTop() > 2400) {
              
            removeClassFromList;
            addClassToItem(4);
                        
        } else {

            removeClassFromList;        
            $('.home .inside-header .main-navigation .main-nav ul li:first-child')
             .addClass("current-menu-item");
    	};
      
    });

    /**
     * Highlight "Our Homes" on product pages
     */
    $('.woocommerce .inside-header .main-navigation .main-nav ul li:nth-child(3)')
        .addClass("current-menu-item");
  
});
