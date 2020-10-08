<?php
//smapro autologin
//print_r($_SERVER);
if(isset($_SERVER['HTTP_X_SMAPRO_UID'])) {
	$username = $_SERVER['HTTP_X_SMAPRO_UID'];
	if( is_user_logged_in() ) {
		$user = wp_get_current_user();
//		print_r($user);
	}
	else if ( ($user = get_user_by('login', $username))!==false ) {
//		print_r("status:2");
		wp_set_auth_cookie($user->get('ID'), true);
	}
	else {
//		print_r("status:3");
		$user_id=wp_create_user($username, NULL, $email = '');
		$user = get_user_by('login', $username);
		wp_set_auth_cookie($user_id, true);
//		print_r("user_id:".$user_id);
	}
}

