<?php 
include './script/function_inc.php' ;

// If user is already logged then redirect him to index Page
if (loggedin())
  header('Location: ./index.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/jquery-ui.min.css" rel="stylesheet">
  <link href="css/jquery-ui.structure.min.css" rel="stylesheet">
  <link href="css/jquery-ui.theme.min.css" rel="stylesheet">
  <!-- Custome CSS style -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- fontawesome -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
  

  <title>::Employee Management</title>
</head>
<body style="background-color:#eaeae1">

<div class="container" style="margin-top:30px">
	<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 " >
	<br><br><br><br><br><br><br>
		<div class="login-panel panel panel-primary">
    		<div class="panel-heading">
                <h3 class="panel-title" >Sign In</h3>
            </div>
            
            <div class="panel-body">
                <form role="form" action="./script/login_inc.php" method="POST">
                    <fieldset>
                        <h5 class="text-danger" style="text-align: center;">
                          <?php
                              if (isset($_GET['returnMSG']) && !empty($_GET['returnMSG'])) 
                                echo $_GET['returnMSG'] ;
                          ?>
                        </h5>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" type="id" autofocus="">
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        
                        <!-- Change this to a button or input when using this as a form -->
                        <br>
                        <input type="submit" name="submit" class="btn-md btn btn-success btn-block" value="Login">
                        <br>
                    </fieldset>
                </form>
            </div>
        </div>
</div>
<br>


</div>





<!-- jQuery library -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Custome JScript File -->
  <script src="js/script.js"></script>
</body>
</html>