<?php 
session_start();     
    include('connection.php');  
   
$username = $_POST['Emp_id'];
$password = $_POST['pass'];
 $stmt = $con->prepare("SELECT
                	Emp_id , pass,emp_name
                     FROM
                    employee
                     WHERE
                    Emp_id=?
                    AND
                    pass =?
                    LIMIT 1 ");
      $stmt->execute(array($username, $password));
      $row = $stmt->fetch();
      $count = $stmt->rowCount();

  if ($count > 0)
      {

         $_SESSION['username'] = $username;
          $_SESSION['ID'] = $row['Emp_id'];
          $_SESSION['emp_name'] = $row['emp_name'];
	
          header('Location: MainPage.php'); // Redirect To Dashboard Page
         exit();
          }

else 
{
	include('Loginpage.php');
	echo "<script>
alert('Wrong username and password....');
</script>";
}














/*
$sql = "SELECT * FROM employee WHERE Emp_id = '$username' AND pass = '$password' ";
$result = mysqli_query($con,$sql) or die(mysqli_error());
$row = mysqli_fetch_row($result);
$numrows = mysqli_num_rows($result);
if($numrows > 0)
   {
	   $_SESSION['ID'] = $row['Emp_id'];
    include('MainPage.php'); 
  	
}
else 
{
	include('Loginpage.php');
	echo "<script>
alert('Wrong username and password....');
</script>";
}
 */ 
?>
