<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php include "templates/head.php" ?>
</head>

<body>

	<?php include "templates/header_img.php";?>

	<div id="container">

		<?php include "templates/sidebar.php";?>

		<acticle id="content">
			<?php
			require_once"php/database.php";
			try {
				$id = 5;
				$sql = "select * from posts where user_id = '$id' order by data desc";
				if($query = $db->query($sql)) {
					$data = $query->fetchAll();
					foreach ($data as $row) {
						$post_link = "post.php?id=".$row['post_id'];
						echo 
						"<a href='$post_link'><span class='bigtitle'>
						{$row['title']}
						</span>
						<div class='dottedline'></div>
						<div class='text'>".
						substr($row['text'],0,1000).
						"</div>
						<br/>
						<span class='date'>
						{$row['data']}
						</span></a><br/><br/><br/>";
					}
			}
		} catch(Exception $e) {
		}
		?>
		<br/>
		<br/>
	</acticle>
</div>

<?php include "templates/footer.php"; ?>

</body>
</html>