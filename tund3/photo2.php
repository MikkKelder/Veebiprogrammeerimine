<?php 
    //echo "See on minu esimene php!"; //tark teade
    $firstName = "Mikk";
    $lastName = "Kelder";
    
    //loeme kataloogi sisu
    $dirToRead = "../../pics/";
    $allFiles = scandir($dirToRead);
    //var_dump($allFiles)
    $picFiles = array_slice($allFiles, 2);
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
        <p>Siin on minu <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames valminud leht ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
    <?php
        //<img scr."pilt.jpg" alt="pilt">
        
        for ($i = 0; $i < count($picFiles); $i++) 
        {
        echo '<img src="' .$dirToRead .$picFiles[$i] .'"alt="pilt">';
            }
    ?>
</body>
</html>