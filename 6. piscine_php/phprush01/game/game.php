<?php
require_once "class.inc.php";
session_start();

?>
<head>
	<link rel="stylesheet" href="/game/css/game.css" />
</head>
<div class="table">
	<?php
	foreach ($_SESSION['party']->get_team1()->get_shiplist() as $ship)
	{
		echo"
		<div class='ship' style='height:".$ship->get_scale_y()."%; width:calc(100% / 150 * ".$ship->get_scale_x().");
			top:calc(1% * ".$ship->get_y()."); left:calc(100% / 150 * ".$ship->get_x().");'>
			<img src='".$ship->get_img()."' title='Name: ".$ship->get_name()." Hp: ".$ship->get_hp()."'
			style='height:100%; width:100%; transform: rotate(".$ship->get_angle()."deg);'>
		</div>
		";
	}
	foreach ($_SESSION['party']->get_team2()->get_shiplist() as $ship)
	{
		echo"
		<div class='ship' style='height:".$ship->get_scale_y()."%; width:calc(100% / 150 * ".$ship->get_scale_x().");
			top:calc(1% * ".$ship->get_y()."); left:calc(100% / 150 * ".$ship->get_x().");'>
			<img src='".$ship->get_img()."' title='Name: ".$ship->get_name()." Hp: ".$ship->get_hp()."'
			style='height:100%; width:100%; transform: rotate(".$ship->get_angle()."deg);'>
		</div>
		";
	}
	?>
</div>