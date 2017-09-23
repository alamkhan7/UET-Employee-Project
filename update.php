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
  <style type="text/css">
    @media screen and (min-width: 992px){
      .emp-info .form-group{
        margin-left: -60px;
      }
    }

    .qualification-update{
      display:none;
    }

    .error{color:red;font-weight:500;}
  </style>

  <title>::Employee Management</title>
</head>
<body>

<?php include ('header_inc.php'); ?>
<!--*******************************************End Of Header**************************************************-->

  <div class="container" style="margin-top: 2%;">

    <div class="col-md-4 col-md-offset-4">     
      <div class="row">
        <div id="logo" class="text-center">
          <h4>Search Employee</h4>
        </div>
      <!-- Form is handle by auto_suggestion file  -->
      <form role="form" id="form-buscar" autocomplete="off">
        <div class="form-group">
          <div class="input-group">
              <input id="search" class="form-control" type="text" name="search" placeholder="EMP ID" required autofocus/>
              <span class="input-group-btn">
                <button name="submit" class="btn btn-success" type="submit">
                  <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
                </button>
              </span>
          </div>
        </div>
      </form>
      </div>            
    </div>
  </div>

<!--*******************************************End Of Search**************************************************-->

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
<!--*******************************************End Of Error Label**************************************************-->

  <div class="container">
    <form class="form-horizontal" id="update-info" action="./script/update_employee_info.php" method="POST" autocomplete="off">
      <div class="row">

        <div class="col-md-12 emp-info">
          <h4 class="">Employee Information</h4>
          <div style="border-bottom: 1px solid black"></div>
          <br>
            
          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-2 control-label" for="empname">Employee Name: </label>  
            <div class="col-sm-6 col-md-2">
            <input class="form-control" id="empname" name="empname" value="<?php if (!empty($Employee_Name)) echo $Employee_Name ?>" placeholder="Name" type="text" maxlength="30"  autofocus>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="empfather">Father Name:</label>  
            <div class="col-sm-6 col-md-2">
            <input class="form-control" id="empfather" name="empfather" placeholder="Father Name"  value="<?php if (!empty($Father_Name)) echo $Father_Name ?>" placeholder="" type="text" maxlength="30" autofocus>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="empcode">Employee Code:</label>  
            <div class="col-sm-6 col-md-2">
            <input class="form-control" id="empcode" name="empcode" value ="<?php if (!empty($Employee_Code)) echo $Employee_Code; ?>" placeholder="Employee Code" type="text" maxlength="5" readonly>
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-2 control-label" for="cnic">CNIC:</label>  
            <div class="col-sm-6 col-md-2">
            <input class="form-control" id="cnic" name="cnic" value="<?php if (!empty($CNIC)) echo $CNIC ?>" placeholder="CNIC" type="text" minlength="13" maxlength="13" autofocus>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="address">Address:</label>  
            <div class="col-sm-6 col-md-2">
            <input class="form-control" id="address" name="address" value="<?php if (!empty($Address)) echo $Address ?>" placeholder="Address" type="text" maxlength="100" autofocus>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="NTN">NTN:</label>  
            <div class="col-sm-6 col-md-2">
            <input class="form-control" id="ntn" name="ntn" placeholder="NTN (optional)" value="<?php if (!empty($NTN)) echo $NTN ?>" type="text" maxlength="30" autofocus>
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-2 control-label" for="bps">BPS:</label>  
            <div class="col-sm-6 col-md-2">
            <input class="form-control" id="bps" name="bps" value="<?php if (!empty($BPS)) echo $BPS ?>" placeholder="BPS" type="number" min="0"  max="22" autofocus>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="empname">Fix:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="fix" name="fix" class="form-control" require>
              <option <?php if (empty(@$Fix)) echo 'selected'; ?> value="">Select</option>
              <option <?php if (@$Fix=='R') echo 'selected'; ?> value="R">Regular</option>
              <option <?php if (@$Fix=='F') echo 'selected'; ?> value="F">Fixed</option>
            </select>
            </div>
            
            <div class="accno-update">
              <label class="col-sm-4 col-md-2 control-label" for="accno">Account #</label>  
              <div class="col-sm-6 col-md-2">
              <input class="form-control" name="accno" value="<?php if (!empty($Account_No)) echo $Account_No ?>" placeholder="ACC# (Optional)" type="text" maxlength="20">
              </div>
            </div>

          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-2 control-label" for="designation">Designation:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="designation" name="designation" value="" class="form-control">
              <option <?php if (empty(@$Designation_ID)) echo 'selected'; ?> value="">Select</option> 
                <?php
                /* Get Information from Designation Table */
                  $Query = "SELECT * FROM Designation";
                  if ($query_result = mysqli_query($conn,$Query))
                    {
                      while ( $Row = mysqli_fetch_assoc($query_result) ){
                        $DID = $Row['Designation_ID'];
                        $Desig = $Row['Designation'];
                        if (@$DID==$Designation_ID){
                          echo  '<option selected value="'.$DID.'">'.$Desig.' </option>';
                        }
                        else{
                          echo  '<option value="'.$DID.'">'.$Desig.' </option>';
                        }
                      }
                    }
                ?>

            </select>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="staff">Staff:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="staff" name="staff" class="form-control">
              <option <?php if (empty($Staff)) echo 'selected'; ?> value="">Select</option>
              <option <?php if (@$Staff=='N') echo 'selected'; ?> value="N">Non-Teaching</option>
              <option <?php if (@$Staff=='T') echo 'selected'; ?> value="T">Teaching</option>
            </select>
            </div>
            
            <div class="qualification-update">
              <label class="col-sm-4 col-md-2 control-label" for="qualification">Qualification:</label>  
              <div class="col-sm-6 col-md-2">
              <select id="" name="qualification" class="form-control">
                <option <?php if (@$Qualification_ID==0) echo 'selected'; ?> value="0">Select</option>
                <option <?php if (@$Qualification_ID==1) echo 'selected'; ?> value="1">BS</option>
                <option <?php if (@$Qualification_ID==2) echo 'selected'; ?> value="2">MS</option>
                <option <?php if (@$Qualification_ID==3) echo 'selected'; ?> value="3">Phd</option>
              </select>
              </div>
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-2 control-label" for="position">Admin Position:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="position" name="position" class="form-control" >
            <option <?php if (empty(@$Admin_Position)) echo 'selected'; ?> value="">Select</option>
              <option <?php if (@$Admin_Position=='None') echo 'selected'; ?> value="None">None</option>
              <option <?php if (@$Admin_Position=='Dean') echo 'selected'; ?> value="Dean">Dean</option>
              <option <?php if (@$Admin_Position=='Chairman') echo 'selected'; ?> value="Chairman">Chairman</option>
            </select>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="campus">Campus:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="campus" name="campus" class="form-control" >
              <option <?php if (empty(@$Campus_ID)) echo 'selected'; ?> value="">Select</option> 
                <?php
                /* Get Information from Campus Table */
                  $Query = "SELECT * FROM Campus";
                  if ($query_result = mysqli_query($conn,$Query))
                    {
                      while ( $Row = mysqli_fetch_assoc($query_result) ) 
                      {
                        $CID = $Row['Campus_ID'];
                        $Camp = $Row['Campus'];
                        if (@$CID==$Campus_ID){
                          echo  '<option selected value="'.$CID.'">'.$Camp.' </option>';
                        }
                        else{
                          echo  '<option value="'.$CID.'">'.$Camp.' </option>';
                        }

                      }
                    }
                ?>
            </select>
            </div>
            <label class="col-sm-4 col-md-2 control-label" for="department" >Department:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="department" name="department" class="form-control" >
               <option <?php if (empty(@$Department_ID)) echo 'selected'; ?> value="">Select</option> 
                <?php
                /* Get Information from Campus Table */
                  $Query = "SELECT * FROM Department";
                  if ($query_result = mysqli_query($conn,$Query))
                    {
                      while ( $Row = mysqli_fetch_assoc($query_result) ) 
                      {
                        $DPID = $Row['Department_ID'];
                        $Depart = $Row['Department_Name'];
                        if (@$DPID==$Department_ID){
                          echo  '<option selected value="'.$DPID.'">'.$Depart.' </option>';
                        }
                        else{
                          echo  '<option value="'.$DPID.'">'.$Depart.' </option>';
                        }

                      }
                    }
                ?>
            </select>
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-2 control-label" for="house">House:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="house" name="house" class="form-control" require>
              <option <?php if (@$House==="") echo 'selected'; ?> value="">Select</option>
              <option <?php if (@$House=="1") echo 'selected'; ?> value="1">Yes</option>
              <option <?php if (@$House==="0") echo 'selected'; ?> value="0">No</option>
            </select>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="vehicle">Vehicle:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="vehicle" name="vehicle" class="form-control" >
              <option <?php if (@$Vehicle==="") echo 'selected'; ?> value="">Select</option>
              <option <?php if (@$Vehicle=="1") echo 'selected'; ?> value="1">Yes</option>
              <option <?php if (@$Vehicle==="0") echo 'selected'; ?> value="0">No</option>
            </select>
            </div>

            <label class="col-sm-4 col-md-2 control-label" for="marital">Marital Statu:</label>  
            <div class="col-sm-6 col-md-2">
            <select id="marital" name="marital" class="form-control" >
              <option <?php if (@$Marital_Status==="") echo 'selected'; ?> value="">Select</option>
              <option <?php if (@$Marital_Status=="1") echo 'selected'; ?> value="1">Yes</option>
              <option <?php if (@$Marital_Status==="0") echo 'selected'; ?> value="0">No</option>    
            </select>
            </div>
          </div>
          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-2 control-label" for="marital">Join Date:</label>
              <div class='input-group date form_datetime col-sm-6 col-md-2' data-date-format="yyyy-mm-dd" style="margin-left: 17.9%;width: 14.5%;">
                <input name="date" size="16" type="text" readonly class="form-control" value="<?php if (!empty($Join_Date)) echo $Join_Date ?>" placeholder="dd/mm/yyyy" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
          </div>
        </div>
        <!-- End Of Column-->
      </div>
      <!-- End of 1st Row -->
<!--**********************************End Of Employee Information*********************************************-->

      <div class="row">

        <div class="col-md-12">
          <h4 class="">Pay and Allowances</h4>
          <div style="border-bottom: 1px solid black"></div>
          <br>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-1 control-label" for="bpay">Basic Pay:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="bpay" name="bpay" value="<?php if (!empty($Basic_Pay)) echo $Basic_Pay ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" step="0.01" min="0" max="9999999.99">
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="fpay">Fixed Pay:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="fpay" name="fpay" value="<?php if (!empty($Fixed_Pay)) echo $Fixed_Pay ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99" >
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="ppay">Personal Pay:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="ppay" name="ppay" value="<?php if (!empty($Personal_Pay)) echo $Personal_Pay ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99" >
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="hreall">Hrent1 All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="hreall" name="hreall" value="<?php if (!empty($Hreant1_All)) echo $Hreant1_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99" >
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            

            <label class="col-sm-4 col-md-1 control-label" for="hresuball">Hrent Sub All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="hresuball" name="hresuball" value="<?php if (!empty($Hrent_Sub_All)) echo $Hrent_Sub_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="conall">Convence All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="conall" name="conall" value="<?php if (!empty($Convence_All)) echo $Convence_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="adhrel">Adhoc_Rel_2010:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="adhrel" name="adhrel" value="<?php if (!empty($Adhoc_Rel_2010)) echo $Adhoc_Rel_2010 ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99" >
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="compall">Computer All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="compall" name="compall" value="<?php if (!empty($Computer_All)) echo $Computer_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-1 control-label" for="priall">Private All:</label>
            <div class="col-sm-6 col-md-2">
            <input id="priall" name="priall" value="<?php if (!empty($Private_All)) echo $Private_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="extall">Extrall/D All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="extall" name="extall" value="<?php if (!empty($Extra_All)) echo $Extra_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99" >
            </div>

            <!--<label class="col-sm-4 col-md-1 control-label" for="deaall">15% Dearnes All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="deaall" name="deaall" value="" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div> -->

            <label class="col-sm-4 col-md-1 control-label" for="senall">Senior:P All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="senall" name="senall" value="<?php if (!empty($Senior_p_All)) echo $Senior_p_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="medall">Med All:</label>
            <div class="col-sm-6 col-md-2">
            <input id="medall" name="medall" value="<?php if (!empty($Med_All)) echo $Med_All ?>"placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-1 control-label" for="entall">Ent All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="entall" name="entall" value="<?php if (!empty($ENT_All)) echo $ENT_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="deanall">Dean All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="deanall" name="deanall" value="<?php if (!empty($Dean_All)) echo $Dean_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99" >
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="integ">Integrated:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="integ" name="integ" value="<?php if (!empty($intgrated_All)) echo $intgrated_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99" >
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="specadd">Spec/Add All:</label>
            <div class="col-sm-6 col-md-2">
            <input id="specadd" name="specadd" value="<?php if (!empty($Spec_Add_All)) echo $Spec_Add_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99" >
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            <!--<label class="col-sm-4 col-md-1 control-label" for="qual">Qual All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="qual" name="qual" value="" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>-->

            <label class="col-sm-4 col-md-1 control-label" for="tech">Teach All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="tech" name="tech" value="<?php if (!empty($Teach_All)) echo $Teach_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="ordall">Orderly All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="ordall" name="ordall" value="<?php if (!empty($Orderly_All)) echo $Orderly_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="othall">Oth All:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="othall" name="othall" value="<?php if (!empty($Oth_All)) echo $Oth_All ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="Brain_Drain"> Brain Drain:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="Brain_Drain" name="Brain_Drain" value="<?php if (!empty($Brain_Drain)) echo $Brain_Drain ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div> 
          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-1 control-label" for="ARA2016"> ARA 2016 (10%):</label>  
            <div class="col-sm-6 col-md-2">
            <input id="ARA2016" name="ARA2016" value="<?php if (!empty($ARA_2016_10PERCENT)) echo $ARA_2016_10PERCENT ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="9999999.99">
            </div>


          </div>
        </div>
        
          <!-- End of 1st Column -->
<!--**********************************End Of Allownces Information********************************************-->
        <div class="col-md-12" >
          <h4 class="">Deductions</h4>
          <div style="border-bottom: 1px solid black"></div>
          <br>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-1 control-label" for="House_1">Hrent:1 Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="House_1" name="House_1" value="<?php if (!empty($House_Rent_1)) echo $House_Rent_1 ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="House_2">Hrent:2 Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="House_2" name="House_2" value="<?php if (!empty($House_Rent_2)) echo $House_Rent_2 ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="elec_1">Elec:T Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="elec_1" name="elec_1" value="<?php if (!empty($Electric_Charges_1)) echo $Electric_Charges_1 ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="elec_2">Elec:O Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="elec_2" name="elec_2" value="<?php if (!empty($Electric_Charges_2)) echo $Electric_Charges_2 ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
          </div>

          <div class="form-group" style="font-size: 12px;">
            <label class="col-sm-4 col-md-1 control-label" for="gasded">Sui gas Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="gasded" name="gasded" value="<?php if (!empty($SuiGas_Charges)) echo $SuiGas_Charges ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="water1">Water Tax 1:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="water1" name="water1" value="<?php if (!empty($Water_Tax1_Charges)) echo $Water_Tax1_Charges ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="water2">Water Tax 2:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="water2" name="water2" value="<?php if (!empty($Water_Tax2_Charges)) echo $Water_Tax2_Charges ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="endded">End Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="endded" name="endded" value="<?php if (!empty($Endovement_Fund)) echo $Endovement_Fund ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
          </div>

          <div class="form-group" style="font-size: 12px;">

            <label class="col-sm-4 col-md-1 control-label" for="bfundded">Bfund Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="bfundded" name="bfundded" value="<?php if (!empty($B_Fund)) echo $B_Fund ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="HouseBuild">House Build Loan:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="HouseBuild" name="HouseBuild" value="<?php if (!empty($House_Build_Loan)) echo $House_Build_Loan ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="convded">Conv Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="convded" name="convded" value="<?php if (!empty($Convence_Loan)) echo $Convence_Loan ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="gpfrded">Gpf: R Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="gpfrded" name="gpfrded" value="<?php if (!empty($GP_Fund_Regular)) echo $GP_Fund_Regular ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>


          </div>

          <div class="form-group" style="font-size: 12px;">

            <label class="col-sm-4 col-md-1 control-label" for="gpfaded">Gpf:A Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="gpfaded" name="gpfaded" value="<?php if (!empty($GP_Fund_Advence)) echo $GP_Fund_Advence ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99" >
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="eidded">Eid Advance Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="eidded" name="eidded" value="<?php if (!empty($Eid_Advance)) echo $Eid_Advance ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99" >
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="ufund1">Union Fund 1:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="ufund1" name="ufund1" value="<?php if (!empty($Union_Fund_1)) echo $Union_Fund_1 ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99" >
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="ufund2">Union Fund 2:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="ufund2" name="ufund2" value="<?php if (!empty($Union_Fund_2)) echo $Union_Fund_2 ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>


          </div>

          <div class="form-group" style="font-size: 12px;">

            <label class="col-sm-4 col-md-1 control-label" for="vehded">Vehicle/O Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="vehded" name="vehded" value="<?php if (!empty($Vehicle_Charges_Other)) echo $Vehicle_Charges_Other ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="tvehded">Vehicle/T Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="tvehded" name="tvehded" value="<?php if (!empty($Vehicle_Charges_Teacher)) echo $Vehicle_Charges_Teacher ?>"  placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99" >
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="upkeepded">Upkeep Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="upkeepded" name="upkeepded" value="<?php if (!empty($Upkeep_Ded)) echo $Upkeep_Ded ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>

            <label class="col-sm-4 col-md-1 control-label" for="leavded">R/leav Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="leavded" name="leavded" value="<?php if (!empty($R_Leave_Without_Pay)) echo $R_Leave_Without_Pay ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>


          </div>

          <div class="form-group" style="font-size: 12px;">

            <label class="col-sm-4 col-md-1 control-label" for="recovded">Recov:gap/CA Ded:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="recovded" name="recovded" value="<?php if (!empty($Recovery_Gap_CA)) echo $Recovery_Gap_CA ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="itexded">Income tax:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="itexded" name="itexded" value="<?php if (!empty($Income_Tax)) echo $Income_Tax ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
                                    
            <label class="col-sm-4 col-md-1 control-label" for="ginsded">Group Insurance:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="ginsded" name="ginsded" value="<?php if (!empty($Group_Insurance)) echo $Group_Insurance ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
            <label class="col-sm-4 col-md-1 control-label" for="oth1ded">Other:</label>  
            <div class="col-sm-6 col-md-2">
            <input id="oth1ded" name="oth1ded" value="<?php if (!empty($Other)) echo $Other ?>" placeholder="00.00" class="form-control input-md" type="number" step="0.01" min="0" max="99999.99">
            </div>
            
          </div>
        </div>
        <!-- End of 2nd Column -->

      </div>
      <!-- End of 2nd Row -->
<!--**********************************End Of Deduction Information********************************************-->

  
        <!-- Button -->
        <br>
        <div>

          &nbsp;&nbsp; <input class="btn btn-primary btn-lg" name="Update_Button" id="update-button" type="submit" value="Update">
          &nbsp;&nbsp; <input class="btn btn-danger btn-lg pull-right" name="Delete_Button" id="delete-button" type="submit" value="Delete">
        
        </div>

    </form>
<!--********************************************End Of Form**************************************************-->
  </div>
  <!-- End of Container -->
<br><br><br>




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