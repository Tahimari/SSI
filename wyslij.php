<?php

	session_start();

	require_once"connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno) {
		echo "Error: ".$polaczenie->connect_errno;
	} else {
		$tytul = $_POST['tytul'];
		$text = $_POST['post'];
		$id = $_SESSION['id'];

		$sql = "insert into posty (tytul, text, data, id_uzytkownika) values ('$tytul','$text', now(), '$id')";

		$polaczenie->query($sql);
		$polaczenie->query("commit");
		header("Location: new.php");
		$polaczenie->close();
	}
?>
