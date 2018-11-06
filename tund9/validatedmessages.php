<?php
  require("functions.php");
  //kui pole sisseloginud, siis logimise lehele
  if(!isset($_SESSION["userId"])){
	header("Location: index_2.php");
	exit();
  }

  //logime välja
  if(isset($_GET["logout"])){
	session_destroy();
    header("Location: index_2.php");
	exit();
  }

  $messages = readallvalidatedmessagesbyuser();
  $pageTitle ="Valdideeritud sõnumid";
  require("header.php")

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Anonüümsed sõnumid</title>
</head>
<body>
  <h1>Sõnumid</h1>
  <p>Siin on minu <a href="http://www.tlu.ee">TLÜ</a> õppetöö raames valminud veebilehed. Need ei oma mingit sügavat sisu ja nende kopeerimine ei oma mõtet.</p>
  <hr>
  <ul>

	<li><a href="main.php">Tagasi</a> pealehele!</li>
  </ul>
  <hr>
  <h2>Valideerimata sõnumid</h2>
  <?php
    echo $messages;

  ?>
</body>
</html>
