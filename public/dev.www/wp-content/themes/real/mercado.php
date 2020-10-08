<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: mercado
*/
?>


<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>


<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">

		<div id="contentsarea" class="clearfix">



<div class="clasificaciontitle">移籍情報</div>



<div id="mercadotitle">
<span>噂</span>
</div>

<?php echo do_shortcode( '[table id=14 /]' ); ?>



<div id="mercadotitle">
<span>加入</span>
</div>

<?php echo do_shortcode( '[table id=15 /]' ); ?>


<div id="mercadotitle">
<span>レンタルバック</span>
</div>


<?php echo do_shortcode( '[table id=16 /]' ); ?>


			<div id="plink" class="clearfix">
				<div class="pnavi">
				<div class="pleft"><a href="#" onClick="history.back(); return false;"><i class="fa fa-angle-left"></i> 戻る</a></div>
				</div>
			</div>




		</div><!--/contentsarea-->

<style>
#mercadotitle{
width:100%;
overflow:hidden;
margin-left:auto;
margin-right:auto;
}
#mercadotitle span{
margin-bottom:3px;
padding:6px 20px;
background: #00489b;
color: #fff;
display:block;
font-weight: bold;
}
#tablepress-14,
#tablepress-15,
#tablepress-16{
overflow: hidden;
margin: 0;
width: 100%;
height: auto;
}
#tablepress-14 .column-1,
#tablepress-15 .column-1,
#tablepress-16 .column-1{
overflow: hidden;
margin: 0;
width: 30%;
padding:6px;
height: auto;
font-size: 14px;
}
#tablepress-14 .column-2,
#tablepress-15 .column-2,
#tablepress-16 .column-2{
overflow: hidden;
margin: 0;
width: 10%;
padding:6px;
height: auto;
font-size: 14px;
text-align:center;
}
#tablepress-14 .column-3,
#tablepress-15 .column-3,
#tablepress-16 .column-3{
overflow: hidden;
margin: 0;
width: 40%;
padding:6px;
height: auto;
font-size: 14px;
}


</style>






	</div><!--/contentsleft-->

		<div id="sp">
		<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
		</div>

</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>


