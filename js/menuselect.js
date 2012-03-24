$(document).ready(function(){
    // Your code here
    $(".news_page_link").click(function(e){
        
        scrollToPage("#news_page");
        e.preventDefault();
    });
    
    $(".about_fac_link").click(function(e){
        scrollToPage("#about_fac_page");
       e.preventDefault();
         
    });
    
    $(".location_link").click(function(e){
        scrollToPage("#location_page");
        
       e.preventDefault();
       
    });
    
    $(".guestbook_link").click(function(e){
        scrollToPage("#guestbook_page");
        
    e.preventDefault();
          
    });
    
    $(".gallery_link").click(function(e){
        scrollToPage("#gallery_page");
          e.preventDefault();
    });
    $(".marquee_link").click(function(e){
        scrollToPage("#marquee_page");
          e.preventDefault();
    });
      $(".billboard_link").click(function(e){
        scrollToPage("#billboard_page");
          e.preventDefault();
    });

    $(window).scroll(function () { 
          
        var x_scroll = $(window).scrollTop(); 
        if(x_scroll<900 || x_scroll>6400){
            $("#small_menu_panel").fadeOut();            
        }else{
            $("#small_menu_panel").fadeIn();
        }
   
       
    });
   
    function scrollToPage(page){
      
        $('html,body').animate({
            scrollTop: $(page).offset().top
        },'slow');
        
        return false;
    }
});

