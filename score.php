<?php
	require_once('cbt_class_func.php');

	$cbt_data = new cbt();

    if(isset($_POST['res'])){
		$res = $_POST['res'];

		$exam = $_POST['exam'];

		$exam_no = $_POST['name'];

		$size = $cbt_data->numOfQuestions($exam);

		$scores = 0;

		for ($i=1; $i < $size+1 ; $i++) { 
			if(intval($res[$i]) === 0 || $res === ""){
				$scores = $scores + 0; 
			}else{
				$result[$i] = explode("," , $res[$i]);

				$data = $cbt_data->getResult(intval($result[$i][1]),$result[$i][0],$exam);
				
				if(strtoupper(trim($data[0])) == strtoupper(trim($data[1]))){
					$scores = $scores + 1;
				}else{
					$scores = $scores + 0;
				}
			}
		}

		//echo json_encode("Your total score out of ".$size." questions is ".$scores)."<br/>";
		echo(strtoupper($data[0])."".strtoupper($data[1]))."<br/>";
		echo $scores."<br/>";;
		
		$student_table = $cbt_data->fetch($exam);

		echo $student_table."<br/>";
		echo $scores."<br/>";
		echo $exam_no."<br/>";

		$cbt_data->updateScore($student_table,strval($scores)."/".$size,$exam_no);

	    exit(1);
	}
?>