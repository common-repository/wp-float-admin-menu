<?php
/*
*  wp_float_admin_menu
*
*  @description: Class
*  @since: 1.2.0
*  @created: 25/06/2014
*/

if( !class_exists('wp_float_admin_menu') ){

class wp_float_admin_menu
{
  

  function __construct()
  {
    global $pagenow;
     //action
    add_action("admin_menu", array($this,'wpfam_admin_menu'));
    add_action("init", array($this,"wpfam_dashboard_init")); 
    add_action("admin_init", array($this,"wpfam_forbidden_check")); 
    //add_action('plugins_loaded', array($this,'forbidden_check'));  
    // filters
    add_filter( 'show_admin_bar' , array($this, 'wpfam_function_admin_bar'));
    add_action( 'admin_enqueue_scripts', array($this, 'wpfam_admin_enqueue' ));    
    
  }

  function wpfam_forbidden_check(){
    if ( !function_exists( 'add_action' ) ){
    header( 'HTTP/0.9 403 Forbidden' );
    header( 'HTTP/1.0 403 Forbidden' );
    header( 'HTTP/1.1 403 Forbidden' );
    header( 'Status: 403 Forbidden' );
    header( 'Connection: Close' );
    exit();
    }
  }

  function wpfam_dashboard_init() {
    $plugin_dir = basename(dirname(__FILE__));
    load_plugin_textdomain( 'wp-float-admin-menu', null, $plugin_dir.'/languages/' );
  }


  function wpfam_update_message($message="Updated"){ 
    $echo =  "<div id='message' class='updated'><p>$message</p></div>";
    return $echo;
  }

  function wpfam_error_message($message="Error"){ 
    $echo =  "<div id='message' class='error'><p>$message</p></div>";
    return $echo;
  }

  function wpfam_admin_menu()
  {
   global $wpfam_sub_menu_option;
    //$wpfam_sub_menu_option = 
    add_submenu_page(
                         'themes.php', 
                         'WP float menu', 
                         'WP float menu', 
                         '10', 
                         'wp-float-menu', 
                         array($this, 'wpfam_menu'));
     //add_action("load-$wpfam_sub_menu_option", array($this, "wpfam_screen_options"));
  }

  function wpfam_menu(){  ?>
   <div class="wrap">
      <?php echo screen_icon(); ?><div id="icon-tools" class="icon32"></div>    
     <h2><?php _e("WP FLOAT ADMIN MENU"); ?></h2>
   <?php //print_r($wpfuploads); ?>

  <div id="poststuff">
    <div id="post-body">

      <div class="postbox">
       <h3><label for="title">Quick Start Guide</label></h3>
       <div class="inside"  style="overflow-y:hidden">
        <ol>
          <li>This is a nice clean wide screen. Without the fixed menu your admin looks less cluttered</li>
          <li>This plugin is still under development and more releases are scheduled</li>
          <li>This plugin is compatible with the <a href="http://wordpress.local.com/wp-admin/profile.php">admin color theme</a>.</li>        
          <li>Report any bug via twitter or wordpress plugin site.</li>
        </ol>
        <p>Please <a href="http://wordpress.org/support/view/plugin-reviews/wp-float-admin-menu?rate=5#postform" target=_blank >rate</a> this plugin.&nbsp;&nbsp;
         Helps if you follow my sponsors: 
         &nbsp;&nbsp;<a href="https://twitter.com/sprintexperts1" class="twitter-follow-button" data-show-count="false" data-lang="en" data-size="small">Follow @sprintexperts1</a>
         &nbsp;&nbsp;You can follow me :     
         <a href="https://twitter.com/olaapata" class="twitter-follow-button" data-show-count="false" data-lang="en" data-size="medium">Follow @olaapata</a>
         </p>
         <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
       </div>
      </div>
    </div>
  <?php   } 

  function wpfam_function_admin_bar(){ return false; }

  function wpfam_admin_enqueue($hook) {
    wp_register_script('wpfam-main-js', plugins_url('wp-float-admin-menu/src/js/wp-float-admin-menu.js'));
    wp_register_style('wpfam-main-css', plugins_url('wp-float-admin-menu/src/css/wp-float-admin-menu.css'));
    wp_enqueue_style( 'wpfam-main-css');
    wp_enqueue_script( 'wpfam-main-js');
  }

 }//end class

}//end if



?>