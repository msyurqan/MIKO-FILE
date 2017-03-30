<?php
// include('gateway.php');
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])) {
header('location:/login.php?redirect=myfiles.php'); }
else { $usr = $_SESSION['username']; }
require_once("include/connection.php");
include('include/delete_process.php');
$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Vaxza Homepage">
    <meta name="keywords" content="ACPB, Pascaline, Mad Father, Misfortune Melody, Software, Technology">
    <meta name="author" content="Dani Pragustia">
	
	<title>Mikofile.tk - Free File Hosting</title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
	<script>
	function showDialog(id){
		var dialog = $(id).data('dialog');
		dialog.open();
	}
	
	</script>
</head>
<body>
<?php
	include('include/header.php');
?>
</head>
<body>
<table class="table" width="100%" cellpadding="3" cellspacing="0">
            	<tr>
                	<th width="30">No.</th>
                    <th>Date Upload</th>
                    <th>File Name</th>
                    <th>Size</th>
					<th>Action</th>
                </tr>
                <?php
				include('include/file_function.php');
				$sql = mysql_query("SELECT * FROM files WHERE ownerfile = '$usr' ORDER BY datecreated DESC");
				if(mysql_num_rows($sql) > 0){
					$no = 1;
					while($data = mysql_fetch_assoc($sql)){
						$file_name = $data['filename'];
						$file_url = $data['downloadlink'];
						$link_file = $data['source'];
						$link_download = "download.php?link=$file_url";
						echo '
						<tr>
							<td align="center">'.$no.'</td>
							<td align="center">'.$data['datecreated'].'</td>
							<td>'.$data['filename'].'</td>
							<td align="center">'.formatBytes($data['size']).'</td>
							<td align="center"><a target="_blank" href="'.$link_download.'"><input type="submit" class="button" value="Download"/></a>';
						echo '<button class="button alert" onclick="showDialog(dlgDelete'.$no.')">Delete</button>';
						echo '</td></tr>';
						echo '<div data-role="dialog" id="dlgDelete'.$no.'" class="padding20" data-close-button="false" data-windows-style="true" data-type="alert">
						<h1>Delete File</h1>
						<p>
						File <b>'.$data['filename'].'</b> will delete permanently, Are you sure?
						</p>
						<center>
						<form method="post" enctype="multipart/form-data" action="">
						<input type="text" name="downloadlink" id="downloadlink" value="'.$file_url.'" style="display:none;"><br>
						<input type="submit" name="btnDelete" class="button alert large-button" value="Yes"/>
						<input type="submit" class="button alert large-button" onclick="hideMetroDialog(dlgDelete'.$no.')" value="No"/>
						</form></center><br>
						</div>';
						$no++;
					}
					
				}else{
					echo '
					<tr>
						<td align="center" colspan="4" align="center">No Uploaded File! <a href="upload.php">Upload File</a> Now!</td>
					</tr>
					';
				}
				?>
    </div>
</body>
</html>