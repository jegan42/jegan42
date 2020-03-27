<?php
require_once "db_connect.php";
session_start();

if (!isset($_SESSION['login']))
{
	header("Location: ../index.html");
	exit ;
}
$id = $db->query("SELECT id FROM player WHERE `login` LIKE '".$_SESSION['login']."'")->fetch_all()[0][0];
if (count($db->query("SELECT id FROM party WHERE `id_player1` LIKE '".$id."'")->fetch_all()) <= 0)
{
	$req = "INSERT INTO party (`id_player1`) VALUES ('".$id[0][0]."')";
	$db->query($req);
}
$_SESSION['idparty'] = $db->query("SELECT id FROM party WHERE id_player1 LIKE '".$id."'")->fetch_all()[0][0];
header("Location: ../game/wait.php");
?>
