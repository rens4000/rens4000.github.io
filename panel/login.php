<?php
session_start();
if (isset($_SESSION['username'])!="") {
 header("Location: panel/dashboard.php");
}
include("../includes/header-login.php");
include("../config/config.php");
 ?>
 <div class="wrapper">
   <center>
   <?php
   if(isset($_GET['action'])){

   //check the action
   switch ($_GET['action']) {
     case 'active':
       echo "<h2 class='bg-success'>Je account is geactiveerd! Je kunt nu inloggen.</h2>";
       break;
     case 'invldsession':
     echo "<div class='alert alert-danger alert-dismissable'>";
     echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
     echo "<strong>De sessie van onjuist!</strong>";
   echo "</div>";
       break;
     case 'wrng':
     echo "<div class='alert alert-danger alert-dismissable'>";
     echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
     echo "<strong>Onjuiste gebruikersnaam/wachtwoord</strong>";
   echo "</div>";
       break;
   }

 }
    ?>
  </center>
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Inloggen</h2>
      <hr>
      <input type="text" class="form-control" name="username" placeholder="Email adres" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required=""/>
      <hr>
      <a href="wachtwoordvergeten">Wachtwoord vergeten</a>
      <button class="btn btn-lg btn-primary btn-block" name="submit1" type="submit">Login</button>
    </form>
  </div>

  <?php

  if(isset($_POST['submit1'])) {
    $conn = mysqli_connect($mysql_host, $mysql_uname, $mysql_pass, $mysql_db);
    if($conn) {
      echo "CONNECTED!";
    }
 $uname = strip_tags($_POST['username']);
 $upass = strip_tags($_POST['password']);
 $upass = md5($upass);
    $result = mysqli_query($conn, "SELECT * FROM users where `username` = '$uname' AND `password` = '$upass'");
    $rows = mysqli_num_rows($result);
    if($rows== 1) {
      header("Location: /panel/dashboard.php");
      $_SESSION['username'] = $uname;
    } else {
      header("Location: /login.php?action=wrng");
    }
  }
   ?>
