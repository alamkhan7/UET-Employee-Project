<?php
include './script/checkLogin.php' ;
include './test.php' ;

// If user is not loggedin then redirect him to login Page
if (!loggedin())
  header("Location: ./login_page.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Custome CSS style -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- fontawesome -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
  <style type="text/css">
    @media screen and (min-width: 992px){
      #form-buscar .col-md-7{
        width: 55.333333%;
      }
      .for-border{
        border-right: 1px solid black;
      }
    }
    .error{color:red;font-weight:500;}
  </style>

  <title>::Employee Management</title>
</head>

<body>
<?php include ('header_inc.php'); ?>

<!--*******************************************End Of Header**************************************************-->
<?php if (isset($_GET['Error']) && !empty($_GET['Error']))
{
  if (isset($_GET['Label']) && !empty($_GET['Label']))
  {
    $label = rawurldecode($_GET['Label']) ;
  }
  else
  {
    $label = 'alert-danger' ;
  }
?>
  <div class="container-fluid">
    <div class="col-sm-6 col-md-offset-3">
        <div class="alert <?php echo $label;?> text-center">
        <a href="" class="close" data-dismiss="alert" aria-label="Close"> &times; </a>
          <?php echo $_GET['Error']; ?>
        </div>
    </div>
  </div>
<?php
}
?>


<div class="container-fluid">
  <div class="row">
  
    <div id="logo" class="text-center">
      <h4> Change Password </h4>
    </div>
    <div  class="col-md-3">
         
    </div>
    <div class="col-sm-12 col-md-6">
      <form class="form-horizontal col-sm-12 col-md-12" id="userPasswordForum" action="./script/ChangeUserPassword.php" method="POST">
        <div id="logo" class="text-center">
          
        </div>
        <br>
        <fieldset>
          <!-- Text input -->
          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="OldPassword">Old Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="OldPassword" name="OldPassword" placeholder="Old Password" class="form-control input-md" type="password" maxlength="30" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="NewPassword">New Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="NewPassword" name="NewPassword" placeholder="New Password" class="form-control input-md" type="password" maxlength="30" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="ConfirmPassword">Confirm Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="ConfirmPassword" name="ConfirmPassword" placeholder="New Password" class="form-control input-md" type="password" maxlength="30" required>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-sm-4 col-md-1 control-label" for="adminchange"></label>
            <div class="col-sm-6 col-md-offset-3 col-md-4">
              <button id="adminchange" name="adminchange" type="submit" class="btn btn-primary">Change</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
    <!-- End of column -->
<!--*****************************************End Admin Section**************************************************-->    
  </div>   
  </div>  
</div>
<!--*******************************************End Of Container*************************************************-->





<!-- jQuery library -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/bootstrap-datetimepicker.uk.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Custom Script  -->
  <script src="js/validation.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
        document.getElementById('OldPassword').value = "";
    });


  </script>

</body>
</html>