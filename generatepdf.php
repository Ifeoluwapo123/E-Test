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
		
		$this->SetFont('Arial','',20);
		$this->Write(5,"To find out what's new in this tutorial, click ");
		$this->SetFont('','U');
		$this->Write(5,'here',"welcome.php");
		$this->Ln(10);
	    $this->SetFont('Courier','B',15);
	    $this->Cell(0,5,'',1,1,'C',true);
	    $this->Cell(0,10,'E-TEST Exaination Raw-Scores',1,0,'C');
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

	    $this->Cell(0,5,'Here is the list of all the students that wrote the exam and their scores respectively,',0,0,'L');

	    $this->Ln(10);

	    //$this->SetFont('Times','Admin ',12);

   }
   // Load data
	function LoadData($file){
	    // Read file lines
	    $lines = file($file);
	    $data = array();
	    foreach($lines as $line)
	        $data[] = explode(';',trim($line));
	    return $data;
	}

	function fetchdata($cbt, $value){
		$res = $cbt->fetchAllStudentRecord($value);
		$data = array();

		foreach ($res as $key => $value){
			$get = array(0=>$value['student_name'],
						 1=>$value['exam_no'],
						 2=>$value['score']
						);
			$data[] = $get;
		}
		return $data;
	}

	// Simple table
	function BasicTable($header, $data){
	    // Header
	    $this->line(0,10,90,0);
		$this->line(0,10,90,0);
	    $this->SetX(14);
	    $this->Cell(10,12,'S/N',1,0,'C');
	    foreach($header as $col){
	        $this->Cell(58,12,$col,1);
	    }
	    $this->Ln();
	    // Data
	    $this->SetX(14);
	    $count = 1;
	    foreach($data as $row)
	    {
	    	$this->SetFont('Times','',12);
	    	$this->Cell(10,10,$count,1,0,'C');
	        foreach($row as $col)
	            $this->Cell(58,10,$col,1);
	        $this->Ln();
	        $this->SetX(14);
	        $count++;
	    }

	    $this->Ln(15);
	    $this->SetFont('Times','IB',12);
	    $this->Cell(10,10,'Right-Click to Save Pdf.....',0,1);
	}

	// Better table
	function ImprovedTable($header, $data){
	    // Column widths
	    $w = array(40, 35, 40, 45);
	    // Header
	    for($i=0;$i<count($header);$i++)
	        $this->Cell($w[$i],7,$header[$i],1,0,'C');
	    $this->Ln();
	    // Data
	    foreach($data as $row)
	    {
	        $this->Cell($w[0],6,$row[0],'LR');
	        $this->Cell($w[1],6,$row[1],'LR');
	        $this->Cell($w[2],6,($row[2]),'LR',0,'R');
	        $this->Cell($w[3],6,($row[3]),'LR',0,'R');
	        $this->Ln();
	    }
	    // Closing line
	    $this->Cell(array_sum($w),0,'','T');
	}

	// Colored table
	function FancyTable($header, $data){
	    // Colors, line width and bold font
	    $this->SetX('20');
	    $this->SetFillColor(255,0,0);
	    $this->SetTextColor(255);
	    $this->SetDrawColor(128,0,0);
	    $this->SetLineWidth(.2);
	    $this->SetFont('','B');
	    // Header
	    $w = array(40, 35, 40, 45);
	    for($i=0;$i<count($header);$i++)

	        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	    $this->Ln();
	    // Color and font restoration
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
	    $this->SetFont('');
	    // Data
	    $fill = false;
	    foreach($data as $row)
	    {
	        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
	        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
	        $this->Cell($w[2],6,($row[2]),'LR',0,'R',$fill);
	        $this->Cell($w[3],6,($row[3]),'LR',0,'R',$fill);
	        $this->Ln();
	        $fill = !$fill;
	    }
	    // Closing line
	    $this->Cell(array_sum($w),0,'','T');
	}

	function Footer(){
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',10);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	    $this->Ln(10);


	    $this->Cell(0,5,'',1,1,'C',true);
    }

}

$pdf = new PDF('p','mm','A4');
// Column headings
$header = array('NAMES', 'EXAM NUMBER', 'SCORES');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$data = $pdf->fetchdata(new cbt(),$stuInfo);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
/*$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,'',1,0,'C',true);
$pdf->output();*/
?>

