<?php

	session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8" />
	<title>Blog</title>
	<meta name="description" content="Blog by Kamil Misiak" />
	<meta name="keywords" content="Blog, mikroblog" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset=utf-8/>
	<link rel="stylesheet" href="main.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
	
		<div id="menu">
			<ol>
				<li><a href="index.php">Strona główna</a></li>
				<li><a href="omnie.php">O mnie</a></li>
				<li><a href="wpis.php">Przykładowy post</a></li>
				<li><a href="kontakt.php">Kontakt</a></li>
				<?php 
				if (!isset($_SESSION['zalogowany']))
				{
					echo '<li><a href="logowanie.php">Zaloguj się</a></li>';
				} else{
					echo '<li><a href="panel_administratora.php" style="font-size: 15px;">Panel administratora</a></li>';
					echo '<li><a href="logout.php">Wyloguj sie</a></li>';
				}
				
				?>
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
			<a href="index.php"><div class="optionL">Strona główna</div></a>
			<a href="omnie.php"><div class="optionL">O mnie</div></a>
			<a href="wpis.php"><div class="optionL">Przykładowy post</div></a>
			<a href="kontakt.php"><div class="optionL">Kontakt</div></a>
				<?php 
				if (!isset($_SESSION['zalogowany']))
				{
					echo '<a href="logowanie.php"><div class="optionL">Zaloguj się</div></a>';
				} else{
					echo '<a href="panel_administratora.php" style="font-size: 15px;"><div class="optionL">Panel administratora</div></a>';
					echo '<a href="logout.php"><div class="optionL">Wyloguj sie</div></a>';
				}
				
				?>
		</div>
		
		<div id="content">
			<?php
			require_once"connect.php";
			try {
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if($polaczenie->connect_errno) {
				echo "Error: ".$polaczenie->connect_errno;
			} else {
				//$id = $_SESSION['id'];
				$id = 5;
				$polaczenie->query('SET NAMES utf8');
				$sql = "select * from posty where id_uzytkownika = '$id'";
				if($rezultat = @$polaczenie->query($sql)) {
						for( $i=0; $i<$rezultat->num_rows; $i++ ) {
						$wiersz = $rezultat->fetch_assoc();
						$link = "wpis.php?id=".$wiersz['id_wpisu'];
						echo '<a href='.$link.'><span class="bigtitle"> ';
						echo $wiersz['tytul'];
						echo '</span>';
						echo '<div class="dottedline"></div>';
						echo '<div class="text">';
						echo substr($wiersz['text'],0,1000);
						echo '...</div>';
						echo '<br />';
						echo '<span class="date">';
						echo $wiersz['data'];
						echo '</span><a/><br/><br/><br/>';
				}
			}
			$polaczenie->close();
			}
			} catch(Exception $e) {
			}
			?>
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