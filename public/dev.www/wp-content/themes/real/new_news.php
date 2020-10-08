<?php
//ライブラリ読み込み
require_once 'Cache/Lite.php';

//RSSのURL
//$rss_url = "http://www.realmadrid.jp/news/news_rss";
$rss_url = "http://liverealmadrid.jp/news_rss";
//$rss_url = "http://liverealmadrid.jp/feed";
//$rss_url = "http://liverealmadrid.jp/feed/rss";


//XMLを取りに行く時のキャッシュ防止用
$rss_data = date("YmdHis");
//取得件数
$limit = 2;

//キャッシュデータ設定
$cacheOptions = array (
    'cacheDir' => './tmp/',
    'lifeTime' => '60',// 1800秒
    "automaticCleaningFactor" => "10",
);

$cacheId = $rss_url;

$objCache = new Cache_Lite($cacheOptions);

//if ($cache = $objCache->get($cacheId)) {
if (false) {
    // キャッシュがあればキャッシュからデータを取得
    $rss_xml = $cache;
    $b="キャッシュから<br />";
}
else{
    $rss_url .= "?limit=".$limit;
//    $rss_url .= "&post_type=news";
    // キャッシュがなければデータを取りに行く
    $rss_url .= "&date=".$rss_data;
    $rss_xml = file_get_contents($rss_url);
    $objCache->save($rss_xml,$cacheId);// キャッシュとして保存
    $b= $rss_url ."取得<br />" .$cacheId ."ID<br />";
}

$items = simplexml_load_string($rss_xml);

?>
<ul>
<?php
if (empty($items)) :
?> <li>記事がありません</li>
<?php
else :
foreach ( $items->channel->item as $item ) : ?>
<li>
<p class="photo"><a href='<?php echo $item->link; ?>'><img src="<?php echo $item->images; ?>" alt="<?php echo $item->title; ?>" /></a></p>
<p class="data"><?php echo $item->category; ?>　-　<?php echo $item->data; ?></p>
<h3><a href='<?php echo $item->link; ?>'><?php echo $item->title; ?></a></h3>
<p class="txt"><?php echo $item->description; ?></p>
</li>
<?php endforeach; ?>
<?php endif; ?>
</ul>