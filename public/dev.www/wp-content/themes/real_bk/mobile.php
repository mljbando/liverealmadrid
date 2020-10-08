<?php
/**
 * @package WordPress
 * @subpackage real
 */
/*
Template Name: モバイル用テンプレート
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr" xmlns:og="http://ogp.me/ns#" xmlns:mixi="http://mixi-platform.com/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>
<head>
<?php include (COMMONTEMPLATEPATH . '/declaration.php'); ?>
<title>レアル・マドリード公式モバイル</title>
<meta name="Keywords" content="サッカー,スペイン,レアル,レアル・マドリード,レアルマドリード,リーガ,リーガ・エスパニョーラ,チャンピオンズ,チャンピオンズリーグ,ＣＬ,クラシコ,エルクラシコ,エル・クラシコ" />
<meta name="Description" content="<?php wp_title('-', true, 'right'); ?><?php bloginfo('description'); ?>" />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<?php include (COMMONTEMPLATEPATH . '/file_read.php'); ?>
<link rel="stylesheet" type="text/css" href="/mobile_img_css/css/mobile.css" />
<link type="image/x-icon" href="/images/common/favicon.ico" rel="shortcut icon"/>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<script type="text/javascript">
if ((navigator.userAgent.indexOf('iPhone') > 0 &&
navigator.userAgent.indexOf('iPad') == -1) ||
navigator.userAgent.indexOf('Android') > 0) {
location.href = 'http://s.realmadridmobile.jp/010/100/01';
}
</script>

<script type="text/javascript">
//<![CDATA[

// twitter (bit.ly)
function Getbitly() {
    api = 'http://api.bit.ly/shorten?version=2.0.1&format=json&callback=Callback&login=realmadridjapan&apiKey=R_b8070542a05f807ea5fd13b87a620fc1&longUrl='; 
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = api + encodeURIComponent(location.href) ;
    document.body.appendChild(script);
}

function Callback(json) {
    var bitly_url=json.results[location.href]['shortUrl'];

    if ( bitly_url.indexOf("/bit.ly/") == -1 ) {
        location.href = 'http://twitter.com/home/?status='+encodeURIComponent(document.title+' ' + location.href);
    }else{
        location.href = 'http://twitter.com/home/?status='+encodeURIComponent(document.title+' ' +bitly_url);
    }
}
//]]>
</script>

<div id="fb-root"></div>
<script type="text/javascript">
window.fbAsyncInit = function() {
    FB.init({
        appId   : '125257967498463', // App ID
        status  : true, 
        cookie  : true, 
        xfbml   : true  
    });
    loadFacebookShare();
};
(function(d){
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/ja_JP/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));
function loadFacebookShare() {
    jQuery('<script />')
        .attr({
            'type' : 'text/javascript',
            'src' : 'http://static.ak.fbcdn.net/connect.php/js/FB.Share',
            'async' : true
        })
        .appendTo('div#fb-root');
}
</script>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'ja'}
</script>



</head>

<body>

<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>



<!--botton-->
<div class="sns_button"> 
<ul>
<li><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="realmadridjapan" data-related="realmadrid" data-lang="en">Tweet</a>
</li>
<li><a name="fb_share" type="button_count" share_url="<?php the_permalink(); ?>"></a></li>
<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-show-faces="false" data-font="arial"></div></li>
<li><g:plusone size="medium" Annotation="none"></g:plusone></li>
</ul>
</div>
<div class="clear"></div>

<div id="contents_left">
<ul id="path">
<li class="home"><a href="/">TOP</a></li>
<li><?php the_title(); ?></li>
</ul>


<!--<h2 class="page_title"><?php the_title(); ?></h2>-->


<?php
$posts = get_posts('include=19&post_type=page');
foreach($posts as $post) : setup_postdata($post); ?>

<?php the_content(); ?>

<?php endforeach; ?>

</div><!-- //end contents_left -->

<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>

<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>