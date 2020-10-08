<?php
/* @package WordPress
 * @subpackage Default_Theme
 * Template Name: clasificacion
*/
?>
<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>


<div id="contents" class="clearfix">
	<div id="contentsleft" class="clearfix">
		<div id="contentsarea" class="clearfix">


<div id="clasificacion">


<div class="clasificaciontitle">リーガ順位表</div>
<?php echo do_shortcode( '[table id=1 /]' ); ?>




			<div id="plink" class="clearfix">
				<div class="pnavi">
				<div class="pleft"><a href="#" onClick="history.back(); return false;"><i class="fa fa-angle-left"></i> 戻る</a></div>
				</div>
			</div>
</div>
</div>

<div id="temporada">
<ul>
<li><a href="clasificacion1920">2019-20</a></li>
<li><a href="clasificacion1819">2018-19</a></li>
<li><a href="clasificacion1718">2017-18</a></li>
<li><a href="clasificacion1617">2016-17</a></li>
<li><a href="clasificacion1516">2015-16</a></li>
<li><a href="clasificacion1415">2014-15</a></li>
</ul>
</div><!--/temporada-->

	</div><!--/contentsleft-->

<div id="sp">
<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
</div>
</div>
<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>