<?php
session_start();
include "init1.php";
$hrid =$_SESSION['ID'];
$de =$_SESSION['Dept_id'];
  $do = isset($_GET['do']) ? $_GET['do'] : 'search' ;
if ($do == 'search') {
  ?>
  <div class="" style="">
    <header class="" style="margin-top:0; padding: 5px;">
        <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">Search Employee</p>
    </header>
  <div class="container-fluid">
  <div class="row">
      <form class="text-center" style=" margin:0; padding:50px 0 0 0; width:100%;" action="search2.php?do=search" method="POST" enctype="multipart/form-data">
          <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="">
              <div class="form-group" style="">
                Employee ID  <input class="form-control" type="search" placeholder="Employee ID"  name="search" required >
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
      $nn = $_POST['search'];
      $stmt = $con->prepare("SELECT * FROM employee WHERE Emp_id like '%$nn%' OR  emp_name like '%$nn%' LIMIT 1 ");
      $stmt->execute();
      $row = $stmt->fetch();
        $count = $stmt->rowCount();
if ($stmt->rowCount() > 0) {
   $Emp_id =$row['Emp_id'];
      $stmt = $con->prepare("SELECT * FROM transactions WHERE Dept_id =?  AND Emp_id =?   LIMIT 9 ");
      $stmt->execute(array($de,$Emp_id));
      $row = $stmt->fetchAll();
        $count = $stmt->rowCount();
      if ($stmt->rowCount() > 0) {
        ?>
        <table border=1 padding=2 width="100%" height="20%"><h1>
        <tr>
        <th colspan="2" bgcolor="#DEB887"> Casual Leave status  15 </th>
        </tr></h1>
         <tr>
          <td> 	<ul>
                <h3>Leaves used till now:
                  <?php
                     $le = 'Casual Leave';
                     $stmt = $con->prepare("SELECT SUM(days) FROM transactions WHERE  Emp_id = ? AND Leave_type = ? LIMIT 1");
                    $stmt->execute(array($Emp_id,$le));
                    $x=$stmt->fetchColumn ();
                    echo $x;
                        ?>
                      </h3>

                  <dl>

        		   </dl>
          </td>
           <td>  <h3>Currently Available Leaves:
             <?php
             $le = 'Casual Leave';
           $z=15 - $x;
             echo intval($z) ?>

           </h3>

        	</td>
        		</ul>
        	</tr>
            </table>
        	</font>
        	<br>


        <table border=1 padding=2 width="100%" height="20%"><h1>
        <tr>
        <th colspan="2" bgcolor="#DEB887">Earned Leave status 30</th>
        </tr></h1>
         <tr>
          <td> 	<ul>
                <h3>Leaves used till now:
                  <?php
                     $le = 'Earned Leave';
                     $stmt = $con->prepare("SELECT SUM(days) FROM transactions WHERE  Emp_id = ? AND Leave_type = ? LIMIT 1");
                    $stmt->execute(array($Emp_id,$le));
                    $x=$stmt->fetchColumn ();
                    echo $x;
                        ?></h3>
                  <dl>

        		   </dl>
          </td>
           <td>  <h3>Currently Available Leaves:
             <?php

           $z=30 - $x;
             echo intval($z) ?>
        </h3>

        	</td>
        		</ul>
        	</tr>
            </table>
        	</font>
        	<br>


        <table border=1 padding=2 width="100%" height="20%"><h1>
        <tr>
        <th colspan="2" bgcolor="#DEB887">Sick Leave status 10</th>
        </tr></h1>
         <tr>
          <td> 	<ul>
                <h3>Leaves used till now:
                  <?php
                     $le = 'Sick Leave';
                     $stmt = $con->prepare("SELECT SUM(days) FROM transactions WHERE  Emp_id = ? AND Leave_type = ? LIMIT 1");
                    $stmt->execute(array($Emp_id,$le));
                    $x=$stmt->fetchColumn ();
                    echo $x;
                        ?>
                      </h3>
                  <dl>

        		   </dl>
          </td>
           <td>  <h3>Currently Available Leaves:
             <?php

           $z=10 - $x;
             echo intval($z) ?></h3>

        	</td>
        		</ul>
        	</tr>
            </table>
      <?php
      }



           ?>
    <?php

  }
  ?>
  <?php


}
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
