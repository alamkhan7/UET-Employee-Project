<?php
/* Return Employee Information */

require_once dirname(__FILE__).'/Connection.php';
require_once dirname(__FILE__).'/function_inc.php' ;

date_default_timezone_set('Asia/Karachi');

// echo "<pre>";
// print_r($_SERVER) ;
// echo "</pre>";

$going_back = "./update1.php" ;
$Label = '' ;
$errorMsg = '' ;
$Department = '' ;
$Qualification = '' ;
$Admin_Position = '' ;
$Section = '' ;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && !empty($_POST['code']) )
{
  $code = (int) mysqli_real_escape_string($conn,$_POST['code']);

  /*First check record exist or not*/
  $query = "SELECT * FROM Employee WHERE Employee_Code ='$code' " ;
  $result = return_total($query) ;

  if (empty($result['errorMsg'])){

      

    /*Check employee type i.e teach,non-teach or neb-qasid*/
    $empRow = emp_resource($code) ;
    if (empty($empRow['errorMsg'])){

      /*Now select it's corresponding view query*/
      if ($empRow['row']['Staff']=='T'){
        $Employee_Query = "SELECT * FROM `employee_teaching_view` WHERE Employee_Code='$code'";
      }
      elseif ($empRow['row']['Staff']=='N') {
        $Employee_Query = "SELECT * FROM `employee_non_teaching_view` WHERE Employee_Code='$code'";
      }
      else{
        $Employee_Query = "SELECT * FROM `employee_nebqasid_view` WHERE Employee_Code='$code'";
      }

      $Designation_ID = $empRow['row']['Designation_ID'] ;
      $Campus_ID = $empRow['row']['Campus_ID'] ;

      if ($Employee_Query_Result = mysqli_query($conn,$Employee_Query)){
    
        {
          $Employee_Row = mysqli_fetch_assoc($Employee_Query_Result);

          $Employee_Code = $Employee_Row['Employee_Code'];
          $Employee_Name = $Employee_Row['Employee_Name'];
          $Father_Name = $Employee_Row['Father_Name'];
          $BPS =$Employee_Row['BPS'];
          $CNIC = $Employee_Row['CNIC'];
          $Address = $Employee_Row['Address'];
          $Email = $Employee_Row['Email'];
          $NTN = $Employee_Row['NTN'];
          $Account_No = $Employee_Row['Account'];
          $Fix = $Employee_Row['Fix'];
          $Staff = $Employee_Row['Staff'];
          
          $House = $Employee_Row['House'];
          $Vehicle = $Employee_Row['vehicle'];
          $Marital_Status = $Employee_Row['Marital_Status'];
          $Designation = $Employee_Row['Designation'];
          $Campus = $Employee_Row['Campus'];


          $Join_Date = $Employee_Row['Join_Date'];
          $Current_Month = date('M-Y') ;

          if ($empRow['row']['Staff']=='T'){
            $Department = $Employee_Row['Department_Name'];
            $Qualification = $Employee_Row['Qualification'];
            $Admin_Position = $Employee_Row['Admin_Position'];
            $Section = "NULL" ;
          }
          elseif ($empRow['row']['Staff']=='N'){
            $Section = $Employee_Row['Section_Name'];
            $Department = "NULL" ;
            $Qualification = "NULL" ;
            $Admin_Position = "NULL" ;
          }
          else{
            $Department = $Employee_Row['Department_Name'];
            $Section = "NULL" ;
            $Qualification = "NULL" ;
            $Admin_Position = "NULL" ;
          }



          @mysqli_free_result($Employee_Query_Result);
        }

        /* Find Employee Allowances  */
        {
          $allowanceQuery = "SELECT * FROM Allowance WHERE Employee_Code='$Employee_Code'";
          if ($allowanceQuery_Result = mysqli_query($conn,$allowanceQuery)){

            if ($query_num = mysqli_num_rows($allowanceQuery_Result) > 0){

              $Allowance_Row = mysqli_fetch_assoc($allowanceQuery_Result);
           
              /* Allowance Attached with this Specefic Employee */
              $Allowance_ID  = $Allowance_Row['Allowance_ID'];
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
            else{
              $errorMSG = "Error: No Allowance Record Found!";
            }
          }
          else{
            $errorMSG = "Server Fault: To Getting Employee Allowance Resource. " . mysqli_error($conn);
          }

          @mysqli_free_result($allowanceQuery_Result);
        }
          


        /* Find Employee Deductions */
        {
          $Deduction_Query = "SELECT * FROM Deduction WHERE Employee_Code='$Employee_Code'";      
          if ($Deduction_Query_Result = mysqli_query($conn,$Deduction_Query)){

            if ($query_num = mysqli_num_rows($Deduction_Query_Result) > 0){

              $Deduction_Row = mysqli_fetch_assoc($Deduction_Query_Result);
           
              /* Deductions Attached with this Specefic Employee */
              $Deduction_ID  = $Deduction_Row['Deduction_ID'];
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
            else{
              $errorMSG = "Error: No Deduction Record Found!";
            }
          }
          else{
            $errorMSG = "Server Fault: To Getting Employee Deduction Resource. " . mysqli_error($conn);
          }

          @mysqli_free_result($Deduction_Query_Result);
        }

          
        /* Find Employee NetSalary  */
        {
          $netSalaryQuery = "SELECT * FROM netsalary WHERE Employee_Code='$Employee_Code'";
          if ($NetSalaryQueryResult = mysqli_query($conn,$netSalaryQuery)){

            if ($query_num = mysqli_num_rows($NetSalaryQueryResult) > 0){

              $netSalaryRow = mysqli_fetch_assoc($NetSalaryQueryResult);
           
              /* Net Salary Attached with this Specefic Employee */
              $Gross_Pay =  $netSalaryRow['Gross_Pay'];
              $Total_Deduction =  $netSalaryRow['totalDeduction'];
              $netSalary = $netSalaryRow['Net_Salary'];
            }
            else{
              $errorMSG = "Error: No Net Salary Record Found!";
            }

          }
          else{
            $errorMSG = "Server Fault: To Getting Employee Net Salary Resource!";
          }

          @mysqli_free_result($NetSalaryQueryResult);
        }

      }
      else{
        $errorMsg = "Server Fault: Getting Employee Resource. " . mysqli_error($conn); 
      }

    }
    else{
      $errorMsg = $empRow['errorMsg'] ;
    }
    
  }
  else{
      $errorMsg = $result['errorMsg'] ;
  }

}

if (!empty($errorMsg)){
  header('Location: '.$going_back . '?returnMsg='.urlencode($errorMsg) .'&Label='.urlencode($Label)  ) ;
}


?>