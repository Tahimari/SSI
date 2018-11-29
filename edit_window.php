<?php
	session_start();
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}

	$_SESSION['id_wpisu'] = $_GET['id'];
	$wiersz = require_once"fetchData.php";
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Blog</title>
	<meta name="description" content="Blog by Kamil Misiak" />
	<meta name="keywords" content="Blog, mikroblog" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="main.css" type="text/css" />
	<link rel="stylesheet" href="panel_administratora.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
	
		<div id="menu">
			<ol>
				<li><a href="index.php">Strona główna</a></li>
				<li><a href="omnie.php">O mnie</a></li>
				<li><a href="wpis.php">Przykładowy post</a></li>
				<li><a href="kontakt.php">Kontakt</a></li>
				<li><a href="panel_administratora.php" style="font-size: 15px;">Panel administratora</a></li>
				<li><a href="logout.php">Wyloguj sie</a></li>
			</ol>
		</div>
		
		
	<div id="sidecontent">
		<div id="sidebar">
			<a href="panel_administratora.php"><div class="optionL">Home</div></a>
			<a href="new.php"><div class="optionL">Dodaj post</div></a>
			<a href="edit.php"><div class="optionL">Edytuj post</div></a>
			<a href="delete.php"><div class="optionL">Usuń post</div></a>
		</div>
		
		<div id="new">
			<span class="bigtitle">Dokonaj zmian</span>

			<form action="edytuj.php" method="post">
			<textarea id="tytul" name='tytul' rows="1" cols="119"><?php echo $wiersz['tytul'];?></textarea> 
			<textarea id="post" name='post' rows="10" cols="30"><?php echo $wiersz['text'];?></textarea>
			<input type="submit" value="Wyslij">
		</form>
		</div>
	</div>
		
		<div id="footer">
			Blog by Kamil Misiak &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>