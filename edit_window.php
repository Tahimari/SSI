<?php
session_start();
if (!isset($_SESSION['logged'])){
	header('Location: index.php');
	exit();
}

$_SESSION['post_id'] = $_GET['id'];
$row = require_once"php/fetchData.php";
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
			<span class="bigtitle">Dokonaj zmian</span>
			<form action="php/edit_php.php" method="post">
				<textarea id="title" name='title' rows="1" cols="119"><?php echo $row['title'];?></textarea> 
				<textarea id="post" name='post' rows="10" cols="30"><?php echo $row['text'];?></textarea>
				<input type="submit" value="Wyslij">
			</form>
		</div>
	</div>


	<?php include "templates/footer.php"; ?>

</body>
</html>