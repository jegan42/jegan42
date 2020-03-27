<?php
require_once "db_connect.php";
session_start();

$login = explode(' ', $_POST['submit'])[1];
$mateid = $db->query("SELECT id FROM player WHERE login LIKE '".$login."'")->fetch_all()[0][0];
if ($mateid)
{
	$sessionid = $db->query("SELECT id FROM party WHERE id_player1 LIKE '".$mateid."'")->fetch_all()[0][0];
	$myid = $db->query("SELECT id FROM player WHERE login LIKE '".$_SESSION['login']."'")->fetch_all()[0][0];
	$db->query("UPDATE party SET id_player2=".$myid." WHERE id=".$sessionid);
	$_SESSION['idparty'] = $sessionid;
	header("Location: ../game/index.php");
}
else
	header("Location: ../login.php");
?>
