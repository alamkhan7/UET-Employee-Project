<?php 
require_once dirname(__FILE__).'/function_inc.php' ;
require_once dirname(__FILE__).'/Connection.php';
require_once dirname(__FILE__).'/vendor/autoload.php';

date_default_timezone_set('Asia/Karachi');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$going_back = "../view1.php"; 
$errorMsg = "" ;
$Label = '' ;

$campID = $_POST['campus'] ;
$fix = $_POST['fix'] ;
$staff = $_POST['staff'] ;

if( isset($_POST['view-button']) && !empty($campID) && !empty($fix) && !empty($staff) ){

	$query= select_query_for_top_deduction_view($campID,$fix,$staff) ;
	$totalRecord = return_total($query) ;

	if ( empty($totalRecord['errorMsg']) ){

		if ($result = mysqli_query($conn, $query)) {
                
            /*Genereate Template*/
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/TopViewDeductionTemplate.docx');
			$templateProcessor->cloneRow('Hrent:1', $totalRecord['totalRecord']);

			$h1total = 0 ;		$bfundtotal = 0 ;	$vttotal = 0 ;		
			$h2total = 0 ;		$hbltotal = 0 ;		$uptotal = 0 ;		
			$electtoal = 0 ;	$convtotal = 0 ;	$rltotal = 0 ;		
			$elecototal = 0 ;	$gpfrtotal = 0 ;	$recototal = 0 ;		
			$suitotal = 0 ;		$gpfatotal = 0;		$inctotal = 0 ;
			$w1total = 0 ;		$eidtotal = 0 ;		$gitotal = 0 ;	
			$w2total = 0 ;		$uf1total = 0 ;		$othtotal = 0 ;	
			$endtotal = 0 ;		$uf2total = 0 ;		$netPay = 0;
			$vototal = 0 ;		$Grand_Total = 0 ;	$netPay_Total = 0;
                
            $rowNo=1;
            while($record=mysqli_fetch_assoc($result)){

            	/* Allownces Information */
				{
					$campus = $record['campus'];
					
					if ($staff=='N'){
					$department = $record['section_name'];
					}
					else{
					$department = $record['department_name'];
					}

					$House_Rent_1  = $record['House_Rent_1'];
					$h1total += $House_Rent_1;
					$House_Rent_2  = $record['House_Rent_2'];
					$h2total += $House_Rent_2;
					$Electric_Charges_1  = $record['Electric_Charges_1'];
					$electtoal += $Electric_Charges_1;
					$Electric_Charges_2  = $record['Electric_Charges_2'];
					$elecototal += $Electric_Charges_2 ;
					$SuiGas_Charges  = $record['SuiGas_Charges'];
					$suitotal += $SuiGas_Charges ;
					$Water_Tax1_Charges  = $record['Water_Tax1_Charges'];
					$w1total += $Water_Tax1_Charges ;
					$Water_Tax2_Charges  = $record['Water_Tax2_Charges'];
					$w2total += $Water_Tax2_Charges ;
					$Endovement_Fund  = $record['Endovement_Fund'];
					$endtotal += $Endovement_Fund ;
					$B_Fund  = $record['B_Fund'];
					$bfundtotal += $B_Fund ;
					$House_Build_Loan  = $record['House_Build_Loan'];
					$hbltotal += $House_Build_Loan ;
					$Convence_Loan  = $record['Convence_Loan'];
					$convtotal += $Convence_Loan ;
					$GP_Fund_Regular  = $record['GP_Fund_Regular'];
					$gpfrtotal +=  $GP_Fund_Regular;
					$GP_Fund_Advence  = $record['GP_Fund_Advence'];
					$gpfatotal += $GP_Fund_Advence ;
					$Eid_Advance  = $record['Eid_Advance'];
					$eidtotal += $Eid_Advance ;
					$Union_Fund_1  = $record['Union_Fund_1'];
					$uf1total += $Union_Fund_1 ;
					$Union_Fund_2  = $record['Union_Fund_2'];
					$uf2total += $Union_Fund_2;
					$Vehicle_Charges_Other  = $record['Vehicle_Charges_Other'];
					$vototal +=  $Vehicle_Charges_Other;
					$Vehicle_Charges_Teacher  = $record['Vehicle_Charges_Teacher'];
					$vttotal += $Vehicle_Charges_Teacher ;
					$Upkeep_Ded  = $record['Upkeep_Ded'];
					$uptotal += $Upkeep_Ded ;
					$R_Leave_Without_Pay  = $record['R_Leave_Without_Pay'];
					$rltotal += $R_Leave_Without_Pay ;
					$Recovery_Gap_CA  = $record['Recovery_Gap_CA'];
					$recototal += $Recovery_Gap_CA ;
					$Income_Tax  = $record['Income_Tax'];
					$inctotal += $Income_Tax ;
					$Group_Insurance  = $record['Group_Insurance'];
					$gitotal += $Group_Insurance ;
					$Other  = $record['Other'];
					$othtotal += $Other ;
					$Total_Deduction = $record['totalDeduction'];
					$Grand_Total+=$Total_Deduction ;
					$netPay = $record['Net_Salary'];
					$netPay_Total += $netPay; 
					
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
					$templateProcessor->setValue('netpay#'.$rowNo, $netPay);
				}

				$rowNo++;
            }

            /* Grand Total */
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
				$templateProcessor->setValue('grandtotal', $Grand_Total);
				$templateProcessor->setValue('netpaytotal', $netPay_Total);
			}
                
            /*Save File*/
			{
				$Current_Month = date('M-Y') ;
				
				if ($fix == 'R'){$fix='Regular';}
				elseif ($fix == 'F'){$fix='Fixed';}
				

				if ($staff == 'T'){$staff='Teaching';}
				elseif ($staff == 'N'){$staff='Non-Teaching';}
				else{$staff='Neb-Qasid';}

				$templateProcessor->setValue('campus', $campus);
				$templateProcessor->setValue('fixed', $fix);
				$templateProcessor->setValue('staff', $staff);
				$templateProcessor->setValue('payRollDate', $Current_Month);
				

				$fileName = "Top_".$fix."_Deduction_view" ;
				header('Content-Type: application/octet-stream');
				header("Content-Disposition: attachment; filename=".$fileName.".docx");

				// $templateProcessor->saveAs('results/Sample_23_TemplateBlock.docx');
				$templateProcessor->saveAs('php://output');
			}

        }
        else{
            $errorMsg = "Server Fault:".mysqli_error($conn) ;
        }

        @mysqli_free_result($result);
        @mysqli_close($conn);

	}
	else{
		$errorMsg = $totalRecord['errorMsg'] ;
	}
}

@header('Location: '.$going_back . '?returnMsg='.urlencode($errorMsg) .'&Label='.urlencode($Label)  ) ;


?>