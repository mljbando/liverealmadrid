<?php
// コメントにHTMLタグを使った際、そのまま表示させる
function html_comment_text($comment_content) {
	if ( get_comment_type() == 'comment' ) {
	$comment_content = htmlspecialchars($comment_content, ENT_QUOTES);
	}
	return $comment_content;
}
add_filter('comment_text', 'html_comment_text', 9);
// 自動リンク除去
remove_filter('comment_text', 'make_clickable', 9);
function disable_special_comment($args){
	$args['comment_notes_after'] = '';
return $args;
add_filter("comment_form_defaults","disable_special_comment");
}
/*
 * コメントリストのデザイン
 */
function theme_list_comment( $comment, $args, $depth) {
	$args = array_merge( $args , array( 'respond_id' => $comment->comment_ID));
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
		<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<div class="comment_data">
			<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
			<?php printf('<span class="uuid">%s</span>', get_the_author_meta('_uniqid',$comment->user_id)); ?>
			
			<?php if ( '0' == $comment->comment_approved ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
			<br />
			<?php endif; ?>
			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );
				?>
			</div>
			
		</div>
	</div>
	<?php comment_text( get_comment_id(), array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	<?php
		$is_active="none";
		$uuid=get_the_author_meta('_uniqid',wp_get_current_user()->ID);
		if(in_array($uuid,get_comment_meta( $comment->comment_ID, 'good_comment'))){
			$is_active='good';
		}elseif(in_array($uuid,get_comment_meta( $comment->comment_ID, 'bad_comment'))){
			$is_active='bad';
		}
	?>
	<div class="poll">
		<a href="javascript:void(0)" name="btn" type="bad" id="<?php echo comment_ID(); ?>" uuid="<?php echo $uuid; ?>">
			<i class="fa fa-thumbs-down fa-2x" name="<?php echo ('bad'===$is_active) ? 'active':''; ?>"></i><!--Bad--><span class="bad_result_<?php echo comment_ID(); ?>"><?php echo sizeof(get_comment_meta( $comment->comment_ID, 'bad_comment')); ?></span>
		</a>
		<a href="javascript:void(0)" name="btn" type="good" id="<?php echo comment_ID(); ?>" uuid="<?php echo $uuid; ?>">
			<i class="fa fa-thumbs-up fa-2x" name="<?php echo ('good'===$is_active) ? 'active':''; ?>"></i><!--Good--><span class="good_result_<?php echo comment_ID(); ?>"><?php echo sizeof(get_comment_meta( $comment->comment_ID, 'good_comment')); ?></span>
		</a>
		<?php
			if(!is_user_logged_in()){
				if(function_exists('gianism_login')){
				    gianism_login();
				}
			}
		?>
	</div>
	<div class="reply">
		<?php
		//comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
		/* 「ログインして返信」に返信のパラメータがreturlに付与されていなかったので対応 */
		$reply_link = get_comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
		if( !is_user_logged_in() ){
			preg_match_all('/href="(.+?)"/',$reply_link,$matches);
			if(isset($matches[1][0])){
				$repurl = $matches[1][0].urlencode('?replytocom='.$comment->comment_ID.'#respond');
				$reply_link= str_replace($matches[1][0],$repurl,$reply_link);
			}
		}
		echo $reply_link;
		?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}