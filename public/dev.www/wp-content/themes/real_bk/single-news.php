<?php
/**
 * @package WordPress
 * @subpackage real
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr" xmlns:og="http://ogp.me/ns#" xmlns:mixi="http://mixi-platform.com/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>

<head>
<?php include (COMMONTEMPLATEPATH . '/declaration.php'); ?>

<title><?php wp_title('', true, 'right'); ?></title>
<meta name="Keywords" content="サッカー,スペイン,レアル,レアル・マドリード,レアルマドリード,リーガ,リーガ・エスパニョーラ,チャンピオンズ,チャンピオンズリーグ,ＣＬ,クラシコ,エルクラシコ,エル・クラシコ" />
<meta name="revisit_after" content="3 days" />
<meta name="robots" content="ALL" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<?php include (COMMONTEMPLATEPATH . '/file_read.php'); ?>
<link rel="stylesheet" type="text/css" href="/css/news.css" />
<link rel="stylesheet" type="text/css" href="/css/detail.css" />
<link type="image/x-icon" href="/images/common/favicon.ico" rel="shortcut icon"/>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/jquery.galleryview-1.1.js"></script>
<script type="text/javascript" src="/js/jquery.timers-1.1.2.js"></script>

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


<script type="text/javascript">
$(document).ready(function(){
$('#photos').galleryView({
panel_width: 476,
panel_height: 305,
frame_width: 92,
frame_height: 58
});
});
</script>

<!--match-->
<link rel="stylesheet" href="http://widget.cloud.opta.net/2.0/css/widgets.opta.css" type="text/css" />
<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="http://widget.cloud.opta.net/2.0/css/ie9.widgets.opta.css" media="screen" />
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="http://widget.cloud.opta.net/2.0/css/ie8.widgets.opta.css" media="screen" />
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="http://widget.cloud.opta.net/2.0/css/ie7.widgets.opta.css" media="screen" />
<![endif]--><script src="http://widget.cloud.opta.net/2.0/js/widgets.opta.js" type="text/javascript"></script>
<script type="text/javascript">
	// <![CDATA[
	var loadHeatMap = function () {
		$('#heatMapA').click(function (e) {
			e.preventDefault();
			//$('#heatMap').show();
			$('#heatMap opta').each(function () {
				if ($(this).attr('load') === 'false') {
					$(this).attr('load', 'true');
				}
			});
			$jqOpta.widgetStart(_optaParams);
		});
	},
	_optaParams = {
		custID: 'fcaa1f52a8e86a76c56aff8d7455308a',
		language: 'es',
		timezone: '1',
		callbacks: [loadHeatMap]
	};
	// ]]>
</script>
<!--//match-->

</head>

<body>
<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>

<div id="contents_left">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<ul id="path">
<li class="home"><a href="/">TOP</a></li>
<li><a href="/news/">ニュース一覧</a></li>
<li><?php the_category(' '); ?></li>
</ul>

<h2 class="post_title"><?php the_title(); ?></h2>
<p class="post_data"><?php the_time('Y/m/d'); ?></p>

<div id="news_left">

<!-- photogallery -->
<div id="photos" class="galleryview">

<div class="panel" align="center"><img src="<?php echo post_custom('news_images1')?>" alt="<?php echo post_custom('news_alt1')?>" /></div>
<?php if(!post_custom('news_images2') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images2')?>" alt="<?php echo post_custom('news_alt2')?>" /></div>
<?php endif; ?>

<?php if(!post_custom('news_images3') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images3')?>" alt="<?php echo post_custom('news_alt3')?>" /></div>
<?php endif; ?>

<?php if(!post_custom('news_images4') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images4')?>" alt="<?php echo post_custom('news_alt4')?>" /></div>
<?php endif; ?>

<?php if(!post_custom('news_images5') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images5')?>" alt="<?php echo post_custom('news_alt5')?>" /></div>
<?php endif; ?>

<?php if(!post_custom('news_images6') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images6')?>" alt="<?php echo post_custom('news_alt6')?>" /></div>
<?php endif; ?>

<?php if(!post_custom('news_images7') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images7')?>" alt="<?php echo post_custom('news_alt7')?>" /></div>
<?php endif; ?>

<?php if(!post_custom('news_images8') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images8')?>" alt="<?php echo post_custom('news_alt8')?>" /></div>
<?php endif; ?>

<?php if(!post_custom('news_images9') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images9')?>" alt="<?php echo post_custom('news_alt9')?>" /></div>
<?php endif; ?>

<?php if(!post_custom('news_images10') == "") : ?>
<div class="panel" align="center"><img src="<?php echo post_custom('news_images10')?>" alt="<?php echo post_custom('news_alt10')?>" /></div>
<?php endif; ?>

<!--
<ul class="filmstrip">
<li><img src="<?php echo post_custom('news_images1')?>" alt="<?php echo post_custom('news_alt1')?>" /></li>

<?php if(!post_custom('news_images2') == "") : ?>
<li><img src="<?php echo post_custom('news_images2')?>" alt="<?php echo post_custom('news_alt2')?>" /></li>
<?php endif; ?>

<?php if(!post_custom('news_images3') == "") : ?>
<li><img src="<?php echo post_custom('news_images3')?>" alt="<?php echo post_custom('news_alt3')?>" /></li>
<?php endif; ?>

<?php if(!post_custom('news_images4') == "") :; ?>
<li><img src="<?php echo post_custom('news_images4')?>" alt="<?php echo post_custom('news_alt4')?>" /></li>
<?php endif; ?>

<?php if(!post_custom('news_images5') == "") : ?>
<li><img src="<?php echo post_custom('news_images5')?>" alt="<?php echo post_custom('news_alt5')?>" /></li>
<?php endif; ?>

<?php if(!post_custom('news_images6') == "") : ?>
<li><img src="<?php echo post_custom('news_images6')?>" alt="<?php echo post_custom('news_alt6')?>" /></li>
<?php endif; ?>

<?php if(!post_custom('news_images7') == "") : ?>
<li><img src="<?php echo post_custom('news_images7')?>" alt="<?php echo post_custom('news_alt7')?>" /></li>
<?php endif; ?>

<?php if(!post_custom('news_images8') == "") : ?>
<li><img src="<?php echo post_custom('news_images8')?>" alt="<?php echo post_custom('news_alt8')?>" /></li>
<?php endif; ?>

<?php if(!post_custom('news_images9') == "") : ?>
<li><img src="<?php echo post_custom('news_images9')?>" alt="<?php echo post_custom('news_alt9')?>" /></li>
<?php endif; ?>

<?php if(!post_custom('news_images10') == "") : ?>
<li><img src="<?php echo post_custom('news_images10')?>" alt="<?php echo post_custom('news_alt10')?>" /></li>
<?php endif; ?>
</ul>
-->


</div>
<!-- //end photogallery -->
<?php if(!post_custom('news_cameraman') == "") : ?>
<p id="cameraman"><span><?php echo post_custom('news_cameraman')?></span></p>
<?php endif; ?>



<div id="detail_box">


<!--botton-->
<div class="sns_button"> 
<ul>
<li><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="realmadridjapan" data-related="realmadrid" data-lang="en">Tweet</a>
</li>
<li><a name="fb_share" type="button" share_url="<?php the_permalink(); ?>" href="http://www.facebook.com/sharer.php"></a></li>

<li>
<a href="http://instagram.com/realmadrid?ref=badge" class="ig-b- ig-b-24"><img src="//badges.instagram.com/static/images/ig-badge-24.png" alt="Instagram" /></a></li>


<!--<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-show-faces="false" data-font="arial"></div></li>
<li><g:plusone size="medium" Annotation="none"></g:plusone></li>-->
</ul>
</div>


<style>.ig-b- { display: inline-block; }
.ig-b- img { visibility: hidden; }
.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
.ig-b-24 { width: 24px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-sprite-24.png) no-repeat 0 0; }
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
.ig-b-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-sprite-24@2x.png); background-size: 60px 178px; } }</style>

<ul class="next_link">
<li><?php next_post_link('%link','&laquo; 前へ') ?></li>
<li><?php previous_post_link('%link','次へ &raquo;') ?></li>
</ul>




<div id="entry">

<h3 id="desc"><?php echo post_custom('news_description')?></h3>

<!--<p id="videolink"> <a href="/movie/"><strong>Real Madrid Video</strong></a></p>-->

<p id="writer"><?php echo post_custom('news_writer')?></p>



<div id="entry_txt">
<?php the_content(); ?>

</div>



<?php comments_template(); ?>


<p class="pagetop"><a href="#wrapper_top">PAGE TOP</a></p>
</div><!-- //end entry -->
</div><!-- //end detail_box -->
</div><!-- //end news_list -->

<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
<?php endif; ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<ul class="next_link2">
<li><?php previous_post_link('%link','&laquo; 前へ') ?></li>
<li><?php next_post_link('%link','次へ &raquo;') ?></li>
</ul>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
<?php endif; ?>
   

</div><!-- end contents_left-->
<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>