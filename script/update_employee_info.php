<?php

include_once dirname(__FILE__).'/Connection.php';
include_once dirname(__FILE__).'/function_inc.php';
require_once 'vendor/autoload.php';

$going_back = "../update1.php" ;
$returnMsg = '';
$Label = '' ;

$code = (int) mysqli_real_escape_string($conn,$_POST['empcode']);

// echo "<pre>";
// print_r($_POST);
// echo "<pre>";

/* Updated Employee Information */
if ( isset($_POST['Update_Button']) && !empty($code) ){

  /* Verify Employee Personal Information */
  $returnMsg = employee_personal_info_validation($_POST) ;
  /* Verify Allownces Information */
  if (empty($returnMsg)){
    $returnMsg = allownces_validation($_POST) ;
  }
  /* Verify Deduction Information */
  if (empty($returnMsg)){
    $returnMsg = deduction_validation($_POST) ;
  }

  /* ---------------------------------------------------------------------------------------- */

  /* If All Field is Valid then update */
  if (empty($returnMsg)){
    /* Employee Info */
    $Employee_Code = $_POST['empcode'];
    $Employee_Name = trim($_POST['empname']);
    $Father_Name = trim($_POST['empfather']);
    $CNIC = trim($_POST['cnic']);
    $Address = trim($_POST['address']);
    $Email = trim($_POST['email']) ;
    $NTN = trim($_POST['ntn']);
    $Fix = $_POST['fix'];
    $Account_No = trim($_POST['accno']);
    $Account_No = (empty($Account_No)) ? "By Cash" : $Account_No ; 
    $BPS = (int) $_POST['bps'];
    $Designation_ID = (INT) $_POST['designation'];
    $Campus_ID = (INT) $_POST['campus']; 

    $Staff = $_POST['staff'];
    $Join_Date = $_POST['date'];

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
    $CNIC = (string) $CNIC ;
    $Email = (string) $Email;
    $NTN = (string) $NTN ;
    $Account_No = (string) $Account_No ;
    $DPT_or_SEC_ID = (INT)$DPT_or_SEC_ID;

    /*Its just temporary if employee change department or section or department other*/
    $department = $_POST['department'];
    $departmentother = $_POST['departmentother'];
    $section = $_POST['section'];


    /* Allowance Attached with this Specefic Employee */       
    $Basic_Pay     = (float) $_POST['bpay'];
    $Fixed_Pay     = (float) $_POST['fpay'];
    $Personal_Pay  = (float) $_POST['ppay'];
    $Hreant1_All   = (float) $_POST['hreall'];
    $Hrent_Sub_All = (float) $_POST['hresuball'];
    $Convence_All  = (float) $_POST['conall'];
    $Adhoc_Rel_2010= (float) $_POST['adhrel'];
    $Computer_All  = (float) $_POST['compall'];

    $Private_All   = (float) $_POST['priall']; 
    $Extra_All     = (float) $_POST['extall'];
    $Senior_p_All  = (float) $_POST['senall']; 
    $Med_All       = (float) $_POST['medall'];
    $ENT_All       = (float) $_POST['entall']; 
    $Dean_All      = (float) $_POST['deanall']; 
    $intgrated_All = (float) $_POST['integ']; 
    $Spec_Add_All  = (float) $_POST['specadd']; 
    $Teach_All     = (float) $_POST['tech'];
    $Orderly_All   = (float) $_POST['ordall'];
    $Oth_All       = (float) $_POST['othall']; 
    $Brain_Drain   = (float) $_POST['Brain_Drain'];
    $ARA_2016_10PERCENT = (float) $_POST['ARA2016']; 

    

    /* Deductions Attached with this Specefic Employee */  
    $House_Rent_1  = (float) $_POST['House_1'];
    $House_Rent_2  = (float) $_POST['House_2'];
    $Electric_Charges_1  = (float) $_POST['elec_1'];
    $Electric_Charges_2  = (float) $_POST['elec_2'];
    $SuiGas_Charges  = (float) $_POST['gasded'];
    $Water_Tax1_Charges  = (float) $_POST['water1'];
    $Water_Tax2_Charges  = (float) $_POST['water2'];
    $Endovement_Fund  = (float) $_POST['endded'];
    $B_Fund  = (float) $_POST['bfundded'];
    $House_Build_Loan  = (float) $_POST['HouseBuild'];
    $Convence_Loan  = (float) $_POST['convded'];
    $GP_Fund_Regular  = (float) $_POST['gpfrded'];
    $GP_Fund_Advence  = (float) $_POST['gpfaded'];
    $Eid_Advance  = (float) $_POST['eidded'];
    $Union_Fund_1  = (float) $_POST['ufund1'];
    $Union_Fund_2  = (float) $_POST['ufund2'];
    $Vehicle_Charges_Other  = (float) $_POST['vehded'];
    $Vehicle_Charges_Teacher  = (float) $_POST['tvehded'];
    $Upkeep_Ded  = (float) $_POST['upkeepded'];
    $R_Leave_Without_Pay  = (float) $_POST['leavded'];
    $Recovery_Gap_CA  = (float) $_POST['recovded'];
    $Income_Tax  = (float) $_POST['itexded'];
    $Group_Insurance  = (float) $_POST['ginsded'];
    $Other  = (float) $_POST['oth1ded'];

    /* If Employee Personal Information Changed other then allownces table or deduction then update whole allownces and dedudtion update from start */
    if($BPS!=return_old_bps($Employee_Code) || $Designation_ID!= return_old_designation($Employee_Code) || $Qualification_ID!=return_old_qualification($Employee_Code) || $Marital_Status!=return_old_marital_status($Employee_Code) || $House!=return_old_house($Employee_Code) || $Vehicle!=return_old_vehicle($Employee_Code) || $Campus_ID!=return_old_campus($Employee_Code) || $Admin_Position!=return_old_admin_position($Employee_Code) || $Staff!=return_old_staff($Employee_Code)
      || $department!=return_old_department($Employee_Code) || $departmentother!=return_old_department_other($Employee_Code)
      || $section!=return_old_section($Employee_Code)  ){
      
        $Query = "CALL update_employee('$Employee_Code','$Employee_Name', '$Father_Name', '$BPS', '$CNIC', '$Address', '$Email', '$NTN', '$Fix', '$Staff','$Qualification_ID','$Admin_Position', '$House', '$Vehicle', '$Marital_Status', '$Join_Date','$Account_No', '$DPT_or_SEC_ID', '$Designation_ID','$Campus_ID')";

        $Result=mysqli_query($conn,$Query);
        
        if(!$Result){
            $returnMsg = ("Sorry! Server Fault Update Failed: ". mysqli_error($conn));
        }

        @mysqli_free_result($Result);
    }
    else {
      /*  UPDATE EMPLOYEE Perosonal/Job Information */
      $Employee_Query = "UPDATE Employee 
                                SET Employee_Name='$Employee_Name',
                                    Father_Name  = '$Father_Name',
                                    CNIC = '$CNIC',
                                    Address = '$Address',
                                    Email = '$Email',
                                    NTN = '$NTN',
                                    Fix = '$Fix',
                                    Join_Date = '$Join_Date',
                                    Account = '$Account_No'
                                WHERE Employee_Code='$Employee_Code';
                                ";

      if ( !$Employee_Query_Result = mysqli_query($conn,$Employee_Query)){  
        /* Some Server Fault Error */
        $returnMsg = ("Sorry! Server Fault Update Failed Employee Perosonal Record: ". mysqli_error($conn));
      }
      @mysqli_free_result($Employee_Query_Result);


      /* Update Allowances Attached with this Specfic Employee */
      if (empty($returnMsg)){
        /* If Employee Table update successfully then update Allownces Table */
        $Allowance_Query = "UPDATE Allowance 
                              SET Basic_Pay='$Basic_Pay',
                                  Fixed_Pay  = '$Fixed_Pay',
                                  Personal_Pay = '$Personal_Pay',
                                  Hreant1_All = '$Hreant1_All',
                                  Hrent_Sub_All = '$Hrent_Sub_All',
                                  Convence_All = '$Convence_All',
                                  Adhoc_Rel_2010 = '$Adhoc_Rel_2010',
                                  Computer_All = '$Computer_All',
                                  Private_All = '$Private_All',
                                  Extra_All = '$Extra_All',
                                  Senior_p_All = '$Senior_p_All',
                                  Med_All = '$Med_All',
                                  ENT_All = '$ENT_All',
                                  Dean_All = '$Dean_All',
                                  intgrated_All = '$intgrated_All',
                                  Spec_Add_All = '$Spec_Add_All',
                                  Teach_All = '$Teach_All',
                                  Orderly_All = '$Orderly_All',
                                  Oth_All = '$Oth_All',
                                  Brain_Drain = '$Brain_Drain',
                                  ARA_2016_10PERCENT = '$ARA_2016_10PERCENT'
                                  
                              WHERE Employee_Code='$Employee_Code';
                              ";
        if ( !$Allowance_Query_Result = mysqli_query($conn,$Allowance_Query)){
          /* Some Server Fault Error */
          $returnMsg = ("Sorry! Server Fault Update Failed Allowance Record: ". mysqli_error($conn));
        }
        @mysqli_free_result($Allowance_Query_Result);
      }
      
      /* Update Deduction Attached with this Specfic Employee */
      if (empty($returnMsg)){
        /* If Allownces Table update successfully then update Deduction Table */
        $Deduction_Query = "UPDATE Deduction 
                             SET  House_Rent_1           = '$House_Rent_1',
                                  House_Rent_2           = '$House_Rent_2',
                                  Electric_Charges_1     = '$Electric_Charges_1',
                                  Electric_Charges_2     = '$Electric_Charges_2',
                                  SuiGas_Charges         = '$SuiGas_Charges',
                                  Water_Tax1_Charges     = '$Water_Tax1_Charges',
                                  Water_Tax2_Charges     = '$Water_Tax2_Charges',
                                  Endovement_Fund        = '$Endovement_Fund',
                                  B_Fund                 = '$B_Fund',   
                                  House_Build_Loan       = '$House_Build_Loan',
                                  Convence_Loan          = '$Convence_Loan',
                                  GP_Fund_Regular        = '$GP_Fund_Regular',
                                  GP_Fund_Advence        = '$GP_Fund_Advence',
                                  Eid_Advance            = '$Eid_Advance',
                                  Union_Fund_1           = '$Union_Fund_1',
                                  Union_Fund_2           = '$Union_Fund_2',
                                  Vehicle_Charges_Other  = '$Vehicle_Charges_Other',
                                  Vehicle_Charges_Teacher= '$Vehicle_Charges_Teacher',
                                  Upkeep_Ded             = '$Upkeep_Ded',
                                  R_Leave_Without_Pay    = '$R_Leave_Without_Pay',
                                  Recovery_Gap_CA        = '$Recovery_Gap_CA',
                                  Income_Tax             = '$Income_Tax',
                                  Group_Insurance        = '$Group_Insurance',
                                  Other                  = '$Other'
                                  
                              WHERE Employee_Code='$Employee_Code';
                              ";
        if ( !$Deduction_Query_Result = mysqli_query($conn,$Deduction_Query)){                           
            $returnMsg = ("Sorry! Server Fault Update Failed Deduction Record:". mysqli_error($conn));
        }
        @mysqli_free_result($Deduction_Query_Result);
      }

    } /*End Of else*/
  }
  
  if(empty($returnMsg)){
    /*If All Update Successful*/
    $returnMsg = "<br>Update Successful!.</br>" ;
    $Label='alert-success';
  }
}

/* Generate Salary */
if ( isset($_POST['Generate']) && !empty($code) ){

  $ID = $_POST['empcode'];
  
  $Query = "CALL generate_salary('$ID')";

  $Result=mysqli_query($conn,$Query);
      
    if($Result){
      $returnMsg = "Generate Successful.";
        $Label='alert-success';
    }
    else{
      $returnMsg = ("Sorry! Server Fault Generate Salary: ". mysqli_error($conn));
    }

    @mysqli_free_result($Result);
}

/*Generate Word File*/
if ( isset($_POST['GenerateWord']) && !empty($code) ){
  
  $returnMsg = generate_word($code) ; 
}

/* Delete Employee Information*/
if (isset($_POST['Delete_Button']) && !empty($code)){

  $ID = $_POST['empcode'];
  
  $Query = "CALL delete_employee('$ID')";

  $Result=mysqli_query($conn,$Query);
      
  if($Result){
      $returnMsg = "Employee Deleted Successful.";
      $Label='alert-success';
  }
  else{
    $returnMsg = ("Sorry! Server Fault Delete Failed: ". mysqli_error($conn));
  }

  @mysqli_free_result($Result);

}

@mysqli_close($conn);

/*Return Back*/
if (empty($returnMsg)){
  $returnMsg = "Please enter ID/Name.";
}
@header('Location: '.$going_back . '?returnMsg='.urlencode($returnMsg) .'&Label='.urlencode($Label)  ) ;

?>