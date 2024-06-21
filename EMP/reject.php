<?php
session_start();
include "init1.php";
$empid =$_SESSION['ID'];
  $do = isset($_GET['do']) ? $_GET['do'] : 'showleave' ;
if ($do == 'showleave') {
  $sstatus = 2 ;
  $stmt = $con->prepare("SELECT * FROM transactions
    WHERE hod_status = ? AND Emp_id = ? ");
  $stmt->execute(array($sstatus,$empid));
  $row = $stmt->fetchAll();
    $count = $stmt->rowCount();
  if ($stmt->rowCount() > 0) {
    ?>
    <div class="">
    <header class="" style="margin-top:0; padding: 5px;">
        <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">My Leave Transactions</p>
    </header>
    <div class="">
        <div class="table" align="center">
          <br>
          <table class="main-table text-center table table-bordered" >
            <tr style="background-color:#00669b; color:#fff;">
                <td>Emp_id       </td>
                <td>Leave type   </td>
                <td>Start date   </td>
                <td>End date     </td>
				        <td>Comment      </td>
				        <td>control    </td>
            </tr>
            <?php
            foreach ($row as $row ) {
              echo "<tr style='color: #00669b;'>";
            echo "<td>" . $row['Emp_id'] . "</td>";
              echo "<td>" . $row['Leave_type'] . "</td>";
			  echo "<td>" . $row['Leave_start_date'] . "</td>";
              echo "<td>" . $row['Leave_end_date'] . "</td>";
			   echo "<td>" . $row['comment'] . "</td>";
         echo "<td style='color: red;font-weight: bold;'>   reject </td>";

            echo "</tr>";
            }
             ?>
          </table>
        </div>
</div>
</div>
  <?php
  }

               ?>
            </table>
          </div>
  </div>
  </div>
  <?php
/******************************************************************************/
}
?>
<style>
</style>
<body align="center">
<div style="background-color:#FAFAD2" >

</div>
</body>
