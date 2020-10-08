<?php
/* @package WordPress
 * @subpackage Classic_Theme
 */
$page = get_page(get_the_ID());
$slug = $page->post_name;
?>




<div id="contentsright" class="clearfix">


<script>
//document.getElementsByClassName('pds-pd-link')[0].style.display = 'none';
</script>



<?php if( have_comments() ): // コメントがあれば ?>
	<div id="sidebox-comment">
		<?php comments_template('/comments-sidebar.php'); ?>
	</div><!--/sidebox-comment-->
<?php else: // コメントがなければ ?>
<?php endif; // コメントがあれば ?>



<?php
if('match'!==get_post_type()):// 試合詳細ページでは非表示
?>


<?php
/*検索/////////////////////////////*/
?>
<?php get_search_form(); ?>
<?php
/*/////////////////////////////検索*/
?>


<?php get_sidebar('match'); ?>
<?php
endif;// 'match'!==get_post_type()
?>


<!--
<div id="sidebar" class="clearfix">
<ul id="bnrarea_b">
<li><a href="/video" rel="noreferrer"><div id="indexTopBnr"><!--ajax bnr1--><!--</div><img class="spbnr" src="/images/index/bnr_video.gif" alt="" /></a></li>
</ul>
</div>
-->
<div id="sidebar" class="clearfix">

<div class="bnrwrapper">
<a href="/video" rel="noreferrer"><img src="/images/index/bnr_video.jpg" alt="" />
<span class="bnrvideos"><i class="fas fa-video"></i> VIDEOS</span></a>
</div>

</div>


<?php
/*週間アクセスランキング/////////////////////////////*/
?>

<?php include (TEMPLATEPATH . '/sidebar-ranking.php'); ?>

<?php
/*/////////////////////////////週間アクセスランキング*/
?>




<?php
//if($slug!=='match'): // 試合日程ページでは非表示
if(true):
?>
<?php get_sidebar('sche'); ?>
<?php
endif;// $slug!=='match'
?>


<?php
if($slug!=='uclclasificaciones'):// uclclasificacionesでは非表示
?>




<div id="sidebox-tabchenge">
<div class="sideboxline"></div>
<h2><i class="fa fa-trophy" style="padding-right:6px;"></i>CL結果</h2>


		<ul class="tabbt">
			<li><a href="javascript:void(0);" class="btn_act active">CLGS</a></li>
			
		</ul>
</div>



<div id="motion_area1" class="motion">
	<div id="sidebox-tablecl">
		<?php echo do_shortcode( '[table id=7 /]' ); ?>
	<div id="clascompe">
		<ul>
		<li><a href="/uclclasificaciones"><i class="fa fa-angle-right fa-lg"></i>CLGS順位表</a></li>
		</ul>
	</div>

	</div>
</div>




<?php
/*
<div id="motion_area2" class="motion">
<div id="sidebox-tablefr">
	<?php echo do_shortcode( '[table id=8 /]' ); ?>
</div>
</div>

<div id="motion_area3" class="motion">
	<div id="sidebox-tablefr">
	<?php echo do_shortcode( '[table id=14 /]' ); ?>
	</div>
</div>

<div id="motion_area4" class="motion">
	<div id="sidebox-tablefr">
	<?php echo do_shortcode( '[table id=13 /]' ); ?>
	</div>
</div>

<div id="motion_area5" class="motion">
	<div id="sidebox-tablefr">
	<?php echo do_shortcode( '[table id=12 /]' ); ?>
	</div>
</div>
*/
?>


<?php
/*

<div id="motion_area4" class="motion">
	<div id="sidebox-tablefr">
	<?php echo do_shortcode( '[table id=14 /]' ); ?>
	</div>
</div>



<div id="motion_area6" class="motion">
	<div id="sidebox-tablefr">
	<?php echo do_shortcode( '[table id=12 /]' ); ?>
	</div>
</div>



<div id="motion_area6" class="motion">
	<div id="sidebox-tablefr">
		//?php echo do_shortcode( '[table id=24 /]' ); ?>
	</div>
</div>


<div id="motion_area6" class="motion">
	<div id="sidebox-tablefr">
		<?php echo do_shortcode( '[table id=24 /]' ); ?>
	</div>
</div>

<div id="motion_area7" class="motion">
	<div id="sidebox-tablefr">
		<?php echo do_shortcode( '[table id=37 /]' ); ?>
	</div>
</div>

<div id="motion_area8" class="motion">
	<div id="sidebox-tablefr">
		<?php echo do_shortcode( '[table id=36 /]' ); ?>
	</div>
</div>
*/
?>

<?php
endif; $slug!=='uclclasificaciones'
?>

<div class="clearfix"></div>

<?php
if($slug!=='clasificacion'):// 順位表ページでは非表示
?>

<div id="sidebox-table">
<div class="sideboxline"></div>
<h2><i class="fa fa-random" style="padding-right:6px;"></i>リーガ順位表</h2>

<?php echo do_shortcode( '[table id=1 /]' ); ?>
<div id="clascompe">
	<ul>
	<li><a href="/clasificacion"><i class="fa fa-angle-right fa-lg"></i>順位表詳細</a></li>
	</ul>
</div>
</div>

<?php
endif; $slug!=='clasificacion'
?>



<?php
if($slug!=='halamadrid-y-nada-mas'):// halamadrid-y-nada-masでは非表示
?>
<div id="sidebar" class="clearfix">
	<ul id="bnrarea">
	<li><a href="/halamadrid-y-nada-mas"><img src="/images/bana_ynadamas_.png" alt="" /></a></li>
	</ul>
</div>
<?php
endif; $slug!=='halamadrid-y-nada-mas'
?>


<?php
//<div id="sidebar" class="clearfix">
//	<ul id="bnrarea">
//	<li><a href="https://goo.gl/8eCbKr" target="_blank" rel="noreferrer"><img src="/images/index/ronald.png" width="300" /></a></li>	<li><a href="https://goo.gl/vfDaUW" target="_blank" rel="noreferrer"><img src="/images/index/crbalondor2017.png" width="300" /></a></li>
//	</ul>
//</div>
?>


</div>
