<?php
/**
 * @package WordPress
 * @subpackage real
 */
/*
Template Name: ホスピタリティページ用テンプレート
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" <?php language_attributes(); ?>>
<head>
<?php include (COMMONTEMPLATEPATH . '/declaration.php'); ?>
<title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta name="Keywords" content="サッカー,スペイン,レアル,レアル・マドリード,レアルマドリード,リーガ,リーガ・エスパニョーラ,チャンピオンズ,チャンピオンズリーグ,ＣＬ,クラシコ,エルクラシコ,エル・クラシコ" />
<meta name="Description" content="<?php wp_title('-', true, 'right'); ?><?php bloginfo('description'); ?>" />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<?php include (COMMONTEMPLATEPATH . '/file_read.php'); ?>
<link rel="stylesheet" type="text/css" href="/hospitality_img_css/css/hospitality.css" />
<link type="image/x-icon" href="/images/common/favicon.ico" rel="shortcut icon"/>



</head>

<body>
<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>

<div id="contents_left">
<ul id="path">
<li class="home"><a href="/">TOP</a></li>
<li><?php the_title(); ?></li>
</ul>

<h2 class="page_title">VIP Access</h2>

<?php
$posts = get_posts('include=9&post_type=page');
foreach($posts as $post) : setup_postdata($post); ?>
<?php the_content(); ?>
<?php endforeach; ?>

</div><!-- //end contents_left -->

<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>

<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>