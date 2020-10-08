<?php
/*
 * functionsフォルダにあるファイルをすべて読み込む
 */
foreach(glob(dirname(__FILE__)."/functions/*.php") as $file){
	require_once $file;
}