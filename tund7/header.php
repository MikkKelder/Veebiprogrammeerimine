
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title><?php echo $pageTitle; ?></title>
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
	</div>

    <h1><?php echo $pageTitle; ?></h1>
