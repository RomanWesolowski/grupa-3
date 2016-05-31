<?php
	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "romanwesolowski_cba_pl";

function connect_db()
{
    $db = new mysqli("localhost", "root", "", "romanwesolowski_cba_pl");

    $db -> query('SET NAMES utf8');
    $db -> query('SET CHARACTER_SET utf8_unicode_ci');

    if (! $db)
      return false;

    $db->autocommit(TRUE);
    return $db;
}
