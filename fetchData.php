<?php 
	require_once"connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno) {
		echo "Error: ".$polaczenie->connect_errno;
	} else {
		//$id = $_SESSION['id'];
		$id = 5;

		$sql = "Select * from posty where id_uzytkownika ='$id'";

		if($rezultat = @$polaczenie->query($sql)) {
				$wiersz = $rezultat->fetch_assoc();
				$tytul = $wiersz["tytul"];
				$tresc = $wiersz["text"];
				$data = $wiersz["data"];
				$rezultat->close();
		}
		$polaczenie->close();
	}

?>