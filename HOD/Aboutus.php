
 <?php
 session_start();
  include 'init1.php';
 ?>
<style type="text/css">

</style>

<!-- Main Content Page -->
<div class="w3-container w3-black ">
  <h1 style="text-align: center;">About Us</h1>
  <p style="text-align: center;">Group - 1</p>
  <p style="text-align: center;"> This project is made by "Group 1" under semister course project for subject Software Engineering & Project Management </p>
</div>

<h2 class="w3-white" style="text-align:center">Our Team</h2>
<div class="row">
  <img src="layout\image\vit3.png" class="viticonpos" width="300" height="300">
  <div class="cont1">
    <div class="column">
    <div class="card" style="text-align:center">
      <div class="container w3-white" >
        <div>
        <h2 class="title">Abdulrahman Ahmed</h2>
        <p class="title">Role - php & Database work</p>
        <p>Roll Number: 1</p>
        <p>abdulrahman.ahmed21@vit.edu</p>
        <p><a href="mailto:abdulrahman.ahmed21@vit.edu"><button class="button">Contact</button></a></p>
      </div>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card" style="text-align:center">
      <div class="container w3-white">
        <div style="margin-left: 20% ;">
        <h2 class="title" >Rahul Baviskar</h2>
        <p class="title">Role - php & Database work</p>
        <p>Roll Number: 7</p>
        <p>rahul.baviskar21@vit.edu</p>
        <p><a href="mailto:rahul.baviskar21@vit.edu"><button class="button">Contact</button></a></p>
      </div>
    </div>
    </div>
  </div>
  <div class="column">
    <div class="card" style="text-align:center">
       <div class="container w3-white">
        <div>
        <h2 class="title">Vedang Bhange</h2>
        <p class="title">Role - Database, Documentations</p>
        <p>Roll Number: 8</p>
        <p>vedang.bhange21@vit.edu</p>
        <p><a href="mailto:vedang.bhange21@vit.edu"><button class="button">Contact</button></a></p>
      </div>
    </div>
    </div>
  </div>
  <div class="column">
    <div class="card" style="text-align:center">
      <div class="container w3-white">
        <div style="margin-left: 20% ;">
        <h2 class="title" >Umesh Gaikwad</h2>
        <p class="title">Role - UI Design, php</p>
        <p>Roll Number: 17</p>
        <p>umesh.gaikwad21@vit.edu</p>
        <p><a href="mailto:umesh.gaikwad21@vit.edu"><button class="button">Contact</button></a></p>
      </div>
      </div>
    </div>
  </div>

      <div class="container w3-white" style="text-align:center">
        <div style="margin-left: 10%">
        <h2 class="title">Akash Hedau</h2>
        <p class="title">Role - UI Design, php</p>
        <p>Roll Number: 23</p>
        <p>akash.hedau21@vit.edu</p>
        <div style="margin-left: 30% ;">
          </div>
        <p><a href="mailto:akashhedau65@gmail.com"><button class="button">Contact</button></a></p>
        </div>
      </div>

    </div>
  </div>
</div>
</div>

<style type="text/css">
   .viticonpos{
    position: absolute;
    top: 40%;
    left: 52%;
  }

</style>

<!-- FOOTER -->

<div>
<?php
include $tpl .'footer.php';
?>
</div>
