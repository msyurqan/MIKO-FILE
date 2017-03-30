<?php
error_reporting(0);
session_start();
if(isset($_SESSION['username'])) {
header('location:upload.php');
}
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
	
	<title>Register - Dansyu.tk</title>
	
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
	include('include\header.php');
?>
		<div class="padding20 page-content">
			<center>
			<h1 class="text-light">One more step!</h1><br /><br />
			We need verity your mail is valid, please check your mail to get code to activate<br>
			If you doesn't receive mail click <a href="">Resend mail</a>.<br>
			You can do it later, <b>please be sure your activate before 7 days registration or your account will be deleted<b><br><br><br>
			<a href="account.php"><button class="button warning">Go To Account Setup</button></a>
			</center>
		</div>
</body>
</html>