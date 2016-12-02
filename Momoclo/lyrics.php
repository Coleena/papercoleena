<!DOCTYPE html>
<html class="momoclo">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php // Display error message if no song exists
	require_once realpath(__DIR__ . '/..') . '/config.php';
	$url = $_GET['song'];

	// Sanitize input by checking against file existence before going to SQL
	if(!file_exists("./Text/" . $url . "_e.html")){
		include("error.php");
		exit;
	}
	
	// Extra sanitizer
	$stmt = $link->prepare("select id from lyriclist where lyriclist.url = ?");
	$stmt->bind_param("s", $url);
	$stmt->execute();
	
	$res = $stmt->get_result();
	$stmt->close();
	
	if( is_null( $res->fetch_array() ) ){
		include("error.php");
		exit;
	}
?>
<?php // Get song id for song info lookup
$id = fetch("select id from lyriclist where lyriclist.url = '" . $url . "'",$link);	

$currentSong = $link->query("select * from lyrics, lyriclist where lyrics.id = lyriclist.id and lyrics.id = " . $id)->fetch_array();

$englishTitle = $currentSong{'englishTitle'};
$romajiTitle = $currentSong{'romajiTitle'};
$japaneseTitle = $currentSong{'japaneseTitle'};

$artist = $currentSong{'artist'};
$composer = $currentSong{'composer'};
$lyricist = $currentSong{'lyricist'};
$arrangement = $currentSong{'arrangement'};


$currentAlbum = $link->query("select * from albumlist,lyrics where albumlist.id = lyrics.albumId and lyrics.id = ". $id)->fetch_array();

$albumEnglishTitle = $currentAlbum{'englishTitle'};
$albumRomajiTitle = $currentAlbum{'romajiTitle'};
$albumJapaneseTitle = $currentAlbum{'japaneseTitle'};
$albumUrl = $currentAlbum{'url'};

$twoalbums = false;
if(!is_null(fetch("select albumId2 from lyrics where lyrics.id = " . $id,$link))){
	$album2 = $link->query("select * from albumlist,lyrics where albumlist.id = lyrics.albumId2 and lyrics.id= ". $id)->fetch_array();
	
	$album2EnglishTitle = $album2{'englishTitle'};
	$album2RomajiTitle = $album2{'romajiTitle'};
	$album2JapaneseTitle = $album2{'japaneseTitle'};
	$album2Url = $album2{'url'};
	$twoalbums = true;
}

echo '<meta property="og:image" content="./albums/Album%20Art/' . $albumUrl . '_regular.jpg" />';

?>
<meta name="description" content="<?php 
$engText = file_get_contents("./Text/" . $url . "_e.html"); 
echo substr(strip_tags(str_replace(array("<br/>","English","\n","\r","\t","    "),array(".","English Translation.","",""," "," "),$engText)),0,110) . "..." ?>">


<title><?php echo $englishTitle; 
if($englishTitle != $romajiTitle){
	echo " (" . $romajiTitle . ")"; 
}
echo " - Coleena's Translations" ?></title>

<script type="text/javascript" src="./albumart.js"></script>
<script type="text/javascript">
<?php // Add album cover to display if exists in below list, in below order
	$albumTypes = ["limited","regular","event","emperor","pokemon","momoclo","kiss","sailormoon","f","z","limitedA","limitedB","limitedC","limitedD","limitedE","limitedF"];
	$currentCoverTypes = [];
	$numberOfCovers = 0;
	for($i = 0; $i < sizeof($albumTypes); $i++){
		if(file_exists("./albums/Album Art/" . $albumUrl . "_" . $albumTypes[$i] . ".jpg")){
			array_push($currentCoverTypes,$albumTypes[$i]);
			$numberOfCovers++;
		}
	}
?>
var numberOfCovers = <?php echo $numberOfCovers; ?>;
var currentCoverTypes = <?php echo json_encode($currentCoverTypes); ?>
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('.tablist li a').not($('#togglevideo').parent()).on('click', function(e){
		var activeVideo; 
		activeVideo = $('.videotab.active iframe').detach();
		$('.videotab.active').append(activeVideo);
        var clickedAttribute = $(this).attr('href');
        $('.tabs ' + clickedAttribute).show().addClass('active').siblings().hide().removeClass('active');
        $(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
	$('.videotab').height($('.videotab.active').width() / 16 * 9);
	$('#togglevideo').on('click',function(e){
		$('.tabs').animate({
			height: 'toggle'
		});
		$('.tabs').promise().done(function(){
			$('.tablist li').not($('#togglevideo').parent().parent().parent()).toggleClass("alone");
		});
		$('#togglevideo').toggleClass("videotogglealt");
		e.preventDefault();
	});
});
$(window).resize(function(){
	$('.videotab').height($('.videotab.active').width() / 16 * 9);
});
$(document).ready(function(){
});
</script>

</head>

<body>

<?php include("header.php"); ?>

<div class="content2">
<?php 
if(substr($url,-2) == "_z"){
	echo "<button id='versionbutton' onclick='location.href=\"./" . substr($url,0,strlen($url)-2) . "\"'>Original Version</button>";
}
if(file_exists("./Text/" . $url . "_z_e.html")){
	echo "<button id='versionbutton' onclick='location.href=\"./$url" . "_z\"'>Z Version</button>";
}
else if($url[strlen($url)-1] == "z"){
	if(file_exists("./Text/" . substr($url,0,-1) . "_e.html")){
		echo "oh";
	}
}
?>
<h1><?php echo $englishTitle; ?></h1> 
<?php 
if($englishTitle != $romajiTitle){
	echo " <h2 class='romajipreference'>(" . $romajiTitle . ")</h2>"; 
}
if($englishTitle != $japaneseTitle){
	echo " <h2 class='japanesepreference'>(" . $japaneseTitle . ")</h2>"; 
}
?>

<?php
if(file_exists("./Text/" . $url . "_embed.html")){
	echo "<div id=\"videoembedbox\">\n";
	include("./Text/" . $url . "_embed.html"); 
	echo "</div>";
}
?>

<div id="infobox">

<table class="infotable">
<tbody>
<tr>
	<td id="albumartcontainer">
		<div style="position: relative; width: 0; height: 0"><a href="#"><div id="nextbutton"></div></a></div>
		<div style="position: relative; width: 0; height: 0"><a href="#"><div id="backbutton"></div></a></div>
		<?php 
			$x = 0;
			while($x < sizeof($currentCoverTypes)){
				if($x == 0){
					echo '<a target="_blank" href="./albums/Album%20Art/' . $albumUrl . "_" . $currentCoverTypes[$x] . '.jpg">' . '<img src="./albums/Album%20Art/' . $albumUrl . "_" . $currentCoverTypes[$x] . '.jpg" alt="Album art" class="albumart active"></a>';
				}
				else if(file_exists("./albums/Album Art/" . $albumUrl . "_" . $currentCoverTypes[$x] . ".jpg")){
					echo '<a target="_blank" href="./albums/Album%20Art/' . $albumUrl . "_" . $currentCoverTypes[$x] . '.jpg">' . '<img src="./albums/Album%20Art/' . $albumUrl . "_" . $currentCoverTypes[$x] . '.jpg" alt="Album art" class="albumart"></a>';
				}
				$x++;
			}
		?>
	</td>
</tr>
</tbody>
</table><table class="infotable">
<tr style="height: 31pt">
	<th>Artist(s):</th>
	<td><?php echo $artist; ?></td>
</tr>
<tr style="height: 31pt">
	<th>Composer(s):</th>
	<td><?php
		// Split into multiple links if delimited by comma and space
		$composerList = explode(", ", $composer);
		for($i = 0; $i < count($composerList); $i++){
			if($i > 0){
				echo ", ";
			}
			
			echo "<a href='/momoclo/?view=list&songwriter=" . $composerList[$i] . "'>";
			echo $composerList[$i];
			echo "</a>";
		}
		?></td>
</tr>
<tr style="height: 31pt">
	<th>Lyrics:</th>
	<td><?php 		
		// Split into multiple links if delimited by comma and space
		$lyricistList = explode(", ", $lyricist);
		for($i = 0; $i < count($lyricistList); $i++){
			if($i > 0){
				echo ", ";
			}
			
			echo "<a href='/momoclo/?view=list&songwriter=" . $lyricistList[$i] . "'>";
			echo $lyricistList[$i];
			echo "</a>";
		}
	?></td>
</tr>
<tr style="height: 17pt">
	<th>Arrangement:</th>
	<td><?php 
		// Split into multiple links if delimited by comma and space
		$arrangementList = explode(", ", $arrangement);
		for($i = 0; $i < count($arrangementList); $i++){
			if($i > 0){
				echo ", ";
			}
			
			echo "<a href='/momoclo/?view=list&songwriter=" . $arrangementList[$i] . "'>";
			echo $arrangementList[$i];
			echo "</a>";
		}
	?></td>
</tr>
</tbody>
</table><table class="infotable">
<tbody>
<tr style="height: 71pt">
	<th>Album<?php if($twoalbums){ echo "s"; }?>:</th>
	<?php echo "<td><a href=\"./albums/" . $albumUrl . "\">" . $albumEnglishTitle;
	if($albumEnglishTitle != $albumRomajiTitle){
		echo "<span class='romajipreference'> (" . $albumRomajiTitle . ")</span>";
	}
	if($albumEnglishTitle != $albumJapaneseTitle){
		echo "<span class='japanesepreference'> (" . $albumJapaneseTitle . ")</span>";
	}
	echo "</a>";
	if($twoalbums){
		echo ",<br/><a href='./albums/" . $album2Url . "'>" . $album2EnglishTitle;
		if($album2EnglishTitle != $album2RomajiTitle){
			echo "<span class='romajipreference'> (" . $album2RomajiTitle . ")</span>";
		}
		if($album2EnglishTitle != $album2JapaneseTitle){
			echo "<span class='japanesepreference'> (" . $album2JapaneseTitle . ")</span>";
		}
		echo "</a>";
	}
	?></td>
</tr>
<tr style="height: 38pt">
	<th>Original Title:</th>
	<td><?php echo $japaneseTitle; ?></td>
</tr>
</tbody>
</table>

</div>

<div id="lyriccontainer">
<table class="lyrictable hiddenjapanese" id="japanesetable"><?php 
	include "./Text/" . $url . "_j.html" 
?> </table><table class="lyrictable romaji" id="romajitable"><?php 
	include "./Text/" . $url . "_r.html"
?></table><table class="lyrictable calls" id="callstable"><?php 
if(file_exists("./Calls/" . $url . "_calls.html")){
	include "./Calls/" . $url . "_calls.html";
}
?></table><table class="lyrictable" id="englishtable"><?php 
	include "./Text/" . $url . "_e.html"
?></table>
</div>

</div>


</body>


</html>