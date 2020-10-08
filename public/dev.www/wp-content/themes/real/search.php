<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: News-Archives
*/
$disp_count='15';//表示件数
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
query_posts($query_string . '&posts_per_page='.$disp_count . '&paged='.$paged);
?>


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

<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>


<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">

		<div id="contentsarea" class="clearfix">

				<div id="archive-news" class="clearfix">



<div class="searchresult">
<?php if (have_posts()): ?>
<?php
if (isset($_GET['s']) && empty($_GET['s'])) {
echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
} else {
echo '“'.$_GET['s'] .'” の検索結果：'.$wp_query->found_posts .'件'; // 検索キーワードと該当件数を表示
}
?>
<?php else: ?>
検索されたキーワードにマッチする記事はありませんでした
<?php endif; ?>
</div>

<style>
.searchresult{
width:100%;
font-size:18px;
font-weight:bold;
color:#00489b;
margin:10px;
}
</style>

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








				</div><!--/archive-news-->


			<div id="plink" class="clearfix">
				<div class="pnavi">
				<div class="pleft"><a href="#" onClick="history.back(); return false;"><i class="fa fa-angle-left"></i> 戻る</a></div>
				<div class="pright"><?php next_page_link('次へ <i class="fa fa-angle-right"></i>');?></div>
				</div>
			</div><!--/plink-->







		</div><!--/contentsarea-->


</div><!--/contentsleft-->



<div id="sp">
<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
</div>


</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>