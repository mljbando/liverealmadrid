<?php
/**
 * @package WordPress
 * @subpackage real
 */
?>

<?php
// youtubeリストの取得処理
global $youtube_items;
global $youtube_size;
global $youtube_cache_time;


$youtube_cache_time = 86400;// キャッシュする期間（秒指定）
$youtube_size_pc = 3;//PCの表示件数
$youtube_size_sp = 3;//SPの表示件数

$youtube_size = (is_device()==="pc") ? $youtube_size_pc : $youtube_size_sp;
include (COMMONTEMPLATEPATH . '/functions/lib/Youtube.php');
?>

<div id="visual">
<ul>

<?php
if(is_device()==="pc"):
	foreach ($youtube_items as $video) :
?>

<li><img src="http://img.youtube.com/vi/<?php echo $video?>/hqdefault.jpg" width="100%" height="360" data-video="http://www.youtube.com/embed/<?php echo $video?>?theme=light&showinfo=0&autohide=1" frameborder="0" allowfullscreen></li>
<?php
	endforeach;
endif;
?>
</ul>

<script type="text/javascript">
// <![CDATA[
$('img').click(function(){
video = '<iframe width="100%" height="360" src="'+ $(this).attr('data-video') +'" ?theme=light&showinfo=0&autohide=1" frameborder="0" allowfullscreen></iframe>';
$(this).replaceWith(video);
});
// ]]></script>

</div>

<div id="contents" class="clearfix">


<!-- SP visual -->

<div id="visualsp" style="text-align:center;">
<ul class="bxslider">

<?php
if(is_device()==="sp"):
	foreach ($youtube_items as $video):
?>
<li><iframe width="320" height="180" src="//www.youtube.com/embed/<?php echo $video?>?theme=light&showinfo=0&autohide=1" frameborder="0" allowfullscreen></iframe></li>
<?php
	endforeach;
endif;
?>

</ul>
<script src="/js/jquery.bxslider.min.js"></script>
<script>
/* bxslider*/
$(document).ready(function(){
$('.bxslider').bxSlider({
auto: true,
controls: true
});
}); 
</script>
</div>




