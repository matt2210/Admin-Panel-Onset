<?php
date_default_timezone_set('Europe/Paris');

try
{
  $user = "onset";
  $pass = "Matt2210!100";
  $bdd = new PDO('mysql:host=plesk1.dyjix.eu;dbname=gengen', $user, $pass);
}
catch (Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
//die('Erreur : ' . $e->getMessage());
  die();
}
?>
