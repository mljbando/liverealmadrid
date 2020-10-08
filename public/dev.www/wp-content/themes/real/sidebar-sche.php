<div id="sidebox-sche">
<div class="sideboxline"></div>
<h2><i class="far fa-calendar-alt" style="padding-right:6px;"></i>試合日程</h2>

		<div id="schebox">
			<div id="match">
				<ul><?php echo do_shortcode( '[schedule-list id=2 offset=1 limit=8 next="+1day"]

					<li>
						<p class="icon_compe"><img src="/images/competition/%%competition%%.png"></p>
						<p class="compe">%%section%%</p>
						<p class="gameno"><span class="gamedata">%%match_date%%</span></p>
						<p class="home"><img src="%%home_emblem%%" /></p>
						<p class="away"><img src="%%away_emblem%%" /></p>
						<p class="hname">%%home_team%%</p>
						<p class="aname">%%away_team%%</p>
					</li>[/schedule-list]' ); ?>

				</ul>
			</div>
			<div id="schecompe">
				<ul>
					<?php
					/*
					<li><a href="/proximamente"><i class="fa fa-angle-right fa-lg"></i>リーガ</a></li>
					<li><a href="/proximamente"><i class="fa fa-angle-right fa-lg"></i>チャンピオンズリーグ</a></li>
					<li><a href="/proximamente"><i class="fa fa-angle-right fa-lg"></i>コパデルレイ</a></li>
					*/
					?><li><a href="/match"><i class="fa fa-angle-right fa-lg"></i>すべての試合</a></li>
				</ul>
			</div>
		</div>
</div>


<div class="clearfix"></div>
