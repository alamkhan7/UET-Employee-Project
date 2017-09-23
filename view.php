<?php
include_once './script/function_inc.php' ;
include_once './script/Connection.php';

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
<!--*******************************************End Of Error Message**************************************************-->

<div class="container-fluid">
  <div class="row">
    
    <div class="col-sm-12 col-md-6" >

      <form role="form" class="form-horizontal col-sm-12 col-md-12 for-border" id="ChangeOP" action="./script/generate_view.php" method="POST">

        <div class="form-group col-md-5">
          <label for="department">Select Department</label>
          <select id="department" name="department" class="form-control" required>
            <option value=""> Select </option>
                <?php
                  /* Get Information from Department Table */
                    $Query = "SELECT * FROM Department";
                    if ($query_result = mysqli_query($conn,$Query))
                      {
                        while ( $Row = mysqli_fetch_assoc($query_result) ) 
                        {
                          $Department_ID = $Row['Department_ID'];
                          $Department_Name = $Row['Department_Name'];
                          echo  '<option value="'.$Department_ID.'"> '. $Department_Name. '</option>'."\n";

                        }
                      }
                  ?>
          </select>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">     
            <button id="addnewOP" type="submit" name="view-button" class="btn btn-lg btn-primary" style="padding: 6px 24px;">Generate View</button>
          </div>
        </div>  
      </form>
    </div> <!-- End of column --> 

    <div class="col-sm-12 col-md-6" >
      <form role="form" class="form-horizontal col-sm-12 col-md-12 for-border" id="ChangeOP" action="./script/allownces_view.php" method="POST">
        <div class="form-group col-md-5">
          <label for="department">Select Department</label>
          <select id="department" name="department" class="form-control" required>
            <option value=""> Select </option>
                <?php
                  /* Get Information from Department Table */
                    $Query = "SELECT * FROM Department";
                    if ($query_result = mysqli_query($conn,$Query))
                      {
                        while ( $Row = mysqli_fetch_assoc($query_result) ) 
                        {
                          $Department_ID = $Row['Department_ID'];
                          $Department_Name = $Row['Department_Name'];
                          echo  '<option value="'.$Department_ID.'"> '. $Department_Name. '</option>'."\n";

                        }
                      }
                  ?>
          </select>
        </div>
        <div class="form-group col-md-5">
          <label for="fix">Fix</label>
          <select id="fix" name="fix" class="form-control" require>
            <option selected value="">select</option>
            <option value="R">Regular</option>
            <option value="F">Fixed</option>
          </select>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">     
            <button id="addnewOP" type="submit" name="view-button" class="btn btn-lg btn-primary" style="padding: 6px 24px;">Allownces View</button>
          </div>
        </div>  
      </form>
    </div> <!-- End of column --> 

    <div class="col-sm-12 col-md-6" >

      <form role="form" class="form-horizontal col-sm-12 col-md-12 for-border" id="ChangeOP" action="./script/deductions_view.php" method="POST">

        <div class="form-group col-md-5">
          <label for="department">Select Department</label>
          <select id="department" name="department" class="form-control" required>
            <option value=""> Select </option>
                <?php
                  /* Get Information from Department Table */
                    $Query = "SELECT * FROM Department";
                    if ($query_result = mysqli_query($conn,$Query))
                      {
                        while ( $Row = mysqli_fetch_assoc($query_result) ) 
                        {
                          $Department_ID = $Row['Department_ID'];
                          $Department_Name = $Row['Department_Name'];
                          echo  '<option value="'.$Department_ID.'"> '. $Department_Name. '</option>'."\n";

                        }
                      }
                  ?>
          </select>
        </div>
        <div class="form-group col-md-5">
          <label for="fix">Fix</label>
          <select id="fix" name="fix" class="form-control" require>
            <option selected value="">select</option>
            <option value="R">Regular</option>
            <option value="F">Fixed</option>
          </select>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">     
            <button id="addnewOP" type="submit" name="view-button" class="btn btn-lg btn-primary" style="padding: 6px 24px;">Deduction View</button>
          </div>
        </div>  
      </form>
    </div> <!-- End of column -->

    <div class="col-sm-12 col-md-6" >

      <form role="form" class="form-horizontal col-sm-12 col-md-12 for-border" id="ChangeOP" action="./script/top_allownces_view.php" method="POST">

        <div class="form-group col-md-5">
          <label for="department">Select Campus</label>
          <select id="campus" name="campus" class="form-control" required>
            <option value="">select</option> 
              <?php
              /* Get Information from Campus Table */
                $Query = "SELECT * FROM Campus";
                if ($query_result = mysqli_query($conn,$Query))
                  {
                    while ( $Row = mysqli_fetch_assoc($query_result) ) 
                    {
                      $Campus_ID = $Row['Campus_ID'];
                      $Campus = $Row['Campus'];
                      echo  '<option value="'.$Campus_ID.'"> '. $Campus. '</option>'."\n";

                    }
                  }
              ?>
          </select>
        </div>
        <div class="form-group col-md-5">
          <label for="fix">Fix</label>
          <select id="fix" name="fix" class="form-control" required>
            <option selected value="">select</option>
            <option value="R">Regular</option>
            <option value="F">Fixed</option>
            <option value="">All</option>
          </select>
        </div>

        <div class="form-group col-md-5">
          <label for="staff">Staff</label>
          <select id="staff" name="staff" class="form-control" required>
            <option value="">select</option>
            <option value="N">Non-Teaching</option>
            <option value="T">Teaching</option>
            <option value="">All</option>

          </select>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">     
            <button id="addnewOP" type="submit" name="view-button" class="btn btn-lg btn-primary" style="padding: 6px 24px;">Top View</button>
          </div>
        </div>  
      </form>
    </div> <!-- End of column -->

    <div class="col-sm-12 col-md-6" >

      <form role="form" class="form-horizontal col-sm-12 col-md-12 for-border" id="ChangeOP" action="./script/top_deduction_view.php" method="POST">

        <div class="form-group col-md-5">
          <label for="department">Select Campus</label>
          <select id="campus" name="campus" class="form-control" required>
            <option value="">select</option> 
              <?php
              /* Get Information from Campus Table */
                $Query = "SELECT * FROM Campus";
                if ($query_result = mysqli_query($conn,$Query))
                  {
                    while ( $Row = mysqli_fetch_assoc($query_result) ) 
                    {
                      $Campus_ID = $Row['Campus_ID'];
                      $Campus = $Row['Campus'];
                      echo  '<option value="'.$Campus_ID.'"> '. $Campus. '</option>'."\n";

                    }
                  }
              ?>
          </select>
        </div>
        <div class="form-group col-md-5">
          <label for="fix">Fix</label>
          <select id="fix" name="fix" class="form-control" required>
            <option selected value="">select</option>
            <option value="R">Regular</option>
            <option value="F">Fixed</option>
            <option value="">All</option>
          </select>
        </div>

        <div class="form-group col-md-5">
          <label for="staff">Staff</label>
          <select id="staff" name="staff" class="form-control" required>
            <option value="">select</option>
            <option value="N">Non-Teaching</option>
            <option value="T">Teaching</option>
            <option value="">All</option>

          </select>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">     
            <button id="addnewOP" type="submit" name="view-button" class="btn btn-lg btn-primary" style="padding: 6px 24px;">Top Ded View</button>
          </div>
        </div>  
      </form>
    </div> <!-- End of column -->

    <div class="col-sm-12 col-md-6" >
      <h3>Generate Salary</h3>
      <button style="margin-right: 5px;" onclick="window.location='script/generate_salary.php?generateAll='"  class="btn btn-lg btn-success"> Generate &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
    </div>

    <div class="col-sm-12 col-md-6" >
      <h3>View</h3>
      <button style="margin-right: 5px;" onclick="window.location='script/old_history_report.php?generate='"  class="btn btn-lg btn-success"> View &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
    </div>

  </div> <!--  End of Row  -->
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

</body>
</html>