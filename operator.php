<?php
include_once './script/function_inc.php' ;

// If user is not loggedin then redirect him to login Page
if (!loggedin())
  header("Location: ./login.php");
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
      #form-buscar .form-group{
        margin-bottom: -5px;
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
      <h4>Add/Change Operator Account</h4>
    </div>

    <div class="col-sm-12 col-md-6" >
      <form role="form" class="form-horizontal col-sm-12 col-md-12 for-border" id="ChangeOP" action="./script/operator.php" method="POST">
        <div id="logo" class="text-center">
          <h4>Add new Operator</h4>
        </div>
        <br>
        <fieldset>
          <!-- Text input -->
          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="newusername">New Username:</label>
            <div class="col-sm-6 col-md-5">
              <input id="newusername" name="newusername" placeholder="New username" class="form-control input-md" type="text" maxlength="30">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="newpassword">New Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="newpassword" name="newpassword" placeholder="New password" class="form-control input-md" type="text" maxlength="30">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="confpassword">Confirm Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="confpassword" name="confpassword" placeholder="Confirm new password" class="form-control input-md" type="text" maxlength="30">
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-sm-4 col-md-1 control-label" for="addnewOP"></label>
            <div class="col-sm-6 col-md-offset-3 col-md-4">
              <button id="addnewOP" type="submit" name="addnewOP" class="btn btn-primary" style="padding: 6px 24px;">Add</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
    <!-- End of column -->
<!--*****************************************End Add new Operator***********************************************-->    

    <div class="col-sm-12 col-md-6">
      <form class="form-horizontal col-sm-12 col-md-12" id="AdminChange" action="./script/operator.php" method="POST">
        <div id="logo" class="text-center">
          <h4>Admin Section</h4>
        </div>
        <br>
        <fieldset>
          <!-- Text input -->
          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="adminoldpassword">Old Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="adminoldpassword" name="adminoldpassword" placeholder="Admin old password" class="form-control input-md" type="password" maxlength="30" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="adminnewpassword">New Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="adminnewpassword" name="adminnewpassword" placeholder="New password" class="form-control input-md" type="password" maxlength="30" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="adminconfpassword">Confirm Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="adminconfpassword" name="adminconfpassword" placeholder="Confirm new password" class="form-control input-md" type="password" maxlength="30" required>
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
  <!-- End of row -->
  <br>
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <form role="form" id="form-buscar" autocomplete="off" action="./script/operator.php" method="POST">
        <div class="form-group col-sm-offset-4 col-sm-6 col-md-offset-4 col-md-7">
          <div class="input-group">
              <input id="search" class="form-control" type="text" name="searchOP" placeholder="Operator username" required/>
              <span class="input-group-btn">
                <button id="findOperator" name="findOperator" class="btn btn-success" type="submit">
                  <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
                </button>
              </span>
          </div>
          <div id="resultList"></div>
        </div>
      </form>

<?php
if (isset($_GET['username']) && !empty($_GET['username']))
{
  $username = rawurldecode($_GET['username']) ;
}
else
  $username = '' ;  
?>

      <form class="form-horizontal col-sm-12 col-md-12" id="AddNewOP" action="./script/operator.php" method="POST">
        <br>
        <fieldset>
           <!-- Text input -->
          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="opusername">New Username:</label>
            <div class="col-sm-6 col-md-5">
              <input id="opusername" name="opusername" placeholder="<?php if (!empty($username)) echo $username; else echo "Operator username"; ?>" value ="<?php if (!empty($username)) echo $username; ?>" class="form-control input-md" type="text" maxlength="30" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="newpassword">New Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="newpassword" name="newpassword" placeholder="1234" class="form-control input-md" type="text" maxlength="30" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 col-md-4 control-label" for="confpassword">Confirm Password:</label>
            <div class="col-sm-6 col-md-5">
              <input id="confpassword" name="confpassword" placeholder="1234" class="form-control input-md" type="text" maxlength="30" required>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-sm-4 col-md-1 control-label" for="OPchange"></label>
            <div class="col-sm-6 col-md-4">
              <button id="OPchange" name="OPchange" class="btn btn-primary">Change</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
<!--**********************************End Change Operator Section***********************************************-->    
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
      $('#search').keyup(function(){
        var searchValue = $(this).val() ;

        if(searchValue!='')
        {
          $.ajax({
            url:"./script/auto_suggestion.php",
            method:"POST",
            data:{operatorSearch:searchValue},
            success:function(data)
            {
              $('#resultList').fadeIn();
              $('#resultList').html(data);
            }
          });
        }
      });

      $(document).on('click' , 'li' , function(){
        $('#search').val($(this).text());
        $('#resultList').fadeOut();
      });

      $(document).ready(function () {
        document.getElementById('adminoldpassword').value = "";
    });    
  </script>

</body>
</html>