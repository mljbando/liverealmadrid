<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: uclclasificaciones
*/
?>

<?php include (COMMONTEMPLATEPATH . '/common_header.php'); ?>

<style>

.page-id-32800 #tablepress-6{
width: 96%;
margin-right:auto;
margin-left:auto;
padding:0;
border-collapse: collapse; 
}
.page-id-32800 #tablepress-6 td{
vertical-align: middle;
height:30px;
}

tr.row-2,
tr.row-3,
tr.row-8,
tr.row-9,
tr.row-14,
tr.row-15,
tr.row-20,
tr.row-21,
tr.row-26,
tr.row-27,
tr.row-32,
tr.row-33,
tr.row-38,
tr.row-39,
tr.row-44,
tr.row-45
 {
    background: #f5f5f5;
}


.page-id-32800 #tablepress-6 tr.row-6,
.page-id-32800 #tablepress-6 tr.row-12,
.page-id-32800 #tablepress-6 tr.row-18,
.page-id-32800 #tablepress-6 tr.row-24,
.page-id-32800 #tablepress-6 tr.row-30,
.page-id-32800 #tablepress-6 tr.row-36,
.page-id-32800 #tablepress-6 tr.row-42,
.page-id-32800 #tablepress-6 tr.row-48 {
height: 24px;
margin-bottom: 20px;
}
.page-id-32800 #tablepress-6 tr{
border-bottom:#ccc solid 1px;
}
.page-id-32800 #tablepress-6 tr.row-6,
.page-id-32800 #tablepress-6 tr.row-12,
.page-id-32800 #tablepress-6 tr.row-18,
.page-id-32800 #tablepress-6 tr.row-24,
.page-id-32800 #tablepress-6 tr.row-30,
.page-id-32800 #tablepress-6 tr.row-36,
.page-id-32800 #tablepress-6 tr.row-42,
.page-id-32800 #tablepress-6 tr.row-48 {
border-bottom:none;
}
.page-id-32800 #tablepress-6 tr.row-3,
.page-id-32800 #tablepress-6 tr.row-9,
.page-id-32800 #tablepress-6 tr.row-15,
.page-id-32800 #tablepress-6 tr.row-21,
.page-id-32800 #tablepress-6 tr.row-27,
.page-id-32800 #tablepress-6 tr.row-33,
.page-id-32800 #tablepress-6 tr.row-39,
.page-id-32800 #tablepress-6 tr.row-45 {
border-bottom-style: groove;
}
/*
.page-id-32800 #tablepress-6 tr.row-2 td.column-1,
.page-id-32800 #tablepress-6 tr.row-3 td.column-1,
.page-id-32800 #tablepress-6 tr.row-8 td.column-1,
.page-id-32800 #tablepress-6 tr.row-9 td.column-1,
.page-id-32800 #tablepress-6 tr.row-14 td.column-1,
.page-id-32800 #tablepress-6 tr.row-15 td.column-1,
.page-id-32800 #tablepress-6 tr.row-20 td.column-1,
.page-id-32800 #tablepress-6 tr.row-21 td.column-1,
.page-id-32800 #tablepress-6 tr.row-26 td.column-1,
.page-id-32800 #tablepress-6 tr.row-27 td.column-1,
.page-id-32800 #tablepress-6 tr.row-32 td.column-1,
.page-id-32800 #tablepress-6 tr.row-33 td.column-1,
.page-id-32800 #tablepress-6 tr.row-38 td.column-1,
.page-id-32800 #tablepress-6 tr.row-39 td.column-1,
.page-id-32800 #tablepress-6 tr.row-44 td.column-1,
.page-id-32800 #tablepress-6 tr.row-45 td.column-1 {
background: #0074e2;
color:#fff;
}*/
.page-id-32800 #tablepress-6 tr.row-1 td.column-1,
.page-id-32800 #tablepress-6 tr.row-7 td.column-1,
.page-id-32800 #tablepress-6 tr.row-13 td.column-1,
.page-id-32800 #tablepress-6 tr.row-19 td.column-1,
.page-id-32800 #tablepress-6 tr.row-25 td.column-1,
.page-id-32800 #tablepress-6 tr.row-31 td.column-1,
.page-id-32800 #tablepress-6 tr.row-37 td.column-1,
.page-id-32800 #tablepress-6 tr.row-43 td.column-1{
background: #004586;
color:#fff;
font-weight:bold;
}
.page-id-32800 #tablepress-6 {
font-size: 14px;
}

.page-id-32800 #tablepress-6 td.column-1,
.page-id-32800 #tablepress-6 td.column-3,
.page-id-32800 #tablepress-6 td.column-4{
text-align: center;
width: 8%;
}

.page-id-32800 #tablepress-6 td.column-2{
text-align: left;
padding-left: 10px;
}
.page-id-32800 #tablepress-6 img {
vertical-align: middle;
padding-right: 6px;
display: inline-block;
}

@media screen and (max-width: 567px){
.page-id-32800 #tablepress-6 {
font-size: 12px;
}
.page-id-32800 #tablepress-6 td.column-1,
.page-id-32800 #tablepress-6 td.column-3,
.page-id-32800 #tablepress-6 td.column-4{
text-align: center;
width: 14%;
}
.page-id-32800 #tablepress-6 td.column-2{
text-align: left;
padding: 0px 4px;
}
}

</style>

<div id="contents" class="clearfix">

	<div id="contentsleft" class="clearfix">

		<div id="contentsarea" class="clearfix">



<div id="uclclasificaciones">

<div class="clasificaciontitle">CLGS順位表</div>



<?php echo do_shortcode( '[table id=6 /]' ); ?>



			<div id="plink" class="clearfix">
				<div class="pnavi">
				<div class="pleft"><a href="#" onClick="history.back(); return false;"><i class="fa fa-angle-left"></i> 戻る</a></div>
				</div>
			</div>

</div>


		</div><!--/contentsarea-->


	</div><!--/contentsleft-->

		<div id="sp">
		<?php include (COMMONTEMPLATEPATH . '/common_sidebar.php'); ?>
		</div>

</div><!--/contents-->


<?php include (COMMONTEMPLATEPATH . '/common_footer.php'); ?>



