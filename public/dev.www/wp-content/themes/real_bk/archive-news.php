<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" <?php language_attributes(); ?>>
<head>
<?php include (COMMONTEMPLATEPATH . '/declaration.php'); ?>
<title><?php get_title('',true,'right'); ?><?php bloginfo('name'); ?></title>
<meta name="Keywords" content="サッカー,スペイン,レアル,レアル・マドリード,レアルマドリード,リーガ,リーガ・エスパニョーラ,チャンピオンズ,チャンピオンズリーグ,ＣＬ,クラシコ,エルクラシコ,エル・クラシコ" />
<meta name="Description" content="<?php wp_title('&nbsp;', true, 'right'); ?><?php bloginfo('description'); ?>" />
<?php include (COMMONTEMPLATEPATH . '/file_read.php'); ?>
<link rel="stylesheet" type="text/css" href="/news/css/news.css" />
<link type="image/x-icon" href="/images/common/favicon.ico" rel="shortcut icon"/>
</head>

<body>
<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>

<div id="contents_left">
<ul id="path">
<li class="home"><a href="/">TOP</a></li>
<li><a href="/news/">ニュース一覧</a></li>
<li><?php get_title('',true,'right'); ?></li>
</ul>

<div id="top_navi">
<h2 class="page_title"><?php get_title('',true,'right'); ?></h2>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>

<div id="news_left">

<ul class="list">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<li>
<p class="photo"><a href="<?php the_permalink() ?>"><img src="<?php echo post_custom('news_images1')?>" alt="<?php the_title(); ?>" /></a></p>
<p class="data"><?php $cat = get_the_category(); $cat = $cat[0]; {echo "$cat->cat_name";} ?> - <?php the_time('Y/m/d'); ?></p>
<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
<p class="txt"><?php echo post_custom('news_description')?></p>
</li>

<?php endwhile; else: ?>
<li><?php _e('Sorry, no posts matched your criteria.'); ?></li>
<?php endif; ?>

</ul>
<p class="pagetop"><a href="#wrapper">PAGE TOP</a></p>
</div>

<?php include (TEMPLATEPATH . '/sidebar.php'); ?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

</div><!-- //end contents_left -->

<?php include (TEMPLATEPATH . '/news_sidebar.php'); ?>

<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>
