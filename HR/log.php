<?php
session_start();
$x2= 0;
$nonavsid ='';
$page_title ='Login |  HR';
$do = isset($_GET['do']) ? $_GET['do'] : 'mmm' ;
  $x3=0;
  $nn ='';
if (isset($_SESSION['HR_name'])) {
 header('Location: MainPage.php');
}
include "init1.php";
?>

<?php

if ($do == 'psa') {
  ?>
  <div class="container-fluid">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
              <div class="bac_titel w3-animate-bottom">
                  <p>Reset Password</p>
                  <form class="body_log" dir="rtl" action="?do=psa" method="POST">
                      <input class="input_login" type="text" placeholder=" Email" name="emile" autocomplete="off" autofocus required>
                      <br>
                      <input autocomplete="new-password" class="form-control" type="text" value="" placeholder="phone number" required name="pass">
                      <button type="submit" class="w3-animate-zoom">send
                      </button>
                  </form>
              </div>
          </div>
      </div>
  </div>
<?php
}
?>
<?php
if ($do == 'mmm') {
  if ($_SERVER['REQUEST_METHOD'] =='POST')
  {
      $username = $_POST['user'];
      $password = $_POST['pass'];
      $stmt = $con->prepare("SELECT
                	hr_id , password,hr_name
                     FROM
                  hr
                     WHERE
                  hr_id=?
                    AND
                    password =?
                    LIMIT 1 ");
      $stmt->execute(array($username, $password));
      $row = $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0)
      {
          $_SESSION['ID'] = $row['hr_id'];
          $_SESSION['hr_name'] = $row['hr_name'];

          header('Location: MainPage.php'); // Redirect To Dashboard Page
         exit();
          }
            else {
              //$z += 1;
               $_SESSION['loginfild'] += 1;
               $nn="<h6 class='rpr'>hr_id  or password Wrong</h6>";
              $x2=1;
            }
}
        else {

          $_SESSION['loginfild']=0;
          $_SESSION['loginfild'] =$_SESSION['loginfild'] +1;

        }
  ?>

<body class="container-fluid">

    <div class="row">
        <form class="" style="width: 100%;padding: 0 50px;margin: 0;"  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="col-sm-12 col-sm-offset-3 col-md-5 col-md-offset-4" style="text-align: center;">
                <div class="bac_titel w3-animate-zoom" style="padding-bottom: 20px;">
                    <p class="titel-log">HR login </p>
                    <div class="form-group" style="padding: 27px 20px 0 20px;">
                        <input autocomplete="off" class="form-control" type="text" value="" required name="user" style=""  placeholder=" HR_ID" autofocus>
                    </div>
                    <div class="form-group" style="padding: 27px 20px 0 20px;">
                        <input autocomplete="new-password" class="form-control" type="password" value="" placeholder="password" required name="pass" style="">
                    </div>
                    <p class="ppr"><a href="log.php?do=psa" class="ppr"> Forgot Password? </a></p>

                        <?php
                        if ($x2 == 1); {
                      echo $nn;

                        }
                         ?>

                         <?php
                         //if ($z > 5) {
                      if ($_SESSION['loginfild'] > 5) {

                         }
                         else {
                             ?>
                       <button type="submit" class="w3-animate-zoom">Login
                        </button>
  <?php
 }
  ?>
</div>

            </div>
        </form>
    </div>


</body>
<?php
 }
 ?>
