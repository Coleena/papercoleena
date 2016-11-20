<!DOCTYPE html>
<html class="momoclo">
<head>

<title>Coleena's Momoiro Clover Z Lyrics Translations</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once realpath(__DIR__.'/..').'/config.php' ?>
<link rel="stylesheet" type="text/css" href="./sorterstyle.css">
<script type="text/javascript" src="./jquery.tablesorter.js"></script> 

<script type="text/javascript">
$(document).ready(function() { 
	$(".tablesorter").tablesorter({ 
		sortList: [[3,1]]
    }); 
}); 
</script>

</head>

<body>

<?php include("header.php"); ?>

<div class="content">

<table class="tablesorter" id="momoclotable"> 
<thead> 
<tr> 
    <th>English Title</th> 
    <th>Romaji Title</th> 
    <th>Japanese Title</th> 
    <th>Release Date</th>
</tr> 
</thead> 
<tbody> 
<?php 
$result = $link->query("select englishTitle from lyriclist order by id ASC");
$englishList = array();
while ($row = mysqli_fetch_array($result)){  
	$englishList[] = $row[0];
}
$result = $link->query("select romajiTitle from lyriclist order by id ASC");
$romajiList = array();
while ($row = mysqli_fetch_array($result)){  
	$romajiList[] = $row[0];
}
$result = $link->query("select japaneseTitle from lyriclist order by id ASC");
$japaneseList = array();
while ($row = mysqli_fetch_array($result)){  
	$japaneseList[] = $row[0];
}
$result = $link->query("select url from lyriclist order by id ASC");
$urlList = array();
while ($row = mysqli_fetch_array($result)){  
	$urlList[] = $row[0];
}
$result = $link->query("select releaseDate from lyriclist order by id ASC");
$dateList = array();
while ($row = mysqli_fetch_array($result)){  
	$dateList[] = $row[0];
}

for($i = 0; $i < sizeof($englishList); $i++){
	echo "<tr>";
	if(!file_exists("./Text/" . $urlList[$i] . "_e.html")){
		echo "\t<td>" . $englishList[$i] . "</td>";
		echo "\t<td>" . $romajiList[$i] . "</td>";
		echo "\t<td>" . $japaneseList[$i] . "</td>";
	}
	else{
		echo "\t<td><a href='./" . $urlList[$i] . "'>" . $englishList[$i] . "</a></td>";
		echo "\t<td><a href='./" . $urlList[$i] . "'>" . $romajiList[$i] . "</a></td>";
		echo "\t<td><a href='./" . $urlList[$i] . "'>" . $japaneseList[$i] . "</a></td>";
	}
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