<?php
	if(isset($_POST['q_id'])){
		$question_id = $_POST['q_id'];
		$question_id = explode("@", $question_id);
		$data = $cbt_data->uploadQuestion($question_id[0],$question_id[1]);
		//$result = explode("@", $data);

	    echo json_encode($data);
	    exit(1);
	}


?>