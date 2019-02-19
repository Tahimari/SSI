<?php
session_start();
if (!isset($_SESSION['logged'])) {
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php include "templates/head.php" ?>
	<link rel="stylesheet" type="text/css" href="css/administrator_panel.css">
</head>

<body>

	<?php include "templates/header.php";?>
	
	<div id="container">

		<?php include "templates/sidebar_ap.php";?>
		
		<div id="new">
			<span class="bigtitle">Dodaj wpis</span>
			<form action="php/send.php" method="post">
				<input  type="text" name="title" placeholder="tytuł" autocomplete="off">
				<textarea id="post" name="post" rows="10" cols="30" placeholder="treść"></textarea>
				<input type="submit" value="Wyslij">
			</form>
		</div>
	</div>
	
	<?php include "templates/footer.php"; ?>

</body>
</html>