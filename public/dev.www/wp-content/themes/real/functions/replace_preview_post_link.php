<?php
// プレビューのリンクの修正
function replace_preview_post_link ( $url ) {
  $replace_url = str_replace('http://liverealmadrid.jp/', 'http://liverealmadrid-wp.appmlj.com/', $url);
  return $replace_url;
}
add_filter('preview_post_link', 'replace_preview_post_link');