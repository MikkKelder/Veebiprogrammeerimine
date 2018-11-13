<?php
class Photoupload
{
    private $myTempImage;
    private $imageFileType;
    private $tempName;
    private $myImage;
    public function __construct($file, $type)
    {
    $this->tempName = $file;
    $this->imageFileType = $type;
    $this->imageFromFile();
    }
    public function __destruct()
    {
        imagedestroy($this->myTempImage);
        imagedestroy($this->myImage);
    }
    private function imageFromFile(){
        if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg"){
            $this->myTempImage = imagecreatefromjpeg($this->tempName);
        }
        if($this->imageFileType == "png"){
            $this->myTempImage = imagecreatefrompng($this->tempName);
        }
        if($this->imageFileType == "gif"){
            $this->myTempImage = imagecreatefromgif($this->tempName);
        }
    }
    public function changePhotoSize($width, $height){

        $imageWidth = imagesx($this->myTempImage);
        $imageHeight = imagesy($this->myTempImage);
        //arvutan suuruse arvu
        if($imageWidth > $imageHeight) {
            $sizeRatio = $imageWidth / $width;

        }
        else {
            $sizeRatio = $imageHeight / $height;
        }

        $newWidth = round($imageWidth / $sizeRatio);
        $newHeight = round($imageHeight / $sizeRatio);

        $this->myImage = $this->resizeImage($this->myTempImage, $imageWidth, $imageHeight, $newWidth, $newHeight);



        }
    private function resizeImage($image, $ow, $oh, $w, $h){
        $newImage = imagecreatetruecolor($w, $h);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $w, $h, $ow, $oh);
        return $newImage;
    }
    public function addWatermark()
{
    //lisan watermargi
    $waterMark = imagecreatefrompng("../vp_picfiles/vp_logo_w100_overlay.png");
    $waterMarkWidth = imagesx($waterMark);
    $waterMarkHeight = imagesy($waterMark);
    $waterMarkPosX = imagesx($this->myImage) - $waterMarkWidth - 10;
    $waterMarkPosY = imagesy($this->myImage) - $waterMarkHeight - 10;
    imagecopy($this->myImage, $waterMark, $waterMarkPosX, $waterMarkPosY, 0, 0, $waterMarkWidth, $waterMarkHeight);
}
    public function addText(){
    //lisame ka teksti
    $textToImage = "Veebiprogrammeerimine";
    $textColor = imagecolorallocatealpha($this->myImage, 255,255,255, 60);
    imagettftext($this->myImage, 20, 0, 10, 25, $textColor, "../vp_picfiles/Arial Bold.ttf", $textToImage);
}
    public function saveFile($target_file){
        $notice = "";
        //muudetud suurusega pilt kirjutatakse pildifailiks
        if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg"){
            if(imagejpeg($this->myImage, $target_file, 90)){
                $notice = 1;
            } else {
                $notice = 0;
            }
        }
        if($this->imageFileType == "png"){
            if(imagepng($this->myImage, $target_file, 6)){
                $notice = 1;
            } else {
                $notice = 0;
            }
        }
        if($this->imageFileType == "gif"){
            if(imagegif($this->myImage, $target_file)){
                $notice = 1;
            } else {
                $notice = 0;
            }
        }
        return $notice;
        }
}//class lõpetab
?>