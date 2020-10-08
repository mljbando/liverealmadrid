<?php
//ライブラリ読み込み
require_once 'Cache/Lite.php';

//RSSのURL
//$rss_url2 = "http://www.realmadrid.jp/news/news_pickup";
$rss_url2 = "http://liverealmadrid.jp/news_pickup_rss";

//XMLを取りに行く時のキャッシュ防止用
$rss_data2 = date("YmdHis");

// 取得件数
$limit2 = 9;
// 表示カラム数
$maxcol=3;

//キャッシュデータ設定
$cacheOptions = array (
    'cacheDir' => './tmp/',
    'lifeTime' => '60',// 1800秒
    "automaticCleaningFactor" => "20",
);

$cacheId = $rss_url2;

$objCache = new Cache_Lite($cacheOptions);

if ($cache = $objCache->get($cacheId)) {
    // キャッシュがあればキャッシュからデータを取得
    $rss_xml2 = $cache;
    $b="キャッシュから<br />";
}
else{
    $rss_url2 .= "?limit=".$limit2;
    // キャッシュがなければデータを取りに行く
    $rss_url2 .= "&date=".$rss_data2;
    $rss_xml2 = file_get_contents($rss_url2);
    $objCache->save($rss_xml2,$cacheId);// キャッシュとして保存
    $b= $rss_url2 ."取得<br />" .$cacheId ."ID<br />";
}

$items2 = simplexml_load_string ($rss_xml2);
$count=0;
?>
<?php
if (empty($items2)) :
?> <li>記事がありません</li>
<?php
else :
foreach ( $items2->channel->item as $item ) : ?>
<?php if($count==0) echo "<ul>\n"; ?>
<li>
<p class="photo"><a href="<?php echo $item->link; ?>"><img src="<?php echo $item->images; ?>" /></a></p>
<h3><?php echo $item->title; ?></h3>
</li>
<?php if($count==$maxcol -1) echo "</ul>\n"; ?>
<?php $count=++$count % $maxcol; ?>
<?php endforeach; ?>
<?php endif; ?>