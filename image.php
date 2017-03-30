<?php
// include('gateway.php');
error_reporting(0);
session_start();
require_once("include/connection.php");
include('include/file_function.php');
$linkdown = $_GET['pic'];
$linkdata = mysql_query("SELECT * FROM files WHERE downloadlink = '$linkdown'");
$meta = mysql_fetch_assoc($linkdata);
if (mysql_num_rows($linkdata) > 0) {
	$file_size = $meta['size'];
	$user_owner = $meta['ownerfile'];
	$file_name = $meta['filename'];
	$date_created = $meta['datecreated'];
	$source_file = $meta['source'];
	$link_file = "download/$file_name";
	$getuser = mysql_query("SELECT * FROM user WHERE username = '$user_owner'");
	if (mysql_num_rows($getuser) > 0) {
		$userprofile = $getuser['urlprofile'];
	}
} else {
	header('location:error_404.html');
}
echo '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Dansyu.tk - '.$file_name.'</title>
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">
</head>
<body class="bg-dark">
	<center>
		<img src="download/'.$source_file.'" /><br><br>
		<font color="white">
		<span class="mif-copyright mif-lg"></span> This file is copyright by '.$user_owner.'. License or Copyright is protected by File Owner<br><br>
		</font>
		<a href="download.php?link='.$linkdown.'"><input type="submit" class="button secondary" value="< Back to Download Page"/></a>
		<a href="download/'.$source_file.'"><input type="submit" class="button" value="Download"/></a>
		<a href="profile.php?profile='.$userprofile.'"><input type="submit" class="button success" value="Go to Artist"/></a>
	</center>
</body>
</html>
';
?>
