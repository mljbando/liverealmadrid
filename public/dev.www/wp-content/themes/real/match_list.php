<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: 試合日程一覧ページ
 */
 
/**********************
 * テーブルの出力方法 *
 **********************

// すべてのデータを出力（idはTablepress参照）
<?php echo do_shortcode( '[table id=2 /]' ); ?>

// 最初のカラムがLGであるデータだけを出力
<?php echo do_shortcode( '[table-while id=2 key="LG"/]' );  ?>

// デフォルトでは最初のカラムを表示しているので
// 非表示にする場合は"key_disp=0"を追記
<?php echo do_shortcode( '[table-while id=2 key="LG" key_disp=0/]' );  ?>
*/
?>


<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>

<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">


		<div id="contentsarea" class="clearfix">

			<div id="matchlist">

			<ul class="tabmenu">
					    <li><a href="#sche0">全て</a></li>
					    <li><a href="#sche1">LIGA</a></li>
					    <li><a href="#sche2">UCL</a></li>
					    <li><a href="#sche3">COPA</a></li>
					    <li><a href="#sche4">その他</a></li>
			</ul>


<div class="content">


<div class="tabbox" id="sche0" style="display:block;">
<div id="ALL">
<?php echo do_shortcode( '[table id=2 key="ALL" /]' ); ?>
</div>
</div>


<div class="tabbox" id="sche1" style="display:none;">
<div id="LG">
<?php echo do_shortcode( '[table-while id=2 key="LG" key_disp=1 /]' ); ?>
</div>
</div>


<div class="tabbox" id="sche2" style="display:none;">
<div id="CL">
<?php echo do_shortcode( '[table-while id=2 key="CL" key_disp=1 /]' ); ?>
</div>
</div>


<div class="tabbox" id="sche3" style="display:none;">
<div id="CO">
<?php echo do_shortcode( '[table-while id=2 key="CO" key_disp=1 /]' ); ?>
</div>
</div>


<div class="tabbox" id="sche4" style="display:none;">
<div id="FM">
<?php echo do_shortcode( '[table-while id=2 key="FM" key_disp=1 /]' ); ?>
</div>
</div>




</div><!--/content-->


		</div><!--/matchlist-->





		</div><!--/contentsarea-->



<div id="temporada">
<ul>
<li><a href="match1819">2018-19</a></li>
<li><a href="match1718">2017-18</a></li>
<li><a href="match1617">2016-17</a></li>
<li><a href="match1516">2015-16</a></li>
<li><a href="match1415">2014-15</a></li>
</ul>
</div><!--/temporada-->


</div><!--/contentsleft-->


<div id="sp">
<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
</div>







</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>