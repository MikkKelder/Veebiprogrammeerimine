<?php
  require("functions.php");
  //kui pole sisse loginud
  if(!isset($_SESSION["userId"])){
	  header("Location: index_2.php");
	  exit();
  }

  //väljalogimine
  if(isset($_GET["logout"])){
	session_destroy();
	header("Location: index_2.php");
	exit();
  }

  $userslist = listusers();
  $pageTitle ="Kasutajate nimekiri";
  require("header.php")

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title>
	  <?php
	    echo $_SESSION["firstName"];
		echo " ";
		echo $_SESSION["lastName"];
	  ?>
	, õppetöö</title>
	<style>
	  <?php
        echo "body{background-color: " .$_SESSION["bgColor"] ."; \n";
		echo "color: " .$_SESSION["txtColor"] ."} \n";
	  ?>
	</style>
  </head>
  <body>
    <h1>
	  <?php
	    echo $_SESSION["firstName"] ." " .$_SESSION["lastName"];
	  ?>
	</h1>
	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
	<hr>
	<ul>
	  <li><a href="?logout=1">Logi välja</a>!</li>
	  <li><a href="main.php">Tagasi pealehele</a></li>
	</ul>
	<hr>
	<?php echo $userslist; ?>

  </body>
</html>
