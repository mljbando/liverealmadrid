<?php
/**
 * @package WordPress
 * @subpackage real
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" <?php language_attributes(); ?>>
<head>
<?php include (COMMONTEMPLATEPATH . '/declaration.php'); ?>

<title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'left'); ?></title>
<?php include (COMMONTEMPLATEPATH . '/file_read.php'); ?>

</head>

<body <?php body_class(); ?>>
<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>

<div id="contents_left">
<h2>新着ニュース</h2>
<?php include (COMMONTEMPLATEPATH . '/new_news.php'); ?>

<h2>ピックアップニュース</h2>
<?php include (COMMONTEMPLATEPATH . '/pickup_news.php'); ?>
</div>

<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>

<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>
