<?php
if(isset($_SERVER['HTTP_X_SMAPRO_UID'])) {
	$username = $_SERVER['HTTP_X_SMAPRO_UID'];
	if( $user = wp_get_current_user() ) {
	}
	else if ( $user = get_user_by('login', $username) ) {
		wp_set_auth_cookie($user->get('ID'), true);
	}
	else {
		$user_id=wp_create_user($username, $password, $email = '');
		$user = get_user_by('login', $username);
		wp_set_auth_cookie($user_id, true);
	}
}
?>