
<font size="-1">
<img src="/099/140/01/sitehead.gif" width="100%">

<?php ks_header();
global $ks_settings;
$limit = 5;
query_posts(array( 
		'post_type' => 'news',
		'posts_per_page' => $limit
	) );

if (have_posts()) :?>


<!--
#%element:USER_VALUE value_type="resign"%#
#%cond mstatus="1" disp="1"%#
<div align="center">
<a href="/040/100/info201406?uid=NULLGWDOCOMO&guid=ON">サイトに関するお知らせ</a>
</div>
#%/cond%#
#%/element%#
-->


<!--news-->
<a name="intc"></a>
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td width="60%" bgcolor="#00489b"><font size="-1" color="#FFFFFF">E:{76}</font><font size="-1" color="#FFFFFF">新着ﾆｭｰｽ</font></td>
<td width="40%" bgcolor="#00489b" align="right"><a href="/news"><font size="-1" color="#FFFFFF">すべて>></font></a></td>
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
wp_reset_postdata();
?>
</table>
<?php endif;?>



<!--news-->


<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td width="60%" bgcolor="#00489b"><font size="-1" color="#FFFFFF">E:{5}</font><font size="-1" color="#FFFFFF">ベルナベウLIVE!</font></td>
<td width="40%" bgcolor="#00489b" align="right"><a href="/bernabeu"><font size="-1" color="#FFFFFF">一覧へ>></font></a></td>
</table>


<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#cccccc">
<tr>
<?php
    /* User ID, Token */
    $instagramUserID = 8423901313;
    $instagramToken  = '8423901313.66ce3e3.ce2812ac80f54aafacd43c36658ebf59';
    /* Get API ( Require HTTPS ) JSON Convert */
    $instagramApiURI    = 'https://api.instagram.com/v1/users/'.$instagramUserID.'/media/recent?access_token='.$instagramToken.'&count=3';
    $instagramDates = json_decode(file_get_contents($instagramApiURI));
    /* Loop Start */
    foreach((array) $instagramDates->data as $instagramData):
?>
<td bgcolor="#FFFFFF" align="center" width="33%">
<a href="<?php echo $instagramData->link; ?>" target="_blank"><img width="70" src="<?php echo $instagramData->images->standard_resolution->url; ?>" alt="ベルナベウLIVE！" /></a>
</td>
<?php endforeach; ?>
</tr>
</table>



<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td bgcolor="#00489b"><font size="-1" color="#FFFFFF">E:{25}</font><font size="-1" color="#FFFFFF">試合情報</font></td>
</table>


<!--match-->
<?php echo do_shortcode( '[schedule-list limit=1]
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffffff">
<tr>
<td colspan="3" bgcolor="#ffffff" align="center"><font size="-1" color="#000000">%%section%%<br>%%match_date%%</font></td>
</tr>
<tr>
<td width="42%" bgcolor="#ffffff" align="left"><font size="-1" color="#666666">%%home_team%%</font></td>
<td width="16%" bgcolor="#ffffff" align="center"><font size="-1" color="#000000">-</font></td>
<td width="42%" bgcolor="#ffffff" align="right"><font size="-1" color="#666666">%%away_team%%</font></td>
</tr>
<tr>
<td colspan="3" bgcolor="#ffffff" align="center"><a href="%%link%%"><font size="-1" color="#000000">詳細</font></a></td>
</tr>
</table>
[/schedule-list]' );?>
<!--match list-->
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#cccccc">

<?php echo do_shortcode( '[schedule-list offset=1 limit=3]
<tr>
<td bgcolor="#ffffff">
<font size="-1" color="#666666">
<font size="-1" color="#00489b">E:{191}</font>%%section%%<br>
<font size="-1" color="#00489b">E:{196}</font>%%match_date%%<br>
%%home_team%%<br>
%%away_team%%
</font>
</td>
</tr>
[/schedule-list]' );?>
</table>




<!--suppo-->
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#cccccc">
<tr>
<td bgcolor="#666666"><font size="-1" color="#ffffff">E:{151}</font><font size="-1" color="#ffffff">ｻﾎﾟｰﾄﾒﾆｭｰ</font></td>
</tr><tr>
<td bgcolor="#ffffff"><a href="/090/508/01?uid=NULLGWDOCOMO&guid=ON"><font size="-1" color="#666666">>会員登録</font></a></td>
</tr><tr>
<td bgcolor="#ffffff"><a href="/090/518/01?uid=NULLGWDOCOMO&guid=ON"><font size="-1" color="#666666">>ｻｰﾋﾞｽ内容</font></a></td>
</tr><tr>
<td bgcolor="#ffffff"><a href="/090/515/01?uid=NULLGWDOCOMO&guid=ON"><font size="-1" color="#666666">>対応機種</font></a></td>
</tr><tr>
<td bgcolor="#ffffff"><a href="/090/511/01?uid=NULLGWDOCOMO&guid=ON"><font size="-1" color="#666666">>利用規約</font></a></td>
</tr><tr>
<td bgcolor="#ffffff"><a href="/090/516/01?uid=NULLGWDOCOMO&guid=ON"><font size="-1" color="#666666">>ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</font></a></td>
</tr><tr>
<td bgcolor="#ffffff"><a href="/090/512/01?uid=NULLGWDOCOMO&guid=ON"><font size="-1" color="#666666">>特定商取引法に基づく表示</font></a></td>
</tr><tr>
<td bgcolor="#ffffff"><a href="/090/517/01?uid=NULLGWDOCOMO&guid=ON"><font size="-1" color="#666666">>FAQ･お問い合わせについて</font></a></td>
</tr><tr>
<td bgcolor="#ffffff"><a href="/090/510/01?uid=NULLGWDOCOMO&guid=ON"><font size="-1" color="#666666">>会員解除</font></a></td>
</tr>
</table>
<!--/suppo-->



</font>


<?php ks_footer(); ?>