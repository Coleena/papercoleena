<!DOCTYPE html>
<html lang="en" class="momoclo">
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php // Display error message if no album exists
	include_once realpath(__DIR__ . '/../..') . '/config.php';
	$url = $_GET['album'];
	
	$stmt = $link->prepare("select id from albumlist where albumlist.url = ?");
	$stmt->bind_param("s", $url);
	$stmt->execute();
	
	$res = $stmt->get_result();
	$stmt->close();
	
	if(is_null($res->fetch_array())){
		include("../error.php");
		exit;
	}
?>
<?php // Get album id for album info lookup
$id = fetch("select id from albumlist where albumlist.url = '$url'",$link);	

$currentAlbum = $link->query("select * from albumlist,albuminfo where albumlist.id=albuminfo.id and albumlist.id = $id")->fetch_array();

$descriptor = $currentAlbum{'descriptor'};
$englishTitle = $currentAlbum{'englishTitle'};
$romajiTitle = $currentAlbum{'romajiTitle'};
$japaneseTitle = $currentAlbum{'japaneseTitle'};
$releaseDate = $currentAlbum{'releaseDate'};

$albumUrl = $currentAlbum{'url'};

?>

<title><?php echo "$englishTitle "; 
if(strcmp($englishTitle, $romajiTitle) != 0){
	echo "($romajiTitle) "; 
}
echo "Album Info - Coleena's Translations" ?> </title>

</head>

<body>

<?php include("../header.php"); 
include ("{$_SERVER['DOCUMENT_ROOT']}/momoclo/tablist.php") ?>

<div class="content">
<div class="releasedate"><?php echo $releaseDate; ?></div>
<h3><?php echo $descriptor; ?></h3>
<h1><?php echo $englishTitle; ?></h1> 
<?php if($englishTitle != $romajiTitle){
	echo "<h2 class='romajipreference'>($romajiTitle)</h2>"; 
}
echo "<h2 class='japanesepreference'>($japaneseTitle)</h2>"; 
?>

<?php
// Edition IDs mapped to official names
$albumType = array('limited' => 'Limited Edition', 'regular' => 'Regular Edition', 'event' => 'Event Single', 'special' => 'Special Edition', 'emperor' => 'Emperor Style', 'pokemon' => 'Pokemon Edition', 'momoclo' => 'Momoclo Edition', 'kiss' => 'Kiss Edition', 'sailormoon' => 'Sailor Moon Edition', 'f' => 'F Edition', 'z' => 'Z Edition', 'limitedA' => 'Limited Edition A', 'limitedB' => 'Limited Edition B',  'limitedC' => 'Limited Edition C',  'limitedD' => 'Limited Edition D',  'limitedE' => 'Limited Edition E',  'limitedF' => 'Limited Edition F');

// Store all columns as arrays from tracklist table
$info = $link->query("select * from tracklist,albuminfo where albuminfo.url = tracklist.albumUrl and albuminfo.url = '$url' order by field(edition, 'limited', 'regular', 'event', 'special', 'emperor', 'pokemon', 'momoclo', 'kiss', 'limitedA', 'limitedB',  'limitedC',  'limitedD',  'limitedE',  'limitedF') ASC, trackNumber ASC")->fetch_all(MYSQLI_ASSOC);
$edition = $trackNumber = $altEnglishTitle = $altRomajiTitle = $altJapaneseTitle = $trackUrl = array();
for($rowNum = 0; $rowNum < count($info); $rowNum++){
	$edition[] = $info[$rowNum]['edition'];
	$trackNumber[] = $info[$rowNum]['trackNumber'];
	$altEnglishTitle[] = $info[$rowNum]['englishTitle'];
	$altRomajiTitle[] = $info[$rowNum]['romajiTitle'];
	$altJapaneseTitle[] = $info[$rowNum]['japaneseTitle'];
	$trackUrl[] = $info[$rowNum]['trackUrl'];
}

// Store all columns as arrays from purchaseinfo table
$purchaseInfo = $link->query("select * from albumpurchaseinfo,albuminfo where albuminfo.url = albumpurchaseinfo.url and albuminfo.url = '$url' order by field(edition, 'limited', 'regular', 'event', 'special', 'emperor', 'pokemon', 'momoclo', 'kiss', 'limitedA', 'limitedB',  'limitedC',  'limitedD',  'limitedE',  'limitedF') ASC")->fetch_all(MYSQLI_ASSOC);
$amazonLink = $cdjapanLink = $itunesLink = array();
for($rowNum = 0; $rowNum < count($purchaseInfo); $rowNum++){
	$amazonLink[] = $purchaseInfo[$rowNum]['amazonLink'];
	$cdjapanLink[] = $purchaseInfo[$rowNum]['cdjapanLink'];
	$itunesLink[] = $purchaseInfo[$rowNum]['itunesLink'];
}

// Loop through tracklists for all editions of the album, separating different editions
$i = 0;
$j = 0; // Edition index
while($i < count($edition)){
	// First find album art and display purchase links
	echo "<div class='albumcontainer'>";
	echo "<div class='albumartcontainer2'><a target='_blank' href='./Album%20Art/{$albumUrl}_{$edition[$i]}.jpg'><img src='./Album%20Art/{$albumUrl}_{$edition[$i]}.jpg' alt='Album art' class='albumart2'></a></div>";
	echo "<h2>" . $albumType[$edition[$i]] . "</h2>\n";
	echo "<div class='purchaselinks'>";
	if(!empty($amazonLink) && !is_null($amazonLink[$j])){
		echo "<a href='" . $amazonLink[$j] . "'><img alt=\"Amazon\" src='";
		if(substr($amazonLink[$j],18,5) == "co.jp"){
			echo "amazon_jp.gif'></a>";
		}
		else{
			echo "amazon_en.gif'></a>";
		}
	}
	if(!empty($cdjapanLink) && !is_null($cdjapanLink[$j])){
		echo "<a href='$cdjapanLink[$j]'><img alt=\"CDJapan\" src='cdjapan.png'></a>";
	}
	if(!empty($itunesLink) && !is_null($itunesLink[$j])){
		echo "<a href='$itunesLink[$j]'><img alt=\"iTunes\" src='itunes.png'></a>";
	}
	echo "</div>";
	echo "<table class=\"tracklist\">\n";
	
	$currentEdition = $i; // Output tracklist until next edition
	while($i < count($edition) && $edition[$currentEdition] == $edition[$i]){
		if(!is_null($trackUrl[$i])){
			$songInfo = $link->query("select * from tracklist, lyriclist where tracklist.trackUrl = lyriclist.url and tracklist.trackUrl = '$trackUrl[$i]'")->fetch_array();
			
			$englishTitle = $songInfo{'englishTitle'};
			$romajiTitle = $songInfo{'romajiTitle'};
			$japaneseTitle = $songInfo{'japaneseTitle'};
			
			echo "<tr><td>" . $trackNumber[$i] . ".</td>";
			echo "<td><a href='../{$trackUrl[$i]}'>{$englishTitle} ";
			if($englishTitle != $romajiTitle){
				echo "<span class=\"romajipreference\"> ($romajiTitle)</span>";
			}
			if($englishTitle != $japaneseTitle){
				echo "<span class=\"japanesepreference\"> ($japaneseTitle)</span>";
			}
			echo "</a></td>\n";
		}
		else{ //tracks with no lyrics page
			echo "<tr><td>{$trackNumber[$i]}.</td><td>$altEnglishTitle[$i] ";
			if($altEnglishTitle[$i] != $altRomajiTitle[$i]){
				echo "<span class=\"romajipreference\"> / $altRomajiTitle[$i]</span>";
			}
			if($altEnglishTitle[$i] != $altJapaneseTitle[$i]){
				echo "<span class=\"japanesepreference\"> / $altJapaneseTitle[$i]</span>";
			}
			echo "</td>\n";
		}
		$i++;
	}
	echo "</table>\n";
	$bonus = fetch("select bonus from albumbonus,albuminfo where albuminfo.url = albumbonus.albumUrl and albumbonus.edition = '$edition[$currentEdition]' and albuminfo.url = '$url'",$link);
	if(substr($bonus,-5) == '.html'){
		echo "<h4>Bonus:</h4>\n";
		include $bonus;
	}
	else if(!is_null($bonus)){
		echo "<h4>Bonus:</h4>";
	echo "<p style='padding-left: 8px; margin-top: 0px'>{$bonus}</p>";
	}
	echo '</div>';
	$j++;
}

?>

</div>


</body>


</html>