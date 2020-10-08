<?php ks_header(); ?>
<font size="-1">
<a href="/"><font size="-1" color="#00489b"><<戻る</font><a>



<?php
global $ks_settings;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$limit = 6;
query_posts(array( 
		'post_type' =>  'bernabeu',
		'posts_per_page' => $limit,
		'paged' => $paged,
	) );
if (have_posts()) :
?>


<!--news-->
<a name="intc"></a>
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td bgcolor="#00489b"><font size="-1" color="#FFFFFF">E:{76}</font><font size="-1" color="#FFFFFF">ﾍﾞﾙﾅﾍﾞｳLIVE!</font></td>
</table>


<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#cccccc">


<?php
while (have_posts()) : the_post();
?>
<tr>
<td align="center" bgcolor="#FFFFFF">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理
	the_post_thumbnail();
?>
<?php else: // サムネイルを持っていないときの処理 ?>
<img src="/images/berlive1.jpg">
<?php endif; ?>
</td>
</tr>

<tr>
<td bgcolor="#FFFFFF">
<font size="-1" color="#00489b"><?php the_time('Y.m.d H:i'); ?></font><br>
<font size="-1" color="#666666"><?php the_title(); ?></font></a>
</td>
</tr>
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

<!--news-->
<a name="intc"></a>
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#cccccc">
<tr>
<td width="50%" bgcolor="#ffffff"><font size="-1" color="#00489b">E:{76}</font><a href=""><font size="-1" color="#666666">すべて</font></a></td>
<td width="50%" bgcolor="#ffffff"><font size="-1" color="#00489b">E:{190}</font><a href=""><font size="-1" color="#666666">マドリード通信</font></a></td>
</tr>
<tr>
<td width="50%" bgcolor="#ffffff"><font size="-1" color="#00489b">E:{151}</font><a href=""><font size="-1" color="#666666">公式声明</font></a></td>
<td width="50%" bgcolor="#ffffff"><font size="-1" color="#00489b">E:{179}</font><a href=""><font size="-1" color="#666666">招集メンバー</font></a></td>
</tr>
<tr>
<td width="50%" bgcolor="#ffffff"><font size="-1" color="#00489b">E:{57}</font><a href=""><font size="-1" color="#666666">記者会見</font></a></td>
<td width="50%" bgcolor="#ffffff"><font size="-1" color="#00489b">E:{41}</font><a href=""><font size="-1" color="#666666">メディカルレポート</font></a></td>
</tr>
</table>








<?php endif; ?>




<?php ks_footer(); ?>