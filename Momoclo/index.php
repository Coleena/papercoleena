<!DOCTYPE html>
<html class="momoclo">
<head>

<title>Coleena's Momoiro Clover Z Lyrics Translations</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php' ?>
<link rel="stylesheet" type="text/css" href="./sorterstyle.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:800|Titan+One" rel="stylesheet">
<script type="text/javascript" src="./jquery.tablesorter.js"></script> 

<script type="text/javascript">
$(document).ready(function() { 
	$(".tablesorter").tablesorter({ 
		sortList: [[3,1]]
    }); 
	
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

<div class="content">

<div class="settingslist">
<button class="active" id="albumon">Album View</button>
<button id="liston">List View</button>
<div class="albumview">Jump to Year: 
<button id="to2009">2009</button><button id="to2010">2010</button><button id="to2011">2011</button><button id="to2012">2012</button><button id="to2013">2013</button><button id="to2014">2014</button><button id="to2015">2015</button><button id="to2016">2016</button></div>
</div>

<div class="wrapping albumview">
	<span class="yearheader" id="year2016">2016</span>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/goldhist_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./goldhist">The Golden History</a></li>
		<li>Decoration</li>
		<li>Fireworks</li>
		<li>Make It or Break It</li>
	</ol></div>
	
	<span class="listtitle">The Golden History</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/newmoon_momoclo.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>In Love with the New Moon</li>
		<li>Only Eternity Bridges Our Distance</li>
	</ol></div>
	
	<span class="listtitle">New Moon ni Koishite</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/yoake_limited.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>The Individual A, The Z of Beginning -prologue-</li>
		<li>The Peach Blossom Spring</li>
		<li><a href="./yoake">Platinum Daybreak</a></li>
		<li>Mahorovacation</li>
		<li><a href="./ukiyo">Bloom Within this Transient Dream World</a></li> 
		<li>Rock the Boat</li>
		<li>Where Hope Lies</li>
		<li>Country Roads -Wayfarers of Time-</li>
		<li>Imagination</li>
		<li><a href="./moonpride">Moon Pride</a></li>
		<li>Our "Z" Pledge (Pledge of "Z")</li>
		<li>Those Who Carry On Love</li>
		<li>We All Become Peach-Black</li>
		<li>Pink Skies</li>
	</ol></div>
	
	<span class="listtitle">Hakkin no Yoake</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/amaranthus_limited.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Embryo -Prologue-</li>
		<li><a href="./wab">We Are Born</a></li>
		<li>Monochrome Sketch </li>
		<li>Gorilla Punch </li>
		<li><a href="./buryoutougen">A Utopian Get-Along Story</a></li>
		<li>To You</li>
		<li>Our Youth</li>
		<li>A Cactus and Ribbon</li>
		<li>Demonstration</li>
		<li>Chinese Hibiscus</li>
		<li><a href="./naitemo">It's Okay to Cry</a></li>
		<li>Guns N' Diamond</li>
		<li>Say Farewell with a Bye-Bye</li>
		<li>HAPPY Re:BIRTHDAY</li>
	</ol></div>
	
	<span class="listtitle">AMARANTHUS</span>
	</div>
	
	<span class="yearheader" id="year2015">2015</span>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/koyoi_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Tonight, Under this Live</li>
	</ol></div>
	
	<span class="listtitle">Koyoi, Live no Shita de</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/znochikai_f.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Our "Z" Pledge (Pledge of "Z")</li>
		<li>Romantic Tangle-Ups</li>
		<li>CHA-LA HEAD-CHA-LA</li>
	</ol></div>
	
	<span class="listtitle">"Z" no Chikai</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/seishunfu_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Our Youth</li> 
		<li><a href="./hashire_z">Run! -Z ver.-</a></li>
		<li>Leaving Spring, Coming Spring</li>
		<li><a href="./linklink">Link Link</a></li>
	</ol></div>
	
	<span class="listtitle">Seishunfu</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/ukiyo_momoclo.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./ukiyo">Bloom Within this Transient Dream World</a></li>
		<li>Rock and Roll All Nite</li>
		<li>SAMURAI SON</li>
	</ol></div>
	
	<span class="listtitle">Yume no Ukiyo ni Saitemina</span>
	</div>
	
	
	<span class="yearheader" id="year2014">2014</span>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/hitotsubu_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>With a Drop of a Smile</li>
		<li>Chai Maxx Zero</li>
		<li>STOp THESe FINGERs</li>
	</ol></div>
	
	<span class="listtitle">Hitotsubu no Egao de... / Chai Maxx Zero</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/moonpride_momoclo.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./moonpride">Moon Pride</a></li>
		<li>Moonbow</li>
		<li>Moon Revenge</li>
	</ol></div>
	
	<span class="listtitle">Moon Pride</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/naitemo_limited.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./naitemo">It's Okay to Cry</a></li>
		<li>Grand Peace Declaration</li>
		<li>My Dear Fellow</li>
	</ol></div>
	
	<span class="listtitle">Naitemo Iindayo</span>
	</div>
	
	
	<span class="yearheader" id="year2013">2013</span>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/naifuyu_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Tearful Winter</li>
		<li>Steel Will</li>
	</ol></div>
	
	<span class="listtitle">Naichaisou Fuyu / Hagane no Ishi</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/gounn_limited.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>The Five Skandhas</li>
		<li>Someday, You Will</li>
		<li>Momoiro Taiko Do-don-ga Song</li>
	</ol></div>
	
	<span class="listtitle">GOUNN</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/iriguchi_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./anosora">Towards Those Skies</a></li>
		<li><a href="./milkyway">Milky Way</a></li>
		<li><a href="./roughstyle">Rough Style</a></li>
		<li><a href="./momopan">Peach-Pink Punch</a></li>
		<li>Love You!!</li> 
		<li>Dream Wave</li>
		<li>Hello... goodbye</li>
		<li><a href="./supergirl">Feeling like a Super Girl!</a></li>
		<li><a href="./pareparade">Strongest Para-Parade</a></li>
		<li><a href="./miraihesusume">Advance Towards the Future!</a></li>
		<li><a href="./tsuyoku">Strongly, Strongly</a></li>
		<li><a href="./words">words of the mind -brand new journey-</a></li>
		<li><a href="./believe">Believe</a></li>
		<li><a href="./hashire">Run!</a></li>
		<li><a href="./kimiyuki">The Snow and You</a></li>
		<li><a href="./roughstyle_z">Rough Style for Momoiro Clover Z</a></li>
		<li><a href="./anosora_z">Towards Those Skies (Z ver.)</a></li>
	</ol></div>
	
	<span class="listtitle">Iriguchi no Nai Deguchi</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/5th_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./neostar">Neo Stargate</a></li>
		<li>Imaginary Dystopia</li>
		<li><a href="./mouretsu">Bodacious Space Symphony, Movement Seven: "Infinite Love"</a></li>
		<li>5 the Power</li>
		<li><a href="./roudou">Labor Anthem</a></li>
		<li>Get Down!</li>
		<li><a href="./otomesensou">GirlZ' War</a></li>
		<li>The Moon and an Aluminum Foil Airship</li>
		<li>Birth Ø Birth</li>
		<li>Journey to the Earth -Carpe diem-</li>
		<li>Fly through Space! Tatami-Room Train </li>
		<li><a href="./saraba">Farewell, My Dear Sorrows</a></li>
		<li>Ash and Diamond </li>
	</ol></div>
	
	<span class="listtitle">5th Dimension</span>
	</div>
	
	
	<span class="yearheader" id="year2012">2012</span>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/bokusen_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li>Our Century</li>
		<li>The Sky's Curtain</li>
	</ol></div>
	
	<span class="listtitle">Bokura no Century</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/saraba_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./saraba">Farewell, My Dear Sorrows</a></li>
		<li><a href="./kuroshuu">Black Weekend</a></li>
		<li><a href="./wtwt">Wee-Tee-Wee-Tee</a></li>
	</ol></div>
	
	<span class="listtitle">Saraba, Itoshiki Kanashimi-tachi yo</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/egaohyakkei_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./egaohyakkei">Japan's Hundred Smiles</a></li>
		<li>It's Morifu! Everyone Gather</li>
		<li>Better is the Best </li>
	</ol></div>
	
	<span class="listtitle">Nippon Egao Hyakkei</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/otomesensou_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./otomesensou">Otome Sensou</a></li>
		<li><a href="./push">Push</a></li>
		<li><a href="./mitemite">Look Look☆Over Here</a></li>
	</ol></div>
	
	<span class="listtitle">Otome Sensou</span>
	</div>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/allstars_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./lalala">Seashore Lalala</a></li>
		<li><a href="./namidame">Teary-Eyed Alice</a></li>
		<li><a href="./hankouki">Ahrin's in Her Rebellious Phase!</a></li>
		<li>Education</li>
		<li><a href="./tappizaki">Tsugaru Peninsula's Tappizaki Cape</a></li>
		<li><a href="./singlebed">A Single Bed is Too Small</a></li>
		<li><a href="./osaretai">The Group Less Supported by the Company</a></li>
	</ol></div>
	
	<span class="listtitle">Momoclo★Allstars 2012</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/mouretsu_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./mouretsu">Bodacious Space Symphony, Movement Seven: "Infinite Love"</a></li>
		<li><a href="./lostchild">Lost Child</a></li>
		<li><a href="./dna">DNA Rhapsody</a></li>
	</ol></div>
	
	<span class="listtitle" style="margin-top:-52px">Mouretsu Uchuu Koukyoukyoku Dai Nana Gakushou "Mugen no Ai"</span>
	</div>
	
	
	<span class="yearheader" id="year2011">2011</span>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/shiroikaze_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./shiroikaze">Pure-White Wind</a></li>
		<li>We are UFI!!!!</li>
	</ol></div>
	
	<span class="listtitle">Shiroi Kaze</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/roudou_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./roudou">Labor Anthem</a></li>
		<li><a href="./santasan">Mr. Santa</a></li>
		<li><a href="./bc">Bionic Cherry</a></li>
	</ol></div>
	
	<span class="listtitle">Roudou Sanka</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/djun_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./djun">The Innocence of D'</a></li>
	</ol></div>
	
	<span class="listtitle">D' no Junjou</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/zdensetsu_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./zdensetsu">Z Legend ~Unending Revolution~</a></li>
	</ol></div>
	
	<span class="listtitle">Z Densetsu ~Owarinaki Kakumei~</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/bar_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./zdensetsu">Z Legend ~Unending Revolution~</a></li>
		<li><a href="./contradiction">Contradiction</a></li>
		<li><a href="./miraibowl_z">Future Bowl</a></li>
		<li><a href="./wanishan">Alligators and Shampoo </a></li>
		<li><a href="./pinkyjones_z">Pinky Jones</a></li>
		<li><a href="./kiminoato">Remnants of You</a></li>
		<li><a href="./djun">The Innocence of D'</a></li>
		<li><a href="./ametaji">Ame no Tajikarao</a></li>
		<li><a href="./orangenote">Orange Notebook</a></li>
		<li><a href="./kaitou_z">Here We Go! Phantom Thief Girls </a></li>
		<li><a href="./stardust">Stardust Serenade</a></li>
		<li><a href="./konouta">This Song</a></li>
		<li><a href="./nipponbanzai">Momoclo's Japan Banzai!</a></li>
	</ol><ol class="tracklist">Bonus:
		<li><a href="./taieku">The Sun and Dimples</a></li>
		<li><a href="./fallintome">fall into me</a></li>
		<li>...is this Love?</li>
		<li><a href="./dateari">'cause I'm Ahrin☆</a></li>
		<li><a href="./aripre">Thank-You Present</a></li>
		<li><a href="./onidaiko">Love is a Raging Demon Drum</a></li>
	</ol></div>
	
	<span class="listtitle">Battle and Romance</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/akarin_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./dekomayu">ForeheadEyebrow: The Final Flaming Showdown</a></li>
		<li><a href="./akarin">Our Song for Akarin</a></li>
	</ol></div>
	
	<span class="listtitle">Akarin he Okuru Uta</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/miraibowl_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./miraibowl">Future Bowl</a></li>
		<li><a href="./chaima">Chai Maxx</a></li>
		<li><a href="./zenryoku">Full-Power Girl</a></li>
	</ol></div>
	
	<span class="listtitle">Mirai Bowl/Chai Maxx</span>
	</div>
	
	
	<span class="yearheader" id="year2010">2010</span>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/momokuri_event.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./kimiyuki">The Snow and You</a></li>
		<li><a href="./believe">Believe</a></li>
		<li><a href="./words">words of the mind -brand new journey-</a></li>
		<li><a href="./pareparade">Strongest Para-Parade</a></li>
	</ol></div>
	
	<span class="listtitle">Momokuri</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/pinkyjones_limitedA.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./pinkyjones">Pinky Jones</a></li>
		<li><a href="./kokonatsu">Coco☆nuts</a></li>
		<li><a href="./kimiseka">You and the World</a></li>
	</ol></div>
	
	<span class="listtitle">Pinky Jones</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/kaitou_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./kaitou">Here We Go! Phantom Thief Girls</a></li>
		<li><a href="./hashire">Run!</a></li>
	</ol></div>
	
	<span class="listtitle">Ikuze! Kaitou Shoujo</span>
	</div>
	
	
	<span class="yearheader" id="year2009">2009</span>
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/miraihesusume_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./miraihesusume">Advance Towards the Future!</a></li>
		<li><a href="./supergirl">Feeling like a Super Girl!</a></li>
	</ol></div>
	
	<span class="listtitle">Mirai he Susume!</span>
	</div>
	
	
	<div class="listitem" style="background-image: url('albums/Album%20Art/momopan_regular.jpg')">
	<div class="listoverlay"><ol class="tracklist">
		<li><a href="./momopan">Peach-Pink Punch</a></li>
		<li><a href="./milkyway">Milky Way</a></li>
		<li><a href="./roughstyle">Rough Style</a></li>
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
// Store all columns as arrays from lyriclist table
$info = $link->query("select * from lyriclist order by id ASC")->fetch_all(MYSQLI_ASSOC);
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