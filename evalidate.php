<?php
	session_start();
	require_once ('config.php');

	class validate {

		private $mMysqli;
 
		function __construct(){      
			$this->mMysqli = new mysqli(DB_HOST, 
										DB_USER, 
										DB_PASSWORD, 
										DB_DATABASE
									    );    
		}

		function __destruct(){
			$this->mMysqli->close(); 
		}

		public function validatePHP(){
			$errorsExist = 0;

		    if(!$this->checkKey($_POST['cbtKey'])){            
			  	$errorsExist = 1;      
			}

			if ($errorsExist == 0){ 
				return 'E_test.php';
			}else{
				return 'welcome.php';
			}
	
		}

		public function checkKey($value){
        	$value = $this->mMysqli->real_escape_string(trim($value));

        	$query = $this->mMysqli->query('SELECT cbtkey
			    	            FROM testingapplicant 
			    	            WHERE cbtkey = "'.$value.'"');

			$rows = $query->fetch_row();

			$result = $rows[0];

			if($result === $value){
				return '1';
			}else{
				return '0';
			}
        }

        public function checkKey2($value){
        	$value = $this->mMysqli->real_escape_string(trim($value));

        	$query = $this->mMysqli->query('SELECT email, coursecode, coursetitle, timet
			    	            FROM testingapplicant 
			    	            WHERE cbtkey = "'.$value.'"');

			$rows = $query->fetch_row();

	    	return $rows;
        }

        public function userinfo($value){
        	$query = $this->mMysqli->query('SELECT user_name, phone_no
			    	            FROM users
			    	            WHERE email = "'.$value.'"');

			$row = $query->fetch_row();

	    	return $row;
        }
	}

	$validator = new Validate();

	header('Location:' .$validator->ValidatePHP());

	$validator->ValidatePHP();

	$_SESSION['cbtKey'] = $_POST['cbtKey'];
	$_SESSION['studentName'] = $_POST['studentName'];
	$_SESSION['exam_no'] = $_POST['exam_no'];

	$row = $validator->checkKey2($_POST['cbtKey']);

	$_SESSION['email'] = $row[0];
	$_SESSION['coursecode'] = $row[1];
	$_SESSION['coursetitle'] = $row[2];
	
	$time = explode('-', $row[3]);

	$_SESSION['hour'] = $time[0];
	$_SESSION['min'] = $time[1];
	$_SESSION['sec'] = $time[2];


	$user = $validator->userinfo($row[0]);	

	$_SESSION['username'] = $user[0];
	$_SESSION['phone'] = $user[1];


?>