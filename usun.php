<?php

	session_start();
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}

	require_once"connect.php";

	try {
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno) {
		echo "Error: ".$polaczenie->connect_errno;
	} else {
		$id = $_GET['id'];
		echo $id;

		
		$sql = "delete from posty where id_wpisu = $id";

		$polaczenie->query($sql);
		header("Location: delete.php");
		$polaczenie->close();
	}
} 	catch(Exception $e) {
	}
?>
