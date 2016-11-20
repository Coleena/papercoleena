<!DOCTYPE html>
<html>
<head>

<title>QuickASS Tag Insertion</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./quickass.css">
<?php require_once realpath(__DIR__.'/..').'/config.php' ?>
<link href='http://fonts.googleapis.com/css?family=Oxygen+Mono' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="./quickass.js"></script>

</head>

<body>

<?php include("header.php"); ?>

<div class="content">

<p>
Insert at beginning:<br/>
<input tabindex="1" type="text" class="inputfield" id="beginningtags">
</p>
<form id="alttags">
<a href="#" tabindex="-1"><div id="alttagplus"></div></a><a href="#" tabindex="-1"><div id="alttagminus"></div></a>
Alternating tags:<br/>
<span><label for="alttag1">1.</label><input type="text" class="inputfield alttag" id="alttag1" tabindex="2"></span><span><label for="alttag2">2.</label><input type="text" class="inputfield alttag" id="alttag1" tabindex="3"></span></form>
<p>
Insert at end:<br/>
<input type="text" class="inputfield" id="endingtags" tabindex="4">
</p>
<p>
Insert tags every <input type="text" class="inputfield" id="everynchars" value="1" tabindex="5"> characters
</p>
<p>
Count whitespace <input type="checkbox" onchange="quickass();" id="countwhitespace" tabindex="6">
</p>

<form id="inputtextform">
<label for="inputtext">Input Text:</label>
<textarea class="inputfield" id="inputtext" tabindex="7"></textarea>
</form>

<form id="outputtextform">
<div>Text Markup (experimental) <input type="checkbox" onchange="quickass();" id="enablemarkup" checked></div>
<label for="outputtext">Output Text:</label>
<code id="outputtext" readonly></code>
</form>


</div>

<?php include("../socialmedia.html"); ?>

</body>

</html>