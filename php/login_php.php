<?php

session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
	header('Location: ../login.php');
	exit();
}

require_once"connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try {
	$link = new mysqli($host, $db_user, $db_password, $db_name);

	if($link->connect_errno) {
		echo "Error: ".$link->connect_errno;
	} else {
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$verified = true;

		$login = htmlentities($login, ENT_QUOTES, "UTF-8");

		$secret_key = "6LcWR4kUAAAAAMBTSyVY2Yb2E82bBubn9XgQf-QZ";
		
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
		
		$response = json_decode($check);
		
		if ($response->success==false) {
			$verified=false;
		}	

		if ($result = @$link->query(
			sprintf("SELECT * FROM users WHERE login='%s'",
				mysqli_real_escape_string($link,$login)))) {
			$ilu_userow = $result->num_rows;
			if($ilu_userow==1) {		

				$row = $result->fetch_assoc();

				if (password_verify($haslo,$row['password']) /*&& $verified*/) {
					$_SESSION['logged'] = true;	
					$_SESSION['id'] = $row["user_id"];
					
					unset($_SESSION['blad']);
					$result->free_result();
					header("Location: ../administrator_panel.php");
				} else {
					$_SESSION['blad'] = '<span style="color:black; font-size: 25px;"></br>Nieprawidłowy login lub hasło!</span>';
					header('Location: ../login.php');
				}
			} else {
				$_SESSION['blad'] = '<span style="color:black; font-size: 25px;"></br>Nieprawidłowy login lub hasło!</span>';
				header('Location: ../login.php');
			}
		}
		$link->close();
	}
}
catch(Exception $e) {
}
?>
