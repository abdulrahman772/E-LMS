<?php
session_start();
if (isset($_SESSION['hod_name'])) {
include "init1.php";
$do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
$userid = isset($_GET['ID']) && is_numeric($_GET['ID']) ? intval($_GET['ID']) : 0;
?>
<body class="body_home" dir="ltr" style="font-family: myfont;background: white;">
    <?php
//**************************************************************************************************
if ($do == 'manage') {
  $de ='SE';
  $stmt = $con->prepare("SELECT * FROM transactions WHERE hod_status = 1 AND Dept_id = ? ");
  $stmt->execute(array($de));
  $row = $stmt->fetchAll();
  $count = $stmt->rowCount();
  if ($count > 0) {
  ?>
      <div class="" style="">
          <header class="" style="margin-top:0;padding: 5px;">
              <p class="w3-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">accepted =
                <?php
                $stmt = $con->prepare("SELECT COUNT(trans_id) FROM transactions WHERE hod_status = 1 AND Dept_id = ? ");
                $stmt->execute(array($de));
                      ?>
                      <?php echo $stmt->fetchColumn ();?>
              </p>
          </header>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-12 col-md-12">
                      <div class="table" align="center">
                          <br>
                          <table id="employees" class="main-table text-center table table-bordered" >
                              <tr style="background-color:#00669b; color:#fff;">
                                  <td>#ID</td>
                                  <td>empid </td>
                                  <td> deptid </td>
                                  <td>Leave_type</td>
                                  <td> Leave_start_date</td>
                                  <td> Leave_end_date   </td>
                                  <td> comment</td>

                              </tr>
                                  <?php
                                      $counter=0;
                                      foreach ($row as $row) {
                                          echo "<tr style='color: #00669b;'>";
                                          echo "<td style='color: red;font-weight: bold;'>" . ++$counter . "</td>";
                                          echo "<td>" . $row['Emp_id'] . "</td>";
                                          echo "<td>" . $row['Dept_id'] . "</td>";
                                          echo "<td>" . $row['Leave_type'] . "</td>";
                                          echo "<td>" . $row['Leave_start_date'] . "</td>";
                                          echo "<td>" . $row['Leave_end_date'] . "</td>";
                                          echo "<td>" . $row['comment'] . "</td>";
                                          echo "</tr>";
                                       }
                                   ?>


                        </table>
                    </div>
                  </div>
              </div>
    </div>
</div>
<?php
}
else {
  echo "  <div class='container-fluid text-center'>";
  echo "<div class='alert alert-success'>  لايوجد اشعة </div>";
  echo "</div>";
}
}
//*************************************************************************************************8
elseif ($do == 'addpatientxray') {

?>

<?php
}
//*******************************************************************************************************
elseif ($do == 'insertxxx') {




}
//************************************************************************

include $tpl . 'footer.php';
}
else {
  header('Location: log.php');
  exit();
}
?>
<style>
  #employees {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#employees td, #employees th {
  border: 1px solid #ddd;
  padding: 8px;
}

#employees tr:nth-child(even){background-color: #f2f2f2;}

#employees tr:hover {background-color: #ddd;}

#employees th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>