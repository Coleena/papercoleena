<!DOCTYPE html>
<html class="momoclo">
<head>

<title>Coleena's Momoiro Clover Z Album Translations</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php' ?>
<link rel="stylesheet" type="text/css" href="./../sorterstyle.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:800|Titan+One" rel="stylesheet">
<script type="text/javascript" src="/jquery.tablesorter.js"></script> 

<script type="text/javascript">
$(document).ready(function() { 
	$(".tablesorter").tablesorter({ 
		sortList: [[3,1]]
    });
	
	$("button#albumon").click(function(){
		$("button").not(".albumview button").removeClass("active");
		$(this).addClass("active");
		$(".listview").hide();
		$(".albumview").show();
	});
	$("button#liston").not(".albumview").click(function(){
		$("button").removeClass("active");
		$(this).addClass("active");
		$(".albumview").hide();
		$(".listview").show();
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
<a href="/momoclo/"><div class="tab">Lyrics</div></a><!--
!--><a href="/momoclo/albums/"><div class="tab active"><div id="rectangle"></div>Albums</div></a><!--
!--><a href="/momoclo/info/"><div class="tab">Info</div></a>
</div>

<div class="content">

<div class="settingslist">
<button class="active" id="albumon">Album View</button>
<button id="liston">List View</button>
<div class="albumview">Jump to Year: 
<button id="to2009">2009</button><button id="to2010">2010</button><button id="to2011">2011</button><button id="to2012">2012</button><button id="to2013">2013</button><button id="to2014">2014</button><button id="to2015">2015</button><button id="to2016">2016</button></div>
</div>

<div class="wrapping albumview">
	<span class="yearheader" id="year2016">2016</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/goldhist_limitedA.jpg')">
	<a href="./goldhist"><div class="listoverlay"></div></a>
	<span class="listtitle">The Golden History</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/newmoon_momoclo.jpg')">
	<div class="listoverlay"></div>
	<span class="listtitle">New Moon ni Koishite</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/yoake_limited.jpg')">
	<a href="./yoake"><div class="listoverlay"></div></a>
	<span class="listtitle">Hakkin no Yoake</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/amaranthus_limited.jpg')">
	<a href="./amaranthus"><div class="listoverlay"></div></a>
	<span class="listtitle">AMARANTHUS</span>
	</div>
	
	<span class="yearheader" id="year2015">2015</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/koyoi_event.jpg')">
	<div class="listoverlay"></div>
	<span class="listtitle">Koyoi, Live no Shita de</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/znochikai_f.jpg')">
	<a href="./znochikai"><div class="listoverlay"></div></a>
	<span class="listtitle">"Z" no Chikai</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/seishunfu_regular.jpg')">
	<a href="./seishunfu"><div class="listoverlay"></div></a>
	<span class="listtitle">Seishunfu</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/ukiyo_momoclo.jpg')">
	<a href="./ukiyo"><div class="listoverlay"></div></a>
	<span class="listtitle">Yume no Ukiyo ni Saitemina</span>
	</div>
	
	
	<span class="yearheader" id="year2014">2014</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/hitotsubu_event.jpg')">
	<div class="listoverlay"></div>
	<span class="listtitle">Hitotsubu no Egao de... / Chai Maxx Zero</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/moonpride_momoclo.jpg')">
	<a href="./moonpride"><div class="listoverlay"></div></a>
	<span class="listtitle">Moon Pride</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/naitemo_limited.jpg')">
	<a href="./naitemo"><div class="listoverlay"></div></a>
	<span class="listtitle">Naitemo Iindayo</span>
	</div>
	
	
	<span class="yearheader" id="year2013">2013</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/naifuyu_event.jpg')">
	<div class="listoverlay"></div>
	<span class="listtitle">Naichaisou Fuyu / Hagane no Ishi</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/gounn_limited.jpg')">
	<div class="listoverlay"></div>
	<span class="listtitle">GOUNN</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/iriguchi_regular.jpg')">
	<a href="./iriguchi"><div class="listoverlay"></div></a>
	<span class="listtitle">Iriguchi no Nai Deguchi</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/5th_limitedA.jpg')">
	<a href="./5th"><div class="listoverlay"></div></a>
	<span class="listtitle">5th Dimension</span>
	</div>
	
	
	<span class="yearheader" id="year2012">2012</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/bokusen_event.jpg')">
	<div class="listoverlay"></div>
	<span class="listtitle">Bokura no Century</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/saraba_regular.jpg')">
	<a href="./saraba"><div class="listoverlay"></div></a>
	<span class="listtitle">Saraba, Itoshiki Kanashimi-tachi yo</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/egaohyakkei_regular.jpg')">
	<a href="./egaohyakkei"><div class="listoverlay"></div></a>
	<span class="listtitle">Nippon Egao Hyakkei</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/otomesensou_regular.jpg')">
	<a href="./otomesensou"><div class="listoverlay"></div></a>
	<span class="listtitle">Otome Sensou</span>
	</div>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/allstars_regular.jpg')">
	<a href="./allstars"><div class="listoverlay"></div></a>
	<span class="listtitle">Momoclo★Allstars 2012</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/mouretsu_regular.jpg')">
	<a href="./mouretsu"><div class="listoverlay"></div></a>
	<span class="listtitle" style="margin-top:-52px">Mouretsu Uchuu Koukyoukyoku Dai Nana Gakushou "Mugen no Ai"</span>
	</div>
	
	
	<span class="yearheader" id="year2011">2011</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/shiroikaze_event.jpg')">
	<a href="./shiroikaze"><div class="listoverlay"></div></a>
	<span class="listtitle">Shiroi Kaze</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/roudou_regular.jpg')">
	<a href="./roudou"><div class="listoverlay"></div></a>
	<span class="listtitle">Roudou Sanka</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/djun_regular.jpg')">
	<a href="./djun"><div class="listoverlay"></div></a>
	<span class="listtitle">D' no Junjou</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/zdensetsu_regular.jpg')">
	<a href="./zdensetsu"><div class="listoverlay"></div></a>
	<span class="listtitle">Z Densetsu ~Owarinaki Kakumei~</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/bar_limitedA.jpg')">
	<a href="./bar"><div class="listoverlay"></div></a>
	<span class="listtitle">Battle and Romance</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/akarin_event.jpg')">
	<a href="./akarin"><div class="listoverlay"></div></a>
	<span class="listtitle">Akarin he Okuru Uta</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/miraibowl_limitedA.jpg')">
	<a href="./miraibowl"><div class="listoverlay"></div></a>
	<span class="listtitle">Mirai Bowl/Chai Maxx</span>
	</div>
	
	
	<span class="yearheader" id="year2010">2010</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/momokuri_event.jpg')">
	<a href="./momokuri"><div class="listoverlay"></div></a>
	<span class="listtitle">Momokuri</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/pinkyjones_limitedA.jpg')">
	<a href="./pinkyjones"><div class="listoverlay"></div></a>
	<span class="listtitle">Pinky Jones</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/kaitou_regular.jpg')">
	<a href="./kaitou"><div class="listoverlay"></div></a>
	<span class="listtitle">Ikuze! Kaitou Shoujo</span>
	</div>
	
	
	<span class="yearheader" id="year2009">2009</span>
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/miraihesusume_regular.jpg')">
	<a href="./miraihesusume"><div class="listoverlay"></div></a>
	<span class="listtitle">Mirai he Susume!</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('/momoclo/albums/Album%20Art/momopan_regular.jpg')">
	<a href="./momopan"><div class="listoverlay"></div></a>
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
// Store all columns as arrays from album tables
$info = $link->query("SELECT albuminfo.url, releaseDate, englishTitle, romajiTitle, japaneseTitle FROM albuminfo
INNER JOIN albumlist 
ON albuminfo.url=albumlist.url
ORDER BY releaseDate ASC")->fetch_all(MYSQLI_ASSOC);
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
	
	echo "\t<td><a href='./" . $urlList[$i] . "'>" . $englishList[$i] . "</a></td>";
	echo "\t<td><a href='./" . $urlList[$i] . "'>" . $romajiList[$i] . "</a></td>";
	echo "\t<td><a href='./" . $urlList[$i] . "'>" . $japaneseList[$i] . "</a></td>";
	
	echo "\t<td>" . $dateList[$i] . "</td>";
	echo "</tr>";
}

?>

</tbody> 
</table> 

</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/socialmedia.html"); ?>

</body>

</html>