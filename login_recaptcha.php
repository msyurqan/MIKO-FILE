<?php
error_reporting(0);
	session_start();
		if (isset($_SESSION['username'])) {
		header('location:index.php'); }
		require_once("include/connection.php");
		include('include/login_process.php');
	$retry = $_SESSION['x-security'];
	$capcay="false";
	if (!$_SESSION['x-security']) {
		$_SESSION['x-security'] = 1;
	} else {
	$retry++;
	$_SESSION['x-security'] = $retry;
	}
	if ($_SESSION['x-security']>"4") {
		$capcay="true";
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
	
	<title>Login - Mikofile.tk</title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php
	include('include/header.php');
?>
<br />
<br />
	<div class="container page-content">
		<div class="window">
            <div class="window-caption">
                    <span><h2>  Login</h2></span>
            </div>
            <div class="padding10 margin20 no-margin-left no-margin-right sub-header text-light window-content">
			<form method="post" enctype="multipart/form-data" action="">
            <div class="input-control text full-size" data-role="input">
				<input type="text" name="username" id="username" placeholder="Username">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <input type="password" name="password" id="password" placeholder="Password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
			<?php if($capcay=="true") {
				echo '<div class="g-recaptcha" data-sitekey="6LdzbygTAAAAAD_I4BGWhq4dtGeLAG8HsVaF360K"></div>';
			}
			?>
			<br>
			<br>
                <input type="submit" name="btnLogin" class="button success" value="Login"/>
				<br>
				<br>
			</form>
				Don't have account? <a href="/register">Register Now!</a>
        </div>
	</div>
	
        <footer>
            <div class="bottom-menu-wrapper">
                <ul class="horizontal-menu compact">
                    <li><a>&copy; 2016 Dani Pragustia</a></li>
                    <li class="place-right"><a href="#">Feedback</a></li>
                    <li class="place-right"><a href="#">TOS</a></li>
                    <li class="place-right"><a href="#">Privacy</a></li>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>
