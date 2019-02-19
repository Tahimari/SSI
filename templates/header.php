<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
	<nav>
		<div id="menu">
			<ol>
				<li><a href="index.php">Strona główna</a></li>
				<li><a href="about_me.php">O mnie</a></li>
				<li><a href="post.php">Przykładowy post</a></li>
				<li><a href="contact.php">Kontakt</a></li>
				<?php 
				if (!isset($_SESSION['logged']))
				{
					echo '<li><a href="login.php">Zaloguj się</a></li>';
				} else{
					echo '<li><a href="administrator_panel.php" style="font-size: 15px;">Panel administratora</a></li>';
					echo '<li><a href="php/logout.php">Wyloguj sie</a></li>';
				}
				
				?>
			</ol>
		</div>
	</nav>
</header>