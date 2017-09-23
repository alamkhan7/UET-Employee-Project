<?php

include_once dirname(__FILE__).'/Connection.php' ;
include_once dirname(__FILE__).'/function_inc.php' ;

echo "<pre>";
print_r($_POST);
echo "<pre>";

$going_back = '../add_emp.php' ;
$returnMsg = '';
$Label = '' ;

if (isset($_POST['submit-button']))
{
    /* Form Validation */
    $returnMsg = employee_personal_info_validation($_POST);

    if (empty($returnMsg)){

        $Employee_Code = $_POST['empcode'];
        $Employee_Name = trim($_POST['empname']);   // trim() if they only contain spaces
        $Father_Name = trim($_POST['empfather']);
        $CNIC = trim($_POST['cnic']);
        $Address = trim($_POST['address']);
        $Email = trim($_POST['email']) ;
        $Account_No = trim($_POST['accno']);
        $Account_No = (empty($Account_No)) ? "By Cash" : $Account_No ;
        $NTN = trim($_POST['ntn']);           // Optional
        $BPS = $_POST['bps'];
        $Fix = $_POST['fix'];
        $Designation_ID = (INT) $_POST['designation'];
        $Campus_ID = (INT) $_POST['campus'];

        $Staff = $_POST['staff'];
        if ($Staff=='T'){
        	$DPT_or_SEC_ID = $_POST['department'];
        	$Admin_Position = $_POST['position'];
        	$Qualification_ID = (int) $_POST['qualification'];
        }
        else if($Staff=='N'){
        	$DPT_or_SEC_ID = $_POST['section'];
        	$Admin_Position = "None";
        	$Qualification_ID = 0;
        }
        else{
        	$DPT_or_SEC_ID = $_POST['departmentother'];
        	$Admin_Position = "None";
        	$Qualification_ID = 0;
        }
        
        
        $House = (boolean) $_POST['house'];
        $Vehicle = (boolean) $_POST['vehicle'];
        $Marital_Status = (boolean) $_POST['marital'];

        /* Convert 28/5/2015 -> 2015-5-28 */
        $Join_Date = implode("-" , array_reverse(explode("/",$_POST['date'])));

    	
        $CNIC = (string) $CNIC ;
        $Email = (string) $Email;
        $NTN = (string) $NTN ;
        $Account_No = (string) $Account_No ;
        $DPT_or_SEC_ID = (INT)$DPT_or_SEC_ID;

        /* Add Data to database*/
        $Query = "CALL add_employee('$Employee_Code','$Employee_Name', '$Father_Name', '$BPS', '$CNIC', '$Address', '$Email', '$NTN', '$Fix', '$Staff','$Qualification_ID','$Admin_Position', '$House', '$Vehicle', '$Marital_Status', '$Join_Date','$Account_No', '$DPT_or_SEC_ID', '$Designation_ID','$Campus_ID')";

        $Result=mysqli_query($conn,$Query);
        
        if(!$Result){
            $returnMsg = ("Sorry! Server Fault: ". mysqli_error($conn));
        }
        else{
            $returnMsg = 'Employee Registration Successful.' ;
            $Label='alert-success';
        }

        @mysqli_free_result($Result);
        @mysqli_close($conn) ;
    }
    
    
}


header('Location: '.$going_back . '?returnMsg='.urlencode($returnMsg) .'&Label='.urlencode($Label)  ) ;

?>