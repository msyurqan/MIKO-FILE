<?php
	include('gateway.php');
	require_once("include/connection.php");
	$meta_link = $_GET['link'];
	$linkdata = mysql_query("SELECT * FROM short_link WHERE link = '$meta_link'");
	$meta = mysql_fetch_assoc($linkdata);
	
	if (mysql_num_rows($linkdata) > 0) {
		// Its Okay ;-)
	} else {
		header('location:error_404.html');
	}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Vaxza Homepage">
    <meta name="keywords" content="ACPB, Pascaline, Mad Father, Misfortune Melody, Software, Technology">
    <meta name="author" content="Dani Pragustia">
	
	<title>Dansyu.tk - Free File Hosting</title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
</head>
<body>
<?php
	include('include/header.php');
echo '
	<div class="container page-content">
		<h1 class="text-light">Share It!</h1>
			Shorting is complete, now your can share link<br>
			<br><br><br>
			<center>
				Your link is ready to share:<br>
				<a href="http://www.Dansyu.tk/short.php?u='.$meta_link.'">http://www.Dansyu.tk/short.php?u='.$meta_link.'</a>
			</center>
			<h2 class="text-light">Share to:</h2>
			MyBB Forum :
			<div class="input-control text">
				<input type="text" readonly value="[link]http://www.Dansyu.tk/short.php?u='.$meta_link.'[/link]">
			</div>
			<h2 class="text-light">Share link to Social:</h2>
			<button class="shortcut-button bg-blue bg-active-darkBlue fg-white">
				<span class="icon mif-facebook"></span>
				<span class="title">Facebook</span>
			</button>
			<button class="shortcut-button bg-cyan bg-active-darkBlue fg-white">
				<span class="icon mif-twitter"></span>
				<span class="title">Twitter</span>
			</button>
	</div>
';
?>
</body>