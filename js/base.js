jQuery(document).ready(function( $ ){

	/**
   * Header changes onScroll
	 */
	$( window ).scroll(function() {
      
		if ($( this ).scrollTop() > 100) {
      
      // handle header changes onScroll
  		$('.site-header .inside-header')
        .css("background-color", "#ffffff")
        .css("padding", "8.5px 60px")
        .css("transition","0.3s ease-in-out ")
    	  .css("box-shadow", "0px 2px 4px -1px rgba(0,0,0,0.2), 0px 4px 5px 0px rgba(0,0,0,0.14), 0px 1px 10px 0px rgba(0,0,0,0.12)"); 
          
      $('.site-header .header-image')
    	  .css("width", "160px")
        .css("transition","0.3s ease-in-out ");
    
      $('.inside-header .main-navigation li:not(:last-child)')
        .css("margin-right", "60px")
        .css("transition","0.3s ease-in-out ");
    
      $('.inside-header .main-navigation a')
        .css("font-size", "21px")
        .css("transition","0.3s ease-in-out ");           
    
      // handle icons to disappear on-scroll
    	$('.ch-social-icons')
  		  .css("position", "relative")
    	  .css("z-index", "0");
          
    } else {
  		$('.site-header .inside-header')
        .css("background-color", "transparent")
        .css("padding", "22.5px 60px")
        .css("transition","0.3s ease-in-out ")
        .css("box-shadow", "none");
          
      $('.site-header .header-image')
    	  .css("width", "220px")
        .css("transition","0.3s ease-in-out ");
          
      $('.inside-header .main-navigation li:not(:last-child)')
        .css("margin-right", "36.5px")
        .css("transition","0.3s ease-in-out ");
          
      $('.inside-header .main-navigation a')
        .css("font-size", "25px")
        .css("transition","0.3s ease-in-out ");
          
      $('.ch-social-icons')
  		  .css("position", "relative")
    	  .css("z-index", "1");
    };
      
        
    if ($( this ).scrollTop() > 800 && $( this ).scrollTop() < 1600) {
      
      $('.inside-header .main-navigation .main-nav ul li')
        .removeClass("current-menu-item");

      $('.inside-header .main-navigation .main-nav ul li:nth-child(2)')
        .addClass("current-menu-item");
      
    } else if ($( this ).scrollTop() > 1600 && $( this ).scrollTop() < 2400) {
      
      $('.inside-header .main-navigation .main-nav ul li')
        .removeClass("current-menu-item");

      $('.inside-header .main-navigation .main-nav ul li:nth-child(3)')
        .addClass("current-menu-item");

    } else if ($( this ).scrollTop() > 2400) {
          
      $('.inside-header .main-navigation .main-nav ul li')
        .removeClass("current-menu-item");

      $('.inside-header .main-navigation .main-nav ul li:nth-child(4)')
        .addClass("current-menu-item");
                    
    } else {
      $('.inside-header .main-navigation .main-nav ul li')
        .removeClass("current-menu-item");
    
      $('.inside-header .main-navigation .main-nav ul li:first-child')
        .addClass("current-menu-item");
		};
      
  });
  
});
