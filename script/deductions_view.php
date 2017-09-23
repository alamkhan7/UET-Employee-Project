<?php 
require_once './function_inc.php' ;
require_once './Connection.php';
require_once 'vendor/autoload.php';

date_default_timezone_set('Asia/Karachi');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$going_back = "../view1.php"; 
$errorMsg = "" ;
$Label = '' ;

if( isset($_POST['view-button']) && !empty($_POST['department']) && !empty($_POST['fix'])  ){

	$deptID = $_POST['department'] ;
	$fix = $_POST['fix'] ;
	
	$query = "SELECT * FROM `deduction_teaching_view` WHERE Department_ID='$deptID' AND Fix='$fix'";
	$totalRecord = return_total($query) ;

	if (empty($totalRecord['errorMsg']) ){

		$query = "SELECT * FROM `deduction_teaching_view` WHERE Department_ID='$deptID' AND Fix='$fix' ORDER BY BPS DESC";
		
		if ($queryResult = mysqli_query($conn, $query)) {
			
			/*Genereate Template*/
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/deductionsTemplate.docx');
			$templateProcessor->cloneRow('Hrent:1', $totalRecord['totalRecord']);
			
			$department = "" ;
			$recordIndex = 0 ;
			$rowNo = 1 ;

			$h1total = 0 ;		$bfundtotal = 0 ;	$vttotal = 0 ;		
			$h2total = 0 ;		$hbltotal = 0 ;		$uptotal = 0 ;		
			$electtoal = 0 ;	$convtotal = 0 ;	$rltotal = 0 ;		
			$elecototal = 0 ;	$gpfrtotal = 0 ;	$recototal = 0 ;		
			$suitotal = 0 ;		$gpfatotal = 0;		$inctotal = 0 ;
			$w1total = 0 ;		$eidtotal = 0 ;		$gitotal = 0 ;	
			$w2total = 0 ;		$uf1total = 0 ;		$othtotal = 0 ;	
			$endtotal = 0 ;		$uf2total = 0 ;		$nettotal = 0 ;	
			$vototal = 0 ;		$tdtotal = 0 ;		

			while ( $data = mysqli_fetch_assoc($queryResult) ) {

				{
					$Employee_Code = $data['Employee_Code'];
		      		$Employee_Name = $data['Employee_Name'];
		      		$Account_No = $data['Account'];
		      		$BPS =$data['BPS'];
					$Fix = $data['Fix'];
					$Designation =  $data['Designation'];
					$department = $data['Department_Name'] ;
				}

				/* Dedudctions Information */
				{
					$House_Rent_1  = $data['House_Rent_1'];
					$h1total += $House_Rent_1;
					$House_Rent_2  = $data['House_Rent_2'];
					$h2total += $House_Rent_2;
					$Electric_Charges_1  = $data['Electric_Charges_1'];
					$electtoal += $Electric_Charges_1;
					$Electric_Charges_2  = $data['Electric_Charges_2'];
					$elecototal += $Electric_Charges_2 ;
					$SuiGas_Charges  = $data['SuiGas_Charges'];
					$suitotal += $SuiGas_Charges ;
					$Water_Tax1_Charges  = $data['Water_Tax1_Charges'];
					$w1total += $Water_Tax1_Charges ;
					$Water_Tax2_Charges  = $data['Water_Tax2_Charges'];
					$w2total += $Water_Tax2_Charges ;
					$Endovement_Fund  = $data['Endovement_Fund'];
					$endtotal += $Endovement_Fund ;
					$B_Fund  = $data['B_Fund'];
					$bfundtotal += $B_Fund ;
					$House_Build_Loan  = $data['House_Build_Loan'];
					$hbltotal += $House_Build_Loan ;
					$Convence_Loan  = $data['Convence_Loan'];
					$convtotal += $Convence_Loan ;
					$GP_Fund_Regular  = $data['GP_Fund_Regular'];
					$gpfrtotal +=  $GP_Fund_Regular;
					$GP_Fund_Advence  = $data['GP_Fund_Advence'];
					$gpfatotal += $GP_Fund_Advence ;
					$Eid_Advance  = $data['Eid_Advance'];
					$eidtotal += $Eid_Advance ;
					$Union_Fund_1  = $data['Union_Fund_1'];
					$uf1total += $Union_Fund_1 ;
					$Union_Fund_2  = $data['Union_Fund_2'];
					$uf2total += $Union_Fund_2;
					$Vehicle_Charges_Other  = $data['Vehicle_Charges_Other'];
					$vototal +=  $Vehicle_Charges_Other;
					$Vehicle_Charges_Teacher  = $data['Vehicle_Charges_Teacher'];
					$vttotal += $Vehicle_Charges_Teacher ;
					$Upkeep_Ded  = $data['Upkeep_Ded'];
					$uptotal += $Upkeep_Ded ;
					$R_Leave_Without_Pay  = $data['R_Leave_Without_Pay'];
					$rltotal += $R_Leave_Without_Pay ;
					$Recovery_Gap_CA  = $data['Recovery_Gap_CA'];
					$recototal += $Recovery_Gap_CA ;
					$Income_Tax  = $data['Income_Tax'];
					$inctotal += $Income_Tax ;
					$Group_Insurance  = $data['Group_Insurance'];
					$gitotal += $Group_Insurance ;
					$Other  = $data['Other'];
					$othtotal += $Other ;
					$Total_Deduction =  $data['totalDeduction'];
					$tdtotal += $Total_Deduction ;
					$netSalary = $data['Net_Salary'];
					$nettotal +=  $netSalary;
				}
				
				/*Populate Table*/
				{
					$templateProcessor->setValue('Hrent:1#'.$rowNo, $House_Rent_1);
					$templateProcessor->setValue('Hrent:2#'.$rowNo, $House_Rent_2);
					$templateProcessor->setValue('Elec:T#'.$rowNo, $Electric_Charges_1);
					$templateProcessor->setValue('Elec:O#'.$rowNo, $Electric_Charges_2);
					$templateProcessor->setValue('Sui#'.$rowNo, $SuiGas_Charges);
					$templateProcessor->setValue('wtax1#'.$rowNo, $Water_Tax1_Charges);
					$templateProcessor->setValue('wtax2#'.$rowNo, $Water_Tax2_Charges);
					$templateProcessor->setValue('end#'.$rowNo, $Endovement_Fund);
					$templateProcessor->setValue('bfund#'.$rowNo, $B_Fund);
					$templateProcessor->setValue('hbloan#'.$rowNo, $House_Build_Loan);
					$templateProcessor->setValue('conv#'.$rowNo, $Convence_Loan);
					$templateProcessor->setValue('gpfr#'.$rowNo, $GP_Fund_Regular);
					$templateProcessor->setValue('gpfa#'.$rowNo, $GP_Fund_Advence);
					$templateProcessor->setValue('eidadv#'.$rowNo, $Eid_Advance);
					$templateProcessor->setValue('unionf1#'.$rowNo, $Union_Fund_1);
					$templateProcessor->setValue('unionf2#'.$rowNo, $Union_Fund_2);
					$templateProcessor->setValue('vehicleO#'.$rowNo, $Vehicle_Charges_Other);
					$templateProcessor->setValue('vehicleT#'.$rowNo, $Vehicle_Charges_Teacher);
					$templateProcessor->setValue('upkeep#'.$rowNo, $Upkeep_Ded);
					$templateProcessor->setValue('rleave#'.$rowNo, $R_Leave_Without_Pay);
					$templateProcessor->setValue('recov#'.$rowNo, $Recovery_Gap_CA);
					$templateProcessor->setValue('income#'.$rowNo, $Income_Tax);
					$templateProcessor->setValue('ginsurance#'.$rowNo, $Group_Insurance);
					$templateProcessor->setValue('other#'.$rowNo, $Other);
					$templateProcessor->setValue('total#'.$rowNo, $Total_Deduction);
					$templateProcessor->setValue('net#'.$rowNo, $netSalary);
				}

			 $recordIndex++ ;
			 $rowNo++; 
			} /*End Of While Loop*/
			
			/* Total Calculation */
			{
				$templateProcessor->setValue('h1total', $h1total);
				$templateProcessor->setValue('h2total', $h2total);
				$templateProcessor->setValue('electtoal', $electtoal);
				$templateProcessor->setValue('elecototal', $elecototal);
				$templateProcessor->setValue('suitotal', $suitotal);
				$templateProcessor->setValue('w1total', $w1total);
				$templateProcessor->setValue('w2total', $w2total);
				$templateProcessor->setValue('endtotal', $endtotal);
				$templateProcessor->setValue('bfundtotal', $bfundtotal);
				$templateProcessor->setValue('hbltotal', $hbltotal);
				$templateProcessor->setValue('convtotal', $convtotal);
				$templateProcessor->setValue('gpfrtotal', $gpfrtotal);
				$templateProcessor->setValue('gpfatotal', $gpfatotal);
				$templateProcessor->setValue('eidtotal', $eidtotal);
				$templateProcessor->setValue('uf1total', $uf1total);
				$templateProcessor->setValue('uf2total', $uf2total);
				$templateProcessor->setValue('vototal', $vototal);
				$templateProcessor->setValue('vttotal', $vttotal);
				$templateProcessor->setValue('uptotal', $uptotal);
				$templateProcessor->setValue('rltotal', $rltotal);
				$templateProcessor->setValue('recototal', $recototal);
				$templateProcessor->setValue('inctotal', $inctotal);
				$templateProcessor->setValue('gitotal', $gitotal);
				$templateProcessor->setValue('othtotal', $othtotal);

				$templateProcessor->setValue('tdtotal', $tdtotal);
				$templateProcessor->setValue('nettotal', $nettotal);
			}
	
			/*Save File*/
			{
				$Current_Month = date('M-Y') ;
				$fixed = ($fix=='R') ? "Regular" : "Fixed" ;
				$templateProcessor->setValue('deptValue', $department);
				
				$templateProcessor->setValue('fixed', $fixed);
				$templateProcessor->setValue('payRollDate', $Current_Month);
				$fileName = $fixed."_deduction_view" ;
				

				header('Content-Type: application/octet-stream');
				header("Content-Disposition: attachment; filename=".$fileName.".docx");

				// $templateProcessor->saveAs('results/Sample_23_TemplateBlock.docx');
				$templateProcessor->saveAs('php://output');
			}
		}
		else{
			$errorMsg="Error: Server fault getting deduction_view resource. " . mysqli_error($conn);
		}

		@mysqli_free_result($queryResult);
		@mysqli_close($conn);
	}
	else{
		$errorMsg = $totalRecord['errorMsg'] ;
	}

}

@header('Location: '.$going_back . '?returnMsg='.urlencode($errorMsg) .'&Label='.urlencode($Label)  ) ;

?>
