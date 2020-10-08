<?php header('Content-Type: text/xml; charset='.get_option('blog_charset'), true); ?>
<?php /*
Template Name: news_RSS
*/ ?>
<?php echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<rss version="0.92">
<channel>
	<title>ニュース - レアル・マドリードＣ.Ｆ.｜Official Web Site</title>
	<link>http://liverealmadrid.jp</link>
	<description><?php bloginfo('description'); ?></description>
	<lastBuildDate><?php echo get_the_modified_date('r');?></lastBuildDate>
	<docs>http://backend.userland.com/rss092</docs>
	<language>ja</language>
<?php
$paged = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
//query_posts("posts_per_page=$paged");
	query_posts(array( 
		'post_type' => 'news',
		'posts_per_page' => $paged
	) );
if (have_posts()) : while (have_posts()) : the_post();
$post_id = get_the_ID();
//$test = get_post_meta($post_id, 'news_images1', true);
//$imagefield = get_imagefield('news_images1');
//print_r($imagefield);
	$attachment_id = get_field('news_images1');
	$size = "medium"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
//echo $image[0];//url
//echo $image[1];//幅
//echo $image[2];// 高さ
?>


<item>
<title><?php the_title(); ?></title>
<data><?php the_time('Y/m/d'); ?></data>
<description><?php echo  get_post_meta($post_id, 'news_description', 'true'); ?></description>
<images><?php echo $image[0];//echo $imagefield["url"] ;//echo post_custom('news_images1')?></images>
<link><?php the_permalink(); ?></link>
<?php echo the_category_rss(); ?>
</item>
<?php endwhile; endif; ?>
</channel>
</rss>