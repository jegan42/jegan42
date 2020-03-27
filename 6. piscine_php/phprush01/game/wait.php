<?php
session_start();

require_once "../db/db_connect.php";
$id_secondplayer = $db->query("SELECT id_player2 FROM party WHERE id LIKE ".$_SESSION['idparty']."")->fetch_all()[0][0];
if ($id_secondplayer != '')
	header("Location: index.php");
echo "Please wait for an opponent :D\n";
?>
<head>
	<meta http-equiv="refresh" content="5">
</head>
