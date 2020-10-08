<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

//automatic_feed_links();
add_theme_support( 'automatic-feed-links' );

// tablepressの編集可能ボタンを非表示
add_filter( 'tablepress_edit_link_below_table', '__return_false' );

// Hide upgrade notice.
add_filter( 'pre_site_transient_update_core', '__return_zero' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));
	
/*
// disable default wpautop filter
remove_filter('the_content','wpautop');
remove_filter('the_excerpt','wpautop');
*/
/*
function add_iframe($initArray) {
$initArray[ 'extended_valid_elements' ] = "opta[*]";
return $initArray;
}

add_filter('tiny_mce_before_init', 'add_iframe', 10000);
*/
/*
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
*/

