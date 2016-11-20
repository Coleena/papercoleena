<!DOCTYPE html>
<html>
<head>

<title>7th Dragon III Text Extractor/Packer</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./quickass.css">
<?php require_once realpath(__DIR__.'/..').'/config.php' ?>
<link href='http://fonts.googleapis.com/css?family=Oxygen+Mono' rel='stylesheet' type='text/css'>

</head>

<body>

<?php include("header.php"); ?>

<div class="content">

<p>Still VERY experimental, meaning no error checking, and it only supports the game's DAT files. I haven't yet figured out how the BIN files work.</p>
<p><a href="./textextract.exe">Text Extractor</a> - USAGE: textextract.exe IN_FILE.dat OUT_FILE.dat</p>
<p><a href="./datbuilder.exe">DAT Repacker</a> - USAGE: datbuilder.exe EDITED_FILE.dat ORIGINAL_FILE OUT_FILE.dat</p>
<p><br/>It works though, hey!</p>
<p><a href="./7dra_j_1.png"><img src="7dra_j_1.png"></a> <a href="./7dra_e_1.png"><img src="7dra_e_1.png"></a></p>

</div>

<?php include("../socialmedia.html"); ?>

</body>

</html>