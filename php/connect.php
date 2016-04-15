<?php
function connect_db()
{
    $db = new mysqli('mysql.cba.pl', 'romanwdb', 'komunikator123', 'romanwesolowski_cba_pl');
      
    $db -> query('SET NAMES utf8');
    $db -> query('SET CHARACTER_SET utf8_unicode_ci');
    
    if (! $db)
      return false;
    
    $db->autocommit(TRUE);
    return $db;
}
