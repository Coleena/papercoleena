<?php 
/**
 * To be included in other files. Chooses which tab to select based on the current directory.
 */
// Get the name of the directory of the main script
$currDir = basename(getcwd()) ?>

<script>
var currDir = "<?php echo $currDir ?>";
var rectangle = '<div id="rectangle"></div>';
$(document).ready(function() {
	if(currDir === "momoclo"){
		$('.headtablist a[href="/momoclo/"] .tab').addClass("active").prepend(rectangle);
	}
	else if(currDir === "albums"){
		$('.headtablist a[href="/momoclo/albums/"] .tab').addClass("active").prepend(rectangle);
	}
	else if(currDir === "blog"){
		$('.headtablist a[href="/momoclo/blog/"] .tab').addClass("active").prepend(rectangle);
	}
	else if(currDir === "info"){
		$('.headtablist a[href="/momoclo/info/"] .tab').addClass("active").prepend(rectangle);
	}
});
</script>

<div class="headtablist">
<a href="/momoclo/"><div class="tab">Lyrics</div></a><!--
!--><a href="/momoclo/albums/"><div class="tab">Albums</div></a><!--
!--><a href="/momoclo/blog/"><div class="tab">Blog Posts</div></a><!--
!--><a href="/momoclo/info/"><div class="tab">Info</div></a>
</div>