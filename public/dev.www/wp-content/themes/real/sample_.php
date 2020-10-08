<?php
/**
 * @package WordPress
 * @subpackage real
 */
/*
Template Name: テンプレートサンプル
*/
?>
<?php
  $browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    if ($browser == true){
    $browser = 'iphone';
  }
  $browser = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    if ($browser == true){
    $browser = 'android';
  }
  
?>

<!DOCTYPE html>
<html dir="ltr" lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
<title>ホームページサンプル株式会社のサイトです</title>
<meta name="keywords" content="">
<meta name="description" content="">
<?php if($browser == 'iphone'|| $browser == 'android'){ ?>
<link rel="stylesheet" href="/css/sample/sp-style.css" type="text/css" media="screen">
<?php }else{ ?>
<link rel="stylesheet" href="/css/sample/style.css" type="text/css" media="screen">
<?php } ?>

<!--[if lt IE 9]>
<script src="/js/sample/html5.js"></script>
<script src="/js/sample/css3-mediaqueries.js"></script>
<![endif]-->
<script src="/js/sample/jquery1.7.2.min.js"></script>
<script src="/js/sample/script.js"></script>
</head>
<body>

<header id="header" role="banner">
	<div class="inner">
		<h1>Lorem ipsum dolor amet consectetur</h1>
		<h2><a href="index.html">Sample Company</a></h2>
	</div>
</header>

<nav id="mainNav">
	<div class="inner">
		<a class="menu" id="menu"><span>MENU</span></a>
		<div class="panel">
			<ul>
				<li><a href="subpage.html"><strong>当社の経営理念</strong><span>Concept</span></a></li>
				<li>
					<a href="subpage.html"><strong>お客様の声</strong><span>Customer</span></a>
					<ul class="sub-menu">
						<li><a href="subpage.html">佐藤二郎様より</a></li>
						<li><a href="subpage.html">伊藤大介様より</a></li>
						<li><a href="subpage.html">山田花子様より</a></li>
						<li><a href="subpage.html">鈴木太郎様より</a></li>
					</ul>
				</li>
				<li>
					<a href="subpage.html"><strong>採用情報</strong><span>Recruit</span></a>
					<ul class="sub-menu">
						<li><a href="subpage.html">2010年度採用情報</a></li>
						<li><a href="subpage.html">2011年度採用情報</a></li>
						<li><a href="subpage.html">2012年度採用情報</a></li>
					</ul>
				</li>
				<li><a href="subpage.html"><strong>ごあいさつ</strong><span>Greeting</span></a></li>
				<li><a href="subpage.html"><strong>お問い合わせ</strong><span>Contact</span></a></li>
				<li><a href="subpage.html"><strong>会社概要</strong><span>Company</span></a></li>
			</ul>
		</div>
	</div>
</nav>

<div id="mainImg">
	<img src="/sample-images/banners/mainImg.jpg">
</div>

<div id="wrapper">

	<div id="content">
		<section>
			<h2 class="title"><span>当社のビジネスを紹介します</span></h2>
			<ul class="post">
				<li>
					<img src="/sample-images/banners/eyecatch1.jpg"><h3><a href="subpage.html">オフィス移転</a></h3><p>ホームページサンプル株式会社では最新技術と自然との調和を目指します。ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な技術で世の中を革新的な技術で世の中を世の中を動かす企業を目指しま &#8230;</p>
				</li>
				<li>
					<img src="/sample-images/banners/eyecatch2.jpg"><h3><a href="subpage.html">会員数10万人突破記念</a></h3><p>ホームページサンプル株式会社では最新技術と自然との調和を目指します。ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な技術で世の中を革新的な技術で世の中を世の中を動かす企業を目指しま &#8230;</p>
				</li>
				<li>
					<img src="/sample-images/banners/eyecatch3.jpg"><h3><a href="subpage.html">ecoキャンペーン</a></h3><p>最新技術と自然との調和を目指します。ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な技術で世の中を革新的な技術で世の中を世の中を動かす企業を目指しま &#8230;</p>
				</li>
				<li>
					<img src="/sample-images/banners/eyecatch4.jpg"><h3><a href="subpage.html">新講座を開講しました</a></h3><p>新講座を開講しましたホームページサンプル株式会社では最新を目指します。ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な技術で世の中を革新的な技術で世の中を世の中を動かす企業を目指しま &#8230;</p>
				</li>
			</ul>
		</section>
	</div>
	<!-- / content -->

	<aside id="sidebar">
		<section class="widgetInfo">
			<div class="newsTitle">
				<h3 class="title"><span>お知らせ</span></h3>
				<p><a href="subpage.html">一覧</a>
			</div>
			<div class="post news">
				<p><a href="subpage.html"><time>2012/11/30</time><span>環境への取り組み</span></a>
				<p><a href="subpage.html"><time>2012/11/15</time><span>新サービスを開始</span></a>
				<p><a href="subpage.html"><time>2012/11/02</time><span>リニューアル</span></a>
				<p><a href="subpage.html"><time>2012/10/30</time><span>環境への取り組み</span></a>
				<p><a href="subpage.html"><time>2012/09/13</time><span>新講座を開講しました</span></a>
			</div>
		</section>
		<section class="widget">
			<h3><span>新講座を開講しました</span></h3>
			<ul>
				<li><a href="subpage.html">新サービスを開始しました</a></li>
				<li><a href="subpage.html">環境への取り組みについて</a></li>
				<li><a href="subpage.html">新講座を開講しました</a></li>
				<li><a href="subpage.html">リニューアルを開始</a></li>
				<li><a href="subpage.html">新講座を開始</a></li>
				<li><a href="subpage.html">環境への取り組みについて</a></li>
			</ul>
		</section>
	</aside>

</div>
<!-- / wrapper -->

<footer id="footer">
	<p id="copyright">Copyright &copy; Sample Company All rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a>
</footer>
<!-- / footer -->

</body>
</html>