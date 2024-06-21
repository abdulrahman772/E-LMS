<?php
session_start();
include "init1.php";
$hrid =$_SESSION['ID'];
  $do = isset($_GET['do']) ? $_GET['do'] : 'search' ;
if ($do == 'search') {
  ?>
  <div class="" style="">
    <header class="" style="margin-top:0; padding: 5px;">
        <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">Search Department</p>
    </header>
  <div class="container-fluid">
  <div class="row">
      <form class="text-center" style=" margin:0; padding:50px 0 0 0; width:100%;" action="search2.php?do=search" method="POST" enctype="multipart/form-data">
          <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="">
              <div class="form-group" style="">
                Department ID  <input class="form-control" type="search" placeholder="Department ID"  name="search" required >
              </div>
          </div>
          <div class="form-group">
              <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="margin-top: 30px;">
                  <input type="submit" value="search" class="ok"/>
              </div>
          </div>
      </form>
  </div>
  <?php
  if ($_SERVER['REQUEST_METHOD'] =='POST')
  {
      //$userid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
      $nn = $_POST['search'];
      $sstatus = 1 ;
      $stmt = $con->prepare("SELECT * FROM transactions WHERE  hod_status = ? AND  Dept_id like '%$nn%' LIMIT 9 ");
      $stmt->execute(array($sstatus));
      $row = $stmt->fetchAll();
        $count = $stmt->rowCount();
      if ($stmt->rowCount() > 0) {
        ?>
        <div class="">
        <header class="" style="margin-top:0; padding: 5px;">
            <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">Department Leave Transactions</p>
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
                    echo "<td>" .  $days . "</td>";
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
    $stmt = $con->prepare("SELECT * FROM transactions WHERE  hod_status = ? AND  Dept_id like '%$nn%' LIMIT 9 ");
      $stmt->execute(array($sstatus));
      $row = $stmt->fetchAll();
        $count = $stmt->rowCount();
      if ($stmt->rowCount() > 0) {
        ?>
        <div class="">
        <header class="" style="margin-top:0; padding: 5px;">
            <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">Department Leave Transactions reject</p>
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

  }
  ?>
  <?php



}

/******************************************************************************/
else {


 echo "  <div class='container-fluid text-center'>";
  echo "<div class='alert alert-danger'>erorr</div>";
echo "</div>";
}
/***************************************************************************/

?>

<body align="center">
<div style="background-color:#FAFAD2" >

</div>
<style type="text/css">
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
.accept {
  color: #FFF;
  background: #44CC44;
  padding: 15px 20px;
  box-shadow: 0 4px 0 0 #2EA62E;
}
.accept:hover {
  background: #6FE76F;
  box-shadow: 0 4px 0 0 #7ED37E;
}
.deny {
  color: #FFF;
  background: tomato;
  padding: 15px 20px;
  box-shadow: 0 4px 0 0 #CB4949;
}
.deny:hover {
  background: rgb(255, 147, 128);
  box-shadow: 0 4px 0 0 #EF8282;
}

</style>
</body>
