<?php
session_start();
include "init1.php";
  $do = isset($_GET['do']) ? $_GET['do'] : 'insert' ;
   $admin_id =$_SESSION['ID'];
    if ($do == 'insert') {
      ?>
      <body align="center">
      <h1> INSERT Employee</h1>

      <form  class="text-center" style=" margin:0; padding:30px 0 0 0; width:100%;" action="?do=insertapp" method="POST" enctype="multipart/form-data">
          <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="text-align: center;">

          <div class="profrow">
              <div class="profcolumn" style="margin-left:7%;margin-right:2.5%">
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Emp_id :</label>
                  <input autocomplete="off" class="form-control" type="text"  value="" name="Emp_id" style="text-align: center;">
              </div>
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Name :</label>
                  <input autocomplete="off" class="form-control" type="text" value="" name="emp_name" style="text-align: center;">
              </div>
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Email ID :</label>
                  <input class="form-control" type="text" value="" name="emp_email" style="text-align: center;">
              </div>
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Contact :</label>
                  <input class="form-control" type="text" value="" name="emp_contact"  style="text-align: center;">
              </div>
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Address :</label>
                  <input class="form-control" type="text" value="" name="address"  style="text-align: center;">
              </div>
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Designation</label>
                  <input class="form-control" type="text"  value="" name="Designation" style="text-align: center;">
              </div>
            </div>
              <div class="profcolumn" style="margin-left:2.5%;margin-right:5%">
              <div class="form-group">
                  <select name="dept" class="form-control" onChange="getdept(this.value);" required="required" style="color: #00669b; width:100%;" autofocus>
                      <option value="" style="color: red;"> Department</option>
                      <?php
                      $stmt = $con->prepare("SELECT * FROM department ");
                      $stmt->execute();
                      $row = $stmt->fetchAll();
                      foreach ($row as $row ) {
                      ?>
                      <option style="" value="<?php echo htmlentities($row['Dept_id']);?>">
                      <?php echo htmlentities($row['Dept_id']);?>
                      </option>
                      <?php } ?>
                  </select>
              </div>




              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">date_of_birth</label>
                  <input class="form-control" type="date"  value="" name="date_of_birth" style="text-align: center;" >
              </div>
<br>
<br>

<div class="form-group">
    <label for="exampleInput1" class="bmd-label-floating"> Emp_type</label>
    <input class="form-control" type="text"  value="" name="Emp_type" style="text-align: center;" >
</div>
<div class="form-group">
    <label for="exampleInput1" class="bmd-label-floating"> weekoff</label>
    <input class="form-control" type="text"  value="" name="weekoff" style="text-align: center;" >
</div>
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating"> blood group</label>
                  <input class="form-control" type="text"  value="" name="blood_gr" style="text-align: center;" >
              </div>
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating">Emergency Contact Name:</label>
                  <input class="form-control" type="text"  value="" name="emg_name" style="text-align: center;" >
              </div>
              <div class="form-group">
                  <label for="exampleInput1" class="bmd-label-floating"> Emergency Contact Number:</label>
                  <input class="form-control" type="text"  value="" name="emg_num" style="text-align: center;" >
              </div>
            </div>
          </div>
            <br>
            <br>
            <br>
            <br>
                  <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="imageuser">
                  <label class="custom-file-label" for="customFile">chose image </label>
                  <br>
                  <br>
              </div>
              <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="margin-top: 50px;">
                 <input type="submit" value="save" class="ok"/>
             </div>
              <style>
                  .custom-file-label {
                      color: #aaa;
                      border-bottom: 1px solid #d2d2d2;
                      border-radius: 0;
                  }
                  .custom-file-label:hover,.custom-file-label:focus {
                      transition: .5ms;
                      background-image: linear-gradient(to top, #00669b 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
                  }
              </style>

          </div>

              <style>
                  .ok {
                      width: 100%;
                      padding: 10px;
                      color: #fff;
                      background-color: #00669b;
                      border-radius: 5px;
                      border:none;
                  }
                  .ok:hover,.ok:focus {
                      opacity: 0.8;
                  }
              </style>

      </form>

<?php
	}
  //*******************************************************************************************************
  elseif ($do == 'insertapp') {
	 if ($_SERVER['REQUEST_METHOD'] =='POST'){
    $Emp_id=$_POST['Emp_id'];
    $emp_name=$_POST['emp_name'];
        $emp_email=$_POST['emp_email'];
            $emp_contact=$_POST['emp_contact'];
                $Designation=$_POST['Designation'];
                  $dept=$_POST['dept'];
$Emp_type=$_POST['Emp_type'];
$weekoff=$_POST['weekoff'];
      $address=$_POST['address'];
  $blood_gr=$_POST['blood_gr'];
    $emg_name=$_POST['emg_name'];
      $emg_num=$_POST['emg_num'];


 $date_of_birth=$_POST['date_of_birth'];

  $imagename = $_FILES ['imageuser']['name'];
  $imagesize = $_FILES ['imageuser']['size'];
  $imagetmp = $_FILES ['imageuser']['tmp_name'];
  $imagetype = $_FILES ['imageuser']['type'];

    $imageq = rand(0, 100000000) . '_' . $imagename ;

    move_uploaded_file($imagetmp, "C:\\xampp\htdocs\E-LMS\image_emp\\" . $imageq);
$status = 1;
 $stmt = $con->prepare("INSERT INTO
   employee(Emp_id,emp_name ,emp_email,emp_contact,Designation,	Dept_id,Emp_type,	weekoff,pass,address,image,date_of_birth,blood_gr,Emg_name,Emg_num,date_of_joining)
                                VALUES(:A, :B, :C, :D, :E,:F,:G ,:H ,:I,:J,:K,:L,:M,:N,:O, now()) ");
    $stmt->execute(array(
    'A' =>$Emp_id,
    'B' =>$emp_name,
    'C' =>$emp_email,
	  'D' =>$emp_contact,
	  'E' =>$Designation,
	  'F' =>$dept,
	  'G' =>$Emp_type,
    'H' =>$weekoff,
    'I' =>$Emp_id,
    'J' =>$address,
    'K' =>$imageq,
    'L' =>$date_of_birth,
    'M' =>$blood_gr,
    'N' =>$emg_name,
    'O' =>$emg_num,

   ));
   echo "<script>
alert('Leave Applied Successfully');
window.location.href='manga.php';
</script>";

  }
  else {
	echo " enter data";
  }

}
/*******************************************************************************************/
  elseif ($do == 'delete') {
    ?>
    <div class="" style="">
      <header class="" style="margin-top:0; padding: 5px;">
          <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">Search Employee</p>
      </header>
    <div class="container-fluid">
    <div class="row">
        <form class="text-center" style=" margin:0; padding:50px 0 0 0; width:100%;" action="manga.php?do=delete" method="POST" enctype="multipart/form-data">
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
        $row = $stmt->fetchAll();
          $count = $stmt->rowCount();
        if ($stmt->rowCount() > 0) {
          $stmt = $con->prepare("DELETE FROM employee WHERE Emp_id = :muser OR emp_name =:muser ");
          $stmt->bindParam(":muser", $nn);
          $stmt->execute();
          echo "  <div class='container-fluid text-center'>";
        $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' تم الحذف </div>';
        redirecthome($theMsg, 'back');
        echo "</div>";
        }
        else {
          echo "  <div class='container-fluid text-center'>";
            $theMsg =  '<div class="alert alert-danger">$this employee not add</div>';
              redirecthome($theMsg, 'back');
            echo "</div>";
        }
?>
      </div>
      </div>
        <?php
        }

}
/******************************************************************************************************/
elseif ($do == 'update') {
    ?>
    <div class="" style="">
      <header class="" style="margin-top:0; padding: 5px;">
          <p class="text-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;">update Employee</p>
      </header>
    <div class="container-fluid">
    <div class="row">
        <form class="text-center" style=" margin:0; padding:50px 0 0 0; width:100%;" action="manga.php?do=update" method="POST" enctype="multipart/form-data">
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
        $stmt = $con->prepare("SELECT * FROM employee WHERE Emp_id like '%$nn%' OR  emp_name like '%$nn%' LIMIT 10 ");
        $stmt->execute();
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        if ($stmt->rowCount() > 0) {
          ?>

          <div class="" style="">
              <header class="" style="margin-top:0;padding:5px;">
                <p class="w3-center" style="padding-top:0;color:#00669b;font-weight:bold;font-size:25px;"> MY Profile</p>
              </header>

            <div class="container-fluid">
                <div class="row">
                    <style>
                        .form-control,
                        .is-focused .form-control {
                            background-image: linear-gradient(to top, #00669b 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
                        }
                        .profcolumn {
      float: left;
      width: 40%;
      height: 550px;
      background-color: #9FAE44;
      }
                        .profrow:after {
                            content: "";
                              display: table;
                                clear: both;

                              }
                        .form-control{
                            color: #00669b;
                        }
                    </style>
                    <form  class="text-center" style=" margin:0; padding:30px 0 0 0; width:100%;" action="manga.php?do=updat" method="POST" enctype="multipart/form-data">
                        <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="text-align: center;">
                        <br>
                        <div class="profrow">
                            <div class="profcolumn" style="margin-left:7%;margin-right:2.5%">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Emp_id :</label>
                                <input autocomplete="off" class="form-control" type="text"  value="<?php echo $row['Emp_id'] ?>" name="Emp_id" style="text-align: center;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Name :</label>
                                <input autocomplete="off" class="form-control" type="text" value="<?php echo $row['emp_name'] ?>" name="emp_name" style="text-align: center;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Email ID :</label>
                                <input class="form-control" type="text" value="<?php echo $row['emp_email'] ?>" name="emp_email" style="text-align: center;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Contact :</label>
                                <input class="form-control" type="text" value="<?php echo $row['emp_contact'] ?>" name="emp_contact"  style="text-align: center;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Address :</label>
                                <input class="form-control" type="text" value="<?php echo $row['address'] ?>" name="address"  style="text-align: center;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Designation</label>
                                <input class="form-control" type="text"  value="<?php echo $row['Designation'] ?>" name="Designation" style="text-align: center;">
                            </div>
                          </div>
                            <div class="profcolumn" style="margin-left:2.5%;margin-right:5%">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Department</label>
                                <input class="form-control" type="text"  value="<?php echo $row['Dept_id'] ?>" name="Dept_id" style="text-align: center;" disabled >
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">date_of_birth</label>
                                <input class="form-control" type="text"  value="<?php echo $row['date_of_birth'] ?>" name="date_of_birth" style="text-align: center;" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">  date_of_joining</label>
                                <input class="form-control" type="text"  value="<?php echo $row['date_of_joining'] ?>" name="date_of_joining" style="text-align: center;"disabled >
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating"> blood group</label>
                                <input class="form-control" type="text"  value="<?php echo $row['blood_gr'] ?>" name="blood_gr" style="text-align: center;" disabled >
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Emergency Contact Name:</label>
                                <input class="form-control" type="text"  value="<?php echo $row['Emg_name'] ?>" name="emg_name" style="text-align: center;" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating"> Emergency Contact Number:</label>
                                <input class="form-control" type="text"  value="<?php echo $row['Emg_num'] ?>" name="emg_num" style="text-align: center;" >
                            </div>
                          </div>
                        </div>
                          <br>
                          <br>
                          <br>
                          <br>
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="imageuser">
                                <label class="custom-file-label" for="customFile">chose image </label>
                                <br>
                                <br>
                            </div>
                            <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="margin-top: 50px;">
                               <input type="submit" value="save" class="ok"/>
                           </div>
                            <style>
                                .custom-file-label {
                                    color: #aaa;
                                    border-bottom: 1px solid #d2d2d2;
                                    border-radius: 0;
                                }
                                .custom-file-label:hover,.custom-file-label:focus {
                                    transition: .5ms;
                                    background-image: linear-gradient(to top, #00669b 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
                                }
                            </style>

                        </div>

                            <style>
                                .ok {
                                    width: 100%;
                                    padding: 10px;
                                    color: #fff;
                                    background-color: #00669b;
                                    border-radius: 5px;
                                    border:none;
                                }
                                .ok:hover,.ok:focus {
                                    opacity: 0.8;
                                }
                            </style>

                    </form>
                </div>
            </div>
        </div>

<?php
}

        else {
          echo "  <div class='container-fluid text-center'>";
            $theMsg =  '<div class="alert alert-danger">$this employee not add</div>';
              redirecthome($theMsg, 'back');
            echo "</div>";
        }
}
}

if ($do == 'updat') {
  if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $Emp_id=$_POST['Emp_id'];
    $emp_name=$_POST['emp_name'];
        $emp_email=$_POST['emp_email'];
            $emp_contact=$_POST['emp_contact'];
      $address=$_POST['address'];
    $emg_name=$_POST['emg_name'];
      $emg_num=$_POST['emg_num'];
    $imagename = $_FILES ['imageuser']['name'];
    $imagesize = $_FILES ['imageuser']['size'];
    $imagetmp = $_FILES ['imageuser']['tmp_name'];
    $imagetype = $_FILES ['imageuser']['type'];

      $imageq = rand(0, 100000000) . '_' . $imagename ;
    $stmt = $con->prepare("SELECT * FROM  employee WHERE  Emp_id=? ");
    $stmt->execute(array($Emp_id ));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($stmt->rowCount() > 0) {

move_uploaded_file($imagetmp, "C:\\xampp\htdocs\E-LMS\image_emp\\" . $imageq);
$stmtt = $con->prepare("UPDATE employee SET image = ? ,emp_name =? ,emp_email=?,emp_contact=?,address=?,Emg_name =?,Emg_num=? WHERE Emp_id = ? ");
$stmtt->execute(array($imageq,$emp_name,$emp_email,$emp_contact,$address,$emg_name,$emg_num,$Emp_id ));
}
}
}


?>
      </div>
      </div>

</body>
