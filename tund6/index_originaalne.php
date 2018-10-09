<?php
  //echo "See on minu esimene php!"; //rumal teade
  $firstName = "Mikk";
  $lastName = "Kelder";
  //$dateToday = date("d.m.Y");
  $dateToday = date("d");
  $monthToday = date("m");
  $yearToday = date("Y");
  $weekdayToday = date("N");
  $weekdayNamesET = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
   $monthNamesET = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  
  //echo $weekdayNamesET;
  //var_dump($weekdayNamesET);
  //echo $weekdayNamesET[1];
  //echo $weekdayToday;
  $hourNow = date("G");
  $partOfDay = "";
  if ($hourNow < 8){
	  $partOfDay = "varajane hommik";
  }
  if ($hourNow >= 8 and $hourNow < 16){
	  $partOfDay = "koolipäev";
  }
  if ($hourNow > 16){
	  $partOfDay = "loodetavasti vaba aeg";
  }
  
  //juhusliku pildi valimine
  $picURL = "http://www.cs.tlu.ee/~rinde/media/fotod/TLU_600x400/tlu_";
  $picEXT = ".jpg";
  $picNUM = mt_rand(2,43);
  //echo $picNUM;
  $picFILE = $picURL .$picNUM .$picEXT;
  
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
  
  <p>Teised lehed: <a href="photo.php">photo.php</a>, <a href="page.php">page.php</a>.</p>
  
  <?php
    //echo "<p>Tänane kuupäev on: " .$dateToday .".</p> \n";
	//echo "<p>Täna on " .$weekdayNamesET[$weekdayToday - 1] .", " .$dateToday .".</p> \n";
	echo "<p>Täna on " .$weekdayNamesET[$weekdayToday - 1] .", " .$dateToday .". " .$monthNamesET[$monthToday - 1] ." " .$yearToday .".</p> \n";
	  
	echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .", käes oli " .$partOfDay .".</p> \n";
  ?>
  <img src="<?php echo $picFILE; ?>" alt="TLÜ Terra õppehoone">
  <p>Minu sõber teeb ka <a href="../../../~jaagala">veebi</a></p>
</body>
</html>