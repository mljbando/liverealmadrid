<?php ks_header(); ?>
<font size="-1">

<table width="100%" border="0" bgcolor="#00489b">
<td><a href="/"><font size="-1" color="#FFFFFF"><<戻る</font><a></td>
</table>


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
    $instagramApiURI    = 'https://api.instagram.com/v1/users/'.$instagramUserID.'/media/recent?access_token='.$instagramToken.'&count=10';
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
<a href="/bernabeu" accesskey="#">#.次≫</a></div>
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