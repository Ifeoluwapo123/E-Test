<?php
	session_start();
	require_once('cbt_class_func.php');
    $cbt_data = new cbt();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
    <META HTTP-EQUIV='Pragma' CONTENT="no-cache">
    <META HTTP-EQUIV='Expires' CONTENT="-1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="E-test.css">
  <script src="js/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="">E-Test -A Computer-Based Examination Software</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	      	<li class="active"><a href="">Home</a></li>
	      	<li class="active"><a href="generatepdf.php">Raw Scores</a></li>
	        <li><a href="myadminpage.php">Reload</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Admin Sign In</a></li>
	        <li><a href="welcome.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<article>
	  <h2>E-test software</h2>
	  <p>Undisputable cbt platform...</p>
	  </span></p>
	   <a><p onclick="refresh()"> Refresh Page </p></a>
	</article>
	<section class="qa" style="padding-left: 10px; height: 400px">
		<h4><em>The Delete button should only be initiated only if exams has been done,and results/Raw scores has been printed</em></h4>
		<h4><em>Once the Clear Records button is clicked, No excess to the cbtkey again</em></h4>
		<br/>
		<div style="display: inline;">
		    <input type="button" name="delete" id="delete" value="Delete All Your Examtables"></input>
		    <input type="button" name="clear" id="clear" value="Clear Records"></input>
		</div>
		 <hr>
		<?php
			$x = 0;
			$var = $cbt_data->examAlltable($_SESSION['email']);
			foreach ($var as $key => $value) {
				?><p id = "<?php echo $x ?>"><?php
					echo $value['examtable'];
				?><p/><?php
				$x++;
			}
		?>
		<p style="color: green; font-family: cursive;
		font-size: 20px"><em>
			The <?php echo $cbt_data->noexamtable($_SESSION['email'])?> 
			Examination Table(s) will be deleted and data cleared forever
		</em></p>
		<p id="num" style="display: none"><?php echo $cbt_data->noexamtable($_SESSION['email'])?></p>
	</section>
</body>
<script type="text/javascript">

	function refresh(){
		window.location.reload(false);
	}

	data = [];
	num = document.getElementById('num').textContent;
	num = parseInt(num);

	for(var i=0; i<num; i++){
		get = document.getElementById(''+i).textContent;
		data[i] = get;
	}
	//alert(data);

    $('#clear').on('click',function(){
	    $.ajax({
			type: 'POST',
			url: 'deletetables.php', 
			data:$.param({'clear':  data}),

			success: function(data){
				alert(data);
			},

			error: function(){
				alert('error');
			}
	    });
		
	});

	$('#delete').on('click',function(){
	    $.ajax({
			type: 'POST',
			url: 'deletetables.php', 
			data:$.param({'delete':  data}),

			success: function(data){
				alert(data);
			},

			error: function(){
				alert('error');
			}
	    });
		
	});
</script>
</html>