$(document).ready(function(){
    
    if ($(window).width()<1000){
        $(".responsive").css("display","block");
    }
    
  	$(".responsive").click(function(){
    	$(".responsive").toggle();
        $(".noResponsive").toggle();
        $(".menu").show();
  	});
    
  	$(".noResponsive").click(function(){
    	$(".responsive").toggle();
        $(".noResponsive").toggle();
        $(".menu").hide();
  	});   
    
    
    $("#cautare, .closeCautare").click(function(){
       $(".cauta").slideToggle(); 
    });
     
   
    
    

    $(window).scroll(function(){
            
        $(".more").click(function(){
            $(".header, .backHeader").css({
                "top":$(window).scrollTop()+40+"px",
                "position":"absolute"
            });
            
            $(".backHeader").css("opacity",".8");
        }); 

        
        if($(window).scrollTop()>50){
            $(".more").show();
        } else {
            $(".more").hide();
        }

        $(".header").css({
            "top":"40px",
            "position":"relative"
        });
        
        $(".backHeader").css({
            "top":"40px",
            "position":"absolute",
            "opacity":".6"
        });
        
    });
    

    
    
    $(window).resize(function() {
        if ($(window).width() > 1000) {
            $(".story .row .stire").insertAfter($(".story .row .movie"));
            $(".menu").show();
            $(".noRresponsive, .responsive").hide();
        } else {
            $(".story .row .stire").insertBefore($(".story .row .movie"));
            $(".menu, .noResponsive").hide();
            $(".responsive").show();
        }
    });
     
    
  
    
// DOSAR CU STIRE DEASUPRA, VIDEO DEDESUBT         
    ($(window).width() > 1000)?
    $(".story .row .stire").insertAfter($(".story .row .movie")):
    $(".story .row .stire").insertBefore($(".story .row .movie"));  
    
    
    
    
    

    
     
});
