<?php
session_start();
include "init1.php";
$hrid =$_SESSION['ID'];
  $do = isset($_GET['do']) ? $_GET['do'] : 'showleave' ;

if ($do == 'showleave') {
    ?>
    <div class="">
      <form  action="?do=export" method="post">
        <select class="form-control" name="export_file">
          <option value="xlsx">XLSX</option>
          <option value="xls">XLS</option>
          <option value="csv">CSV</option>
        </select>
    <button type="submit" name="export_excel" >Export </button>
      </form>
</div>
  <?php
/******************************************************************************/
}elseif ($do == 'export') {
  if(isset($_POST['export_excel'])){


    $stmt = $con->prepare("SELECT * FROM transactions");
    $stmt->execute();
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
//$file_export =$_POST['export_file'];
//$swl =" SELECT * FROM transactions ORDER BY trans_id DESC" ;
//$resalt = mysqli_query($con,$swl);
if($stmt->rowCount() > 0){

//if(mysqli_num_rows($resalt) > 0){
  $output .='
  <table class="table" bordered="1">
  <tr>
  <th>trans_id </th>
  <th>	Emp_id </th>
  <th>Dept_id </th>
  <th>Leave_type </th>
  <th>Leave_start_date </th>
  <th>Leave_end_date </th>
  <th>comment </th>
  ';
  while ($row = mysqli_fetch_array($resalt)) {
      $output .='
      <tr>
      <td>'.$row["trans_id"].'</td>
      <td>'.$row["Emp_id"].'</td>
      <td>'.$row["Dept_id"].'</td>
      <td>'.$row["Leave_type"].'</td>
      <td>'.$row["Leave_start_date"].'</td>
      <td>'.$row["Leave_end_date"].'</td>
      <td>'.$row["comment"].'</td>
      </tr>
  ';
  }
    $output .='</table>';
    header("Content-Type: application/xlsX");
    header("Content-Disposition: attachment; filename:download.xlsx");
    echo   $output ;
}

  }
}
/***************************************************************************/
?>

<body align="center">
<div style="background-color:#FAFAD2" >

</div>
</body>
