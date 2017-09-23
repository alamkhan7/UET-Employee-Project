<?php
require './Connection.php' ;
session_start();

$going_back = '../operator.php' ;
$Error = '';
$Label = '' ;
$user_name = '' ;

/*Admin Section*/
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


/*Add New Operator*/
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

/* Change Operator Username/Password */
if(isset($_POST['findOperator']) )
{
  if(isset($_POST['searchOP']))
  {
    $searchOP = $_POST['searchOP'] ;

    if(!empty($searchOP))
    {
    	$query = "SELECT * FROM User WHERE Username='$searchOP'";

    	if($query_result = mysqli_query($conn,$query))
    	{
    		$query_num = mysqli_num_rows($query_result) ;
    		if ($query_num > 0 )
    		{
    			$record = mysqli_fetch_assoc($query_result) ;
                $user_name = $record['Username'] ;

                $Message = "Operator username found <strong>Successfully.</strong>";
                $Label='alert-success';
    		}
    		else
    			$Message = "<strong>Sorry!</strong> Operator username not found!";

    	}
    	else
    		$Message = "Internal Server Error.";

    }
    else
    	$Message = "Please fill the fields.";
  }


}

header('Location: '.$going_back . '?Error='.urlencode($Message) .'&Label='.urlencode($Label).'&username='.urlencode($user_name));
?>