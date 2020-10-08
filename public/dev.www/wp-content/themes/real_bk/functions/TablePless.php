<?php
/*
Plugin Name: TablePress Extension: PHP in tables
Plugin URI: http://tablepress.org/extensions/php-in-tables/
Description: Custom Extension for TablePress to allow and execute PHP code in table cells
	TablePressでセル内のphpを実行可能にする。
Version: 1.0
Author: Tobias Bäthge
Author URI: http://tobias.baethge.com/
*/

add_filter( 'tablepress_cell_content', 'tablepress_execute_php_in_cells', 10, 4 );

function tablepress_execute_php_in_cells( $cell_content, $table_id, $row_number, $column_number ) {
	ob_start();
	eval( '?>' . $cell_content );
	return ob_get_clean();
}

/* 引数の投稿が存在したらリンク吐き出し
 * TablePress内から呼ぶ予定
 */
function get_post_link($post_id, $contents){
	// メモ状態
	print_r('"'.$post_id.'"');
//	print_r('<a href="/'.$post_id.'">'.$contents.'</a>');
}

