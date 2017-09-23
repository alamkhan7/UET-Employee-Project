<?php
include_once './script/function_inc.php' ;
include_once './script/get_employee_info_inc.php';

/* If not loggedin then redirect them to login page */
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/jquery-ui.min.css" rel="stylesheet">
  <link href="css/jquery-ui.structure.min.css" rel="stylesheet">
  <link href="css/jquery-ui.theme.min.css" rel="stylesheet">
  <!-- Custome CSS style -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- fontawesome -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
   
  <style type="text/css">
    #form-buscar ul{
    background-color : #eee;
    cursor: pointer;
    }
    #form-buscar li{
      padding: 12px;
    }
    .total {
      color: green;
      font-size: 13px;
    }

    .totalValue{
      color: blue;
      font-size: 13px; 
      font-weight: bold;
    }

  </style>
  <title>::CMS Employee Management</title>
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
      <form role="form" id="form-buscar" autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <div class="input-group">
              <input id="search" class="form-control  ui-widget" type="text" name="code" placeholder="EMP ID/Name" autofocus />
              <span class="input-group-btn">
                <button class="btn btn-success" type="submit" name="submit">
                  <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
                </button>
              </span>
            </div>
            <div id="resultList"></div>
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
      <div class="container" style="font-size: 0.9em">
        <div class="row">
          <div class="col-md-offset-1 col-md-10">
            <h5>Employee ID: <strong>  <?php if (!empty($Employee_Code)) echo $Employee_Code; ?> </strong>
            <?php
              if (!empty($Employee_Code))
              {
            ?>
                <form action="./generatePDF.php" Method="POST" class="pull-right" style="margin-left: 5px;">
                  <input type="hidden" name="empCode" value="<?php echo $Employee_Code ?>">
                  <input type="hidden" name="empName" value="<?php echo $Employee_Name ?>">
                  <button type="submit" name="Generate_PDF" class="btn btn-sm btn-primary"> PDF &nbsp;<span class="glyphicon glyphicon-download-alt"></span></button>
                </form>&nbsp;
                
                <button onclick="window.location='generateXLS.php?search=<?php echo $Employee_Code ?>&submit='"  class="btn btn-sm btn-primary pull-right"> XLS &nbsp;<span class="glyphicon glyphicon-download-alt"></span>&nbsp;</button>
              
                <?php
                  if (!empty($Employee_Code)){
                    $generate = is_generated ($Employee_Code) ;
                  }

                  if (!$generate['status']){
                  ?>    
                    <button style="margin-right: 5px;" onclick="window.location='script/generate_salary.php?search=<?php echo $Employee_Code ?>&generate='"  class="btn btn-sm btn-success pull-right"> Generate &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                
                <?php
                  }
                ?>
     
            <?php } ?>
            </h5>
            <h5>Employee Name: <strong> <?php if (!empty($Employee_Name)) echo $Employee_Name ?> </strong></h5>
            
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>BPS</th>
                  <td> <?php if (isset($BPS)) echo $BPS; ?> </td>
                  <th>Designation</th>
                  <td> <?php if (!empty($Designation)) echo $Designation; ?> </td>
                  <th>Fixed</th>
                  <td> <?php  if (!empty($Fix)) echo $Fix ; ?> </td>
                  <th>Campus</th>
                  <td> <?php if (!empty($Campus)) echo $Campus; ?> </td>
                </tr>
                <tr>
                  <th>Staff</th>
                  <td> <?php if (!empty($Staff)) echo $Staff; ?> </td>
                  <th>Department</th>
                  <td> <?php if (!empty($Department)) echo $Department; ?> </td>
                  <th>Section</th>
                  <td> <?php if (!empty($Section)) echo $Section; ?> </td>
                  <th>Qualification</th>
                  <td> <?php if (!empty($Qualification)) echo $Qualification; ?> </td>
                </tr>
                <tr>
                  <th>Admin Position</th>
                  <td> <?php if (!empty($Admin_Position)) echo $Admin_Position; ?> </td>
                  <th>A/C No</th>
                  <td> <?php if (!empty($Account_No)) echo $Account_No; ?> </td>
                  <th>NTN</th>
                  <td> <?php if (isset($NTN)) echo $NTN; ?> </td>
                  <th>Join Date</th>
                  <td> <?php if (!empty($Join_Date)) echo $Join_Date ;?> </td>
                </tr>
                <tr>
                  <th class="total">Salary Month</th>
                  <td class="totalValue"> <?php if (!empty($Current_Month)) echo $Current_Month; ?> </td>
                  <th class="total">Gross Salary</th>
                  <td class="totalValue"> <?php if (!empty($Gross_Pay)) echo $Gross_Pay; ?> </td> 
                  <th class="total">Total Deduction</th>
                  <td class="totalValue"> <?php if (!empty($Total_Deduction)) echo $Total_Deduction; ?> </td>
                  <th class="total">Net Salary</th>
                  <td class="totalValue"> <?php if (!empty($netSalary)) echo $netSalary; ?> </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- End of First Row -->
<!--**************************************End Of Employee Information****************************************-->
      
    
        <div class="row">
          <div class="col-md-offset-1 col-md-10">
            <h4 style="font-weight: 600">Pay and Allowances</h4>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Basic Pay</th>
                    <td> <?php if (!empty($Basic_Pay)) echo $Basic_Pay; ?> </td>
                    <th>Fixed Pay</th>
                    <td> <?php if (!empty($Fixed_Pay)) echo $Fixed_Pay; ?> </td>
                    <th>Personal Pay</th>
                    <td> <?php if (!empty($Personal_Pay)) echo $Personal_Pay; ?> </td>
                    <th>Hrent1 All</th>
                    <td> <?php if (!empty($Hreant1_All)) echo $Hreant1_All; ?> </td>
                  </tr>
                  <tr>
                    <th>Hrent Sub: All</th>
                    <td> <?php if (!empty($Hrent_Sub_All)) echo $Hrent_Sub_All; ?> </td>
                    <th>Convence All</th>
                    <td> <?php if (!empty($Convence_All)) echo $Convence_All; ?> </td>
                    <th>Adhoc_Rel_2010</th>
                    <td> <?php if (!empty($Adhoc_Rel_2010)) echo $Adhoc_Rel_2010; ?> </td>
                    <th>Computer All</th>
                    <td> <?php if (!empty($Computer_All)) echo $Computer_All; ?> </td>
                  </tr>
                  <tr>
                    <th>Private All</th>
                    <td> <?php if (!empty($Private_All)) echo $Private_All; ?> </td>
                    <th>Extra/D All</th>
                    <td> <?php if (!empty($Extra_All)) echo $Extra_All; ?> </td>
                    <th>Senior_P All</th>
                    <td> <?php if (!empty($Senior_p_All)) echo $Senior_p_All; ?> </td>
                    <th>Medical All</th>
                    <td> <?php if (!empty($Med_All)) echo $Med_All; ?> </td>
                  </tr>
                  <tr>
                    <th>ENT: All</th>
                    <td> <?php if (!empty($ENT_All)) echo $ENT_All; ?> </td>
                    <th>Dean All</th>
                    <td> <?php if (!empty($Dean_All)) echo $Dean_All; ?> </td>
                    <th>Integrated All</th>
                    <td> <?php if (!empty($intgrated_All)) echo $intgrated_All; ?> </td>
                    <th>Spec_Add All</th>
                    <td> <?php if (!empty($Spec_Add_All)) echo $Spec_Add_All; ?> </td>
                  </tr>
                  <tr>
                    <th>Teacher All</th>
                    <td> <?php if (!empty($Teach_All)) echo $Teach_All; ?> </td>
                    <th>Orderly All</th>
                    <td> <?php if (!empty($Orderly_All)) echo $Orderly_All; ?> </td>
                    <th>ARA 2016 10%</th>
                    <td> <?php if (!empty($ARA_2016_10PERCENT)) echo $ARA_2016_10PERCENT; ?> </td>
                    <th>Brain Drain</th>
                    <td> <?php if (!empty($Brain_Drain)) echo $Brain_Drain; ?> </td>
                  </tr>
                  <tr>
                    <th>Other All</th>
                    <td> <?php if (!empty($Oth_All)) echo $Oth_All; ?> </td>
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td> 
                  </tr>
                </tbody>
              </table>
          </div>
      <!-- End of First Column -->
<!--*************************************End Of Allownces Information****************************************-->
          <div class="col-md-offset-1 col-md-10">
            <h4 style="font-weight: 600">Deductions</h4>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Hrent:1 Ded</th>
                    <td> <?php if (!empty($House_Rent_1)) echo $House_Rent_1; ?> </td>
                    <th>Hrent:2 Ded</th>
                    <td>  <?php if (!empty($House_Rent_2)) echo $House_Rent_2; ?>  </td>
                    <th>Elec:Charges 1 Ded</th>
                    <td><?php if (!empty($Electric_Charges_1)) echo $Electric_Charges_1; ?></td>
                    <th>Elec:Charges 2  Ded</th>
                    <td><?php if (!empty($Electric_Charges_2)) echo $Electric_Charges_2; ?></td>
                  </tr>
                  <tr>
                    <th>Sui gas Ded</th>
                    <td><?php if (!empty($SuiGas_Charges)) echo $SuiGas_Charges; ?></td>
                    <th>Water Tax 1 Ded</th>
                    <td><?php if (!empty($Water_Tax1_Charges)) echo $Water_Tax1_Charges; ?></td>
                    <th>Water Tax 2 Ded</th>
                    <td><?php if (!empty($Water_Tax2_Charges)) echo $Water_Tax2_Charges; ?></td>
                    <th>Endovement Fund </th>
                    <td> <?php if (!empty($Endovement_Fund)) echo $Endovement_Fund; ?> </td>
                  </tr>
                  <tr>
                    <th>B.Fund Ded</th>
                    <td><?php if (!empty($B_Fund)) echo $B_Fund; ?></td>
                    <th>Convence Loan Ded</th>
                    <td> <?php if (!empty($Convence_Loan)) echo $Convence_Loan; ?> </td>
                    <th> GP Fund Regular </th>
                    <td> <?php if (!empty($GP_Fund_Regular)) echo $GP_Fund_Regular; ?> </td>
                    <th> GP Fund Advance </th>
                    <td> <?php if (!empty($GP_Fund_Advence)) echo $GP_Fund_Advence; ?> </td>
                  </tr>
                  <tr>
                    <th>Eid Advance Ded</th>
                    <td> <?php if (!empty($Eid_Advance)) echo $Eid_Advance; ?> </td>
                    <th> Union Fund 1 </th>
                    <td> <?php if (!empty($Union_Fund_1)) echo $Union_Fund_1; ?> </td>
                    <th>Union Fund 2 </th>
                    <td> <?php if (!empty($Union_Fund_2)) echo $Union_Fund_2; ?> </td>
                    <th>Vehicle/O Ded</th>
                    <td> <?php if (!empty($Vehicle_Charges_Other)) echo $Vehicle_Charges_Other; ?> </td>
                  </tr>
                  <tr>
                    <th>Upkeep Ded</th>
                    <td> <?php if (!empty($Upkeep_Ded)) echo $Upkeep_Ded; ?> </td>
                    <th>Vehicle/T Ded</th>
                    <td> <?php if (!empty($Vehicle_Charges_Teacher)) echo $Vehicle_Charges_Teacher; ?> </td>
                    <th>R/Leave Ded</th>
                    <td><?php if (!empty($R_Leave_Without_Pay)) echo $R_Leave_Without_Pay; ?></td>
                    <th>Recovery of gap/CA</th>
                    <td><?php if (!empty($Recovery_Gap_CA)) echo $Recovery_Gap_CA; ?></td>
                  </tr>
                  <tr>
                    <th>House Build Loan</th>
                    <td> <?php if (!empty($House_Build_Loan)) echo $House_Build_Loan; ?> </td>
                    <th>Income Tax </th>
                    <td><?php if (!empty($Income_Tax)) echo $Income_Tax; ?></td>
                    <th> Group_Insurance </th>
                    <td> <?php if (!empty($Group_Insurance)) echo $Group_Insurance; ?> </td>
                    <th>Other</th>
                    <td> <?php if (!empty($Other)) echo $Other; ?> </td>
                  </tr>
                  <tr>
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td>
                  </tr>
                </tbody>
              </table>
          </div>
          <!-- End of Second Column -->
<!--************************************End Of Deductions Information****************************************-->
        </div><!-- End of 2nd Row -->
      </div>
<!--******************************************End Of Container***********************************************-->








<br><br><br>


<!-- jQuery library -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Custome JScript File -->
  <script src="js/script.js"></script>

  <script type="text/javascript">
      $('#search').keyup(function(){
      $( "#search" ).autocomplete({
        source: 'script/auto_suggestion_inc.php',
        minLength:1,
        autoFocus:true,   
        // delay:500
      });
    });    
  </script>

</body>
</html>