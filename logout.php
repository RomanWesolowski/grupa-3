<?php
	session_start();
	require_once ('connect.php');	$polaczenie = connect_db();
	if ($rezultat = @$polaczenie->query(		sprintf("UPDATE `user` SET `FLAGA` = 'NULL' WHERE `user`.`ID_USER` = '".$_SESSION['ID_USER']."'")))
	{		session_unset();		header('Location: index.php');}
?>
