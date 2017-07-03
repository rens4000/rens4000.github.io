<?php 
require("auth/database.php"); 
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register | Plugin Development Contest</title>
      <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1>Plugin<span id="coding">Development</span>Contest</h1>
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="live.php">Live contest</a></li>
            <li><a href="#">Log in</a></li>
            <li class="current"><a href="register.php">Register</a></li>
          </ul>
       </nav>
      </div>
    </header>

    <section id="showcase">
      <div class="container">
        <h1>Register</h1>
      </div>
    </section>
    <section id="login">
    <center>
    <div class="container">
    <h1>Register your PDC account</h1>
        <form action="" method="POST">
        <input type="text" placeholder="Username" name="name" required><br>
        <input type="password" placeholder="Password" name="pass" required><br>
        <input type="email" placeholder="Email" name="email" required><br>
        <input type="submit" name="register" value="Register"></input>
        <?php
      if(isset($_POST['register'])) {
        echo "TEEEST";
        $pwd = md5($_POST['pass']);
        $conn = mysqli_connect($server, $username, $password, $database);
        $uname = $_POST['name'];
        $email = $_POST['email'];
        $pass = $pwd;
        $hash = md5( rand(0,1000) );
        echo $pwd;
        echo $uname;
        echo $email;
        echo $hash;
        mysqli_query($conn, "INSERT INTO `users`(`username`, `email`, `password`) VALUES (
          '$uname', '$email', '$pass')");
      }
       ?>
    </form>
    </div>
    </center>
    </section>
    <footer>
      <p>PluginDevelopmentContest, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>
