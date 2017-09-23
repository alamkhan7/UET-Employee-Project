<?php
/*
    (C) Habibullah
        https://github.com/Habibullah-UET
        18/04/2017
*/
require './Connection.php' ;
session_start();


$Message = "" ;
$going_back = "../Profile.php"; 
$Label='';

if(isset($_POST['adminchange']) )
{
  if(isset($_POST['OldPassword']) || isset($_POST['NewPassword']) || isset($_POST['ConfirmPassword']) )
  {
    $Old_Password = $_POST['OldPassword'] ;
    $New_Password = $_POST['NewPassword'] ;
    $Confirm_Password = $_POST['ConfirmPassword'] ;

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
                                                    $Message = "Password Updated Successfully.";
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
           $Message = "New Password and Confirm Password does not Match.";
    }
    else
      $Message = "Please fill the fields.";
  }
  
 
}

// return back to index page if error 
header('Location: '.$going_back . '?Error='.urlencode($Message) .'&Label='.urlencode($Label)  ) ;

?>