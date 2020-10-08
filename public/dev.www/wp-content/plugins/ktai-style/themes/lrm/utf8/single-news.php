<?php ks_header(); ?>
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


<?php ks_footer(); ?>