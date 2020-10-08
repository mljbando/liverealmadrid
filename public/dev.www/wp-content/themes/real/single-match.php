<?php
/**
 * @package WordPress
 * @subpackage real
 */
 
add_filter ('the_content', 'wpautop');
?>

<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>

<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">

		<div id="contentsarea" class="clearfix">




<div id="spaera" class="clearfix">

#%funcparts:GET_USER_STATUS%#
#%element:VISIBLE user_status="nomember,unknown"%#
<div class="accordion-box">
  <input id="ac00" type="" onClick="location.href='/login?returl=#%funcword:req_url urlenc="1"%#'">
</div>
#%/element%#



<?php
/*
SP nomember,unknown
*/
?>
#%funcparts:GET_USER_STATUS%#
#%element:VISIBLE user_status="nomember,unknown"%#
<div class="accordion-box">
  <input id="ac00" type="checkbox" onClick="location.href='/login?returl=#%funcword:req_url urlenc="1"%#'">
  <label for="ac00"></label>


<div id="matchdetail">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<p class="matchdate">
<i class="far fa-clock"></i><?php print_r(get_post_meta($post->ID,'match_date',true));?>
</p>

<p class="matchcompe">
<?php print_r(get_post_meta($post->ID,'section',true));?>
</p>

<?php if(post_custom('competition')): ?>
<div class="icon_compe">
<img src="/images/competition/<?php print_r(get_post_meta($post->ID,'competition',true));?>.png">
</div>
<?php endif; ?>

<div class="match_pic">
<?php if(post_custom('match_video')): ?>
<a href="<?php echo post_custom('match_video'); ?>" target="_blank" rel="noreferrer" alt="ライブレアルマドリード" title="レアルマドリード試合ハイライト映像">
<span class="blinking"><i class="far fa-play-circle" aria-hidden="true"></i></span>
<?php if(post_custom('match_pic')): ?>
<img src="/wp-content/uploads/<?php echo post_custom('match_pic'); ?>.jpg" rel="noreferrer" alt="ライブレアルマドリード" title="レアルマドリード試合ハイライト映像">
<?php endif; ?>
<h2><i class="fas fa-video" style="padding-right:6px;"></i>試合ハイライト映像</h2>
</a>
<?php endif; ?>
</div>
<div style="margin:6px 0;"></div>

<!--
<p class="match_video">
<?php if(post_custom('match_video')): ?>
<a href="<?php echo post_custom('match_video'); ?>" target="_blank" rel="noreferrer"><span class="blinking"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span></a>
<?php endif; ?>
</p>
-->

<p class="matchstatus">
<span>
<?php print_r(get_post_meta($post->ID,'status',true));?>
<?php print_r(get_post_meta($post->ID,'stradio',true));?>
</span>
</p>

<div id="matchsbox1">

<div class="Hteam">
<?php print_r(nl2br(get_post_meta($post->ID,'home_team',true)));?>
</div>

<div class="Hscore">
<?php print_r(get_post_meta($post->ID,'home_points',true));?>
</div>

<div class="score">
<?php print_r(nl2br(get_post_meta($post->ID,'half_all_score',true)));?>
</div>

<div class="Ascore">
<?php print_r(get_post_meta($post->ID,'away_points',true));?>
</div>


<div class="Ateam">
<?php print_r(nl2br(get_post_meta($post->ID,'away_team',true)));?>
</div>

</div><!--/matchbox1-->


<!--directo-->
<details open>
<summary><span>試合詳細</span></summary>
<?php $cf_group = SCF::get('directo');
foreach ($cf_group as $field_name => $field_value ){
?>
	<div id="matcheventsbox">
		<div class="Hresult">
			<?php echo $field_value['directohome'];?> <span class="directoevents"><?php echo $field_value['eventsh'];?></span>
		</div>
		<div class="result">
			<span class="directotime"><?php echo $field_value['directotime'];?></span>
		</div>
		<div class="Aresult">
			<span class="directoevents"><?php echo $field_value['eventsa'];?></span> <?php echo $field_value['directoaway'];?>
		</div>
	</div><!--/matcheventsbox-->
<?php } ?>
</details>

<?php $customfield = get_post_meta($post->ID, 'directotime', true); ?>
<?php if(!empty($customfield) ): ?>
<div id="tempold" style="display:none;">
<?php else: ?>
<?php echo esc_html( $post->custom_field_name ); ?>
<?php endif; ?>


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'goal_home',true)));?>
</div>

<div class="result">
<i class="far fa-futbol"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'goal_away',true)));?>
</div>
</div><!--/matchbox2-->


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'foul_home',true)));?>
</div>

<div class="result">
<i class="far fa-square"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'foul_away',true)));?>
</div>
</div><!--/matchbox2-->

<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_leave',true)));?>
</div>

<div class="result">
<i class="fas fa-square"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_leave',true)));?>
</div>
</div><!--/matchbox2-->


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_change',true)));?>
</div>

<div class="result">
<i class="fas fa-exchange-alt"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_change',true)));?>
</div>

</div><!--/matchbox2-->


<?php $customfield = get_post_meta($post->ID, 'directotime', true); ?>
<?php if(!empty($customfield) ): ?>
</div>
<?php else: ?>
<?php echo esc_html( $post->custom_field_name ); ?>
<?php endif; ?>




<!--スタメン-->
<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_teamst',true)));?>
</div>

<div class="result">
<i class="fas fa-users"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_teamst',true)));?>
</div>

</div><!--/スタメン-->


<div id="matchsbox2">
<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_sub',true)));?>
</div>

<div class="result">
<i class="fas fa-user-plus"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_sub',true)));?>
</div>

</div><!--/matchbox2-->


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(get_post_meta($post->ID,'home_commanding_officer',true));?>
</div>

<div class="result">
<i class="far fa-user"></i>
</div>

<div class="Aresult">
<?php print_r(get_post_meta($post->ID,'away_commanding_officer',true));?>
</div>

</div><!--/matchbox2-->


<?php
	endwhile;
endif; ?>


</div>
</div><!--/matchdetail-->
#%/element%#


<?php
/*
SP member
*/
?>


#%funcparts:GET_USER_STATUS%#
#%element:VISIBLE user_status="member"%#
<div id="matchdetail">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<p class="matchdate">
<i class="far fa-clock"></i><?php print_r(get_post_meta($post->ID,'match_date',true));?>
</p>

<p class="matchcompe">
<?php print_r(get_post_meta($post->ID,'section',true));?>
</p>

<?php if(post_custom('competition')): ?>
<div class="icon_compe">
<img src="/images/competition/<?php print_r(get_post_meta($post->ID,'competition',true));?>.png">
</div>
<?php endif; ?>

<div class="match_pic">
<?php if(post_custom('match_video')): ?>
<a href="<?php echo post_custom('match_video'); ?>" target="_blank" rel="noreferrer" alt="ライブレアルマドリード" title="レアルマドリード試合ハイライト映像">
<span class="blinking"><i class="far fa-play-circle" aria-hidden="true"></i></span>
<?php if(post_custom('match_pic')): ?>
<img src="/wp-content/uploads/<?php echo post_custom('match_pic'); ?>.jpg" rel="noreferrer" alt="ライブレアルマドリード" title="レアルマドリード試合ハイライト映像">
<?php endif; ?>
<h2><i class="fas fa-video" style="padding-right:6px;"></i>試合ハイライト映像</h2>
</a>
<?php endif; ?>
</div>
<div style="margin:6px 0;"></div>

<!--
<p class="match_video">
<?php if(post_custom('match_video')): ?>
<a href="<?php echo post_custom('match_video'); ?>" target="_blank" rel="noreferrer"><span class="blinking"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span></a>
<?php endif; ?>
</p>
-->

<p class="matchstatus">
<span>
<?php print_r(get_post_meta($post->ID,'status',true));?>
<?php print_r(get_post_meta($post->ID,'stradio',true));?>
</span>
</p>

<div id="matchsbox1">

<div class="Hteam">
<?php print_r(nl2br(get_post_meta($post->ID,'home_team',true)));?>
</div>

<div class="Hscore">
<?php print_r(get_post_meta($post->ID,'home_points',true));?>
</div>

<div class="score">
<?php print_r(nl2br(get_post_meta($post->ID,'half_all_score',true)));?>
</div>

<div class="Ascore">
<?php print_r(get_post_meta($post->ID,'away_points',true));?>
</div>


<div class="Ateam">
<?php print_r(nl2br(get_post_meta($post->ID,'away_team',true)));?>
</div>

</div><!--/matchbox1-->


<!--directo-->
<details open>
<summary><span>試合詳細</span></summary>
<?php $cf_group = SCF::get('directo');
foreach ($cf_group as $field_name => $field_value ){
?>
	<div id="matcheventsbox">
		<div class="Hresult">
			<?php echo $field_value['directohome'];?> <span class="directoevents"><?php echo $field_value['eventsh'];?></span>
		</div>
		<div class="result">
			<span class="directotime"><?php echo $field_value['directotime'];?></span>
		</div>
		<div class="Aresult">
			<span class="directoevents"><?php echo $field_value['eventsa'];?></span> <?php echo $field_value['directoaway'];?>
		</div>
	</div><!--/matcheventsbox-->
<?php } ?>
</details>



<?php $customfield = get_post_meta($post->ID, 'directotime', true); ?>
<?php if(!empty($customfield) ): ?>
<div id="tempold" style="display:none;">
<?php else: ?>
<?php echo esc_html( $post->custom_field_name ); ?>
<?php endif; ?>


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'goal_home',true)));?>
</div>

<div class="result">
<i class="far fa-futbol"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'goal_away',true)));?>
</div>
</div><!--/matchbox2-->


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'foul_home',true)));?>
</div>

<div class="result">
<i class="far fa-square"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'foul_away',true)));?>
</div>
</div><!--/matchbox2-->

<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_leave',true)));?>
</div>

<div class="result">
<i class="fas fa-square"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_leave',true)));?>
</div>
</div><!--/matchbox2-->


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_change',true)));?>
</div>

<div class="result">
<i class="fas fa-exchange-alt"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_change',true)));?>
</div>

</div><!--/matchbox2-->

<?php $customfield = get_post_meta($post->ID, 'directotime', true); ?>
<?php if(!empty($customfield) ): ?>
</div>
<?php else: ?>
<?php echo esc_html( $post->custom_field_name ); ?>
<?php endif; ?>

<!--スタメン-->
<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_teamst',true)));?>
</div>

<div class="result">
<i class="fas fa-users"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_teamst',true)));?>
</div>

</div><!--/スタメン-->


<div id="matchsbox2">
<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_sub',true)));?>
</div>

<div class="result">
<i class="fas fa-user-plus"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_sub',true)));?>
</div>

</div><!--/matchbox2-->

<div id="matchsbox2">

<div class="Hresult">
<?php print_r(get_post_meta($post->ID,'home_commanding_officer',true));?>
</div>

<div class="result">
<i class="far fa-user"></i>
</div>

<div class="Aresult">
<?php print_r(get_post_meta($post->ID,'away_commanding_officer',true));?>
</div>

</div><!--/matchbox2-->


<?php
	endwhile;
endif; ?>



</div><!--/matchdetail-->


#%/element%#
</div><!--/spaera-->




<div id="pcaera" class="clearfix">

<div id="matchdetail">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php
//60sec reload
$cf_color = get_field('stradio');
if ($cf_color == '試合前'){
    echo '';
} elseif ($cf_color == '試合終了'){
    echo '';
} elseif ($cf_color == '試合延期'){
    echo '';
} elseif ($cf_color == '試合中止'){
    echo '';
}else{
    echo '<div class="blinklive">LIVE</div>';
}
?>

<p class="matchdate">
<i class="far fa-clock"></i><?php print_r(get_post_meta($post->ID,'match_date',true));?>
</p>

<p class="matchcompe">
<?php print_r(get_post_meta($post->ID,'section',true));?>
</p>

<?php if(post_custom('competition')): ?>
<div class="icon_compe">
<img src="/images/competition/<?php print_r(get_post_meta($post->ID,'competition',true));?>.png">
</div>
<?php endif; ?>

<div class="match_pic">
<?php if(post_custom('match_video')): ?>
<a href="<?php echo post_custom('match_video'); ?>" target="_blank" rel="noreferrer" alt="ライブレアルマドリード" title="レアルマドリード試合ハイライト映像">
<span class="blinking"><i class="far fa-play-circle" aria-hidden="true"></i></span>
<?php if(post_custom('match_pic')): ?>
<img src="/wp-content/uploads/<?php echo post_custom('match_pic'); ?>.jpg" rel="noreferrer" alt="ライブレアルマドリード" title="レアルマドリード試合ハイライト映像">
<?php endif; ?>
<h2><i class="fas fa-video" style="padding-right:6px;"></i>試合ハイライト映像</h2>
</a>
<?php endif; ?>
</div>
<div style="margin:6px 0;"></div>

<!--
<p class="match_video">
<?php if(post_custom('match_video')): ?>
<a href="<?php echo post_custom('match_video'); ?>" target="_blank" rel="noreferrer"><span class="blinking"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span></a>
<?php endif; ?>
</p>
-->



<?php
//60sec reload
$cf_color = get_field('stradio');
if ($cf_color == '試合前'){
    echo '';
} elseif ($cf_color == '試合終了'){
    echo '';
} elseif ($cf_color == '試合延期'){
    echo '';
} elseif ($cf_color == '試合中止'){
    echo '';
}else{
    echo '<div id="countaera"><span id="countsec">60</span></div>';
}
?>
<script type="text/javascript">
	function countdown($call, $count) {
	  $('#countsec').text($count);
	    if($count) {
	      setTimeout(function() {
	        $count = $count-1;
	        countdown($call, $count);
	      }, 1000);
	    }else {
	      $('#countaera').append($('<scr'+'ipt>'+$call+';<\/scr'+'ipt>'));
	  }
	}// end function
	$(function() {
	  countdown('window.location.replace("<?php the_permalink(); ?>")', 60);
	});
//end 60sec reload
</script>

<p class="matchstatus">
<span>
<?php print_r(get_post_meta($post->ID,'status',true));?>
<?php print_r(get_post_meta($post->ID,'stradio',true));?>
</span>
</p>

<div id="matchsbox1">

<div class="Hteam">
<?php print_r(nl2br(get_post_meta($post->ID,'home_team',true)));?>
</div>

<div class="Hscore">
<?php print_r(get_post_meta($post->ID,'home_points',true));?>
</div>

<div class="score">
<?php print_r(nl2br(get_post_meta($post->ID,'half_all_score',true)));?>
</div>

<div class="Ascore">
<?php print_r(get_post_meta($post->ID,'away_points',true));?>
</div>


<div class="Ateam">
<?php print_r(nl2br(get_post_meta($post->ID,'away_team',true)));?>
</div>

</div><!--/matchbox1-->

<!--directo-->
<details open>
<summary><span>試合詳細</span></summary>
<?php $cf_group = SCF::get('directo');
foreach ($cf_group as $field_name => $field_value ){
?>
	<div id="matcheventsbox">
		<div class="Hresult">
			<?php echo $field_value['directohome'];?> <span class="directoevents"><?php echo $field_value['eventsh'];?></span>
		</div>
		<div class="result">
			<span class="directotime"><?php echo $field_value['directotime'];?></span>
		</div>
		<div class="Aresult">
			<span class="directoevents"><?php echo $field_value['eventsa'];?></span> <?php echo $field_value['directoaway'];?>
		</div>
	</div><!--/matcheventsbox-->
<?php } ?>
</details>


<?php $customfield = get_post_meta($post->ID, 'directotime', true); ?>
<?php if(!empty($customfield) ): ?>
<div id="tempold" style="display:none;">
<?php else: ?>
<?php echo esc_html( $post->custom_field_name ); ?>
<?php endif; ?>


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'goal_home',true)));?>
</div>

<div class="result">
<i class="far fa-futbol"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'goal_away',true)));?>
</div>
</div>


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'foul_home',true)));?>
</div>

<div class="result">
<i class="fas fa-square"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'foul_away',true)));?>
</div>
</div>

<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_leave',true)));?>
</div>

<div class="result">
<i class="fas fa-stop"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_leave',true)));?>
</div>
</div>

<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_change',true)));?>
</div>

<div class="result">
<i class="fas fa-exchange-alt"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_change',true)));?>
</div>

</div><!--/matchbox2-->


<?php $customfield = get_post_meta($post->ID, 'directotime', true); ?>
<?php if(!empty($customfield) ): ?>
</div>
<?php else: ?>
<?php echo esc_html( $post->custom_field_name ); ?>
<?php endif; ?>


<!--スタメン-->
<div id="matchsbox2">

<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_teamst',true)));?>
</div>

<div class="result">
<i class="fas fa-users"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_teamst',true)));?>
</div>

</div><!--/スタメン-->


<div id="matchsbox2">
<div class="Hresult">
<?php print_r(nl2br(get_post_meta($post->ID,'home_sub',true)));?>
</div>

<div class="result">
<i class="fas fa-user-plus"></i>
</div>

<div class="Aresult">
<?php print_r(nl2br(get_post_meta($post->ID,'away_sub',true)));?>
</div>

</div><!--/matchbox2-->


<div id="matchsbox2">

<div class="Hresult">
<?php print_r(get_post_meta($post->ID,'home_commanding_officer',true));?>
</div>

<div class="result">
<i class="far fa-user"></i>
</div>

<div class="Aresult">
<?php print_r(get_post_meta($post->ID,'away_commanding_officer',true));?>
</div>

</div><!--/matchbox2-->


<?php
	endwhile;
endif; ?>



</div><!--/matchdetail-->
</div><!--/pcaera-->











		</div><!--/contentsarea-->


</div><!--/contentsleft-->


<div id="contentsright" class="clearfix">



<?php
/*検索/////////////////////////////*/
?>
<?php get_search_form(); ?>
<?php
/*/////////////////////////////検索*/
?>


<div id="sidebar" class="clearfix">

<div class="bnrwrapper">
<a href="/video" rel="noreferrer"><div id="indexTopBnr"><!--ajax bnr1--></div>
<img class="spbnr" src="/images/index/bnr_video.gif" alt="" />
<span class="bnrvideos"><i class="fas fa-video"></i> VIDEOS</span></a>
</div>

</div>




<!--?php include (COMMONTEMPLATEPATH . '/sidebar-ranking.php'); ?-->

<?php include (COMMONTEMPLATEPATH . '/sidebar-sche.php'); ?>

</div>



</div><!--/contents-->




<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>