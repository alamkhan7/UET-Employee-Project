<?php 

require_once './function_inc.php' ;
require_once 'vendor/autoload.php';

date_default_timezone_set('Asia/Karachi');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$errorMsg = "" ;
$going_back = "../history.php" ;
$id = $_GET['oldempid'];
$date = $_GET['date'] ;

if( isset($_GET['generate']) && !empty($id) && !empty($date) ){

	$query = "SELECT * FROM employee_history WHERE Employee_Code ='$id'";
	$empRecord = return_record($query) ;
	
	if (empty($empRecord['errorMsg'])){

		$employee_history_id = $empRecord['row']['employee_history_id'] ;
    	$Employee_Code = $empRecord['row']['Employee_Code'] ;			
    	$DeleteDate = $empRecord['row']['DeleteDate'] ;
	    $Employee_Name = $empRecord['row']['Employee_Name'] ;
	    $Father_Name = $empRecord['row']['Father_Name'] ;
	    $BPS = $empRecord['row']['BPS'] ;
	    $CNIC = $empRecord['row']['CNIC'] ;
	   	$Address = $empRecord['row']['Address'] ;
	    
	    $NTN = (empty($empRecord['row']['NTN']) ? "None" : $empRecord['row']['NTN']) ;

	    $Account = $empRecord['row']['Account'] ;
	    
	    $Fix = $empRecord['row']['Fix'] ;
	    if($Fix=='R')
	    	{$Fix="Regualr";}
	    else
	    	{$Fix="Fix";}

	    $Staff = ($empRecord['row']['Staff']=="T" ? "Teaching" : "Non-Tech") ;
	    
	    $Admin_Position = $empRecord['row']['Admin_Position'] ;
	    $House = ($empRecord['row']['House'] ? "Yes" : "No" ) ;
	    $Vehicle = ($empRecord['row']['vehicle'] ? "Yes" : "No" );
	    $Marital_Status = ($empRecord['row']['Marital_Status'] ? "Yes" : "No" ) ;
	    $Join_Date = $empRecord['row']['Join_Date'] ;
	    $Department = $empRecord['row']['Department'] ;
	    $Qualification = $empRecord['row']['Qualification'] ;
	    $Designation = $empRecord['row']['Designation'] ;
	    $Campus = $empRecord['row']['Campus'] ;

	    $allownces = return_allownces_history($Employee_Code,$date) ;
	    if (empty($allownces['errorMsg'])){

	    	$payRollDate = $allownces['row']['Date'] ;

	    	$Basic_Pay     = $allownces['row']['Basic_Pay'] ;
			$Fixed_Pay     = $allownces['row']['Fixed_Pay'];
			$Personal_Pay  = $allownces['row']['Personal_Pay'];
			$Hreant1_All   = $allownces['row']['Hreant1_All'];
			$Hrent_Sub_All = $allownces['row']['Hrent_Sub_All'];
			$Convence_All  = $allownces['row']['Convence_All']; 
			$Adhoc_Rel_2010= $allownces['row']['Adhoc_Rel_2010'];
			$Computer_All  = $allownces['row']['Computer_All']; 
			$Private_All   = $allownces['row']['Private_All']; 
			$Extra_All     = $allownces['row']['Extra_All'];
			$Senior_p_All  = $allownces['row']['Senior_p_All']; 
			$Med_All       = $allownces['row']['Med_All'];
			$ENT_All       = $allownces['row']['ENT_All']; 
			$Dean_All      = $allownces['row']['Dean_All']; 
			$intgrated_All = $allownces['row']['intgrated_All']; 
			$Spec_Add_All  = $allownces['row']['Spec_Add_All']; 
			$Teach_All     = $allownces['row']['Teach_All'];
			$Orderly_All   = $allownces['row']['Orderly_All'];
			$Oth_All       = $allownces['row']['Oth_All']; 
			$Brain_Drain   = $allownces['row']['Brain_Drain']; 
			$ARA_2016_10PERCENT = $allownces['row']['ARA_2016_10PERCENT'];
	    }
        else{
        	$errorMsg = $allownces['errorMsg'] ;
        }

        $deductoins = return_deductions_history($Employee_Code,$date) ;
        if (empty($deductoins['errorMsg'])){
        	
        	$House_Rent_1  = $deductoins['row']['House_Rent_1'];
			$House_Rent_2  = $deductoins['row']['House_Rent_2'];
			$Electric_Charges_1  = $deductoins['row']['Electric_Charges_1'];
			$Electric_Charges_2  = $deductoins['row']['Electric_Charges_2'];
			$SuiGas_Charges  = $deductoins['row']['SuiGas_Charges'];
			$Water_Tax1_Charges  = $deductoins['row']['Water_Tax1_Charges'];
			$Water_Tax2_Charges  = $deductoins['row']['Water_Tax2_Charges'];
			$Endovement_Fund  = $deductoins['row']['Endovement_Fund'];
			$B_Fund  = $deductoins['row']['B_Fund'];
			$House_Build_Loan  = $deductoins['row']['House_Build_Loan'];
			$Convence_Loan  = $deductoins['row']['Convence_Loan'];
			$GP_Fund_Regular  = $deductoins['row']['GP_Fund_Regular'];
			$GP_Fund_Advence  = $deductoins['row']['GP_Fund_Advence'];
			$Eid_Advance  = $deductoins['row']['Eid_Advance'];
			$Union_Fund_1  = $deductoins['row']['Union_Fund_1'];
			$Union_Fund_2  = $deductoins['row']['Union_Fund_2'];
			$Vehicle_Charges_Other  = $deductoins['row']['Vehicle_Charges_Other'];
			$Vehicle_Charges_Teacher  = $deductoins['row']['Vehicle_Charges_Teacher'];
			$Upkeep_Ded  = $deductoins['row']['Upkeep_Ded'];
			$R_Leave_Without_Pay  = $deductoins['row']['R_Leave_Without_Pay'];
			$Recovery_Gap_CA  = $deductoins['row']['Recovery_Gap_CA'];
			$Income_Tax  = $deductoins['row']['Income_Tax'];
			$Group_Insurance  = $deductoins['row']['Group_Insurance'];
			$Other  = $deductoins['row']['Other'];
						
        }
        else{
        	$errorMsg = $deductoins['errorMsg'] ;
        }

        $netsalary = return_netsalary_history($Employee_Code,$date) ;
        if (empty($netsalary['errorMsg'])){

        	$Gross_Pay =  $netsalary['row']['Gross_Pay'];
        	$Total_Deduction =  $netsalary['row']['totalDeduction'];
        	$netSalary = $netsalary['row']['Net_Salary'];
        }
        else{
        	$errorMsg = $netsalary['errorMsg'] ;
        }

        /* Generate View */
        if ( empty($errorMsg) ){
        	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/employeeHistoryTemplate.docx');
        	/* Personal Inforamation */
        	$templateProcessor->setValue('id', $Employee_Code);
			$templateProcessor->setValue('name', $Employee_Name);
			$templateProcessor->setValue('fname', $Father_Name);
			$templateProcessor->setValue('bps', $BPS);
			$templateProcessor->setValue('quali', $Qualification);
			$templateProcessor->setValue('desig', $Designation);
			$templateProcessor->setValue('staff', $Staff);
			$templateProcessor->setValue('admin', $Admin_Position);
			$templateProcessor->setValue('fixed', $Fix);
			$templateProcessor->setValue('accno', $Account);
			$templateProcessor->setValue('ntn', $NTN);
			$templateProcessor->setValue('cnic', $CNIC);
			$templateProcessor->setValue('dept', $Department);
			$templateProcessor->setValue('campus', $Campus);
			$templateProcessor->setValue('house', $House);
			$templateProcessor->setValue('vehicle', $Vehicle);
			$templateProcessor->setValue('married', $Marital_Status);
			$templateProcessor->setValue('joindate', $Join_Date);

			/*Allownces*/
			$templateProcessor->setValue('bpay', $Basic_Pay);
			$templateProcessor->setValue('fpay', $Fixed_Pay);
			$templateProcessor->setValue('ppay', $Personal_Pay);
			$templateProcessor->setValue('hrent1', $Hreant1_All);
			$templateProcessor->setValue('hrentsub', $Hrent_Sub_All);
			$templateProcessor->setValue('conva', $Convence_All);
			$templateProcessor->setValue('adhoc', $Adhoc_Rel_2010);
			$templateProcessor->setValue('computer', $Computer_All);
			$templateProcessor->setValue('private', $Private_All);
			$templateProcessor->setValue('extra', $Extra_All);
			$templateProcessor->setValue('senior', $Senior_p_All);
			$templateProcessor->setValue('medical', $Med_All);
			$templateProcessor->setValue('ent', $ENT_All);
			$templateProcessor->setValue('dean', $Dean_All);
			$templateProcessor->setValue('integ', $intgrated_All);
			$templateProcessor->setValue('spec', $Spec_Add_All);
			$templateProcessor->setValue('teach', $Teach_All);
			$templateProcessor->setValue('orderly', $Orderly_All);
			$templateProcessor->setValue('ara', $ARA_2016_10PERCENT);
			$templateProcessor->setValue('brain', $Brain_Drain);
			$templateProcessor->setValue('othera', $Oth_All);

			/* Deductions */
			$templateProcessor->setValue('Hrent:1', $House_Rent_1);
			$templateProcessor->setValue('Hrent:2', $House_Rent_2);
			$templateProcessor->setValue('Elec:T', $Electric_Charges_1);
			$templateProcessor->setValue('Elec:O', $Electric_Charges_2);
			$templateProcessor->setValue('Sui', $SuiGas_Charges);
			$templateProcessor->setValue('wtax1', $Water_Tax1_Charges);
			$templateProcessor->setValue('wtax2', $Water_Tax2_Charges);
			$templateProcessor->setValue('end', $Endovement_Fund);
			$templateProcessor->setValue('bfund', $B_Fund);
			$templateProcessor->setValue('hbloan', $House_Build_Loan);
			$templateProcessor->setValue('convl', $Convence_Loan);
			$templateProcessor->setValue('gpfr', $GP_Fund_Regular);
			$templateProcessor->setValue('gpfa', $GP_Fund_Advence);
			$templateProcessor->setValue('eidadv', $Eid_Advance);
			$templateProcessor->setValue('unionf1', $Union_Fund_1);
			$templateProcessor->setValue('unionf2', $Union_Fund_2);
			$templateProcessor->setValue('vehicleO', $Vehicle_Charges_Other);
			$templateProcessor->setValue('vehicleT', $Vehicle_Charges_Teacher);
			$templateProcessor->setValue('upkeep', $Upkeep_Ded);
			$templateProcessor->setValue('rleave', $R_Leave_Without_Pay);
			$templateProcessor->setValue('recov', $Recovery_Gap_CA);
			$templateProcessor->setValue('income', $Income_Tax);
			$templateProcessor->setValue('ginsurance', $Group_Insurance);
			$templateProcessor->setValue('otherd', $Other);
			
			/* Net Salary */
			$templateProcessor->setValue('gross', $Gross_Pay);
			$templateProcessor->setValue('totalDeduc', $Total_Deduction);
			$templateProcessor->setValue('net', $netSalary);

			/*Save File*/
			$templateProcessor->setValue('payRollDate', $payRollDate);
			$fileName = $Employee_Name . "_" . $payRollDate ;
			header('Content-Type: application/octet-stream');
			header("Content-Disposition: attachment; filename=".$fileName.".docx");

			// $templateProcessor->saveAs('results/Sample_23_TemplateBlock.docx');
			$templateProcessor->saveAs('php://output');

        }

	}
	else {
		$errorMsg = "Sorry! File not found." ;
	}
	
		
}
if (!empty($errorMsg))
	header('Location: '.$going_back . '?oldempid='.urlencode($id).'&Error='.urlencode($errorMsg)  ) ;



?>