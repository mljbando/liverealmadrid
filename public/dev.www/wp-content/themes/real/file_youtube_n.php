<?php
/**
 * @package WordPress
 * @subpackage real
 */
?>

<div id="visual">
<ul>

<?php
$url = "https://www.youtube.com/feeds/videos.xml?channel_id=UCWV3obpZVGgJ3j9FVhEjF2Q";
$rss = file_get_contents($url);
$rss = preg_replace("/<([^>]+?):(.+?)>/", "<$1_$2>", $rss);
$rss = simplexml_load_string($rss,'SimpleXMLElement',LIBXML_NOCDATA);
 
foreach($rss->entry as $value): ?>


<!--    <iframe width="480" height="360" src="https://www.youtube.com/embed/<?php echo htmlspecialchars($value->yt_videoId, ENT_QUOTES, 'UTF-8') ?>" frameborder="0" allowfullscreen></iframe>-->
 <!--   <iframe width="480" height="360" src="https://www.youtube.com/embed/<?php echo htmlspecialchars($value->yt_videoId, ENT_QUOTES, 'UTF-8') ?>" frameborder="0" allowfullscreen></iframe>-->

<li><img src="http://img.youtube.com/vi/<?php echo htmlspecialchars($value->yt_videoId, ENT_QUOTES, 'UTF-8') ?>/hqdefault.jpg" width="100%" height="360" data-video="https://www.youtube.com/embed/<?php echo htmlspecialchars($value->yt_videoId, ENT_QUOTES, 'UTF-8') ?>?theme=light&showinfo=0&autohide=1" frameborder="0" allowfullscreen></li>

<?php endforeach; ?>
</ul>

<div id="contents" class="clearfix">

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



<!--
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
-->


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
</div>




