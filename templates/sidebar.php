<nav id="sidebar">
	<div >
		<a href="index.php"><div class="optionL">Strona główna</div></a>
		<a href="about_me.php"><div class="optionL">O mnie</div></a>
		<a href="post.php"><div class="optionL">Przykładowy post</div></a>
		<a href="contact.php"><div class="optionL">Kontakt</div></a>
		<?php 
		if (!isset($_SESSION['logged']))
		{
			echo '<a href="login.php"><div class="optionL">Zaloguj się</div></a>';
		} else{
			echo '<a href="administrator_panel.php" style="font-size: 15px;"><div class="optionL">Panel administratora</div></a>';
			echo '<a href="logout.php"><div class="optionL">Wyloguj sie</div></a>';
		}
		?>
	</div>
</nav>