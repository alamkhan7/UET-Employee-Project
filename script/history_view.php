<?php 

include_once dirname(__FILE__).'/Connection.php' ;
include_once dirname(__FILE__).'/function_inc.php' ;

$errorMsg = "" ;
$going_back = "../history.php" ;
$id = $_POST['search'] ;

if (isset($_POST['current']) && !empty($id) ){

	$query = "SELECT * FROM employee WHERE Employee_Code='$id'";
  	if ($result = mysqli_query($conn, $query)) {
     	if (mysqli_num_rows($result) > 0 ){

     		$allowncesQuery = "SELECT * FROM allownces_history WHERE Employee_Code='$id'" ;
			$dedutionQuery = "SELECT * FROM deduction_history WHERE Employee_Code='$id'" ;
			$netsalaryQuery = "SELECT * FROM netsalary_history WHERE Employee_Code='$id'" ;

			$allowncesCount = return_total($allowncesQuery,$id) ;
			$deductionCount = return_total($dedutionQuery,$id) ;
			$netsalaryCount = return_total($netsalaryQuery,$id) ;

			if ( empty($allowncesCount['errorMsg']) && empty($deductionCount['errorMsg']) && empty($netsalaryCount['errorMsg']) ){
				/*If all count is equal then no error (A==B A==C then B==C)*/
				if ($allowncesCount['totalRecord'] == $deductionCount['totalRecord'] && $allowncesCount['totalRecord'] == $netsalaryCount['totalRecord'] && $allowncesCount['totalRecord'] != 0){
					/* return the id in header function below  */
				}
				else{
					$errorMsg = "Sorry! Server Fault (Incorrect Record).". mysqli_error($conn) ;
					$id = 0;
				}

			}
			else{

				if (!$allowncesCount['errorMsg'])
					$errorMsg = $allowncesCount['errorMsg'] ;
				elseif (!$deductionCount['errorMsg'])
					$errorMsg = $deductionCount['errorMsg'] ;
				else
					$errorMsg = $netsalaryCount['errorMsg'] ;

				
			}
     	}
     	else{
     		$errorMsg = "Sorry! Record Not Found." ;
     		$id = 0 ;
     	}
  	}
  	else{
    	$errorMsg = "Sorry! Server Fault. " . mysqli_error($conn) ;
    	$id = 0;
  	}

	@mysqli_free_result($result);
	@mysqli_close($conn) ;

	header('Location: '.$going_back . '?id='.urlencode($id).'&Error='.urlencode($errorMsg)  ) ;
}

if (isset($_POST['delete']) && !empty($id) ){

  	$query = "SELECT * FROM employee_history WHERE Employee_Code='$id'";
  	if ($result = mysqli_query($conn, $query)) {
     	if (mysqli_num_rows($result) > 0 ){

     		$allowncesQuery = "SELECT * FROM allownces_history WHERE Employee_Code='$id'" ;
			$dedutionQuery = "SELECT * FROM deduction_history WHERE Employee_Code='$id'" ;
			$netsalaryQuery = "SELECT * FROM netsalary_history WHERE Employee_Code='$id'" ;

			$allowncesCount = return_total($allowncesQuery,$id) ;
			$deductionCount = return_total($dedutionQuery,$id) ;
			$netsalaryCount = return_total($netsalaryQuery,$id) ;

			if ( empty($allowncesCount['errorMsg']) && empty($deductionCount['errorMsg']) && empty($netsalaryCount['errorMsg']) ){
				/*If all count is equal then no error (A==B A==C then B==C)*/
				if ($allowncesCount['totalRecord'] == $deductionCount['totalRecord'] && $allowncesCount['totalRecord'] == $netsalaryCount['totalRecord'] && $allowncesCount['totalRecord'] != 0){
					/* return the id in header function below  */
				}
				else{
					$errorMsg = "Sorry! Server Fault (Incorrect Record).". mysqli_error($conn) ;
					$id = 0;
				}

			}
			else{

				if (!$allowncesCount['errorMsg'])
					$errorMsg = $allowncesCount['errorMsg'] ;
				elseif (!$deductionCount['errorMsg'])
					$errorMsg = $deductionCount['errorMsg'] ;
				else
					$errorMsg = $netsalaryCount['errorMsg'] ;
			}
     	}
     	else{
     		$errorMsg = "Sorry! Record Not Found." ;
     		$id = 0 ;
     	}
  	}
  	else{
    	$errorMsg = "Sorry! Server Fault. " . mysqli_error($conn) ;
    	$id = 0;
  	}

	@mysqli_free_result($result);
	@mysqli_close($conn) ;

	

	header('Location: '.$going_back . '?oldempid='.urlencode($id).'&Error='.urlencode($errorMsg)  ) ;
}

// if (empty($errorMsg))
// 	$errorMsg = "Please Enter ID/Name." ;

?>