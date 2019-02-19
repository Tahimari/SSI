<?php
session_start();
if (!isset($_SESSION['logged'])){
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php include "templates/head.php" ?>
	<link rel="stylesheet" type="text/css" href="administrator_panel.css">
</head>

<body>

	<?php include "templates/header.php";?>
	
	<div id="container">
		<?php include "templates/sidebar_ap.php";?>
	</div>

	<div id="content">
			<span class="bigtitle">Witaj!</span>
	</div>
	
	<?php include "templates/footer.php"; ?>

</body>
</html>