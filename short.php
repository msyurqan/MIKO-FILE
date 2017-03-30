<?php
	// include('gateway.php');
	require_once("include/connection.php");
	$meta_link = $_GET['u'];
	$linkdata = mysql_query("SELECT * FROM short_link WHERE link = '$meta_link'");
	$meta = mysql_fetch_assoc($linkdata);
	
	if (mysql_num_rows($linkdata) > 0) {
		// Its Okay ;-)
		$source=$meta['source'];
		$hit=$meta['hit'];
		$hit++;
		$new_hit = mysql_query('UPDATE short_link SET hit="'.$hit.'" WHERE link="'.$meta_link.'"');
	} else {
		header('location:error_404.html');
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
	
	<title>Dansyu.tk - Free File Hosting</title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
</head>

<script>
var count=10

var counter=setInterval("timer()",1000); 

function timer()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
	 document.getElementById("skip").innerHTML="<input name='btnGo' type='submit' class='success button' value='Go To Link' />";
	 document.getElementById("timer").innerHTML="";
     return;
  } else {
	 document.getElementById("timer").innerHTML="Skip In " + count + " "
  }

}
</script>
<body>
<?php
echo '
<div class="app-bar darcula">
    <a class="app-bar-element" href="/"><img src="logo.png"/></a>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="grid">
    <div class="row cells4">
        <div class="cell">
			<img src="images/ad-1.png" />
		</div>
		<div class="cell colspan2">
			<div class="window">
				<div class="window-caption">
					<span class="window-caption-icon"><span class="mif-link"></span></span>
					<span class="window-caption-title">Short Link</span>
				</div>
				<div class="window-content" style="auto">
				With short your link you can provide:<br><br>
				<span class="mif-checkmark"></span> Prevent any redirected and XSS attacks.<br>
				<span class="mif-checkmark"></span> Short your link to easy to share<br>
				<span class="mif-checkmark"></span> Free from any virus or spam<br>
					<center>
					
					<font style="font-size: 20pt" >
						<span id="timer"></span><br>
					</font>
						<a target="_blank" href="'.$source.'" id="skip"></a>
				</div>
			</div>
		</div>
		<div class="cell">
			<img src="images/ad-1.png" />
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br>
</body>
<footer>';
	include("include/footer.php");
echo '</footer>';
?>