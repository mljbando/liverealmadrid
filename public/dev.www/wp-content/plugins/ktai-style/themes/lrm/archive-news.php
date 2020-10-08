<?php ks_header(); ?>
<font size="-1">

<a href="/"><font size="-1" color="#00489b"><<戻る</font><a>



<?php ks_header();
global $ks_settings;

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$limit = 6;
query_posts(array( 
		'post_type' =>  'news',
		'posts_per_page' => $limit,
		'paged' => $paged,
	) );
if (have_posts()) :
?>


<!--news-->
<a name="intc"></a>
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td bgcolor="#00489b"><font size="-1" color="#FFFFFF">E:{76}</font><font size="-1" color="#FFFFFF">新着ﾆｭｰｽ</font></td>
</table>

<style>
.insertpic img{width:60px;}
</style>

<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#cccccc">

<?php
while (have_posts()) : the_post();
?>

<tr>
<td bgcolor="#FFFFFF">
<div class="insertpic">
<?php if (has_post_thumbnail()): ?>
<?php the_post_thumbnail(array(240, 135)); ?>
<?php else: ?>
<?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?>
<?php endif; ?>
</div>
</td>
<td bgcolor="#FFFFFF">
<font size="-1" color="#00489b"><?php the_time('Y.m.d H:i'); ?></font><br>
<a href="<?php the_permalink(); ?>"><font size="-1" color="#666666"><?php the_title(); ?></font></a>
</td>
</tr>

<?php 
if (is_home()) { 
?>

<?php 
} ?>

<?php endwhile;
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