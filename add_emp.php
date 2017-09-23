<?php
include_once './script/function_inc.php';
include_once './script/Connection.php';
/*Get new Employee Code*/
 $newID =  newid() ;

// If user is not loggedin then redirect him to login Page
if (!loggedin())
  header("Location: ./login.php")
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css">
  <link href="css/jquery-ui.min.css" rel="stylesheet">
  <link href="css/jquery-ui.structure.min.css" rel="stylesheet">
  <link href="css/jquery-ui.theme.min.css" rel="stylesheet">
  <!-- fontawesome -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
  
  
  <!-- Custom CSS style -->
  <link rel="stylesheet" href="css/styles.css">
  <style type="text/css">.error{color:red;font-weight:500;}</style>
  
  <title>::Employee Management</title>
</head>
<body>
<?php include ('header_inc.php'); ?>

  <!--*************************************End Of Header***************************************-->

  <?php 
    if (isset($_GET['returnMsg']) && !empty($_GET['returnMsg']))
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
      <div class="container-fluid" style="margin-bottom:-3%;">
        <div class="col-sm-4 col-md-offset-4">
            <div class="alert <?php echo $label;?> text-center">
            <a href="" class="close" data-dismiss="alert" aria-label="Close"> &times; </a>
              <?php echo $_GET['returnMsg']; ?>
            </div>
        </div>
      </div>
    <?php
    }
  ?>

  <!--*************************************End Of Error Msg***************************************-->

  <div class="container-fluid" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">

      <form id="register-form" action="./script/add_employee.php" method="POST" autocomplete="on">
        <fieldset>
          <legend><center><h2><b>Employee Registration Form</b></h2></center></legend><br>
        </fieldset>
        
        <div class="form-group col-md-3 ">
          <label for="empcode">Employee Code </label>
          <input class="form-control" id="empcode" name="empcode" value ="<?php echo $newID;?>" placeholder="<?php echo $code;?>" type="text"  readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="empname">Employee Name </label>
          <input class="form-control" id="empname" name="empname" placeholder="Name" type="text" maxlength="30"  autofocus required>
        </div>

        <div class="form-group col-md-3">
          <label for="empfather">Father Name </label>
          <input class="form-control" id="empfather" name="empfather" placeholder="Father Name" type="text" maxlength="30"  autofocus>
        </div>

        <div class="form-group col-md-3">
          <label for="cnic">CNIC </label>
          <input class="form-control" id="cnic" name="cnic" placeholder="0000000000000" type="text" minlength="13" maxlength="13" required>
        </div>

        

        <div class="form-group col-md-3">
          <label for="address">Address </label>
          <input class="form-control" id="address" name="address" placeholder="Address" type="text" maxlength="100" required>
        </div>

        <div class="form-group col-md-3">
          <label for="email">Email </label>
          <input class="form-control" id="email" name="email" placeholder="Email (Optional)" type="email" maxlength="30">
        </div>

         <div class="form-group col-md-3" id="accno">
          <label for="accno">Account #</label>
          <input class="form-control" name="accno" placeholder="ACC# (Optional)" type="text" maxlength="20">
        </div>

        <div class="form-group col-md-3">
          <label for="ntn">NTN </label>
          <input class="form-control" id="ntn" name="ntn" placeholder="NTN (Optional)" type="text" maxlength="30">
        </div>
        
        <div class="clearfix"></div>

  <!--*************************************Job Position****************************************-->
      
        <fieldset>
          <legend>Job Position</legend>
        </fieldset>
        
        <div class="form-group col-md-3">
          <label for="bps">BPS </label>
          <input class="form-control" id="bps" name="bps" placeholder="BPS" type="number" min="0" maxlength="2" max="22" required>
        </div>

        <div class="form-group col-md-3">
          <label for="fix">Fix </label>
          <select id="fix" name="fix" class="form-control" required>
            <option selected value="">select</option>
            <option value="R">Regular</option>
            <option value="F">Fixed</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="designation">Designation </label>
           <select id="designation" name="designation" class="form-control" required>
            <option value="">Select</option>
              
              <?php
              /* Get Information from Designation Table */
                $Query = "SELECT * FROM Designation";
                if ($query_result = mysqli_query($conn,$Query))
                  {
                    while ( $Row = mysqli_fetch_assoc($query_result) ) 
                    {
                      $Designation_ID = $Row['Designation_ID'];
                      $Designation = $Row['Designation'];
                      echo  '<option value="'.$Designation_ID.'"> '.$Designation. '</option>' ."\n";

                    }
                  }
                  @mysqli_free_result($query_result);
              ?>
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="campus">Campus </label>
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
                      @mysqli_free_result($query_result);
                  ?>
          </select>
        </div>

        <div class="clearfix"></div>
        
        <div class="form-group col-md-3">
          <label for="staff">Staff </label>
          <select id="staff" name="staff" class="form-control" required>
            <option value="">select</option>
            <option value="N">Non-Teaching</option>
            <option value="T">Teaching</option>
            <option value="Q">Neb Qasid</option>
          </select>
        </div>

        <div class="form-group col-md-3 department">
          <label for="department">Department </label>
          <select id="department" name="department" class="form-control" required>
            <option value=""> Select </option>
                <?php
                  /* Get Information from Department Table */
                    $Query = "SELECT * FROM Department WHERE Department_Name NOT LIKE '%Other%'";
                    if ($query_result = mysqli_query($conn,$Query))
                    {
                      while ( $Row = mysqli_fetch_assoc($query_result) ) 
                      {
                        $Department_ID = $Row['Department_ID'];
                        $Department_Name = $Row['Department_Name'];
                        echo  '<option value="'.$Department_ID.'"> '. $Department_Name. '</option>'."\n";

                      }
                    }
                    @mysqli_free_result($query_result);

                  ?>
          </select>
        </div>

        <div class="form-group col-md-3 departmentother">
          <label for="departmentother">Department (Other)</label>
          <select id="departmentother" name="departmentother" class="form-control" required>
            <option value=""> Select </option>
                <?php
                  /* Get Information from Department Table */
                    $Query = "SELECT * FROM Department WHERE Department_Name LIKE '%Other%' ";
                    if ($query_result = mysqli_query($conn,$Query))
                    {
                      while ( $Row = mysqli_fetch_assoc($query_result) ) 
                      {
                        $Department_ID = $Row['Department_ID'];
                        $Department_Name = $Row['Department_Name'];
                        echo  '<option value="'.$Department_ID.'"> '. $Department_Name. '</option>'."\n";

                      }
                    }
                    @mysqli_free_result($query_result);

                  ?>
          </select>
        </div>

        <div class="form-group col-md-3 section">
          <label for="section">Section </label>
          <select id="section" name="section" class="form-control" required>
            <option value=""> Select </option>
                <?php
                  /* Get Information from Department Table */
                    $Query = "SELECT * FROM section";
                    if ($query_result = mysqli_query($conn,$Query))
                      {
                        while ( $Row = mysqli_fetch_assoc($query_result) ) 
                        {
                          $Section_ID = $Row['Section_ID'];
                          $Section_Name = $Row['Section_Name'];
                          echo  '<option value="'.$Section_ID.'"> '. $Section_Name. '</option>'."\n";

                        }
                      }
                      @mysqli_free_result($query_result);
                  ?>
          </select>
        </div>

        <div class="form-group col-md-3 qualification">
          <label for="qualification">Qualification </label>
          <select id="qualification" name="qualification" class="form-control" >
            <option value="">select</option>
            <option value="1">BS</option>
            <option value="2">MS</option>
            <option value="3">Phd</option>
          </select>
        </div>


        <div class="form-group col-md-3 position">
          <label for="position">Admin Position </label>
          <select id="position" name="position" class="form-control" required>
            <option value="">select</option>
            <option value="None">None</option>
            <option value="Dean">Dean</option>
            <option value="Chairman">Chairman</option>
          </select>
        </div>

        

        
        
        <div class="clearfix"></div>

  <!--************************************Personal Information*********************************-->

        <fieldset>
          <legend>Personal Information</legend>
        </fieldset>

        <div class="form-group col-md-3">
          <p>House</p>
          <select id="house" name="house" class="form-control" required>
            <option value="">select</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <p>Vehicle</p>
          <select id="vehicle" name="vehicle" class="form-control" required>
            <option value="">select</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <p>Marital Status</p>
          <select id="marital" name="marital" class="form-control" required>
            <option value="">select</option>
            <option value="0">Un-Married</option>
            <option value="1">Married</option>
          </select>
        </div>
        
        <div class="form-group col-md-3 khan">
          <p>Join Date</p>
          <div class='input-group date form_datetime' data-date-format="yyyy/mm/yyyy">
            <input name="date" size="16" type="text" readonly class="form-control" placeholder="dd/mm/yyyy" />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>

        <div class="clearfix"></div>
        
        <div>
          &nbsp;&nbsp; <input class="btn btn-primary btn-md" id="submit-button"  name="submit-button" type="submit" value="Submit">
        </div>
        </form>
      </div><!--End of column -->
    </div><!-- End of row -->
  </div><!-- End of Container -->

  <?php @mysqli_close($conn) ; ?>

<!--*******************************************************************************************-->
<!-- jQuery library -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/bootstrap-datetimepicker.uk.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Custom Script  -->
  <script src="js/validation.js"></script>
  
  <script>
    $(".form_datetime").datetimepicker({
        format: "dd/mm/yyyy",
        minView: 2,
        autoclose: true,
        todayBtn: true,
        pickerPosition: "top-left",
    });
  </script>

</body>
</html>