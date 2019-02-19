<?php

session_start();
if (!isset($_SESSION['logged']))
{
	header('Location: ../index.php');
	exit();
}

require_once"database.php";

try {
		$id = $_GET['id'];
		$sql = "delete from posts where post_id = $id";
		$db->query($sql);
		header("Location: ../delete.php");
} 	catch(Exception $e) {
}
?>
