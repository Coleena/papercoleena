<!DOCTYPE html>
<html lang="en" class="momoclo">
<head>

<title>Coleena's Momoiro Clover Z Lyrics Translations</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
$view = $_GET['view'];

// Filter by composer/lyricist/arrangement in list view
$songwriter = $_GET['songwriter'];
?>
<link rel="stylesheet" type="text/css" href="./sorterstyle.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:800&#124;Titan+One" rel="stylesheet">
<script type="text/javascript" src="./jquery.tablesorter.js"></script> 

<script type="text/javascript">
function albumViewOn(){
	$("button").not(".albumview button").removeClass("active");
	$("button#albumon").addClass("active");
	$(".listview").hide();
	$(".albumview").show();
}
function listViewOn(){
	$("button").removeClass("active");
	$("button#liston").addClass("active");
	$(".albumview").hide();
	$(".listview").show();
}

$(document).ready(function() { 
	$(".tablesorter").tablesorter({ 
		sortList: [[3,1]]
    }); 
	
	<?php
		if($view === "album"){
			echo "albumViewOn();";
		}
		else if($view === "list"){
			echo "listViewOn();";
		}
	?>
	
	$(".listoverlay").on('DOMMouseScroll mousewheel', function(ev) {
		var $this = $(this),
			scrollTop = this.scrollTop,
			scrollHeight = this.scrollHeight,
			height = $this.height(),
			delta = (ev.type == 'DOMMouseScroll' ?
				ev.originalEvent.detail * -40 :
				ev.originalEvent.wheelDelta),
			up = delta > 0;

		// Don't disable scrolling if list not overflown
		if (!(this.offsetHeight < this.scrollHeight ||
			this.offsetWidth < this.scrollWidth)){
			return true;
		} 
		
		var prevent = function() {
			ev.stopPropagation();
			ev.preventDefault();
			ev.returnValue = false;
			return false;
		}
		
		if (!up && -delta > scrollHeight - height - scrollTop) {
			$this.scrollTop(scrollHeight);
			return prevent();
		} else if (up && delta > scrollTop) {
			$this.scrollTop(0);
			return prevent();
		}
	});
	
	$("button#albumon").click(function(){
		albumViewOn();
		history.pushState(null, null, "?view=album");
	});
	$("button#liston").not(".albumview").click(function(){
		listViewOn();
		history.pushState(null, null, "?view=list");
	});
	
	// Scroll to span with id 'year####' when button of id 'to####' clicked
	$(".albumview button").click(function(){
		$(".albumview button").removeClass("active");
		$(this).addClass("active");
		$('html, body').animate({
			scrollTop: $("#year" + $(this).attr('id').substring(2)).offset().top
		}, 1000);
	});
});
</script>


</head>

<body>

<?php include("header.php"); ?>

<div class="headtablist">
<a href="/momoclo/"><div class="tab active"><div id="rectangle"></div>Lyrics</div></a><!--
!--><a href="/momoclo/albums/"><div class="tab">Albums</div></a><!--
!--><a href="/momoclo/info/"><div class="tab">Info</div></a>
</div>

<div class="content">

<div class="settingslist">
<button class="active" id="albumon">Album View</button>
<button id="liston">List View</button>
<div class="albumview">Jump to Year: 
<button id="to2009">2009</button><button id="to2010">2010</button><button id="to2011">2011</button><button id="to2012">2012</button><button id="to2013">2013</button><button id="to2014">2014</button><button id="to2015">2015</button><button id="to2016">2016</button></div>
</div>

<?php
function printTracks($albumUrl){
	global $link;
	$info = $link->query("select trackNumber,trackUrl,edition,englishTitle,romajiTitle,japaneseTitle from tracklist,albuminfo where albuminfo.url = tracklist.albumUrl and albuminfo.url = '$albumUrl' order by field(edition, 'regular', 'limited', 'event', 'special', 'emperor', 'pokemon', 'momoclo', 'kiss', 'limitedA', 'limitedB',  'limitedC',  'limitedD',  'limitedE',  'limitedF') ASC, trackNumber ASC")->fetch_all(MYSQLI_ASSOC);
	$currEdition = $edition = $info[0]['edition'];
	
	// Get all tracks from one edition of album
	$edition = $trackNumber = $altEnglishTitle = $altRomajiTitle = $altJapaneseTitle = $trackUrl = array();
	for($rowNum = 0; $rowNum < count($info); $rowNum++){
		$temp = $info[$rowNum]['edition'];
		
		if($currEdition != $temp){ // Break before going to next edition
			break;
		}
		
		$edition[] = $info[$rowNum]['edition'];
		$trackNumber[] = $info[$rowNum]['trackNumber'];
		$altEnglishTitle[] = $info[$rowNum]['englishTitle'];
		$altRomajiTitle[] = $info[$rowNum]['romajiTitle'];
		$altJapaneseTitle[] = $info[$rowNum]['japaneseTitle'];
		$trackUrl[] = $info[$rowNum]['trackUrl'];
	}
	
	// Print as list items
	for($rowNum = 0; $rowNum < count($trackUrl); $rowNum++){
		if(!is_null($trackUrl[$rowNum])){
			$songInfo = $link->query("select * from tracklist, lyriclist where tracklist.trackUrl = lyriclist.url and tracklist.trackUrl = '{$trackUrl[$rowNum]}'")->fetch_array();
			
			$englishTitle = $songInfo{'englishTitle'};
			$romajiTitle = $songInfo{'romajiTitle'};
			$japaneseTitle = $songInfo{'japaneseTitle'};
			
			if(file_exists("./Text/{$trackUrl[$rowNum]}_e.html")){
				echo "\t\t<li><a href='./{$trackUrl[$rowNum]}'>{$englishTitle}</a></li>\n";
			}
			else{
				echo "\t\t<li>{$englishTitle}</li>\n";
			}
		}
		else if(stripos($altEnglishTitle[$rowNum], 'off vocal') === false && stripos($altEnglishTitle[$rowNum], '(inst') === false){ // Tracks with no lyrics page, only print if not off-vocal
			echo "\t\t<li>$altEnglishTitle[$rowNum]</li>\n";
		}
	}
} ?>
<div class="wrapping albumview">
	<span class="yearheader" id="year2016">2016</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/goldhist_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('goldhist')?>
	</ol></div>
	<span class="listtitle">The Golden History</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/newmoon_momoclo.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>In Love with the New Moon</li>
		<li>Only Eternity Bridges Our Distance</li>
	</ol></div>
	<span class="listtitle">New Moon ni Koishite</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/hakkin_limited.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('hakkin')?>
	</ol></div>
	<span class="listtitle">Hakkin no Yoake</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/amaranthus_limited.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('amaranthus')?>
	</ol></div>
	<span class="listtitle">AMARANTHUS</span>
	</div>
	
	<span class="yearheader" id="year2015">2015</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/koyoi_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Tonight, Under this Live</li>
	</ol></div>
	<span class="listtitle">Koyoi, Live no Moto de</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/znochikai_f.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Our "Z" Pledge (Pledge of "Z")</li>
		<li>Romantic Tangle-Ups</li>
		<li>CHA-LA HEAD-CHA-LA</li>
	</ol></div>
	<span class="listtitle">"Z" no Chikai</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/seishunfu_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('seishunfu')?>
	</ol></div>
	<span class="listtitle">Seishunfu</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/ukiyo_momoclo.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('ukiyo')?>
	</ol></div>
	<span class="listtitle">Yume no Ukiyo ni Saitemina</span>
	</div>
	
	
	<span class="yearheader" id="year2014">2014</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/hitotsubu_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('hitotsubu')?>
	</ol></div>
	<span class="listtitle">Hitotsubu no Egao de... / Chai Maxx Zero</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/moonpride_momoclo.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./moonpride">Moon Pride</a></li>
		<li>Moonbow</li>
		<li>Moon Revenge</li>
	</ol></div>
	<span class="listtitle">Moon Pride</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/naitemo_limited.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./naitemo">It's Okay to Cry</a></li>
		<li>Grand Peace Declaration</li>
		<li>My Dear Fellow</li>
	</ol></div>
	<span class="listtitle">Naitemo Iindayo</span>
	</div>
	
	
	<span class="yearheader" id="year2013">2013</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/naifuyu_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Tearful Winter</li>
		<li>Steel Will</li>
	</ol></div>
	<span class="listtitle">Naichaisou Fuyu / Hagane no Ishi</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/gounn_limited.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('gounn')?>
	</ol></div>
	<span class="listtitle">GOUNN</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/iriguchi_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('iriguchi')?>
	</ol></div>
	<span class="listtitle">Iriguchi no Nai Deguchi</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/5th_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('5th')?>
	</ol></div>
	<span class="listtitle">5th Dimension</span>
	</div>
	
	
	<span class="yearheader" id="year2012">2012</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/bokusen_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Our Century</li>
		<li>The Sky's Curtain</li>
	</ol></div>
	<span class="listtitle">Bokura no Century</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/saraba_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('saraba')?>
	</ol></div>
	<span class="listtitle">Saraba, Itoshiki Kanashimi-tachi yo</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/egaohyakkei_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('egaohyakkei')?>
	</ol></div>
	<span class="listtitle">Nippon Egao Hyakkei</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/otomesensou_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('otomesensou')?>
	</ol></div>
	<span class="listtitle">Otome Sensou</span>
	</div>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/allstars_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('allstars')?>
	</ol></div>
	<span class="listtitle">Momoclo★Allstars 2012</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/mouretsu_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('mouretsu')?>
	</ol></div>
	<span class="listtitle" style="margin-top:-52px">Mouretsu Uchuu Koukyoukyoku Dai Nana Gakushou "Mugen no Ai"</span>
	</div>
	
	
	<span class="yearheader" id="year2011">2011</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/shiroikaze_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('shiroikaze')?>
	</ol></div>
	<span class="listtitle">Shiroi Kaze</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/roudou_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('roudou')?>
	</ol></div>
	<span class="listtitle">Roudou Sanka</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/djun_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('djun')?>
	</ol></div>
	<span class="listtitle">D' no Junjou</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/zdensetsu_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('zdensetsu')?>
	</ol></div>
	<span class="listtitle">Z Densetsu ~Owarinaki Kakumei~</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/bar_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('bar')?>
	</ol><ol class="tracklist"><li>Bonus:</li>
		<li><a href="./taieku">The Sun and Dimples</a></li>
		<li><a href="./fallintome">fall into me</a></li>
		<li>...is this Love?</li>
		<li><a href="./dateari">'cause I'm Ahrin☆</a></li>
		<li><a href="./aripre">Thank-You Present</a></li>
		<li><a href="./onidaiko">Love is a Raging Demon Drum</a></li>
	</ol></div>
	<span class="listtitle">Battle and Romance</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/akarin_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('akarin')?>
	</ol></div>
	<span class="listtitle">Akarin he Okuru Uta</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/miraibowl_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('miraibowl')?>
	</ol></div>
	<span class="listtitle">Mirai Bowl/Chai Maxx</span>
	</div>
	
	
	<span class="yearheader" id="year2010">2010</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/momokuri_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('momokuri')?>
	</ol></div>
	<span class="listtitle">Momokuri</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/pinkyjones_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('pinkyjones')?>
	</ol></div>
	<span class="listtitle">Pinky Jones</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/kaitou_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('kaitou')?>
	</ol></div>
	<span class="listtitle">Ikuze! Kaitou Shoujo</span>
	</div>
	
	
	<span class="yearheader" id="year2009">2009</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/miraihesusume_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('miraihesusume')?>
	</ol></div>
	<span class="listtitle">Mirai he Susume!</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/momopan_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
	<?php printTracks('momopan')?>
	</ol></div>
	<span class="listtitle">Momoiro Punch</span>
	</div>
</div>

<table class="tablesorter listview" id="momoclotable"> 
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
// Store all columns as arrays from lyriclist table, filter by composer/lyricist/arrangement
$filtered = !empty($songwriter);

// Wildcards for fields with multiple songwriters
$songwriter = "%" . $songwriter . "%";
$select = "SELECT englishTitle, romajiTitle, japaneseTitle, url, releaseDate, composer, lyricist, arrangement 
FROM lyriclist 
JOIN lyrics 
ON lyriclist.id=lyrics.id";
if($filtered){
	$select .= " WHERE composer LIKE ? OR lyricist LIKE ? OR arrangement LIKE ?";
}
$select .= " ORDER BY lyriclist.id ASC";
$stmt = $link->prepare($select);
if($filtered){
	$stmt->bind_param("sss", $songwriter, $songwriter, $songwriter);
}
$stmt->execute();

$info = $stmt->get_result();
$stmt->close();

// Skip output if nothing found
if($info->num_rows != 0){
	$info = $info->fetch_all(MYSQLI_ASSOC);
	
	$englishList = $romajiList = $japaneseList = $urlList = $dateList = array();
	for($rowNum = 0; $rowNum < count($info); $rowNum++){
		$englishList[] = $info[$rowNum]['englishTitle'];
		$romajiList[] = $info[$rowNum]['romajiTitle'];
		$japaneseList[] = $info[$rowNum]['japaneseTitle'];
		$urlList[] = $info[$rowNum]['url'];
		$dateList[] = $info[$rowNum]['releaseDate'];
	}

	for($i = 0; $i < sizeof($englishList); $i++){
		echo "<tr>";
		if(!file_exists("./Text/$urlList[$i]_e.html")){
			echo "\t<td> $englishList[$i] </td>";
			echo "\t<td> $romajiList[$i] </td>";
			echo "\t<td> $japaneseList[$i] </td>";
		}
		else{
			echo "\t<td><a href='./$urlList[$i]'> $englishList[$i] </a></td>";
			echo "\t<td><a href='./$urlList[$i]'> $romajiList[$i] </a></td>";
			echo "\t<td><a href='./$urlList[$i]'> $japaneseList[$i] </a></td>";
		}
		echo "\t<td> $dateList[$i] </td>";
		echo "</tr>\n";
	}
}
else{
	echo "<tr>\n\t<td></td>\n\t<td></td>\n\t<td></td>\n\t<td></td>\n</tr>";
}

?>

</tbody> 
</table> 

</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/socialmedia.html"); ?>

</body>

</html>