<?php
session_start();

  include 'init1.php';
 ?>
<html>
<head>
    <link rel="stylesheet" href="layout/css/FARMS_CSS.css">

</head>
<style type="text/css">
  .pos6 {
  position: absolute;
  top: 25%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-weight: bold;
  font-size: 50px;
  color: #126079;
}
.img11 {
  width: 1585px;
  height: 900px;
  object-fit: fill;
  z-index: -1;
}
.pos66 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-weight: bold;
  font-size: 60px;
  color:#C8A11E;
}
</style>
<body background-color: lightblue;>



<div class="w3-container w3-teal">
    <h1>Welcome! you have Logged in</h1>
  </div>
  <br>
<div name="div2" class="myDiv2" >
  <div style="margin-left: 1%;margin-right: 1%;">
  <img class="img11" src="layout\image\3.jpg">
  <div class="pos66" style="margin-left: 6%"><mark>Welcome to Shri Narkesri Prakashan Ltd leave application.</mark>
</div>
</div>
</div>

<!-- FOOTER -->

<?php
include $tpl .'footer.php';
?>
