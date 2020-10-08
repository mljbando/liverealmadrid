<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: video20172018
 */
 

?>

<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>






<div id="contents" class="clearfix">
	<div id="contentsleft" class="clearfix">
		<div id="contentsarea" class="clearfix">





<div class="videotitle"><i class="fas fa-video" style="padding-right:6px;"></i>2017-2018シーズン 試合ハイライト映像</div>


			<div id="matchlist">

			<ul class="tabmenu">
					    <li><a href="#sche0">2017-18</a></li>
					    <li><a href="#sche1">LIGA</a></li>
					    <li><a href="#sche2">UCL</a></li>
					    <li><a href="#sche3">COPA</a></li>
					    <li><a href="#sche4">その他</a></li>
			</ul>


<div class="content">


<div class="tabbox" id="sche0" style="display:block;">
<div id="ALL">
<?php echo do_shortcode( '[table id=60 key="ALL" /]' ); ?>
</div>
</div>


<div class="tabbox" id="sche1" style="display:none;">
<div id="LG">
<?php echo do_shortcode( '[table-while id=60 key="LG" key_disp=1 /]' ); ?>
</div>
</div>


<div class="tabbox" id="sche2" style="display:none;">
<div id="CL">
<?php echo do_shortcode( '[table-while id=60 key="CL" key_disp=1 /]' ); ?>
</div>
</div>


<div class="tabbox" id="sche3" style="display:none;">
<div id="CO">
<?php echo do_shortcode( '[table-while id=60 key="CO" key_disp=1 /]' ); ?>
</div>
</div>


<div class="tabbox" id="sche4" style="display:none;">
<div id="FM">
<?php echo do_shortcode( '[table-while id=60 key="FM" key_disp=1 /]' ); ?>
</div>
</div>



		</div><!--/contentsarea-->
		</div><!--/content-->

		</div><!--/matchlist-->




<div id="temporada">
<ul>
<li><a href="/video20192020">2019-20</a></li>
<li><a href="/video20182019">2018-19</a></li>
<li><a href="/video20172018">2017-18</a></li>
<li><a href="/video20162017">2016-17</a></li>
</ul>
</div><!--/temporada-->



</div><!--/contentsleft-->



<div id="sp">
<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
</div>


</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>