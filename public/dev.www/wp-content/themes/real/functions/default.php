<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
/* 定義設定 */
add_action( 'init', 'constructor_define' );
function constructor_define(){
	// 以前作成したテーマのせいでCOMMONTEMPLATEPATHが徘徊してるため
	if ( !defined('COMMONTEMPLATEPATH') ) define('COMMONTEMPLATEPATH', TEMPLATEPATH);
}
//automatic_feed_links();
//add_theme_support( 'automatic-feed-links' );
// Wordpressのバージョンアップ情報を隠す
//add_filter( 'pre_site_transient_update_core', '__return_zero' );
//	// ガラケー用サムネイル画像
//	set_post_thumbnail_size( 80, 60, true );
//	add_image_size( 'fp-thumbnail', 80, 60, true );
if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));
}
/* ここから <p>タグとエディタ関連 */
//	disable default wpautop filter
//	remove_filter('the_content','wpautop');
//	remove_filter('the_excerpt','wpautop');
//	if(false){
	if ( !function_exists('pnd_allow_all_attr') ) {
		function pnd_allow_all_attr ($init) {
			$ext_elements = '';
			$target_elements = array(
			'a', 'b', 'base', 'big', 'blockquote', 'body', 'br', 'caption', 'dd', 'div', 'dl',
			'dt', 'em', 'embed', 'font', 'form', 'h', 'head',  'hr', 'html', 'i', 'img', 'input',
			'li', 'link', 'meta', 'nobr', 'noembed', 'object', 'ol', 'opta','option', 'p', 'pre', 's',
			'script', 'select', 'small',  'span', 'strike', 'strong', 'sub', 'sup', 'table',
			'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'title', 'tr', 'tt', 'u', 'ul',
			'iframe','opta'
			);
			$target_attr = array(
				'*'
			);
			foreach ($target_elements as $target_element) {
				$ext_elements .= ",".$target_element."[".implode('|',$target_attr)."]";
			}
			if ( !empty($ext_elements) ) {
				if ( !empty($init['extended_valid_elements']) )
					$init['extended_valid_elements'] .= $ext_elements;
				else
					$init['extended_valid_elements'] = trim($ext_elements, ',');
			}
			return $init;
		}
		add_filter( 'tiny_mce_before_init', 'pnd_allow_all_attr', 100 );
	}
/* ここからタクソノミ―指定のアーカイブ設定 */
	add_filter( 'getarchives_join', 'my_getarchives_join', 10, 2 );
	function my_getarchives_join( $join, $r ) {
	  global $wpdb;
	  if ( isset( $r['taxonomy'] ) ) {
	    $join .= " LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) ";
	    $join .= " LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) ";
	  }
	  return $join;
	}
	add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
	function my_getarchives_where( $where, $r ) {
	  global $wpdb;
	  if ( isset( $r['taxonomy'] ) ) {
	    $where .= $wpdb->prepare( " AND $wpdb->term_taxonomy.taxonomy = %s ", $r['taxonomy'] );
	  }
	  return $where;
	}
	function archive_link_for_taxonomy($url){
		global $post_type;
		if(!empty($post_type)){
			$url='/'.$post_type.$url;
		}
	  return $url;
	}
	add_filter('year_link', 'archive_link_for_taxonomy');
	add_filter('month_link', 'archive_link_for_taxonomy');
	add_filter('day_link', 'archive_link_for_taxonomy');