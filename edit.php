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
	<link rel="stylesheet" type="text/css" href="css/administrator_panel.css">
</head>

<body>

	<?php include "templates/header.php";?>
	
	<div id="container">

		<?php include "templates/sidebar_ap.php";?>
		
		<div id="content">
			<span class="bigtitle">Edytuj wpis</span><br/><br/>
			<?php
			require_once"php/database.php";
			try {
				$id = 5;
				$sql = "Select * from posts where user_id ='$id' order by data desc";
				if($query = $db->query($sql)) {
					$data = $query->fetchAll();
					foreach ($data as $row) {
						$post_link = "edit_window.php?id=".$row['post_id'];
						echo 
						"<a id='confirm' href='$post_link' ><span class='text'>
						{$row['title']}
						</span>
						<div class='dottedline'></div>
						<a/>";
					}
				}
			} catch (Exception $e) {
			}
			?>
			<br/>
			<br/>
		</div>
		
		<?php include "templates/footer.php"; ?>
	
</body>
</html>