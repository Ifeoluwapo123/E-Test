<?php
	function my_error_handler($e_type, $e_message, $e_file, $e_line){ 

      switch ($e_type) {    
        case E_ERROR:   
            echo "<br/>";     
            echo "<p>Connection error</p>";
            echo "<a href='index1.php'><em>Back</em></a>";   
            die();        
            break;                       
        case E_WARNING:
            echo "<br/>";        
            echo "<h1> Warning </h1>";
            echo "<p>Check your network connections</p>";
            echo "<a href='index1.php'><em>Back</em></a>";        
            break;                       
        case E_NOTICE: 
            //don’t show notice error              
            break;   
        default:
            echo "<br/>";
            echo "<h1> Fatal Error</h1>";
            echo "<p>Check your network connections</p>";
            echo "<a href='index1.php'><em>Back</em></a>";
            break;
        } 

    }

    set_error_handler('my_error_handler');
    
	require_once ('config.php');

	class cbt{

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
 
 		public function uploadQuestion($id = 1, $value){
 			$query = $this->mMysqli->query('SELECT question, option1, option2, option3, option4, answer, exam_id FROM '.$value.' WHERE exam_id = '.$id);

			$row = $query->fetch_row();

			if($row == null){
				$arr = array(0=>"The kinetic and static friction between two surfaces in contact depends  
				                   on all except",
							 1=>"The nature of area of surfaces in contact",
							 2=>"The normal force and weight acting on the bodies",
							 3=>" The surface area pf surfaces in contact",
							 4=>"The speed of the surfaces against each other",
							 5=>"answer",
							 6=>"DEMO",
							 7=>0
						);
			}else{

				$arr = array(0=>$row[0],
						 1=>$row[1],
						 2=>$row[2],
						 3=>$row[3],
						 4=>$row[4],
						 5=>$row[5],
						 6=>$row[6],
						 7=>$this->numOfQuestions($value)
						);
			}
			return $arr;
 		}

 		public function numOfQuestions($value){
 			$result = $this->mMysqli->query('SELECT * FROM '.$value);

 			if($result==null){
 				return 0;
 			}else{
				return $result->num_rows;
			}
 		}

 		public function getResult($id, $opt, $value){
 			$query = $this->mMysqli->query('SELECT option'.$opt.', answer FROM '.$value.' WHERE exam_id = '.$id);
 			
 			$row = $query->fetch_row();

			$arr = array(0=>$row[0],
						 1=>$row[1]);

			return $arr;
 		}

 		public function regisValidate($value1, $value2, $value3, $value4){
            $query = $this->mMysqli->query("INSERT INTO 
                users (user_name,pass_word,email,phone_no) 
                VALUES ('$value1','$value2','$value3','$value4')");
        }

        public function checkEmail($value){
        	$value = $this->mMysqli->real_escape_string(trim($value));
			$query = $this->mMysqli->query('SELECT email 
			    	            FROM users 
			    	            WHERE email="'.$value.'"');

			if ($this->mMysqli->affected_rows > 0)
			  return '0';
			else        
			  return '1';
        }

        public function user($value){
        	$value = $this->mMysqli->real_escape_string(trim($value));
			$query = $this->mMysqli->query('SELECT user_name 
			    	            FROM users 
			    	            WHERE email="'.$value.'"');

			$rows = $query->fetch_row();

			$user = $rows[0];

			return $user;
        }

        public function checkEmail2($value){
        	$value = $this->mMysqli->real_escape_string(trim($value));
			$query = $this->mMysqli->query('SELECT email 
			    	            FROM users 
			    	            WHERE email="'.$value.'"');

			if ($this->mMysqli->affected_rows > 0)
			  return '1';
			else        
			  return '0';
        }


        public function checkNum($value){
        	$value= $this->mMysqli->real_escape_string(trim($value));
        	$query = $this->mMysqli->query('SELECT phone_no 
			    	            FROM users 
			    	            WHERE phone_no="'.$value.'"');
			
			if ($this->mMysqli->affected_rows > 0)
			  return '0';
			else        
			  return '1';
        }

        public function checkPassword($value1, $value2){
        	$value= $this->mMysqli->real_escape_string(trim($value1));
        	
        	$query = $this->mMysqli->query('SELECT pass_word 
			    	            FROM users 
			    	            WHERE email = "'.$value2.'"');

			$rows = $query->fetch_row();

			$password = $rows[0];

			if(password_verify($value, $password)){
				return '1';
			}else{
				return '0';
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
				return $result;
			}else{
				return " ";
			}
        }

        public function applicant($value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8){
            $query = $this->mMysqli->query("INSERT INTO 
	    		testingapplicant (cbtkey,email,examtable,student_table,
	            coursecode,coursetitle,timet,filename) 
	            VALUES 
	            ('$value1','$value2','$value3','$value4','$value5', 
	            '$value6', '$value7','$value8')");
        }

        public function create_examtable($value){
        	$query = $this->mMysqli->query("CREATE TABLE IF NOT EXISTS ".$value."(exam_id  INTEGER  NOT NULL AUTO_INCREMENT, question TEXT NOT NULL, option1 TEXT NOT NULL, option2 TEXT NOT NULL, option3 TEXT NOT NULL, option4 TEXT NOT NULL, answer TEXT NOT NULL, PRIMARY KEY (exam_id)) ENGINE=MyISAM");
        }

        public function genExamInfo($value){
        	$value = $this->mMysqli->real_escape_string(trim($value));

        	$query = $this->mMysqli->query('SELECT coursecode, coursetitle, timet
			    	            FROM testingapplicant 
			    	            WHERE cbtkey = "'.$value.'"');

        	$rows = $query->fetch_row();

        	$array = array('coursecode'=> $rows[0], 'coursetitle' => $rows[1], 'time'=> $rows[2]);

        	return $array;

        }

        public function generatekey(){
        	$query = $this->mMysqli->query('SELECT cbtkey
			    	            FROM testingapplicant');

        	$rows = $query->fetch_all(MYSQLI_ASSOC);

        	return $rows;
        }

	    public function studentInfo($value){
	   
	    	$query = $this->mMysqli->query("SELECT * FROM $value");
	    	$rows = $query->fetch_all(MYSQLI_ASSOC);

	    	return $rows;

        }

        public function fetchAllStudentRecord($value){
	   
	    	$query = $this->mMysqli->query("SELECT * FROM $value");
	    	$rows = $query->fetch_all(MYSQLI_ASSOC);

	    	return $rows;

        }

         public function fetchScore($value,$value2){
        	$query = $this->mMysqli->query("SELECT score FROM ".$value." WHERE exam_no = '$value2'");

        	$rows = $query->fetch_row();

        	return $rows;
        }

        public function studentInfo2($value, $value1, $value2){
	   
			$query = $this->mMysqli->query("INSERT INTO ".$value." (student_name, exam_no, score) VALUES ('$value1','$value2','')");
        }

        public function fetchname($value, $value2){
	   
		    $query = $this->mMysqli->query("SELECT student_name FROM ".$value." WHERE exam_no = '$value2'");
		    $rows = $query->fetch_row();

        	return $rows[0];

        }

        public function fetch($value){
        	$query = $this->mMysqli->query('SELECT student_table
			    	            FROM testingapplicant 
			    	            WHERE examtable = "'.$value.'"');

        	$rows = $query->fetch_row();

        	return $rows[0];
        }

        public function examAlltable($value){
        	$query = $this->mMysqli->query('SELECT examtable
			    	            FROM testingapplicant 
			    	            WHERE email = "'.$value.'"');

        	$rows = $query->fetch_all(MYSQLI_ASSOC);

	    	return $rows;
        }

        public function noexamtable($value){
        	$result = $this->mMysqli->query('SELECT examtable
			    	            FROM testingapplicant 
			    	            WHERE email = "'.$value.'"');

        	return $result->num_rows;
        }

        public function deletetable($value){
        	$result = $this->mMysqli->query('DROP TABLE '.$value);
        }

        public function clearRecords($value){
        	$result = $this->mMysqli->query('DELETE FROM testingapplicant  WHERE examtable ="'.$value.'"');
        }

        public function updateScore($value,$value1,$value2){
        	$this->mMysqli->query("UPDATE ".$value." SET score = '$value1' WHERE exam_no ='$value2'");

        	//$this->mMysqli->query("UPDATE ".$value." SET student_name = ".$value1. "WHERE examtable = ".$value2);
        }


	}

?>