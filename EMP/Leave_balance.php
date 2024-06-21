<?php
session_start();
include "init1.php";
?>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<?php
$empid = $_SESSION['ID'];
  ?>
</head>
<body>

<h1>Leave balance</h1>

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
            $stmt->execute(array($empid,$le));
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
            $stmt->execute(array($empid,$le));
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
            $stmt->execute(array($empid,$le));
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
	</font>
	<br>
</body>
</html>
