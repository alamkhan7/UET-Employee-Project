<?php
  
  /* For Index Page */
  if(isset($_GET['term']) && !empty($_GET['term'])){

    include_once './Connection.php' ;
    
    //get search term
    $searchTerm = mysqli_real_escape_string($conn,$_GET['term']) ;
    
    // 2-D Array
    $data = array(array());
    /*Remove empty element*/
    array_pop($data);       
    
    if ( preg_match("/\\d/",$searchTerm) ){
        /* If they searchTerm have numric value then search base is Employee_Code */
        
        $query = ("SELECT Employee_Code,Employee_Name FROM employee WHERE Employee_Code LIKE '%".$searchTerm."%' ");
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
    }
    else{
        $query = ("SELECT Employee_Code,Employee_Name FROM employee WHERE Employee_Name LIKE '%".$searchTerm."%' ");
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
    }
    //return json data
    echo json_encode($data);
  }


  /* For Operator Page*/
  if(isset($_POST['operatorSearch']) && !empty($_POST['operatorSearch']))
  {
    include('./Connection.php');
    $searchText = mysqli_real_escape_string( $conn, $_POST['operatorSearch'] );

    $output = '<ul class="list-group">' ;
    /* Query Searching name from database useing Ajax  */
    /* $Search_Query = "SELECT name FROM test WHERE name like '".mysql_real_escape_string($searchText)."'%"; */
    $Search_Query = "SELECT Username FROM user WHERE Username like '$searchText%'";
    if ($Search_Query_Result = mysqli_query($conn,$Search_Query))
    {
      if ($query_num = mysqli_num_rows($Search_Query_Result) > 0)
      {
        while ($Resulting_Row = mysqli_fetch_assoc($Search_Query_Result)) {
          $name =  $Resulting_Row['Username'] ;
          $output .= '<li class="list-group-item">' . $name .'</li>' ;

        }
        
      }
      else
      {
        $output .= '<li class="list-group-item">Username not found!</li>' ;
      }
    }
    else
    {
      echo $errorMSG = "Error: To Getting Name Resource!<br>";
    }

    echo $output .= '</ul>' ;
  }

  












?>