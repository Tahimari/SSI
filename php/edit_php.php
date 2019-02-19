<?php

session_start();

require_once"database.php";

try {
	$title = strip_tags($_POST['title']);
	$text = strip_tags($_POST['post']);
	$id = $_SESSION['post_id'];

	$query = $db->prepare("UPDATE posts SET title = :title, text = :text, data = now() WHERE post_id = '$id'");

	$query->bindValue(':title', $title, PDO::PARAM_STR);
	$query->bindValue(':text', $text, PDO::PARAM_STR);

	$query->execute();
	header("Location: ../edit.php");
} catch(Exception $e) {
}
?>
