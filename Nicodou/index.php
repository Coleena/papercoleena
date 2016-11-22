<!DOCTYPE html>
<head>

<title>Coleena's NicoNico Douga Lyrics Translations</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once realpath(__DIR__.'/..').'/config.php' ?>
<link rel="stylesheet" type="text/css" href="./sorterstyle.css">
<script type="text/javascript" src="./jquery.tablesorter.js"></script> 

<script type="text/javascript">
$(document).ready(function() { 
	$(".tablesorter").tablesorter({ 
		sortList: [[3,1]],
        headers:{ 
            4:{ 
                sorter: false 
            } 
        } 
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
    <th>Upload Date</th>
    <th>Subs</th>
</tr> 
</thead> 
<tbody> 
<?php 
// Store all columns as arrays from vocalyriclist table
$info = $link->query("select * from vocalyriclist order by id ASC")->fetch_all(MYSQLI_ASSOC);
$englishList = $romajiList = $japaneseList = $urlList = $dateList = $youtubeList = $tumblrList = array();
for($rowNum = 0; $rowNum < count($info); $rowNum++){
	$englishList[] = $info[$rowNum]['englishTitle'];
	$romajiList[] = $info[$rowNum]['romajiTitle'];
	$japaneseList[] = $info[$rowNum]['japaneseTitle'];
	$urlList[] = $info[$rowNum]['url'];
	$dateList[] = $info[$rowNum]['uploadDate'];
	$youtubeList[] = $info[$rowNum]['youtubeLink'];
	$tumblrList[] = $info[$rowNum]['tumblrLink'];
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
	echo "\t<td>" . $dateList[$i] . "</td>";
	echo "\t<td>";
	if(!is_null($youtubeList[$i])){
		echo "<a href='//youtu.be/" . $youtubeList[$i] . "'><img src='../youtubelink.png' class='videolink'></a>";
	}
	if(!is_null($tumblrList[$i])){
		echo "<a href='//papercoleena.tumblr.com/" . $tumblrList[$i] . "'><img src='../tumblrlink.png' class='videolink'></a>";
	}
	echo "</td>";
	echo "</tr>";
}

?>

</tbody> 
</table> 

</div>

<div id="socialmedia">
<a href="//twitter.com/coleenawu" title="Announcements"><img src="../twitter.png" alt="Twitter"></a>
<a href="//papercoleena.tumblr.com/" title="Text Translations"><img src="../tumblr.png" alt="Tumblr"></a>
<a href="//www.youtube.com/channel/UC1oBsz0fynPSlV69ghkwrGQ" title="Subtitled Music Videos"><img src="../youtube.png" alt="YouTube"></a>
</div>

</body>

</html>