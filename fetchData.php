<?php 
	require_once"connect.php";
	try {
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	if($polaczenie->connect_errno) {
		echo "Error: ".$polaczenie->connect_errno;
	} else {
		$id = $_SESSION['id_wpisu'];
		$polaczenie->query('SET NAMES utf8');
		$sql = "Select * from posty where id_wpisu ='$id'";
		if($rezultat = @$polaczenie->query($sql)) {
				return $rezultat->fetch_assoc();
		}
		$polaczenie->close();
	}
	} catch(Exception $e) {
	}
?>