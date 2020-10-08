<div id="comment_box">


<?php if( have_comments() ): // コメントがあれば ?>


<h3 id="comments-count"><?php echo get_comments_number().' 件のコメント'; ?></h3>

<?php if( !is_user_logged_in() ) :?>
<style type="text/css">
<!--
#comment_box .comment-body .poll a{
	background-color: rgba(0, 72, 155,0.5);
}
-->
</style>
<?php endif; ?>
<ol class="commets-list">
<?php //wp_list_comments( 'avatar_size=25' ); ?>
<?php wp_list_comments( 'avatar_size=30&callback=theme_list_comment' ); ?>
</ol>

<?php if (get_comment_pages_count() > 1) {
echo '<ul id="comments-pagination">';
$previous_comments_link = get_previous_comments_link('<< 前のコメント');
$next_comments_link = get_next_comments_link('次のコメント >>');
if ( isset($previous_comments_link) ) {
echo '<li id="prev-comments">' . $previous_comments_link . '</li>';
}
if ( isset($next_comments_link) ) {
echo '<li id="next-comments">' . $next_comments_link . '</li>';
}
echo '</ul>';
}
 ?>

<?php else: //コメントが無い場合 ?>

<?php endif;// have_comments ?>
</div>