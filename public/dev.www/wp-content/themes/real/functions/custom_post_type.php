<?php
add_theme_support('post-thumbnails');
/**
* Register Custom Post Types and Custom taxonomies.
*
* from Custom Post Type Generator Plugins.
*/

add_action( 'init', 'my_custom_post_types' );
function my_custom_post_types()
{
	$labels = array(
		'name' => 'カテゴリー',
		'singular_name' => 'カテゴリー',
		'search_items' => 'カテゴリーを検索',
		'popular_items' => '人気のカテゴリー',
		'all_items' => 'すべてのカテゴリー',
		'parent_item' => '親カテゴリー',
		'parent_item_colon' => '親カテゴリー',
		'edit_item' => 'カテゴリーの編集',
		'update_item' => 'カテゴリーを更新',
		'add_new_item' => '新規カテゴリーを追加',
		'new_item_name' => '新規カテゴリー名',
		'separate_items_with_commas' => 'カテゴリーが複数ある場合はコンマで区切ってください',
		'add_or_remove_items' => 'カテゴリーの追加もしくは削除',
		'choose_from_most_used' => 'よく使われているカテゴリーから選択',
	);
	$args = array(
		'labels' => $labels,
		'show_ui' => true,
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'news_category' ),
		'query_var' => true,
	);
	register_taxonomy( 'news_category', array( 'news' ) , $args );
	$labels = array(
		'name' => 'カテゴリー',
		'singular_name' => 'カテゴリー',
		'search_items' => 'カテゴリーを検索',
		'popular_items' => '人気のカテゴリー',
		'all_items' => 'すべてのカテゴリー',
		'parent_item' => '親カテゴリー',
		'parent_item_colon' => '親カテゴリー',
		'edit_item' => 'カテゴリーの編集',
		'update_item' => 'カテゴリーを更新',
		'add_new_item' => '新規カテゴリーを追加',
		'new_item_name' => '新規カテゴリー名',
		'separate_items_with_commas' => 'カテゴリーが複数ある場合はコンマで区切ってください',
		'add_or_remove_items' => 'カテゴリーの追加もしくは削除',
		'choose_from_most_used' => 'よく使われているカテゴリーから選択',
	);
	$args = array(
		'labels' => $labels,
		'show_ui' => true,
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'match_category' ),
		'query_var' => true,
	);
	register_taxonomy( 'match_category', array( 'match' ) , $args );
}
/*
 * 管理画面ニュースカテゴリーカラム追加
 */
function add_custom_column_news( $defaults ) {
	$defaults['news_category'] = 'カテゴリー';
	return $defaults;
}
add_filter('manage_news_posts_columns', 'add_custom_column_news');

function add_custom_column_id_news($column_name, $id) {
	if( $column_name == 'news_category' ) {
	echo get_the_term_list($id, 'news_category', '', ', ');
	}
}
add_action('manage_news_posts_custom_column', 'add_custom_column_id_news', 10, 2);
function sort_column_news($columns){
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'タイトル',
        'news_category' => 'カテゴリー',
        'comments' => '<span class="vers"><div title="コメント" class="comment-grey-bubble"></div></span>',
        'date' => '日時',
        'author' => '作成者',
    );
    return $columns;
}
add_filter( 'manage_news_posts_columns', 'sort_column_news');
/*
 * 管理画面試合詳細カテゴリーカラム追加
 */
function add_custom_column_match( $defaults ) {
	$defaults['match_category'] = 'カテゴリー';
	return $defaults;
}
add_filter('manage_match_posts_columns', 'add_custom_column_match');
function add_custom_column_id_match($column_name, $post_id) {
	if( $column_name == 'match_category' ) {
		$stitle = get_the_term_list($post_id, 'match_category', '', ', ');
	}
	if( $column_name == 'opponent' ) {
		$stitle = get_post_meta($post_id, 'opponent', true);
	}
	if( $column_name == 'match_date' ) {
		$stitle = get_post_meta($post_id, 'match_date', true);
	}
	if ( isset($stitle) && $stitle ) {
		echo $stitle;
	} else {
		echo __('None');
	}
}
add_action('manage_match_posts_custom_column', 'add_custom_column_id_match', 10, 2);
function sort_column_match($columns){
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'タイトル',
        'match_date' => '試合日時',
        'opponent' => '対戦チーム',
        'match_category' => 'カテゴリー',
        'date' => '公開日時',
    );
    return $columns;
}
add_filter( 'manage_match_posts_columns', 'sort_column_match');
/*
 * ニュースカテゴリーをラジオボタンに設定
 */
add_action( 'admin_print_footer_scripts', 'select_to_radio_news_taxonomy' );
function select_to_radio_news_taxonomy() {
    ?>
    <script type="text/javascript">
    jQuery( function( $ ) {
        // 投稿画面
        $( '[id=news_categorychecklist] input[type=checkbox]' ).each( function() {
            $( this ).replaceWith( $( this ).clone().attr( 'type', 'radio' ) );
        } );
        // 空なら初期値を設定
        if(!$("input[id^=in-news_category]:checked").val()){
//          alert($("input[id^=in-news_category]:checked").val());
            $("input[id^=in-news_category-2]").attr( 'checked', true );
        }
/* うまく動かないので一旦パス
        // 一覧画面
        var news_category_checklist = $( '.news_category-checklist input[type=checkbox]' );
        news_category_checklist.click( function() {
            $( this ).parents( '.news_category-checklist' ).find( ' input[type=checkbox]' ).attr( 'checked', false );
            $( this ).attr( 'checked', true );
        } );
*/
    } );
    </script>
    <?php
}
/*
 * 試合詳細カテゴリーをラジオボタンに設定
 */
add_action( 'admin_print_footer_scripts', 'select_to_radio_match_taxonomy' );
function select_to_radio_match_taxonomy() {
    ?>
    <script type="text/javascript">
    jQuery( function( $ ) {
        // 投稿画面
        $( '[id=match_categorychecklist] input[type=checkbox]' ).each( function() {
            $( this ).replaceWith( $( this ).clone().attr( 'type', 'radio' ) );
        } );
        // 空なら初期値を設定
        if(!$("input[id^=in-match_category]:checked").val()){
            $("input[id^=in-match_category-11]").attr( 'checked', true );
        }
/* うまく動かないので一旦パス
        // 一覧画面
        var match_category_checklist = $( '.match_category-checklist input[type=checkbox]' );
        news_category_checklist.click( function() {
            $( this ).parents( '.match_category-checklist' ).find( ' input[type=checkbox]' ).attr( 'checked', false );
            $( this ).attr( 'checked', true );
        } );
*/
    } );
    </script>
    <?php
}
/* post_type=bernabeuの場合は本文からタイトルを生成
 * リストで見せかけているだけなのでDB内のタイトルは変わらない
 */
//add_filter('the_title', 'replace_title');
function replace_title($title) {
	global $post;
	//post_typeを判定(post, page, カスタム投稿)
	if( isset($post->post_type) && $post->post_type == 'bernabeu' ){
		if(!empty($post->post_content)){
			$cutsize=35;
			$content=strip_tags($post->post_content);
			$length=mb_strlen($content);
			if($cutsize<$length){
				$title='> '.mb_substr($content,0,$cutsize).'...';
			}else{
				$title='> '.$content;
			}
		}
	}
	return $title;
}
/* post_type=bernabeuの場合は本文からタイトルを生成
 * 更新時にしかタイトルの登録が行われない
 */
//add_filter('title_save_pre', 'replace_post_title');
function replace_post_title($title) {
	global $post;
	//post_typeを判定(post, page, カスタム投稿)
	if( isset($post->post_type) && $post->post_type == 'bernabeu' ){
		if(!empty($post->post_content)){
			$cutsize=35;
			$content=strip_tags($post->post_content);
			$length=mb_strlen($content);
			if($cutsize<$length){
				$title=mb_substr($content,0,$cutsize).'...';
			}else{
				$title=$content;
			}
		}
	}
	return $title;
}
add_action( 'post_submitbox_misc_actions', 'before_form_content' );
function before_form_content() {
  echo '<span class="infotext">※アイキャッチ画像の場合は、<br>必ず「その他」を選択してください。</span>';
}


//本体ギャラリーCSS停止
add_filter( 'use_default_gallery_style', '__return_false' );