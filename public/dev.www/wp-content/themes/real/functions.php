<?php
foreach(glob(TEMPLATEPATH."/functions/*.php") as $file){
	require_once $file;
}