<?php session_start();
// include('gateway.php');
error_reporting(0);

require_once("include/lib/mp3tag.php");
require_once("include/connection.php");
include('include/file_function.php');

$linkdown = $_GET['link'];
$try = $_GET['retry'];
$pass_input = $_POST['x'];

$try++;
if ($try>5) {
	echo '<div class="padding10 bg-red fg-white text-accent">Your aleardy try more than 5 times!</div>';
}

$linkdata = mysql_query("SELECT * FROM files WHERE downloadlink = '$linkdown'");
$meta = mysql_fetch_assoc($linkdata);
$password = $meta['password'];
if (mysql_num_rows($linkdata) > 0) {
	$file_size = $meta['size'];
	$user_owner = $meta['ownerfile'];
	$file_name = $meta['filename'];
	$source_file = $meta['source'];
	$date_created = $meta['datecreated'];
	$hit = $meta['hit'];
	$explode = explode('.',$file_name);
	$extensi= $explode[count($explode)-1];
	$link_file = "download/$source_file";
	$image_ext	= array('jpg','jpeg','png','gif','svg','bmp');
	$audio_ext = array('mp3','wav','midi','ogg');
	$movie_ext = array('mp4','webm','3gp','mkv');
	// 1.1 Revision
	$document_ext = array('pdf','docx','doc','xls','xlsx','ppt','pptx');
	$text_ext = array('txt','md','log','text');
	$program_ext = array('exe','dll','lib');
	$compress_ext = array('rar','zip','gzip','tar','cab','7z','ace','iso','tar');
	// --------------------------------
	} else {
	header('location:error_404.html');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Vaxza Homepage">
    <meta name="keywords" content="ACPB, Pascaline, Mad Father, Misfortune Melody, Software, Technology">
    <meta name="author" content="Dani Pragustia">
	
	<?php
	echo "<title>Dansyu.tk - $file_name</title>";
	?>
    
	<link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
	
	<script>
	$(document).ready(function(){
		$("#btnDownload").click(function(){
			$("#btnDownload").fadeOut("3000");
			$("#preload-download").fadeIn("3000");
			$("#panel-download").fadeIn("4000");
		});
});
	</script>
	<script>
	function showDialog(id){
		var dialog = $(id).data('dialog');
		dialog.open();
	}
	</script>
	<?php
	echo '<div data-role="dialog" id="dlg1" class="padding20" data-close-button="false" data-windows-style="true" data-type="alert">
						<h1>Report File</h1>
						<p>
						Give us reason why file <b>'.$file_name.'</b> conduct or break something?
						</p>
						<form method="post" enctype="multipart/form-data" action="">
						<input type="text" name="downloadlink" id="downloadlink" value="'.$linkdown.'" style="display:none;"><br>
						<label class="input-control radio small-check">
							<input type="radio">
							<span class="check"></span>
							<span class="caption">Contains sensitive information about someone (you or your friends)</span>
						</label>
						<br>
						<label class="input-control radio small-check">
							<input type="radio">
							<span class="check"></span>
							<span class="caption">Contains virus/trojan or cracked software.</span>
						</label>
						<br>
						<label class="input-control radio small-check">
							<input type="radio">
							<span class="check"></span>
							<span class="caption">Contains sexuality or child (phedofile) content</span>
						</label>
						<br>
						<label class="input-control radio small-check">
							<input type="radio">
							<span class="check"></span>
							<span class="caption">Other reason is not listed</span>
						</label>
						<br>
						<center>
						<input type="submit" name="btnDelete" class="button alert large-button" onclick="hideMetroDialog(dlgDelete)" value="Send Report"/>
						<input type="submit" class="button alert large-button" onclick="hideMetroDialog(dlgDelete)" value="No"/>
						</form></center><br>
	</div>';
	?>
</head>
<body>
<?php
include('include/header.php');
if (!$pass_input) {
	if (!$password) {
		$pwdinput="false";
	} else {
		$pwdinput="true";
	}
	// do nothing :/
} else {
	if ($pass_input==$password) {
		$unlock="true";
		$pwdinput="false";
	} else {
		$pwdinput="true";
		echo '<div class="padding10 bg-red fg-white text-accent">Invalid Password!</div>';
	}
}
if (!$password) {
	$unlock="true";
	$pwdinput="false";
}
if ($pwdinput=="true") {
	echo '
	<div class="container page-content">
		<center>
			<h2 class="text-light">Password Protected</h2>
			<span class="mif-lock mif-3x"></span>
			<br><br>
			<br>
			Need a password to download file:
			<br>
		<form method="post" enctype="multipart/form-data" action="">
			<div class="input-control password full-size" data-role="input">
				<input type="password" name="x" id="x">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
			<input type="submit" name="btnLogin" class="button success" value="Unlock File"/>
		</center>
		</form>
	</div>
	';
}
if ($unlock=="true") {
echo '
	<div class="login-form padding20 block-shadow">
	<div class="container page-content">
	<center>';

		if(in_array($extensi,$audio_ext)) {
		echo '
			<div data-role="audio">
				<audio>
					<source src="'.$link_file.'" type="audio/mp3" />
				</audio>
			</div>
			<br><br><br>
			';
		}
		If(in_array($extensi,$movie_ext)) {
		echo '
		<div data-logo="logo.png"  data-preload="true" data-role="video">
			<video>
				<source src="'.$link_file.'" type="video/mp4" />
				<source src="'.$link_file.'" type="video/webm" />
			</video>
		</div>
		<br><br>
		';
		}
		echo '
		<div class="grid">
			<div class="row cells2">
			<div class="cell">
			<center><b>File Info</b></center><br>
			<table class="table striped" id="file_info" width="50%" cellpadding="1" cellspacing="0">
				<tr>
				<td>Filename</td>
				<td>'.$file_name.'</td>
				</tr>
				<tr>
				<td>Size</td>
				<td>'.formatBytes($file_size).'</td>
				</tr>
				<tr>
				<td>Uploaded At</td>
				<td>'.$date_created.'</td>
				</tr>
				<td>Downloaded Time</td>
				<td>'.$hit.'</td>
				</tr>
				<tr>
				<td>Sumbitted</td>
				<td>'.$user_owner.'</td>
				</tr>
				';
			if ($extensi==mp3) {
				$id3 = new MP3_Id();
				$result = $id3->read($link_file);
				$result = $id3->study();
				if(!empty($id3->artists)) {
					echo '
					<td>Artist</td>
					<td>' . $id3->artists . '</td>
					</tr>';
				}
				if(!empty($id3->album)) {
					echo '
					<td>Album</td>
					<td>' . $id3->album . '</td>
					</tr>';
				}
				if(!empty($id3->year)) {
					echo '
					<td>Year</td>
					<td>' . $id3->year . '</td>
					</tr>';
				}
				if(!empty($id3->name)) {
					echo '
					<td>Title</td>
					<td>' . $id3->name . '</td>
					</tr>';
				}
				if ($id3->getTag('bitrate')) {
					echo '
					<td>Bitrate</td>
					<td>' . $id3->getTag('bitrate') . ' KBit/sec</td>
					</tr>';	
				}
			}
			echo '
			</table>
			<center><h3>QR Code</h3></center>
			<img src="http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=http://www.dansyu.tk/down.php?link='.$linkdown.'"/>
			<br><br>
			<span class="mif-mobile mif-lg"></span> <span class="mif-tablet mif-lg"></span>
			<br>
			<br>
			<font color="grey">Scan this QR Code to your phone for download this file</font>
			<br><br><br>
			<div class="toolbar">
				<div class="toolbar-section">
					Social : 
					<a target="_blank" href="http://www.facebook.com/share.php?u=www.dansyu.tk/download.php?link='.$linkdown.'"><button class="toolbar-button"><span class="mif-facebook"></span></button></a>
                    <a target="_blank" href="http://twitter.com/home?status=www.dansyu.tk/download.php?link='.$linkdown.'"><button class="toolbar-button"><span class="mif-twitter"></span></button></a>
					<a target="_blank" href="http://digg.com/submit?phase=2&url='.$linkdown.'&title='.$file_name.' - Dansyu.tk"><button class="toolbar-button"><span class="mif-digg"></span></button></a>
					<button class="toolbar-button"><span class="mif-link"></span></button>
				</div>
			</div>
			</div>
			<div class="cell"><center><br><br><br><br><br>';
		if(in_array($extensi,$image_ext)){
			echo '<span class="mif-file-image mif-4x"></span><br><br><br>';
			echo '<a href="image.php?pic='.$linkdown.'"><input type="submit" class="button" value="View Image"/></a>';
		}
		if(in_array($extensi,$audio_ext)){
			echo '<span class="mif-file-audio mif-4x"></span><br><br><br>';
		}
		if(in_array($extensi,$movie_ext)){
			echo '<span class="mif-file-movie mif-4x"></span><br><br><br>';
		}
		if(in_array($extensi,$document_ext)){
			echo '<span class="mif-file-pdf mif-4x"></span><br><br><br>';
		}
		if(in_array($extensi,$program_ext)){
			echo '<span class="mif-file-binary mif-4x"></span><br><br><br>';
		}
		if(in_array($extensi,$text_ext)){
			echo '<span class="mif-file-text mif-4x"></span><br><br><br>';
		}
		if(in_array($extensi,$compress_ext)){
			echo '<span class="mif-file-archive mif-4x"></span><br><br><br>';
		}
	echo '<span id="timer"></span>';
	echo '<a href="down.php?file='.$linkdown.'"><button id="btnDownload" class="button success">Download</button></a><br>';
	echo '<button  class="button link" onclick="showDialog(dlg1)"><span class="mif-flag fg-black"></span> Report this file</button>';
	echo '<div id="preload-download" data-role="preloader" data-type="ring" data-style="dark" style="display:none;"></div><br>';
	echo '<div id="panel-download" style="display:none;">Your download is starting...<a href="download.php?link='.$linkdown.'&retry='.$try.'">Try Again?</a></div>';
	if (is_executable($link_file)) {
		echo '<br><br><span class="mif-warning prepend-icon"></span><font color="grey"> File potencial virus or malware<br>Please ensure your download from secure source</font>';
	}
	echo '</center>';
}
	?>
	</center>
	</div>
	<br><br>
	<center>
	<h2>Advertisment</h2>
	</center>
	<!-- Panel Siji-->
	<div><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1632668592742327" data-ad-slot="8347181909" data-ad-format="auto"></ins></div>
        <script>
			(adsbygoogle = window.adsbygoogle || []).push({});
        </script>
		<noscript>
		<div class="padding10 bg-red fg-white text-accent">Please enabled your javascript!</div>
		</noscript>
	<!-- Panel Loro-->
	<div><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1632668592742327" data-ad-slot="8347181909" data-ad-format="auto"></ins></div>
        <script>
			(adsbygoogle = window.adsbygoogle || []).push({});
        </script>
		<noscript>
		<div class="padding10 bg-red fg-white text-accent">Please enabled your javascript!</div>
		</noscript>
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