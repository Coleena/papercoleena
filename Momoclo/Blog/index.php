<!DOCTYPE html>
<html lang="en" class="momoclo">
<head>

<title>Momoiro Clover Z Blog Translations</title>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/config.php' ?>

</head>

<body>

<?php include("header.php"); 
include ("{$_SERVER['DOCUMENT_ROOT']}/momoclo/tablist.php");

// Get list of links to blog posts
$getPostsStmt = $link->prepare("SELECT url, timePosted, title, external FROM momoblog WHERE member=? ORDER BY timePosted DESC");

/**
 * Prints links to blogs as list items, with timestamp.
 */
function printBlogs($stmt, $member){
	$stmt->bind_param("s", $member);
	$stmt->execute();
	$postInfo = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	
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
			$pageTitle = fgets($file); // First line of file is page title
		}
		
		echo "\t\t<li><a href='{$url}'>{$pageTitle}</a></li>\n\t\t\t<time>{$postInfo[$rowNum]['timePosted']}</time>\n";
	}
}	
 ?>

<div class="content">
<h2><span class="kanako">Momota Kanako</span> Blog - Forehead-chan's Diary</h2>
<ul>
<?php printBlogs($getPostsStmt, 'momota'); ?>
</ul>

<h2><span class="shiori">Tamai Shiori</span> Blog - A Happy Shiorin Life</h2>
<ul>
<?php printBlogs($getPostsStmt, 'tamai'); ?>
</ul>

<h2><span class="aarin">Sasaki Ayaka</span> Blog - A-rin's Cheeks♡</h2>
<ul>
<?php printBlogs($getPostsStmt, 'sasaki'); ?>
</ul>

<h2><span class="momoka">Ariyasu Momoka</span> Blog - MomoPower Charging Station</h2>
<ul>
<?php printBlogs($getPostsStmt, 'ariyasu'); ?>
</ul>

<h2><span class="reni">Takagi Reni</span> Blog - Electric Everyday</h2>
<ul>
<?php printBlogs($getPostsStmt, 'takagi'); ?>
</ul>

</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/socialmedia.html"); ?>

</body>

</html>