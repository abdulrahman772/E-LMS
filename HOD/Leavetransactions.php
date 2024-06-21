<?php
session_start();
include "init1.php";
$hodid =$_SESSION['ID'];
  $do = isset($_GET['do']) ? $_GET['do'] : 'showleave' ;
if ($do == 'showleave') {
  $sstatus = 1 ;
  $leave_type = 'Casual Leave';
  $de =$_SESSION['Dept_id'];
  $stmt = $con->prepare("SELECT * FROM transactions
    WHERE status = ? AND Leave_type = ? AND Dept_id =?  ");
  $stmt->execute(array($sstatus,$leave_type,$de));
  $row = $stmt->fetchAll();
    $count = $stmt->rowCount();
  if ($stmt->rowCount() > 0) {
    ?>
    <div class="">
    <header class="" style="margin-top:0; padding: 5px;">
        <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">Casual Leave  Transactions</p>
    </header>
    <div class="">
        <div class="table" align="center">
          <br>
          <table id="employees" class="main-table text-center table table-bordered" >
            <tr style="background-color:#00669b; color:#fff;">
                <td>Emp_id       </td>
                <td>Leave type   </td>
                <td>Start date   </td>
                <td>End date     </td>
				        <td>Comment      </td>
				        <td>control    </td>
                <td></td>
            </tr>
            <?php
            foreach ($row as $row ) {
              echo "<tr style='color: #00669b;'>";
            echo "<td>" . $row['Emp_id'] . "</td>";
              echo "<td>" . $row['Leave_type'] . "</td>";
			  echo "<td>" . $row['Leave_start_date'] . "</td>";
              echo "<td>" . $row['Leave_end_date'] . "</td>";
			   echo "<td>" . $row['comment'] . "</td>";
         echo "<td  style='color: red;font-weight: bold;'>
         <a href='Leavetransactions.php?do=acappointment&idd=" .$row['trans_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> accept </a>
         </td>";
         echo "<td  style='color: red;font-weight: bold;'>
         <a href='Leavetransactions.php?do=re&id=" .$row['trans_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> reject </a>
         </td>";
            echo "</tr>";
            }
             ?>
          </table>
        </div>
</div>
</div>
  <?php
  }
    $status = 1 ;
    $leave_sick = 'Sick Leave';
      $de =$_SESSION['Dept_id'];
    $sstmt = $con->prepare("SELECT * FROM transactions
      WHERE status = ? AND Leave_type = ? AND Dept_id =?");
    $sstmt->execute(array($status,$leave_sick,$de));
    $rrow = $sstmt->fetchAll();
      $count = $sstmt->rowCount();
    if ($stmt->rowCount() > 0) {
      ?>
      <div class="">
      <header class="" style="margin-top:0; padding: 5px;">
          <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">Sick Leave  Transactions</p>
      </header>
      <div class="">
          <div class="table" align="center">
            <br>
            <table id="employees" class="main-table text-center table table-bordered" >
              <tr style="background-color:#00669b; color:#fff;">
                  <td>Emp_id       </td>
                  <td>Leave type   </td>
                  <td>Start date   </td>
                  <td>End date     </td>
  				        <td>Comment      </td>
  				        <td>control    </td>

              </tr>
              <?php
              foreach ($rrow as $rrow ) {
                echo "<tr style='color: #00669b;'>";
              echo "<td>" . $rrow['Emp_id'] . "</td>";
                echo "<td>" . $rrow['Leave_type'] . "</td>";
  			  echo "<td>" . $rrow['Leave_start_date'] . "</td>";
                echo "<td>" . $rrow['Leave_end_date'] . "</td>";
  			   echo "<td>" . $rrow['comment'] . "</td>";
           echo "<td  style='color: red;font-weight: bold;'>
           <a href='Leavetransactions.php?do=acappointment&idd=" .$rrow['trans_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> accept </a>
           ";
           echo "<td  style='color: red;font-weight: bold;'>
           <a href='Leavetransactions.php?do=re&id=" .$rrow['trans_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> reject </a>
           </td>";
              echo "</tr>";
              }
               ?>
            </table>
          </div>
  </div>
  </div>
  <?php
}
$status = 1 ;
$leave_sick = 'Earned Leave';
$de =$_SESSION['Dept_id'];
$stmt2 = $con->prepare("SELECT * FROM transactions
  WHERE status = ? AND Leave_type = ? AND Dept_id =? ");
$stmt2->execute(array($status,$leave_sick, $de));
$row1 = $stmt2->fetchAll();
  $count = $stmt2->rowCount();
if ($stmt->rowCount() > 0) {
  ?>
  <div class="">
  <header class="" style="margin-top:0; padding: 5px;">
      <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">Earned Leave  Transactions</p>
  </header>
  <div class="">
      <div class="table" align="center">
        <br>
        <table id="employees" class="main-table text-center table table-bordered" >
          <tr style="background-color:#00669b; color:#fff;">
              <td>Emp_id       </td>
              <td>Leave type   </td>
              <td>Start date   </td>
              <td>End date     </td>
              <td>Comment      </td>
              <td>control    </td>
          </tr>
          <?php
          foreach ($row1 as $row1 ) {
            echo "<tr style='color: #00669b;'>";
          echo "<td>" . $row1['Emp_id'] . "</td>";
            echo "<td>" . $row1['Leave_type'] . "</td>";
      echo "<td>" . $row1['Leave_start_date'] . "</td>";
            echo "<td>" . $row1['Leave_end_date'] . "</td>";
       echo "<td>" . $row1['comment'] . "</td>";
       echo "<td  style='color: red;font-weight: bold;'>
       <a href='Leavetransactions.php?do=acappointment&idd=" .$row1['trans_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> accept </a>
       </td>";
       echo "<td  style='color: red;font-weight: bold;'>
       <a href='Leavetransactions.php?do=re&id=" .$row1['trans_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> reject </a>
       </td>";
          echo "</tr>";
          }
           ?>
        </table>
      </div>
</div>
</div>
<?php
}
/******************************************************************************/
}elseif ($do == 'acappointment') {
  $trans_id = isset($_GET['idd']) && is_numeric($_GET['idd']) ? intval($_GET['idd']) : 0;
  $stmtx = $con->prepare("SELECT Leave_start_date ,Leave_end_date FROM transactions
    WHERE trans_id = ? LIMIT 1 ");
  $stmtx->execute(array($trans_id));
  $row4 = $stmtx->fetch();
   $countt = $stmtx->rowCount();
    if ($stmtx->rowCount() > 0) {
$hstatus = 1 ;
 $estatus = 0 ;
 $start_date = $row4['Leave_start_date'];
 $end_date = $row4['Leave_end_date'];
 $dateDiff = strtotime($start_date) - strtotime($end_date);
 $days = ceil(abs($dateDiff / 86400));
  $stmt = $con->prepare("UPDATE transactions SET hod_status = ?, status = ?,days = ?  WHERE trans_id = ?  ");
 $stmt->execute(array($hstatus,$estatus,$days,$trans_id));
echo "  <div class='container-fluid text-center'>";
$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' secsesfly </div>';

echo "</div>";
}}
/***************************************************************************/
elseif ($do == 're') {
   $trans_id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
   echo $trans_id;
  $ho = 2;
 $es = 0 ;
 $stmt1 = $con->prepare("UPDATE transactions SET hod_status = ?, status = ?  WHERE trans_id = ?  ");
$stmt1->execute(array($ho,$es,$trans_id));
echo "  <div class='container-fluid text-center'>";
$theMsg = "<div class='alert alert-success'>" . $stmt1->rowCount() . ' secsesfly </div>';
redirecthome($theMsg, 'back',1);
}
?>

<body align="center">
<div style="background-color:#FAFAD2" >

</div>
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
<?php
include $tpl .'footer.php';
?>
