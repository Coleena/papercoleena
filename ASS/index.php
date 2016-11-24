<!DOCTYPE html>
<html>

<head>
<title>Coleena's ASS Files</title>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="sorterstyle.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,400italic' rel='stylesheet' type='text/css'>
<?php require_once realpath(__DIR__.'/..').'/config.php'; ?>
<script type="text/javascript" src="./jquery.tablesorter.js"></script> 

<script type="text/javascript">
$(document).ready(function() { 
	$("#vocaasstable").tablesorter({ 
		sortList: [[2,1]],
        headers:{ 
            3:{ 
                sorter: false 
            } 
        } 
    }); 
	$("#momoasstable").tablesorter({ 
		sortList: [[2,0]],
        headers:{ 
            3:{ 
                sorter: false 
            } 
        } 
    }); 
	$("#miscasstable").tablesorter({ 
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

<header class="top">
<div id="top">
<h1 id="pagetitle"><a href="./">
Coleena's ASS Files
</a></h1>
<a href="../" id="homebuttonlink">
<img src="../home.png" alt="Home" id="homebutton">
</a>
<form id="searchform" action="search.php" method="post">
<input type="text" placeholder="Search!" id="searchbox" name="searchquery">
</form>
</div>
</header>

<div class="content">
<p>Right click + save link as to download the ASS file to your computer. You can then load it up into your preferred editor, <a href="//http://www.aegisub.org/">Aegisub</a>.</p>
<p>Some files are missing due to an external hard drive failure, so if the one you want isn't here, it's gone. Sorry!</p>
<p>I won't be providing download links to the fonts because there's too many, but if you can't find one that you want to use, just shoot me a message. (I can't provide download links to copyrighted fonts, though - you're on your own there.)</p>

<h2>VOCALOID</h2>
<table id="vocaasstable" class="tablesorter">
<thead> 
<tr> 
    <th>English Title</th> 
    <th>Romaji Title</th> 
    <th>Upload Date</th>
    <th>Video</th> 
</tr> 
</thead> 
<tbody> 
<?php 
// Store all columns as arrays from misclyriclist table
$info = $link->query("select * from vocaasslist order by uploadDate DESC")->fetch_all(MYSQLI_ASSOC);
$englishList = $romajiList = $dateList = $nicodouList = $youtubeList = array();
for($rowNum = 0; $rowNum < count($info); $rowNum++){
	$englishList[] = $info[$rowNum]['englishTitle'];
	$romajiList[] = $info[$rowNum]['romajiTitle'];
	$dateList[] = $info[$rowNum]['uploadDate'];
	$nicodouList[] = $info[$rowNum]['nicodouLink'];
	$youtubeList[] = $info[$rowNum]['youtubeLink'];
}

for($i = 0; $i < sizeof($englishList); $i++){
	echo "<tr>\n";
	echo "\t<td><a href='./" . $romajiList[$i] . ".ass'>" . $englishList[$i] . "</a></td>\n";
	echo "\t<td><a href='./" . $romajiList[$i] . ".ass'>" . $romajiList[$i] . "</a></td>\n";
	echo "\t<td>" . $dateList[$i] . "</td>\n";
	echo "\t<td>";
	if(!is_null($nicodouList[$i])){
		echo "<a href='//www.nicovideo.jp/watch/" . $nicodouList[$i] . "'><img src='/nicodoulink.png' class='videolink'></a>";
	}
	else{
		echo "<img src='/nicodoulink_gray.png' class='videolink'>";
	}
	if(!is_null($youtubeList[$i])){
		echo "<a href='//youtu.be/" . $youtubeList[$i] . "'><img src='/youtubelink.png' class='videolink'></a>";
	}
	else{
		echo "<img src='/youtubelink_gray.png' class='videolink'>";
	}
	echo "</td>\n";
	echo "</tr>\n";
}

?>

</tbody> 
</table> 


<h2>Momoiro Clover Z</h2>
<table id="momoasstable" class="tablesorter"> 
<thead> 
<tr> 
    <th>English Title</th> 
    <th>Romaji Title</th> 
    <th>Release Date</th>
    <th>Video</th> 
</tr> 
</thead> 
<tbody> 
<?php 
$result = $link->query("select englishTitle from momoasslist order by releaseDate ASC");
$englishList = array();
while ($row = mysqli_fetch_array($result)){  
	$englishList[] = $row[0];
}
$result = $link->query("select romajiTitle from momoasslist order by releaseDate ASC");
$romajiList = array();
while ($row = mysqli_fetch_array($result)){  
	$romajiList[] = $row[0];
}
$result = $link->query("select releaseDate from momoasslist order by releaseDate ASC");
$dateList = array();
while ($row = mysqli_fetch_array($result)){  
	$dateList[] = $row[0];
}
$result = $link->query("select nicodouLink from momoasslist order by releaseDate ASC");
$nicodouList = array();
while ($row = mysqli_fetch_array($result)){  
	$nicodouList[] = $row[0];
}
$result = $link->query("select youtubeLink from momoasslist order by releaseDate ASC");
$youtubeList = array();
while ($row = mysqli_fetch_array($result)){  
	$youtubeList[] = $row[0];
}

for($i = 0; $i < sizeof($englishList); $i++){
	echo "<tr>\n";
	echo "\t<td><a href='./" . $romajiList[$i] . ".ass'>" . $englishList[$i] . "</a></td>\n";
	echo "\t<td><a href='./" . $romajiList[$i] . ".ass'>" . $romajiList[$i] . "</a></td>\n";
	echo "\t<td>" . $dateList[$i] . "</td>\n";
	echo "\t<td>";
	if(!is_null($nicodouList[$i])){
		echo "<a href='//www.nicovideo.jp/watch/" . $nicodouList[$i] . "'><img src='/nicodoulink.png' class='videolink'></a>";
	}
	else{
		echo "<img src='/nicodoulink_gray.png' class='videolink'>";
	}
	if(!is_null($youtubeList[$i])){
		echo "<a href='//youtu.be/" . $youtubeList[$i] . "'><img src='/youtubelink.png' class='videolink'></a>";
	}
	else{
		echo "<img src='/youtubelink_gray.png' class='videolink'>";
	}
	echo "</td>\n";
	echo "</tr>\n";
}

?>

</tbody> 
</table> 

<h2>Miscellaneous Japanese Music</h2>
<table id="miscasstable" class="tablesorter"> 
<thead> 
<tr> 
    <th>English Title</th> 
    <th>Romaji Title</th> 
    <th>Artist Name</th> 
    <th>Release Date</th>
    <th>Video</th>
</tr> 
</thead> 
<tbody> 
<?php 
$result = $link->query("select englishTitle from miscasslist order by englishTitle ASC");
$englishList = array();
while ($row = mysqli_fetch_array($result)){  
	$englishList[] = $row[0];
}
$result = $link->query("select romajiTitle from miscasslist order by englishTitle ASC");
$romajiList = array();
while ($row = mysqli_fetch_array($result)){  
	$romajiList[] = $row[0];
}
$result = $link->query("select artistName from miscasslist order by englishTitle ASC");
$artistList = array();
while ($row = mysqli_fetch_array($result)){  
	$artistList[] = $row[0];
}
$result = $link->query("select releaseDate from miscasslist order by englishTitle ASC");
$dateList = array();
while ($row = mysqli_fetch_array($result)){  
	$dateList[] = $row[0];
}
$result = $link->query("select youtubeLink from miscasslist order by englishTitle ASC");
$youtubeList = array();
while ($row = mysqli_fetch_array($result)){  
	$youtubeList[] = $row[0];
}

for($i = 0; $i < sizeof($englishList); $i++){
	echo "<tr>\n";
	echo "\t<td><a href='./" . $romajiList[$i] . ".ass'>" . $englishList[$i] . "</a></td>\n";
	echo "\t<td><a href='./" . $romajiList[$i] . ".ass'>" . $romajiList[$i] . "</a></td>\n";
	echo "\t<td>" . $artistList[$i] . "</td>\n";
	echo "\t<td>" . $dateList[$i] . "</td>\n";
	echo "\t<td>";
	if(!is_null($youtubeList[$i])){
		echo "<a href='//youtu.be/" . $youtubeList[$i] . "'><img src='../youtubelink.png' class='videolink'></a>";
	}
	echo "</td>\n";
	echo "</tr>\n";
}

?>

</tbody> 
</table> 

</div>

<?php include("../socialmedia.html"); ?>

</body>

</html>