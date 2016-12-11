<!DOCTYPE html>
<html lang="en">
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php //error if no song exists
	require_once realpath(__DIR__.'/..').'/config.php';
	$url = $_GET['song'];
	
	// Sanitize input by checking against file existence before going to SQL
	if(!file_exists("./Text/" . $url . "_e.html")){
		include("error.php");
		exit;
	}

	// Extra sanitizer
	$stmt = $link->prepare("select url from vocalyriclist where vocalyriclist.url = ?");
	$stmt->bind_param("s", $url);
	$stmt->execute();
	
	$res = $stmt->get_result();
	$stmt->close();
	
	if( is_null( $res->fetch_array() ) ){
		include("error.php");
		exit;
	}
?>
<?php 

$currentSong = $link->query("select * from vocalyrics, vocalyriclist where vocalyrics.url = vocalyriclist.url and vocalyrics.url = '" . $url . "'")->fetch_array();

$englishTitle = $currentSong{'englishTitle'};
$romajiTitle = $currentSong{'romajiTitle'};
$japaneseTitle = $currentSong{'japaneseTitle'};

$vocals = $currentSong{'vocals'};
$composer = $currentSong{'composer'};
$lyricist = $currentSong{'lyricist'};
$arrangement = $currentSong{'arrangement'};
$illustration = $currentSong{'illustration'};
$video = $currentSong{'video'};

?>
<meta name="description" content="<?php 
$engText = file_get_contents("./Text/" . $url . "_e.html"); 
echo substr(strip_tags(str_replace(array("<br/>","English","\n","\r","\t","    "),array(".","English Translation.","",""," "," "),$engText)),0,150) . "..." ?>">

<title><?php echo $englishTitle; 
if($englishTitle != $romajiTitle){
	echo " (" . $romajiTitle . ")"; 
}
echo " - Coleena's Translations" ?></title>

<script type="text/javascript">
$(document).ready(function(){
    $('.tablist li a').on('click', function(e){
		var activeVideo; 
		activeVideo = $('.videotab.active iframe').detach();
		$('.videotab.active').append(activeVideo);
        var clickedAttribute = $(this).attr('href');
        $('.tabs ' + clickedAttribute).show().addClass('active').siblings().hide().removeClass('active');
        $(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
	$('.videotab').height($('.videotab.active').width() / 16 * 9);
});
$(window).resize(function(){
	$('.videotab').height($('.videotab.active').width() / 16 * 9);
});
</script>

</head>

<body>

<?php include("header.php"); ?>

<div class="content2" id="vocaloid">
<h1><?php echo $englishTitle; ?></h1> 
<?php 
if($englishTitle != $romajiTitle){
	echo "<h2 class='romajipreference'>(" . $romajiTitle . ")</h2>"; 
}
echo "<h2 class='japanesepreference'>(" . $japaneseTitle . ")</h2>"; 
?>

<div id="videoembedbox">
<?php if(file_exists("./Text/" . $url . "_embed.html")){
	include "./Text/" . $url . "_embed.html";
} ?>
</div>

<div id="infobox">

<table class="infotable">
<tbody>
<tr>
	<th>Vocals:</th>
	<td><?php echo $vocals; ?></td>
</tr>
<tr>
	<th>Composer(s):</th>
	<td><?php echo $composer; ?></td>
</tr>
<tr>
	<th>Lyrics:</th>
	<td><?php echo $lyricist; ?></td>
</tr>
<?php
if(!is_null($arrangement)){
	echo "<tr>\n\t<th>Arrangement:</th>\n\t<td>" . $arrangement . "</td>\n</tr>";
}
?>
</tbody>
</table><table class="infotable">
<tbody>
<?php
if(!is_null($arrangement) && !is_null($illustration)){
	echo "<tr>\n\t<th style='height: 43px'>Illustration:</th>\n\t<td>" . $illustration . "</td>\n</tr>";
}
else{
	if(is_null($illustration)){$illustration = "　";}
	echo "<tr>\n\t<th>Illustration:</th>\n\t<td>" . $illustration . "</td>\n</tr>";
}
?>
<tr>
	<th>Video:</th>
	<td><?php if(is_null($video)){$video = "　";}; echo $video; ?></td>
</tr>
<?php
if(!is_null($arrangement) && is_null($illustration)){
	echo "<tr>\n\t<th style='height: 43px'>Original Title:</th>\n\t<td>" . $japaneseTitle . "</td>\n</tr>";
}
else{
	if(is_null($japaneseTitle)){$japaneseTitle = "　";}
	echo "<tr>\n\t<th>Original Title:</th>\n\t<td>" . $japaneseTitle . "</td>\n</tr>";
}
?>
</tbody>
</table>

</div>

<div id="lyriccontainer">
<table class="lyrictable hiddenjapanese" id="japanesetable"><?php if(file_exists("./Text/{$url}_j.html")){
	include "./Text/{$url}_j.html";
} ?>
</table><table class="lyrictable romaji" id="romajitable">
<?php include "./Text/{$url}_r.html" ?>
</table><table class="lyrictable" id="englishtable">
<?php include "./Text/{$url}_e.html" ?>
</table>
</div>

</div>


</body>


</html>