<?php
include_once './function_inc.php' ;
include_once './get_employee_info_inc.php';
?>

<!--****************************************End Of PHP Script*************************************************-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <style>

th, td {
    padding: 7px;
}
th {
    text-align: left;
}
</style>
   
  <title>::Employee Management</title>
</head>
<body>
 
  <div class="container" style="font-size: 0.7em">
    <div class="row">
      <div class="col-md-10">
        <h3>Employee ID: &nbsp;<?php if (!empty($Employee_Code)) echo $Employee_Code; ?> </h3>
        <h3>Employee Name: &nbsp; <?php if (!empty($Employee_Name)) echo $Employee_Name ?></h3>

        <h2><u>Employee Information</u></h2>
        <table class="table">
          <tbody>
          
            <tr>
              <th>Designation : </th>
              <td> <?php if (!empty($Designation)) echo $Designation; ?> </td>
              <th>Qualification : </th>
              <td> <?php if (!empty($Qualification)) echo $Qualification; ?> </td>
              <th>Department : </th>
              <td> <?php if (!empty($Department)) echo $Department; ?> </td>
              <th>Admin Position : </th>
              <td> <?php if (!empty($Admin_Position)) echo $Admin_Position; ?> </td>
            </tr>
            <tr>
              <th>A/C No : </th>
              <td> <?php if (!empty($Account_No))  echo $Account_No; ?> </td>
              <th>BPS : </th>
              <td> <?php if (isset($BPS)) echo returnBPS($BPS); ?> </td>
              <th>Fixed : </th>
              <td> <?php  if (!empty($Fix)) echo returnFix($Fix); ?> </td>
              <th>Staff : </th>
              <td> <?php if (!empty($Staff)) echo returnStaff($Staff); ?> </td>
            </tr>
            <tr>
              <th>Campus : </th>
              <td> <?php if (!empty($Campus)) echo $Campus; ?> </td>
              <th>NTN : </th>
              <td> <?php if (isset($NTN)) echo returnNTN($NTN); ?> </td>
              <th>Join Date : </th>
              <td> <?php if (!empty($Join_Date)) echo returnDate($Join_Date) ;?> </td>
              <th>Current Month : </th>
              <td> <?php if (!empty($Current_Month)) echo $Current_Month; ?> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End of First Row -->
<!--**************************************End Of Employee Information****************************************-->    
        <div class="row">
      <div class=" col-md-10">
        <h2><u>Pay and Allowances</u></h2>
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>Basic Pay : </th>
                <td> <?php if (!empty($Basic_Pay)) echo $Basic_Pay; ?> </td>
                <th>Fixed Pay : </th>
                <td> <?php if (!empty($Fixed_Pay)) echo $Fixed_Pay; ?> </td>
                <th>Personal Pay : </th>
                <td> <?php if (!empty($Personal_Pay)) echo $Personal_Pay; ?> </td>
                <th>Hrent1 All : </th>
                <td> <?php if (!empty($Hreant1_All)) echo $Hreant1_All; ?> </td>
              </tr>
              <tr>
                <th>Hrent Sub: All</th>
                <td> <?php if (!empty($Hrent_Sub_All)) echo $Hrent_Sub_All; ?> </td>
                <th>Convence All : </th>
                <td> <?php if (!empty($Convence_All)) echo $Convence_All; ?> </td>
                <th>Adhoc_Rel_2010 : </th>
                <td> <?php if (!empty($Adhoc_Rel_2010)) echo $Adhoc_Rel_2010; ?> </td>
                <th>Computer All : </th>
                <td> <?php if (!empty($Computer_All)) echo $Computer_All; ?> </td>
              </tr>
              <tr>
                <th>Private All : </th>
                <td> <?php if (!empty($Private_All)) echo $Private_All; ?> </td>
                <th>Extra/D All : </th>
                <td> <?php if (!empty($Extra_All)) echo $Extra_All; ?> </td>
                <th>Senior_P All : </th>
                <td> <?php if (!empty($Senior_p_All)) echo $Senior_p_All; ?> </td>
                <th>Medical All : </th>
                <td> <?php if (!empty($Med_All)) echo $Med_All; ?> </td>
              </tr>
              <tr>
                <th>ENT: All : </th>
                <td> <?php if (!empty($ENT_All)) echo $ENT_All; ?> </td>
                <th>Dean All : </th>
                <td> <?php if (!empty($Dean_All)) echo $Dean_All; ?> </td>
                <th>Integrated All : </th>
                <td> <?php if (!empty($intgrated_All)) echo $intgrated_All; ?> </td>
                <th>Spec_Add All : </th>
                <td> <?php if (!empty($Spec_Add_All)) echo $Spec_Add_All; ?> </td>
              </tr>
              <tr>
                <th>Teacher All : </th>
                <td> <?php if (!empty($Teach_All)) echo $Teach_All; ?> </td>
                <th>Orderly All : </th>
                <td> <?php if (!empty($Orderly_All)) echo $Orderly_All; ?> </td>
                <th>ARA 2016 10% : </th>
                <td> <?php if (!empty($ARA_2016_10PERCENT)) echo $ARA_2016_10PERCENT; ?> </td>
                <th>Brain Drain : </th>
                <td> <?php if (!empty($Brain_Drain)) echo $Brain_Drain; ?> </td>
              </tr>
              <tr>
                <th>Other All : </th>
                <td> <?php if (!empty($Oth_All)) echo $Oth_All; ?> </td>
              </tr>
            </tbody>
          </table>
      </div>
      <!-- End of First Column -->
<!--*************************************End Of Allownces Information****************************************-->

          <div class="col-md-10">
            <h2><u>Deductions</u></h2>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Hrent:T Ded</th>
                    <td>00.00</td>
                    <th>Hrent:O Ded</th>
                    <td>20000</td>
                    <th>Elec:T Ded</th>
                    <td>00.00</td>
                    <th>Elec:O Ded</th>
                    <td>00.00</td>
                  </tr>
                  <tr>
                    <th>Sui gas Ded</th>
                    <td>00.00</td>
                    <th>Water T Ded</th>
                    <td>00.00</td>
                    <th>Water O Ded</th>
                    <td>00.00</td>
                    <th>End Ded</th>
                    <td>00.00</td>
                  </tr>
                  <tr>
                    <th>Bfund Ded</th>
                    <td>00.00</td>
                    <th>Conv Ded</th>
                    <td>00.00</td>
                    <th>Gpf: R Ded</th>
                    <td>00.00</td>
                    <th>Gpf:A Ded</th>
                    <td>00.00</td>
                  </tr>
                  <tr>
                    <th>Eid Advance Ded</th>
                    <td>00.00</td>
                    <th>Ufund T/Ded</th>
                    <td>00.00</td>
                    <th>Ufund O/Ded</th>
                    <td>00.00</td>
                    <th>Vehicle/O Ded</th>
                    <td>00.00</td>
                  </tr>
                  <tr>
                    <th>Upkeep Ded</th>
                    <td>00.00</td>
                    <th>T/vehicle Ded</th>
                    <td>00.00</td>
                    <th>R/leav Ded</th>
                    <td>00.00</td>
                    <th>Recov:gap/conv Ded</th>
                    <td>00.00</td>
                  </tr>
                  <tr>
                    <th>Itax Ded</th>
                    <td>00.00</td>
                    <th>Gins Ded</th>
                    <td>00.00</td>
                    <th>P/Tax</th>
                    <td>00.00</td>
                    <th>Oth/Ded</th>
                    <td>00.00</td>
                  </tr>
                </tbody>
              </table>
          </div>
          <!-- End of Second Column -->
<!--************************************End Of Deductions Information****************************************-->
        </div>

        <!-- End of 2nd Row -->
      </div>
<!--******************************************End Of Container***********************************************-->








<br><br><br>


<!-- jQuery library -->
  <script src="../js/jquery-2.1.4.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="../js/bootstrap.min.js"></script>
  <!-- Custome JScript File -->
  <script src="../js/script.js"></script>

</body>
</html>