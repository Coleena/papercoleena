<!DOCTYPE html>
<html class="momoclo">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php // Display error message if no page exists
	require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$url = $_GET['page'];
	if(file_exists("./" . $url)){
		include("./../error.php");
		exit;
	}
?>

<title><?php // First line of file is page title
$file = fopen( $url.".html", "r" );
$lineOne = fgets($file);
echo $lineOne . " - Coleena's Translations" ?></title>

</head>

<body>

<?php include("header.php"); ?>

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