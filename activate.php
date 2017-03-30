<?php
	error_reporting(0);
	session_start();
	
	if(!isset($_SESSION['username'])) {
	header('location:/');
	}
	
	$usr = $_SESSION['username'];
	require_once("include\connection.php");
	
	$query = mysql_query("SELECT * FROM user WHERE username = '$usr'");
	$hasil = mysql_fetch_assoc($query);
	If(!$_GET[token]) {
	
	$too = "noreply@vaxza.comli.com":
	$subject = "Activation your account - Dansyu.tk";
	$message = '<h1>One step to activate your account</h1><br><a href="http://www.vaxza.comli.com/activate.php?token=$acc>Click Here</a> to activate your acoount':
	$user_email = $hasil['email']; // valid POST email address

	$headers  = "From: $user_email\r\n";
	$headers .= "Reply-To: $too\r\n";
	$headers .= "Return-Path: $too\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion(). "\r\n";
	$headers .= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; UTF-8' . "\r\n";
 
	if(mail($too,$subject,$message,$headers)) echo '<center>We send you confirmation mail, Please check your inbox<br><a href="\">Click here</a> to back to main page</center>';  
	
	} else {
		$token = $hasil['activate'];
		if ($_GET[token]==$token) {
			$result = mysql_query('UPDATE user SET status="1" WHERE username="'.$usr.'"');
			echo '<center>Thank you for activation your account!<br><a href="\">Click here</a> to back to main page</center>';
		}
	}
	
?>
