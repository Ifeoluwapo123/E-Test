<?php
	require_once ('select.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up E-test</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="validate.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="validate.js"></script>
	<script type="text/javascript" src="xhr.js"></script> 
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form"  name="frmRegistration"method="post" action="validate.php">
					<input type="hidden" name="validationType" value="php"/>
					<span class="login100-form-title p-b-33">
						Signup
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" id="txtName" name="txtName" type="text" onblur="validate(this.value, this.id)" value="<?php echo $_SESSION['values']['txtName']?>" placeholder="Name">
						<span id="txtNameFailed" class="<?php echo $_SESSION['errors']['txtName'] ?>"> Invalid name.</span> 
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" id="txtEmail" name="txtEmail" type="text" onblur="validate(this.value, this.id)" value="<?php echo $_SESSION['values']['txtEmail']?>" placeholder="Email">
						<span id="txtEmailFailed" class="<?php echo $_SESSION['errors']['txtEmail'] ?>"> Invalid e-mail address or already used.</span> 
						<span class="focus-input100-2"></span>
						<input class="input100" id="txtPhone" name="txtPhone" type="text" onblur="validate(this.value, this.id)" value="<?php echo $_SESSION['values']['txtPhone']?>" placeholder="Phone">
						<span id="txtPhoneFailed" class="<?php echo $_SESSION['errors']['txtPhone'] ?>"> Invalid phone number or already used.</span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" id="txtPassword" name="txtPassword" type="password" onblur="validate(this.value, this.id)" value="<?php echo $_SESSION['values']['txtPassword']?>" placeholder="Password">
						<span id="txtPasswordFailed" class="<?php echo $_SESSION['errors']['txtPassword'] ?>"> Invalid password.</span> 
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Sign up
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Password?
						</a>
					</div>

					<div class="text-center">
						<a href="index1.php" class="txt2 hov1">
							Sign in
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
</body>
</html>