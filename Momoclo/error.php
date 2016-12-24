
<title>Oh no!</title>

</head>

<body>

<?php 
include("header.php"); 
header("HTTP/1.0 404 Not Found");
include ("{$_SERVER['DOCUMENT_ROOT']}/momoclo/tablist.php") ?>

<div class="content">
<p style="padding: 7px 15px; font-size: 20px; text-align: center;">Sorry! This page doesn't exist. Try again?</p>
</div>

</body>

</html>