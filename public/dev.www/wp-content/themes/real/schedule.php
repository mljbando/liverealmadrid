<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: リーガカテゴリ用テンプレート
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr" xmlns:og="http://ogp.me/ns#" xmlns:mixi="http://mixi-platform.com/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>

<head>
<?php include (COMMONTEMPLATEPATH . '/declaration.php'); ?>
<title><?php wp_title('&nbsp;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta name="Keywords" content="サッカー,スペイン,レアル,レアル・マドリード,レアルマドリード,リーガ,リーガ・エスパニョーラ,チャンピオンズ,チャンピオンズリーグ,ＣＬ,クラシコ,エルクラシコ,エル・クラシコ" />
<meta name="Description" content="<?php wp_title('&nbsp;', true, 'right'); ?><?php bloginfo('description'); ?>" />
<meta name="revisit_after" content="3 days" />
<meta name="robots" content="ALL" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<?php include (COMMONTEMPLATEPATH . '/file_read.php'); ?>
<link rel="stylesheet" type="text/css" href="/css/schedule.css" />
<link type="image/x-icon" href="/images/common/favicon.ico" rel="shortcut icon"/>
<script type="text/javascript" src="/js/schedule.js" charset="utf-8"></script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

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
<li><a href="/schedule/category/liga/">試合日程・結果</a></li>
<li><?php the_category(' '); ?></li>
</ul>


<div class="next_match liga_top">
<?php
$liga_next = get_posts('numberposts=1&category=3&orderby=post_date&order=DESC&meta_key=next_match&meta_value=true');
foreach ($liga_next as $post) : setup_postdata($post); ?>
<p class="next">Next Match 第<?php the_title(); ?>節（<?php echo post_custom('home_away')?>）<?php the_time('Y/m/d'); ?>　<?php echo post_custom('kickoff')?></p>
<p class="vs">VS <?php echo post_custom('team')?></p>
<?php endforeach; ?>
</div>





<div id="top_navi">
<h2 class="page_title"><?php wp_title('', true, 'left'); ?></h2>








<ul class="tabNav">
<li class="result"><a href="#result"><span>試合結果</span></a></li>
<li class="ranking"><a href="#ranking"><span>順位表</span></a></li>
</ul>
</div>






<div id="sche_left">

<div id="result">
<table summary="日程表">
<tr>
<th class="th1">節</th>
<th class="th2">対戦相手</th>
<th class="th3">日時</th>
<th class="th4">キックオフ</th>
<th class="th5">H/A</th>
<th class="th6">スコア</th>
<th class="th7">勝敗</th>
</tr>
<?php
$ligaposts = get_posts('numberposts=50&category=3&orderby=post_date&order=ASC');
foreach ($ligaposts as $post) : setup_postdata($post); ?>
<tr>
<td class="td1"><?php the_title(); ?></td>
<td class="td2"><?php echo post_custom('team')?></td>
<td class="td3"><?php the_time('Y/m/d'); ?></td>
<td class="td4"><?php echo post_custom('kickoff')?></td>
<td class="td5"><?php echo post_custom('home_away')?></td>
<td class="td6">
<?php if(!post_custom('link_url') == "") : ?>
<a href="<?php echo post_custom('link_url')?>"><?php echo post_custom('score')?></a>
<?php else : ?>
<?php echo post_custom('score')?>
<?php endif; ?>
</td>
<td class="td7"><?php echo post_custom('result')?></td>
</tr>
<?php endforeach; ?>

</table>
</div>

<div id="ranking">
<?php
/*
	$test=tablepress_get_table(
		array(
			'id' => '1'
		)
	);
	print_r($test);
*/
?>
<?php echo do_shortcode( '[table id=1 /]' ); ?>

</div>


<ul class="tabNav">
<li class="result"><a href="#result">試合結果</a></li>
<li class="ranking"><a href="#ranking">順位表</a></li>
</ul>

</div><!-- //end sche_left -->





<?php include (TEMPLATEPATH . '/sidebar.php'); ?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>






</div><!-- //end contents_left -->



<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>