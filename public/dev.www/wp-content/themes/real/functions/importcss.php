<?php
function wp_custom_admin_css() {
	// /wp-content/themes/inter
   $css = get_stylesheet_directory_uri().'/css/admin.css';
   echo "<link rel='stylesheet' id='wpmp-admin-custom-css'  href='".$css."?ver=20131223' type='text/css' media='all' />";
}
add_action( 'admin_head', 'wp_custom_admin_css', 100);