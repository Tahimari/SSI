<?php
	session_start();
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
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
		
		<div id="content">
			<span class="bigtitle">Usuń wpis</span><br/><br/>
			<?php
			require_once"connect.php";
			$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
			if($polaczenie->connect_errno) {
				echo "Error: ".$polaczenie->connect_errno;
			} else {
				//$id = $_SESSION['id'];
				$id = 5;
				$polaczenie->query('SET NAMES utf8');
				$sql = "Select * from posty where id_uzytkownika ='$id'";
				if($rezultat = @$polaczenie->query($sql)) {
						for( $i=0; $i<$rezultat->num_rows; $i++ ) {
						$wiersz = $rezultat->fetch_assoc();
						$link = "usun.php?id=".$wiersz['id_wpisu'];
						echo '<a id="confirm" href='.$link.' ><span class="text">';
						echo $wiersz['tytul'];
						echo '</span>';
						echo '<div class="dottedline"></div>';
						echo '<a/>';
				}
			}
			$polaczenie->close();
			}
			?>
			<br />
			<br />
		</div>		
		<div id="footer">
			Blog by Kamil Misiak &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>