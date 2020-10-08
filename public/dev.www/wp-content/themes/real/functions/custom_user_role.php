<?php
/* news_author の場合は 「ニュース」と「ベルナベウLIVE」のみ投稿可能 */
if ( is_user_logged_in() && current_user_can('news_editer')) {
    function mytheme_remove_item( $wp_admin_bar ) {
//      print_r($wp_admin_bar);
        $wp_admin_bar->remove_node('comments'); // 管理バーのコメント
        $wp_admin_bar->remove_node('new-content'); // 管理バーの＋新規
        $wp_admin_bar->remove_node('wp-logo'); // W ロゴ
    }
    add_action( 'admin_bar_menu', 'mytheme_remove_item',1000);
}
function remove_menus () {
    if (current_user_can('news_editer')) {
        global $menu;
        unset($menu[5]);//投稿
        unset($menu[8]);//ツイートまとめ
        unset($menu[9]);//試合詳細
        unset($menu[20]);//固定ページ
        unset($menu[25]);//コメント
        unset($menu[26]);//TablePress
        unset($menu[75]);//ツール
        unset($menu[80]);//設定
        
        unset($menu[555555]);//Forums
        unset($menu[555556]);//Topics
        unset($menu[555557]);//Replies
        unset($menu[555558]);//スペースバー
        
//        print_r($menu);
    }
}
add_action('admin_menu', 'remove_menus',1000);

/* ソーシャルユーザーはwp-adminのプロフィールのみ参照可能 */
function my_restrict_admin(){
	global $user_level;
	if (  $user_level < 2 ){// ユーザ レベル 2 未満の場合リダイレクト
	
//		print_r($_SERVER);
//		exit;
		if ( '/wp-admin/index.php' == $_SERVER['SCRIPT_NAME'] ) {
			wp_redirect( admin_url( 'profile.php' ) );
			exit;
		}
		if ( '/wp-admin/profile.php' != $_SERVER['SCRIPT_NAME'] ) {
			wp_redirect('/');
			exit;
		}
	}
}
add_action( 'admin_init', 'my_restrict_admin', 1 );
/*****************************************************
    ユーザー一覧に表示フィールドを追加する
*****************************************************/
add_action('manage_users_columns','manage_users_columns');
add_action('manage_users_custom_column','custom_manage_users_custom_column',10,3);
function manage_users_columns($column_headers) {
	unset($column_headers['name']);
	$column_headers['ID'] = 'ID';
    $column_headers['user_registered'] = '登録日時';
	$column_headers['display_name'] = 'ニックネーム';
	$column_headers['_uniqid'] = 'UNIQID';
	return $column_headers;
}
function custom_manage_users_custom_column($custom_column, $column_name, $user_id) {
	$user_info = get_userdata($user_id);
	if ($column_name=='user_registered'){
		${$column_name} = $user_info->$column_name;
		${$column_name} = date( "Y-m-d H:i:s" , strtotime( ${$column_name} )+ 32400 );
	}else{
		${$column_name} = $user_info->$column_name;
	}
	$custom_column = "\t".${$column_name}."\n";
	return $custom_column;
}
#列にソート（並べ替え）機能を実装する
add_action('manage_users_sortable_columns', 'register_users_sortable_columns');
function register_users_sortable_columns( $columns ){
    $columns['username'] = 'login';
    $columns['name'] = 'name';
    $columns['ID'] = 'id';
    $columns['display_name'] = 'display_name';
    $columns['_uniqid'] = '_uniqid';
    $columns['user_registered'] = 'user_registered';
    return $columns;
}