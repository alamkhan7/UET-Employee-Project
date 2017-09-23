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
	
	$query = "SELECT * FROM allowance_teaching_view WHERE Department_ID='$deptID' AND Fix='$fix'";
	$totalRecord = return_total($query) ;

	if (empty($totalRecord['errorMsg']) ){

		$query = "SELECT * FROM allowance_teaching_view WHERE Department_ID='$deptID' AND Fix='$fix' ORDER BY BPS DESC";
		
		if ($queryResult = mysqli_query($conn, $query)) {
			
			/*Genereate Template*/
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/allowncesTemplate.docx');
			$templateProcessor->cloneRow('id', $totalRecord['totalRecord']);
			
			$department = "" ;
			$recordIndex = 0 ;
			$rowNo = 1 ;

			$btotal = 0 ;		$comptotal = 0 ;	$inttotal = 0 ;
			$ftotal = 0 ;		$pritotal = 0 ;		$spectotal = 0 ;
			$ptotal = 0 ;		$exttotal = 0 ;		$teactotal = 0 ;
			$h1total = 0 ;		$sentotal = 0 ;		$ordtotal = 0 ;
			$hstotal = 0 ;		$medtotal = 0 ;		$aratotal = 0 ;
			$convtotal = 0 ;	$enttotal = 0 ;		$bratotal = 0 ;
			$adhoctotal=0 ;  	$deantotal = 0 ;	$othtotal = 0 ;
			$grototal = 0;

			while ( $data = mysqli_fetch_assoc($queryResult) ) {

				/* Employee Personal Information */
				{
					$Employee_Code = $data['Employee_Code'];
		      		$Employee_Name = $data['Employee_Name'];
		      		$Account_No = $data['Account'];
		      		$BPS =$data['BPS'];
					$Fix = $data['Fix'];
					$Designation =  $data['Designation'];
					$department = $data['Department_Name'] ;
				}
				/* Allownces Information */
				{
					$Basic_Pay = $data['Basic_Pay'];
					$btotal += $Basic_Pay ;
					$Fixed_Pay = $data['Fixed_Pay'];
					$ftotal += $Fixed_Pay;
					$Personal_Pay = $data['Personal_Pay'];
					$ptotal += $Personal_Pay;
					$Hreant1_All = $data['Hreant1_All'];
					$h1total += $Hreant1_All;
					$Hrent_Sub_All = $data['Hrent_Sub_All'];
					$hstotal += $Hrent_Sub_All;
					$Convence_All = $data['Convence_All'];
					$convtotal += $Convence_All;
					$Adhoc_Rel_2010 = $data['Adhoc_Rel_2010'];
					$adhoctotal += $Adhoc_Rel_2010;
					$Computer_All = $data['Computer_All'];
					$comptotal += $Computer_All;
					$Private_All = $data['Private_All'];
					$pritotal += $Private_All;
					$Extra_All = $data['Extra_All'];
					$exttotal += $Extra_All;
					$Senior_p_All = $data['Senior_p_All'];
					$sentotal += $Senior_p_All;
					$Med_All = $data['Med_All'];
					$medtotal += $Med_All;
					$ENT_All = $data['ENT_All'];
					$enttotal += $ENT_All;
					$Dean_All = $data['Dean_All'];
					$deantotal += $Dean_All;
					$intgrated_All = $data['intgrated_All'];
					$inttotal += $intgrated_All;
					$Spec_Add_All = $data['Spec_Add_All'];
					$spectotal += $Spec_Add_All;
					$Teach_All = $data['Teach_All'];
					$teactotal += $Teach_All;
					$Orderly_All = $data['Orderly_All'];
					$ordtotal += $Orderly_All;
					$Oth_All = $data['Oth_All'];
					$othtotal += $Oth_All;
					$Brain_Drain = $data['Brain_Drain'];
					$bratotal += $Brain_Drain;
					$ARA_2016_10PERCENT = $data['ARA_2016_10PERCENT'];
					$aratotal += $ARA_2016_10PERCENT ;
					$Gross_Pay = $data['Gross_Pay'];
					$grototal += $Gross_Pay ;
				}

				// Populate Table
				{
					$templateProcessor->setValue('id#'.$rowNo, $Employee_Code);
					$templateProcessor->setValue('name#'.$rowNo, $Employee_Name);
					$templateProcessor->setValue('desig#'.$rowNo, $Designation);
					$templateProcessor->setValue('accno#'.$rowNo, $Account_No);
					$templateProcessor->setValue('bps#'.$rowNo, $BPS);
					$templateProcessor->setValue('fixed#'.$rowNo, $Fix);
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

			 $recordIndex++ ;
			 $rowNo++; 
			} /*End Of While Loop*/
			
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
				$fixed = ($fix=='R') ? "Regular" : "Fixed" ;
				$templateProcessor->setValue('deptValue', $department);
				
				$templateProcessor->setValue('fixed', $fixed);
				$templateProcessor->setValue('payRollDate', $Current_Month);
				$fileName = $fixed."_allownces_view" ;
				

				header('Content-Type: application/octet-stream');
				header("Content-Disposition: attachment; filename=".$fileName.".docx");

				// $templateProcessor->saveAs('results/Sample_23_TemplateBlock.docx');
				$templateProcessor->saveAs('php://output');
			}
		}
		else{
			$errorMsg="Error: Server fault getting allowance_view resource. " . mysqli_error($conn);
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