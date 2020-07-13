<?php
session_start();
require("fpdf/fpdf.php");
require_once('cbt_class_func.php');


  $cbtKey = $_SESSION['cbtKey'];
  $studentname = $_SESSION['studentName'];
  $exam = $_SESSION['exam_no'];
  $examtable = "cbt_table".$cbtKey;
  $stuInfo = "student_table".$cbtKey;

class PDF extends FPDF{

	function Header(){
		$this->SetFont('Courier','B',15);
	    $this->Cell(0,5,'',1,1,'C',true);
	    $this->Cell(0,5,'right click, then click "Back" to go to the previous page',0,0,'C');
	    $this->ln(10);

		$this->SetFont('Arial','',15);
		$this->Write(5,"Back to home page, click ");
		$this->SetFont('','U');
		$this->Write(5,'here',"welcome.php");
		$this->ln(10);
		
		$this->Ln(10);
	    $this->SetFont('Courier','B',15);
	    $this->Cell(0,5,'',1,1,'C',true);
	    $this->Cell(0,10,'E-TEST Exaination Result Printout',1,0,'C');
	    $this->SetFont('Helvetica','IU',12);
	    $this->Ln(20);
	    
	    $this->Cell(20,5,'Undisputed Cbt Platform...',0,'L',1);
	    $this->Ln(10);

	    $this->SetFont('Arial','BU',15);
	    $this->Cell(50,5,'Admin Profile:',0,0,'L');
	    $this->Cell(90,5,'Course Registered:',0,0,'R');
	    $this->Ln(7);
	    $this->SetFont('Times','B',12);
	    $this->Cell(30,5,'Admin Name:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(60,5,$_SESSION['username'],0,0,'L');
	    $this->SetFont('Times','B',12);
	    $this->Cell(35,5,'Course-Title:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,5,$_SESSION['coursetitle'],0,0,'L');
	    $this->Ln(5);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,5,'Password:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(60,5,'********',0,0,'L');
	    $this->SetFont('Times','B',12);
	    $this->Cell(35,5,'Course-code:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,5,$_SESSION['coursecode'],0,0,'L');
	    $this->Ln(5);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,5,'Email:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(60,5,$_SESSION['email'],0,0,'L');
	    $this->SetFont('Times','B',12);
	    $this->Cell(35,5,'No of Question:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,5,$_SESSION['number'].' Questions',0,0,'L');
	    $this->Ln(5);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,5,'Phone No:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(60,5,$_SESSION['phone'],0,0,'L');
	    $this->SetFont('Times','B',12);
	    $this->Cell(35,5,'Time:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,5,$_SESSION['hour'].'hr(s) '.$_SESSION['min'].' mins '.$_SESSION['sec'].' secs',0,0,'L');
	    $this->Ln(30);

	    $this->Cell(0,5,'Your Profile',0,0,'L');

	    $this->Ln(10);
    }

	function fetchdata($cbt, $val, $val1){
		return $cbt->fetchScore($val,$val1);
	}

	function BasicTable($value1, $value2, $value3){

		$this->line(0,10,90,0);
		$this->line(0,10,90,0);

		$this->line(0,120,210,120);


	    $this->SetFont('Arial','BU',15);
	    $this->Cell(30,7,'My Profile:',0,0,'L');
	    $this->Ln(7);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,10,'Student Name:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,10,$_SESSION['studentName'],0,0,'L');
	    $this->Ln(10);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,10,'Course Title:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,10,$_SESSION['coursetitle'],0,0,'L');
	    $this->Ln(10);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,10,'Course Code:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,10,$_SESSION['coursecode'],0,0,'L');
	    $this->Ln(10);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,10,'Time:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,10,$_SESSION['hour'].'hr(s) '.$_SESSION['min'].
	    	' mins '.$_SESSION['sec'].' secs',0,0,'L');
	    $this->Ln(10);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,10,'Score:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,10,$value1,0,0,'L');
	    $this->Ln(10);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,10,'Percentage:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,10,$value2,0,0,'L');
	    $this->Ln(10);

	    $this->SetFont('Times','B',12);
	    $this->Cell(30,10,'Rank:',0,0,'L');
	    $this->SetFont('Times','I',12);
	    $this->Cell(0,10,$value3,0,0,'L');
	    $this->Ln(10);
	    
	    $this->Ln(15);
	    $this->SetFont('Times','I',12);
	    $this->Cell(40,10,'Congratulations ',0,0);
	    $this->SetFont('Times','IB',12);
	    $this->Cell(0,10,'Right-Click to Save Pdf.....',0,1);
	}

	function Footer(){
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',10);
	    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	    $this->Ln(10);

	    $this->Cell(0,5,'',1,1,'C',true);
    }

}

$pdf = new PDF('p','mm','A4');

$data = $pdf->fetchdata(new cbt(), $stuInfo, $exam);

if($data[0]==null){
	$score = "Loading.....";
	$s_total = "Loading.....";
	$rank = "Loading.....";
	$result = "Loading.....";
}else{
	$set = explode('/',$data[0]);
	$score = $set[0];
	$total = $set[1];
	$s_total = $score." out of ".$total;

	$rank = $score/$total * 100;
	$rank = round($rank,1);
	$rank = $rank.'%';

	if($rank >= 70){
		$result = "Excellent";
	}elseif($rank>=65 && $rank < 70){
		$result = "Very Good";
	}elseif($rank>=60 && $rank < 65){
		$result = "Good";
	}elseif($rank>=50 && $rank < 60){
		$result = "Credit";
	}elseif($rank>=40 && $rank < 50){
		$result = "Below Average";
	}elseif($rank<40){
		$result = "Poor";
	}
}

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($s_total, $rank, $result);
$pdf->Output();
/*$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,'',1,0,'C',true);
$pdf->output();*/

?>