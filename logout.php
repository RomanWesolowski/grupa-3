<?php

	session_start();
	include ('connect.php');
	if ($rezultat = @$polaczenie->query(		sprintf("UPDATE `user` SET `FLAGA` = 'NULL' WHERE `user`.`ID_USER` = '".$_SESSION['ID_USER']."'")))
	{		session_unset();		header('Location: index.php');}
?>
