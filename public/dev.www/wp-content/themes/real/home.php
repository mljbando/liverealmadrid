<?php
/**
 * @package WordPress
 * @subpackage real
 */
?>
<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>



<?php // 2017.03.13 停止 include (COMMONTEMPLATEPATH . '/file_youtube.php'); ?>


<!-- youtube -->
<div id="visual">
<ul>


<?php
// youtube 表示設定

$url = "https://www.youtube.com/feeds/videos.xml?channel_id=UCWV3obpZVGgJ3j9FVhEjF2Q";
$rss = file_get_contents($url);
$rss = preg_replace("/<([^>]+?):(.+?)>/", "<$1_$2>", $rss);
$rss = simplexml_load_string($rss,'SimpleXMLElement',LIBXML_NOCDATA);
$display_count    = 1; // youtube表示件数カウント (default=1)
$display_limit_pc = 3; // PC 表示件数
$display_limit_sp = 3; // SP 表示件数
if (is_device()==="pc"):
foreach($rss->entry as $value): ?>
   <li><img src="http://img.youtube.com/vi/<?php echo htmlspecialchars($value->yt_videoId, ENT_QUOTES, 'UTF-8') ?>/hqdefault.jpg" width="100%" min-height="330" data-video="http://www.youtube.com/embed/<?php echo htmlspecialchars($value->yt_videoId, ENT_QUOTES, 'UTF-8') ?>?theme=light&showinfo=0&autohide=1" frameborder="0" allowfullscreen></li>
<?php
  if ($display_count++==$display_limit_pc) {
    break;
  }
 endforeach;
endif;
?>
</ul>

<script type="text/javascript">
// <![CDATA[
$('img').click(function(){
video = '<iframe width="100%" height="330" src="'+ $(this).attr('data-video') +'" ?theme=light&showinfo=0&autohide=1" frameborder="0" allowfullscreen></iframe>';
$(this).replaceWith(video);
});
// ]]></script>

</div>




<div id="contents" class="clearfix">
<div id="contentsleft" class="clearfix">
<div id="contentsarea" class="clearfix">


<!-- SP visual -->

<div id="visualsp" style="text-align:center;">
<ul class="bxslider">

<?php
if(is_device()==="sp"):
  $display_count    = 1;
	foreach ($rss->entry as $value):
?>
<li><iframe width="320" height="180" src="//www.youtube.com/embed/<?php echo htmlspecialchars($value->yt_videoId, ENT_QUOTES, 'UTF-8')?>?theme=light&showinfo=0&autohide=1" frameborder="0" allowfullscreen></iframe></li>
<?php
    if ($display_count++==$display_limit_sp) {
      break;
    }
	endforeach;
endif;
?>

</ul>

<script>
/*bxslider*/$(document).ready(function(){$(".bxslider").bxSlider({auto:!0,controls:!0})});
</script>
</div>

<!-- // youtube -->

<div id="visualsp">
#%freeparts:infobar_link design_no="1"%#
</div>






<div id="sidebox-liveSPTOP">
#%cond from="201503110100" to="201503111700"%#
<div id="spspace"></div>
<div id="livebtarea">
	<p class="livebt"><a href="/match/ucl201415_fr162"><span>ライブスコア</span></a>
</div><!--/livebtarea-->
#%/cond%#
</div>



<div id="sidebarsp" class="clearfix">
<form method="get" class="searchform" action="<?php bloginfo('url'); ?>">
<input type="text" placeholder="" name="s" class="searchfield" value="">
<input type="submit" value="" alt="検索" title="検索" class="searchsubmit">
</form>
</div>



<div id="news">

<div class="nav-wrap">
<div class="scroll-nav">
	<ul class="tabmenu">
	    <li><a href="#newscate0">すべて</a></li><li><a href="#newscate1">マドリード通信</a></li><li><a href="#newscate2">公式声明</a></li><li><a href="#newscate3">招集メンバー</a></li><li><a href="#newscate4">記者会見</a></li><li><a href="#newscate5">メディカルレポート</a></li>
	</ul>
</div>
</div>
<div class="content">
	<div class="tabbox" id="newscate0">
<?php
// pタグ整形を停止
remove_filter ('the_content', 'wpautop');
	// post_typeがnewsの記事を6件出力する
	$all = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 6
			,'no_found_rows' => true
			,'update_post_meta_cache' => false) );
	// 一件一件出力する
	while ( $all->have_posts() ) : $all->the_post();
		// 一件目の場合のみ出力
		if($all->current_post === 0){
?>
	<ul class="newslist">
<?php
};
// newsloop start. ?>
	<li>
		<a href="<?php the_permalink(); ?>">
		<?php if(has_post_thumbnail()): ?><span class="newspic"><?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?></span>
		<?php elseif(get_field('insertpic')): ?><span class="newspic"><?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?></span><?php else : ?>
		<span class="newspic"><img src="/images/common/Official.png" alt="ライブレアルマドリード" title="ライブレアルマドリード"></span><?php endif; ?>
		<span class="newsdate"><?php the_time('Y.m.d H:i'); ?></span>
		<span class="newscate"><?php
		$cats = get_the_terms( $post->ID, 'news_category');
		foreach($cats as $cat){
			if($cat !== reset($cats)) echo ',';
			echo $cat->name;
		}?></span>
		<span class="topnewstitle"><?php the_title(); ?></span>
		</a>
	</li>
<?php	// newsloop end.
	endwhile;
	// 投稿データをリセット
	wp_reset_postdata();
?>
	</ul>
	<div class="read-next"><a href="/news">一覧へ <i class="fa fa-angle-right fa-lg"></i></a></div>
	</div>

	<div class="tabbox" id="newscate1">
<?php
// post_typeがnewsでカテゴリーがnewsの記事を6件出力する
	$news = new WP_Query(
		array( 'post_type' => 'news'
			, 'posts_per_page' => 6
			,'no_found_rows' => true
			,'update_post_meta_cache' => false
			, 'tax_query' => array( array('field' => 'slug','taxonomy' => 'news_category',
					'terms' => 'madrid',// 指定スラッグ
			)))
		);
	// 一件一件出力する
	while ( $news->have_posts() ) : $news->the_post();
		// 一件目の場合のみ出力
		if($news->current_post === 0){
?>
	<ul class="newslist">
<?php
};
// newsloop start. ?>
	<li>
		<a href="<?php the_permalink(); ?>">
		<?php if(has_post_thumbnail()): ?><span class="newspic"><?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?></span>
		<?php elseif(get_field('insertpic')): ?><span class="newspic"><?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?></span><?php else : ?>
		<span class="newspic"><img src="/images/common/Official.png" alt="ライブレアルマドリード" title="ライブレアルマドリード"></span><?php endif; ?>
		<span class="newsdate"><?php the_time('Y.m.d H:i'); ?></span>
		<span class="newscate"><?php
		$cats = get_the_terms( $post->ID, 'news_category');
		foreach($cats as $cat){
			if($cat !== reset($cats)) echo ',';
			echo $cat->name;
		}?></span>
		<span class="topnewstitle"><?php the_title(); ?></span>
		</a>
	</li>
<?php	// newsloop end.
	endwhile;
	// 投稿データをリセット
	wp_reset_postdata();
?>
	</ul>
	<div class="read-next"><a href="/news_category/madrid">一覧へ <i class="fa fa-angle-right fa-lg"></i></a></div>
	</div>

	<div class="tabbox" id="newscate2">
<?php
	// post_typeがnewsでカテゴリーがnewsの記事を6件出力する
	$news = new WP_Query(
		array( 'post_type' => 'news'
			, 'posts_per_page' => 6
			,'no_found_rows' => true
			,'update_post_meta_cache' => false
			, 'tax_query' => array( array('field' => 'slug','taxonomy' => 'news_category',
					'terms' => 'comunicado-oficial',// 指定スラッグ
			)))
		);
	// 一件一件出力する
	while ( $news->have_posts() ) : $news->the_post();
		// 一件目の場合のみ出力
		if($news->current_post === 0){
?>
	<ul class="newslist">
<?php
};
// newsloop start. ?>
	<li>
		<a href="<?php the_permalink(); ?>">
		<?php if(has_post_thumbnail()): ?><span class="newspic"><?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?></span>
		<?php elseif(get_field('insertpic')): ?><span class="newspic"><?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?></span><?php else : ?>
		<span class="newspic"><img src="/images/common/Official.png" alt="ライブレアルマドリード" title="ライブレアルマドリード"></span><?php endif; ?>
		<span class="newsdate"><?php the_time('Y.m.d H:i'); ?></span>
		<span class="newscate"><?php
		$cats = get_the_terms( $post->ID, 'news_category');
		foreach($cats as $cat){
			if($cat !== reset($cats)) echo ',';
			echo $cat->name;
		}?></span>
		<span class="topnewstitle"><?php the_title(); ?></span>
		</a>
	</li>
<?php	// newsloop end.
	endwhile;
	// 投稿データをリセット
	wp_reset_postdata();
?>
	</ul>
	<div class="read-next"><a href="/news_category/comunicado-oficial">一覧へ <i class="fa fa-angle-right fa-lg"></i></a></div>
	</div>

	<div class="tabbox" id="newscate3">
<?php
	// post_typeがnewsでカテゴリーがnewsの記事を6件出力する
	$news = new WP_Query(
		array( 'post_type' => 'news'
			, 'posts_per_page' => 6
			,'no_found_rows' => true
			,'update_post_meta_cache' => false
			, 'tax_query' => array( array('field' => 'slug','taxonomy' => 'news_category',
					'terms' => 'convocatoria',// 指定スラッグ
			)))
		);
	// 一件一件出力する
	while ( $news->have_posts() ) : $news->the_post();
		// 一件目の場合のみ出力
		if($news->current_post === 0){
?>
	<ul class="newslist">
<?php
};
// newsloop start. ?>
	<li>
		<a href="<?php the_permalink(); ?>">
		<?php if(has_post_thumbnail()): ?><span class="newspic"><?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?></span>
		<?php elseif(get_field('insertpic')): ?><span class="newspic"><?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?></span><?php else : ?>
		<span class="newspic"><img src="/images/common/Official.png" alt="ライブレアルマドリード" title="ライブレアルマドリード"></span><?php endif; ?>
		<span class="newsdate"><?php the_time('Y.m.d H:i'); ?></span>
		<span class="newscate"><?php
		$cats = get_the_terms( $post->ID, 'news_category');
		foreach($cats as $cat){
			if($cat !== reset($cats)) echo ',';
			echo $cat->name;
		}?></span>
		<span class="topnewstitle"><?php the_title(); ?></span>
		</a>
	</li>
<?php	// newsloop end.
	endwhile;
	// 投稿データをリセット
	wp_reset_postdata();
?>
	</ul>
	<div class="read-next"><a href="/news_category/convocatoria">一覧へ <i class="fa fa-angle-right fa-lg"></i></a></div>
	</div>

	<div class="tabbox" id="newscate4">
<?php
	// post_typeがnewsでカテゴリーがnewsの記事を6件出力する
	$news = new WP_Query(
		array( 'post_type' => 'news'
			, 'posts_per_page' => 6
			,'no_found_rows' => true
			,'update_post_meta_cache' => false
			, 'tax_query' => array( array('field' => 'slug','taxonomy' => 'news_category',
					'terms' => 'prensa',// 指定スラッグ
			)))
		);
	// 一件一件出力する
	while ( $news->have_posts() ) : $news->the_post();
		// 一件目の場合のみ出力
		if($news->current_post === 0){
?>
	<ul class="newslist">
<?php
};
// newsloop start. ?>
	<li>
		<a href="<?php the_permalink(); ?>">
		<?php if(has_post_thumbnail()): ?><span class="newspic"><?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?></span>
		<?php elseif(get_field('insertpic')): ?><span class="newspic"><?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?></span><?php else : ?>
		<span class="newspic"><img src="/images/common/Official.png" alt="ライブレアルマドリード" title="ライブレアルマドリード"></span><?php endif; ?>
		<span class="newsdate"><?php the_time('Y.m.d H:i'); ?></span>
		<span class="newscate"><?php
		$cats = get_the_terms( $post->ID, 'news_category');
		foreach($cats as $cat){
			if($cat !== reset($cats)) echo ',';
			echo $cat->name;
		}?></span>
		<span class="topnewstitle"><?php the_title(); ?></span>
		</a>
	</li>
<?php	// newsloop end.
	endwhile;
	// 投稿データをリセット
	wp_reset_postdata();
?>
	</ul>
	<div class="read-next"><a href="/news_category/prensa">一覧へ <i class="fa fa-angle-right fa-lg"></i></a></div>
	</div>
	<div class="tabbox" id="newscate5">
<?php
	// post_typeがnewsでカテゴリーがnewsの記事を6件出力する
	$news = new WP_Query(
		array( 'post_type' => 'news'
			, 'posts_per_page' => 6
			,'no_found_rows' => true
			,'update_post_meta_cache' => false
			, 'tax_query' => array( array('field' => 'slug','taxonomy' => 'news_category',
					'terms' => 'medico',// 指定スラッグ
			)))
		);
	// 一件一件出力する
	while ( $news->have_posts() ) : $news->the_post();
		// 一件目の場合のみ出力
		if($news->current_post === 0){
?>
	<ul class="newslist">
<?php
};
// newsloop start. ?>
	<li>
		<a href="<?php the_permalink(); ?>">
		<?php if(has_post_thumbnail()): ?><span class="newspic"><?php $post_title = get_the_title(); the_post_thumbnail('large',array('alt' => $post_title,'title' => $post_title));?></span>
		<?php elseif(get_field('insertpic')): ?><span class="newspic"><?php include (COMMONTEMPLATEPATH . '/insertpic.php'); ?></span><?php else : ?>
		<span class="newspic"><img src="/images/common/Official.png" alt="ライブレアルマドリード" title="ライブレアルマドリード"></span><?php endif; ?>
		<span class="newsdate"><?php the_time('Y.m.d H:i'); ?></span>
		<span class="newscate"><?php
		$cats = get_the_terms( $post->ID, 'news_category');
		foreach($cats as $cat){
			if($cat !== reset($cats)) echo ',';
			echo $cat->name;
		}?></span>
		<span class="topnewstitle"><?php the_title(); ?></span>
		</a>
	</li>
<?php	// newsloop end.
	endwhile;
	// 投稿データをリセット
	wp_reset_postdata();
// pタグ整形を設定
add_filter('the_content', 'wpautop');
?>
	</ul>
	<div class="read-next"><a href="/news_category/medico">一覧へ <i class="fa fa-angle-right fa-lg"></i></a></div>
	</div>
</div><!--/content-->
</div><!--/news-->



<div id="bernabeuliveinsta">
<div class="sideboxline"></div>
<h2><i class="fas fas fa-camera"></i> ベルナベウLIVE!</h2>

<!-- SnapWidget -->
<script src="https://snapwidget.com/js/snapwidget.js"></script>
<iframe src="https://snapwidget.com/embed/793297" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>

</div><!--/bernabeuliveinsta-->





<?php //include (COMMONTEMPLATEPATH . '/timeline_pc.php'); ?>

		</div><!--/contentsleft-->





</div>



<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>






<?php //include (COMMONTEMPLATEPATH . '/timeline_sp.php'); ?>







<div id="footersp" class="clearfix">

	<div id="berliveT">
	<p class="title">サポート</p>
	</div>



<div id="support" class="clearfix">
<ul>
<li><a href="/090/508/01">会員登録</a></li>
<li><a href="/090/518/01">サービス内容・ご利用方法</a></li>
<li><a href="/090/515/01">対応機種</a></li>
<li><a href="/090/511/01">利用規約</a></li>
<li><a href="/090/516/01">プライバシーポリシー</a></li>
<li><a href="/090/512/01">特定商取引法に基づく表示</a></li>
<li><a href="/090/517/01">お問合わせについて</a></li>

#%element:USER_VALUE value_type="signon" carrier="3" visible="1"%#
<li><a href="https://connect.auone.jp/net/id/sp/guide/kessai_guide/kessai_service.html">auかんたん決済</a></li>
#%/element%#

<li><a href="/090/510/01">会員退会</a></li>
<li><a href="/040/100/AFP">SPモードケータイについて</a></li>
</ul>
</div>



</div><!--/contents-->






<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>
