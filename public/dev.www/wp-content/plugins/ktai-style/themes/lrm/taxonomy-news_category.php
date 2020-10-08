<?php ks_header();
global $ks_settings;


$req_taxonomy = preg_replace('#^/.*?/([^?/]*).*#', '\1', $_SERVER['REQUEST_URI']);
?>
<a href="/"><font size="-1" color="#00489b"><<戻る</font><a>


<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td bgcolor="#00489b"><font size="-1" color="#FFFFFF">E:{76}</font><font size="-1" color="#FFFFFF"><?php
$cats = get_the_terms( $post->ID, 'news_category');
foreach($cats as $cat){
	if($cat !== reset($cats)) echo ',';
	echo $cat->name;
}
?></font></td>
</table>



<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">

<?php
$limit = 8;
query_posts(array( 
		'post_type' => 'news',
		'posts_per_page' => $limit
	) );

if (have_posts()) :?>
<?php
while (have_posts()) : the_post();
?>

<tr>
<td bgcolor="#FFFFFF">
<br>
<font size="-1"><?php the_time('Y/m/d H:i'); ?></font><br>
<a href="<?php the_permalink(); ?>"><font size="-1"><?php the_title(); ?></font></a>
</td>
</tr>
<?php 
if (is_home()) { 
?>

<?php 
} ?>

<?php endwhile;
wp_reset_postdata();
?>

</table>

<br>

<!--paging-->
<div align="center">
<?php
/*
 * ks_posts_nav_link($sep, $before, $after, $prev_label, $next_label, $prev_key, $next_key)
 * 前後のページへのナビゲーションリンクを出力します。前後のページがないときは何も出力しません。
 *  $sep: 間に挟まれる分離文字列。
 *  $before: ナビゲーションの前に付ける HTML タグ
 *  $after: ナビゲーションの後ろに付ける HTML タグ
 *  $prev_label: 前ページを示す文字列 (デフォルトは ≪*.前 )
 *  $next_label: 次ページを示す文字列 (デフォルトは #.次≫ )
 *  $prev_key: 前ページのアクセスキー文字 (デフォルトは *)
 *  $next_key: 次ページアクセスキー文字 (デフォルトは #)
 */
//ks_posts_nav_link();
$sep = '|';
$before	= '';
$after	= '';
$prev_label = '≪前.*';
$next_label = '#.次≫';
$prev_key = '*';
$next_key = '#';
ks_posts_nav_link($sep, $before, $after, $prev_label, $next_label, $prev_key, $next_key);
// 3ページ以上になった場合に出力
// 出力された場合直前に"<br>"を付与
//ks_posts_nav_dropdown(array('before' => '<br>','after' => '', 'min_pages' => 3));
?>
</div>
<!--/paging-->



<br>


<?php endif; ?>


<?php ks_footer(); ?>