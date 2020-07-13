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

		    if(!$this->validateUserName($_POST['admin-name'])){            
			  	$errorsExist = 1;      
			}

			if(!$this->password($_POST['admin-name'],$_POST['password'])){            
			 	$errorsExist = 1;      
			}

			if ($errorsExist == 0){ 
				return 'myadminpage.php';
			}else{
				return 'admin.php?invalidnameorpassword';
			}
	
		}

		public function validateUserName($value){      
			$value = $this->mMysqli->real_escape_string(trim($value));
			$query = $this->mMysqli->query('SELECT email 
			    	            FROM users 
			    	            WHERE email="'.$value.'"');

			if ($this->mMysqli->affected_rows > 0)
			  return '1';
			else        
			  return '0';
		}

		public function password($value, $value1){      
			$value = $this->mMysqli->real_escape_string(trim($value));

			$value1 = $this->mMysqli->real_escape_string(trim($value1));       

			$query = $this->mMysqli->query('SELECT pass_word FROM users 
			    	                        WHERE email="'.$value.'"');   

            $rows = $query->fetch_row();

			$password = $rows[0];

			if(password_verify($value1, $password)){
				return '1';
			}else{
				return '0';
			}
		}

	}

	$validator = new Validate();

	//header('Location:' .$validator->ValidatePHP());

	$validator->ValidatePHP();

	echo $_POST['admin-name'];
	
	$validator->validateUserName($_POST['admin-name']);

	$_SESSION['admin-name'] = $_POST['admin-name'];
	$_SESSION['password'] = $_POST['password'];


?>