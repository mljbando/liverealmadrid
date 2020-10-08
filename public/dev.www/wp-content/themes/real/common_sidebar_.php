<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
$page = get_page(get_the_ID());
$slug = $page->post_name;
?>


<div id="contentsright" class="clearfix">

<!--
<div id="sidebox-video">
<h2>試合ハイライト</h2>
<iframe width="300" height="150" src="//www.youtube.com/embed/videoseries?list=PL9fbEa9Xai5-8NQL_ws_ZN-QR_QQc_3C5&wmode=opaque&modestbranding=0&showinfo=0&fs=0&controls=1&autohide=1" frameborder="0" allowfullscreen></iframe>
</div>
-->




<script>
document.getElementsByClassName('pds-pd-link')[0].style.display = 'none';
</script>



<?php if( have_comments() ): // コメントがあれば ?>
	<div id="sidebox-comment">
		<?php comments_template('/comments-sidebar.php'); ?>
	</div><!--/sidebox-comment-->
<?php else: // コメントがなければ ?>
<?php endif; // コメントがあれば ?>





<?php
// 試合詳細ページでは非表示
if('match'!==get_post_type()):
?>

<!--partido-->
	<div id="sidebox-live">
		<?php get_sidebar('match'); ?>
	</div>
	<!--/sidebox-live-->

<?php
endif;// 'match'!==get_post_type()
?>


<?php
// 試合日程ページでは非表示
//if($slug!=='match'):
if(true):
?>


	<div id="sidebox-sche">
		<?php get_sidebar('sche'); ?>
	</div>

		<!--/sidebox-sche-->

<?php
endif;// $slug!=='match'
?>





<div id="sidebox-tabchenge">
	<div class="sideboxline"></div>
		<h2>CL</h2>
		<ul class="tabbt">
			<!--<li><a href="javascript:void(0);" class="btn_act active">FINAL</a></li>
			<li><a href="javascript:void(0);" class="btn_act">SF</a></li>
			<li><a href="javascript:void(0);" class="btn_act">QF</a></li>
			<li><a href="javascript:void(0);" class="btn_act">R16</a></li>-->
			<li><a href="javascript:void(0);" class="btn_act active">GS</a></li>
		</ul>
</div>

<!--
<div id="motion_area1" class="motion">
	<div id="sidebox-tablefr">
		<?php echo do_shortcode( '[table id=11 /]' ); ?>
	</div>
</div>

<div id="motion_area2" class="motion">
	<div id="sidebox-tablefr">
		<?php echo do_shortcode( '[table id=10 /]' ); ?>
	</div>
</div>

<div id="motion_area3" class="motion">
	<div id="sidebox-tablefr">
		<?php echo do_shortcode( '[table id=9 /]' ); ?>
	</div>
</div>

<div id="motion_area4" class="motion">
	<div id="sidebox-tablefr">
		<?php echo do_shortcode( '[table id=8 /]' ); ?>
	</div>
</div>
-->
<div id="motion_area1" class="motion">
	<div id="sidebox-tablecl">
		<?php echo do_shortcode( '[table id=7 /]' ); ?>
	</div>
</div>


<?php
// 順位表ページでは非表示
if($slug!=='clasificacion'):
?>



	<div id="sidebox-table">
		<div class="sideboxline"></div>
		<h2>リーガ順位表</h2>

<?php echo do_shortcode( '[table id=1 /]' ); ?>

			<div id="clascompe">
				<ul>
					<li><a href="/clasificacion"><i class="fa fa-angle-right fa-lg"></i>順位表詳細</a></li>
				</ul>
			</div><!--/schecompe-->
			
	</div><!--/sidebox-table-->



<?php
// halamadrid-y-nada-masでは非表示
if($slug!=='halamadrid-y-nada-mas'):
?>

	<div id="sidebar">
		<ul id="bnrarea">
			<li><a href="/halamadrid-y-nada-mas"><img src="/images/bana_ynadamas_.png" alt="" /></a></li>
		</ul>
	</div>

<?php
endif;// $slug!=='halamadrid-y-nada-mas'
?>



	<div id="sidebar">
		<ul id="bnrarea">
			<li><a href="mailto:?subject=Live!RealMadridURL&amp;body=URLを携帯に送る→http://liverealmadrid.jp/"><img src="/images/banaA.jpg" alt="" /></a></li>
		</ul>
	</div><!--/sidebar-->



<div id="sidebar">

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- pub2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-5130560008224955"
     data-ad-slot="6417585623"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div><!--/sidebar-->




<?php
endif;// $slug!=='clasificacion'
?>

</div><!--/contentsright-->