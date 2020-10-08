<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<div id="sche_sidebar">
<?php 	/* Widgetized sidebar, if you have the plugin installed. */
//		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : 
//		if ( !is_active_sidebar( 1 )) : 
		if ( true ) : 
		?>

<h3>カテゴリー別</h3>
<ul class="cate_list">
<?php wp_list_categories('title_li=&orderby=id'); ?>

</ul>

<h3 class="all"><a href="/schedule/">全ての試合</a></h3>

<?php endif; ?>
</div><!-- end sidebar -->