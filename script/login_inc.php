<?php
require './Connection.php' ;

ob_start();
session_start();


$returnMSG = "" ;
$going_back = "../login.php"; 

if(isset($_POST['submit']) ){

  if(isset($_POST['username']) || isset($_POST['password']) ){

    // To protect against sql injection we use mysql_real_escape_string() function
    // Which adds escape character and this function can only be used when open valid sql connection 
    // establish or when are connected to mysql database 
    $username = mysqli_real_escape_string($conn,$_POST['username']) ;
    $password = mysqli_real_escape_string($conn,$_POST['password']) ;

    if(!empty($username) && !empty($password)){

      $query = "SELECT * FROM User WHERE Username='$username'";

      if($query_result = mysqli_query($conn,$query)){

        $query_num = mysqli_num_rows($query_result) ;
        
        if ($query_num > 0 ){

          $record = mysqli_fetch_assoc($query_result) ;
          $user_name = $record['Username'] ;
          $Password_Hash = $record['Password'] ;
          
          /* Latest Update */
          if ( hash_equals($Password_Hash, crypt($password, $Password_Hash)) ){
            $_SESSION['Username'] = $user_name ;
          }
          else{
            $returnMSG = "<b>Invalid password!</b>";
          }

        }
        else{
          $returnMSG = "<b>Username not exist!</b>";
        }

      }
      else{
        $returnMSG = "<b>Sorry! Server Fault.</b>";
      }

    }
    else{
      $returnMSG = "<b>Please fill username and password!</b>";
    }

  }
  
}

// return back to index page if error 
// encode string for url
header('Location: '.$going_back.'?returnMSG='. urlencode($returnMSG));

?>