<?php
if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
	header('Location: index.php');
	exit();
}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php include "templates/head.php" ?>

	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
	
	<?php include "templates/header.php" ?>

	<div id="container">
		<form action="php/login_php.php" method="post">
			<input type="text" name="login" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'" >
			<input type="password" name="haslo" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" >
			<div class="g-recaptcha" style="margin-top: 20px"data-sitekey="6LcWR4kUAAAAAC3bOHRyeKzsDaQCFICSQvSeiA3O"></div>
			<input type="submit" value="Zaloguj się">
			<?= (isset($_SESSION['blad']))?$_SESSION['blad']:''?>
		</form>
	</div>
	
	<?php include "templates/footer.php"; ?>

</body>
</html>