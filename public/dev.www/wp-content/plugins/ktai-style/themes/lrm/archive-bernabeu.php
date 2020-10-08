<?php ks_header(); ?>
<font size="-1">

<a href="/"><font size="-1" color="#00489b"><<戻る</font><a>


<?php
global $ks_settings;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$limit = 4;
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
    /* User ID, Token */
    $instagramUserID = 8423901313;
    $instagramToken  = '8423901313.66ce3e3.ce2812ac80f54aafacd43c36658ebf59';
 
    /* Get API ( Require HTTPS ) JSON Convert */
    $instagramApiURI    = 'https://api.instagram.com/v1/users/'.$instagramUserID.'/media/recent?access_token='.$instagramToken.'&count=4';
    $instagramDates = json_decode(file_get_contents($instagramApiURI));

    /* Loop Start */
    foreach((array) $instagramDates->data as $instagramData):

?>
<tr>
<td bgcolor="#FFFFFF" align="center">
<a href="<?php echo $instagramData->link; ?>" target="_blank"><img width="200" src="<?php echo $instagramData->images->standard_resolution->url; ?>" alt="ベルナベウLIVE！" /></a>
</td>
</tr>

<?php endforeach; ?>

</table>




<br>
<!--paging-->
<div align="center">
<a href="/bernabeulive" accesskey="#">#.次≫</a></div>
<!--/paging-->
<br>






<?php endif; ?>




<?php ks_footer(); ?>