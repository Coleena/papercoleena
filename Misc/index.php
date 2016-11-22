<!DOCTYPE html>
<html>
<head>

<title>List of Japanese Lyrics Translations</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once realpath(__DIR__.'/..').'/config.php' ?>
<link rel="stylesheet" type="text/css" href="./sorterstyle.css">
<script type="text/javascript" src="./jquery.tablesorter.js"></script> 

<script type="text/javascript">
$(document).ready(function() { 
	$(".tablesorter").tablesorter({ 
		sortList: [[4,1]]
    }); 
}); 
</script>

</head>

<body>

<?php include("header.php"); ?>

<div class="content">

<table class="tablesorter" id="nicodoutable"> 
<thead> 
<tr> 
    <th>English Title</th> 
    <th>Romaji Title</th> 
    <th>Japanese Title</th> 
    <th>Artist</th> 
    <th>Release Date</th>
</tr> 
</thead> 
<tbody> 
<?php 
// Store all columns as arrays from misclyriclist table
$info = $link->query("select * from misclyriclist order by url ASC")->fetch_all(MYSQLI_ASSOC);
$englishList = $romajiList = $japaneseList = $urlList = $dateList = $artistList = array();
for($rowNum = 0; $rowNum < count($info); $rowNum++){
	$englishList[] = $info[$rowNum]['englishTitle'];
	$romajiList[] = $info[$rowNum]['romajiTitle'];
	$japaneseList[] = $info[$rowNum]['japaneseTitle'];
	$artistList[] = $info[$rowNum]['artistName'];
	$urlList[] = $info[$rowNum]['url'];
	$dateList[] = $info[$rowNum]['releaseDate'];
}

for($i = 0; $i < sizeof($englishList); $i++){
	echo "<tr>";
	if(file_exists("./Text/" . $urlList[$i] . "_e.html")){
		echo "\t<td><a href='./" . $urlList[$i] . "'>" . $englishList[$i] . "</a></td>\n";
		echo "\t<td><a href='./" . $urlList[$i] . "'>" . $romajiList[$i] . "</a></td>\n";
		echo "\t<td><a href='./" . $urlList[$i] . "'>" . $japaneseList[$i] . "</a></td>\n";
	}
	else{
		echo "\t<td>" . $englishList[$i] . "</td>";
		echo "\t<td>" . $romajiList[$i] . "</td>";
		echo "\t<td>" . $japaneseList[$i] . "</td>";
	}
	echo "\t<td>" . $artistList[$i] . "</td>";
	echo "\t<td>" . $dateList[$i] . "</td>";
	echo "</tr>";
}

?>

</tbody> 
</table> 

</div>

<?php include("../socialmedia.html"); ?>

</body>

</html>