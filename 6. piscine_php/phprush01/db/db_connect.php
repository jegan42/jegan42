<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "123456";
$dbname = "rush01";

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($db->connect_errno)
	echo "Echec lors de la connexion à MySQL : (" . $db->connect_errno . ") " . $db->connect_error;
?>