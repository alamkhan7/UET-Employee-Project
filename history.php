<?php
include_once dirname(__FILE__).'/script/function_inc.php' ;
include_once dirname(__FILE__).'/script/Connection.php';

/* If not loggedin then redirect them to login page */
if (!loggedin())
  header("Location: ./login.php");

$totalRecord = 0 ;
$start = 0 ;
$limit = 12 ;
$page = 0 ;

if (isset($_GET['page'])){
  $page = $_GET['page'] ; 
  $start = $_GET['page'] ;
  $start = $start * $limit ;

}

/*Find total number of records when history_view.php page return id*/
if (isset($_GET['id']) || isset($_GET['oldempid'])){
  
  if (isset($_GET['id']))
    $id = $_GET['id'] ;
  else
    $oldempid = $_GET['oldempid'] ;

  if (!empty($id)){
    @$query = "SELECT * FROM `allowance_history` WHERE Employee_Code='$id'";
  }
  else{
    @$query = "SELECT * FROM `allowance_history` WHERE Employee_Code='$oldempid'";
  }
  
  if ($result = mysqli_query($conn, $query)) {
      $totalRecord = mysqli_num_rows($result) ;
  }
  else{
    echo "Sorry! Server Fault. " . mysqli_error($conn) ;
  }

  @mysqli_free_result($result);
}


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
    
  </style>
  <title>::CMS Employee Management</title>
</head>
<body>

<?php include ('header_inc.php'); ?>
<!--*******************************************End Of Header**************************************************-->
  
  <?php if (!empty($_GET['Error'])){
  ?>
  <div class="container-fluid ">
    <div class="col-sm-6 col-md-offset-4 col-md-4">
        <div class="alert alert-danger text-center">
        <a href="" class="close" data-dismiss="alert" aria-label="Close"> &times; </a>
          <?php echo $_GET['Error']; ?>
        </div>
    </div>
  </div>
  <?php }?>

  <div class="container" style="margin-top : 25px">
    <div class="row">
      <div class="col-md-pull-1 col-md-5">
        <!--*******************************************Strat Search**************************************************-->
          <div id="logo" class="text-center">
            <h4>Search Employee</h4>
          </div>
          <!-- Form is handle by auto_suggestion file  -->
          <form role="form" id="form-buscar" autocomplete="off" method="POST" action="./script/history_view.php">
            <div class="form-group ">
              <div class="input-group col-md-10">
                  <input id="search" class="form-control  ui-widget" type="text" name="search" placeholder="EMP ID/Name"/ autofocus>
                  <span class="input-group-btn">
                    <button class="btn btn-success" type="submit" name="current">
                      <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
                    </button>
                  </span>
                </div>
                <div id="resultList"></div>
              </div>
          </form>
        <!--*******************************************End Of Search**************************************************-->

        <h4 style="font-weight: 600; color: green;">Current Employee History</h4>
        <?php if (!empty($totalRecord) && !empty($id)) echo "<p>Total Record: {$totalRecord}</p>"; ?>
        <table class="table table-hover table-striped">
          <tbody>
          <thead>
             <tr>
              <th>Number</th>
              <th>Date</th>
              <th>Download</th>
            </tr>
          </thead>
          <tbody>
              <?php
              
                @$id = $_GET['id'] ;
                $query = "SELECT Employee_Code, `Date` FROM `allowance_history` WHERE Employee_Code='$id' LIMIT ".$start.", " .$limit."" ;
                $result = mysqli_query($conn,$query) ;
                $serialNo = $start +1  ;
                while ($row = mysqli_fetch_assoc($result)) {
                  $date = $row['Date'] ;
                  echo "<tr>" ;
                  echo "<td>{$serialNo}</td>" ;
                  echo "<td>{$row['Date']}</td>" ;
                  echo "<td><a href=\"./script/current_history_report.php?generate&id=$id&date=$date\">Click Here</a></td>" ;
                  echo "</tr>" ;
                  $serialNo++ ;
                }
                @mysqli_free_result($result);
              
              ?>

          </tbody>
        </table>
        <ul class="pagination">
          <?php
            if (!empty($id))
            {
              
              if ($page>0){
                $nextPage = $page - 1 ;
                echo "<li><a href=\"?page={$nextPage}&id={$id}\">Previous</a></li>" ;
              }

              $total = ceil($totalRecord / $limit) ;
              $nextPage = $page + 1 ;
              
              if ($nextPage < $total){
                echo "<li><a href=\"?page={$nextPage}&id={$id}\">Next</a></li>" ;
              }
            }
          ?>
        </ul>
      </div> <!-- End of First Column -->
    
      <div class="col-md-offset-2 col-md-5">
        <!--*******************************************Strat Search**************************************************-->
          <div id="logo" class="text-center">
            <h4>Search Employee</h4>
          </div>
          <!-- Form is handle by auto_suggestion file  -->
          <form role="form" id="form-buscar" autocomplete="off" method="POST" action="./script/history_view.php">
            <div class="form-group ">
              <div class="input-group col-md-10">
                  <input id="oldsearch" class="form-control  ui-widget" type="text" name="search" placeholder="EMP ID/Name"/ >
                  <span class="input-group-btn">
                    <button class="btn btn-success" type="submit" name="delete">
                      <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
                    </button>
                  </span>
                </div>
                <div id="resultList"></div>
              </div>
          </form>
        <!--*******************************************End Of Search**************************************************-->

        <h4 style="font-weight: 600; color: red;">Deleted Employee History</h4>
        <?php if (!empty($totalRecord) && !empty($oldempid) ) echo "<p>Total Record: {$totalRecord}</p>"; ?>
        <table class="table table-hover table-striped">
          <tbody>
          <thead>
             <tr>
              <th>Number</th>
              <th>Date</th>
              <th>Download</th>
            </tr>
          </thead>
          <tbody>
              <?php
              
                @$oldempid = $_GET['oldempid'] ;
                $query = "SELECT Employee_Code, `Date` FROM `allowance_history` WHERE Employee_Code='$oldempid' LIMIT ".$start.", " .$limit."" ;
                $result = mysqli_query($conn,$query) ;
                $serialNo = $start +1  ;
                while ($row = mysqli_fetch_assoc($result)) {
                  $date = $row['Date'] ;
                  echo "<tr>" ;
                  echo "<td>{$serialNo}</td>" ;
                  echo "<td>{$row['Date']}</td>" ;
                  echo "<td><a href=\"./script/current_history_report.php?generate&id=$oldempid&date=$date&deleted=1\">Click Here</a></td>" ;
                  echo "</tr>" ;
                  $serialNo++ ;
                }
                @mysqli_free_result($result);
              
              ?>

          </tbody>
        </table>
        <ul class="pagination">
          <?php
            if (!empty($oldempid))
            {
              
              if ($page>0){
                $nextPage = $page - 1 ;
                echo "<li><a href=\"?page={$nextPage}&oldempid={$oldempid}\">Previous</a></li>" ;
              }

              $total = ceil($totalRecord / $limit) ;
              $nextPage = $page + 1 ;
              
              if ($nextPage < $total){
                echo "<li><a href=\"?page={$nextPage}&oldempid={$oldempid}\">Next</a></li>" ;
              }
            }
          ?>
        </ul>
      </div> <!-- End of 2nd Column -->

    </div> <!-- End of 1st Row -->  
<!--*************************************End Of Current Employee History****************************************-->
    
  </div>
<!--******************************************End Of Container***********************************************-->



<?php 
mysqli_close($conn);
?>




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


      $('#oldsearch').keyup(function(){
      $( "#oldsearch" ).autocomplete({
        source: 'script/auto_suggestion_for_old_inc.php',
        minLength:1,
        autoFocus:true,   
        // delay:500
      });
    });     
  </script>

</body>
</html>