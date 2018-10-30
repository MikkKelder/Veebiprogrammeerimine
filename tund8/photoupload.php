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

//piltide üleslaadimise osa
  $target_dir = "../vp_photouploads/";
  $uploadOk = 1;
  // Check if image file is a actual image or fake image
  if(isset($_POST["submitImage"])) {
    if(!empty($_FILES["fileToUpload"]["name"])){

      $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
      $timestamp = microtime(1) * 10000;
      $target_file = $target_dir . "vp_" .$timestamp ."." .$imageFileType;
      //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     if($check !== false) {
         echo "Fail on - " . $check["mime"] . "pilt.";
     } else {
         echo "Fail ei ole pilt.";
         $uploadOk = 0;
     }

     if (file_exists($target_file)) {
          echo "    Vabandage selline pilt on juba olemas.";
          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 2500000) {
          echo "Vabandage, teie pilt on liiga suur.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "Vabandage ainult jpg, png, jpeg ja gif failid on lubatud.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Vabandage, teie faili ei laeta üles.";
      // if everything is ok, try to upload file
    } else {
        //loome vastavalt failitüübile pildiobjekti
        if($imageFileType == "jpg" or $imageFileType == "jpeg"){
          $myTempImage = imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);
        }
        if($imageFileType == "png"){
          $myTempImage = imagecreatefrompng($_FILES["fileToUpload"]["tmp_name"]);
        }
        if($imageFileType == "gif"){
          $myTempImage = imagecreatefromgif($_FILES["fileToUpload"]["tmp_name"]);
        }
      $imageWidth = imagesx($myTempImage);
      $imageHeight = imagesy($myTempImage);
      //arvutan suuruse arvu
      if($imageWidth > $imageHeight) {
        $sizeRatio = $imageWidth / 600;

      }
      else {
        $sizeRatio = $imageHeight / 400;
      }

      $newWidth = $imageWidth / $sizeRatio;
      $newHeight = $imageHeight / $sizeRatio;

      $myImage = resizeImage($myTempImage, $imageWidth, $imageHeight, $newWidth, $newHeight);

        //lähtudes failitüübist kirjutan pildifaili
        if($imageFileType == "jpg" or $imageFileType == "jpeg"){
          if(imagejpeg($myImage, $target_file, 95)){
            echo "Fail ". basename( $_FILES["fileToUpload"]["name"]). " on edukalt üles laetud.";
          }
          else {
              echo "Vabandage faili üleslaadimisel tekkis viga!.";
          }
        }
        if($imageFileType == "png"){
          if(imagepng($myImage, $target_file, 6)){
            echo "Fail ". basename( $_FILES["fileToUpload"]["name"]). " on edukalt üles laetud.";
          }
          else {
              echo "Vabandage faili üleslaadimisel tekkis viga!.";
          }
        }
        if($imageFileType == "gif"){
          if(imagegif($myImage, $target_file)){
            echo "Fail ". basename( $_FILES["fileToUpload"]["name"]). " on edukalt üles laetud.";
          }
          else {
              echo "Vabandage faili üleslaadimisel tekkis viga!.";
          }
        }

        imagedestroy($myTempImage);
        imagedestroy($myImage);
  /*        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "Fail ". basename( $_FILES["fileToUpload"]["name"]). " on edukalt üles laetud.";
          } else {
              echo "Vabandage faili üleslaadimisel tekkis viga!.";
          } */
      }
    }
  }
function resizeImage($image, $ow, $oh, $w, $h){
    $newImage = imagecreatetruecolor($w, $h);
    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $w, $h, $ow, $oh);
    	return $newImage;
    }
//lehe päise laadimine
  $pageTitle ="Fotode üleslaadimine";
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
	</ul>
  <hr>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <label>Vali üleslaetav pilt: </label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <input type="submit" value="Lae pilt üles" name="submitImage">
  </form>
  </body>
</html>
