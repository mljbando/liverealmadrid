<?php
add_filter( 'post_thumbnail_html', 'width_plus', 100 );
function width_plus($contents){
	$WIDTH=200;
	if(strrpos($contents,'width')===FALSE){
		preg_match('{(<img.*)(/>)}',$contents,$matches);
		$contents = $matches[1].'width="'.$WIDTH.'" '.$matches[2];
	}
	return $contents;
}