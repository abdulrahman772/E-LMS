<?php
session_start();
include "init1.php";
$empid =$_SESSION['ID'];
echo $empid;
  $do = isset($_GET['do']) ? $_GET['do'] : 'showleave' ;
if ($do == 'showleave') {

  $status = 1 ;
  $stmt = $con->prepare("SELECT * FROM transactions
    WHERE status = ? AND Emp_id = ? LIMIT 9 ");
  $stmt->execute(array($status ,$empid));
  $row = $stmt->fetchAll();
    $count = $stmt->rowCount();
  if ($stmt->rowCount() > 0) {
    ?>
    <div class="">
    <header class="" style="margin-top:0; padding: 5px;">
        <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">My Leave Transactions</p>
    </header>
    <div class="">
        <div  class="table" align="center">
          <br>
          <table id="employees" class="main-table text-center table table-bordered" >
            <tr style="background-color:#00669b; color:#fff;">
                  <td>#ID</td>
                <td>Emp_id       </td>
                <td>Leave type   </td>
                <td>Start date   </td>
                <td>End date     </td>
                <td>Comment      </td>
                <td>status    </td>
            </tr>
            <?php
            $counter =0;
            foreach ($row as $row ) {
              echo "<tr style='color: #00669b;'>";
                echo "<td style='color: red;font-weight: bold;'>" . ++$counter . "</td>";
            echo "<td>" . $row['Emp_id'] . "</td>";
              echo "<td>" . $row['Leave_type'] . "</td>";
        echo "<td>" . $row['Leave_start_date'] . "</td>";
              echo "<td>" . $row['Leave_end_date'] . "</td>";
              $start_date = $row['Leave_start_date'];
              $end_date = $row['Leave_end_date'];
         echo "<td>" . $row['comment'] . "</td>";
          echo "<td  style='color:#1a75ff;font-weight: bold;'> Pending... </td>";

            echo "</tr>";
            }


             ?>
          </table>
        </div>
  </div>
  </div>
  <?php
  }


  $sstatus = 1 ;
  $stmt = $con->prepare("SELECT * FROM transactions
    WHERE hod_status = ? AND Emp_id = ? LIMIT 9 ");
  $stmt->execute(array($sstatus ,$empid));
  $row = $stmt->fetchAll();
    $count = $stmt->rowCount();
  if ($stmt->rowCount() > 0) {
    ?>
    <div class="">
    <header class="" style="margin-top:0; padding: 5px;">
        <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">My Leave Transactions approved </p>
    </header>
    <div class="">
        <div  class="table" align="center">
          <br>
          <table id="employees" class="main-table text-center table table-bordered" >
            <tr style="background-color:#00669b; color:#fff;">
                  <td>#ID</td>
                <td>Emp_id       </td>
                <td>Leave type   </td>
                <td>Start date   </td>
                <td>End date     </td>
                  <td>day     </td>
                <td>Comment      </td>
                <td>status    </td>
            </tr>
            <?php
            $counter =0;
            foreach ($row as $row ) {
              echo "<tr style='color: #00669b;'>";
                echo "<td style='color: red;font-weight: bold;'>" . ++$counter . "</td>";
            echo "<td>" . $row['Emp_id'] . "</td>";
              echo "<td>" . $row['Leave_type'] . "</td>";
			  echo "<td>" . $row['Leave_start_date'] . "</td>";
              echo "<td>" . $row['Leave_end_date'] . "</td>";
              $start_date = $row['Leave_start_date'];
              $end_date = $row['Leave_end_date'];
              $dateDiff = strtotime($start_date) - strtotime($end_date);
              $days = ceil(abs($dateDiff / 86400));
                echo "<td>" . abs($days + 1) . "</td>";

			   echo "<td>" . $row['comment'] . "</td>";
          echo "<td  style='color: green;font-weight: bold;'> approved </td>";

            echo "</tr>";
            }


             ?>
          </table>
        </div>
</div>
</div>
  <?php
  }
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
        <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">My Leave Transactions reject</p>
    </header>
    <div class="">
        <div class="table" align="center">
          <br>
          <table  id="employees" class="main-table text-center table table-bordered" >
            <tr >
                <td>#ID</td>
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
              echo "<td style='color: red;font-weight: bold;'>" . ++$counter . "</td>";
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

  else {
    echo "  <div class='container-fluid text-center'>";
  $theMsg ='<div class="alert alert-danger"> لا يوجد لديك مواعيد</div>';
     redirecthome($theMsg, 'back',1);
    echo "</div>";
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
<body align="center">
<div style="background-color:#FAFAD2" >

</div>
</body>
