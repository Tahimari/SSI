<?php

	session_start();

	require_once"connect.php";

	try {
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno) {
		echo "Error: ".$polaczenie->connect_errno;
	} else {
		$tytul = $_POST['tytul'];
		$text = $_POST['post'];
		$id = $_SESSION['id_wpisu'];

		$polaczenie->query('SET NAMES utf8');
		$sql = "UPDATE posty SET tytul = '$tytul', text = '$text', data = now() WHERE id_wpisu = '$id'";

		$polaczenie->query($sql);
		header("Location: edit.php");
		$polaczenie->close();
	}
	} catch(Exception $e) {
	}
?>
 