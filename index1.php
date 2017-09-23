<?php
include_once './script/Connection.php';
include_once './script/get_employee_info_inc.php';
include_once './script/function_inc.php' ;

// If not loggedin then redirect him to login page
if (!loggedin())
  header("Location: ./login.php");

?>

<!--****************************************End Of PHP Script*************************************************-->

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

  <title>::Employee Management</title>
</head>
<body>

<?php include ('header_inc.php'); ?>
<!--*******************************************End Of Header**************************************************-->

<!--*******************************************End Of Search**************************************************-->

<!-- <?php 
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
?> -->
<!--*******************************************End Of Error Label**************************************************-->

  <div class="container">
    <div class="row">
    <form>
      <div class="col-md-6">
      <table class="table table-hover">
        <thead>
          <th><input type="text" class="form-control" placeholder="Search"></th>
        </thead>
        <tbody>
          <tr>
            <th>Designation</th>
            <td> <?php if (!empty($Designation)) echo $Designation; ?> </td>
            <th>Qualification</th>
            <td> <?php if (!empty($Qualification)) echo $Qualification; ?> </td>
            <th>Department</th>
            <td> <?php if (!empty($Department)) echo $Department; ?> </td>
            <th>Admin Position</th>
            <td> <?php if (!empty($Admin_Position)) echo $Admin_Position; ?> </td>
          </tr>
          <tr>
            <th>A/C No</th>
            <td> <?php if (!empty($Account_No)) echo $Account_No; ?> </td>
            <th>BPS</th>
            <td> <?php if (isset($BPS)) echo returnBPS($BPS); ?> </td>
            <th>Fixed</th>
            <td> <?php  if (!empty($Fix)) echo returnFix($Fix); ?> </td>
            <th>Staff</th>
            <td> <?php if (!empty($Staff)) echo returnStaff($Staff); ?> </td>
          </tr>
          <tr>
            <th>Campus</th>
            <td> <?php if (!empty($Campus)) echo $Campus; ?> </td>
            <th>NTN</th>
            <td> <?php if (isset($NTN)) echo returnNTN($NTN); ?> </td>
            <th>Join Date</th>
            <td> <?php if (!empty($Join_Date)) echo returnDate($Join_Date) ;?> </td>
            <th>Current Month</th>
            <td> <?php if (!empty($Current_Month)) echo $Current_Month; ?> </td>
          </tr>
        </tbody>
      </table>
      </div>
    </form>
    </div> <!-- end of row -->
  </div>
  <!-- End of Container -->




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
  <!-- <script src="js/validation.js"></script> -->
  
  <script>
     
    $('#search').keyup(function(){
      $( "#search" ).autocomplete({
        source: 'script/auto_suggestion_inc.php',
        minLength:1,
        autoFocus:true,   
        // delay:500
      });
    });


    $("#staff").change(function(){
       if($(this).val()=="T")
       {    
           $(".qualification-update").show();
       }
       else
       {
            $(".qualification-update").hide();
       }
       
    });

    /*Data and Time Script*/
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd",
        minView: 2,
        autoclose: true,
        todayBtn: true,
        pickerPosition: "top-left",
    });
  

    
    
  </script>
</body>
</html>