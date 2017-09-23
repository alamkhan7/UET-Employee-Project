<?php
{
    /* Return New Id For New Employee */
    function newid(){
    	include dirname(__FILE__).'/Connection.php';
        $code = 0 ;

    	$empQuery= "SELECT COUNT(*)+1 AS Total FROM `employee`";
        if ($empResult = mysqli_query($conn,$empQuery)){
            $Code_Row = mysqli_fetch_assoc($empResult);
            $code = $Code_Row['Total'] ;

        }
        else{
            die("Sorry! Server Fault To Generate New EMP:Code." . mysqli_error($conn));
        }

        $empHistoryQuery= "SELECT COUNT(*) AS Total FROM `employee_history`";
        if ($empHistoryResult = mysqli_query($conn,$empHistoryQuery)){
            $Code_Row = mysqli_fetch_assoc($empHistoryResult);
            $code += $Code_Row['Total'] ;

        }
        else{
            die("Sorry! Server Fault To Generate New EMP:Code." . mysqli_error($conn));
        }

        @mysqli_free_result($empResult) ;
        @mysqli_free_result($empHistoryResult) ;

        $notFound = 1 ;
        while($notFound){
            $query= "SELECT 1 As FOUND FROM employee , employee_history WHERE employee.Employee_Code='$code' OR employee_history.Employee_Code='$code' ";
            if ($result = mysqli_query($conn,$query)){
                if (mysqli_num_rows($result)>0){
                    $code+=1;
                    continue;
                }

                $notFound = 0 ;
            }
            else
                die("Sorry! Server Fault To Generate New EMP:Code." . mysqli_error($conn));

            @mysqli_free_result($result) ;
        }


        
        @mysqli_close($conn) ;

     return ($code==0) ? 1 : $code ;
    }

    /* Check if user is logged in then return true */
    session_start();
    function loggedin(){

    	if (isset($_SESSION['Username']) && !empty($_SESSION['Username'])){
    		return true ;
    	}
    	else{
    		return false ;
    	}
    }
    function returnFix($Fix){
    	if ($Fix == 'R'){ 
    		$Fix = 'Regular'; 
    	}
        else{ 
        	$Fix = 'Fixed';
        }
     return $Fix ;
    }

    function returnDate($date1){
    	/*convert 2017-05-01 -> 01/05/2017*/
    	$date = implode("/" , array_reverse(explode("-",$date1)));
    	return $date ;
    }

    function returnBPS($BPS){
        if (empty($BPS)){ 
            $BPS = 'None'; 
        }
     return $BPS ;   
    }

    function returnStaff($staff){
        if ($staff=='T'){ 
            $staff = 'Tech'; 
        }
        elseif ($staff=='N'){
            $staff = 'Non-Tech' ;
        }
        else{
            $staff = 'Neb-Qasid' ;
        }
     return $staff ;   
    }

    function returnNTN($NTN){
        if (empty($NTN)){ 
            $NTN = 'None'; 
        }
     return $NTN ;   
    }

    function return_total_record($deptID=0){
        include dirname(__FILE__).'/Connection.php';

        $returnData = array('totalRecord' => 0,
                            'errorMsg' => Null
                            );

        if (!empty($deptID)){
            $query = "SELECT COUNT(*) FROM Employee WHERE Department_ID='$deptID'";
        }
        else{
            $query = "SELECT COUNT(*) FROM Employee";
        }
        
        

        if ($queryResult = mysqli_query($conn, $query)) {

            if ($query_num = mysqli_num_rows($queryResult) > 0){
                $record = mysqli_fetch_assoc($queryResult);
                $returnData['totalRecord'] = $record['COUNT(*)'];
            }
            else{
                $returnData['errorMsg'] = "Sorry! Record Not found." ;
            }
        }
        else{
            $returnData['errorMsg'] = "Server Fault: Getting Employee Resource!(return_total_record)" ;
        }

        return $returnData ;
    }

    function is_generated ($id){
        include dirname(__FILE__).'/Connection.php';
        $status = array('status' => 0,
                        'errorMsg' => 0 
                        );
      
        $query = "SELECT Monthly_Salary_Generate FROM employee WHERE Employee_Code = '$id'";

        $result=mysqli_query($conn,$query);
          
        if($result){
            
            $row = mysqli_fetch_assoc($result) ;

            $status['status'] = $row['Monthly_Salary_Generate'] ;
            $status['errorMsg'] = "Monthly_Salary_Generate return successful." ;
        }
        else{
            $status['errorMsg'] = ("Sorry! Server Fault Generate Salary: ". mysqli_error($conn));
        }

        mysqli_free_result($result);
        mysqli_close($conn);

        return $status ;
    }

    function return_total($query){
        include dirname(__FILE__).'/Connection.php';

        $returnData = array('totalRecord' => 0,
                            'errorMsg' => NULL
                            );
        

        if ($result = mysqli_query($conn, $query)) {

            if (mysqli_num_rows($result) > 0){
                $returnData['totalRecord'] = mysqli_num_rows($result) ;
            }
            else{
                $returnData['errorMsg'] = "Sorry! Record not found." ;
            }
        }
        else{
            $returnData['errorMsg'] = "Server Fault: Getting Resource!(return_total)" . mysqli_error($conn) ;
        }

        @mysqli_free_result($result);
        mysqli_close($conn);
        return $returnData ;
    }
    function emp_resource($id){
        include dirname(__FILE__).'/Connection.php';

        $returnData = array('row' => 0,
                            'errorMsg' => NULL
                            );
        
        $query = "SELECT * FROM Employee WHERE Employee_Code ='$id' " ;
        if ($result = mysqli_query($conn, $query)) {

            $returnData['row'] = mysqli_fetch_assoc($result) ;
        }
        else{
            $returnData['errorMsg'] = "Server Fault: Getting Resource!(return_total)" . mysqli_error($conn) ;
        }

        @mysqli_free_result($result);
        mysqli_close($conn);
        return $returnData ;
    }


    function select_query_for_top_allownces_view($campID,$fix=0,$staff=0){
        
        $query = NULL;

        /* Fix=R and Staff=Teaching */
        if ($fix=='R' && $staff=='T'){
            $query = "SELECT * FROM top_allowance_regular_teaching_view WHERE campus_id='$campID'";
        }
        /* Fix=F and Staff=Teaching */
        elseif($fix=='F' && $staff=='T'){
            $query = "SELECT * FROM top_allowance_fixed_teaching_view WHERE campus_id='$campID'";
        }
        /* Fix=R and Staff=NonTeaching */
        elseif($fix=='R' && $staff=='N'){
            $query = "SELECT * FROM top_allowance_regular_nonteach_view WHERE campus_id='$campID'";
        }
        /* Fix=F and Staff=NonTeaching */
        elseif($fix=='F' && $staff=='N'){
            $query = "SELECT * FROM top_allowance_fixed_nonteach_view WHERE campus_id='$campID'";
        }
        /* Fix=R and Staff=Teaching */
        elseif($fix=='R' && $staff=='Q'){
            $query = "SELECT * FROM top_allowance_regular_neb_view WHERE campus_id='$campID'";
        }
        /* Fix=F and Staff=Teaching */
        elseif($fix=='F' && $staff=='Q'){
            $query = "SELECT * FROM top_allowance_fixed_neb_view WHERE campus_id='$campID'";
        }
        
        return $query;
    }
    function select_query_for_top_deduction_view($campID,$fix=0,$staff=0){
        
        $query = NULL;

        /* Fix=R and Staff=Teaching */
        if ($fix=='R' && $staff=='T'){
            $query = "SELECT * FROM top_deduction_regular_teaching_view WHERE campus_id='$campID'";
        }
        /* Fix=F and Staff=Teaching */
        elseif($fix=='F' && $staff=='T'){
            $query = "SELECT * FROM top_deduction_fixed_teaching_view WHERE campus_id='$campID'";
        }
        /* Fix=R and Staff=NonTeaching */
        elseif($fix=='R' && $staff=='N'){
            $query = "SELECT * FROM top_deduction_regular_nonteach_view WHERE campus_id='$campID'";
        }
        /* Fix=F and Staff=NonTeaching */
        elseif($fix=='F' && $staff=='N'){
            $query = "SELECT * FROM top_deduction_fixed_nonteach_view WHERE campus_id='$campID'";
        }
        /* Fix=R and Staff=Teaching */
        elseif($fix=='R' && $staff=='Q'){
            $query = "SELECT * FROM top_deduction_regular_neb_view WHERE campus_id='$campID'";
        }
        /* Fix=F and Staff=Teaching */
        elseif($fix=='F' && $staff=='Q'){
            $query = "SELECT * FROM top_deduction_fixed_neb_view WHERE campus_id='$campID'";
        }
        
        return $query;
    }
    function select_query_for_allownces_record($campID,$fix=0,$staff=0){
        
        /* Fix=All and Staff=All */
        if (empty($fix) && empty($staff)){
            $query="SELECT dept.Department_Name, camp.Campus, 
                    SUM(allow.Basic_pay) As Basic_Pay,
                    SUM(allow.Fixed_Pay) As Fixed_Pay,
                    SUM(allow.Personal_Pay) As Personal_Pay,
                    SUM(allow.Hreant1_All) As Hreant1_All,
                    SUM(allow.Hrent_Sub_All) As Hrent_Sub_All,
                    SUM(allow.Convence_All) As Convence_All,
                    SUM(allow.Adhoc_Rel_2010) As Adhoc_Rel_2010,
                    SUM(allow.Computer_All) As Computer_All,
                    SUM(allow.Private_All) As Private_All,
                    SUM(allow.Extra_All) As Extra_All,
                    SUM(allow.Senior_p_All) As Senior_p_All,
                    SUM(allow.Med_All) As Med_All,
                    SUM(allow.ENT_All) As ENT_All,
                    SUM(allow.Dean_All) As Dean_All,
                    SUM(allow.intgrated_All) As intgrated_All,
                    SUM(allow.Spec_Add_All) As Spec_Add_All,
                    SUM(allow.Teach_All) As Teach_All,
                    SUM(allow.Orderly_All) As Orderly_All,
                    SUM(allow.Oth_All) As Oth_All,
                    SUM(allow.Brain_Drain) As Brain_Drain,
                    SUM(allow.ARA_2016_10PERCENT) As ARA_2016_10PERCENT
                    FROM 
                    allowance allow, employee emp, department dept, campus camp 
                    WHERE emp.campus_id='$campID' AND emp.employee_code = allow.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID
                    GROUP BY dept.Department_ID";
        }
        /* Fix=R/F and Staff All */
        elseif(!empty($fix) && empty($staff)){
            $query = "SELECT dept.Department_Name, camp.Campus, 
                    SUM(allow.Basic_pay) As Basic_Pay,
                    SUM(allow.Fixed_Pay) As Fixed_Pay,
                    SUM(allow.Personal_Pay) As Personal_Pay,
                    SUM(allow.Hreant1_All) As Hreant1_All,
                    SUM(allow.Hrent_Sub_All) As Hrent_Sub_All,
                    SUM(allow.Convence_All) As Convence_All,
                    SUM(allow.Adhoc_Rel_2010) As Adhoc_Rel_2010,
                    SUM(allow.Computer_All) As Computer_All,
                    SUM(allow.Private_All) As Private_All,
                    SUM(allow.Extra_All) As Extra_All,
                    SUM(allow.Senior_p_All) As Senior_p_All,
                    SUM(allow.Med_All) As Med_All,
                    SUM(allow.ENT_All) As ENT_All,
                    SUM(allow.Dean_All) As Dean_All,
                    SUM(allow.intgrated_All) As intgrated_All,
                    SUM(allow.Spec_Add_All) As Spec_Add_All,
                    SUM(allow.Teach_All) As Teach_All,
                    SUM(allow.Orderly_All) As Orderly_All,
                    SUM(allow.Oth_All) As Oth_All,
                    SUM(allow.Brain_Drain) As Brain_Drain,
                    SUM(allow.ARA_2016_10PERCENT) As ARA_2016_10PERCENT
                    FROM 
                    allowance allow, employee emp, department dept, campus camp  
                    WHERE emp.campus_id='$campID' AND emp.employee_code = allow.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID AND emp.Fix='$fix'
                    GROUP BY dept.Department_ID";
        }
        /* Fix=All and Staff=T/N */
        elseif(empty($fix) && !empty($staff)){
            $query = "SELECT dept.Department_Name, camp.Campus, 
                    SUM(allow.Basic_pay) As Basic_Pay,
                    SUM(allow.Fixed_Pay) As Fixed_Pay,
                    SUM(allow.Personal_Pay) As Personal_Pay,
                    SUM(allow.Hreant1_All) As Hreant1_All,
                    SUM(allow.Hrent_Sub_All) As Hrent_Sub_All,
                    SUM(allow.Convence_All) As Convence_All,
                    SUM(allow.Adhoc_Rel_2010) As Adhoc_Rel_2010,
                    SUM(allow.Computer_All) As Computer_All,
                    SUM(allow.Private_All) As Private_All,
                    SUM(allow.Extra_All) As Extra_All,
                    SUM(allow.Senior_p_All) As Senior_p_All,
                    SUM(allow.Med_All) As Med_All,
                    SUM(allow.ENT_All) As ENT_All,
                    SUM(allow.Dean_All) As Dean_All,
                    SUM(allow.intgrated_All) As intgrated_All,
                    SUM(allow.Spec_Add_All) As Spec_Add_All,
                    SUM(allow.Teach_All) As Teach_All,
                    SUM(allow.Orderly_All) As Orderly_All,
                    SUM(allow.Oth_All) As Oth_All,
                    SUM(allow.Brain_Drain) As Brain_Drain,
                    SUM(allow.ARA_2016_10PERCENT) As ARA_2016_10PERCENT
                    FROM 
                    allowance allow, employee emp, department dept, campus camp  
                    WHERE emp.campus_id='$campID' AND emp.employee_code = allow.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID AND emp.Staff='$staff'
                    GROUP BY dept.Department_ID";
        }
        /* Fix=R/F and Staff=T/N */
        else{
            $query = "SELECT dept.Department_Name, camp.Campus, 
                    SUM(allow.Basic_pay) As Basic_Pay,
                    SUM(allow.Fixed_Pay) As Fixed_Pay,
                    SUM(allow.Personal_Pay) As Personal_Pay,
                    SUM(allow.Hreant1_All) As Hreant1_All,
                    SUM(allow.Hrent_Sub_All) As Hrent_Sub_All,
                    SUM(allow.Convence_All) As Convence_All,
                    SUM(allow.Adhoc_Rel_2010) As Adhoc_Rel_2010,
                    SUM(allow.Computer_All) As Computer_All,
                    SUM(allow.Private_All) As Private_All,
                    SUM(allow.Extra_All) As Extra_All,
                    SUM(allow.Senior_p_All) As Senior_p_All,
                    SUM(allow.Med_All) As Med_All,
                    SUM(allow.ENT_All) As ENT_All,
                    SUM(allow.Dean_All) As Dean_All,
                    SUM(allow.intgrated_All) As intgrated_All,
                    SUM(allow.Spec_Add_All) As Spec_Add_All,
                    SUM(allow.Teach_All) As Teach_All,
                    SUM(allow.Orderly_All) As Orderly_All,
                    SUM(allow.Oth_All) As Oth_All,
                    SUM(allow.Brain_Drain) As Brain_Drain,
                    SUM(allow.ARA_2016_10PERCENT) As ARA_2016_10PERCENT
                    FROM 
                    allowance allow, employee emp, department dept, campus camp  
                    WHERE emp.campus_id='$campID' AND emp.employee_code = allow.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID AND emp.Fix='$fix' AND emp.Staff='$staff'
                    GROUP BY dept.Department_ID";
        }


        return $query ;
    }
    function select_query_for_deduction_record($campID,$fix=0,$staff=0){
        
        /* Fix=All and Staff=All */
        if (empty($fix) && empty($staff)){
            $query="SELECT dept.Department_Name, camp.Campus, 
                    SUM(ded.House_Rent_1) As House_Rent_1,
                    SUM(ded.House_Rent_2) As House_Rent_2,
                    SUM(ded.Electric_Charges_1) As Electric_Charges_1,
                    SUM(ded.Electric_Charges_2) As Electric_Charges_2,
                    SUM(ded.SuiGas_Charges) As SuiGas_Charges,
                    SUM(ded.Water_Tax1_Charges) As Water_Tax1_Charges,
                    SUM(ded.Water_Tax2_Charges) As Water_Tax2_Charges,
                    SUM(ded.Endovement_Fund) As Endovement_Fund,
                    SUM(ded.B_Fund) As B_Fund,
                    SUM(ded.House_Build_Loan) As House_Build_Loan,
                    SUM(ded.Convence_Loan) As Convence_Loan,
                    SUM(ded.GP_Fund_Regular) As GP_Fund_Regular,
                    SUM(ded.GP_Fund_Advence) As GP_Fund_Advence,
                    SUM(ded.Eid_Advance) As Eid_Advance,
                    SUM(ded.Union_Fund_1) As Union_Fund_1,
                    SUM(ded.Union_Fund_2) As Union_Fund_2,
                    SUM(ded.Vehicle_Charges_Other) As Vehicle_Charges_Other,
                    SUM(ded.Vehicle_Charges_Teacher) As Vehicle_Charges_Teacher,
                    SUM(ded.Upkeep_Ded) As Upkeep_Ded,
                    SUM(ded.R_Leave_Without_Pay) As R_Leave_Without_Pay,
                    SUM(ded.Recovery_Gap_CA) As Recovery_Gap_CA,
                    SUM(ded.Income_Tax) As Income_Tax,
                    SUM(ded.Group_Insurance) As Group_Insurance,
                    SUM(ded.Other) As Other
                    FROM 
                    deduction ded, employee emp, department dept, campus camp 
                    WHERE emp.campus_id='$campID' AND emp.employee_code = ded.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID
                    GROUP BY dept.Department_ID";
        }
        /* Fix=R/F and Staff All */
        elseif(!empty($fix) && empty($staff)){
            $query = "SELECT dept.Department_Name, camp.Campus, 
                    SUM(ded.House_Rent_1) As House_Rent_1,
                    SUM(ded.House_Rent_2) As House_Rent_2,
                    SUM(ded.Electric_Charges_1) As Electric_Charges_1,
                    SUM(ded.Electric_Charges_2) As Electric_Charges_2,
                    SUM(ded.SuiGas_Charges) As SuiGas_Charges,
                    SUM(ded.Water_Tax1_Charges) As Water_Tax1_Charges,
                    SUM(ded.Water_Tax2_Charges) As Water_Tax2_Charges,
                    SUM(ded.Endovement_Fund) As Endovement_Fund,
                    SUM(ded.B_Fund) As B_Fund,
                    SUM(ded.House_Build_Loan) As House_Build_Loan,
                    SUM(ded.Convence_Loan) As Convence_Loan,
                    SUM(ded.GP_Fund_Regular) As GP_Fund_Regular,
                    SUM(ded.GP_Fund_Advence) As GP_Fund_Advence,
                    SUM(ded.Eid_Advance) As Eid_Advance,
                    SUM(ded.Union_Fund_1) As Union_Fund_1,
                    SUM(ded.Union_Fund_2) As Union_Fund_2,
                    SUM(ded.Vehicle_Charges_Other) As Vehicle_Charges_Other,
                    SUM(ded.Vehicle_Charges_Teacher) As Vehicle_Charges_Teacher,
                    SUM(ded.Upkeep_Ded) As Upkeep_Ded,
                    SUM(ded.R_Leave_Without_Pay) As R_Leave_Without_Pay,
                    SUM(ded.Recovery_Gap_CA) As Recovery_Gap_CA,
                    SUM(ded.Income_Tax) As Income_Tax,
                    SUM(ded.Group_Insurance) As Group_Insurance,
                    SUM(ded.Other) As Other
                    FROM 
                    deduction ded, employee emp, department dept, campus camp  
                    WHERE emp.campus_id='$campID' AND emp.employee_code = ded.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID AND emp.Fix='$fix'
                    GROUP BY dept.Department_ID";
        }
        /* Fix=All and Staff=T/N */
        elseif(empty($fix) && !empty($staff)){
            $query = "SELECT dept.Department_Name, camp.Campus, 
                    SUM(ded.House_Rent_1) As House_Rent_1,
                    SUM(ded.House_Rent_2) As House_Rent_2,
                    SUM(ded.Electric_Charges_1) As Electric_Charges_1,
                    SUM(ded.Electric_Charges_2) As Electric_Charges_2,
                    SUM(ded.SuiGas_Charges) As SuiGas_Charges,
                    SUM(ded.Water_Tax1_Charges) As Water_Tax1_Charges,
                    SUM(ded.Water_Tax2_Charges) As Water_Tax2_Charges,
                    SUM(ded.Endovement_Fund) As Endovement_Fund,
                    SUM(ded.B_Fund) As B_Fund,
                    SUM(ded.House_Build_Loan) As House_Build_Loan,
                    SUM(ded.Convence_Loan) As Convence_Loan,
                    SUM(ded.GP_Fund_Regular) As GP_Fund_Regular,
                    SUM(ded.GP_Fund_Advence) As GP_Fund_Advence,
                    SUM(ded.Eid_Advance) As Eid_Advance,
                    SUM(ded.Union_Fund_1) As Union_Fund_1,
                    SUM(ded.Union_Fund_2) As Union_Fund_2,
                    SUM(ded.Vehicle_Charges_Other) As Vehicle_Charges_Other,
                    SUM(ded.Vehicle_Charges_Teacher) As Vehicle_Charges_Teacher,
                    SUM(ded.Upkeep_Ded) As Upkeep_Ded,
                    SUM(ded.R_Leave_Without_Pay) As R_Leave_Without_Pay,
                    SUM(ded.Recovery_Gap_CA) As Recovery_Gap_CA,
                    SUM(ded.Income_Tax) As Income_Tax,
                    SUM(ded.Group_Insurance) As Group_Insurance,
                    SUM(ded.Other) As Other
                    FROM 
                    deduction ded, employee emp, department dept, campus camp  
                    WHERE emp.campus_id='$campID' AND emp.employee_code = ded.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID AND emp.Staff='$staff'
                    GROUP BY dept.Department_ID";
        }
        /* Fix=R/F and Staff=T/N */
        else{
            $query = "SELECT dept.Department_Name, camp.Campus, 
                    SUM(ded.House_Rent_1) As House_Rent_1,
                    SUM(ded.House_Rent_2) As House_Rent_2,
                    SUM(ded.Electric_Charges_1) As Electric_Charges_1,
                    SUM(ded.Electric_Charges_2) As Electric_Charges_2,
                    SUM(ded.SuiGas_Charges) As SuiGas_Charges,
                    SUM(ded.Water_Tax1_Charges) As Water_Tax1_Charges,
                    SUM(ded.Water_Tax2_Charges) As Water_Tax2_Charges,
                    SUM(ded.Endovement_Fund) As Endovement_Fund,
                    SUM(ded.B_Fund) As B_Fund,
                    SUM(ded.House_Build_Loan) As House_Build_Loan,
                    SUM(ded.Convence_Loan) As Convence_Loan,
                    SUM(ded.GP_Fund_Regular) As GP_Fund_Regular,
                    SUM(ded.GP_Fund_Advence) As GP_Fund_Advence,
                    SUM(ded.Eid_Advance) As Eid_Advance,
                    SUM(ded.Union_Fund_1) As Union_Fund_1,
                    SUM(ded.Union_Fund_2) As Union_Fund_2,
                    SUM(ded.Vehicle_Charges_Other) As Vehicle_Charges_Other,
                    SUM(ded.Vehicle_Charges_Teacher) As Vehicle_Charges_Teacher,
                    SUM(ded.Upkeep_Ded) As Upkeep_Ded,
                    SUM(ded.R_Leave_Without_Pay) As R_Leave_Without_Pay,
                    SUM(ded.Recovery_Gap_CA) As Recovery_Gap_CA,
                    SUM(ded.Income_Tax) As Income_Tax,
                    SUM(ded.Group_Insurance) As Group_Insurance,
                    SUM(ded.Other) As Other
                    FROM 
                    deduction ded, employee emp, department dept, campus camp  
                    WHERE emp.campus_id='$campID' AND emp.employee_code = ded.employee_code AND emp.Department_ID = dept.Department_ID AND emp.Campus_ID = camp.Campus_ID AND emp.Fix='$fix' AND emp.Staff='$staff'
                    GROUP BY dept.Department_ID";
        }


        return $query ;
    }

}
/*----------- Validation ---------------------------------*/
{
    function employee_personal_info_validation($data){
    	// echo "<pre>";
    	// print_r($data);
    	// echo "<pre>";
    	$returnMsg = "" ;

    	$Employee_Code = $data['empcode'];
        $Employee_Name = trim($data['empname']);   // trim() if they only contain spaces
        $Father_Name = trim($data['empfather']);
        $CNIC =  $data['cnic'];
        $Address = $data['address'];
        $Email = $data['email'];       // Optional
        $NTN = $data['ntn'];           // Optional
        $BPS = $data['bps'];
        $Fix = $data['fix'];              
        
        $Qualification = (int) $_POST['qualification'];
        $Designation = $data['designation'];
        $Staff = $data['staff'];
        $Admin_Position = $data['position'];
        $Campus = $data['campus'];
        $Department = $data['department'];
        $DepartmentOther = $data['departmentother'];
        $Section = $data['section'];
        $House = $data['house'];
        $Vehicle = $data['vehicle'];
        $Marital_Status = $data['marital'];
        $Join_Date = $data['date'];

        /* Field Validation */
        if (empty($Employee_Code) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Empty/Incorrect Employee ID.' ;
        }
        if ( (empty($Employee_Name) || preg_match("/\\d/",$Employee_Name) ) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Employee Name.' ;
        }
        if ( (empty($Father_Name) || preg_match("/\\d/",$Father_Name) ) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Employee Father Name.' ;
        }
        if ( (empty($CNIC) || !preg_match('/^[0-9]+$/',$CNIC) ) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty CNIC Number.' ;
        }
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL) && empty($returnMsg)) {
            $returnMsg = "<strong>Error:</strong> Invalid email format";
        }
        if (!empty($NTN) && !preg_match('/^[0-9]+$/',$NTN) && empty($returnMsg) ){
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty NTN Number.' ;
        }
        if ( ( $BPS < 0 || $BPS > 22 ) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty BPS.' ;
        }
        
        if (empty($Fix) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Fix Field.' ;
        }
        if (empty($Designation) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Designation.' ;
        }
        if (empty($Campus) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Campus.' ;
        }
        if (empty($Staff) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Staff.' ;
        }

        if ($Staff == 'T' && empty($returnMsg)){
            if (empty($Qualification)){
                $returnMsg = '<strong>Error:</strong> Incorrect/Empty Qualification.' ;
            }
            if (empty($Department)){
                $returnMsg = '<strong>Error:</strong> Incorrect/Empty Department.' ;
            }
            if (empty($Admin_Position)){
                $returnMsg = '<strong>Error:</strong> Incorrect/Empty Admin Position.' ;
            }
        }

        if ($Staff == 'N' && empty($returnMsg)){
            if (empty($Section)){
                $returnMsg = '<strong>Error:</strong> Incorrect/Empty Section.' ;
            }
        }

        if ($Staff == 'Q' && empty($returnMsg)){
            if (empty($DepartmentOther)){
                $returnMsg = '<strong>Error:</strong> Incorrect/Empty Other Department.' ;
            }
        }
        
        if ($House==="" && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty House.' ;
        }
        if ($Vehicle==="" && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Vehicle.' ;
        }
        if ($Marital_Status==="" && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Marital Status.' ;
        }
        if (empty($Join_Date) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect/Empty Join Date.' ;
        }

     return $returnMsg ;
    }

    function allownces_validation($data){

        $returnMsg = "" ;

        $Basic_Pay     = $data['bpay'];
        $Fixed_Pay     = $data['fpay'];
        $Personal_Pay  = $data['ppay'];
        $Hreant1_All   = $data['hreall'];
        $Hrent_Sub_All = $data['hresuball'];
        $Convence_All  = $data['conall'];
        $Adhoc_Rel_2010= $data['adhrel'];
        $Computer_All  = $data['compall'];
        $Private_All   = $data['priall']; 
        $Extra_All     = $data['extall'];
        $Senior_p_All  = $data['senall']; 
        $Med_All       = $data['medall'];
        $ENT_All       = $data['entall']; 
        $Dean_All      = $data['deanall']; 
        $intgrated_All = $data['integ']; 
        $Spec_Add_All  = $data['specadd']; 
        $Teach_All     = $data['tech'];
        $Orderly_All   = $data['ordall'];
        $Oth_All       = $data['othall']; 
        $Brain_Drain   = $data['Brain_Drain'];

        if (!is_numeric($Basic_Pay) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Basic Pay Value.' ;
        }
        if (!is_numeric($Fixed_Pay) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Fixed Pay Value.' ;
        }
        if (!is_numeric($Personal_Pay) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Personal Pay Value.' ;
        }
        if (!is_numeric($Hreant1_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Hrent1 All Value.' ;
        }
        if (!is_numeric($Hrent_Sub_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Hrent Sub All Value.' ;
        }
        if (!is_numeric($Convence_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Convence All Value.' ;
        }
        if (!is_numeric($Adhoc_Rel_2010) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Adhoc Rel 2010 Value.' ;
        }
        if (!is_numeric($Computer_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Computer All Value.' ;
        }
        if (!is_numeric($Private_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Private All Value.' ;
        }
        if (!is_numeric($Extra_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Extra All Value.' ;
        }
        if (!is_numeric($Senior_p_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Senior p All Value.' ;
        }
        if (!is_numeric($Med_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Med All Value.' ;
        }
        if (!is_numeric($ENT_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect ENT All Value.' ;
        }
        if (!is_numeric($Dean_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Dean All Value.' ;
        }
        if (!is_numeric($intgrated_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Integrated All Value.' ;
        }
        if (!is_numeric($Spec_Add_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Spec Add All Value.' ;
        }
        if (!is_numeric($Teach_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Teach All Value.' ;
        }
        if (!is_numeric($Orderly_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Orderly All Value.' ;
        }
        if (!is_numeric($Oth_All) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Oth All Value.' ;
        }
        if (!is_numeric($Brain_Drain) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Brain Drain Value.' ;
        }

     return $returnMsg ;
    }

    function deduction_validation($data){

        $returnMsg = "" ;

        $House_Rent_1  = $data['House_1'];
        $House_Rent_2  = $data['House_2'];
        $Electric_Charges_1  = $data['elec_1'];
        $Electric_Charges_2  = $data['elec_2'];
        $SuiGas_Charges  = $data['gasded'];
        $Water_Tax1_Charges  = $data['water1'];
        $Water_Tax2_Charges  = $data['water2'];
        $Endovement_Fund  = $data['endded'];
        $B_Fund  = $data['bfundded'];
        $House_Build_Loan  = $data['HouseBuild'];
        $Convence_Loan  = $data['convded'];
        $GP_Fund_Regular  = $data['gpfrded'];
        $GP_Fund_Advence  = $data['gpfaded'];
        $Eid_Advance  = $data['eidded'];
        $Union_Fund_1  = $data['ufund1'];
        $Union_Fund_2  = $data['ufund2'];
        $Vehicle_Charges_Other  = $data['vehded'];
        $Vehicle_Charges_Teacher  = $data['tvehded'];
        $Upkeep_Ded  = $data['upkeepded'];
        $R_Leave_Without_Pay  = $data['leavded'];
        $Recovery_Gap_CA  = $data['recovded'];
        $Income_Tax  = $data['itexded'];
        $Group_Insurance  = $data['ginsded'];
        $Other  = $data['oth1ded'];

        if (!is_numeric($House_Rent_1) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect House_Rent_1 Value.' ;
        }
        if (!is_numeric($House_Rent_2) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect House_Rent_2 Value.' ;
        }
        if (!is_numeric($Electric_Charges_1) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Electric_Charges_1 Value.' ;
        }
        if (!is_numeric($Electric_Charges_2) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Electric_Charges_2 Value.' ;
        }
        if (!is_numeric($SuiGas_Charges) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect SuiGas_Charges Value.' ;
        }
        if (!is_numeric($Water_Tax1_Charges) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Water_Tax1_Charges Value.' ;
        }
        if (!is_numeric($Water_Tax2_Charges) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Water_Tax2_Charges Value.' ;
        }
        if (!is_numeric($Endovement_Fund) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Endovement_Fund Value.' ;
        }
        if (!is_numeric($B_Fund) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect B_Fund Value.' ;
        }
        if (!is_numeric($House_Build_Loan) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect House_Build_Loan Value.' ;
        }
        if (!is_numeric($Convence_Loan) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Convence_Loan Value.' ;
        }
        if (!is_numeric($GP_Fund_Regular) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect GP_Fund_Regular Value.' ;
        }
        if (!is_numeric($GP_Fund_Advence) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect GP_Fund_Advence Value.' ;
        }
        if (!is_numeric($Eid_Advance) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Eid_Advance Value.' ;
        }
        if (!is_numeric($Union_Fund_1) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Union_Fund_1 Value.' ;
        }
        if (!is_numeric($Union_Fund_2) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Union_Fund_2 Value.' ;
        }
        if (!is_numeric($Vehicle_Charges_Other) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Vehicle_Charges_Other Value.' ;
        }
        if (!is_numeric($Vehicle_Charges_Teacher) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Vehicle_Charges_Teacher Value.' ;
        }
        if (!is_numeric($Upkeep_Ded) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Upkeep_Ded Value.' ;
        }
        if (!is_numeric($R_Leave_Without_Pay) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect R_Leave_Without_Pay Value.' ;
        }
        if (!is_numeric($Recovery_Gap_CA) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Recovery_Gap_CA Value.' ;
        }
        if (!is_numeric($Income_Tax) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Income_Tax Value.' ;
        }
        if (!is_numeric($Group_Insurance) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Group_Insurance Value.' ;
        }
        if (!is_numeric($Other) && empty($returnMsg)) {
            $returnMsg = '<strong>Error:</strong> Incorrect Other Value.' ;
        }
        

     return $returnMsg ;
    }
}
/*----------- Return Old Employee Personal Record ---------------------------------*/
{
    function return_old_bps($id){
        include dirname(__FILE__).'/Connection.php';

        $bpsQuery= "SELECT BPS  FROM `employee` WHERE Employee_Code='$id'";
        
        if ($bps_Query_Result = mysqli_query($conn,$bpsQuery)) {
            $Row = mysqli_fetch_assoc($bps_Query_Result);
            $bps = $Row['BPS'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_bps):") ;
        }

        mysqli_free_result($bps_Query_Result);
        mysqli_close($conn);

     return $bps ;
    }
    function return_old_designation($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Designation_ID  FROM `employee` WHERE Employee_Code='$id'";
        
        if ($DID_Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($DID_Query_Result);
            $DID = $Row['Designation_ID'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_designation):") ;
        }

        mysqli_free_result($DID_Query_Result);
        mysqli_close($conn);

     return $DID ;
    }
    function return_old_staff($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Staff  FROM `employee` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $Staff = $Row['Staff'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_staff):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $Staff ;
    }
    function return_old_qualification($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Qualification_ID  FROM `employee_teaching` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $Qualification_ID = $Row['Qualification_ID'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_qualification):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $Qualification_ID ;
    }
    function return_old_admin_position($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Admin_Position  FROM `employee_teaching` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $Admin_Position = $Row['Admin_Position'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_admin_position):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return (empty($Admin_Position)) ? "None" : $Admin_Position ;
    }
    function return_old_house($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT House  FROM `employee` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $House = $Row['House'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_house):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $House ;
    }
    function return_old_vehicle($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT vehicle  FROM `employee` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $vehicle = $Row['vehicle'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_vehicle):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $vehicle ;
    }
    function return_old_marital_status($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Marital_Status  FROM `employee` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $Marital_Status = $Row['Marital_Status'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_marital_status):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $Marital_Status ;
    }
    function return_old_campus($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Campus_ID  FROM `employee` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $Campus_ID = $Row['Campus_ID'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_campus):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $Campus_ID ;
    }
    function return_old_department($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Department_ID  FROM `employee_teaching` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $Department_ID = $Row['Department_ID'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_department):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $Department_ID ;
    }
    function return_old_department_other($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Department_ID  FROM `employee_nebqasid` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $Department_ID = $Row['Department_ID'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_department_other):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $Department_ID ;
    }
    function return_old_section($id){
        include dirname(__FILE__).'/Connection.php';

        $Query= "SELECT Section_ID  FROM `employee_non_teaching` WHERE Employee_Code='$id'";
        
        if ($Query_Result = mysqli_query($conn,$Query)) {
            $Row = mysqli_fetch_assoc($Query_Result);
            $Section_ID = $Row['Section_ID'] ;
        }
        else{
            die("Sorry! Server Fault Update Failed (Calling return_old_section):") ;
        }

        mysqli_free_result($Query_Result);
        mysqli_close($conn);

     return $Section_ID ;
    }

}
/*---------------------------------Fileds Hidden Function--------------------------------------*/
{
    function hidden_field($Fix_P,$Staff_P){
        $flags_array = array('Basic_Pay' => 0,
                             'Fixed_Pay' => 0,
                             'Personal_Pay' => 0,
                             'Hreant1_All' => 0,
                             'Hrent_Sub_All' => 0,
                             'Convence_All' => 0,
                             'Adhoc_Rel_2010' => 0,
                             'Computer_All' => 0,
                             'Private_All' => 0,
                             'Extra_All' => 0,
                             'Senior_p_All' => 0,
                             'Med_All' => 0,
                             'ENT_All' => 0,
                             'Dean_All' => 0,
                             'intgrated_All' => 0,
                             'Spec_Add_All' => 0,
                             'Teach_All' => 0,
                             'Orderly_All' => 0,
                             'Oth_All' => 0,
                             'Brain_Drain' => 0,
                             'ARA_2016_10PERCENT' => 0,
                             'House_Rent_1' => 0,
                             'House_Rent_2' => 0,
                             'Electric_Charges_1' => 0,
                             'Electric_Charges_2' => 0,
                             'SuiGas_Charges' => 0,
                             'Water_Tax1_Charges' => 0,
                             'Water_Tax2_Charges' => 0,
                             'Endovement_Fund' => 0,
                             'B_Fund' => 0,
                             'House_Build_Loan' => 0,
                             'Convence_Loan' => 0,
                             'GP_Fund_Regular' => 0,
                             'GP_Fund_Advence' => 0,
                             'Eid_Advance' => 0,
                             'Union_Fund_1' => 0,
                             'Union_Fund_2' => 0,
                             'Vehicle_Charges_Other' => 0,
                             'Vehicle_Charges_Teacher' => 0,
                             'Upkeep_Ded' => 0,
                             'R_Leave_Without_Pay' => 0,
                             'Recovery_Gap_CA' => 0,
                             'Income_Tax' => 0,
                             'Group_Insurance' => 0,
                             'Other' => 0
                            );

        $Fix = $Fix_P ;
        $Staff = $Staff_P ;


        // $flags_array[''] = 1 ;

        if ($Fix == 'N'){
            $flags_array['Basic_Pay'] = 1 ;
            $flags_array['Personal_Pay'] = 1 ;
            $flags_array['Hreant1_All'] = 1 ;
            $flags_array['Hrent_Sub_All'] = 1 ;
            $flags_array['Convence_All'] = 1 ;
            $flags_array['Adhoc_Rel_2010'] = 1 ;
            $flags_array['Computer_All'] = 1 ;
            $flags_array['Private_All'] = 1 ;
            $flags_array['Extra_All'] = 1 ;
            $flags_array['Senior_p_All'] = 1 ;
            $flags_array['Med_All'] = 1 ;
            $flags_array['ENT_All'] = 1 ;
            $flags_array['Dean_All'] = 1 ;
            $flags_array['intgrated_All'] = 1 ;
            $flags_array['Spec_Add_All'] = 1 ;
            $flags_array['Teach_All'] = 1 ;
            $flags_array['Orderly_All'] = 1 ;
            $flags_array['Oth_All'] = 1 ;
            $flags_array['Brain_Drain'] = 1 ;
            $flags_array['ARA_2016_10PERCENT'] = 1 ;
            $flags_array['House_Rent_1'] = 1 ;
            $flags_array['House_Rent_2'] = 1 ;
            $flags_array['Electric_Charges_1'] = 1 ;
            $flags_array['Electric_Charges_2'] = 1 ;
            $flags_array['SuiGas_Charges'] = 1 ;
            $flags_array['Water_Tax1_Charges'] = 1 ;
            $flags_array['Water_Tax2_Charges'] = 1 ;
            $flags_array['Endovement_Fund'] = 1 ;
            $flags_array['B_Fund'] = 1 ;
            $flags_array['House_Build_Loan'] = 1 ;
            $flags_array['Convence_Loan'] = 1 ;
            $flags_array['GP_Fund_Regular'] = 1 ;
            $flags_array['GP_Fund_Advence'] = 1 ;
            $flags_array['Eid_Advance'] = 1 ;
            $flags_array['Union_Fund_1'] = 1 ;
            $flags_array['Union_Fund_2'] = 1 ;
            $flags_array['Vehicle_Charges_Other'] = 1 ;
            $flags_array['Vehicle_Charges_Teacher'] = 1 ;
            $flags_array['Upkeep_Ded'] = 1 ;
            $flags_array['R_Leave_Without_Pay'] = 1 ;
            $flags_array['Recovery_Gap_CA'] = 1 ;
            $flags_array['Income_Tax'] = 1 ;
            $flags_array['Group_Insurance'] = 1 ;
            $flags_array['Other'] = 1 ;
        
            // $flags_array[''] = 1 ;
            // $flags_array[''] = 1 ;
            // $flags_array[''] = 1 ;
            // $flags_array[''] = 1 ;
            // $flags_array[''] = 1 ;
            // $flags_array[''] = 1 ;
        }

        if ($Fix == 'R' || $Fix == 'F'){
            $flags_array['Fixed_Pay'] = 1 ;
            if ($Fix == 'F'){
                $flags_array['Hreant1_All'] = 1 ;
                $flags_array['Dean_All '] = 1 ;
            }
        }

        if ($Staff != 'T'){
            $flags_array['Computer_All'] = 1 ;
        }



        /* Allowance Attached with this Specefic Employee */       
        

        // /* Deductions Attached with this Specefic Employee */  
      
     return $flags_array ;
    }
}
/*---------------------------------Retrun Employee Data------------------------------*/
{
    function return_emp_data($queryResult,$recordIndex){
        require ('./Connection.php');
        
        $resourceArray = array('Employee_Row' => 0 ,
                            'Department_Row' => 0,
                            'Qualification_Row' => 0,
                            'Designation_Row' => 0,
                            'Campus_Row' => 0,
                            'Allowance_Row' => 0,
                            'Deduction_Row' => 0,
                            'netSalaryRow' => 0,
                            'errorMsg' => 0
                            );

        $Employee_Row = 0 ;
        $Department_Row = 0 ;
        $Qualification_Row = 0 ;
        $Designation_Row = 0 ;
        $Campus_Row = 0 ;
        $Allowance_Row = 0 ;
        $Deduction_Row = 0 ;
        $netSalaryRow = 0 ;

        /* Adjusts the result pointer to an arbitrary row in the result */
        if (mysqli_data_seek($queryResult, $recordIndex)){
            
            $Employee_Row = mysqli_fetch_assoc($queryResult);

            /* Getting Resources References of Information attached with Employee Lies On Other Tables */
            $Employee_Code = $Employee_Row['Employee_Code'];
            $Department_ID = $Employee_Row['Department_ID'];
            $Qualification_ID = $Employee_Row['Qualification_ID'];
            $Designation_ID = $Employee_Row['Designation_ID'];
            $Campus_ID = $Employee_Row['Campus_ID'];


            /* Find Employee Department */
            $Department_Query = "SELECT * FROM Department WHERE Department_ID='$Department_ID'";
            if ($Department_Query_Result = mysqli_query($conn,$Department_Query)){

                if ($query_num = mysqli_num_rows($Department_Query_Result) > 0){
                    $Department_Row = mysqli_fetch_assoc($Department_Query_Result);
                }
                else{
                    $resourceArray['errorMsg'] = "Error: No Department Record Found!";
                }
            }
            else{
                $resourceArray['errorMsg'] = "Server Fault: To Getting Employee Department Resource!";
            }

            /* Find Employee Qualification  */
            $Qualification_Query = "SELECT * FROM Qualification WHERE Qualification_ID='$Qualification_ID'";
            if ($Qualification_Query_Result = mysqli_query($conn,$Qualification_Query)){
                
                if ($query_num = mysqli_num_rows($Qualification_Query_Result) > 0){
                    $Qualification_Row = mysqli_fetch_assoc($Qualification_Query_Result);
                }
                else{
                    $resourceArray['errorMsg'] = "Error: No Qualification Record Found!";
                }
                
            }
            else{
                $resourceArray['errorMsg'] = "Server Fault: To Getting Employee Qualification Resource!";
            }

            /* Find Employee Designation  */
            $Designation_Query = "SELECT * FROM Designation WHERE Designation_ID='$Designation_ID'";
            if ($Designation_Query_Result = mysqli_query($conn,$Designation_Query)){
                
                if ($query_num = mysqli_num_rows($Designation_Query_Result) > 0){
                    $Designation_Row = mysqli_fetch_assoc($Designation_Query_Result);
                }
                else{
                    $resourceArray['errorMsg'] = "Error: No Designation Record Found!";
                }
            }
            else{
                $resourceArray['errorMsg'] = "Server Fault: To Getting Employee Designation Resource!";
            }


            /* Find Employee Campus  */
            $Campus_Query = "SELECT * FROM Campus WHERE Campus_ID='$Campus_ID'";
            if ($Campus_Query_Result = mysqli_query($conn,$Campus_Query)){
            
                if ($query_num = mysqli_num_rows($Campus_Query_Result) > 0){
                    $Campus_Row = mysqli_fetch_assoc($Campus_Query_Result);
                }
                else{
                    $resourceArray['errorMsg'] = "Error: No Campus Record Found!";
                }
            }
            else{
                $resourceArray['errorMsg'] = "Server Fault: To Getting Employee Campus Resource!";
            }


            /* Find Employee Allowances  */
            $Deduction_Query = "SELECT * FROM Allowance WHERE Employee_Code='$Employee_Code'";
            if ($Deduction_Query_Result = mysqli_query($conn,$Deduction_Query)){
              
                if ($query_num = mysqli_num_rows($Deduction_Query_Result) > 0){
                    $Allowance_Row = mysqli_fetch_assoc($Deduction_Query_Result);
                }
                else{
                    $resourceArray['errorMsg'] = "Error: No Allowance Record Found!";
                }
            }
            else{
                $resourceArray['errorMsg'] = "Server Fault: To Getting Employee Allowance Resource!";
            }


            /* Find Employee Deductions  */
            $Deduction_Query = "SELECT * FROM Deduction WHERE Employee_Code='$Employee_Code'";      
            if ($Deduction_Query_Result = mysqli_query($conn,$Deduction_Query)){

                if ($query_num = mysqli_num_rows($Deduction_Query_Result) > 0){
                    $Deduction_Row = mysqli_fetch_assoc($Deduction_Query_Result);
                }
                else{
                    $resourceArray['errorMsg'] = "Error: No Deduction Record Found!";
                }
            }
            else{
                $resourceArray['errorMsg'] = "Server Fault: To Getting Employee Deduction Resource!";
            }


            /* Find Employee NetSalary  */
            $netSalaryQuery = "SELECT * FROM netsalary WHERE Employee_Code='$Employee_Code'";
            if ($NetSalaryQueryResult = mysqli_query($conn,$netSalaryQuery)){

                if ($query_num = mysqli_num_rows($NetSalaryQueryResult) > 0){
                    $netSalaryRow = mysqli_fetch_assoc($NetSalaryQueryResult);
                }
                else{
                    $resourceArray['errorMsg'] = "Error: No Net Salary Record Found!";
                }
            }
            else{
                $resourceArray['errorMsg'] = "Server Fault: To Getting Employee Net Salary Resource!";
            }

        }
        else{
            $resourceArray['errorMsg'] = "Sorry! No Record Found!" ;
        }

        /* Return Back */
        $resourceArray['Employee_Row'] = $Employee_Row ;
        $resourceArray['Department_Row'] = $Department_Row ;
        $resourceArray['Qualification_Row'] = $Qualification_Row ;
        $resourceArray['Designation_Row'] = $Designation_Row ;
        $resourceArray['Campus_Row'] = $Campus_Row ;
        $resourceArray['Allowance_Row'] = $Allowance_Row ;
        $resourceArray['Deduction_Row'] = $Deduction_Row ;
        $resourceArray['netSalaryRow'] = $netSalaryRow ;
        
        return $resourceArray ;
    }

    function return_emp_resources($id,$date=0,$deleteEmp=0){
        require dirname(__FILE__).'/Connection.php' ;
        
        $resourceArray = array('Employee_Row' => 0,
                            'Employee_Teach_Row' => 0,
                            'Employee_NonTeach_Row' => 0,
                            'Employee_Neb_Row' => 0,
                            'Allowance_Row' => 0,
                            'Deduction_Row' => 0,
                            'netSalaryRow' => 0,
                            'errorMsg' => 0,
                            'staff' => 0
                            );

        $empTeachRow = 0;
        $empNonTeachRow = 0;
        $empNebRow = 0;
        $Employee_Row = 0;
        $Allowance_Row = 0;
        $Deduction_Row = 0;
        $netSalaryRow = 0;
        $errorMsg = "";
        $Staff = NULL;

        if ($deleteEmp){
            $query = "SELECT * FROM `employee_history` WHERE Employee_Code='$id'";
        }
        else{
            $query = "SELECT * FROM employee WHERE Employee_Code='$id'";
        }
        
        if ($result = mysqli_query($conn,$query)){

            if ($query_num = mysqli_num_rows($result) > 0){
                $Employee_Row = mysqli_fetch_assoc($result);
                $Staff = $Employee_Row['Staff'];
            }
            else{
                $errorMsg = "Sorry! Employee Record Not Found!";
            }
        }
        else{
            $errorMsg = "Server Fault: To Getting Employee Resource." . mysqli_error($conn);
        }
        @mysqli_free_result($result);

        /* Get Employee Personal Information for non-deleted employee*/
        if (empty($errorMsg) && empty($deleteEmp)){

            if ($Staff=='T'){
                $query = "SELECT * FROM `employee_teaching_view` WHERE Employee_Code='$id'" ;
                if ($result = mysqli_query($conn,$query)){

                    if (mysqli_num_rows($result) > 0){
                        $empTeachRow = mysqli_fetch_assoc($result);
                    }
                    else{
                        $errorMsg = "Error: Employee Teaching Record Not Found.";
                    }
                }
                else{
                    $errorMsg = "Server Fault: To Getting Employee Teaching Resource!". mysqli_error($conn);
                }
                @mysqli_free_result($result);
            }
            elseif ($Staff=='N'){
                $query = "SELECT * FROM `employee_non_teaching_view` WHERE Employee_Code='$id'" ;
                if ($result = mysqli_query($conn,$query)){

                    if (mysqli_num_rows($result) > 0){
                        $empNonTeachRow = mysqli_fetch_assoc($result);
                    }
                    else{
                        $errorMsg = "Error: Employee Non Teaching Record Not Found.";
                    }
                }
                else{
                    $errorMsg = "Server Fault: To Getting Employee Non Teaching Resource!". mysqli_error($conn);
                }
                @mysqli_free_result($result);
            }
            else{
                $query = "SELECT * FROM `employee_nebqasid_view` WHERE Employee_Code='$id'" ;
                if ($result = mysqli_query($conn,$query)){

                    if (mysqli_num_rows($result) > 0){
                        $empNebRow = mysqli_fetch_assoc($result);
                    }
                    else{
                        $errorMsg = "Error: Employee Neb Qasid Record Not Found.";
                    }
                }
                else{
                    $errorMsg = "Server Fault: To Getting Employee Neb Qasid Resource!". mysqli_error($conn);
                }
                @mysqli_free_result($result);
            }
        }

        
        /*Get Allownces Deduction NetSalary Information*/
        if (empty($errorMsg)){
            if (!empty($date)){
                $query = "SELECT * FROM `allowance_history` WHERE Employee_Code='$id' AND `Date`='$date'";
            }
            else{
                $query = "SELECT * FROM `allowance` WHERE Employee_Code='$id'";
            }

            if ($result = mysqli_query($conn,$query)){
              
                if ($query_num = mysqli_num_rows($result) > 0){
                    $Allowance_Row = mysqli_fetch_assoc($result);
                }
                else{
                    $errorMsg = "Error: Allowance Record Not Found.";
                }
            }
            else{
                $errorMsg = "Server Fault: To Getting Employee Allowance Resource!". mysqli_error($conn);
            }
            @mysqli_free_result($result);

            if (!empty($date)){
                $query = "SELECT * FROM `deduction_history` WHERE Employee_Code='$id' AND `Date`='$date'";
            }
            else{
                $query = "SELECT * FROM `deduction` WHERE Employee_Code='$id'";
            }
            
            if ($result = mysqli_query($conn,$query)){
              
                if ($query_num = mysqli_num_rows($result) > 0){
                    $Deduction_Row = mysqli_fetch_assoc($result);
                }
                else{
                    $errorMsg = "Error: Deduction Record Not Found.";
                }
            }
            else{
                $errorMsg = "Server Fault: To Getting Employee Deduction Resource!". mysqli_error($conn);
            }
            @mysqli_free_result($result);

            if (!empty($date)){
                $query = "SELECT * FROM `netsalary_history` WHERE Employee_Code='$id' AND `Date`='$date'";
            }
            else{
                $query = "SELECT * FROM `netsalary` WHERE Employee_Code='$id'";
            }

            
            if ($result = mysqli_query($conn,$query)){
              
                if ($query_num = mysqli_num_rows($result) > 0){
                    $netSalaryRow = mysqli_fetch_assoc($result);
                }
                else{
                    $errorMsg = "Error: NetSalary Record Not Found.";
                }
            }
            else{
                $errorMsg = "Server Fault: To Getting Employee NetSalary Resource!". mysqli_error($conn);
            }
            @mysqli_free_result($result);
        }
       
        /* Return Back */
        $resourceArray['Employee_Row'] = $Employee_Row ;
        $resourceArray['Employee_Teach_Row'] = $empTeachRow ;
        $resourceArray['Employee_NonTeach_Row'] = $empNonTeachRow ;
        $resourceArray['Employee_Neb_Row'] = $empNebRow ;
        $resourceArray['Allowance_Row'] = $Allowance_Row ;
        $resourceArray['Deduction_Row'] = $Deduction_Row ;
        $resourceArray['netSalaryRow'] = $netSalaryRow ;
        $resourceArray['staff'] = $Staff ;
        $resourceArray['errorMsg'] = $errorMsg;

        @mysqli_close($conn);
            
        return $resourceArray ;
    }

    function return_record($query){
        require dirname(__FILE__).'/Connection.php';

        $record = array('row' => 0, 
                        'errorMsg' => 0
                        );

        $result = mysqli_query($conn,$query) ;
        if ($result){

            if (mysqli_num_rows($result) > 0){

                $record['row'] = mysqli_fetch_assoc($result) ;
                
            }
            else{
                $record['errorMsg'] = "Sorry! Record Not Found." ;
            }

        }
        else{
            $record['errorMsg'] = "Sorry! Server Fault: " . mysqli_error($conn) ;
        }

        @mysqli_free_result($result);
        mysqli_close($conn);
        return $record ;
    }

    function return_allownces_history($id,$date){

        $allowncesRecord = 0;

        $query = "SELECT * FROM allownces_history WHERE Employee_Code ='$id' AND `Date` = '$date' ";
        $allowncesRecord = return_record($query) ;

        return $allowncesRecord ;
    }

    function return_deductions_history($id,$date){
        $deductoinsRecord = 0 ;

        $query = "SELECT * FROM deduction_history WHERE Employee_Code ='$id' AND `Date` = '$date' ";
        $deductoinsRecord = return_record($query) ;

        return $deductoinsRecord ;
    }

    function return_netsalary_history($id,$date){
        $netsalaryRecord = 0;

        $query = "SELECT * FROM netsalary_history WHERE Employee_Code ='$id' AND `Date` = '$date' ";
        $netsalaryRecord = return_record($query) ;

        return $netsalaryRecord ;
    }
}

/*---------------------------------Generate Word Document------------------------------*/
function generate_word($id,$date=0,$deleteEmp=0){
    include dirname(__FILE__).'/Connection.php';
    require_once dirname(__FILE__).'/vendor/autoload.php';

    $empResource = return_emp_resources($id,$date,$deleteEmp) ;

    if (empty($empResource['errorMsg'])){

        if ($empResource['staff'] == 'T' && empty($deleteEmp) ){
            $row = $empResource['Employee_Teach_Row'] ;
        }
        elseif($empResource['staff'] == 'N' && empty($deleteEmp) ){
            $row = $empResource['Employee_NonTeach_Row'] ;
        }
        elseif ($empResource['staff'] == 'N' && empty($deleteEmp) ){
            $row = $empResource['Employee_Neb_Row'] ;
        }
        else{
            $row = $empResource['Employee_Row'] ;
        }

        $Allowance_Row = $empResource['Allowance_Row'] ;
        $Deduction_Row = $empResource['Deduction_Row'] ;
        $netSalaryRow = $empResource['netSalaryRow'] ;

        $Employee_Code = $row['Employee_Code'] ;            
        $Employee_Name = $row['Employee_Name'] ;
        $Father_Name = $row['Father_Name'] ;
        $BPS = $row['BPS'] ;
        $CNIC = $row['CNIC'] ;
        $Address = $row['Address'] ;
        $Email = $row['Email'] ;        
        $NTN = (empty($row['NTN']) ? "None" : $row['NTN']) ;
        $Account = $row['Account'] ;
        
        $Fix = $row['Fix'] ;
        if($Fix=='R')
            {$Fix="Regular";}
        else
            {$Fix="Fix";}

        if($row['Staff']=="T")
            {$Staff="Teaching";}
        elseif($row['Staff']=="N")
            {$Staff="Non-Tech";}
        else
            {$Staff="Neb-Qasid";}

        $Designation = $row['Designation'] ;
        $Campus = $row['Campus'] ;
        $House = ($row['House'] ? "Yes" : "No" ) ;
        $Vehicle = ($row['vehicle'] ? "Yes" : "No" );
        $Marital_Status = ($row['Marital_Status'] ? "Yes" : "No" ) ;
        $Join_Date = $row['Join_Date'] ;
        
        if($row['Staff']=="T"){
            $Department = $row['Department_Name'] ;
            $Qualification = $row['Qualification'] ;
            $Admin_Position = $row['Admin_Position'] ;

            $Section = "N/A" ;
            $DepartmentOther = "N/A" ;
        }
        elseif($row['Staff']=="N"){
            $Section = $row['Section_Name'];
            $Department = "N/A" ;
            $DepartmentOther = "N/A" ;
            $Qualification = "N/A" ;
            $Admin_Position = "N/A" ;
        }
        else{
            $DepartmentOther = $row['Department_Name'] ;
            $Section = "N/A" ;
            $Department = "N/A" ;
            $Qualification = "N/A" ;
            $Admin_Position = "N/A" ;
        }

        $Basic_Pay     = $Allowance_Row['Basic_Pay'] ;
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

        $Gross_Pay =  $netSalaryRow['Gross_Pay'];
        $Total_Deduction =  $netSalaryRow['totalDeduction'];
        $netSalary = $netSalaryRow['Net_Salary'];

        /* Generate View */
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(__FILE__).'/template/employeeHistoryTemplate.docx');
        /* Personal Inforamation */
        $templateProcessor->setValue('id', $Employee_Code);
        $templateProcessor->setValue('name', $Employee_Name);
        $templateProcessor->setValue('fname', $Father_Name);
        $templateProcessor->setValue('bps', $BPS);
        $templateProcessor->setValue('email', $Email);
        $templateProcessor->setValue('desig', $Designation);
        $templateProcessor->setValue('staff', $Staff);
        $templateProcessor->setValue('fixed', $Fix);
        $templateProcessor->setValue('accno', $Account);
        $templateProcessor->setValue('ntn', $NTN);
        $templateProcessor->setValue('cnic', $CNIC);
        $templateProcessor->setValue('campus', $Campus);
        $templateProcessor->setValue('house', $House);
        $templateProcessor->setValue('vehicle', $Vehicle);
        $templateProcessor->setValue('married', $Marital_Status);
        $templateProcessor->setValue('joindate', $Join_Date);

        $templateProcessor->setValue('dept', $Department);
        $templateProcessor->setValue('deptother', $DepartmentOther);
        $templateProcessor->setValue('section', $Section);
        $templateProcessor->setValue('admin', $Admin_Position);
        $templateProcessor->setValue('quali', $Qualification);
        

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
        if (!empty($date)){
            $payRollDate = $date ; 
        }
        else{
            $payRollDate = date('M-Y');
        }
        
        $templateProcessor->setValue('payRollDate', $payRollDate);
        $fileName = $Employee_Name . "_" . $payRollDate ;
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=".$fileName.".docx");

        // $templateProcessor->saveAs('results/Sample_23_TemplateBlock.docx');
        $templateProcessor->saveAs('php://output');
    }
    else {
        return $empResource['errorMsg'] ;
    }

}










?>