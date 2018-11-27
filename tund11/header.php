
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title>VP <?php echo $pageTitle; ?></title>
	<style>
	  <?php
        echo "body{background-color: " .$_SESSION["bgColor"] ."; \n";
		echo "color: " .$_SESSION["txtColor"] ."} \n";
	  ?>
	</style>
  </head>
  <body>
    <div>
	  <a href="main.php">
      <img src="../vp_picfiles/vp_logo_w100_overlay.png" alt="VP logo">
    </a>
      <img src="../vp_picfiles/vp_banner.png" alt="VP banner">

	</div>
      <h1><?php echo $pageTitle; ?></h1>
