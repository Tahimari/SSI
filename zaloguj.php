<?php

	session_start();

	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: logowanie.php');
		exit();
	}

	require_once"connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno) {
		echo "Error: ".$polaczenie->connect_errno;
	} else {
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");	

		if($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE login='%s' AND password='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo)))){
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow==1) {

				$_SESSION['zalogowany'] = true;			

				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz["id_uzytkownika"];
	
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header("Location: index.php");

			} else {
				$_SESSION['blad'] = '<span style="color:black; font-size: 25px;"></br>Nieprawidłowy login lub hasło!</span>';
				header('Location: logowanie.php');
			}
		}


		$polaczenie->close();
	}
?>
