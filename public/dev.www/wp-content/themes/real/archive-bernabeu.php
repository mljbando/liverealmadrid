<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Bernabeu-Archives
*/
$disp_count='20';//表示件数
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
?>
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

<div id="bernabeulive" class="clearfix">
<ul>
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post(); ?>
<li>
<div class="photo">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理
	$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	$image = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	if ( $image ) {
	  list($src, $width, $height) = $image;
		if($src){
			echo '<img src="' . esc_attr( $src ) . '">';
		}
	}
?>
<?php else: // サムネイルを持っていないときの処理 ?>
<img src="/images/berlive1.jpg">
<?php endif; ?>
</div>


<div class="newsdate"><?php the_time('Y.m.d H:i'); ?></div>
<div class="newstext"><?php the_title(); ?></div>
</li>
<?php
	endwhile;
endif; ?>
</ul>

</div><!--/bernabeulive-->
</div>
#%/element%#




<?php
/*
SP member
*/
?>
#%funcparts:GET_USER_STATUS%#
#%element:VISIBLE user_status="member"%#
<div id="bernabeulive" class="clearfix">

<ul>
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post(); ?>
<li>
<div class="photo">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理
	$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	$image = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	if ( $image ) {
	  list($src, $width, $height) = $image;
		if($src){
			echo '<img src="' . esc_attr( $src ) . '">';
		}
	}
?>
<?php else: // サムネイルを持っていないときの処理 ?>
<img src="/images/berlive1.jpg">
<?php endif; ?>
</div>


<div class="newsdate"><?php the_time('Y.m.d H:i'); ?></div>
<div class="newstext"><?php the_title(); ?></div>

</li>
<?php
	endwhile;
endif; ?>
</ul>

</div><!--/bernabeulive-->
#%/element%#

</div>




<div id="pcaera" class="clearfix">
<div id="bernabeulive" class="clearfix">

<ul>
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post(); ?>

<li>
<div class="photo"><?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理
	$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	$image = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	if ( $image ) {
	  list($src, $width, $height) = $image;
		if($src){
			echo '<img src="' . esc_attr( $src ) . '">';
		}
	}
?>
<?php else: // サムネイルを持っていないときの処理 ?>
<img src="/images/berlive1.jpg">
<?php endif; ?></div>
<div class="newsdate"><?php the_time('Y.m.d H:i'); ?></div>
<div class="newstext"><?php the_title(); ?></div>

</li>
<?php
	endwhile;
endif; ?>

</ul>

</div><!--/bernabeulive-->
</div>




			<div id="plink" class="clearfix">
				<div class="pnavi">
				<div class="pleft"><a href="#" onClick="history.back(); return false;"><i class="fa fa-angle-left"></i> 戻る</a></div>
				<div class="pright"><?php next_page_link('次へ <i class="fa fa-angle-right"></i>') ?></div>
				</div>
			</div>






		</div><!--/contentsarea-->


</div><!--/contentsleft-->


<div id="sp">
<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
</div>


</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>