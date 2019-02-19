<?php

session_start();

require_once"database.php";

try {
	$title = strip_tags($_POST['title']);
	$text = strip_tags($_POST['post']);
	$id = 5;
	$query = $db->prepare("insert into posts (title, text, data, user_id) values (:title,:text, now(), '$id')");
	$query->bindValue(':title', $title, PDO::PARAM_STR);
	$query->bindValue(':text', $text, PDO::PARAM_STR);
	$query->execute();
	header("Location: ../new.php");
} catch(Exception $e) {
}
?>
