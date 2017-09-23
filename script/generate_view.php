<?php 

include_once './function_inc.php' ;
require_once './Connection.php';
require_once './PHPExcel.php';
require_once './PHPExcel/IOFactory.php';

/* Note: If there's is any error in excel file in opening. Open the excel file in notepade++ and see the error on top*/


/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('Asia/Karachi');

$errorMsg = "" ;

// echo "<pre>";
// print_r($_POST) ;
// echo "</pre>";

/* ------------------------Define Document Settings------------------------------------------ */
$creator = "Khan" ;
$lastModifiedBy= "None" ;
$title = "Employee Salary View" ;
$subject = "None" ;
$description = "Employee Salary View" ;
$keywords = "office PHPExcel php" ;
$category = "Employee Salary" ;

/* set default font/Size Variables for document */
$font = 'Calibri' ;
$FontSize = 10 ;

/* Set Excel file type, Document Title*/
$excelType = "Excel2007" ;
$firstSheetTitle = "Employee Allownces" ;
$secondSheetTitle = "Employee Dedudctions" ;

/* ========================================================*/


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

/* 
	writer already created the first sheet for us, let's get it 
	Since the writer has already created the first sheet, we get the sheet and rename it. 
*/


/* First Sheet Setting */
$objPHPExcel->setActiveSheetIndex(0);
$objSheet = $objPHPExcel->getActiveSheet();
// rename the sheet
$objSheet->setTitle($firstSheetTitle);

/* Create Second Sheet */
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(1);
$objSheet = $objPHPExcel->getActiveSheet();
$objSheet->setTitle($secondSheetTitle);



/* -------------------------------End Of Document Settings------------------------------------------ */

if( isset($_POST['view-button']) && !empty('view-button') ){

	/* Header Settings */
	{
		/*  $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
			This function will merge cells from a given column and row to a given column and row. 
			The format of the parameter to be passed to the function is [START COLUMN][START ROW] : [END COLUMN][END ROW].
		*/ 

		/* First Sheet */
		$objPHPExcel->setActiveSheetIndex(0);
		$objSheet = $objPHPExcel->getActiveSheet();
		
		// let's bold and size the header font and write the header
		// Also specify a range of cells, like here: cells from A1 to A4 -> A1:A4
		$objSheet->getStyle('A1')->getFont()->setBold(true)->setSize(11);
		$objSheet->getStyle('B1')->getFont()->setBold(true)->setSize(13);
		$objSheet->getStyle('A2')->getFont()->setBold(true)->setSize(11);
		$objSheet->getStyle('B2')->getFont()->setBold(true)->setSize(13);

		// write header
		$objPHPExcel->getActiveSheet()->mergeCells('B1:D1');
		$objSheet->getCell('A1')->setValue('Department:');
		/* Header value is set Below in While loop */
		$objSheet->getCell('A2')->setValue("Pay Roll Month:");
		$objSheet->getCell('B2')->setValue(date('M-Y'));


		/* Second Sheet */
		/* Switch Back to 2nd Sheet */
		$objPHPExcel->setActiveSheetIndex(1);
		$objSheet = $objPHPExcel->getActiveSheet();

		$objSheet->getStyle('A1')->getFont()->setBold(true)->setSize(11);
		$objSheet->getStyle('B1')->getFont()->setBold(true)->setSize(13);
		$objSheet->getStyle('A2')->getFont()->setBold(true)->setSize(11);
		$objSheet->getStyle('B2')->getFont()->setBold(true)->setSize(13);

		// write header
		$objPHPExcel->getActiveSheet()->mergeCells('B1:D1');
		$objSheet->getCell('A1')->setValue('Department:');
		/* Header value is set Below in While loop */
		$objSheet->getCell('A2')->setValue("Pay Roll Month:");
		$objSheet->getCell('B2')->setValue(date('M-Y'));
		
	}

	/*-------------------------------------------------*/

	/* Fields Heading Definition */
	{
		/* First Sheet */
		/* Switch Back to 1st Sheet */
		$objPHPExcel->setActiveSheetIndex(0);
		$objSheet = $objPHPExcel->getActiveSheet();

		$objSheet->getStyle('A4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('A4')->setValue("EmpID");
		$objSheet->getStyle('B4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('B4')->setValue("Employee Name");
		$objSheet->getStyle('C4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('C4')->setValue("Designation");
		$objSheet->getStyle('D4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('D4')->setValue("Account No");
		$objSheet->getStyle('E4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('E4')->setValue("BPS");
		$objSheet->getStyle('F4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('F4')->setValue("Fixed");
		$objSheet->getStyle('G4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('G4')->setValue("Basic Pay");
		$objSheet->getStyle('H4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('H4')->setValue("Fixed Pay");
		$objSheet->getStyle('I4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('I4')->setValue("Personal Pay");
		$objSheet->getStyle('J4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('J4')->setValue("Hrent1 All");
		$objSheet->getStyle('K4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('K4')->setValue("Hrent Sub: All");
		$objSheet->getStyle('L4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('L4')->setValue("Convence All");
		$objSheet->getStyle('M4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('M4')->setValue("Adhoc_Rel_2010");
		$objSheet->getStyle('N4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('N4')->setValue("Computer All");
		$objSheet->getStyle('O4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('O4')->setValue("Private All");
		$objSheet->getStyle('P4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('P4')->setValue("Extra/D All");
		$objSheet->getStyle('Q4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('Q4')->setValue("Senior_P All");
		$objSheet->getStyle('R4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('R4')->setValue("Medical All");
		$objSheet->getStyle('S4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('S4')->setValue("ENT: All");
		$objSheet->getStyle('T4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('T4')->setValue("Dean All");
		$objSheet->getStyle('U4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('U4')->setValue("Integrated All");
		$objSheet->getStyle('V4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('V4')->setValue("Spec_Add All");
		$objSheet->getStyle('W4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('W4')->setValue("Teacher All");
		$objSheet->getStyle('X4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('X4')->setValue("Orderly All");
		$objSheet->getStyle('Y4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('Y4')->setValue("ARA 2016 10%");
		$objSheet->getStyle('Z4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('Z4')->setValue("Brain Drain");
		$objSheet->getStyle('AA4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AA4')->setValue("Other All");
		$objSheet->getStyle('AB4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AB4')->setValue("Gross Salary");

		/* Second Sheet */
		/* Switch Back to 2st Sheet */
		$objPHPExcel->setActiveSheetIndex(1);
		$objSheet = $objPHPExcel->getActiveSheet();
		
		$objSheet->getStyle('A4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('A4')->setValue("EmpID");
		$objSheet->getStyle('B4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('B4')->setValue("Employee Name");
		$objSheet->getStyle('C4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('C4')->setValue("Designation");
		$objSheet->getStyle('D4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('D4')->setValue("Account No");
		$objSheet->getStyle('E4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('E4')->setValue("BPS");
		$objSheet->getStyle('F4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('F4')->setValue("Fixed");
		$objSheet->getStyle('G4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('G4')->setValue("Hrent:1 Ded");
		$objSheet->getStyle('H4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('H4')->setValue("Hrent:2 Ded");
		$objSheet->getStyle('I4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('I4')->setValue("Elec:Charges 1 Ded");
		$objSheet->getStyle('J4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('J4')->setValue("Elec:Charges 2 Ded");
		$objSheet->getStyle('K4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('K4')->setValue("Sui gas Ded");
		$objSheet->getStyle('L4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('L4')->setValue("Water Tax 1 Ded");
		$objSheet->getStyle('M4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('M4')->setValue("Water Tax 2 Ded");
		$objSheet->getStyle('N4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('N4')->setValue("Endovement Fund");
		$objSheet->getStyle('O4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('O4')->setValue("B.Fund Ded");
		$objSheet->getStyle('P4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('P4')->setValue("Convence Loan Ded");
		$objSheet->getStyle('Q4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('Q4')->setValue("GP Fund Regular");
		$objSheet->getStyle('R4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('R4')->setValue("GP Fund Advence");
		$objSheet->getStyle('S4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('S4')->setValue("Eid Advance Ded");
		$objSheet->getStyle('T4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('T4')->setValue("Union Fund 1");
		$objSheet->getStyle('U4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('U4')->setValue("Union Fund 2");
		$objSheet->getStyle('V4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('V4')->setValue("Vehicle/O Ded");
		$objSheet->getStyle('W4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('W4')->setValue("Upkeep Ded");
		$objSheet->getStyle('X4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('X4')->setValue("Teacher vehicle Ded");
		$objSheet->getStyle('Y4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('Y4')->setValue("R/Leave Ded");
		$objSheet->getStyle('Z4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('Z4')->setValue("Recovery of gap/CA");
		$objSheet->getStyle('AA4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AA4')->setValue("House Build Loan");
		$objSheet->getStyle('AB4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AB4')->setValue("Income Tax");
		$objSheet->getStyle('AC4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AC4')->setValue("Group_Insurance");
		$objSheet->getStyle('AD4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AD4')->setValue("Other");
		$objSheet->getStyle('AE4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AE4')->setValue("Total");
		$objSheet->getStyle('AF4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AF4')->setValue("Net Salary");
		$objSheet->getStyle('AG4')->getFont()->setBold(true)->setSize(10);
		$objSheet->getCell('AG4')->setValue("Signature");
	}
	/* End Heading Definition */
	
	/*-------------------------------------------------*/

	/* Set Fields value*/

	$dept = $_POST['department'] ;
	$query = "SELECT * FROM Employee WHERE Department_ID='$dept' ORDER BY BPS DESC";
	if ($queryResult = mysqli_query($conn, $query)) {
		
		$recordIndex = 0 ;
		$rowNo = 5 ;
		while ( $data = return_emp_data($queryResult,$recordIndex) ) {
			
			if ( !empty($data['errorMsg']) ){
				$errorMsg = $data['errorMsg'] ;
				break ;
			}
			else{

				/* Record Resources */
				{
					$Employee_Row = $data['Employee_Row'] ;
					$Department_Row = $data['Department_Row'] ;
					$Qualification_Row = $data['Qualification_Row'] ;
					$Designation_Row = $data['Designation_Row'] ;
					$Campus_Row = $data['Campus_Row'] ;
					$Allowance_Row = $data['Allowance_Row'] ;
					$Deduction_Row = $data['Deduction_Row'] ;
					$netSalaryRow = $data['netSalaryRow'] ;
				}
				/* Employee Personal Information */
				{
					$Employee_Code = $Employee_Row['Employee_Code'];
		      		$Employee_Name = $Employee_Row['Employee_Name'];
					$Fix = $Employee_Row['Fix'];
					$Current_Month = date('M') ;
					$Account_No = $Employee_Row['Account'];
					$BPS =$Employee_Row['BPS'];
					$Designation =  $Designation_Row['Designation'];
					$department = $Department_Row['Department_Name'] ;
				}
				/* Allownces Information */
				{
					$Basic_Pay     = $Allowance_Row['Basic_Pay'];
					$Fixed_Pay     = $Allowance_Row['Fixed_Pay'];
					$Personal_Pay  = $Allowance_Row['Personal_Pay'];
					$Hreant1_All   = $Allowance_Row['Hreant1_All'];
					$Hrent_Sub_All = $Allowance_Row['Hrent_Sub_All'];
					$Convence_All  = $Allowance_Row['Convence_All']; 
					$Adhoc_Rel_2010= $Allowance_Row['Adhoc_Rel_2010'];
					$Computer_All  = $Allowance_Row['Computer_All']; 
					$Private_All   = $Allowance_Row['Private_All']; 
					$Extra_All     = $Allowance_Row['Extra_All'];
					$Senior_p_All  = $Allowance_Row['Senior_p_All']; 
					$Med_All       = $Allowance_Row['Med_All'];
					$ENT_All       = $Allowance_Row['ENT_All']; 
					$Dean_All      = $Allowance_Row['Dean_All']; 
					$intgrated_All = $Allowance_Row['intgrated_All']; 
					$Spec_Add_All  = $Allowance_Row['Spec_Add_All']; 
					$Teach_All     = $Allowance_Row['Teach_All'];
					$Orderly_All   = $Allowance_Row['Orderly_All'];
					$Oth_All       = $Allowance_Row['Oth_All']; 
					$Brain_Drain   = $Allowance_Row['Brain_Drain']; 
					$ARA_2016_10PERCENT = $Allowance_Row['ARA_2016_10PERCENT'];
				}

				/* Dedudction Information */
				{
					$House_Rent_1  = $Deduction_Row['House_Rent_1'];
					$House_Rent_2  = $Deduction_Row['House_Rent_2'];
					$Electric_Charges_1  = $Deduction_Row['Electric_Charges_1'];
					$Electric_Charges_2  = $Deduction_Row['Electric_Charges_2'];
					$SuiGas_Charges  = $Deduction_Row['SuiGas_Charges'];
					$Water_Tax1_Charges  = $Deduction_Row['Water_Tax1_Charges'];
					$Water_Tax2_Charges  = $Deduction_Row['Water_Tax2_Charges'];
					$Endovement_Fund  = $Deduction_Row['Endovement_Fund'];
					$B_Fund  = $Deduction_Row['B_Fund'];
					$House_Build_Loan  = $Deduction_Row['House_Build_Loan'];
					$Convence_Loan  = $Deduction_Row['Convence_Loan'];
					$GP_Fund_Regular  = $Deduction_Row['GP_Fund_Regular'];
					$GP_Fund_Advence  = $Deduction_Row['GP_Fund_Advence'];
					$Eid_Advance  = $Deduction_Row['Eid_Advance'];
					$Union_Fund_1  = $Deduction_Row['Union_Fund_1'];
					$Union_Fund_2  = $Deduction_Row['Union_Fund_2'];
					$Vehicle_Charges_Other  = $Deduction_Row['Vehicle_Charges_Other'];
					$Vehicle_Charges_Teacher  = $Deduction_Row['Vehicle_Charges_Teacher'];
					$Upkeep_Ded  = $Deduction_Row['Upkeep_Ded'];
					$R_Leave_Without_Pay  = $Deduction_Row['R_Leave_Without_Pay'];
					$Recovery_Gap_CA  = $Deduction_Row['Recovery_Gap_CA'];
					$Income_Tax  = $Deduction_Row['Income_Tax'];
					$Group_Insurance  = $Deduction_Row['Group_Insurance'];
					$Other  = $Deduction_Row['Other'];
				}

				/* Net Salary Information */
				{
					$Gross_Pay =  $netSalaryRow['Gross_Pay'];
					$Total_Deduction =  $netSalaryRow['totalDeduction'];
					$netSalary = $netSalaryRow['Net_Salary'];
				}

				/* Set Cell Values */
				{
					/* First Sheet */
					/* Switch Back to 1st Sheet */
					$objPHPExcel->setActiveSheetIndex(0);
					$objSheet = $objPHPExcel->getActiveSheet();
					$objSheet->getCell('B1')->setValue($department);
					
					$objSheet->getCell("A{$rowNo}")->setValue($Employee_Code);
					$objSheet->getCell("B{$rowNo}")->setValue($Employee_Name);
					$objSheet->getCell("C{$rowNo}")->setValue($Designation);
					$objSheet->getCell("D{$rowNo}")->setValue($Account_No);
					$objSheet->getCell("E{$rowNo}")->setValue($BPS);
					$objSheet->getCell("F{$rowNo}")->setValue($Fix);
					$objSheet->getCell("G{$rowNo}")->setValue($Basic_Pay);
					$objSheet->getCell("H{$rowNo}")->setValue($Fixed_Pay);
					$objSheet->getCell("I{$rowNo}")->setValue($Personal_Pay);
					$objSheet->getCell("J{$rowNo}")->setValue($Hreant1_All);
					$objSheet->getCell("K{$rowNo}")->setValue($Hrent_Sub_All);
					$objSheet->getCell("L{$rowNo}")->setValue($Convence_All);
					$objSheet->getCell("M{$rowNo}")->setValue($Adhoc_Rel_2010);
					$objSheet->getCell("N{$rowNo}")->setValue($Computer_All);
					$objSheet->getCell("O{$rowNo}")->setValue($Private_All);
					$objSheet->getCell("P{$rowNo}")->setValue($Extra_All);
					$objSheet->getCell("Q{$rowNo}")->setValue($Senior_p_All);
					$objSheet->getCell("R{$rowNo}")->setValue($Med_All);
					$objSheet->getCell("S{$rowNo}")->setValue($ENT_All);
					$objSheet->getCell("T{$rowNo}")->setValue($Dean_All);
					$objSheet->getCell("U{$rowNo}")->setValue($intgrated_All);
					$objSheet->getCell("V{$rowNo}")->setValue($Spec_Add_All);
					$objSheet->getCell("W{$rowNo}")->setValue($Teach_All);
					$objSheet->getCell("X{$rowNo}")->setValue($Orderly_All);
					$objSheet->getCell("Y{$rowNo}")->setValue($ARA_2016_10PERCENT);
					$objSheet->getCell("Z{$rowNo}")->setValue($Brain_Drain);
					$objSheet->getCell("AA{$rowNo}")->setValue($Oth_All);
					$objSheet->getCell("AB{$rowNo}")->setValue($Gross_Pay);

					/* Second Sheet */
					/* Switch Back to 2nd Sheet */
					$objPHPExcel->setActiveSheetIndex(1);
					$objSheet = $objPHPExcel->getActiveSheet();
					$objSheet->getCell('B1')->setValue($department);

					$objSheet->getCell("A{$rowNo}")->setValue($Employee_Code);
					$objSheet->getCell("B{$rowNo}")->setValue($Employee_Name);
					$objSheet->getCell("C{$rowNo}")->setValue($Designation);
					$objSheet->getCell("D{$rowNo}")->setValue($Account_No);
					$objSheet->getCell("E{$rowNo}")->setValue($BPS);
					$objSheet->getCell("F{$rowNo}")->setValue($Fix);
					$objSheet->getCell("G{$rowNo}")->setValue($House_Rent_1);
					$objSheet->getCell("H{$rowNo}")->setValue($House_Rent_2);
					$objSheet->getCell("I{$rowNo}")->setValue($Electric_Charges_1);
					$objSheet->getCell("J{$rowNo}")->setValue($Electric_Charges_2);
					$objSheet->getCell("K{$rowNo}")->setValue($SuiGas_Charges);
					$objSheet->getCell("L{$rowNo}")->setValue($Water_Tax1_Charges);
					$objSheet->getCell("M{$rowNo}")->setValue($Water_Tax2_Charges);
					$objSheet->getCell("N{$rowNo}")->setValue($Endovement_Fund);
					$objSheet->getCell("O{$rowNo}")->setValue($B_Fund);
					$objSheet->getCell("P{$rowNo}")->setValue($House_Build_Loan);
					$objSheet->getCell("Q{$rowNo}")->setValue($Convence_Loan);
					$objSheet->getCell("R{$rowNo}")->setValue($GP_Fund_Regular);
					$objSheet->getCell("S{$rowNo}")->setValue($GP_Fund_Advence);
					$objSheet->getCell("T{$rowNo}")->setValue($Eid_Advance);
					$objSheet->getCell("U{$rowNo}")->setValue($Union_Fund_1);
					$objSheet->getCell("V{$rowNo}")->setValue($Union_Fund_2);
					$objSheet->getCell("W{$rowNo}")->setValue($Vehicle_Charges_Other);
					$objSheet->getCell("X{$rowNo}")->setValue($Vehicle_Charges_Teacher);
					$objSheet->getCell("Y{$rowNo}")->setValue($Upkeep_Ded);
					$objSheet->getCell("Z{$rowNo}")->setValue($R_Leave_Without_Pay);
					$objSheet->getCell("AA{$rowNo}")->setValue($Recovery_Gap_CA);
					$objSheet->getCell("AB{$rowNo}")->setValue($Income_Tax);
					$objSheet->getCell("AC{$rowNo}")->setValue($Group_Insurance);
					$objSheet->getCell("AD{$rowNo}")->setValue($Other);
					$objSheet->getCell("AE{$rowNo}")->setValue($Total_Deduction);
					$objSheet->getCell("AF{$rowNo}")->setValue($netSalary);
				}
			}

		 $recordIndex++ ;
		 $rowNo++; 
		} /*End Of While Loop*/
		

    	/* free result set*/
    	mysqli_free_result($queryResult);
	}
	else{
		echo $errorMsg = "Server Fault: Getting Employee Resource!" ; 
	}

	/*-------------------------------------------------*/

	
	/* End of Set Fields Value*/
	
	/*-------------------------------------------------*/

	// $objSheet->getStyle('B5:B23')->getFont()->setBold(true)->setSize(10);
	// $objSheet->getStyle('D5:D23')->getFont()->setBold(true)->setSize(10);
	// $objSheet->getStyle('F5:F23')->getFont()->setBold(true)->setSize(10);
	// $objSheet->getStyle('H5:H23')->getFont()->setBold(true)->setSize(10);



	// $objSheet->getCell('A5')->setValue('TOTAL');
	// $objSheet->getCell('B5')->setValue('=SUM(B2:B4)');
	// $objSheet->getCell('C5')->setValue('-');
	// $objSheet->getCell('D5')->setValue('=SUM(D2:D4)');


	// autosize the columns
	{
		for ($sheetNo=0; $sheetNo<2; $sheetNo++)
		{
			$objPHPExcel->setActiveSheetIndex($sheetNo);
			$objSheet = $objPHPExcel->getActiveSheet();

			$objSheet->getColumnDimension('A')->setAutoSize(true);
			$objSheet->getColumnDimension('B')->setAutoSize(true);
			$objSheet->getColumnDimension('C')->setAutoSize(true);
			$objSheet->getColumnDimension('D')->setAutoSize(true);
			$objSheet->getColumnDimension('E')->setAutoSize(true);
			$objSheet->getColumnDimension('F')->setAutoSize(true);
			$objSheet->getColumnDimension('G')->setAutoSize(true);
			$objSheet->getColumnDimension('H')->setAutoSize(true);
			$objSheet->getColumnDimension('I')->setAutoSize(true);
			$objSheet->getColumnDimension('J')->setAutoSize(true);
			$objSheet->getColumnDimension('K')->setAutoSize(true);
			$objSheet->getColumnDimension('L')->setAutoSize(true);
			$objSheet->getColumnDimension('M')->setAutoSize(true);
			$objSheet->getColumnDimension('N')->setAutoSize(true);
			$objSheet->getColumnDimension('O')->setAutoSize(true);
			$objSheet->getColumnDimension('P')->setAutoSize(true);
			$objSheet->getColumnDimension('Q')->setAutoSize(true);
			$objSheet->getColumnDimension('R')->setAutoSize(true);
			$objSheet->getColumnDimension('S')->setAutoSize(true);
			$objSheet->getColumnDimension('T')->setAutoSize(true);
			$objSheet->getColumnDimension('U')->setAutoSize(true);
			$objSheet->getColumnDimension('V')->setAutoSize(true);
			$objSheet->getColumnDimension('W')->setAutoSize(true);
			$objSheet->getColumnDimension('X')->setAutoSize(true);
			$objSheet->getColumnDimension('Y')->setAutoSize(true);
			$objSheet->getColumnDimension('Z')->setAutoSize(true);
			$objSheet->getColumnDimension('AA')->setAutoSize(true);
			$objSheet->getColumnDimension('AB')->setAutoSize(true);
		}
	}


	/* Setting the header type */
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="view.xlsx"');
	header('Cache-Control: max-age=0');

	$objWriter->save('php://output');

	/* If you want to save the file on the server instead of downloading, replace the last 4 lines by 
	    $objWriter->save('file.xlsx');
	*/
}

?>