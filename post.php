<?php
@$id = $_GET['id'];
$comment_link = "php/add_comment.php?id=".$id;
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php include "templates/head.php" ?>
	<link rel="stylesheet" type="text/css" href="css/comments.css">
</head>

<body>

	<?php include "templates/header_img.php";?>

	<div id="container">

		<?php include "templates/sidebar.php";?>
		
		<article id="content">
			<?php
			require_once"php/database.php";
			try {
				if(!$id) {
					$sql = "Select * from posts";
				} else {
					$sql = "Select * from posts where post_id = '$id'";
				}
				$db->query('SET NAMES utf8');
				if($result = $db->query($sql)) {
					$row = $result->fetch();
					echo 
					"<span class='bigtitle'>
					{$row['title']}
					</span>
					<div class='dottedline'></div>
					<div class='text'>
					{$row['text']}
					</div>
					<br/>
					<span class='date'>
					{$row['data']}
					</span>";
				}
			} catch(Exception $e) {
			}
			?>
			<br />
			<br />
			<br /><br /><br /><br /><br />
			<form name="dodaj_comment" action=<?= $comment_link?> method="post">
				użytkownik: <input type="text" name="user"  autocomplete="off">
				<br/>
				komentarz:<textarea id="com" name="comment" autocomplete="off"></textarea>
				<br/>
				<input type="submit" value="Wyślij">
			</form>
			
			<br/><br/>
			<div id="add_comment">
				KOMENTARZE:<br/></br/>
				<?php
				try {
					$db->query('SET NAMES utf8');
					$sql = "Select * from comments where post_id ='$id'";
					if($result = @$db->query($sql)) {
						unset($data);
						$data = $result->fetchAll();
						foreach ($data as $row) {
							echo"<span id='user'>
							{$row['user']}
							</span></br><class='text'>
							{$row['text']}
							<span class='date'>
							{$row['data']}
							</span>
							<div class='dottedline'></div>
							<class/>";
						}
					}
				} catch(Exception $e) {
				}
				?>
				<br/>
				<br/>
			</div>	
		</article>	

		<?php include "templates/footer.php"; ?>

	</body>
	</html>