<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Blog</title>
	<meta name="description" content="Blog by Kamil Misiak" />
	<meta name="keywords" content="Blog, mikroblog" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style1.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
	
		<div id="menu">
			<ol>
				<li><a href="zalogowany.php">Strona główna</a></li>
				<li><a href="omnie.html">O mnie</a></li>
				<li><a href="wpis.html">Przykładowy post</a></li>
				<li><a href="kontakt.html">Kontakt</a></li>
				<li><a href="panel_administratora.html" style="font-size: 15px;">Panel administratora</a></li>
				<li><a href="logout.php">Wyloguj sie</a></li>
			</ol>
		</div>
		
		<div id="topbar">
			<div id="topbarImg">
				<img src="img/computer.jpg" height="400px" />
			</div>
			<div style="clear:both;"></div>
		</div>
		
	<div id="sidecontent">
		<div id="sidebar">
			<a href="zalogowany.php"><div class="optionL">Strona główna</div></a>
			<a href="omnie.html"><div class="optionL">O mnie</div></a>
			<a href="wpis.html"><div class="optionL">Przykładowy post</div></a>
			<a href="kontakt.html"><div class="optionL">Kontakt</div></a>
			<a href="panel_administratora.html"><div class="optionL";">Panel administratora</div></a>
			<a href="logout.php"><div class="optionL">Wyloguj się</div></a>
		</div>
		
		<div id="content">
			<a href="wpis.html"><span class="bigtitle"> <?php
			require("fetchData.php");
			echo $tytul;
			?>
			</span>
			<div class="dottedline"></div>
			<div class="text"><?php
			echo $tresc;
			?> </div>
			<br />
			<span class="date"><?php
			echo $data;
			?></span></a>
			<br />
			<br />
		</div>
	</div>
		
		<div id="footer">
			Blog by Kamil Misiak &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>