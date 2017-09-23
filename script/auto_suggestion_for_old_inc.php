<?php 
include_once dirname(__FILE__).'/Connection.php' ;

/* For History Page but for old search box */
if(isset($_GET['term']) && !empty($_GET['term'])){

	//get search term
	$searchTerm = mysqli_real_escape_string($conn,$_GET['term']) ;

	// 2-D Array
	$data = array(array());
	/*Remove empty element*/
	array_pop($data);       

	if ( preg_match("/\\d/",$searchTerm) ){
	    /* If they searchTerm have numric value then search base is Employee_Code */
	    
	    $query = ("SELECT Employee_Code,Employee_Name FROM employee_history WHERE Employee_Code LIKE '%".$searchTerm."%' ");
	    //get matched data from skills table
	    if($query_result = mysqli_query($conn,$query)){
	    
	        while ($row = mysqli_fetch_assoc($query_result)){
	            $id = $row['Employee_Code'] ;
	            $name = $row['Employee_Name'] ;
	            $new  = array('label' => $name, 'value' => $id );
	            array_push($data, $new) ;
	        }
	    }
	    else{
	        $new  = array('label' => 'Server Fault!', 'value' => '' );
	        array_push($data, $new) ;
	    }

	    @mysqli_free_result($query_result) ;
	}
	else{
	    $query = ("SELECT Employee_Code,Employee_Name FROM employee_history WHERE Employee_Name LIKE '%".$searchTerm."%' ");
	    //get matched data from skills table
	    if($query_result = mysqli_query($conn,$query)){
	    
	        while ($row = mysqli_fetch_assoc($query_result)){
	            $id = $row['Employee_Code'] ;
	            $name = $row['Employee_Name'] ;
	            $new  = array('label' => $name, 'value' => $id );
	            array_push($data, $new) ;
	        }
	    }
	    else{
	        $new  = array('label' => 'Server Fault!', 'value' => '' );
	        array_push($data, $new) ;
	    }

	    @mysqli_free_result($query_result) ;
	}


//return json data
echo json_encode($data);
}



?>