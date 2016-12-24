<!DOCTYPE html>
<html lang="en" class="momoclo">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php // Display error message if no page exists
	require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
	$url = $_GET['page'];
	
	$currDir = basename(getcwd());
	if(!file_exists($_SERVER['DOCUMENT_ROOT'] . "momoclo/blog/{$currDir}/{$url}.html")){
		include("{$_SERVER['DOCUMENT_ROOT']}/momoclo/error.php");
		exit;
	}

	$file = fopen( "{$url}.html", "r" );
	if(!$file){
		include("{$_SERVER['DOCUMENT_ROOT']}/momoclo/error.php");
		exit;
	}
	$lineOne = fgets($file); // First line of file is page title
	$lineTwo = fgets($file); // Second line of file is blog post date
?>

<title><?php
echo "{$lineOne} - Coleena's Translations" ?></title>

</head>

<body>

<?php include("header.php"); 
include ("{$_SERVER['DOCUMENT_ROOT']}/momoclo/tablist.php") ?>

<div class="content ameba">
<img class="bloghead" src="./img/bloghead.png" alt=""> <!-- Grab blog image from img folder in respective member subfolder -->
<h1><a href="."><?php echo $lineOne ?></a></h1>
<div class="timecontainer"><time><?php echo $lineTwo ?></time></div>

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