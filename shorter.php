<?php
	error_reporting(0);
	include('include/short_link.php');
?>
<!DOCTYPE html>
<html>
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
<head>
<?php
echo '
<div class="app-bar darcula">
    <a class="app-bar-element" href="/"><img src="logo.png"/></a>
</div>

<br><br><br>

	<div class="window">
				<div class="window-caption">
					<span class="window-caption-icon"><span class="mif-link"></span></span>
					<span class="window-caption-title">Short Link</span>
				</div>
				<div class="margin20 no-margin-left no-margin-right sub-header text-light window-content" style="auto">
				Dansyu.tk short link is free short link hosting for shorting your link and share it to easy way!<br><br>
				<center>
				<b>URL :</b>
				<form method="post" enctype="multipart/form-data" action="">
				<div class="input-control text full-size" data-role="input">
					<input type="text" name="url" id="url" placeholder="http://www.Dansyu.tk/download.php?link=senpai">
					<button class="button helper-button clear"><span class="mif-cross"></span></button>
				</div>
				<input type="submit" name="btnShort" class="button success" value="Shrink!"/>
				</form>
            </div>
		</div>

<br><br><br>
		
	</div>
';
?>
</head>
<footer>
	<?php
		include("include/footer.php");
	?>
</footer>