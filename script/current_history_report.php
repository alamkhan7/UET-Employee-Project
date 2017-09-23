<?php 

require_once './function_inc.php' ;
require_once 'vendor/autoload.php';

date_default_timezone_set('Asia/Karachi');

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

$errorMsg = "" ;
$going_back = "../history.php" ;
$id = $_GET['id'];
$date = $_GET['date'] ;

if( isset($_GET['generate']) && !empty($id) && !empty($date) ){

	/* If request come for deleted employee then generate report for deleted empolyee */
	if (isset($_GET['deleted'])){
		$errorMsg = generate_word($id,$date,1) ;
	}
	else{
		$errorMsg = generate_word($id,$date) ;	
	}
		
}

if (!empty($errorMsg))
	header('Location: '.$going_back . '?id='.urlencode($id).'&Error='.urlencode($errorMsg)  ) ;



?>