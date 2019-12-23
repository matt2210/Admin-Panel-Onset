<?php
date_default_timezone_set('Europe/Paris');

try
{
  $user = "LOGIN";
  $pass = "PASSWORD";
  $bdd = new PDO('mysql:host=HOST;dbname=DBNAME', $user, $pass);
}
catch (Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
//die('Erreur : ' . $e->getMessage());
  die();
}
?>
