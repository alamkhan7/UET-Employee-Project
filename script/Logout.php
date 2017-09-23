<?php
include './function_inc.php' ;
session_start();

	if (loggedin())
	{
		unset($_SESSION['Username']) ;
		$going_back = "../index.php";
		header('Location: '.$going_back);
	}
	// else
	// {
	// 	echo "<strong>Error:</strong> Your not loggedin!<br/>";
	// }
	

?>
