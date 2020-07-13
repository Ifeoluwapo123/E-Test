<?php
  session_start();
 
	function buildOptions($options, $selectedOption){    
		foreach ($options as $value => $text){      
			if ($value == $selectedOption){
   			echo '<option value="'.$value.'" selected="selected">'. $text .'</option>';
   		}else{        
   		  echo '<option value="'.$value.'">'.$text.'</option>';      
   		}    
   	}  
  }

    $cardOptions =  array("0" => "[select]", 
    	                    "1" => "Visa", 
    	                    "2" => "Master",
                          "3" => "Verve");

    $bankOptions =  array("0" => "[select]", 
                          "1" => "Diamond", 
                          "2" => "First",
                          "3" => "Gtb",
                          "4" => "Polaris",
                          "5" => "Fcmb",
                          "6" => "Uba",
                          "7" => "Eco",
                          "8" => "Access",
                          "9" => "Keystone",
                          "10"=> "Zenith",
                          "11"=> "Union");

    $orderOptions = array("0" => "[select]",
                          "1" => "Premium", 
                          "2" => "Standard");

    $hourOptions =  array("0" => "00",
                          "1" => "01", 
                          "2" => "02",
                          "3" => "03",
                          "4" => "04");

    $minuteOptions = array("0" => "00",
                           "1" => "15", 
                           "2" => "30",
                           "3" => "45");

    $secondOptions = array("0" => "00",
                           "1" => "15", 
                           "2" => "30",
                           "3" => "45");

    if (!isset($_SESSION['values'])){
      $_SESSION['values']['cardType'] = '';    
      $_SESSION['values']['bankName'] = '';    
      $_SESSION['values']['orderType'] = ''; 
      $_SESSION['values']['txtPassword'] = '';    
      $_SESSION['values']['txtEmail'] = '';    
      $_SESSION['values']['txtName'] = '';    
      $_SESSION['values']['txtPhone'] = ''; 
      $_SESSION['values']['hours'] = '';
      $_SESSION['values']['minutes'] = '';
      $_SESSION['values']['seconds'] = '';   
    }

    if (!isset($_SESSION['errors']))  {    
      $_SESSION['errors']['txtPassword'] = 'hidden';    
      $_SESSION['errors']['txtName'] = 'hidden';          
      $_SESSION['errors']['txtEmail'] = 'hidden';    
      $_SESSION['errors']['txtPhone'] = 'hidden';       
    } 
 
  session_destroy();
?>