<?php
// リクエストされているポストタイプの取得
$req_post_type = preg_replace('#/([^?/]*).*#', '\1', $_SERVER['REQUEST_URI']);
//print_r($req_post_type);
include ("archive-${req_post_type}.php");

?>