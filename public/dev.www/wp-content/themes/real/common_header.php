<?php
/**
 * @package WordPress
 * @subpackage real_Theme
 */
?>
<!doctype html>
<html lang="jp">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="utf-8">
<meta http-equiv="content-language" content="ja">

<title><?php if(is_home()): ?><?php bloginfo('name'); ?>
<?php elseif(is_page()): ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?>
<?php elseif(is_tax()): ?><?php $taxonomy = get_taxonomy(get_query_var('taxonomy')); echo sprintf('%s', single_term_title('', false)); ?> | <?php bloginfo('name'); ?>
<?php elseif (get_post_type() === 'match' && is_single()): ?><?php $post_type = get_query_var( 'match' ); echo '試合詳細'; ?> | <?php bloginfo('name'); ?>
<?php elseif (get_post_type() === 'news' && is_single()): ?><?php wp_title(''); ?> - <?php $cats = wp_get_post_terms($post->ID, 'news_category'); foreach($cats as $cat){ if($cat !== reset($cats)) echo ','; echo $cat->name; } ?> | <?php bloginfo('name'); ?>
<?php elseif(is_archive()): ?><?php echo esc_html(get_post_type_object(get_post_type())->label ); ?> | <?php bloginfo('name'); ?>
<?php endif; ?></title>

<meta name="description" itemprop="description" content="<?php wp_title('-', true, 'right'); ?><?php bloginfo('description'); ?>">
<meta name="Keywords" content="レアル,レアル・マドリード,マドリー,久保,久保建英,クリスティアーノ・ロナウド,リーガ・エスパニョーラ,チャンピオンズリーグ,クラシコ,エル・クラシコ,サッカー,スペイン" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<meta property="og:site_name" content="ライブ！レアル・マドリード">
<meta property="og:description" content="<?php bloginfo('description'); ?>">
<meta property="og:title" content="<?php wp_title('-', true, 'right'); ?>">
<meta property="og:url" content="<?php the_permalink() ?>">
<meta property="og:image" content="/images/plantilla/Official.jpg">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@LIVE_R_MADRIDJP"> 


<link rel="icon" href="/images/common/favicon.ico">
<link rel="apple-touch-icon" href="/images/common/icon.png">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />


<script>
/* UA css    */!function(){var t=navigator.userAgent;t.indexOf("iPhone")>-1||t.indexOf("Android")>-1?document.write('<link rel="stylesheet" href="/css/sp.css?<?php echo time(); ?>">'):t.indexOf("iPad")>-1?document.write('<link rel="stylesheet" href="/css/layout.css?<?php echo time(); ?>">'):document.write('<link rel="stylesheet" href="/css/layout.css?<?php echo time(); ?>">')}()
</script>

<?php include (TEMPLATEPATH . '/analysis/sp.php'); ?>
<?php include (TEMPLATEPATH . '/analysis/pc.php'); ?>

</head>
<body <?php body_class(); ?>>





<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> <a class="navbar-brand" href="#">でふぉるとのなびばー</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="#">とっぷ <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item"> <a class="nav-link" href="#">りんく</a> </li>
        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">どろっぷだうん </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#">どろっぷだうんの中身１</a> <a class="dropdown-item" href="#">どろっぷだうんの中身２</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">その他のナンヤカンヤ</a> </div>
        </li>
        <li class="nav-item"> <a class="nav-link disabled" href="#">使用禁止</a> </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="さーち">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
      </form>
    </div>
  </nav>
</header>







<div id="sidr">
  <ul>
<li><a href="/"><div class="escudoicon"><img src="/images/common/escudo02.png" width="16px"> トップへ</div></a></li>
#%funcparts:GET_USER_STATUS%#
#%element:VISIBLE user_status="unknown"%#
    <li><a href="/login?returl=http%3a%2f%2fs%2eliverealmadrid%2ejp"><i class="fa fa-lock"></i> ログイン</a></li>
#%/element%#

<?php
/*
#%element:USER_VALUE value_type="signon" carrier="0" visible="1"%#
    <li><a href="/040/100/info201406b">サイトに関するお知らせ</a></li>
#%/element%#
*/
?>

#%element:VISIBLE user_status="nomember,unknown"%#
<li><a href="/090/508/01"><i class="fa fa-user"></i> 新規会員登録へ</a></li>
#%/element%#

    <li><a href="/news"><i class="fas fa-pencil-alt"></i> マドリード通信</a></li>
    <li><a href="/bernabeulive"><i class="fa fa-camera"></i> ベルナベウLIVE！</a></li>
    <?php echo do_shortcode( '[schedule-list limit=1]<li><a href="%%link%%"><i class="fa fa-trophy"></i> 試合詳細</a></li>[/schedule-list]' );?>
    <li><a href="/match"><i class="fa fa-calendar"></i> 試合日程</a></li>
    <li><a href="/clasificacion"><i class="fa fa-random"></i> 順位表</a></li>
    <li><a href="/video" target="_blink"><i class="fas fa-video"></i> VIDEO</a></li>
    <li><a href="https://twitter.com/LIVE_R_MADRIDJP" target="_blink"><i class="fab fa-twitter"></i> Twitter</a></li>
    <li><a href="https://www.instagram.com/live_r_madridjp/" target="_blink"><i class="fab fa-instagram"></i> Instagram</a></li>

#%cond mstatus="1" disp="1"%#
<li><a href="/logoff?returl=http%3a%2f%2fs%2eliverealmadrid%2ejp%2f"><i class="fa fa-unlock"></i> ログアウト</a></li>
#%/cond%#
  </ul>
</div>


<div id="container" class="clearfix">
		<div id="line"></div>

	<div id="headersp">
		<div class="menu">
			<a id="simple-menu" href="#sidr"><p class="smenu">≡</p></a>
		</div>
		<div class="logosp">
			<a href="/"><img src="/images/sitelogo.png" width="134" height="28" alt="Live!Real Madrid" /></a>
		</div>
	#%element:VISIBLE user_status="unknown"%#
		<div class="loginbt">
			<a href="/login?returl=http%3a%2f%2fs%2eliverealmadrid%2ejp"><i class="fa fa-lock"></i></a>
		</div>
	#%/element%#
	#%cond mstatus="1" disp="1"%#
		<div class="loginbt">
			<a href="/logoff?returl=http%3a%2f%2fs%2eliverealmadrid%2ejp%2f"><i class="fa fa-unlock"></i></a>
		</div>
	#%/cond%#

	</div>

	<div id="header">
		<div id="linetop"></div>
		<div id="header_top" class="clearfix">
			<div id="logo">
				<a href="/"><img src="/images/sitelogo.png" width="160" height="34" alt="Live!Real Madrid" /></a>
			</div>
		<?php
		/*
			<ul id="subnav" class="clearfix">
			<li><a href="/servce">サービス内容</a></li>
			<li><a href="/agreement">利用規約</a></li>
			<li><a href="/policy">プライバシーポリシー</a></li>
			<li><a href="mailto:liverealmadridjp@gmail.com?subject=ライブレアルマドリードお問い合わせ/CONTACTO/CONTACT&amp;body=ご記入ください/Porfavorrellene/Pleasefillin%0d%0a%0d%0a%0d%0a%0d%0aLIVEREALMADRID">お問い合わせ</a></li>
			</ul>
		*/
		?>
		</div>
		<div id="navtop">
			<ul id="nav" class="clearfix">
			<li><a href="/bernabeulive">ベルナベウLIVE!</a></li>
			<li><a href="/news_category/madrid">マドリード通信</a></li>
			<li><a href="/news_category/comunicado-oficial">公式声明</a></li>
			<li><a href="/news_category/convocatoria">招集メンバー</a></li>
			<li><a href="/news_category/prensa">記者会見</a></li>
			<li><a href="/news_category/medico">メディカルレポート</a></li>
			<li><?php echo do_shortcode( '[schedule-list limit=1]<a href="%%link%%">試合詳細</a>[/schedule-list]' );?></li>
			<li><a href="/match">試合日程</a></li>
			<li><a href="/clasificacion">順位表</a></li>
			<li><a href="/video">VIDEO</a></li>
			</ul>
		</div>
	</div>

</div>
