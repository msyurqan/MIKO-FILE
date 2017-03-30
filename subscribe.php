<?php
require_once("include/connection.php");
include('gateway.php');
session_start();
if(!isset($_POST['email'])) {
header('location:/index.php'); }
$usr = $_POST['email'];
$IsAvaliable = mysql_query("SELECT * FROM subscribe WHERE email = '$usr'");
if(mysql_num_rows($IsAvaliable) <> 0) {
echo "You aleardy subscribe!";
} else {
	$simpan = mysql_query("INSERT INTO subscribe(email,level) VALUES('$usr',0)");
	
	if($simpan) {
		echo "<center>Thank you for subcribe~!<br>Click ";
		echo '<a href="\">This</a> link to back to main page';
	} else {
		echo "Error while subcribe you email!";
	}
}
?>