<?php
require_once "../config.php";
require('fpdf.php');
$max=$_REQUEST['max'];
$id=1;

$pdf = new FPDF('P', 'mm', 'A4');

while($id<=$max){
	$sql=sprintf("SELECT * from facultyInfo where faculty_id='%d'",$id);
	$retval=mysql_query($sql);
	$row=mysql_fetch_array($retval,MYSQL_ASSOC);
	$image1 = "img/logo.png";
	$pdf->AddPage();
	$pdf->SetFont('Arial','',20);
	$pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 105), 0, 0, 'L',false);
	$pdf->Ln();

	//Title
	$pdf->Multicell(0, 10, $row['faculty_name'] . " | Job Assignment","C");
	
	
	//Examiner Responsibilities
	$pdf->SetFont('Arial','',15);
	$pdf->Multicell(0, 10, "Examiner Responsibilities","C");

	$pdf->SetFont('Arial','',12);
	$q1=sprintf("SELECT subject_code FROM facultyAssignment WHERE examiner='%d'",$id);
	$r1=mysql_query($q1);
	if(mysql_num_rows($r1)==0)
		$pdf->Multicell(0,10,"No Responsibility to Display.","C");
	while($row1=mysql_fetch_array($r1,MYSQL_ASSOC)){
		$pdf->Multicell(40,10,$row1['subject_code']);
	}
	$pdf->Ln();
	
	
	//Moderator Responsibilities
	$pdf->SetFont('Arial','',15);
	$pdf->Multicell(0, 10, "Moderator Responsibilities","C");

	$pdf->SetFont('Arial','',12);
	$q1=sprintf("SELECT subject_code FROM facultyAssignment WHERE moderator='%d'",$id);
	$r1=mysql_query($q1);
	if(mysql_num_rows($r1)==0)
		$pdf->Multicell(0,10,"No Responsibility to Display.","C");
	while($row1=mysql_fetch_array($r1,MYSQL_ASSOC)){
		$pdf->Multicell(40,10,$row1['subject_code']);
	}
	$pdf->Ln();

	//Review-Examiner Responsibilities
	$pdf->SetFont('Arial','',15);
	$pdf->Multicell(0, 10, "Review-Examiner Responsibilities","C");

	$pdf->SetFont('Arial','',12);
	$q1=sprintf("SELECT subject_code FROM facultyAssignment WHERE review_examiner='%d'",$id);
	$r1=mysql_query($q1);
	if(mysql_num_rows($r1)==0)
		$pdf->Multicell(0,10,"No Responsibility to Display.","C");
	while($row1=mysql_fetch_array($r1,MYSQL_ASSOC)){
		$pdf->Multicell(40,10,$row1['subject_code']);
	}
	$pdf->Ln();		
	$id=$id+1;	
}
$pdf->Output();




?>