<?php 
require './form_validation_Function.php' ;

$form_error = "" ;
$going_back = "../add_emp.php";

if(isset($_POST['submit']) )
{
	$empName = $_POST['empname'] ;
	$empFather = $_POST['empfather'] ;
	$address = $_POST['address'] ;
	$cnic = $_POST['cnic'] ;
	$ntn = $_POST['ntn'] ;			// Optional
	$bps = $_POST['bps'] ;
	$fix = $_POST['fix'] ;
	$accNo = $_POST['accno'] ;
	$fixAmount = $_POST['fixamount'] ;
	$designation = $_POST['designation'] ;
	$position = $_POST['position'] ;
	$staff = $_POST['staff'] ;
	$qualification = $_POST['qualification'] ;
	$house = $_POST['house'] ;
	$vehicle = $_POST['vehicle'] ;
	$marital = $_POST['marital'] ;
	$date = $_POST['date'] ;

	$fields = array('empName' => $empName ,
					'empFather' => $empFather ,
					'address' => $address ,
					'cnic' => $cnic ,
					'ntn' => $ntn ,
					'bps' => $bps ,
					'fix' => $fix ,
					'accNo' => $accNo ,
					'fixAmount' => $fixAmount ,
					'designation' => $designation ,
					'position' => $position ,
					'staff' => $staff ,
					'qualification' => $qualification ,
					'house' => $house ,
					'vehicle' => $vehicle ,
					'marital' => $marital ,
					'date' => $date
					 );

	// Employee Name Validation
	if (is_empty(trim($empName))){
		$form_error = "This is a required field." ;
	}
	else if (contains_numbers(trim($empName))){
		$form_error = "Error: Name should contain only alphabets." ;
	}
	else if (contains_punctuations(trim($empName))){
		$form_error = "Error: Name should contain only alphabets." ;
	}

	
	
	
	echo $accNo ;
	// Account Number and fixAmount Validation
	if (trim($fix)!='n'){
		// for Account number
		if (is_empty(trim($accNo))){
			$form_error = "This is a required field." ;
			header('Location: '.$going_back.'?accno_error='. urlencode($form_error));
		}

	}
	else{
		if (is_empty(trim($fixAmount))){
			$form_error = "This is a required field." ;
			header('Location: '.$going_back.'?fixamt_error='. urlencode($form_error));
		}
	}

	// BPS Validation
	
	if (trim($bps)<1 || trim($bps)>22){
		$form_error = "Error: BPS range 1-22." ;
		header('Location: '.$going_back.'?bps_error='. urlencode($form_error));
	}
	if (is_empty(trim($bps))){
		$form_error = "This is a required field." ;
		header('Location: '.$going_back.'?bps_error='. urlencode($form_error));
	}
	// CNIC and NTN validation
	if (contains_characters(trim($ntn))){
		$form_error = "Error: NTN should contain only numbers." ;
		header('Location: '.$going_back.'?ntn_error='. urlencode($form_error));
	}
	if (contains_characters(trim($cnic))){
		$form_error = "Error: CNIC should contain only numbers." ;
		header('Location: '.$going_back.'?cnic_error='. urlencode($form_error));
	}
	if (is_empty(trim($cnic))){
		$form_error = "This is a required field." ;
		header('Location: '.$going_back.'?cnic_error='. urlencode($form_error));
	}
	// Address validation
	if (is_empty(trim($address))){
		$form_error = "This is a required field." ;
		header('Location: '.$going_back.'?add_error='. urlencode($form_error));
	}
	// Father name validation
	if (contains_punctuations(trim($empFather))){
		$form_error = "Error: Name should contain only alphabets." ;
		header('Location: '.$going_back.'?fname_error='. urlencode($form_error));
	}
	if (contains_numbers(trim($empFather))){
		$form_error = "Error: Name should contain only alphabets." ;
		header('Location: '.$going_back.'?fname_error='. urlencode($form_error));
	}
	if (is_empty(trim($empFather))){
		$form_error = "This is a required field." ;
		header('Location: '.$going_back.'?fname_error='. urlencode($form_error));
	}
	
	
	
	
	
	
	
	
	

	// echo "<br>" + $empFather ;
	// echo "<br>" + $address ;
	// echo "<br>" + $cnic ;
	// echo "<br>" + $ntn ;
	// echo "<br>" + $bps ;
	// echo "<br>" + $fix ;
	// echo "<br>" + $accNo ;
	// echo "<br>" + $fixAmount ;
	// echo "<br>" + $designation ;
	// echo "<br>" + $position ;
	// echo "<br>" + $staff ;
	// echo "<br>" + $qualification ;
	// echo "<br>" + $house ;
	// echo "<br>" + $vehicle ;
 // 	echo "<br>" + $marital ;
	// echo "<br>" + $date ;

}


// return back to form(add_emp.php) page if error 
// encode string for url
?>