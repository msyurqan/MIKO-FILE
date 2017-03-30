<?php
	error_reporting(0);
	include('include/visitor_function.php');
	include('include/connection.php');
	// include('gateway.php');
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
	
	<title>Mikofile.tk - Free File Hosting</title>
	
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
	  // include('include/layers/1.php');
?>
<div class="padding10 bg-red fg-white text-accent">Advertising Allows the Website Keep Alive. Support the project, please disable ad blocker.</div>
		<div class="carousel square-bullets" data-role="carousel" data-height="400">
			<div class="slide"><img src="images/MIKO-WEB-FILE-HOSTING.jpg" alt="Slide1" data-role="fitImage" data-format="fill"/></div>
			<div class="slide"><img src="images/selaide2.png" alt="Slide2" data-role="fitImage" data-format="fill"/></div>
			<div class="slide"><img src="images/selaide3.png" alt="Slide3" data-role="fitImage" data-format="fill"/></div>		
		</div>

<div class="grid">
    <div class="row cells4">
        <div class="cell padding10">
		<?php
			include('include/layers/3.php');
		?>
		<h3> Subscribe Newsletter</h3>
		<hr class="thin"/>
		Get Least information about Anime and News with subscribe your email:
		<form action="/subscribe.php" method="post">
		    <div class="input-control text full-size">
				<span class="mif-mail prepend-icon"></span>
				<input type="text" placeholder="example@mail.com" name="email">
			</div>
			<div class="form-actions">
                <button type="submit" class="button warning" name="btnSubscribe">Subscribe!</button>
				<font color="grey">Vaxza Subscribe</font>
            </div>
		</form>
		<br><br>
		<?php
		// include('include/layers/4.php');
		?>
		<h2> Recent Post</h2>
		<hr>
		<?php
		$batas=5;
		$paging=$_GET['page'];
		if(empty($paging)) {
		$posisi=0;
		$paging=1;
		} else {
		$posisi=($paging-1) * $batas;
		}
	$query=mysql_query("select * from news ORDER BY news_id desc limit $posisi,$batas");
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
		<h3>Advertisment<h3>
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
		<?php
			include('include/layers/5.php');
		?>
		</div>
        <div class="cell colspan2">
		<?php
		   // include('include/layers/2.php');
	$batas=5;
	$paging=$_GET['paging'];
	$kategori=$_GET['category'];
	if(empty($paging)) {
	$posisi=0;
	$paging=1;
	} else {
	$posisi=($paging-1) * $batas;
	}
	if (empty($kategori)) {
		$query=mysql_query("select * from news ORDER BY news_id desc limit $posisi,$batas");
	} else {
		$query=mysql_query("select * from news WHERE category='$kategori' ORDER BY news_id desc limit $posisi,$batas");
	}
	while($r=mysql_fetch_array($query))
{
	echo'<div class="window">
            <div class="window-caption">
                    <span class="window-caption-title">'.$r['title'].'</span>
            </div>
		    <div class="padding10 margin20 no-margin-left no-margin-right sub-header text-light window-content">
				<center><img src="images/'.$r['pic'].'" height="150" width="500" /></center>';
				echo '<p>'.substr($r['artikel'],0,200).' .....</p>';
				echo '<span class="mif-tags"></span> <font color="grey">Kategori : <a href="index.php?category='.$r['category'].'">'.$r['category'].'</a></font>
				<a href="baca.php?id='.$r['news_id'].'"><button class="button danger place-right">Read More...</button></a>
				<br><br>
            </div>
        </div>
		<br>';
    } 
		?>
		<br>
		<br>
		<br>
		</div>
        <div class="cell padding10">
		<?php
			// include('include/layers/6.php');
		?>
		<h2>Donate</h2>
		<p>Make this website still alive and more confidence with donate! We received any amount of donation</p>
		<a href="https://www.paypal.me/danipragustia"><button class="button primary"><span class="mif-paypal mif-lg"></span> Donate Us</button></a>
		<a href="https://www.000webhost.com/922187.html"><button class="button green"><span class="mif-drive mif-lg"></span> Free Web Hosting</button></a>
		<br>
		<a href="support.php#WhyDonate">Let's see what benefit your donate</a>
		<br><br>
		<?php
			// include('include/layers/7.php');
		?>
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
		<?php
			// include('include/layers/8.php');
		?>
		<h2>Partner Link</h2>
		<hr>
		<a href="http://www.vaxza-old.blogspot.co.id"><img src="images/partner-01.png"/></a>
		<p>
		<a href="http://www.syurqanm.blogspot.co.id"><img src="images/msyurqan-blog.png"/></a>
		</div>
		<?php
			// include('include/layers/9.php');
			// include('include/layers/10.php');
		?>
    </div>
</div>
	</body>
        <footer style="background-color: #FEFEFE">
		<?php
			// include('include/layers/11.php');
			// include('include/footer.php');
		?>
		</footer>
</html>
