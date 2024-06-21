<?php
include 'C:\xampp\htdocs\E-LMS\EMP\cont.php';
$img = 'layout/image/' ;
$css  = 'layout/Css/';
$func = 'include/fun/';
$tpl = 'include/templt/';


include $func . 'function.php';
if (!isset($nonavsid)) {
include $tpl .'navbar.php';   // code...

};
include $tpl .'header.php';
?>
