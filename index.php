<?php 
    //echo "See on minu esimene php!"; //tark teade
    $firstName = "Mikk";
    $lastName = "Kelder";
    $dateToday = date("d.m.Y");
    $hourNow = date("G");
    $partOfDay = "";
    if ($hourNow < 8) {
        $partOfDay = "varajane hommik.";
    }
    if ($hourNow >= 8 and $hourNow < 16) {
        $partOfDay = "koolipäev.";
    }
    if ($hourNow > 16) {
        $partOfDay = "loodetavasti vaba aeg.";
    }
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
        , Õppetöö</title>
    </head>
<body>
    <h1><?php
        echo $firstName . " " . $lastName;
        ?>
    </h1>
    <?php
    echo "<p> Tänane kuupäev on:  " . $dateToday . "</p> \n";
    echo "<p> Lehe avamise hetkel oli kell " .date("H:i:s") ."käes oli " .$partOfDay . "</p>\n";
    ?>
    <p>Siin on minu <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames valminud leht ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
    <p>Kodune ülesanne on edukalt sooritatud1</p>
    <img src="https://www.pets4homes.co.uk/images/breeds/56/large/9b8f8158056fc5420a03372c9772678e.jpeg" alt="kutsu">
    <p>Minu sõber teeb ka <a href="../../~andrmal" target="_blank">veebi</a></p>
    </body>
</html>