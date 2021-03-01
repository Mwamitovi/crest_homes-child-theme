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
          
    	if ($( this ).scrollTop() > 100) {
          
            // handle header changes onScroll
      		$(header).addClass('scroll');        
        
            // handle icons to disappear onScroll
        	$(socialIcons).addClass('scroll');
              
        } else {

      		$(header).removeClass('scroll');

            $(socialIcons).removeClass('scroll');
        };

        // Define <li> element and remove class
        const removeClassFromList = $(`
            .inside-header .main-navigation .main-nav ul li
        `).removeClass("current-menu-item");

        // returns nth <li> element and adds class
        function addClassToItem(child) {
            return $(`
                .inside-header .main-navigation .main-nav ul li:nth-child(${child})
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
            $('.inside-header .main-navigation .main-nav ul li:first-child')
             .addClass("current-menu-item");
    	};
      
    });
  
});
