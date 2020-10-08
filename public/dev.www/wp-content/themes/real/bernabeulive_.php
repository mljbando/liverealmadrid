<?php
/**
 * @package WordPress
 * @subpackage real
 */
/*
Template Name: xxxxxxxxx
*/
?>


<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>


<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">


		<div id="contentsarea" class="clearfix">


<div id="bernabeulive">

<ul>

<?php
    /* User ID, Token */
    $instagramUserID = 8423901313;
    $instagramToken  = '8423901313.66ce3e3.ce2812ac80f54aafacd43c36658ebf59';
 
    /* Get API ( Require HTTPS ) JSON Convert */
    $instagramApiURI    = 'https://api.instagram.com/v1/users/'.$instagramUserID.'/media/recent?access_token='.$instagramToken.'&count=20';
    $instagramDates = json_decode(file_get_contents($instagramApiURI));

    /* Loop Start */
    foreach((array) $instagramDates->data as $instagramData):

?>
<li>
<a href="<?php echo $instagramData->link; ?>" target="_blink" />
<div class="photo"><img src="<?php echo $instagramData->images->standard_resolution->url; ?>" alt="ベルナベウLIVE！" /></div>
<div class="date newsdate"><?php echo date('Y.m.d H:i', $instagramData->created_time+(9 * 60 * 60)); ?></div>
<div class="newstext"><?php echo nl2br($instagramData->caption->text); ?></div>
</a>
</li>
<?php endforeach; ?>

</ul>

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