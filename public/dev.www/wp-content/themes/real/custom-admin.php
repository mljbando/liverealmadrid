<?php
/*
Template Name: Theme My Login用テンプレート
*/
?>
<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>


<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">

		<div id="contentsarea" class="clearfix">

			<div id="plink" class="clearfix">
				<div class="pnavi">
				
					<div class="pleft"><a href="<?php
						print_r(isset($_GET['return_to'])? $_GET['return_to']: '#" onClick="history.back(); return false;')
					?>"><i class="fa fa-angle-left"></i> 戻る</a></div>
				</div>
			</div>

			<div id="singlenews" class="clearfix">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php 
					/* テーマ内のprofile-form.phpを読み込んでいます */
					the_content();
					?>
				<?php
					endwhile;
				endif; ?>
			</div><!--/singlenews-->

		</div><!--/contentsarea-->


	</div><!--/contentsleft-->

	<div id="sp">
	<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
	</div>

</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>