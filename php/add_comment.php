<?php

session_start();

require_once"database.php";

try {
	$user = strip_tags($_POST['user']);
	$content = strip_tags($_POST['comment']);
	$id = $_GET['id'];

	$query = $db->prepare("insert into comments (text, user, data, post_id) values (:content, :user, now(), '$id')");

	$query->bindValue(':content', $content, PDO::PARAM_STR);
	$query->bindValue(':user', $user, PDO::PARAM_STR);
	$query->execute();
	$post_link = "../post.php?id=$id";
	header("Location: $post_link");
} catch(Exception $e) {
}
?>