<?php
/**
 * @package WordPress
 * @subpackage real
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr">

<head>
<?php include (COMMONTEMPLATEPATH . '/declaration.php'); ?>
<title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>

<meta name="Keywords" content="Real,Real Madrid,Madrid,レアル,レアル・マドリード,レアルマドリード,マドリード,マドリー,マドリッド,モウリーニョ,クリスティアーノ,ロナウド,クリスティアーノ・ロナウド,CR,CR7,エジル,カカー,カシージャス,ラモス,セルヒオ・ラモス,シャビアロンソ,シャビ・アロンソ,ディ・マリア,ディマリア,ベンゼマ,イグアイン,シャヒン,コエントラン,カジェホン,アルティントップ,バラン,カルヴァーリョ,カルバーリョ,アルベロア,アルビオル,カナレス,ケディラ,ペドロ・レオン,グラネロ,ラウール,ラウル,グティ,リーガ,リーガ・エスパニョーラ,チャンピオンズ,チャンピオンズリーグ,ＣＬ,クラシコ,エルクラシコ,エル・クラシコ,ベルナベウ,サンティアゴ・ベルナベウ,サッカー,スペイン" />
<meta name="Description" content="<?php wp_title('-', true, 'right'); ?><?php bloginfo('description'); ?>" />
<meta http-equiv="Refresh" content="900">
<meta name="revisit_after" content="3 days" />
<meta name="robots" content="ALL" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<?php include (COMMONTEMPLATEPATH . '/file_read.php'); ?>
<link rel="canonical" href="http://liverealmadrid.jp/">
<link rel="stylesheet" type="text/css" href="/css/index.css" />
<link type="image/x-icon" href="/images/common/favicon.ico" rel="shortcut icon"/>
<link rel="apple-touch-icon" href="/path/to/icon.png" />
<link rel="apple-touch-icon-precomposed" href="/path/to/icon.png" />
<script type="text/javascript" src="/videos/js/swfobject_source.js"></script> 
<script type="text/javascript" src="/videos/js/cookie_realmadrid.js"></script> 
<script type="text/javascript" src="/videos/js/home.js"></script> 
<script type="text/javascript" src="http://www.google-analytics.com/urchin.js"></script>
<script type="text/javascript" src="/js/urchin.js"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'ja'}
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
<?php
//print_r($_SERVER['HTTP_WP_HOST']);

//print_r(apache_request_headers());
//print_r($_COOKIE);
//print_r($_REQUEST);
//print_r($_SERVER);
//print_r($_ENV);
//print_r($_POST);
//print_r($GLOBALS);
/*
foreach($_SERVER as $key=>$value) {
if (substr($key,0,5)=="HTTP_") {
		$key=str_replace(" ","-",ucwords(strtolower(str_replace("_"," ",substr($key,5)))));
		$out[$key]=$value;
	}else{
		$out[$key]=$value;
	}
}
print_r($out);
*/
?>
<!--
<div id="lineaTiempo" >
<opta widget="timeline" team_name="short" sport="football" competition="23" match="707903" score="true" show_image="true" sound="true" show_clock="true" show_attendace="false" season="2013" live="true" >
</opta>
</div>

<div id="lineaTiempo" >
<opta widget="timeline" team_name="short" sport="football" competition="331" match="749545" score="true" show_image="true" sound="true" show_clock="true" show_attendace="false" season="2013" live="true" >
</opta>
</div>

<div id="lineaTiempo" >
<opta widget="timeline" team_name="short" sport="football" competition="5" match="750257" score="true" show_image="true" sound="true" show_clock="true" show_attendace="false" season="2013" live="true" >
</opta>
</div>
-->




<div id="flash">
<?php
$topposts = get_posts('include=32&post_type=page');
foreach($topposts as $post) : setup_postdata($post); ?>
<a href="<?php echo post_custom('top_link')?>"><img src="<?php echo post_custom('top_images')?>" alt="新着ニュース" /></a>
<?php endforeach; ?></div>


<div id="news_box">
<div class="left">

<h2><img src="/images/index/ttl_new_news.gif" alt="新着ニュース" /></h2>

<div class="new_news">
<!--
<ul>
<li>
<p class="photo"><a href='http://www.realmadrid.jp/news/mobileinfo.html' onClick="javascript:urchinTracker ('/outgoing/mobileinfo'); "><img src="http://www.realmadrid.jp/news/images/mobile_infopic/20130214RMJPm.jpg" alt="" width="92" height="58" /></a></p>
<p class="data">公式モバイルニュース</p>
<h3><a href='http://www.realmadrid.jp/news/mobileinfo.html' onClick="javascript:urchinTracker ('/outgoing/mobileinfo'); "><font color="#FF0000">C・ロナウド他<br>サイン入りユニフォームプレゼント！<br>無料壁紙＆動画も無料配信中！</font><br><font color="#FF0000"></font></a></h3>
</li>
</ul>
-->
<?php include (COMMONTEMPLATEPATH . '/new_news.php'); ?>



<p class="tonews"><a href="/news/">vニュース一覧 &raquo;</a></p>
</div><!-- //end new_news -->
<br/>

<!--botton-->
<div class="sns_button"> 
<ul>
<li><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="realmadridjapan" data-related="realmadrid" data-lang="en">Tweet</a>
</li>
<li><div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></li>
<li>
<a href="http://instagram.com/realmadrid?ref=badge" class="ig-b- ig-b-24"><img src="//badges.instagram.com/static/images/ig-badge-24.png" alt="Instagram" /></a></li>
</ul>
</div>

<style>.ig-b- { display: inline-block; }
.ig-b- img { visibility: hidden; }
.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
.ig-b-24 { width: 24px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-sprite-24.png) no-repeat 0 0; }
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
.ig-b-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-sprite-24@2x.png); background-size: 60px 178px; } }</style>

<!--twitter folloe me-->
<a href="http://twitter.com/realmadridjapan" target="_blank" onClick="javascript:urchinTracker ('/outgoing/rssfeed'); "><img src="/images/common/Twitter_rmjp01.jpg" vspace="2" alt="Twitterボタン" border="0" /></a> 
<!--twitter folloe me-->
</div><!-- //end left -->

<div class="right"><br>

<div id="space"></div>
<!--<h2><img src="/images/index/ttl_new_videos.gif" alt="新着動画" /></h2>-->


<!--↓mov↓--> 
<div class="col1 lastcol">
<div class="ContenedorFlash">
<div id="flashcontent" style="float:none;margin:0;">
<a href ="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank"><img src='/videos/flash_error.jpg' alt='Realmadrid.jp requires you to have the Flash Plugin installed. Please download it here.' title="Realmadrid.jp requires you to have the Flash Plugin installed. Please download it here." /></a>
</div>
<div id="flash_compacto" class="oculto">
</div>
<script type="text/javascript">

function datosXml(idtitulo,identradilla){//datosXml
if(dom.$("idtitulo")){
dom.$("idtitulo").innerHTML = idtitulo;
}
if(dom.$("iddescripcion")){
dom.$("iddescripcion").innerHTML = identradilla;
}

}
function sendFromActionScript (value){
document.location.href = value; 
}
var so = new SWFObject("/videos/Main_compacto_sencillo.swf", "RM", "307", "220", "9", "#CCCCCC");
so.addVariable("urlxml", "/videos/video.xml");so.addVariable("firstShowVideo", "1");
so.addParam("allowScriptAccess", "always");
so.write("flashcontent");
var so = new SWFObject("/videos/Main_compacto_sencillo.swf", "RM", "307", "220", "9", "#CCCCCC");
so.addVariable("urlxml", "/videos/video.xml");so.addVariable("firstShowVideo", "1");
so.addParam("allowScriptAccess", "always");
so.write("flashcontent");
</script>
</div></div>

<!--
<div class="text">
<span id="idtitulo">
</span><br>
<span id="iddescripcion"></span>
</div>-->

<!--↑mov↑--> 
<!--
<p> 
<a href="/movie/"><img src="/images/common/rmvideotopsmple.jpg" vspace="2" title="レアル・マドリード ビデオ"/></a>
</p>-->

<!--
<div id="bana">
<a href="/schedule/category/liga/" onClick="javascript:urchinTracker ('/outgoing/Calendario_2012_2013'); ">
<img src="/images/common/Calendario_2012_2013.jpg" alt="試合日程" /></a>
<a href="http://www.realmadrid.com/cs/Satellite/es/Actualidad_Primer_Equipo/1330105344028/noticia/EspecialTodoNoticias/LOS_121_GOLES_DEL_CAMPEON_DE_LIGA_2011-12.htm" onClick="javascript:urchinTracker ('/outgoing/LOS_121_GOLES'); "><img src="/images/common/LOS_121_GOLES_DEL_CAMPEON_DE_LIGA_2011-12.jpg" alt="試合日程" /></a>
<a href="/news/FelicidadesCampeon.html" onClick="javascript:urchinTracker ('/outgoing/FelicidadesCampeon.html'); "><img src="/images/common/FelicidadesCampeon.jpg" alt="!Felicidades_Campeon!" /></a>
</div>
-->


<h2><img src="/images/index/ttl_pickup_news.gif" alt="ピックアップ記事" /></h2>
<div class="pickup">
<ul>

<?php include (COMMONTEMPLATEPATH . '/pickup_news.php'); ?>




<!--
<li>
<p class="photo"><a href="http://www.realmadrid.jp/news/realmadridjapan_twitter.html"><img src="http://www.realmadrid.jp/news/wordpress/wp-content/uploads/2011/05/followerUP.jpg" alt="" width="92" height="58" /></a></p>
<h3>公式twitter</h3>
</li>
-->
</ul>

</div>
</div>
</div><!-- //end news_box -->

<div class="left"> 
<!--<ul> 
<li><a href="/mobile/"><img src="/images/common/mob_banner.jpg" vspace="2" alt="オフィシャルモバイル" /></a></li>
<li><a href="/legend/"><img src="/images/common/legenda_bana.jpg" vspace="2" alt="レジェンド" /></a>
<a href="http://www.realmadrid.com/cs/Satellite/ja/1330001978750/AforoVip/1330001978750.htm"><img src="/images/common/arenavip.jpg" vspace="2" align="right" alt="VIP" /></a></li>
<li><a href="http://www.summerexperience.es/"><img src="/images/common/Fundacion.jpg" vspace="2" alt="ファンデーション" /></a>
<a href="/news/2010/01/news_1566.html"><img src="/images/common/Haiti.jpg" vspace="2" align="right" alt="ハイチ" /></a></li> 
</ul>-->
</div>



</div><!-- //end contents_left -->



<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>