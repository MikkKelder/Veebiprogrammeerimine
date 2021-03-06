<?php
  require("functions.php");
//kui pole sisse loginud
if(!isset($_SESSION["userId"])) {
    header("Location: index_2.php");
    exit();
}
//välja logimine
if(isset($_GET["logout"])){
    session_destroy();
    header("Location: index_2.php");
    exit();
}
//lehe päise laadimine

  $pageTitle ="Pealeht";
  require("header.php")

?>

	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
	<hr>
    <p>Olete sisse loginud nimega:
    <?php
        echo $_SESSION["firstName"] ." " .$_SESSION["lastName"];
        ?>.
    </p>
	<ul>
	  <li><a href="?logout=1">Logi välja!</a></li>
          <li>Minu <a href="userprofile.php">profiil</a>.</li>
          <li>Süsteemi <a href="users.php">kasutajad</a>.</li>
      <li><a href="validatemsg.php">Valideeri anonüümseid sõnumeid</a></li>
      <li>Vaata valideeritud <a href="validatedmessages.php">sõnumeid</a> validdeerijate kaupa</li>
      <li>Piltide <a href="photoupload.php">üleslaadimine</a>.</li>
        <li>Avalike fotode<a href="pubgallery.php">Galerii</a>.</li>
        <li>Privaatsete fotode<a href="privategallery.php">Galerii</a>.</li>
	</ul>

  </body>
</html>
