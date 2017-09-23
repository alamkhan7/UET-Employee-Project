<?php
include_once './script/function_inc.php' ;
require_once './script/get_employee_info_inc.php';

/* Note: If there's is any error in excel file in opening. Open the excel file in notepade++ and see the error on top*/


/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('Asia/Karachi');

// include PHPExcel
require('./script/PHPExcel.php');



/* Set Excel document properties variables */
$creator = "Khan" ;
$lastModifiedBy= "None" ;
$title = "Employee Record" ;
$subject = "None" ;
$description = "Employee Record" ;
$keywords = "office PHPExcel php" ;
$category = "Employee Record" ;

/* set default font/Size Variables for document */
$font = 'Calibri' ;
$FontSize = 10 ;

/* Set Excel file type, Document Title*/
$excelType = "Excel2007" ;
$documentTitle = $Employee_Code.'_'.$Employee_Name ;

/* ----------------------------------------------------------------------------------------------------------------*/


// create new PHPExcel object
$objPHPExcel = new PHPExcel;

/* Set Excel document properties */
$objPHPExcel->getProperties()->setCreator($creator)
			    ->setLastModifiedBy($lastModifiedBy)
			    ->setTitle($title)
			    ->setSubject($subject)
		   	    ->setDescription($description)
			    ->setKeywords($keywords)
		      	->setCategory($category);


// set default font
$objPHPExcel->getDefaultStyle()->getFont()->setName($font);

// set default font size
$objPHPExcel->getDefaultStyle()->getFont()->setSize($FontSize);

/*
	create the writer
	In this step, the writer to write to the file is created and the type of file is also specified. The writer also creates the first sheet of the excel file.
*/
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $excelType);

// currency format, € with < 0 being in red color
$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';

// number format, with thousands separator and two decimal points.
$numberFormat = '#,#0.##;[Red]-#,#0.##';



// writer already created the first sheet for us, let's get it
/* Since the writer has already created the first sheet, we get the sheet and rename it. */
$objSheet = $objPHPExcel->getActiveSheet();

// rename the sheet
$objSheet->setTitle($documentTitle);

/* ------------------------------------------------------------------------------------------------------------------ */

// let's bold and size the header font and write the header
// Also specify a range of cells, like here: cells from A1 to A4 -> A1:A4
$objSheet->getStyle('A1')->getFont()->setBold(true)->setSize(11);
$objSheet->getStyle('B1')->getFont()->setBold(true)->setSize(13);
$objSheet->getStyle('A2')->getFont()->setBold(true)->setSize(11);
$objSheet->getStyle('B2')->getFont()->setBold(true)->setSize(13);


// write header

$objSheet->getCell('A1')->setValue('Employee Id');
$objSheet->getCell('B1')->setValue($Employee_Code);
$objSheet->getCell('A2')->setValue('Employee Name');
$objSheet->getCell('B2')->setValue($Employee_Name);

/*-------------------------------------------------------------------------------------------------------*/

$objSheet->getStyle('A4')->getFont()->setBold(true)->setSize(11);
$objSheet->getCell('A4')->setValue('Employee Information:');

$objSheet->getStyle('B5:B23')->getFont()->setBold(true)->setSize(10);
$objSheet->getStyle('D5:D23')->getFont()->setBold(true)->setSize(10);
$objSheet->getStyle('F5:F23')->getFont()->setBold(true)->setSize(10);
$objSheet->getStyle('H5:H23')->getFont()->setBold(true)->setSize(10);

$objSheet->getCell('B5')->setValue('Designation');
$objSheet->getCell('C5')->setValue($Designation);
$objSheet->getCell('D5')->setValue('Qualification');
$objSheet->getCell('E5')->setValue($Qualification);
$objSheet->getCell('F5')->setValue('Department');
$objSheet->getCell('G5')->setValue($Department);
$objSheet->getCell('H5')->setValue('Admin Position');
$objSheet->getCell('I5')->setValue($Admin_Position);

$objSheet->getCell('B6')->setValue('A/C No');
$objSheet->getCell('C6')->setValue($Account_No);
$objSheet->getCell('D6')->setValue('BPS');
$objSheet->getCell('E6')->setValue(returnBPS($BPS));
$objSheet->getCell('F6')->setValue('Fixed');
$objSheet->getCell('G6')->setValue(returnFix($Fix));
$objSheet->getCell('H6')->setValue('Staff');
$objSheet->getCell('I6')->setValue(returnStaff($Staff));

$objSheet->getCell('B7')->setValue('Campus');
$objSheet->getCell('C7')->setValue($Campus);
$objSheet->getCell('D7')->setValue('NTN');
$objSheet->getCell('E7')->setValue(returnNTN($NTN));
$objSheet->getCell('F7')->setValue('Join Date');
$objSheet->getCell('G7')->setValue(returnDate($Join_Date));
$objSheet->getCell('H7')->setValue('Current Month');
$objSheet->getCell('I7')->setValue($Current_Month);

/* -------------------------------------------------------------------------------------------------------*/

$objSheet->getStyle('A9')->getFont()->setBold(true)->setSize(11);
$objSheet->getCell('A9')->setValue('Pay and Allowances:');

$objSheet->getCell('B10')->setValue('Basic Pay');
$objSheet->getCell('C10')->setValue($Basic_Pay);
$objSheet->getCell('D10')->setValue('Fixed Pay');
$objSheet->getCell('E10')->setValue($Fixed_Pay);
$objSheet->getCell('F10')->setValue('Personal Pay');
$objSheet->getCell('G10')->setValue($Personal_Pay);
$objSheet->getCell('H10')->setValue('Hrent1 All');
$objSheet->getCell('I10')->setValue($Hreant1_All);

$objSheet->getCell('B11')->setValue('Hrent Sub: All');
$objSheet->getCell('C11')->setValue($Hrent_Sub_All);
$objSheet->getCell('D11')->setValue('Convence All');
$objSheet->getCell('E11')->setValue($Convence_All);
$objSheet->getCell('F11')->setValue('Adhoc_Rel_2010');
$objSheet->getCell('G11')->setValue($Adhoc_Rel_2010);
$objSheet->getCell('H11')->setValue('Computer All');
$objSheet->getCell('I11')->setValue($Computer_All);

$objSheet->getCell('B12')->setValue('Private All');
$objSheet->getCell('C12')->setValue($Private_All);
$objSheet->getCell('D12')->setValue('Extra/D All');
$objSheet->getCell('E12')->setValue($Extra_All);
$objSheet->getCell('F12')->setValue('Senior_P All');
$objSheet->getCell('G12')->setValue($Senior_p_All);
$objSheet->getCell('H12')->setValue('Medical All');
$objSheet->getCell('I12')->setValue($Med_All);

$objSheet->getCell('B13')->setValue('ENT: All');
$objSheet->getCell('C13')->setValue($ENT_All);
$objSheet->getCell('D13')->setValue('Dean All');
$objSheet->getCell('E13')->setValue($Dean_All);
$objSheet->getCell('F13')->setValue('Integrated All');
$objSheet->getCell('G13')->setValue($intgrated_All);
$objSheet->getCell('H13')->setValue('Spec_Add All');
$objSheet->getCell('I13')->setValue($Spec_Add_All);

$objSheet->getCell('B14')->setValue('Teacher All');
$objSheet->getCell('C14')->setValue($Teach_All);
$objSheet->getCell('D14')->setValue('Orderly All');
$objSheet->getCell('E14')->setValue($Orderly_All);
$objSheet->getCell('F14')->setValue('ARA 2016 10%');
$objSheet->getCell('G14')->setValue($ARA_2016_10PERCENT);
$objSheet->getCell('H14')->setValue('Brain Drain');
$objSheet->getCell('I14')->setValue($Brain_Drain);

$objSheet->getCell('B15')->setValue('Other All');
$objSheet->getCell('C15')->setValue($Oth_All);

/* -------------------------------------------------------------------------------------------------------*/

$objSheet->getStyle('A17')->getFont()->setBold(true)->setSize(11);
$objSheet->getCell('A17')->setValue('Deductions:');

$objSheet->getCell('B18')->setValue('Hrent:1 Ded');
$objSheet->getCell('C18')->setValue($House_Rent_1);
$objSheet->getCell('D18')->setValue('Hrent:2 Ded');
$objSheet->getCell('E18')->setValue($House_Rent_2);
$objSheet->getCell('F18')->setValue('Elec:Charges 1 Ded');
$objSheet->getCell('G18')->setValue($Electric_Charges_1);
$objSheet->getCell('H18')->setValue('Elec:Charges 2  Ded');
$objSheet->getCell('I18')->setValue($Electric_Charges_2);

$objSheet->getCell('B19')->setValue('Sui gas Ded');
$objSheet->getCell('C19')->setValue($SuiGas_Charges);
$objSheet->getCell('D19')->setValue('Water Tax 1 Ded');
$objSheet->getCell('E19')->setValue($Water_Tax1_Charges);
$objSheet->getCell('F19')->setValue('Water Tax 2 Ded');
$objSheet->getCell('G19')->setValue($Water_Tax2_Charges);
$objSheet->getCell('H19')->setValue('Endovement Fund');
$objSheet->getCell('I19')->setValue($Endovement_Fund);

$objSheet->getCell('B20')->setValue('B.Fund Ded');
$objSheet->getCell('C20')->setValue($B_Fund);
$objSheet->getCell('D20')->setValue('Convence Loan Ded');
$objSheet->getCell('E20')->setValue($Convence_Loan);
$objSheet->getCell('F20')->setValue('GP Fund Regular');
$objSheet->getCell('G20')->setValue($GP_Fund_Regular);
$objSheet->getCell('H20')->setValue('GP Fund Advence');
$objSheet->getCell('I20')->setValue($GP_Fund_Advence);

$objSheet->getCell('B21')->setValue('Eid Advance Ded');
$objSheet->getCell('C21')->setValue($Eid_Advance);
$objSheet->getCell('D21')->setValue('Union Fund 1');
$objSheet->getCell('E21')->setValue($Union_Fund_1);
$objSheet->getCell('F21')->setValue('Union Fund 2');
$objSheet->getCell('G21')->setValue($Union_Fund_2);
$objSheet->getCell('H21')->setValue('Vehicle/O Ded');
$objSheet->getCell('I21')->setValue($Vehicle_Charges_Other);

$objSheet->getCell('B22')->setValue('Upkeep Ded');
$objSheet->getCell('C22')->setValue($Upkeep_Ded);
$objSheet->getCell('D22')->setValue('Teacher vehicle Ded');
$objSheet->getCell('E22')->setValue($Vehicle_Charges_Teacher);
$objSheet->getCell('F22')->setValue('R/Leave Ded');
$objSheet->getCell('G22')->setValue($R_Leave_Without_Pay);
$objSheet->getCell('H22')->setValue('Recovery of gap/CA');
$objSheet->getCell('I22')->setValue($Recovery_Gap_CA);

$objSheet->getCell('B23')->setValue('House Build Loan');
$objSheet->getCell('C23')->setValue($House_Build_Loan);
$objSheet->getCell('D23')->setValue('Income Tax');
$objSheet->getCell('E23')->setValue($Income_Tax);
$objSheet->getCell('F23')->setValue('Group_Insurance');
$objSheet->getCell('G23')->setValue($Group_Insurance);
$objSheet->getCell('H23')->setValue('Other');
$objSheet->getCell('I23')->setValue($Other);

/* ----------------------------------------------------------------------------------------------------------------------*/
$objSheet->getStyle('A25')->getFont()->setBold(true)->setSize(11);
$objSheet->getStyle('B25')->getFont()->setBold(true)->setSize(13);
$objSheet->getCell('A25')->setValue('Gross Pay:');
$objSheet->getCell('B25')->setValue($Gross_Pay);

$objSheet->getStyle('A26')->getFont()->setBold(true)->setSize(11);
$objSheet->getStyle('B26')->getFont()->setBold(true)->setSize(13);
$objSheet->getCell('A26')->setValue('Total Deduction:');
$objSheet->getCell('B26')->setValue($Total_Deduction);

$objSheet->getStyle('A27')->getFont()->setBold(true)->setSize(11);
$objSheet->getStyle('B27')->getFont()->setBold(true)->setSize(13);
$objSheet->getCell('A27')->setValue('Net:');
$objSheet->getCell('B27')->setValue(00);


// $objSheet->getCell('A5')->setValue('TOTAL');
// $objSheet->getCell('B5')->setValue('=SUM(B2:B4)');
// $objSheet->getCell('C5')->setValue('-');
// $objSheet->getCell('D5')->setValue('=SUM(D2:D4)');


// autosize the columns
$objSheet->getColumnDimension('A')->setAutoSize(true);
$objSheet->getColumnDimension('B')->setAutoSize(true);
$objSheet->getColumnDimension('C')->setAutoSize(true);
$objSheet->getColumnDimension('D')->setAutoSize(true);
$objSheet->getColumnDimension('E')->setAutoSize(true);
$objSheet->getColumnDimension('F')->setAutoSize(true);
$objSheet->getColumnDimension('G')->setAutoSize(true);
$objSheet->getColumnDimension('H')->setAutoSize(true);
$objSheet->getColumnDimension('I')->setAutoSize(true);



//Setting the header type
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="file.xlsx"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');

/* If you want to save the file on the server instead of downloading, replace the last 4 lines by 
    $objWriter->save('file.xlsx');
*/

?>