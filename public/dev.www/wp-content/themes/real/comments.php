<div id="comment_box">
<?php
// valueのデフォルト値用
$commenter = wp_get_current_commenter();

/* http://blog.neo.jp/dnblog/index.php?module=Blog&action=Entry&blog=pg&entry=2780&rand=f8273 */

//コメント本文以外のフィールドの出力方法を設定します。
//必須の「*」印の場所を変えたり、「（必須）」に変更したりできます。
$fields = array(
    'author' => '<p id="inputtext">' . '<label for="author">' . __( 'Name' )
                . ( $req ? '（必須）' : '' ) . '</label> ' .
                '<br /><input id="author" name="author" type="text" value="'
                . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
    'email'  => '<p id="inputtext"><label for="email">' . __( 'Email' )
                . ( $req ? '（必須）' : '' ) . '</label> ' .
                '<br /><input id="email" name="email" type="text" value="'
                . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
    'url'    => '<p id="inputtext"><label for="url">' . __( 'Website' ) . '</label>' .
                '<br /><input id="url" name="url" type="text" value="'
                . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
    );
// 配列を設定し終わったらフィルター通してね。
$fields = apply_filters( 'comment_form_default_fields', $fields );

//コメントフィールドの出力方法を設定します。
/*
$comment_field = '<p id="textarea"><label for="comment">' . __( 'Comment' ) . '（必須）</label><br />'
               . '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
*/
$comment_field = '<p id="textarea"><label for="comment">コメント</label><br />'
               . '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" style="width:100%;box-sizing : border-box;"></textarea></p>';

// ログインしないとコメントできない場合、
//「ログインしなきゃいけませんよ」っていうコメントの部分です。
/*
$must_log_in = '<p class="must-log-in">'
             . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
               wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>';
*/
$must_log_in = '<p class="must-log-in">コメントを投稿するにはログインが必要です</p>';
//$must_log_in = '';


//「今○○でログインしてます。ログアウトしますか？」っていうところ。
/*$logged_in_as = '<p class="logged-in-as">'
              . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>.'
              .' <a href="%3$s" title="Log out of this account">Log out?</a>' )
              , admin_url( 'profile.php' ), $user_identity
              , wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>';
*/
$this_host = (isset($_SERVER['HTTP_WP_HOST'])) ? $_SERVER['HTTP_WP_HOST'] : $_SERVER['HTTP_HOST'];
$this_path = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
$protocol = (strpos($_SERVER['SERVER_PROTOCOL'],'HTTPS')!==FALSE) ? 'https://' : 'http://';
$profifle_url = add_query_arg(array('return_to'=>urlencode($protocol.$this_host.$this_path)),admin_url( 'profile.php' ));

$logged_in_as = '<p class="logged-in-as"><a href="'.$profifle_url.'">'.$user_identity.'</a>としてログインしています。'
               .'<a href="'.wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ). '" id="sns_logout" title="ログアウトする">ログアウト</a></p>';

// 「メアドは公開されませんよー。*は必須ですよー。」っていうところ。
// それぞれに「（必須）」って書いて、後半の部分は消してしまうのがいいと思います。
$comment_notes_before = '<p class="comment-notes">'
                      . __( 'Your email address will not be published.' )
                      . ( $req ? $required_text : '' ) . '</p>';


//「コメントでこんなタグが使えますよ。」っていうところ。
/*
$comment_notes_after = '<p class="form-allowed-tags">'
                     . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' )
                     , ' <code>' . allowed_tags() . '</code>' ) . '</p>';
*/

if(is_user_logged_in()){
$comment_notes_after = <<< EOD
<script type="text/javascript">
	$(function() {
		$("*[name=btn]").click(
			function() {
				var _active = $(this).find('i[class*=fa-thumbs]').attr('name');
				if(_active=='active'){return false;}
				$(this).find('i.fa-thumbs*').attr('name',"active");
				var _uuid = $(this).attr('uuid');
				var _id = $(this).attr('id');
				var _type = $(this).attr('type');
				$.ajax({
					url: "./poll_of_comment",
					type: "POST",
					data: { poll : 1,
						uuid : _uuid,
						comment_id : _id,
						type: _type },	// 検索など引数を渡す必要があるときこれを使う
//					dataType: 'json',			// サーバーなどの環境によってこのオプションが必要なときがある
					success: function(arr) {
   						// 自分の環境だと帰ってきた配列をパスしないとだめ。
   						// ローカルだとそのまま使えた。
   						var parseAr = JSON.parse( arr );
// 						 $("p.result").text('検索結果：'+ parseAr.length+'件');
						reWriteTable(parseAr);
					}
				});
			}
		);
		
	});
	
	// テーブルを書き換える関数
	function reWriteTable( response )
	{
		$("span.good_result_"+response['result']['id']).text(response['total']['good']);
		$("span.bad_result_"+response['result']['id']).text(response['total']['bad']);
//		$("*[name=btn]").find("i").attr("name","active");
//		$("*[name=btn][id=10]").find("i").attr("name","active");
		$("*[name=btn][id="+response['result']['id']+"][type="+response['result']['type']+"]").find("i[class*=fa-thumbs]").attr("name","active");
		$("*[name=btn][id="+response['result']['id']+"][type="+response['active']['type']+"]").find("i").attr("name","");
	}

</script>
EOD;

}else{
	$comment_notes_after ='';
}

$id_form = 'commentform';
//$id_submit = 'submit';
$id_submit = 'submit_comment';
//$title_reply = __( 'Leave a Reply' );
$title_reply = 'コメントをする';
$title_reply_to = __( 'Leave a Reply to %s' );
$cancel_reply_link = __( 'Cancel reply' );
//$label_submit = __( 'Post Comment' );
$label_submit = "コメントを送信する";



$args = array(
    'fields'                => $fields,
    'comment_field'         => $comment_field,
    'must_log_in'           => $must_log_in,
    'logged_in_as'          => $logged_in_as,
    'comment_notes_before'  => $comment_notes_before,
    'comment_notes_after'   => $comment_notes_after,
    'id_form'               => $id_form,
    'id_submit'             => $id_submit,
    'title_reply'           => $title_reply,
    'title_reply_to'        => $title_reply_to,
    'cancel_reply_link'     => $cancel_reply_link,
    'label_submit'          => $label_submit,
    );

/*
$args = array(
'title_reply' => 'Your Message',
'label_submit' => 'コメント送信',
);
*/
comment_form( $args ); ?>








<?php if( have_comments() ): // コメントがあれば ?>


<h3 id="comments-count"><?php echo get_comments_number().' 件のコメント'; ?></h3>
<style type="text/css">
<!--
#comment_box{
/*	margin-top: 12px;*/
	margin-bottom: 20px;
}

#comment_box li{
	padding: 12px 12px 12px 12px; 
	border-bottom: 1px solid #ccc;
	margin: 0;
	overflow:hidden;
}
#comment_box li:only-child{
	border-bottom: 1px solid #ccc;
}

#comment_box li:last-child {
    border-bottom: none;
}

#comment_box ol.commets-list{
	width:auto;
	margin: 0;
/*	border-top: 1px solid #ccc; */
	border-right : 1px solid #ccc;
	border-left: 1px solid #ccc;
	border-bottom: 1px solid #ccc; 
	padding: 0;
	overflow:hidden;
}

#comment_box ul.children li{
	min-width:240px;
	margin: 12px 0 0 0 ;
	border-top: 1px solid #ccc;
	border-right : 1px solid #ccc;
	border-left: 1px solid #ccc;
	position:relative;
	overflow:visible;
	float:left;
	font-size: 12px;
	box-sizing : border-box;
	width:100%;
	background-color: #cfedff; 
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px; 
}
#comment_box ul.children{
	clear: both; 
	overflow:hidden;
}
#comment_box ul.children li:after{
	content: "";
	position: absolute;
	top: -9px;
	left: 12px;
	display: block;
	border-style: solid;
	border-width: 0 8px 10px 8px;
	border-color: transparent transparent #cfedff transparent;
}
#comment_box ul.children li:before{
	content: "";
	position: absolute;
	top: -10px;
	left: 12px;
	display: block;
	border-style: solid;
	border-width: 0 8px 10px 8px;
	border-color: transparent transparent #ccc transparent;
}

#comment_box #respond h3{
	margin: 0;
	padding: 6px;
	box-sizing : border-box;
	border-top: 1px solid #ccc;
	border-right : 1px solid #ccc;
	border-left: 1px solid #ccc;
	border-bottom: 1px solid #ccc;
}
#comment_box #respond p.logged-in-as{
	margin:0;
}
#comment_box #comments-count{
	margin: 0px;
	padding: 7px 6px 5px 6px;
	font-size: 14px;
	font-weight: normal;
	background-color: #00489b; 
	color: #fff;
}
/*
#comment_box h3#comments-count{
	margin: 10px 0  0 0;
}*/

#comment_box .comment-body{
	margin:0;
}
#comment_box .comment-author.vcard{
	padding: 0px;
}
#comment_box span.says{
	color: #333;
}
#comment_box a span{
	color: #fff;
	vertical-align: 2px;
	margin-left: 2px;
}
#comment_box .comment-author img{
	margin: 0 6px 0 0;
	float: left;
	vertical-align: middle;
	float:left
}
#comment_box span.uuid{
	font-size: 9px;
	color: #a5a5a5;
}
#comment_box cite a{
	color: #00489b;
	text-decoration: none;
}
#comment_box .total{
	color: #a5a5a5;
	letter-spacing: 2px;
	margin: -2px 0 4px 0 ;
}
#comment_box .comment-body{
	border-bottom:none;
}
#comment_box .comment-body .poll i{
	color:#FFF;
	margin: 0;
}
#comment_box .comment-body .poll i[name=active]{
	color:#FFF;
}
#comment_box .comment-body .poll a{
	text-decoration: none;
	padding: 5px;
	color: #FFF;
	float: right;
	background-color: rgba(0, 72, 155,<?php echo ( is_user_logged_in() ) ? '1' : '0.5';?>); 
	margin: 0 0 0 7px;
	word-spacing: 10px;
	letter-spacing: 1px;
	text-align: center;
}
.comment-body .poll p{
	margin: 0px;
}
#comment_box .comment-body .reply{
	width:auto;
	float: left;
	padding: 0;
}
#comment_box .comment-body .reply a{
	width:auto;
	background: #626262;
	padding: 8px;
	line-height: 25px;
	height: auto;
	margin: 0;
}
#comment_box .comment-reply-link{
	padding: 6px;
	color: #FFF;
	text-decoration: none;
}
#comment_box .comment-body .reply a:hover{
	background-color: #00489b;
}




#comment_box .poll{
	padding: 0 15px 0 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
	
}
<?php 
if( !is_user_logged_in() ):
?>
#comment_box .comment-body .poll #wpg-login{
    height: auto;
/*	width: 110px; */
	width: 141px;
	position: relative;
	top: -18px;
	bottom: 0px;
/*	left:108px; */
	left:124px;
	right:0px;
	opacity: 0;
	-webkit-transition: opacity .1s linear;
	-moz-transition: opacity .1s linear;
	-o-transition: opacity .1s linear;
	transition: opacity .1s linear;
	filter: alpha(opacity=100);
	-webkit-box-shadow: 0px 0px 10px #000;
	-moz-box-shadow: 0px 0px 10px #000;
	box-shadow: 0px 0px 10px #000;
    box-sizing: border-box;
	float: right;
}
#comment_box .comment-body .poll #wpg-login a{
	font-size:12px;
	width:100%;
	height:auto;
	line-height:normal;
	padding: 8px 0 8px 0;
	margin:0;
	float: left;
	display: block;
	text-align: center;
}
#comment_box .comment-body .poll #wpg-login a.my_tw_link{
	background: #1bb2e9;
}
#comment_box .comment-body .poll #wpg-login a.my_fb_link{
	background: #3c599b;
}

#comment_box .comment-body .poll #wpg-login:hover{
	opacity: 1;
	filter: alpha(opacity=100);
}
<?php
else:
?>
#comment_box .comment-body .poll a.logoff{
	display:none;
}
<?php
endif;
?>
-->
</style>
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


<?php
if(!is_user_logged_in()){
	if(function_exists('gianism_login')){
	    gianism_login();
	}
}
?>
</div>