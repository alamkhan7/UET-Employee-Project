<?php
/*
    (C) Habibullah
        https://github.com/Habibullah-UET
        18/04/2017
*/
require './Connection.php' ;
session_start();

$Message = "" ;
$going_back = "../operator.php"; 
$Label = '' ;

if(isset($_POST['addnewOP']) )
{
  if(isset($_POST['newusername']) || isset($_POST['newpassword']) || isset($_POST['confpassword']) )
  {
    $New_Username = $_POST['newusername'] ;
    $Password = $_POST['newpassword'] ;
    $Confirm_Password = $_POST['confpassword'] ;

   // $Username = $_SESSION['Username'];

     
    if(!empty($New_Username) && !empty($Password) && !empty($Confirm_Password))
    {
       if ($Password == $Confirm_Password)
       {        
                /* Verify that this user does not exist already */
                $query = "SELECT * FROM User WHERE Username='$New_Username'";

                if($query_result = mysqli_query($conn,$query))
                {
                    $query_num = mysqli_num_rows($query_result) ;
                    if ($query_num == 0 )
                    {   

                                /* Encrypte new Password */
                                // A higher "cost" is more secure but consumes more processing power
                                $cost = 10;

                                // Create a random salt 
                                $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

                                // Prefix information about the hash so PHP knows how to verify it later.
                                // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
                                $salt = sprintf("$2a$%02d$", $cost) . $salt;

                                // Hash the password with the salt
                                $Password_Hash = crypt($Password, $salt); // That it..

                                $query = "INSERT INTO User(Username,Password) VALUES ('$New_Username','$Password_Hash')";
                                if($query_result = mysqli_query($conn,$query))
                                {
                                   $Message = "Account Created Successfully.";
                                   $Label='alert-success';     
                                }
                                else
                                {
                                    $Message = "Internal Server Error."; 
                                }
                                
                                

                    }
                    else
                    $Message = "Username already exists.";
                }

       }
        else
           $Message = "New Password and Confirm Password does not Match.";
    }
    else
      $Message = "Please fill the fields.";
  }
  
 
}

header('Location: '.$going_back . '?Error='.urlencode($Message) .'&Label='.urlencode($Label)  ) ;

?>