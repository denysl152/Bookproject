<?php

$database = 'sitebooking';
$dbserver = 'localhost';
$dbusername = 'root';
$dbpass = 'martinique';

$connection = mysqli_connect($dbserver, $dbusername, $dbpass);
if (!$connection){
		die("La connection a la base de donnée n'a pas été établie" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, $database);
if (!$select_db){
		die("Echec de connexion" .  mysqli_error($connection));
}
?>
