<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM USER WHERE EMAIL='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();

				if (password_verify($haslo, $wiersz['PASSWORD']))
				{

					$_SESSION['zalogowany'] = true;
					$_SESSION['ID_USER'] = $wiersz['ID_USER'];
					$_SESSION['USER'] = $wiersz['USER'];
					$_SESSION['NAZWISKO'] = $wiersz['NAZWISKO'];
					$_SESSION['EMAIL'] = $wiersz['EMAIL'];
					$_SESSION['PASSWORD'] = $wiersz['PASSWORD'];

					$polaczenie->query("UPDATE `user` SET `FLAGA` = '1' WHERE `user`.`ID_USER` = '".$_SESSION['ID_USER']."'");


					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: komunikator.php');
				}
				else 
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}

			} else {
				
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>