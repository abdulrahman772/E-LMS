<?php
session_start();
include "init1.php";
  $do = isset($_GET['do']) ? $_GET['do'] : 'addappointment' ;
   $empid =$_SESSION['ID'];
   $deptid =$_SESSION['dept'];

    if ($do == 'addappointment') {
		  $stmt = $con->prepare("SELECT * FROM employee WHERE  Emp_id=?  LIMIT 1 ");
      $stmt->execute(array($empid));
      $row = $stmt->fetch();
      $count = $stmt->rowCount();
        if ($stmt->rowCount() > 0) {
	echo $empid;
		echo $deptid;
?>
<body align="center">
<h1> Apply Leave</h1>
            <form class="text-center"  action="?do=insertapp" method="POST">
<label for="Employee_id">Employee ID:  </label>
  <input type="text"  name="Eid" value="<?php echo $empid; ?>" disabled style="text-align: center;">
  <label for="dept_id">Department ID:  </label>
  <input type="text"  name="did" value="<?php echo $deptid; ?>" disabled style="text-align: center;">
  <b>Select Leave Type :</b>
  <select id="lt"   name="addapp" onChange="getleave(this.value);" required>
  <option value="Casual Leave">Casual Leave</option>
  <option value="Earned Leave">Earned Leave</option>
  <option value="Sick Leave">Sick Leave</option>
</select><br><br>
<label for="datetime"><b>Leave Start Date :</b></label>
<input type="date" name="myDate"  >

<label for="datetime"><b>Leave End Date :</b></label>
<input type="date"  name="led"><br>
<b>Comment/Reason :</b><br>	 <textarea  name ="comment" cols="55" rows="3">
</textarea><br> <span id="pa"> <font color="red"></font></span><br>
<input type="submit" id="submit" name="submit" value="Apply Leave">
<input type="reset" id="reset" name="reset" value="Reset">
    </form>
<?php
	}}
  //*******************************************************************************************************
  elseif ($do == 'insertapp') {
	 if ($_SERVER['REQUEST_METHOD'] =='POST'){
 echo $empid;
  echo $deptid;
  $lavale=$_POST['addapp'];
 $myDate=$_POST['myDate'];
  $end=$_POST['led'];
  $comment=$_POST['comment'];

  //echo $lavale;
  //echo $myDate;
  //echo $end;
  //echo $comment;

$status = 1;
 $stmt = $con->prepare("INSERT INTO
   transactions(Emp_id,Dept_id ,Leave_type, Leave_start_date,Leave_end_date,comment,status)
                                VALUES(:zuid, :zdoc, :zst, :zat, :zdt,:zxt,:zqt ) ");
    $stmt->execute(array(
    'zuid'    =>$empid,
      'zdoc' =>$deptid,
     'zst' =>$lavale,
	 'zat'=>$myDate,
	 'zdt'=>$end,
	 'zxt'=>$comment,
	 'zqt'=>$status,


   ));
   echo "<script>
alert('Leave Applied Successfully');
window.location.href='Applyleave.php';
</script>";

  }
  else {
	echo " enter data";
  }

}
	?>
</body>
