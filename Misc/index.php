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
$result = $link->query("select englishTitle from misclyriclist order by url");
$englishList = array();
while ($row = mysqli_fetch_array($result)){  
	$englishList[] = $row[0];
}
$result = $link->query("select romajiTitle from misclyriclist order by url");
$romajiList = array();
while ($row = mysqli_fetch_array($result)){  
	$romajiList[] = $row[0];
}
$result = $link->query("select japaneseTitle from misclyriclist order by url");
$japaneseList = array();
while ($row = mysqli_fetch_array($result)){  
	$japaneseList[] = $row[0];
}
$result = $link->query("select url from misclyriclist order by url");
$urlList = array();
while ($row = mysqli_fetch_array($result)){  
	$urlList[] = $row[0];
}
$result = $link->query("select artistName from misclyriclist order by url");
$artistList = array();
while ($row = mysqli_fetch_array($result)){  
	$artistList[] = $row[0];
}
$result = $link->query("select releaseDate from misclyriclist order by url");
$dateList = array();
while ($row = mysqli_fetch_array($result)){  
	$dateList[] = $row[0];
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