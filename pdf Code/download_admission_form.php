<?php 
$con=mysql_connect("localhost", "root","");
$db=mysql_select_db("database1", $con);
if (isset($_POST['submit']))
{
$etea_id=$_POST['etea_id'];

$run=mysql_query("SELECT personal_info.s_firstname ,personal_info.s_lastname,personal_info.s_fathername ,personal_info.pic_name , academic_info.i_omarks,academic_info.s_omarks ,marks_adjusment.improvement,choices.choice1,choices.choice2,choices.choice3,choices.choice4 ,marks_adjusment.attempt,marks_adjusment.adj_marks,marks_adjusment.Ad_maths_no,marks_adjusment.biology_no,marks_adjusment.additional_maths,admit_card.roll_no,personal_info.user_name
FROM personal_info,academic_info,choices,marks_adjusment,admit_card 
WHERE personal_info.user_name=admit_card.user_name
 AND academic_info.user_name=admit_card.user_name
 AND choices.roll_no='$etea_id'
 AND marks_adjusment.roll_no='$etea_id'
 AND admit_card.roll_no='$etea_id'");
if($run)
{
$row = mysql_fetch_array ($run);

 $iob_marks=$row['i_omarks'];
 $sob_marks=$row['s_omarks']; 
 $firstname=$row['s_firstname'];
 $lastname=$row['s_lastname'];
 $fname=$row['s_fathername'];
 $ch1=$row['choice1'];
 $ch2=$row['choice2'];
 $ch3=$row['choice3'];
 $ch4=$row['choice4'];
 $imp=$row['improvement'];
 $att=$row['attempt'];
 $math=$row['Ad_maths_no'];
 $bio=$row['biology_no'];
 $picname=$row['pic_name'];
 $adj=$row['adj_marks'];
 $addmath=$row['additional_maths'];
 if($att=="1"){
 $att="Yes";}
 else{
 $att="No";}
 
 if($imp=="1"){
 $imp="Yes";}
 else{
 $imp="No";}

 if($addmath=="1"){
 $addmath="Yes";}
 else{
 $addmath="No";}


$image="images/".$picname;

require("fpdf/fpdf.php");

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
 		   
    $this->Cell(30,10,'ADMISSION FORM ',0,0,'C');
    
	// Line break
    $this->Ln(20);
}

}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(50,10,'',0,1);



$pdf->Cell(50,30,$pdf->Image($image,$pdf->GetX(), $pdf->GetY(), 50),0, 1,'R');
$pdf->Cell(50,10,'',0,1);
$pdf->Cell(50,10,'',0,1);
$pdf->Cell(50,10,'',0,1);
$pdf->Cell(50,10,'',0,1);


$pdf->Cell(50,10,'Student Name',0,0);
$pdf->Cell(50,10,$firstname ."   ". $lastname,0,1);

$pdf->Cell(50,10,'Father Name',0,0);
$pdf->Cell(50,10,$fname,0,1);

$pdf->Cell(50,10,'Roll Number',0,0);
$pdf->Cell(50,10,$etea_id,0,1);

$pdf->Cell(50,10,'',0,1);


$pdf->Cell(50,10,'Choice NO',1,0,'C',0);
$pdf->Cell(50,10,'Category',1,1,'C',0);

$pdf->Cell(50,10,'1',1,0,'C',0);
$pdf->Cell(50,10,$ch1,1,1,'C',0);

$pdf->Cell(50,10,'2',1,0,'C',0);
$pdf->Cell(50,10,$ch2,1,1,'C',0);

$pdf->Cell(50,10,'3',1,0,'C',0);
$pdf->Cell(50,10,$ch3,1,1,'C',0);

$pdf->Cell(50,10,'4',1,0,'C',0);
$pdf->Cell(50,10,$ch4,1,1,'C',0);

$pdf->Cell(50,10,'',0,1);

$pdf->Cell(15,10,'SSC',1,0,'C',0);
$pdf->Cell(17,10,'HSSC',1,0,'C',0);
$pdf->Cell(35,10,'Improvement',1,0,'C',0);
$pdf->Cell(27,10,'Attempt',1,0,'C',0);
$pdf->Cell(45,10,'Additional Maths',1,0,'C',0);
$pdf->Cell(20,10,'Maths',1,0,'C',0);
$pdf->Cell(28,10,'Bilology',1,1,'C',0);

$pdf->Cell(15,10,$sob_marks,1,0,'C',0);
$pdf->Cell(17,10,$iob_marks,1,0,'C',0);
$pdf->Cell(35,10,$imp,1,0,'C',0);
$pdf->Cell(27,10,$att,1,0,'C',0);
$pdf->Cell(45,10,$addmath,1,0,'C',0);
$pdf->Cell(20,10,$math,1,0,'C',0);
$pdf->Cell(28,10,$bio,1,1,'C',0);

$pdf->Cell(50,5,'',0,1);
$pdf->Cell(15,10,'',0,0,'C',0);
$pdf->Cell(17,10,'',0,0,'C',0);
$pdf->Cell(35,10,'',0,0,'C',0);
$pdf->Cell(60,10,'',0,0,'C',0);

$pdf->Cell(45,10,'Adjusted marks',1,0,'C',0);

$pdf->Cell(15,10,$adj,1,0,'C',0);


$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,10,'',0,1);
$pdf->Cell(50,10,'',0,1);

$pdf->Cell(0,10,'UNIVERSITY OF ENGINEERING AND TECHNOLOGY PESHAWAR,KPK',0,0,'C');


$pdf->Output();
} 
else
{
 ?> 
					     <script>
                             window.location="admission_form.php";
							 alert('An Error Occured');
                          </script>
						  <?php
                           exit();
}
}
?>




