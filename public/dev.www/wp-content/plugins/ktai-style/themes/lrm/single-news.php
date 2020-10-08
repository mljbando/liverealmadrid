<?php ks_header(); ?>
<font size="-1">

<a href="/"><font size="-1" color="#00489b"><<戻る</font><a>


<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td bgcolor="#00489b"><font size="-1" color="#FFFFFF"></font><font size="-1" color="#FFFFFF">新着ﾆｭｰｽ</font></td>
</table>


<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>

<font size="-1" color="#00489b"><?php ks_time(); ?></font><br>

<font size="-1" color="#666666"><?php the_title(); ?></font><br>


<hr size="-1" color="#CCCCCC">

<div align="center">

    <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail(array(240, 135)); ?>
    <?php else: ?>

<style>
.insertpic img{width:240px;height:135px;}
</style>
<div class="insertpic">
<?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?>
    <?php endif; ?>
</div>

</div>



<font size="-1" color="#666666">
<?php ks_content(); ?>

<?php endwhile; ?>
<?php endif; ?>

</font>


<?php ks_footer(); ?>