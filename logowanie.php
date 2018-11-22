<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: index.php');
		exit();
	}

	?>

	<meta charset="utf-8" />
	<title>Blog</title>
	<meta name="description" content="Blog by Kamil Misiak" />
	<meta name="keywords" content="Blog, mikroblog" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style1.css" type="text/css" />
	<link rel="stylesheet" href="logowanie.css" type="text/css" />
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
		<div id="container">
		<form action="zaloguj.php" method="post">
			<input type="text" name="login" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'" >
			
			<input type="password" name="haslo" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" >
			
			<input type="submit" value="Zaloguj się">
			<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
			
		</form>
	</div>
		
		
		<div id="footer" style="margin-top: 100px;">
			Blog by Kamil Misiak &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>