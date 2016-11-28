<!DOCTYPE html>
<html>

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
	$stmt = $link->prepare("select url from misclyriclist where misclyriclist.url = ?");
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
$currentSong = $link->query("select * from misclyrics, misclyriclist where misclyrics.url = misclyriclist.url and misclyrics.url = '" . $url . "'")->fetch_array();

$englishTitle = $currentSong{'englishTitle'};
$romajiTitle = $currentSong{'romajiTitle'};
$japaneseTitle = $currentSong{'japaneseTitle'};
$artist = $currentSong{'artistName'};

$composer = $currentSong{'composer'};
$lyricist = $currentSong{'lyricist'};
$arrangement = $currentSong{'arrangement'};


?>

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

<div class="content2">
<h1><?php echo $englishTitle; ?></h1> 
<?php 
if($englishTitle != $romajiTitle){
	echo "<h2 class='romajipreference'>(" . $romajiTitle . ")</h2>"; 
}
echo "<h2 class='japanesepreference'>(" . $japaneseTitle . ")</h2>"; 
?>

<div id="videoembedbox">
<?php include("./Text/" . $url . "_embed.html"); ?>
</div>

<div id="infobox">

<table class="infotable">
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
<tr>
	<th>Artist:</th>
	<td><?php echo $artist; ?></td>
</tr>
<?php
if(!is_null($arrangement)){
	echo "<tr style=\"height: 46px;\">\n\t<th>Original Title:</th>\n\t<td>" . $japaneseTitle . "</td>\n</tr>";
}
else{
	echo "<tr>\n\t<th>Original Title:</th>\n\t<td>" . $japaneseTitle . "</td>\n</tr>";
}
?>

</tbody>
</table>

</div>

<div id="lyriccontainer">
<table class="lyrictable hiddenjapanese" id="japanesetable">
<?php include "./Text/" . $url . "_j.html" ?>
</table><table class="lyrictable romaji" id="romajitable">
<?php include "./Text/" . $url . "_r.html" ?>
</table><table class="lyrictable" id="englishtable">
<?php include "./Text/" . $url . "_e.html" ?>
</table>
</div>

</div>


</body>


</html>