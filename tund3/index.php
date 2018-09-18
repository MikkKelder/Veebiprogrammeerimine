<?php 
    //echo "See on minu esimene php!"; //tark teade
    $firstName = "Mikk";
    $lastName = "Kelder";
    $dateToday = date("d.m.Y");
    $hourNow = date("G");
    $weekdayToday = date("N");
    $weekdayNamesET = ["Esmaspäev", "Teisipäev", "Kolmapäev", "Neljapäev", "Reede", "Laupäev", "Pühapäev"];
    //var_dump($weekdayNamesET); viskab kõik var'id mis loetud on ette
    //echo $weekdayNamesET[1]; [] võtab loetust var'i
    //echo $weekdayToday;  sisestab tänase päeva.
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

    //juhusliku pildi valimine
    $picURL = "http://www.cs.tlu.ee/~rinde/media/fotod/TLU_600x400/tlu_"; //piltide asukoht 
    $picEXT = ".jpg"; // pildi lõputüüp mis valib
    $picNUM = mt_rand(2, 43); //valib juhusliku numbri vahemikus
    //echo $picNUM
    $picFILE = $picURL .$picNUM .$picEXT; // URL + pildi järjekord + failitüüp
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
    //echo "<p> Tänane kuupäev on:  " . $dateToday . "</p> \n";
    echo "<p> Täna on  " .$weekdayNamesET[$weekdayToday - 1] .", " .$dateToday .".</p> \n";
    echo "<p> Lehe avamise hetkel oli kell " .date("H:i:s") ." käes oli " .$partOfDay . "</p>\n";
    ?>
    <p>Siin on minu <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames valminud leht ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
    <p>Teised lehed: <a href="photo.php">photo.php</a>.</p>
        <p>Teised lehed: <a href="page.php">page.php</a>.</p>
    <p>Kodune ülesanne on edukalt sooritatud1</p>
    <img src="<?php echo $picFILE; ?>" alt="TLÜ">
    <p>Minu sõber teeb ka <a href="../../../~andrmal" target="_blank">veebi</a></p>
    </body>
</html>