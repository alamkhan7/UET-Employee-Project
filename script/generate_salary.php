<?php 
include_once dirname(__FILE__).'/Connection.php';

$errorMsg = "" ;
$going_back = "../update1.php" ;

/* Generate salary for individual employee*/
if (isset($_GET['generate']) && !empty($_GET['search'])){

	$ID = $_GET['search'];
  
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

/* Generate salary for all employee */
if (isset($_GET['generateAll']) ){

	$Query = "CALL generate_salary_all()";

 	$Result=mysqli_query($conn,$Query);
      
  	if($Result){
    	$returnMsg = "Generate Successful.";
      	$Label='alert-success';
  	}
  	else{
    	$returnMsg = ("Sorry! Server Fault Generate Salary: ". mysqli_error($conn));
  	}

  	@mysqli_free_result($Result);
  	$going_back = "../view.php" ;
}

@mysqli_close($conn);
header('Location: '.$going_back . '?returnMsg='.urlencode($returnMsg) .'&Label='.urlencode($Label)  ) ;



?>