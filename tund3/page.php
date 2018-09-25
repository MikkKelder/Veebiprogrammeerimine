<?php 
    //echo "See on minu esimene php!"; //tark teade
    $firstName = "Tundmatu";
    $lastName = "Kodanik";
    $monthNow = date("m");
    $monthNamesET = ["Jaanuar", "Veebruar", "Märts", "Aprill", "Märts", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];
    //püüan POST andmed kinni
    //var_dump($_POST);
    if (isset($_POST["firstname"])){
        $firstName = $_POST["firstname"];
    }
    if (isset($_POST["lastname"])){
        $lastName = $_POST["lastname"];
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
        <p>Siin on minu <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames valminud leht ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
        <hr>
    <form method="POST">
    <label>Eesnimi:</label>
    <input type="text" name="firstname">
    <label>Perekonnanimi:</label>
    <input type="text" name="lastname">
    <label>Sünniaasta: </label>
    <input type="number" min="1914" max="2000" value="1999" name="birthyear">
    <label>Sünnikuu: </label>
        <?php
            echo '<select name="birthMonth">' ."\n";
            for ($i = 1; $i < 13; $i ++){
                echo " selected";
            }
        echo ">" .$monthNamesET[$i - 1] ."</option> \n";
    ?>
    <input type="submit" name="SubmitUserData" value="Saada andmed">
    </form>
        <hr>
    <?php 
    if (isset($_POST["birthyear"])){
        echo "<p>Olete elanud järgnevatel aastate: </p> \n";
        echo "<ul> \n";
        for ($i = $_POST["birthyear"]; $i  <= date("Y"); $i++){
            echo "<li>" .$i ."</li> \n";
        }
            
        echo "</ul> \n";
    }    
    ?>
</body>
</html>