<?php
require("functions.php");
//lisame klassi
require("classes/Photoupload.class.php");
//require("classes/Test.class.php");
//$littleTest = new Test(3);
//echo $littleTest->secretNumber;
//echo "Avalik number on: " .$littleTest->publicNumber;
//$littleTest->showValues();
//unset($littleTest);
//$littleTest->showValues();

//kui pole sisse loginud

//kui pole sisselogitud
if(!isset($_SESSION["userId"])){
    header("Location: index_2.php");
    exit();
}

//väljalogimine
if(isset($_GET["logout"])){
    session_destroy();
    header("Location:  index_2.php");
    exit();
}

//pildi üleslaadimise osa
$target_dir = "../vp_photouploads/";
//var_dump($_FILES);
$target_file = "";
$uploadOk = 1;
$imageFileType = "";

//kas vajutati submit nuppu
if(isset($_POST["submitPic"])) {
    //var_dump($_POST);
    //var_dump($_FILES);
    //kas failinimi ka olemas on
    if(!empty($_FILES["fileToUpload"]["name"])){

        //määrame faili nime
        //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
        //echo basename($_FILES["fileToUpload"]["name"]);
        //ajatempel
        $timeStamp = microtime(1) * 10000;
        //echo $timeStamp;
        //$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]) ."_" .$timeStamp ."." .$imageFileType;
        $target_file_name = "vp_" .$timeStamp ."." .$imageFileType;
        $target_file = $target_dir .$target_file_name;



        // kas on pilt, kontrollin pildi suuruse küsimise kaudu
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "Fail on pilt - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Fail ei ole pilt.";
            $uploadOk = 0;
        }

        // kas on juba olemas
        if (file_exists($target_file)) {
            echo "Kahjuks on selline pilt juba olemas!";
            $uploadOk = 0;
        }
        // faili suurus
        if ($_FILES["fileToUpload"]["size"] > 2500000) {
            echo "Kahjuks on fail liiga suur!";
            $uploadOk = 0;
        }

        // kindlad failitüübid
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Kahjuks on lubatud vaid JPG, JPEG, PNG ja GIF failid!";
            $uploadOk = 0;
        }

        // kui on tekkinud viga
        if ($uploadOk == 0) {
            echo "Vabandame, faili ei laetud üles!";
            // kui kõik korras, laeme üles
        } else {

            $myPhoto = new Photoupload($_FILES["fileToUpload"]["tmp_name"], $imageFileType);
            $myPhoto->changePhotoSize(600, 400);
            $myPhoto->addWatermark();
            $myPhoto->addText();
            $savesuccess = $myPhoto->saveFile($target_file);
            //kui salvestus õnnestus, lisame andmebaasi
            if($savesuccess == 1){
                addPhotoData($target_file_name, $_POST["altText"], $_POST["privacy"]);
            }
            unset($myPhoto);


            /* 				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                echo "Fail ". basename( $_FILES["fileToUpload"]["name"]). " on üles laetud!";
                            } else {
                                echo "Vabandame, faili üleslaadimine ebaõnnestus!";
                            } */
        }
    }//ega failinimi tühi pole
}//kas on submit nuppu vajutatud

function resizeImage($image, $ow, $oh, $w, $h){
    $newImage = imagecreatetruecolor($w, $h);
    imagecopyresampled($newImage, $image, 0, 0 , 0, 0, $w, $h, $ow, $oh);
    return $newImage;
}

//lehe päise laadimise osa
$pageTitle = "Fotode üleslaadimine";
require("header.php");
?>

<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
<hr>
<p><a href="?logout=1">Logi välja!</a></p>
<h2>Foto üleslaadimine</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <label>Vali üleslaetav pilt: </label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <label>Alt tekst: </label><input type="text" name="altText">
    <br>
    <label>Privaatsus</label>
    <br>
    <input type="radio" name="privacy" value="1"><label>Avalik</label>&nbsp;
    <input type="radio" name="privacy" value="2"><label>Sisseloginud kasutajatele</label>&nbsp;
    <input type="radio" name="privacy" value="3" checked><label>Isiklik</label>
    <br>
    <input type="submit" value="Lae pilt üles" name="submitPic">
</form>
</body>
</html>