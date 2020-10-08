<?php
/**
 * @package WordPress
 * @subpackage real
 */
/*
Template Name: ベルナベウLIVE用テンプレート
*/
?>


<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>


<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">


		<div id="contentsarea" class="clearfix">


<div id="bernabeulive">

<div class="clasificaciontitle">ベルナベウLIVE!</div>


<!-- SnapWidget -->
<script src="https://snapwidget.com/js/snapwidget.js"></script>
<iframe src="https://snapwidget.com/embed/793297" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>




</div>

			<div id="plink" class="clearfix">
				<div class="pnavi">
				<div class="pleft"></div>
				<div class="pright"><a href="/bernabeu">次へ <i class="fa fa-angle-right"></i></a></div>
				</div>
			</div>




		</div><!--/contentsarea-->


</div><!--/contentsleft-->



<div id="contentsright" class="clearfix">


<?php
/*検索/////////////////////////////*/
?>
<div id="sidebarpc">
<form method="get" class="searchform" action="<?php bloginfo('url'); ?>">
<input type="text" placeholder="" name="s" class="searchfield" value="">
<input type="submit" value="" alt="検索" title="検索" class="searchsubmit">
</form>
</div>
<?php
/*/////////////////////////////検索*/
?>


<div id="sidebar" class="clearfix">

<div class="bnrwrapper">
<a href="/video" rel="noreferrer"><div id="indexTopBnr"><!--ajax bnr1--></div>
<img class="spbnr" src="/images/index/bnr_video.gif" alt="" />
<span class="bnrvideos"><i class="fas fa-video"></i> VIDEOS</span></a>
</div>

</div>


<?php include (COMMONTEMPLATEPATH . '/sidebar-ranking.php'); ?>

<?php include (COMMONTEMPLATEPATH . '/sidebar-match.php'); ?>

<?php include (COMMONTEMPLATEPATH . '/sidebar-sche.php'); ?>

</div>

</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>