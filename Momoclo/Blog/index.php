<!DOCTYPE html>
<html lang="en" class="momoclo">
<head>

<title>Momoiro Clover Z Blog Translations</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
$memberView = $_GET['member'];  // Switch to page view if member parameter not empty

$postLimit = 4;
?>

</head>

<body>

<?php include("header.php"); 
include ("{$_SERVER['DOCUMENT_ROOT']}/momoclo/tablist.php");

// Get list of links to blog posts
$query = "SELECT url, timePosted, title, external FROM momoblog WHERE member=? ORDER BY timePosted DESC";
if(empty($memberView)){
	$query .= " LIMIT {$postLimit}";
}

$getPostsStmt = $link->prepare($query);

/**
 * Prints links to blogs as list items, with timestamp.
 */
function printBlogs($stmt, $member, $printAll){
	$stmt->bind_param("s", $member);
	$stmt->execute();
	$postInfo = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	
	echo "<ul>\n";
	
	for($rowNum = 0; $rowNum < count($postInfo); $rowNum++){
		
		// Get url and pagetitle from DB if external link
		if($postInfo[$rowNum]['external']){
			$url = $postInfo[$rowNum]['url'];
			$pageTitle = $postInfo[$rowNum]['title'];
		}
		else{
			$url = "./{$member}-sd/{$postInfo[$rowNum]['url']}";
			
			$file = @fopen( "./{$member}-sd/{$postInfo[$rowNum]['url']}.html", "r" );
			if(!$file){
				continue;
			}
			$pageTitle = str_replace(array("\n", "\r"), '', fgets($file)); // First line of file is page title, strip newline
		}
		
		echo "\t\t<li><a href='{$url}'>{$pageTitle}</a></li>\n\t\t\t<time>{$postInfo[$rowNum]['timePosted']}</time>\n";
	}
	
	echo "</ul>\n";
	
	if(!$printAll){
		echo "<a class='button' href='./?member={$member}'>View all posts</a>\n";
	}
}	
 ?>

<div class="content">

<?php 
$blogTitles = array(
	'momota' => "<span class=\"kanako\">Momota Kanako</span> Blog - Forehead-chan's Diary",
	'tamai' => "<span class=\"shiori\">Tamai Shiori</span> Blog - A Happy Shiorin Life",
	'sasaki' => "<span class=\"aarin\">Sasaki Ayaka</span> Blog - A-rin's Cheeks♡",
	'ariyasu' => "<span class=\"momoka\">Ariyasu Momoka</span> Blog - MomoPower Charging Station",
	'takagi' => "<span class=\"reni\">Takagi Reni</span> Blog - Electric Everyday");

// Print general view if member parameter (for pagination) not given
if(empty($memberView)){
	echo "<h2>{$blogTitles['momota']}</h2>\n";
	printBlogs($getPostsStmt, 'momota', 0);

	echo "<h2>{$blogTitles['tamai']}</h2>\n";
	printBlogs($getPostsStmt, 'tamai', 0);

	echo "<h2>{$blogTitles['sasaki']}</h2>\n";
	printBlogs($getPostsStmt, 'sasaki', 0);

	echo "<h2>{$blogTitles['ariyasu']}</h2>\n";
	printBlogs($getPostsStmt, 'ariyasu', 0);

	echo "<h2>{$blogTitles['takagi']}</h2>\n";
	printBlogs($getPostsStmt, 'takagi', 0); 
}
else{
	echo "<h2>{$blogTitles["$memberView"]}</h2>\n";
	printBlogs($getPostsStmt, "$memberView", 1);
}

?>

</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/socialmedia.html"); ?>

</body>

</html>