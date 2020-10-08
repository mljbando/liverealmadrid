<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/

$disp_count='26';//表示件数
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
query_posts($query_string . '&posts_per_page='.$disp_count . '&paged='.$paged);
?>


<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>

<?php
// ページネーション //
function previous_page_link($design){
	$prev_link = get_previous_posts_link($design);
	if( isset( $prev_link ) ) {
		echo $prev_link;
	}
}
function next_page_link($design){
	$next_link = get_next_posts_link($design);
	if( isset( $next_link ) ) {
		echo $next_link;
	}
}
/*
 * $design='%paged% / %pages%'
 */
function page_navigation($design){
	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	$pages = $wp_query->max_num_pages;
	$output = mb_ereg_replace('/%paged%/',$paged, $design);
	echo mb_ereg_replace('/%pages%/',$pages, $output);
}
?>

<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">


		<div id="contentsarea" class="clearfix">



				<div id="archive-news" class="clearfix">

<!--newscatelink
<ul>
<?php
wp_list_categories(
	array(
		'taxonomy' => 'news_category',
		'orderby' => 'ID',
		'hide_empty' => 0,
		'title_li' => '',
		'show_last_updated' => 1,
		'style' => 'list',
		'use_desc_for_title' => 0,
		)
	);
?>
</ul>
-->


<ul class="newslist">

<?php
if (have_posts()) :
while (have_posts()) :
the_post();
?>

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

<?php
endwhile;
endif; ?>

</ul>

<!-- http://liverealmadrid.jp/news/date/2014 で2014年のニュース一覧 -->
<!-- http://liverealmadrid.jp/news/date/2014/06 で2014年6月のニュース一覧 -->

<!--

<?php
// ページネーション //
    $prev_design='<<前のページ';//勝手にaタグ囲い
    $next_design='次のページ>>';//勝手にaタグ囲い
    // リンクが無い場合はNULLが返ってくる
    $prev_link = get_previous_posts_link($prev_design);
    $next_link = get_next_posts_link($next_design);
    global $wp_query;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
    $pages = $wp_query->max_num_pages;
//    echo $pages;

    if ( isset( $prev_link ) or isset( $next_link ) ) {
        if( isset( $prev_link ) ) {
            echo $prev_link;
        }
        // 現頁／総数
        echo $paged,'/',$pages;
        
        if( isset( $next_link ) ) {
            echo $next_link;
        }
    }

?>


<?php
// 月別アーカイブ //
$args=array(
		'post_type'=>'news',
		'taxonomy'=>'news_category',
//		'slug'=>'official',
		'echo'=>0,
		'type' => 'monthly',
	);
$list=wp_get_archives($args);

print_r($list);
?>


-->


				</div><!--/archive-news-->


			<div id="plink" class="clearfix">
				<div class="pnavi">
				<div class="pleft"><a href="#" onClick="history.back(); return false;"><i class="fa fa-angle-left"></i> 戻る</a></div>
				<div class="pright"><?php next_page_link('次へ <i class="fa fa-angle-right"></i>') ?></div>
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