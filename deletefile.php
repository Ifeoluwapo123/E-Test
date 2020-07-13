<?php
	require_once('cbt_class_func.php');
	$cbt = new cbt();

	$remove_ext = 'xlsx';
	array_map('unlink', glob("./*.$remove_ext"));


	foreach (glob('./*', GLOB_ONLYDIR) as $dir) {
		$cbt->removeRecursive($dir, $remove_ext);
	}


?>