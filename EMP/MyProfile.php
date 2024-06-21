<?php
session_start();
include "init1.php";
$do = isset($_GET['do']) ? $_GET['do'] : 'prof' ;
if ($do == 'prof') {
?>
<h1 class="w3-container w3-teal">Profile</h1>
<?php
$Emp_id = $_SESSION['ID'];
    $stmt = $con->prepare("SELECT * FROM  employee WHERE  Emp_id=? ");
    $stmt->execute(array($Emp_id ));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($stmt->rowCount() > 0) {?>
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
                <form  class="text-center" style=" margin:0; padding:30px 0 0 0; width:100%;" action="?do=Updata" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="text-align: center;">
                      <a href="Profile.php">
                      <?php
                      echo  "<img src='..\image_emp\\".$_SESSION['image']."'  width=200' height='133' style='border-radius: 50px 10px;'>" ;
                      //<img src="layout\image\profile3.png" width="200" height="133" style="border-radius: 50px 10px;">
                    ?></a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="profrow">
                        <div class="profcolumn" style="margin-left:7%;margin-right:2.5%">
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Emp_id :</label>
                            <input autocomplete="off" class="form-control" type="text"  value="<?php echo $Emp_id  ?>" name="Emp_id " style="text-align: center;"disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Name :</label>
                            <input autocomplete="off" class="form-control" type="text" value="<?php echo $row['emp_name'] ?>" name="emp_name" style="text-align: center;"disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Email ID :</label>
                            <input class="form-control" type="text" value="<?php echo $row['emp_email'] ?>" name="emp_email" style="text-align: center;"disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Contact :</label>
                            <input class="form-control" type="text" value="<?php echo $row['emp_contact'] ?>" name="emp_contact"  style="text-align: center;"disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Address :</label>
                            <input class="form-control" type="text" value="<?php echo $row['address'] ?>" name="address"  style="text-align: center;"disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Designation</label>
                            <input class="form-control" type="text"  value="<?php echo $row['Designation'] ?>" name="patientgender" style="text-align: center;"disabled>
                        </div>
                      </div>
                        <div class="profcolumn" style="margin-left:2.5%;margin-right:5%">
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Department</label>
                            <input class="form-control" type="text"  value="<?php echo $row['Dept_id'] ?>" name="patientaddress" style="text-align: center;" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">date_of_birth</label>
                            <input class="form-control" type="text"  value="<?php echo $row['date_of_birth'] ?>" name="date_of_birth" style="text-align: center;" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">  date_of_joining</label>
                            <input class="form-control" type="text"  value="<?php echo $row['date_of_joining'] ?>" name="date_of_joining" style="text-align: center;" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating"> blood group</label>
                            <input class="form-control" type="text"  value="<?php echo $row['blood_gr'] ?>" name="  blood_gr" style="text-align: center;" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Emergency Contact Name:</label>
                            <input class="form-control" type="text"  value="<?php echo $row['Emg_name'] ?>" name="  blood_gr" style="text-align: center;" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating"> Emergency Contact Number:</label>
                            <input class="form-control" type="text"  value="<?php echo $row['Emg_num'] ?>" name="  blood_gr" style="text-align: center;" disabled>
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
  } else {
    echo "  <div class='container-fluid text-center' style='padding-top: 10px;'>";
        $theMsg ='<div class="alert alert-danger">Error</div>';
      redirecthome($theMsg);
      echo "</div>";
  }

}

if ($do == 'Updata') {
  $Emp_id = $_SESSION['ID'];
  if ($_SERVER['REQUEST_METHOD'] =='POST'){
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
$stmtt = $con->prepare("UPDATE employee SET image = ? WHERE Emp_id = ? ");
$stmtt->execute(array($imageq, $Emp_id));
}
}
}?>
<!-- FOOTER -->
<?php
include $tpl .'footer.php';
?>
</body>
