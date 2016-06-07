<?php
session_start();
if(!empty($_POST['funkcja'])){
  if($_POST['funkcja']=='dz'){
    if(!empty($_POST['email1'])){
      dodajZnajomego($_POST['email1']);
    }
  }
}

function dodajZnajomego($emailZnajomego)
{
  echo 'Funkcja dodawania znajomych';
}

?>
