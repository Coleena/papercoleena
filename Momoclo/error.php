
<title>Oh no!</title>

<script type="text/javascript">
$(document).ready(function(){
	var contentHeight = $("html").height() - $("header").outerHeight();
	$(".content").height(contentHeight);
});
$(window).resize(function(){
    var contentHeight = $("html").height() - $("header").outerHeight();
	$(".content").height(contentHeight);
});
</script>

</head>

<body>

<?php include("header.php"); ?>

<div class="content" style="padding: 0;">
<p style="padding: 7px 15px; font-size: 20px; text-align: center;">Sorry! This page doesn't exist. Try again?</p>
</div>

</body>

</html>