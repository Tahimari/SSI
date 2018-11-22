<?php
	session_start();
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
		
		
	<div id="sidecontent">
		<div id="sidebar">
			<a href="index.php"><div class="optionL">Strona główna</div></a>
			<a href="omnie.php.html"><div class="optionL">O mnie</div></a>
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
			<span class="bigtitle">Przykładowy wpis</span>
			
			<div class="dottedline"></div>
			
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mollis odio eu bibendum. Praesent non hendrerit risus. Nulla id semper sem. Mauris risus mauris, ultrices sed ullamcorper sed, vulputate vel nisi. Aliquam augue ante, mattis in pulvinar vitae, ultrices nec leo. Nulla ultricies augue enim, sit amet semper tellus vulputate sit amet. Maecenas tincidunt, ex eu viverra scelerisque, quam lectus auctor nunc, at pretium nibh lacus in ligula. Cras condimentum felis ac aliquet tristique. Sed elementum eu nulla vel rutrum. Cras feugiat nulla non congue malesuada.
			
			<br /><br />
			Cras et nulla vehicula, efficitur enim non, fermentum tortor. Curabitur id elementum leo. Sed eget turpis accumsan dolor mollis imperdiet. Praesent pellentesque laoreet lectus, at commodo magna varius vitae. Aliquam erat volutpat. Curabitur commodo, tortor laoreet sagittis cursus, nulla enim laoreet libero, et egestas risus ante vel orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc quis posuere massa, sed sollicitudin lorem. Mauris lacinia, massa efficitur malesuada luctus, arcu ex mattis erat, a venenatis magna risus nec neque. Nulla vulputate nisl urna, quis egestas orci suscipit tristique. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras auctor nec elit at ultricies. Morbi aliquam pharetra diam, vitae porta felis. Pellentesque vel arcu tincidunt, luctus justo quis, ultrices erat. Vivamus efficitur leo vitae dui molestie, eu varius sapien iaculis. In quis pharetra mauris.
			
			<br /><br />			
			Nam ullamcorper turpis non tristique sollicitudin. Etiam id magna lacus. Pellentesque vestibulum ex eget quam consectetur, sit amet luctus erat feugiat. Sed gravida tellus tempus consequat rhoncus. Phasellus lobortis magna et risus pharetra, facilisis blandit sapien tristique. Vivamus aliquam interdum arcu, eget facilisis ante gravida ut. Proin nec nisl ut lacus finibus sagittis id non nibh. Donec volutpat pretium libero. Sed fermentum vel ante vitae mattis. Curabitur porttitor turpis at scelerisque auctor. Sed vitae iaculis risus, ut iaculis nibh.
		</div>	
		
		<div id="footer">
			Blog by Kamil Misiak &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>