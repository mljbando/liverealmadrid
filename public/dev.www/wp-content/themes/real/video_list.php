<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: video
 */
 

?>

<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>





<div id="contents" class="clearfix">

	<div id="contentsarea" class="clearfix">



<div id="video">

<div class="videotitle"><i class="fas fa-video" style="padding-right:6px;"></i>2020-2021シーズン 試合ハイライト映像</div>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php the_content(); ?>

<?php endwhile; endif; ?>

</div>


	</div><!--/contents-->


<div id="temporada">
<ul>
<li><a href="/video20192020">2019-20</a></li>
<li><a href="/video20182019">2018-19</a></li>
<li><a href="/video20172018">2017-18</a></li>
<li><a href="/video20162017">2016-17</a></li>
</ul>
</div><!--/temporada-->



</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>