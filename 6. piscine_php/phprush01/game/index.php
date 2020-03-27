<?php
require_once "class.inc.php";
session_start();

require_once "../db/db_connect.php";
$party = $db->query("SELECT party FROM party WHERE id='".$_SESSION['idparty']."'")->fetch_all()[0][0];
if ($party == '')
{
	$id_login1 = $db->query("SELECT id_player1 FROM party WHERE id LIKE '".$_SESSION['idparty']."'")->fetch_all()[0][0];
	$id_login2 = $db->query("SELECT id_player2 FROM party WHERE id LIKE '".$_SESSION['idparty']."'")->fetch_all()[0][0];
	$login1 = $db->query("SELECT login FROM player WHERE id LIKE '".$id_login1."'")->fetch_all()[0][0];
	$login2 = $db->query("SELECT login FROM player WHERE id LIKE '".$id_login2."'")->fetch_all()[0][0];
	$party = new Party(array('team1' => new Team(array('name' => $login1)), 'team2' => new Team(array('name' => $login2))));
	$party->get_team1()->addship(new Invader(array('name' => "Invader", 'y' => 25, 'x' => 20, 'angle' => 90,)));
	$party->get_team1()->addship(new TowerTurtle(array('name' => "TowerTurtle", 'y' => 50, 'x' => 20, 'angle' => 90,)));
	$party->get_team1()->addship(new SpiderSpike(array('name' => "SpiderSpike", 'y' => 75, 'x' => 20, 'angle' => 90,)));
	$party->get_team2()->addship(new Invader(array('name' => "Invader", 'y' => 25, 'x' => 130, 'angle' => -90,)));
	$party->get_team2()->addship(new TowerTurtle(array('name' => "TowerTurtle", 'y' => 50, 'x' => 130, 'angle' => -90,)));
	$party->get_team2()->addship(new SpiderSpike(array('name' => "SpiderSpike", 'y' => 75, 'x' => 130, 'angle' => -90,)));
	$party->createmap();
	$party = serialize($party);
	$db->query("UPDATE party SET party='$party' WHERE id='".$_SESSION['idparty']."'");
}
$_SESSION['party'] = unserialize($party);
?>

<head>
	<link rel="stylesheet" href="/game/css/index.css" />
	<meta http-equiv="refresh" content="2">
</head>
<body>
	<iframe id="actionview" name="actionview" src="/game/action.php" height="100%" width="20%"></iframe>
	<iframe id="gameview" name="gameview" src="/game/game.php" height="100%" width="80%"></iframe>
</body>
