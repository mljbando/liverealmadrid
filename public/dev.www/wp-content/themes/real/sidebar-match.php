
<div id="sidebox-live">
<div class="sideboxline"></div>
<h2><i class="fas fa-futbol" style="padding-right:6px;"></i>試合情報</h2>

<?php echo do_shortcode( '[schedule-list id=2 offset=0 limit=1 next="+1day"]

<div id="matchvideot">
	<div class="match_pic">
	<a href="%%match_video%%" target="_blank" rel="noreferrer" alt="ライブレアルマドリード" title="レアルマドリード試合ハイライト映像">
	<span class="blinking"><i class="far fa-play-circle" aria-hidden="true"></i></span>
	<img src="/wp-content/uploads/%%match_pic%%.jpg" rel="noreferrer" alt="ライブレアルマドリード" title="レアルマドリード試合ハイライト映像">
	<h2><i class="fas fa-video" style="padding-right:6px;"></i>試合ハイライト映像</h2>
	</a>
	</div>
</div>

			<div id="livebox">
				<p class="icon_compe"><img src="/images/competition/%%competition%%.png"></p>
				<p class="compe">%%section%%</p>
				<p class="gameno"><span class="gamedata">%%match_date%%</span></p>
				<div id="match">
					<p class="home"><img src="%%home_emblem%%" /><br><span>%%home_team%%</span></p>
					<p class="score"><span class="h_score">%%h_score%%</span><span class="t_score">%%t_score%%</span><span class="a_score">%%a_score%%</span></p>
					<p class="away"><img src="%%away_emblem%%" /><br><span>%%away_team%%</span></p>
				</div>

				<div id="livebtarea">
					<p class="livebt"><a href="%%link%%"><span>詳細</span></a></p>
				</div>
			</div>

[/schedule-list]' ); ?>

<script type="text/javascript">
<!--
	$("#matchvideot .match_pic a[href='']").hide();
	$("#matchvideot .match_pic a img[src='']").hide();
//-->
</script>

</div>

<div class="clearfix"></div>
