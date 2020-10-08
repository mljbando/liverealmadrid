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
<p class="txt404">アクセスしようとしたページが見つかりません。</p>

<p class="txt404">ご覧になっていたページからのリンクが無効になっているか、ご入力頂いたアドレス（URL）がタイプミス等で間違っている可能性があります。<br />
アドレスを再度ご確認頂くか、下記のリンクよりTOPページにお進み頂き、目的のページをお探しください。 </p>

<p class="txt404"><a href="/">TOPページへ戻る</a></p>
</div>

<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>

<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>
