<?php
	error_reporting(0);
	include('include/visitor_function.php');
	include('connection.php');
	// include('gateway.php');
	$id=$_GET['id'];
	$query=mysql_query("SELECT * FROM news where news_id='$id'");
	$r=mysql_fetch_array($query);
	
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
	
	<title>MIKO FILE.TK - <?php echo $r['title']; ?></title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">
	<link href="css/docs.css" rel="stylesheet">
	
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
	<script src="js/ga.js"></script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	
</head>
<body>
<?php
	include('include/header.php');
?>
<div class="grid">
    <div class="row cells4">
		<div class="cell colspan3 padding20">
		<?php
			echo '<h1>'.$r['title'].'</h1>';
			echo '<span class="mif-tags"></span> <font color="grey">Kategori : <a href="index.php?category='.$r['category'].'">'.$r['category'].'</a></font>';
			echo '<div class="place-right">
				<div class="toolbar">
				<div class="toolbar-section">
					Share to : 
					<a target="_blank" href="http://www.facebook.com/share.php?u=www.dansyu.tk/baca.php?link='.$id.'"><button class="toolbar-button"><span class="mif-facebook"></span></button></a>
                    <a target="_blank" href="http://twitter.com/home?status=www.dansyu.tk/baca.php?link='.$id.'"><button class="toolbar-button"><span class="mif-twitter"></span></button></a>
					<a target="_blank" href="http://digg.com/submit?phase=2&url=www.dansyu.tk/baca.php?id='.$id.'&title=Dansyu.tk - '.$r['title'].'"><button class="toolbar-button"><span class="mif-digg"></span></button></a>
				</div>
			</div>
			</div>
			<br>
			<br>
			<br>
			';
			echo '<p>'.$r['artikel'].'</p>';
		?>
		</div>
		<div class="cell">
				<h2> Recent Post</h2>
		<hr>
		<?php
		$batas=5;
		$posisi=0;
		$paging=1;
		$posisi=($paging-1) * $batas;
	$query=mysql_query("select * FROM news ORDER BY news_id desc limit $posisi,$batas");
	while($r=mysql_fetch_array($query))
{
	echo'<span><a href="baca.php?id='.$r['news_id'].'">'.$r['title'].'</a></span>
		    <div class="padding10">
				<img src="images/'.$r['pic'].'" height="100" width="100"/>';
				echo ''.substr($r['artikel'],0,150).' ... <a href="baca.php?id='.$r['news_id'].'">Read More >></a>';
				echo '</div>
				<br>';
    } 
		?>
		<br><br>
		<h2>Advertisment</h2>
        <div><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1632668592742327" data-ad-slot="8347181909" data-ad-format="auto"></ins></div>
        <script>
			(adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <br />
        <br />
        <div><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1632668592742327" data-ad-slot="8347181909" data-ad-format="auto"></ins></div>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
		<h2>Partner Link</h2>
		<hr>
		<a href="http://www.vaxza-old.blogspot.co.id"><img src="images/partner-01.png"/></a>
		<a href="http://www.syurqanm.blogspot.co.id"><img src="images/msyurqan-blog.png"/></a>
		</div>
</div>
</body>
        <footer>
		<?php
			include('include/footer.php');
		?>
		</footer>
</html>