<?php
/**
 * @package WordPress
 * @subpackage real
 */
?>

<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>


<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">

		<div id="contentsarea" class="clearfix">




<div id="spaera" class="clearfix">


#%funcparts:GET_USER_STATUS%#
#%element:VISIBLE user_status="nomember,unknown"%#
<div class="accordion-box">
  <input id="ac00" type="" onClick="location.href='/login?returl=#%funcword:req_url urlenc="1"%#'">
</div>
#%/element%#



<?php
/*
SP nomember,unknown
*/
?>
#%funcparts:GET_USER_STATUS%#
#%element:VISIBLE user_status="nomember,unknown"%#
<div class="accordion-box">
  <input id="ac00" type="checkbox" onClick="location.href='/login?returl=#%funcword:req_url urlenc="1"%#'">
  <label for="ac00"></label>

<div id="singlenews" class="clearfix">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="newsheader" class="clearfix">

<div class="newsdate"><?php the_time('Y.m.d H:i'); ?></div>
<div class="newscate">
<?php $cats = wp_get_post_terms($post->ID, 'news_category');
foreach($cats as $cat){
	if($cat !== reset($cats)) echo ',';
	echo $cat->name;
}
?>
</div>

</div><!--/newsheader-->


<div class="newstitle"><?php the_title(); ?></div>

<?php remove_filter('the_content', 'wpautop'); ?>

<div class="newstext">

<?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?>
<?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?>

<?php
/*
php the_post_thumbnail('large');
*/
?>

<div style="margin:10px 0;"></div>

<?php the_content(); ?>

<?php
	endwhile;
endif; ?>

<?php
/*
<p><strong><a href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>&hashtags=レアルマドリード,RealMadrid,HalaMadrid" data-count="none" data-lang="ja" target="_blank"> <font color="#00489b">＞この記事をマドリディスタへ共有・拡散しよう!</font></a></strong></p>
*/
?>

<ul class="snsbtn">
<li class="twbtn"><a href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>&hashtags=レアルマドリード" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
<li class="fbbtn"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&t=<?php the_title() ?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
<li class="libtn"><a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>" target="_blank"><img class="libtnpic" src="/images/common/line-icon-300.png" alt="LINEで送る" /></a></li>
</ul>

</div>
</div>
</div><!--/singlenews-->
#%/element%#





<?php
/*
SP member
*/
?>


#%funcparts:GET_USER_STATUS%#
#%element:VISIBLE user_status="member"%#
<div id="singlenews" class="clearfix">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="newsheader" class="clearfix">

<div class="newsdate"><?php the_time('Y.m.d H:i'); ?></div>
<div class="newscate">
<?php $cats = wp_get_post_terms($post->ID, 'news_category');
foreach($cats as $cat){
	if($cat !== reset($cats)) echo ',';
	echo $cat->name;
}
?>
</div>

</div><!--/newsheader-->


<div class="newstitle"><?php the_title(); ?></div>

<?php remove_filter('the_content', 'wpautop'); ?>

<div class="newstext">

<?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?>
<?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?>

<?php
/*
php the_post_thumbnail('large');
*/
?>

<div style="margin:10px 0;"></div>

<?php the_content(); ?>

<?php
	endwhile;
endif; ?>

<?php
/*
<p><strong><a href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>&hashtags=レアルマドリード,RealMadrid,HalaMadrid" data-count="none" data-lang="ja" target="_blank"> <font color="#00489b">＞この記事をマドリディスタへ共有・拡散しよう!</font></a></strong></p>
*/
?>

<ul class="snsbtn">
<li class="twbtn"><a href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>&hashtags=レアルマドリード" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
<li class="fbbtn"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&t=<?php the_title() ?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
<li class="libtn"><a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>" target="_blank"><img class="libtnpic" src="/images/common/line-icon-300.png" alt="LINEで送る" /></a></li>
</ul>

</div>

	<?php
	if (is_device()==="pc"){
		comments_template('/comments-footer.php');
	//	comments_template('/comments.php');
	}
	else{
		comments_template('/comments.php');
	}
	?>

</div><!--/singlenews-->





#%/element%#



</div><!--/spaera-->




<div id="pcaera" class="clearfix">
<div id="singlenews" class="clearfix">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="newsheader" class="clearfix">

<div class="newsdate"><?php the_time('Y.m.d H:i'); ?></div>
<div class="newscate">
<?php $cats = wp_get_post_terms($post->ID, 'news_category');
foreach($cats as $cat){
	if($cat !== reset($cats)) echo ',';
	echo $cat->name;
}
?>
</div>

</div><!--/newsheader-->


<div class="newstitle"><?php the_title(); ?></div>

<?php remove_filter('the_content', 'wpautop'); ?>

<div class="newstext">

<?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?>
<?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?>

<?php
/*
php the_post_thumbnail('large');
*/
?>

<div style="margin:10px 0;"></div>

<?php the_content(); ?>

<?php
	endwhile;
endif; ?>

<?php
/*
<p><strong><a href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>&hashtags=レアルマドリード,RealMadrid,HalaMadrid" data-count="none" data-lang="ja" target="_blank"> <font color="#00489b">＞この記事をマドリディスタへ共有・拡散しよう!</font></a></strong></p>
*/
?>

<ul class="snsbtn">
<li class="twbtn"><a href="http://twitter.com/share?text=<?php the_title() ?>&url=<?php the_permalink() ?>&hashtags=レアルマドリード" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
<li class="fbbtn"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&t=<?php the_title() ?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
<li class="libtn"><a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>" target="_blank"><img class="libtnpic" src="/images/common/line-icon-300.png" alt="LINEで送る" /></a></li>
</ul>

</div>

</div><!--/singlenews-->
</div><!--/pcaera-->



				<script>
				document.getElementsByClassName('pds-pd-link')[0].style.display = 'none';
				</script>
			<div id="plink" class="clearfix">
				<div class="pnavi">
				<div class="pleft"><a href="#" onClick="history.back(); return false;"><i class="fa fa-angle-left"></i> 戻る</a></div>
				<div class="pright"><?php previous_post_link('%link','次へ <i class="fa fa-angle-right"></i>') ?></div>
				</div>
			</div>


<?php /*
<div class="relatednews">
	<div class="related_postsnews">
		<?php if ( function_exists( "get_yuzo_related_posts" ) ) { get_yuzo_related_posts(); } ?>
	</div>
</div>
*/?>
		</div><!--/contentsarea-->







</div><!--/contentsleft-->


<div id="contentsright" class="clearfix">


<script>
//if(document.getElementsByClassName('pds-pd-link'))
//	document.getElementsByClassName('pds-pd-link')[0].style.display = 'none';
$('.pds-pd-link:first').hide();
</script>
<div id="pcaera" class="clearfix">
<?php if( have_comments() ): // コメントがあれば ?>
		<?php comments_template('/comments-sidebar.php'); ?>
<?php endif; // コメントがあれば ?>
</div>

<?php
/*検索/////////////////////////////*/
?>
<?php get_search_form(); ?>
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




<div id="pcaera" class="clearfix">
<div id="contentsleft" class="clearfix">


<?php
if (is_device()==="pc"){
	comments_template('/comments.php');
//	comments_template('/comments.php');
}
else{
	comments_template('/comments.php');
}
?>
</div>
</div>


</div><!--/contents-->




<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>