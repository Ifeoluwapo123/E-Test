<?php

include 'vendor/autoload.php';

if($_FILES['upload_excel']['name']!=""){
	
	
	$target_dir = 'C:/wamp64/www/E-Test/phpspreadsheet/';

	$file = $_FILES['upload_excel']['name'];

	$path = pathinfo($file);

	$filename = $path['filename'];
	$ext = $path['extension'];

	$temp_name = $_FILES['upload_excel']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext;

	if(file_exists($path_filename_ext)){
		$message =  '<div class="alert alert-danger">
			            File already exists
	                </div>';
	}else{
		$move = move_uploaded_file($temp_name, $path_filename_ext);
		if($move){
			$message = '<div class="alert alert-danger">
			                File Successfully uploaded
	                    </div>';
		}else{
			$message = '<div class="alert alert-danger">
		    	            error moving file
	                    </div>';
		}
	}
}else{
	$message = '<div class="alert alert-danger">
		            Please select File
	            </div>';
}

echo $message;
?>	