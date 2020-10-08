<div id="sidebar-newsrank">
<div class="sideboxline"></div>
<h2><img src="/images/team/m_realmadridani.gif" width="18px">週間アクセスランキング<img src="/images/team/m_realmadridani.gif" width="18px"></h2>

<?php 
  add_filter( 'sga_ranking_cache_expire', function($expire) { return 12*60*60; } ); 
  add_filter( 'sga_ranking_limit_filter', function($limit) { return 100; } );
?>

<?php
if (function_exists('sga_ranking_get_date')) {
$args = array(
//  'display_count' => 10,
//  'period' => 7,
  'filter' => 'ga:pagePath=~^/news/'
);
    $ranking_data = sga_ranking_get_date($args);
    if ( !empty( $ranking_data ) ) {
        echo '<div id="popular-wrapper">'."\n"."\n";
        foreach ( $ranking_data as $post_id ) {
echo '<div id="popular-container">' ."\n".  '<a href="' . esc_attr(get_permalink($post_id)) . '" class="popular-list">';
?>

<div class="clearfix">
<?php if(has_post_thumbnail($post_id)): ?>
<div class="popular-left object_fit_img">
<?php echo get_the_post_thumbnail($post_id , 'thumbnail', array('alt' => 'ライブレアルマドリード' , 'title' => 'ライブレアルマドリード' )); ?></div>
<?php elseif(get_field('insertpic', $post_id)): ?>
<div class="popular-left object_fit_img">
<?php include (COMMONTEMPLATEPATH . '/insertpic_post.php'); ?></div>
<?php else : ?>
<div class="popular-left object_fit_img">
<img src="/images/common/icon.png" alt="ライブレアルマドリード" title="ライブレアルマドリード"></div>
<?php endif; ?>
<?php
echo '<div class="popular-right"><span class="newsdate">' . get_the_date('Y.m.d H:i', $post_id) . '</span><h5 class="popular-title">' . esc_html(get_the_title($post_id)) . '</h5></div>' ."\n". '</div>' ."\n". '</a>' ."\n". '</div>'."\n";
}
echo '</div>'."\n"."\n".'</div>';
}
}
?>

<div class="clearfix"></div>