<?php
include_once './script/function_inc.php' ;
?>
  
  <header>
    <ol class="breadcrumb">
      <li><a href="./index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="./add_emp.php"><span class="glyphicon glyphicon-plus"></span> Add Employee</a></li>
      <li><a href="./update1.php">Update</a></li>
      <li><a href="./view1.php">View</a></li>
      <li><a href="./history.php">History</a></li>
      <li class="pull-right"><a href="./script/Logout.php"><span class="glyphicon glyphicon-off"></span> Logout </a></li>
      <?php
            if (loggedin())
            {
                if ($_SESSION['Username'] == "admin")
                {
        ?> 
                 <div class="pull-right"><a href="./operator.php"> <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['Username']; ?></a></div>
      <?php
                }

                else
                {
          ?>          
                    <div class="pull-right"><a href="./Profile.php"> <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['Username']; ?></a></div>
         <?php           
                }
            }
       ?>  
    </ol>
  </header>