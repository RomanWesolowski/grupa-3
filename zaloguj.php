<?php
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if ($polaczenie->connect_errno!=0)
		if ($rezultat = @$polaczenie->query(
					unset($_SESSION['blad']);