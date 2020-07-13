<?php
	session_start();
    header('Content-Type: text/xml');
	
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
	echo "<response>";
		require_once('cbt_class_func.php');
		$cbt_data = new cbt();
	
		$count = $_GET['count'];

		$count = explode('@', $count);

	    $data = $cbt_data->uploadQuestion(intval($count[0]),$count[1]);

	    //$result = explode("@", $data);

	    echo json_encode($data);

	echo "</response>";	
?>