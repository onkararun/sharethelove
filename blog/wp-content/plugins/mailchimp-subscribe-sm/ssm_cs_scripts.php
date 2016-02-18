<?php

function smf_admin_scripts_add() {
	wp_enqueue_script('jquery');
	$screen = get_current_screen();
	if($screen->post_type === 'subscribe_me_forms') 
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'my-script-handle', plugins_url('/js/lpp_color_picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

add_action('admin_enqueue_scripts', 'smf_admin_scripts_add');


function msf_ajax_script(){
  
  	wp_enqueue_script('msf_ajax_script-1',plugins_url('/js/sm-ajax.js',__FILE__),array( 'jquery' ));

}

add_filter('init','msf_ajax_script');

?>