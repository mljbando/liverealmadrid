<?php
/**
 * This function determines whether buttons will be displayed.
 *
 * @param boolean $display If true, buttons will be display
 * @param string $context 'login' or 'register'.
 * @return boolean Don't forget to return true or false.
 */
function _my_login_button_condition($display, $context){
    // Use switch statement is good practice.
    // Because $context may got more options.
    switch($context){
        case 'register':
            // You don't like to display on registeration.
            return false;
            break;
        default:
            // Otherwise, returns as it is.
            return $display;
            break;
    }
}
//Add filter on display condition of buttons
//You will get 2 arguments, the 1st is display flag and another is context string.
add_filter('gianism_show_button_on_login', '_my_login_button_condition', 10, 2);
/**
 * Facebookボタンをこのようにカスタマイズできます。 *
 * @param string $markup
 * @param string $link
 * @param string $title
 */
function _my_login_link_facebook($markup, $link, $title){
    return '<a class="my_fb_link" href="'.$link.'">'.$title.'</a>';
}
// Add filter.
add_filter('gianism_link_facebook', '_my_login_link_facebook', 10, 3);
/**
 * Facebookボタンをこのようにカスタマイズできます。 *
 * @param string $markup
 * @param string $link
 * @param string $title
 */
function _my_login_link_twitter($markup, $link, $title){
    return '<a class="my_tw_link" href="'.$link.'">'.$title.'</a>';
}
// Add filter.
add_filter('gianism_link_twitter', '_my_login_link_twitter', 10, 3);


/**
 * Customize redirect URL
 * @param string $url if not specified, null will be passed.
 * @return string URL string to redirect to. Null is no-redirect.
 */
function _my_redirect_to($url){
    //これでリダイレクトURLが取得できます
    //指定されていなければ$urlはNULLです。
//    print_r($url);
//    exit();
//    return home_url();
    return $url;
}
// Add filter.
add_filter('gianism_redirect_to', '_my_redirect_to');
/**
 * is_login_social
 * ソーシャルユーザーでログイン中か
 * @return bool
 */
function is_login_social() {
    $user = wp_get_current_user();
    if ( is_user_logged_in() && in_array( 'social', $user->roles ) ) {
        return true;
    }
    return false;
}
function gianism_user_profile() {
    remove_all_actions( 'gianism_user_profile', 1 );
}
add_action( 'gianism_user_profile', 'gianism_user_profile', 1 );
/**
 * get_social_avatar
 * ソーシャルログインユーザー用アバター画像
 * @param string $img イメージタグ
 * @param string $id_or_email ユーザーIDもしくはEメールアドレス
 * @param numeric $size 画像サイズ
 * @param string $default デフォルト画像URL
 * @param string $atl alt
 * @return string イメージタグ
 */
function get_social_avatar( $img, $id_or_email, $size, $default, $alt ) {
	if(isset($id_or_email->user_id)){
		$_wpg_facebook_id = get_the_author_meta( '_wpg_facebook_id', $id_or_email->user_id );
		$_wpg_twitter_screen_name = get_the_author_meta( '_wpg_twitter_screen_name', $id_or_email->user_id );
		// Facebookのとき
		if ( $_wpg_facebook_id ) {
			$img = '<img src="https://graph.facebook.com/' . esc_attr( $_wpg_facebook_id ) . '/picture?type=square" alt="'.esc_attr( $alt ).'" width="'. esc_attr( $size ).'" height="'.esc_attr( $size ).'" class="avatar photo" />';
		}
		// Twitterのとき
		elseif ( $_wpg_twitter_screen_name ) {
			if ( false === ( $profile_image_url = get_transient( 'twitter_avatar_' . $_wpg_twitter_screen_name ) ) ) {
				if ( class_exists( 'Twitter_Controller' ) ) {
					$wp_gianism_option = get_option( 'wp_gianism_option' );
					$Twitter_Controller = new Twitter_Controller( array(
						"tw_screen_name" => $id_or_email,
						"tw_consumer_key" => $wp_gianism_option['tw_consumer_key'],
						"tw_consumer_secret" => $wp_gianism_option['tw_consumer_secret'],
						"tw_access_token" => $wp_gianism_option['tw_access_token'],
						"tw_access_token_secret" => $wp_gianism_option['tw_access_token_secret'],
					) );
					$t = $Twitter_Controller->request( 'users/show', array(
						'screen_name' => $_wpg_twitter_screen_name
					) );
				} else {
					$twitter = \Gianism\Service\Twitter::get_instance();
					$t = $twitter->call_api( 'users/show', array(
						'screen_name' => $_wpg_twitter_screen_name
					) );
				}
				$profile_image_url = $t->profile_image_url;
				set_transient( 'twitter_avatar_' . $_wpg_twitter_screen_name, $profile_image_url, 60 * 60 * 1 );
			}
			if ( $profile_image_url ) {
				$img = '<img src="' . esc_url( $profile_image_url ) . '" alt="' . esc_attr( $alt ) .'" width="' . esc_attr( $size ) .'" height="' . esc_attr( $size ) . '" class="avatar photo" />';
			}
		}
	}
	return $img;
}
add_filter( 'get_avatar', 'get_social_avatar', 10, 5 );