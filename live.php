  <!DOCTYPE html>

<html>
<?php 
$name = "u735541585_root";
$host = "mysql.hostinger.nl";
$pass = "rens5050";
$db = "u735541585_data";

 ?>
	<head>

		<meta charset="utf-8">

		<title>LIVE | Plugin Development Contest</title>

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

						<li class="current"><a href="live.php">Live contest</a></li>

          </ul>

        </nav>

      </div>

    </header>



    <section id="showcase">

      <div class="container">

        <h1>Live Development contest</h1>

        <p>Theme: Magic</p>
        <!-- <p id="demo"></p> -->

      </div>

    </section>

    <section id="live">

      <div class="container">

        <center>

          <h1>LIVE CONTEST!</h1>

          <table class="rwd-table">

  <tr>

    <th>Participant</th>

    <th>Github-Repo</th>

    <th>Status</th>

    <th>Points</th>

  </tr>
  <?php 
  $conn = mysqli_connect($host, $name, $pass, $db);
  $query = mysqli_query($conn, "SELECT * FROM `participants`");
  while($row = mysqli_fetch_assoc($query)) {
   ?>
  <tr>

    <td><?php echo $row['name']; ?></td>

    <td><a href="<?php echo $row['github']; ?>"><?php echo $row['github']; ?></a></td>

    <td><?php echo $row['status']; ?></td>

    <td><?php echo $row['points']; ?></td>

  </tr>

  <?php 
}
?>

</table>



        </center>

      </div>

    </section>

      <footer>

      <p>PluginDevelopmentContest, Copyright &copy; 2017</p>

    </footer>

	</body>

</html>

