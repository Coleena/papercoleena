<!DOCTYPE html>
<html lang="en" class="momoclo">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php // Display error message if no page exists
	require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
	$url = $_GET['page'];

	if(!file_exists($_SERVER['DOCUMENT_ROOT'] . "momoclo/info/{$url}.html")){
		include("./../error.php");
		exit;
	}

	$file = fopen( "{$url}.html", "r" );
	if(!$file){
		include("./../error.php");
		exit;
	}
	$lineOne = fgets($file);
?>

<title><?php // First line of file is page title

echo "{$lineOne} - Coleena's Translations" ?></title>

</head>

<body>

<?php include("header.php"); 
include ("{$_SERVER['DOCUMENT_ROOT']}/momoclo/tablist.php") ?>

<div class="content">
<h1><?php echo $lineOne ?></h1>



<?php
// Print rest of file line by line
while(!feof($file)){
	echo fgets($file);
}

fclose($file);
?>

</div>


</body>


</html>