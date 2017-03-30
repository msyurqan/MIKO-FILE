<?php
// include('gateway.php');
error_reporting(0);
session_start();
include('include/register_user.php');
if(isset($_SESSION['username'])) {
header('location:/index.php'); }
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
	
	<title>Register - Mikofile.tk</title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
	
	<script>
		function notifyOnErrorInput(input){
			var message = input.data('validateHint');
			$.Notify({
				caption: 'Error',
				content: message,
				type: 'alert'
=			});
		}
	</script>

</head>
<body>
<body>
<?php
	include('include/header.php');
?>
		<div class="login-form padding20 block-shadow padding10">
        <form method="post" enctype="multipart/form-data" action="">
            <h1 class="text-light">Registration</h1>
            <br />
			<div class="input-control text full-size" data-role="input">
                <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
				<button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
			<div class="input-control password full-size" data-role="input">
                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
				<button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
			    <div class="input-control text full-size" data-role="input">
					<input type="text" name="address" id="address" placeholder="Email" autocomplete="off">
					<button class="button helper-button clear"><span class="mif-cross"></span>
                </div>
            <br />
			<br />
			<label class="input-control checkbox">
				<input type="checkbox">
				<span class="check"></span>
				<span class="caption">I am agree if Admin more handsome than me</span>
			</label>
            <br />
            <br />
            <div class="form-actions">
			<center>
                <button type="submit" class="button primary">Register</button>
				<br />
				Aleardy have account? <a href="login.php">Login now!</a>
			</center>
            </div>
			</div>
</body>
        <footer>
            <div class="bottom-menu-wrapper">
                <ul class="horizontal-menu compact">
                    <li><a>&copy; 2016 Dani Pragustia</a></li>
                    <li class="place-right"><a href="feedback.html">Feedback</a></li>
                    <li class="place-right"><a href="tos.html">TOS</a></li>
                    <li class="place-right"><a href="privacy.html">Privacy</a></li>
                </ul>
            </div>
        </footer>
</html>