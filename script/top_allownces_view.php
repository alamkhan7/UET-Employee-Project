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

	$query= select_query_for_top_allownces_view($campID,$fix,$staff) ;
	$totalRecord = return_total($query) ;

	if ( empty($totalRecord['errorMsg']) ){

		if ($result = mysqli_query($conn, $query)) {
                
            /*Genereate Template*/
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/TopViewAllowncesTemplate.docx');
			$templateProcessor->cloneRow('dept', $totalRecord['totalRecord']);

			$btotal = 0 ;		$comptotal = 0 ;	$inttotal = 0 ;
			$ftotal = 0 ;		$pritotal = 0 ;		$spectotal = 0 ;
			$ptotal = 0 ;		$exttotal = 0 ;		$teactotal = 0 ;
			$h1total = 0 ;		$sentotal = 0 ;		$ordtotal = 0 ;
			$hstotal = 0 ;		$medtotal = 0 ;		$aratotal = 0 ;
			$convtotal = 0 ;	$enttotal = 0 ;		$bratotal = 0 ;
			$adhoctotal=0 ;  	$deantotal = 0 ;	$othtotal = 0 ;
			$grototal = 0;
                
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
					
					$Basic_Pay = $record['Basic_Pay'];
					$btotal += $Basic_Pay ;
					$Fixed_Pay = $record['Fixed_Pay'];
					$ftotal += $Fixed_Pay;
					$Personal_Pay = $record['Personal_Pay'];
					$ptotal += $Personal_Pay;
					$Hreant1_All = $record['Hreant1_All'];
					$h1total += $Hreant1_All;
					$Hrent_Sub_All = $record['Hrent_Sub_All'];
					$hstotal += $Hrent_Sub_All;
					$Convence_All = $record['Convence_All'];
					$convtotal += $Convence_All;
					$Adhoc_Rel_2010 = $record['Adhoc_Rel_2010'];
					$adhoctotal += $Adhoc_Rel_2010;
					$Computer_All = $record['Computer_All'];
					$comptotal += $Computer_All;
					$Private_All = $record['Private_All'];
					$pritotal += $Private_All;
					$Extra_All = $record['Extra_All'];
					$exttotal += $Extra_All;
					$Senior_p_All = $record['Senior_p_All'];
					$sentotal += $Senior_p_All;
					$Med_All = $record['Med_All'];
					$medtotal += $Med_All;
					$ENT_All = $record['ENT_All'];
					$enttotal += $ENT_All;
					$Dean_All = $record['Dean_All'];
					$deantotal += $Dean_All;
					$intgrated_All = $record['intgrated_All'];
					$inttotal += $intgrated_All;
					$Spec_Add_All = $record['Spec_Add_All'];
					$spectotal += $Spec_Add_All;
					$Teach_All = $record['Teach_All'];
					$teactotal += $Teach_All;
					$Orderly_All = $record['Orderly_All'];
					$ordtotal += $Orderly_All;
					$Oth_All = $record['Oth_All'];
					$othtotal += $Oth_All;
					$Brain_Drain = $record['Brain_Drain'];
					$bratotal += $Brain_Drain;
					$ARA_2016_10PERCENT = $record['ARA_2016_10PERCENT'];
					$aratotal += $ARA_2016_10PERCENT ;
					$Gross_Pay = $record['Gross_pay'];
					$grototal+=$Gross_Pay ;
				}

				/*Populate Table*/
				{
					$templateProcessor->setValue('dept#'.$rowNo, $department);
					$templateProcessor->setValue('bpay#'.$rowNo, $Basic_Pay);
					$templateProcessor->setValue('fpay#'.$rowNo, $Fixed_Pay);
					$templateProcessor->setValue('ppay#'.$rowNo, $Personal_Pay);
					$templateProcessor->setValue('hrent1#'.$rowNo, $Hreant1_All);
					$templateProcessor->setValue('hrentsub#'.$rowNo, $Hrent_Sub_All);
					$templateProcessor->setValue('conv#'.$rowNo, $Convence_All);
					$templateProcessor->setValue('adhoc#'.$rowNo, $Adhoc_Rel_2010);
					$templateProcessor->setValue('computer#'.$rowNo, $Computer_All);
					$templateProcessor->setValue('private#'.$rowNo, $Private_All);
					$templateProcessor->setValue('extra#'.$rowNo, $Extra_All);
					$templateProcessor->setValue('senior#'.$rowNo, $Senior_p_All);
					$templateProcessor->setValue('medical#'.$rowNo, $Med_All);
					$templateProcessor->setValue('ent#'.$rowNo, $ENT_All);
					$templateProcessor->setValue('dean#'.$rowNo, $Dean_All);
					$templateProcessor->setValue('integ#'.$rowNo, $intgrated_All);
					$templateProcessor->setValue('spec#'.$rowNo, $Spec_Add_All);
					$templateProcessor->setValue('teach#'.$rowNo, $Teach_All);
					$templateProcessor->setValue('orderly#'.$rowNo, $Orderly_All);
					$templateProcessor->setValue('ara#'.$rowNo, $ARA_2016_10PERCENT);
					$templateProcessor->setValue('brain#'.$rowNo, $Brain_Drain);
					$templateProcessor->setValue('other#'.$rowNo, $Oth_All);
					$templateProcessor->setValue('gross#'.$rowNo, $Gross_Pay);	
				}

				$rowNo++;
            }

            /* Grand Total */
            {
				$templateProcessor->setValue('btotal',$btotal);
				$templateProcessor->setValue('ftotal',$ftotal);
				$templateProcessor->setValue('ptotal',$ptotal);
				$templateProcessor->setValue('h1total',$h1total);
				$templateProcessor->setValue('hstotal',$hstotal);
				$templateProcessor->setValue('convtotal',$convtotal);
				$templateProcessor->setValue('adhoctotal',$adhoctotal);
				$templateProcessor->setValue('comptotal',$comptotal);
				$templateProcessor->setValue('pritotal',$pritotal);
				$templateProcessor->setValue('exttotal',$exttotal);
				$templateProcessor->setValue('sentotal',$sentotal);
				$templateProcessor->setValue('medtotal',$medtotal);
				$templateProcessor->setValue('enttotal',$enttotal);
				$templateProcessor->setValue('deantotal',$deantotal);
				$templateProcessor->setValue('inttotal',$inttotal);
				$templateProcessor->setValue('spectotal',$spectotal);
				$templateProcessor->setValue('teactotal',$teactotal);
				$templateProcessor->setValue('ordtotal',$ordtotal);
				$templateProcessor->setValue('aratotal',$aratotal);
				$templateProcessor->setValue('bratotal',$bratotal);
				$templateProcessor->setValue('othtotal',$othtotal);
				$templateProcessor->setValue('grototal',$grototal);
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
				

				$fileName = "Top_".$fix."_Allownces_view" ;
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