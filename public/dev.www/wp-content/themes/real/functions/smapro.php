<?php
add_action('init', 'smapro_autologin', 10);
//smapro autologin
//print_r($_SERVER);
function smapro_autologin() {
	if(isset($_SERVER['HTTP_X_SMAPRO_UID'])) {
		$user_name_hash='';
		$user_name = $_SERVER['HTTP_X_SMAPRO_UID'];
		if(!empty($user_name)) $user_name_hash = sha1(sanitize_user($user_name));
		if( is_user_logged_in() ) {
			$user = wp_get_current_user();
//			print_r($user);
//			print_r(the_author_meta('_uniqid', $user->ID));
		}
		else if ( ($user = get_user_by('login', $user_name_hash))!==false ) {
//			print_r("status:2");
			wp_set_auth_cookie($user->get('ID'), true);
		}
		else {
			if(!username_exists($safe_name)){
				global $wpdb;
		//		print_r("status:3");
				$user_id=wp_create_user($user_name_hash, wp_generate_password(), $email = $user_name."@mobilephone.com");
				if( is_wp_error($user_id) ){
					throw new \Exception($this->registration_error_string());
				}
				$default_nickname='>名称未設定';
				$wpdb->update(
						$wpdb->users,
						array('display_name' => $default_nickname),
						array('ID' => $user_id),
						array('%s', '%s'),
						array('%d')
					);
				update_user_meta($user_id, 'nickname', $default_nickname);
				// wpのuser_idをuidでsaltして値を生成
				update_user_meta($user_id, '_uniqid', crypt($user_id,$user_name));
			}
			$user = get_user_by('login', $user_name_hash);
			wp_set_auth_cookie($user_id, true);
	//		print_r("user_id:".$user_id);
		}
	}
}