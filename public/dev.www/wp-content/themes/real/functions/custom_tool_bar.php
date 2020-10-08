<?php
//管理ツールバーにメニュー追加
function customize_admin_bar_menu($wp_admin_bar){
  //ニュースを追加
  $title = sprintf(
	'<span class="ab-label">%s</span>',
	'ニュース'//親メニューラベル
  );
  $wp_admin_bar->add_menu(array(
	'id'    => 'wp-admin-bar-new-news',
	'meta'  => array(),
	'title' => $title,
	'href'   => 'http://liverealmadrid-wp.appmlj.com/wp-admin/post-new.php?post_type=news'
	//'href'   => home_url('/wp-admin/post-new.php?post_type=news') // ページURL
  ));
  //試合情報を追加
  $title = sprintf(
	'<span class="ab-label">%s</span>',
	'試合情報'//親メニューラベル
  );
  $wp_admin_bar->add_menu(array(
	'id'    => 'wp-admin-bar-new-match',
	'meta'  => array(),
	'title' => $title,
	'href'   => 'http://liverealmadrid-wp.appmlj.com/wp-admin/edit.php?post_type=match'
	//'href'   => home_url('/wp-admin/edit.php?post_type=match') // ページURL
  ));
  //ベルナベウLIVE!を追加
  $title = sprintf(
	'<span class="ab-label">%s</span>',
	'ベルナベウLIVE!'//親メニューラベル
  );
  $wp_admin_bar->add_menu(array(
	'id'    => 'wp-admin-bar-new-bernabeu',
	'meta'  => array(),
	'title' => $title,
	'href'   => 'http://liverealmadrid-wp.appmlj.com/wp-admin/post-new.php?post_type=bernabeu'
	//'href'   => home_url('/wp-admin/post-new.php?post_type=bernabeu') // ページURL
  ));
  //試合日程を追加
  $title = sprintf(
	'<span class="ab-label">%s</span>',
	'試合日程'//親メニューラベル
  );
  $wp_admin_bar->add_menu(array(
	'id'    => 'toplevel_page_tablepress1',
	'meta'  => array(),
	'title' => $title,
	'href'   => home_url('/wp-admin/admin.php?page=tablepress&action=edit&table_id=2') // ページURL
	//'href'   => 'http://liverealmadrid-wp.appmlj.com/wp-admin/admin.php?page=tablepress&action=edit&table_id=2'
  ));
  //順位表を追加
  $title = sprintf(
	'<span class="ab-label">%s</span>',
	'順位表'//親メニューラベル
  );
  $wp_admin_bar->add_menu(array(
	'id'    => 'toplevel_page_tablepress2',
	'meta'  => array(),
	'title' => $title,
	//'href'   => home_url('/wp-admin/admin.php?page=tablepress&action=edit&table_id=1') // ページURL
	'href'   => 'http://liverealmadrid-wp.appmlj.com/wp-admin/admin.php?page=tablepress&action=edit&table_id=1'
  ));
  //UCL順位表を追加
  $title = sprintf(
	'<span class="ab-label">%s</span>',
	'UCL順位表'//親メニューラベル
  );
  $wp_admin_bar->add_menu(array(
	'id'    => 'toplevel_page_tablepress3',
	'meta'  => array(),
	'title' => $title,
	//'href'   => home_url('/wp-admin/admin.php?page=tablepress&action=edit&table_id=8') // ページURL
	'href'   => 'http://liverealmadrid-wp.appmlj.com/wp-admin/admin.php?page=tablepress&action=edit&table_id=10'
  ));
 //管理画面TOPを追加
  $title = sprintf(
	'<span class="ab-label">%s</span>',
	'管理画面TOP'//親メニューラベル
  );
  $wp_admin_bar->add_menu(array(
	'id'    => 'dashboard_menu',
	'meta'  => array(),
	'title' => $title,
	//'href'   => home_url('/wp-admin/') // ページURL
	'href'   => 'http://liverealmadrid-wp.appmlj.com/wp-admin'
  ));
}
add_action('admin_bar_menu', 'customize_admin_bar_menu', 9999);