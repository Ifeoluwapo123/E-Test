<?php
	require_once('cbt_class_func.php');
	$cbt_data = new cbt();

	if(isset($_POST['delete'])){
		$table = $_POST['delete'];
		$num = sizeof($table);
		$data = array();

		for ($i=0; $i < $num; $i++) { 
			$cbt_data->deletetable($table[$i]);
		}
		echo json_encode('Successfully deleted tables');
	}

	if(isset($_POST['clear'])){
		$table = $_POST['clear'];
		$num = sizeof($table);
		$data = array();

		for ($i=0; $i < $num; $i++) { 
			$cbt_data->clearRecords($table[$i]);
		}
		echo json_encode('Successfully clear records');
	}
?>