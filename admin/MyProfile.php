<?php
session_start();
include "init1.php";
$admin_id = $_SESSION['ID'];
$do = isset($_GET['do']) ? $_GET['do'] : 'prof' ;
if ($do == 'prof') {
?>
<h1 class="w3-container w3-teal">Profile</h1>
<?php

    $stmt = $con->prepare("SELECT * FROM admin WHERE  admin_ID=? ");
    $stmt->execute(array($admin_id));
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
                    .form-control{
                        color: #00669b;
                    }
                </style>
                <form  class="text-center" style=" margin:0; padding:30px 0 0 0; width:100%;" action="?do=Updata" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12 col-sm-offset-3 col-md-6 col-md-offset-3" style="text-align: center;">

                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">admin_id :</label>
                            <input autocomplete="off" class="form-control" type="text"  value="<?php echo $admin_id  ?>" name="Emp_id " style="text-align: center;"disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Name :</label>
                            <input autocomplete="off" class="form-control" type="text" value="<?php echo $row['admin_name'] ?>" name="emp_name" style="text-align: center;"disabled>
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
         echo $admin_id  ;
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
