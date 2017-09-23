<?php 

require_once ('./Connection.php');


	$errorMSG = '' ;
	
	$Employee_Query = "SELECT * FROM Employee ORDER BY BPS DESC";

	if ($Employee_Query_Result = mysqli_query($conn,$Employee_Query)){

	if ($query_num = mysqli_num_rows($Employee_Query_Result) > 0 ){

	  $Employee_Row = mysqli_fetch_assoc($Employee_Query_Result);
	  
	  $Employee_Code = $Employee_Row['Employee_Code'];
	  $Employee_Name = $Employee_Row['Employee_Name'];
	  $Father_Name = $Employee_Row['Father_Name'];
	  $CNIC = $Employee_Row['CNIC'];
	  $Address = $Employee_Row['Address'];
	  $NTN = $Employee_Row['NTN'];
	  $Fix = $Employee_Row['Fix'];
	  $Staff = $Employee_Row['Staff'];
	  $Admin_Position = $Employee_Row['Admin_Position'];
	  $House = $Employee_Row['House'];
	  $Vehicle = $Employee_Row['vehicle'];
	  $Marital_Status = $Employee_Row['Marital_Status'];

	  $Join_Date = $Employee_Row['Join_Date'];
	  $Current_Month = date('M') ;

	  $Account_No = $Employee_Row['Account'];
	    
	  /* Getting Resources References of Information attached with Employee Lies On Other Tables */
	  $Department_ID = $Employee_Row['Department_ID'];
	  $Qualification_ID = $Employee_Row['Qualification_ID'];
	  $Designation_ID = $Employee_Row['Designation_ID'];
	  $BPS =$Employee_Row['BPS'];
	  $Campus_ID = $Employee_Row['Campus_ID'];


	  /* Find Employee Department */
	  $Department_Query = "SELECT * FROM Department WHERE Department_ID='$Department_ID'";
	  if ($Department_Query_Result = mysqli_query($conn,$Department_Query)){

	    if ($query_num = mysqli_num_rows($Department_Query_Result) > 0){

	      $Department_Row = mysqli_fetch_assoc($Department_Query_Result);
	      $Department = $Department_Row['Department_Name'];
	    }
	    else{
	      $errorMSG = "Error: No Department Record Found!";
	    }
	    
	  }
	  else{
	    $errorMSG = "Server Fault: To Getting Employee Department Resource!";
	  }

	  /* Find Employee Qualification  */
	  $Qualification_Query = "SELECT * FROM Qualification WHERE Qualification_ID='$Qualification_ID'";
	  if ($Qualification_Query_Result = mysqli_query($conn,$Qualification_Query)){

	    $Qualification_Row = mysqli_fetch_assoc($Qualification_Query_Result);
	    $Qualification = $Qualification_Row['Qualification'] ;
	      if(empty($Qualification)){
	        $Qualification = 'None' ;
	      }
	  }
	  else{
	    $errorMSG = "Server Fault: To Getting Employee Qualification Resource!";
	  }

	  /* Find Employee Designation  */
	  $Designation_Query = "SELECT * FROM Designation WHERE Designation_ID='$Designation_ID'";
	  if ($Designation_Query_Result = mysqli_query($conn,$Designation_Query)){

	    if ($query_num = mysqli_num_rows($Designation_Query_Result) > 0){

	      $Designation_Row = mysqli_fetch_assoc($Designation_Query_Result);
	      $Designation =  $Designation_Row['Designation'];
	    }
	    else{
	      $errorMSG = "Error: No Designation Record Found!";
	    }
	  }
	  else
	  {
	    $errorMSG = "Server Fault: To Getting Employee Designation Resource!";
	  }

	  
	  /* Find Employee Campus  */
	  $Campus_Query = "SELECT * FROM Campus WHERE Campus_ID='$Campus_ID'";
	  if ($Campus_Query_Result = mysqli_query($conn,$Campus_Query)){
	    
	    if ($query_num = mysqli_num_rows($Campus_Query_Result) > 0){

	      $Campus_Row = mysqli_fetch_assoc($Campus_Query_Result);
	      $Campus = $Campus_Row['Campus'];
	    }
	    else{
	      $errorMSG = "Error: No Campus Record Found!";
	    }
	  }
	  else{
	    $errorMSG = "Server Fault: To Getting Employee Campus Resource!";
	  }


	  /* Find Employee Allowances  */
	  $Deduction_Query = "SELECT * FROM Allowance WHERE Employee_Code='$Employee_Code'";
	  if ($Deduction_Query_Result = mysqli_query($conn,$Deduction_Query)){

	    if ($query_num = mysqli_num_rows($Deduction_Query_Result) > 0){

	      $Allowance_Row = mysqli_fetch_assoc($Deduction_Query_Result);
	   
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
	    $errorMSG = "Server Fault: To Getting Employee Allowance Resource!";
	  }


	  /* Find Employee Deductions  */
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
	    $errorMSG = "Server Fault: To Getting Employee Deduction Resource!";
	  }

	  
	  /* Find Employee NetSalary  */
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
	
	}
	else{
	  $errorMSG = "No Record Found!";
	}
	  
	}
	else{
		$errorMSG = "Server Fault: Getting Employee Resource!"; 
	}










?>