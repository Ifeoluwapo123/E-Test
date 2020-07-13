<?php
  session_start();
  require_once('cbt_class_func.php');
  $cbt_data = new cbt();
  require('fetch.php');

  $cbtKey = $_SESSION['cbtKey'];
  $studentname = $_SESSION['studentName'];
  $exam_no = $_SESSION['exam_no'];

  $check = $cbt_data->checkKey($cbtKey);

  $examtable = "cbt_table".$check;

  $number = $cbt_data->numOfQuestions($examtable);

  $_SESSION['number'] = $number;

  $examInfo = $cbt_data->genExamInfo($check);

  $stuInfo = "student_table".$check;
  
  $insertInfo = $cbt_data->studentInfo($stuInfo);
  
  $same = 0;
  $r = $insertInfo;
  if(empty($exam_no)){
    header('Refresh: 0; URL=welcome.php?empty');
  }
  foreach ($r as $value) {
    if($exam_no == $value['exam_no']){
      $same =+ 1;
    }
  }
  if($same==0){
    $cbt_data->studentInfo2($stuInfo, $studentname, $exam_no);
  }elseif($same==1){
    $checkname = $cbt_data->fetchname($stuInfo, $exam_no);
    if($checkname !== $studentname){
      header('Refresh: 0; URL=welcome.php?duplicate='.base64_encode($checkname));
    }else{
      # do nothing;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Start Test</title>
  <META HTTP-EQUIV='Pragma' CONTENT="no-cache">
  <META HTTP-EQUIV='Expires' CONTENT="-1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="E-test.css">
  <script src="js/jquery.min.js"></script>
</head>
<body onload="process()">
  <script src="E-test.js" type="text/javascript"></script>
  <script type="text/javascript" src="datajs.js"></script>
  <p class="exam" id="examination"><?php echo $examtable ?></p>
  <p class="exam" id="number"><?php echo $number ?></p>
  <p id="name"><?php echo $studentname ?></p>
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
        <li><a href="printresult.php">Print Result</a></li> 
        <li><a href="">Reload</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span>Admin Sign In</a></li>
        <li><a href="welcome.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<article>
	<h2>E-test software</h2>
  <p>Undisputable cbt platform...</p>
  <p class="name" ><strong>Welcome: </strong><span id=""><?php echo $studentname ?></span></p>
  <p class="name" ><strong>Exam Number: </strong><span id="my-name"><?php echo $exam_no ?></span></p>
  <a><button type="button" id="clicked"> Refresh Page before starting Exam </button></a>
</article>
<section class="qa">
  <h3>Course Title: <span><?php echo $examInfo['coursetitle'] ?></span></h3>
  <h3>Course Code: <span><?php echo $examInfo['coursecode'] ?></span></h3>
  <hr>
  <a><button type="button" id="clickme" onclick="process2()"> Start Examination</button></a>
  <div>
    <p class="glyphicon glyphicon-time">Time: <span id="time"><?php echo $examInfo['time'] ?></span></p>
  </div>
  <div class="all">
    <div id="question" class= "container">
      <label class="control-label" for="question">Question:</label>
      <p id="questions">Demo: The kinetic and static friction between two surfaces in contact depends on all except  <span> ?</span></p>
    </div>
    <div class="container" id="answer">
      <label class="control-label" for="question">Options:</label>
      <form id="myForm">
        <p id="option1"><input type="radio" name="opt"> The nature of area of surfaces in contact </p>
        <p id="option2"><input type="radio" name="opt"> The normal force and weight acting on the bodies </p>
        <p id="option3"><input type="radio" name="opt"> The surface area pf surfaces in contact </p>
        <p id="option4"><input type="radio" name="opt"> The speed of the surfaces against each other </p>
      </form>
    </div>
    <div class="container">
      <button class="next" id="next" onclick="next()">Next</button>
      <button class="prev" id="prev" onclick="prev()">Prev</button>
    </div>
    <div id="sub">
      <a><input type="button" value="Submit" class="submit" id="submit"></a>
    </div>
  </div>
</section>
<button id="show1" class="glyphicon glyphicon-info-sign"></button>
<button id="show" class="glyphicon glyphicon-remove"></button>
<footer id="foot">
  <div class="container-fluid">
    <div class="table">
      <table>
      <?php
        $z = $cbt_data->numOfQuestions($examtable);

        if($z < 16 || $z == 16){
            ?><tr><?php
            for($i=1; $i < $z+1; $i++){ ?>
              <td><button type="button" class="buttons" id="<?php echo $i ?>"><?php echo $i ?></button></td>
            <?php 
            }
        }

        elseif($z > 16 && $z < 32 || $z == 32) {
            ?><tr><?php
            for($i=1; $i < 17; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php 
            }
            ?></tr><tr><?php

            for($i=17; $i < $z+1; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

        }

        elseif($z > 32 && $z < 48 || $z == 48) {
            ?><tr><?php
            for($i=1; $i < 17; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php 
            }
            ?></tr><tr><?php

            for($i=17; $i < 33; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

            for($i=33; $i < $z+1; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

        }

        elseif($z > 48 && $z < 64 || $z == 64) {
            ?><tr><?php
            for($i=1; $i < 17; $i++){ ?>
             <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php 
            }
            ?></tr><tr><?php


            for($i=17; $i < 33; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

            for($i=33; $i < 49; $i++){ ?>
             <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php


            for($i=49; $i < $z+1; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

        }

        elseif($z > 64 && $z < 80 || $z == 80) {
            ?><tr><?php
            for($i=1; $i < 17; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php 
            }
            ?></tr><tr><?php


            for($i=17; $i < 33; $i++){ ?>
             <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

            for($i=33; $i < 49; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php


            for($i=49; $i < 65; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

            for($i=65; $i < $z+1; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

        }

        elseif($z > 80 && $z < 96 || $z == 96) {
            ?><tr><?php
            for($i=1; $i < 17; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php 
            }
            ?></tr><tr><?php


            for($i=17; $i < 33; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

            for($i=33; $i < 49; $i++){ ?>
             <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

            for($i=49; $i < 65; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

            for($i=65; $i < 81; $i++){ ?>
             <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

            for($i=81; $i < $z+1; $i++){ ?>
              <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
            <?php }
            ?></tr><tr><?php

        }

        elseif($z > 96 && $z < 100 || $z == 100) {
          ?><tr><?php
          for($i=1; $i < 17; $i++){ ?>
            <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
        <?php 
          }
          ?></tr><tr><?php

          for($i=17; $i < 33; $i++){ ?>
            <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php }
          ?></tr><tr><?php

          for($i=33; $i < 49; $i++){ ?>
           <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php }
          ?></tr><tr><?php


          for($i=49; $i < 65; $i++){ ?>
            <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php }
          ?></tr><tr><?php

          for($i=65; $i < 81; $i++){ ?>
            <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php }
          ?></tr><tr><?php

          for($i=81; $i < 97; $i++){ ?>
           <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php }
          ?></tr><tr><?php

          for($i=97; $i < $z+1; $i++){ ?>
            <td><button type="button" id="<?php echo $i ?>" class="buttons"><?php echo $i ?></button></td>
          <?php }
          ?></tr><?php
        }
      ?>
      </table>
    </div>
  </div>
</footer>
</body>
</html>