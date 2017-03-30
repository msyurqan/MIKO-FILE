<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Vaxza Homepage">
    <meta name="keywords" content="ACPB, Pascaline, Mad Father, Misfortune Melody, Software, Technology">
    <meta name="author" content="Dani Pragustia">
	
	<title>Store - Dansyu.tk</title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">
	<link href="css/docs.css" rel="stylesheet">
	
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
	<script src="js/ga.js"></script>

<style>

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#file_content {
  display: none;
}

</style>

</head>
<?php
	$error = 1;
	error_reporting(0);
	include('include/header_store.php');

	if ($_GET[product]==madfather)
	{
		include('store/mad-father.php');
		$error = 0;
	}
	if ($_GET[product]==vaxzaacpb)
	{
		include('store/vaxza-acpb.php');
		$error = 0;
	}
	if ($_GET[product]==pascaline)
	{
		include('store/pascaline.php');
		$error = 0;
	}
	if ($_GET[product]==misao)
	{
		include('store/misao.php');
		$error = 0;
	}
	if ($_GET[product]==misfortune)
	{
		include('store/misfortune.php');
		$error = 0;
	}
	if ($error==1) {
		echo '
		<div class="container page-content">
		<img src="store\images\not-found.png"/>
			<h1 class="text-light">We are sorry!</h1>
				<div class="text-light">
					Page you looking for not found. If you sure this page is avaliable on the moment, please send us mail at <a href="mailto:syscrape@gmail.com">syscrape@gmail.com</a>
				</div>
		</div>
		<br><br><br><br><br><br>
		<footer>';
			include('include\footer.php');
		echo '</footer>';
	}
?>
