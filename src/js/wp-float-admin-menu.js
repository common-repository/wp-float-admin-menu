    $ = jQuery;  
    $(document).ready(function(){
      //$(document).bind('ready',function(){

      $("li#wp-admin-bar-menu-toggle").unbind( "click" );

      var hh = $('#postimagediv .inside ').html();
      
      var new_admin_menu = '<li id="wp-admin-bar-float-menu" class="menupop wpfam_icon_menu_up"><a class="ab-item" aria-haspopup="false" href="">Expand Menu</a></li>';
      
        $('ul#wp-admin-bar-root-default').prepend(new_admin_menu);

        $('#wp-admin-bar-wp-logo').show(); 
       	$('#wp-admin-bar-site-name').show(); 
       	$('#wp-admin-bar-comments').show(); 
       	$('#wp-admin-bar-new-content').show(); 


        $("#wpfam_field_logo").click(function() {
        $('#wp-admin-bar-wp-logo').hide();
        });

        $("#wpfam_field_name").click(function() {
         $('#wp-admin-bar-site-name').hide();
        });

        $("#wpfam_field_comment").click(function() {
        $('#wp-admin-bar-comments').hide();
        });

        $("#wpfam_field_content").click(function() {
        $('#wp-admin-bar-new-content').hide();
        });


       $("wp-responsive-open #adminmenuback, .wpfam_icon_menu_up, #adminmenuwrap, a.ab-item.wpfam_style_img").mouseover(function() {
           var pos = $('#wp-admin-bar-float-menu').position();
           $('#adminmenuwrap').fadeIn('fast');  
       });

       $("wp-responsive-open #adminmenuback, .wpfam_icon_menu_up, #adminmenuwrap, a.ab-item.wpfam_style_img").mouseleave(function() {
           $('#adminmenuwrap').hide();  
       });

       $(".wpfam_icon_menu_up").mousemove(function( event ) {        
             if(event.pageY > 25){
         	   $( ".wpfam_icon_menu_up").unbind( "mouseleave" );
             }else{         
                $(".wpfam_icon_menu_up").mouseleave(function() {
                $('#adminmenuwrap').hide();});
             }

        });
       
        
        $("li#wp-admin-bar-menu-toggle .ab-item .ab-icon").unbind( "click" );


       $("li#wp-admin-bar-menu-toggle .ab-item .ab-icon").mouseover(function() {
           var pos = $('#wp-admin-bar-float-menu').position();
           $('#adminmenuwrap').fadeIn('fast'); 
           $('#adminmenuback').hide();   
       });

       $("li#wp-admin-bar-menu-toggle .ab-item .ab-icon").mouseleave(function() {
           $('#adminmenuwrap').hide();  
           $('#adminmenuback').hide();  
       });

           $('#adminmenuback').hide();
           $('#adminmenuwrap').hide();  
           


        
    });	

