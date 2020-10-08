<?php
function remove_admin_menus() {
	global $menu;
	unset($menu[2]);	// ダッシュボード
	unset($menu[3]);	// ?
	unset($menu[4]);	// ?
	unset($menu[5]);	// 投稿
//	unset($menu[6]);	// ニュース
//	unset($menu[7]);	// ベルナベウLIVE
//	unset($menu[8]);	// 試合情報
	unset($menu[9]);	// ツィートまとめ
//	unset($menu[10]);	// メディア
	unset($menu[11]);	// gol
	unset($menu[25]);	// コメント
	unset($menu[26]);	// 試合ハイライト映像
}
add_action('admin_menu', 'remove_admin_menus');