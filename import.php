<?php
	require_once('cbt_class_func.php');
	include('select.php');
	include 'vendor/autoload.php';

	$connect = new PDO('mysql:host=localhost;dbname=ajax','root',"");

	$cbt = new cbt();

	if($_FILES['import_excel']['name'] != ''){

		$email = $_POST['email'];
		$cbtkey = $_POST['cbtkey'];
		$examtable = "cbt_table".$_POST['cbtkey'];
		$student_table = "student_table".$_POST['cbtkey'];
		$coursetitle = $_POST['course-title'];
		$coursecode = $_POST['course-code'];
		$timet = $hourOptions[$_POST['hours']]."-".
		        $minuteOptions[$_POST['minutes']]."-".
		        $secondOptions[$_POST['seconds']];
		$file = $_FILES['import_excel']['name'];

		$allowed_extension = array('xls','csv','xlsx');
		$file_array = explode('.',$_FILES['import_excel']['name']);
		$file_extension = end($file_array);

	    if(in_array($file_extension, $allowed_extension)){
			$file_type = \PhpOffice\PhpSpreadsheet\IOFACTORY::identify($_FILES['import_excel']['name']);

			$reader =  \PhpOffice\PhpSpreadsheet\IOFACTORY::createReader($file_type);

			$spreadsheet = $reader->load($_FILES['import_excel']['tmp_name']);

			$data = $spreadsheet->getActiveSheet()->toArray();

			$cbt->applicant($cbtkey, $email, $examtable, $student_table,
			    $coursecode, $coursetitle, $timet, $file);

	        $cbt->create_examtable($examtable);

	        $cbt->create_studenttable($student_table);

			foreach($data as $row){
				$insert_data = array(
					':question'=> $row[0],
					':option1' => $row[1],
					':option2' => $row[2],
					':option3' => $row[3],
					':option4' => $row[4],
					':answer'  => $row[5]
				);

				$query = 'INSERT INTO '.$examtable.'(question,option1,option2,option3,option4,answer) VALUES(:question,:option1,:option2, :option3, :option4, 
				    :answer)';

				$statement = $connect->prepare($query);
				$statement->execute($insert_data);
			}

			$message = '<div class="alert alert-danger">
				Data Imported Successfully
			</div>';
		}else{
			$message = '<div class="alert alert-danger">
				only .xls .csv or .xlsx file allowed
			</div>';
		}
	}else{
		$message = '<div class="alert alert-danger">
			Please select File
		</div>';
	}

	echo $message;
	if($message == '<div class="alert alert-danger">
				Data Imported Successfully
			</div>'){

		$remove_ext = 'xlsx';
	    array_map('unlink', glob("./*.$remove_ext"));

		foreach (glob('./*', GLOB_ONLYDIR) as $dir){
			$cbt->removeRecursive($dir, $remove_ext);
		}

	}
?>