<?php
/**
 * ガラケー用テーブル出力
 * Handle Shortcode [table-while id=<id> key=<key> key_disp=<key_disp>/]
 */
function tablepress_ks_table_while_shortcode( $shortcode_atts ) {

	/*
	 * ガラケーのテーブルループ内を変更する場合
	 * 以下の$org_contentを変更してください。
	 * なお「%%カラム名%%」が該当の値に置換されます。
	 */
	$org_content =  <<< EOM
<tr>
<td colspan="3" width="70%" bgcolor="#e7e7e7"><font size="-1" color="#004ba7">%%節%%</font></td>
</tr>
<tr>
<td width="70%" bgcolor="#FFFFFF"><font size="-1" color="#004ba7"><font size="-1" color="#666666">%%日%% %%時間%%</font><br><font size="-1" color="#666666">%%対戦相手%%</font></td>
<td width="10%" bgcolor="#FFFFFF" align="center"><font size="-1" color="#666666">%%H/A%%</font></td>
<td width="20%" bgcolor="#FFFFFF" align="center"><font size="-1" color="#666666">%%詳細%%</font><font size="-1" color="#666666">%%勝敗%%</font></td>
</tr>
EOM;
	$is_all=false;
	$shown_tables=array();
	// parse Shortcode attributes, only allow those that are specified
	$default_shortcode_atts = array(
			'id' => 2,
			'key' => null,
			'key_disp' => 1,
		);
	$shortcode_atts = shortcode_atts( $default_shortcode_atts, $shortcode_atts );
	if(empty($shortcode_atts['id'])){
		return '';
	}
	$while_key = (isset($shortcode_atts['key']) ? $shortcode_atts['key'] : htmlspecialchars($_GET['key'], ENT_QUOTES));
	if(empty($while_key)){
		$is_all = true;
	}
	$table_id = preg_replace( '/[^a-zA-Z0-9_-]/', '', $shortcode_atts['id'] );
	$table = TablePress::$model_table->load( $table_id, true, true ); // Load table data, but don't load options or visibility
	if ( is_wp_error( $table ) ) {
		return "[table &#8220;{$table_id}&#8221; could not be loaded /]<br />\n";
	}
	$count=0;
	$result='';
	$rowmax=sizeof($table['data']);
	$colmax=sizeof($table['data'][0]);
	// keyが何カラム目かを設定
	$keyno=0;
//	print_r($keyset);
	// 1行目はカラム名なので飛ばす
	for($i=1; $i<$rowmax; $i++){
		// keyが無い値はskip
		if(empty($table['data'][$i][$keyno])){
			continue;
		}
		// keyがパラメータと同一なら出力開始
		if($is_all === true ||$table['data'][$i][$keyno]===$while_key){
			$content = $org_content;
//			print_r($table['data'][$i]);
//			print_r("<br>\n");
//			foreach($table['data'][$i]as $column){
			for($j=0; $j<$colmax; $j++){
//				$source=str_replace();
				$search=$table['data'][0][$j];
				
//			print_r($search);
//			print_r("<br>\n");
				$replace=$table['data'][$i][$j];
				// 中身がphpなら実行
				if(strpos($replace,'<?php')!==FALSE){
					ob_start();
					eval( '?>' . $replace );
					$replace = ob_get_clean();
				}
				
				$content=str_replace('%%'.$search.'%%',$replace,$content);
			}
/*			$count=$count+1;
			if($count%5===0){
				$result=$result.'<!--KTAI_PAGE-->';
			}
*/
			$result=$result.$content;
		}
	}
	return $result;
}
/**
 * PC向けテーブル出力
 * Handle Shortcode [table-while id=<id> key=<key> key_disp=<key_disp>/]
 */
function tablepress_table_while_shortcode( $shortcode_atts ) {
	$shown_tables=array();
	// parse Shortcode attributes, only allow those that are specified
	$default_shortcode_atts = array(
			'id' => 2,
			'key' => null,
			'key_disp' => 1,
		);
	$shortcode_atts = shortcode_atts( $default_shortcode_atts, $shortcode_atts );
	$table_id = preg_replace( '/[^a-zA-Z0-9_-]/', '', $shortcode_atts['id'] );
	$table = TablePress::$model_table->load( $table_id, true, true ); // Load table data, but don't load options or visibility
	if ( is_wp_error( $table ) ) {
		return "[table &#8220;{$table_id}&#8221; could not be loaded /]<br />\n";
	}
	$while_key = $shortcode_atts['key'];
	if(empty($while_key)){
		return '';
	}
	$_render = TablePress::load_class( 'TablePress_Render', 'class-render.php', 'classes' );
	$default_shortcode_atts = $_render->get_default_render_options();
	$default_shortcode_atts = apply_filters( 'tablepress_shortcode_table_default_shortcode_atts', $default_shortcode_atts );
//	print_r($shortcode_atts);
	$shortcode_atts = apply_filters( 'tablepress_shortcode_table_shortcode_atts', $shortcode_atts );
//	print_r($shortcode_atts);
	$render_options = apply_filters( 'tablepress_table_render_options', $render_options, $table );
	foreach ( $shortcode_atts as $key => $value ) {
		// have to check this, because strings 'true' or 'false' are not recognized as boolean!
		if ( 'true' == strtolower( $value ) ) {
			$render_options[ $key ] = true;
		} elseif ( 'false' == strtolower( $value ) ) {
			$render_options[ $key ] = false;
		} elseif ( is_null( $value ) && isset( $table['options'][ $key ] ) ) {
			$render_options[ $key ] = $table['options'][ $key ];
		} else {
			$render_options[ $key ] = $value;
		}
	}
	if ( ! isset( $shown_tables[ $table_id ] ) ) {
		$shown_tables[ $table_id ] = array(
			'count' => 0,
			'instances' => array(),
		);
	}
	$count = $shown_tables[ $table_id ]['count'];
	$render_options['html_id'] = "tablepress-{$table_id}";
	$render_options['alternating_row_colors']=true;
	$render_options['table_head']=true;
	$render_options['use_datatables']=true;
	$render_options['row_hover']=true;
	$render_options['cellspacing']=false;
	$render_options['cellpadding']=false;
	$render_options['border']=false;
	foreach ( $table[data] as $number => $value ) {
		if($number!==0&&$value[0]!==$while_key){
			$table[visibility][rows][$number]=0;
		}else{
//			print_r($value[0]);
//			print_r("<br>\n");
		}
	}
	$key_disp = $shortcode_atts['key_disp'];
//	print_r($key_disp);
	if(!$key_disp){
		$table[visibility][columns][0]=0;
	}
//	$table[visibility][rows][1]=0;
	$_render->set_input($table,$render_options);
	return $_render->get_output();
}
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
// tablepressの編集可能ボタンを非表示
add_filter( 'tablepress_edit_link_below_table', '__return_false' );
/*
 * 引数の投稿が存在したらリンク吐き出し
 * TablePress内から呼ぶ
 */
function get_post_link($title='',$notdata='-'){
	trim($title);
	if(empty($title)){
		echo $notdata;
	}else{
		$page = get_page_by_title( $title,'OBJECT','match');
		if(isset($page->ID)){
			echo '<a href="'.get_permalink( $page->ID ).'">';
			echo get_post_meta($page->ID,'home_points',true);
			echo '-';
			echo get_post_meta($page->ID,'away_points',true);
			echo '</a>';
		}else{
			echo $notdata;
		}
	}
}
if ( ! is_admin() ){
	
	if(function_exists('is_ktai') && is_ktai()){
		add_shortcode( 'table-while', 'tablepress_ks_table_while_shortcode' );
	}else{
		add_shortcode( 'table-while', 'tablepress_table_while_shortcode' );
	}
	
}
add_shortcode( 'team-emblem', 'tablepress_match_teamemblem_shortcode' );/**
 * Handle Shortcode [team-emblem key="TEAM_NAME" ]レアル・マドリード[/team-emblem]
 * [team-emblem id=3 key="ID" ]4103[/team-emblem]
 */
function tablepress_match_teamemblem_shortcode( $atts , $content = null) {
	$shown_tables=array();
	// parse Shortcode attributes, only allow those that are specified
	$default_shortcode_atts = array(
			'id' => 3,
			'key' => 'TEAM_NAME',
			'path' => '/images/team/',
		);
	$shortcode_atts = shortcode_atts( $default_shortcode_atts, $atts );
	if(empty($shortcode_atts['id'])){
		return '';
	}
	if(empty($content)){
		return '';
	}
	$path = (isset($shortcode_atts['path']) ? $shortcode_atts['path'] : '/');
	$path = trailingslashit($path);
	$key_value = (isset($shortcode_atts['key']) ? $shortcode_atts['key'] : 'TEAM_NAME');
	
	$table_id = preg_replace( '/[^a-zA-Z0-9_-]/', '', $shortcode_atts['id'] );
	$table = TablePress::$model_table->load( $table_id, true, true ); // Load table data, but don't load options or visibility
	if ( is_wp_error( $table ) ) {
		return "[table &#8220;{$table_id}&#8221; could not be loaded /]<br />\n";
	}
	$key_no=0;
	$emblem_no=0;
	$emblem_value='EMBLEM_IMAGE';
	$id_no=0;
	$id_value='ID';
	// カラム位置を特定
	for( $i=0; $i<sizeof($table['data'][0]); $i++){
		if(isset($table['data'][0][$i])){
			if($key_value === $table['data'][0][$i]){
				$key_no = $i;
			}
			if($emblem_value === $table['data'][0][$i]){
				$emblem_no = $i;
			}
			if($id_value === $table['data'][0][$i]){
				$id_no = $i;
			}
		}
	}
	$result='';
	// データが存在したらbreak
	for($i=1; $i < sizeof($table['data']); $i++){
		if($content===$table['data'][$i][$key_no]){
			if(isset($table['data'][$i][$emblem_no])){
				$result = $table['data'][$i][$emblem_no];
			}
			if(empty($result)){
				// /image/team/[ID].png
				$result = $path . $table['data'][$i][$id_no] . '.png';
			}
		}
		if(!empty($result)) break;
	}
	return $result;
}
add_shortcode( 'schedule-list', 'tablepress_match_schedule_shortcode' );
/**
 * Handle Shortcode [schedule-list id=<id> date=<now> limit=<limit> offset=<offset> next="+2 day"/]
 *「%%カラム名%%」が該当の値に置換されます。
 */
function tablepress_match_schedule_shortcode( $shortcode_atts , $content_org = null) {
	$is_all=false;
	$shown_tables=array();
	// parse Shortcode attributes, only allow those that are specified
	$default_shortcode_atts = array(
			'id'     => 2,
			'date'   => null,
			'limit'  => 10,
			'offset' => 0,
			'next'   => "+1day",
		);
	$shortcode_atts = shortcode_atts( $default_shortcode_atts, $shortcode_atts );
	if(empty($shortcode_atts['id'])){
		return '';
	}
	$limit = (isset($shortcode_atts['limit']) ? $shortcode_atts['limit'] : htmlspecialchars($_GET['limit'], ENT_QUOTES));
	if(empty($limit)){
		$is_all = true;
	}
	$offset = (isset($shortcode_atts['offset']) ? $shortcode_atts['offset'] : htmlspecialchars($_GET['offset'], ENT_QUOTES));
	if(empty($offset)){
		$offset = 0;
	}
	$table_id = preg_replace( '/[^a-zA-Z0-9_-]/', '', $shortcode_atts['id'] );
	$table = TablePress::$model_table->load( $table_id, true, true ); // Load table data, but don't load options or visibility
	if ( is_wp_error( $table ) ) {
		return "[table &#8220;{$table_id}&#8221; could not be loaded /]<br />\n";
	}
	$now_date = (isset($shortcode_atts['date']) ? $shortcode_atts['date'] : htmlspecialchars($_GET['date'], ENT_QUOTES));
	if(empty($now_date)){
		$now_date = date('Y-m-d');
	}
	$key_no=0;
	$key_value='日';
	$detail_no=0;
	$detail_value='詳細';
	for( $i=0; $i<sizeof($table['data'][0]); $i++){
		if(isset($table['data'][0][$i])){
			if($key_value === $table['data'][0][$i]){
				$key_no = $i;
			}
			if($detail_value === $table['data'][0][$i]){
				$detail_no = $i;
			}
		}
	}
	$print_data=array();
	/*
	 * 指定日分ずれた日付の状態でデータを表示
	 * ex) 現在：2014-08-15
	 *     指定：+2day
	 *     状態：2014-08-13
	 *     ※2014-08-14が次の試合でも切り替えない
	 */
	$now_time = strtotime( $now_date );
	// 必要なずれを取得（秒）
	$diff_time = strtotime( $now_date . $shortcode_atts['next']) - $now_time;
	// 現在の日時からずれ分を減らす
	$now_time = $now_time - $diff_time;
//	print_r($now_time.'<br>');
//	print_r($diff_time.'<br>');
//	$now_time = strtotime( "2014-09-30" );
	$now_date=date('Y-m-d',$now_time);
//	print_r($now_date);
	$next_month = strtotime("first day of +1 month",$now_time);
//	print_r($now_date);
	// データが存在したらbreak
	for($i=1; $i < sizeof($table['data']); $i++){
		$check_date = 0;
		// 現在日時までスキップ
		if(isset($table['data'][$i][$key_no])){
//			print_r($table['data'][$i][$key_no]);
//			print_r('--<br>');
			$check_date = strtotime($table['data'][$i][$key_no]);
//			print_r(date('Y-m-d',$check_date));
		}
		if( ! $is_all && $check_date < $now_time){
			continue;
		}
/*
		print_r(date('Y-m-d',$check_date));
		print_r('<br>');
		print_r(date('Y-m-d',$now_time));
		print_r('<br>');
		print_r(date('Y-m-d',$next_month));
		print_r('<br>');
*/
		// 来月でストップ
		if( ! $is_all && $next_month <= $check_date){
			// データが足りない場合は来月のデータも出力
			if( 1 > sizeof($print_data)-$offset){
				$now_time = strtotime("first day of +1 month",$now_time);
				$next_month = strtotime("first day of +1 month",$now_time);
//				print_r(sizeof($print_data).'NEXT<br>');
//				print_r(date('Y-m-d',$now_time));
//				print_r(date('Y-m-d',$next_month));
				// 月替わりで入らなかったデータを投入し直す
				$i = $i - 1;
				continue;
			}else{
				break;
			}
		}
		$datasize=sizeof($print_data);
		$print_data[$datasize]['date'] = date('Y-m-d',$check_date);
		if(isset($table['data'][$i][$detail_no])){
			$tmp = $table['data'][$i][$detail_no];
			//get_post_link('20140726_pre01');
			$count = preg_match('/get_post_link\(( *)\'(.*?)( *)\'/',$tmp,$matches);
//			print_r($matches);
			$title = isset($matches[2]) ? $matches[2] : '';
			$page = get_page_by_title( $title,'OBJECT','match','single-match');
			if(isset($page->ID)){
				$post = get_post_custom($page->ID);
//				print_r($post);
				$print_data[$datasize]['link']        = get_permalink( $page->ID );
				$print_data[$datasize]['match_date']  = $post['match_date'][0];
				$print_data[$datasize]['home_team']   = $post['home_team'][0];
				$print_data[$datasize]['away_team']   = $post['away_team'][0];
				$print_data[$datasize]['section']     = $post['section'][0];
				$print_data[$datasize]['h_score']     = $post['home_points'][0];
				$print_data[$datasize]['t_score']     = $post['half_all_score'][0];
				$print_data[$datasize]['a_score']     = $post['away_points'][0];
				$print_data[$datasize]['match_video']     = $post['match_video'][0];
				$print_data[$datasize]['match_pic']     = $post['match_pic'][0];
				$print_data[$datasize]['competition']     = $post['competition'][0];
				$print_data[$datasize]['home_emblem'] = do_shortcode( '[team-emblem]'.$post['home_team'][0].'[/team-emblem]' );
				$print_data[$datasize]['away_emblem'] = do_shortcode( '[team-emblem]'.$post['away_team'][0].'[/team-emblem]' );
			}
		}
/*
		print_r('<br>--');
		print_r(date('Y-m-d',$check_date));
		print_r('--<br>');
		print_r($next_month);
		print_r('<br>');
		print_r($check_date);
		print_r('<br>');
		print_r(date('Y-m-d',$next_month));
		print_r('<br>');
		print_r(date('Y-m-d',$check_date));
		print_r('<br>');
*/
	}
	$result_contents = '';
	for( $i = 0; $i < sizeof($print_data); $i++ ){
		if( $i < $offset ){ continue; }
		if( ($limit + $offset) <= $i ){ break; }
		$content = $content_org;
		foreach ( $print_data[$i] as $key => $value ) {
			/*
			print_r($key);
			print_r('->');
			print_r($value);
			print_r('<br>');
			*/
			$content=str_replace('%%'.$key.'%%',$value,$content);
		}
		$result_contents .= $content;
	}
	return $result_contents;
}