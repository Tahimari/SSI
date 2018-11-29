<?php

	session_start();

	require_once"connect.php";

	try {
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno) {
		echo "Error: ".$polaczenie->connect_errno;
	} else {
		$uzytkownik = $_POST['uzytkownik'];
		$tresc = $_POST['komentarz'];
		$id = $_GET['id'];

		$polaczenie->query('SET NAMES utf8');
		$sql = "insert into komentarze (tresc, uzytkownik, data, id_wpisu) values ('$tresc','$uzytkownik', now(), '$id')";

		$polaczenie->query($sql);
		$link = "wpis.php?id=".$id;
		header("Location: $link");
		$polaczenie->close();
	}
	} catch(Exception $e) {
	}
?>