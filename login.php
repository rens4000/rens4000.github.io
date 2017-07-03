<?php

    session_start();



    if(isset($_SESSION['user_id'])) {

        header("Location: /");

    }



    require 'auth/database.php';



    if(!empty($_POST['pass']) && !empty($_POST['name'])) {

       

    }

?>

<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">

		<title>Login | Plugin Development Contest</title>

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

            <li class="current"><a href="#">Log in</a></li>

            <li><a href="register.php">Register</a></li>

          </ul>

       </nav>

      </div>

    </header>



    <section id="showcase">

      <div class="container">

        <h1>Login</h1>

      </div>

    </section>



    <?php if(!empty($message)): ?>

        <p><?= $message ?></p>

    <?php endif; ?>



    <form action="login.php" method="POST">

        <input type="text" placeholder="Username" name="name">

        <input type="password" placeholder="Password" name="pass">

        <button type="submit">Login</button>

    </form>



    <footer>

      <p>PluginDevelopmentContest, Copyright &copy; 2017</p>

    </footer>

	</body>

</html>

