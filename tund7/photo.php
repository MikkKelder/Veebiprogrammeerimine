<?php
  $firstName = "Mikk";
  $lastName = "Kelder";
  
  //loeme kataloogi sisu
  $dirToRead = "../../pics/";
  $allFiles = scandir($dirToRead);
  //var_dump($allFiles);
  $picFiles = array_slice($allFiles, 2);
  //var_dump($picFiles);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
  <?php
    echo $firstName;
	echo " ";
	echo $lastName;
  ?>
  , õppetöö</title>
</head>
<body>
  <h1>
  <?php
    echo $firstName ." " .$lastName;
  ?>
  </h1>
  <p>Siin on minu <a href="http://www.tlu.ee">TLÜ</a> õppetöö raames valminud veebilehed. Need ei oma mingit sügavat sisu ja nende kopeerimine ei oma mõtet.</p>
  
  <?php
    //<img src="pilt.jpg" alt="pilt">
	
	for ($i = 0; $i < count($picFiles); $i++){
	  echo '<img src="' .$dirToRead .$picFiles[$i] .'" alt="pilt">';
	}
  ?>
  
</body>
</html>