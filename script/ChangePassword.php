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

if(isset($_POST['adminchange']) )
{
  if(isset($_POST['adminoldpassword']) || isset($_POST['adminnewpassword']) || isset($_POST['adminconfpassword']) )
  {
    $Old_Password = $_POST['adminoldpassword'] ;
    $New_Password = $_POST['adminnewpassword'] ;
    $Confirm_Password = $_POST['adminconfpassword'] ;

    $Username = $_SESSION['Username'];

     
    if(!empty($Old_Password) && !empty($New_Password) && !empty($Confirm_Password))
    {
       if ($New_Password == $Confirm_Password)
       {
                $query = "SELECT * FROM User WHERE Username='$Username'";

                if($query_result = mysqli_query($conn,$query))
                {
                    $query_num = mysqli_num_rows($query_result) ;
                    if ($query_num > 0 )
                    {
                            $record = mysqli_fetch_assoc($query_result) ;
                            $user_name = $record['Username'] ;
                            $Password_Hash = $record['Password'] ;
                            
                            /*
                            
                            Warning:
                            When validating passwords, a string comparison function that isn't vulnerable to timing attacks 
                            should be used to compare the output of crypt() to the previously known hash. 
                            PHP 5.6 onwards provides hash_equals() for this purpose.
                            
                            */
                            
                            if ( hash_equals($Password_Hash, crypt($Old_Password, $Password_Hash)) )
                            {
                                include ('./Security.php');   
                                $New_Pass_Hash = Encrypt($New_Password);
                                
                                /* For Safe update the update query should be applied aganist a key column */
                                    /* We Need User ID */

                                $query = "SELECT User_ID FROM User WHERE Username='$Username'";
                                if($query_result = mysqli_query($conn,$query))
                                {
                                    $query_num = mysqli_num_rows($query_result) ;
                                    if ($query_num > 0 )
                                    {
                                        $record = mysqli_fetch_assoc($query_result) ;
                                        $User_ID = $record['User_ID'] ;
                                        $query = "UPDATE user SET Password='$New_Pass_Hash' WHERE User_ID='$User_ID'";
                                        
                                            if($query_result = mysqli_query($conn,$query))
                                                {
                                                    $Message = '<strong>Congratulations!</strong> Password updated successfully.' ;
                                                    $Label='alert-success';
                                                }

                                
                                    }
                                    else
                                        $Message = "Internal Error";
                                }

                                else
                                    {
                                    $Message = "Internal Error";
                                    }
                                

                            }
                            else
                            $Message = "Invalid old Password ";

                    }
                    else
                    $Message = "Internal Error";
                }

       }
        else
           $Message = "<strong>Password!</strong> Enter the same password";
    }
    else
      $Message = "Please fill the fields.";
  }
  
 
}

// return back to index page if error 

header('Location: '.$going_back . '?Error='.urlencode($Message) .'&Label='.urlencode($Label)  ) ;

?>