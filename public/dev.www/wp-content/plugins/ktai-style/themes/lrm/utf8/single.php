<?php
// リクエストされているポストタイプの取得
$req_post_type = preg_replace('#/([^?/]*).*#', '\1', $_SERVER['REQUEST_URI']);
//print_r($req_post_type);
//exit;
if(!empty($req_post_type)){
	include ("single-${req_post_type}.php");
}else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
<title>Live!Real Madrid｜ﾗｲﾌﾞ!ﾚｱﾙ･ﾏﾄﾞﾘｰﾄﾞ</title>
</head>
<body bgcolor="#FFFFFF" text="#666666"  link="#00489b" vlink="#00489b">

<font size="-1">


<table width="100%" border="0" bgcolor="#00489b">
<td><a href="/"><font size="-1" color="#FFFFFF"><<戻る</font><a></td>
</table>


<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td bgcolor="#00489b"><font size="-1" color="#FFFFFF"></font><font size="-1" color="#FFFFFF">新着ﾆｭｰｽ</font></td>
</table>


<?php
if (have_posts()) : the_post();
?>
<font size="-1" color="#00489b"><?php ks_time(); ?></font><br>

<font size="-1" color="#666666"><?php the_title(); ?></font><br>


<hr size="-1" color="#CCCCCC">


<font size="-1" color="#666666">

<?php ks_content(); ?>

<?php endif; ?>

</font>



<hr size="-1" color="#00489b">

<div align="center">
<font size="-1" color="#666666">
Copyright(C)MLJ Inc.
</font>
</div>

</font>
</body>
</html>
<?php
}
?>