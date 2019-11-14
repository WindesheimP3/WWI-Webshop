<?php
// inlog gegevens om in de database te komen
// lokale host
$host = "localhost";
// Database van het kbs project
$databasename = "wideworldimporters";
// gebruikersnaam voor inloggen
$user = "root";
// geen vastgesteld wachtwoord (leeg veld)
$pass = "";
// port
$port = "3306";
// connectie maken met database d.m.v inlog gegevens
$connect = mysqli_connect($host, $user, $pass, $databasename,  $port);
?>

