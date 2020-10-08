<?php
ks_header();
?>

<font size="-1">


<table width="100%" border="0" bgcolor="#00489b">
<td><a href="/"><font size="-1" color="#FFFFFF"><<戻る</font><a></td>
</table>
<!--
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#00489b">
<td align="center" bgcolor="#FFFFFF"><font size="-1" color="#00489b">E:{5}</font><font size="-1" color="#00489b">試合詳細</font><font size="-1" color="#00489b">E:{5}</font></td>
</table>-->
<?php
if (have_posts()) : the_post();
$post = get_post($post_id);

?>

<div align="center">

<font size="-1">E:{196}<?php print_r(get_post_meta($post->ID,'match_date',true));?></font><br>
<font size="-1"><?php print_r(get_post_meta($post->ID,'section',true));?></font><br>
<font size="-1"><?php print_r(get_post_meta($post->ID,'status',true));?></font>
</div>

<hr size="-1" color="#e7e7e7">

<!--
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td align="center"><font size="-1">
<form method="get" action="<?php the_title(); ?>?uid=NULLGWDOCOMO">
<input type="submit" name="Submit" value="[＃]更新" accesskey="#">
</form></font>
</td>
</tr>
</table>

<hr size="-1" color="#e7e7e7">
-->


<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#ffffff">
<tr>
<td width="50%" bgcolor="#FFFFFF"><font color="#000000" size="-1"><?php print_r(nl2br(get_post_meta($post->ID,'home_team',true)));?></font></td>
<td width="50%" align="right" bgcolor="#FFFFFF"><font color="#000000" size="-1"><?php print_r(nl2br(get_post_meta($post->ID,'away_team',true)));?></font></td>
</tr>
</table>

<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#e7e7e7">
<tr>
<td width="38%" align="center" bgcolor="#FFFFFF"><font color="#666666" size="+1"><?php print_r(get_post_meta($post->ID,'home_points',true));?></font></td><td width="24%" align="center" bgcolor="#FFFFFF"><font color="#666666" size="-1"><?php print_r(nl2br(get_post_meta($post->ID,'half_all_score',true)));?></font></td><td width="38%" align="center" bgcolor="#FFFFFF"><font color="#666666" size="+1"><?php print_r(get_post_meta($post->ID,'away_points',true));?></font></td>
</tr>
</table>




<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#e7e7e7">
  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'goal_home',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">E:{148}</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'goal_away',true)));?></font></td>
  </tr>
  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'foul_home',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#FFCC00">■</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'foul_away',true)));?></font></td>
  </tr>
  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'home_leave',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#FF0000">■</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'away_leave',true)));?></font></td>
  </tr>
  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'home_change',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">E:{225}</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'away_change',true)));?></font></td>
  </tr>

  <tr>
    <td colspan="3" bgcolor="#FFFFFF" align="center"><font size="-1" color="#666666">ﾒﾝﾊﾞｰ</font></td>
  </tr>
<!--
  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(get_post_meta($post->ID,'home_goal_keeper',true));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">GK</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(get_post_meta($post->ID,'away_goal_keeper',true));?></font></td>
  </tr>

  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'home_defense',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">DF</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'away_defense',true)));?></font></td>
  </tr>

  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'home_midfielder',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">MF</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'away_midfielder',true)));?></font></td>
  </tr>

  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'home_forward',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">FW</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'away_forward',true)));?></font></td>
  </tr>
-->
  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'home_teamst',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">11</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'away_teamst',true)));?></font></td>
  </tr>
  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'home_sub',true)));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">SU</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(nl2br(get_post_meta($post->ID,'away_sub',true)));?></font></td>
  </tr>

  <tr>
    <td width="44%" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(get_post_meta($post->ID,'home_commanding_officer',true));?></font></td>
	<td width="12%" bgcolor="#e7e7e7" align="center"><font size="-1" color="#666666">CO</font></td>
    <td width="44%" align="right" bgcolor="#FFFFFF"><font size="-1" color="#666666"><?php print_r(get_post_meta($post->ID,'away_commanding_officer',true));?></font></td>
  </tr>

</table>


<?php endif; ?>

</font>



<?php ks_footer(); ?>