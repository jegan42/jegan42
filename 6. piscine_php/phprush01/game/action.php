<?php
require_once "class.inc.php";
session_start();

if (isset($_POST['submit']))
{
	$tab = explode(' ', $_POST['submit']);
	if ($_SESSION['party']->get_phase() == 0 && $tab[0] == "Select")
	{
		$_SESSION['party']->set_shipselect($_SESSION['party']->get_currentteam()->get_shipbyname($tab[1]));
		$_SESSION['party']->nextphase();
		require_once "../db/db_connect.php";
		$party = serialize($_SESSION['party']);
		$db->query("UPDATE party SET party='$party' WHERE id='".$_SESSION['idparty']."'");
	}
	else if ($tab[0] == "Add" && $tab[1] == "Speed" && $_SESSION['party']->get_shipselect()->get_pp() - 1 >= 0)
	{
		$_SESSION['party']->get_currentteam()->increasespeedthrow();
		$_SESSION['party']->get_shipselect()->set_pp($_SESSION['party']->get_shipselect()->get_pp() - 1);
		require_once "../db/db_connect.php";
		$party = serialize($_SESSION['party']);
		$db->query("UPDATE party SET party='$party' WHERE id='".$_SESSION['idparty']."'");
	}
	else if ($tab[0] == "Add" && $tab[1] == "Weapon" && $_SESSION['party']->get_shipselect()->get_pp() - 1 >= 0)
	{
		$_SESSION['party']->get_currentteam()->increaseweaponthrow();
		$_SESSION['party']->get_shipselect()->set_pp($_SESSION['party']->get_shipselect()->get_pp() - 1);
		require_once "../db/db_connect.php";
		$party = serialize($_SESSION['party']);
		$db->query("UPDATE party SET party='$party' WHERE id='".$_SESSION['idparty']."'");
	}
	else if ($tab[0] == "Add" && $tab[1] == "Shield" && $_SESSION['party']->get_shipselect()->get_pp() - 1 >= 0)
	{
		$_SESSION['party']->get_shipselect()->set_ps($_SESSION['party']->get_shipselect()->get_ps() + 1);
		$_SESSION['party']->get_shipselect()->set_pp($_SESSION['party']->get_shipselect()->get_pp() - 1);
	}
	else if ($tab[0] == "Next" && $tab[1] == "step")
		$_SESSION['party']->nextphase();
	else if ($tab[0] == "Turn" && $_SESSION['party']->get_shipselect()->get_pm() - 1 >= 0)
	{
		if ($tab[1] == "right")
			$_SESSION['party']->get_shipselect()->turnright();
		else
			$_SESSION['party']->get_shipselect()->turnleft();
		$_SESSION['party']->get_shipselect()->set_pm($_SESSION['party']->get_shipselect()->get_pm() - 1);
	}
	else if ($tab[0] == "Forward" && $_SESSION['party']->get_shipselect()->get_pm() - 1 >= 0)
	{
		$_SESSION['party']->get_shipselect()->forward();
		$_SESSION['party']->get_shipselect()->set_pm($_SESSION['party']->get_shipselect()->get_pm() - 1);
	}
	else if ($tab[0] == "Throw" && $tab[1] == "Speed" && $_SESSION['party']->get_currentteam()->get_speedthrow() - 1 >= 0)
	{
		$_SESSION['des'] = rand(1, 6);
		$_SESSION['party']->get_shipselect()->set_pm($_SESSION['party']->get_shipselect()->get_pm() + $_SESSION['des']);
		$_SESSION['party']->get_currentteam()->decreasespeedthrow();
	}
	else if ($tab[0] == "Throw" && $tab[1] == "Weapon" && $_SESSION['party']->get_currentteam()->get_weaponthrow() - 1 >= 0)
	{
		$_SESSION['des'] = rand(1, 6);
		$_SESSION['party']->get_currentteam()->decreaseweaponthrow();
	}
	require_once "../db/db_connect.php";
	$party = serialize($_SESSION['party']);
	$db->query("UPDATE party SET party='$party' WHERE id='".$_SESSION['idparty']."'");
}
?>
<head>
	<link rel="stylesheet" href="/game/css/action.css" />
</head>
<body>
	<header class="teamtitle">
		<h1><?php print $_SESSION['party']->get_currentteam()->get_name(); ?><h1>
	</header>
	<div class="principal">
		<div>
			<?php
			if ($_SESSION['party']->get_phase() == 0)
			{
				foreach ($_SESSION['party']->get_team1()->get_shiplist() as $ship)
				{
					echo "
					<div class='shipview'>
						<h3 class='shiptitle'>".$ship->get_name()."</h3>
						<hr />
						<img width=50% src='".$ship->get_img()."' title='".$ship->get_name()."'/>";
					if ($_SESSION['party']->get_currentteam()->get_name() == $_SESSION['login'])
					{
						echo "
						<form action='action.php' method='post'>
							<input type='submit' name='submit' value='Select ".$ship->get_name()."' />
						</form>";
					}
					echo "</div>";
				}
			}
			else
			{
				?>
				<div class='shipview'>
					<h3 class='shiptitle'><?php echo $_SESSION['party']->get_shipselect()->get_name() ?></h3>
					<hr />
					<img width=50% src="<?php echo $_SESSION['party']->get_shipselect()->get_img() ?>" title="<?php echo $_SESSION['party']->get_shipselect()->get_name() ?>" />
				</div>

				<?php
				echo "
					<div>
						<div class='shipinfo'>
							Ship Hp: ".$_SESSION['party']->get_shipselect()->get_hp()."<br />
							Ship Po: ".$_SESSION['party']->get_shipselect()->get_po()."<br />
							Ship Pm: ".$_SESSION['party']->get_shipselect()->get_pm()."<br />
							Size ship: ".$_SESSION['party']->get_shipselect()->get_scale_x()." x ".$_SESSION['party']->get_shipselect()->get_scale_y()."<br />
							<hr />
						</div>";
				if ($_SESSION['party']->get_phase() == 1)
				{
					echo"<h3 class='shipinfo'>Current Speed Throw: ".$_SESSION['party']->get_currentteam()->get_speedthrow()."</h3>";
						if ($_SESSION['party']->get_currentteam()->get_name() == $_SESSION['login'])
							echo"<form class='boxstep' action='action.php' method='post'>
									<input class='nextstep' type='submit' name='submit' value='Add Speed Throw' />
								</form>";
						echo"<h3 class='shipinfo'>Current Weapon Throw: ".$_SESSION['party']->get_currentteam()->get_weaponthrow()."</h3>";
						if ($_SESSION['party']->get_currentteam()->get_name() == $_SESSION['login'])
							echo"<form class='boxstep' action='action.php' method='post'>
								<input class='nextstep' type='submit' name='submit' value='Add Weapon Throw' />
							</form>";
						echo"<h3 class='shipinfo'>Current Shield point: ".$_SESSION['party']->get_shipselect()->get_ps()."</h3>";
						if ($_SESSION['party']->get_currentteam()->get_name() == $_SESSION['login'])
							echo"<form class='boxstep' action='action.php' method='post'>
								<input class='nextstep' type='submit' name='submit' value='Add Shield point' />
							</form>";
						echo"<h3 class='shipinfo'>PP remaining: ".$_SESSION['party']->get_shipselect()->get_pp()."</h3>";
				}
				if ($_SESSION['party']->get_phase() >= 2)
				{
					echo"
						<div class='desbox'>
							".$_SESSION['des']."
						</div>";
					if ($_SESSION['party']->get_phase() == 2)
						echo"<h3 class='shipinfo'>Remaining Throw: ".$_SESSION['party']->get_currentteam()->get_speedthrow()."</h3>
						<form class='boxstep' action='action.php' method='post'>
							<input class='nextstep' type='submit' name='submit' value='Throw Speed' />
						</form>";
					else if ($_SESSION['party']->get_phase() == 3)
						echo"<h3 class='shipinfo'>Remaining Throw: ".$_SESSION['party']->get_currentteam()->get_weaponthrow()."</h3>
						<form class='boxstep' action='action.php' method='post'>
							<input class='nextstep' type='submit' name='submit' value='Throw Weapon' />
						</form>";
					if ($_SESSION['party']->get_currentteam()->get_name() == $_SESSION['login'] && $_SESSION['party']->get_phase() == 2)
						echo"<div class='divinput'>
								<form action='action.php' method='post'>
									<input class='input' type='submit' name='submit' value='Turn Right' />
								</form>
								<form action='action.php' method='post'>
									<input class='input' type='submit' name='submit' value='Forward' />
								</form>
								<form action='action.php' method='post'>
									<input class='input' type='submit' name='submit' value='Turn Left' />
								</form>
							</div>
							";
				}
				echo "</div>";
			}
			?>
		</div>
	</div>
	<?php
	if ($_SESSION['party']->get_phase() > 0 && $_SESSION['party']->get_currentteam()->get_name() == $_SESSION['login'])
	{
		echo "
		<form class='boxstep' action='action.php' method='post'>
			<input class='nextstep' type='submit' name='submit' value='Next step' />
		</form>
		";
	}
	?>
	<footer class="footer">
		<div class="phaseview" <?php if ($_SESSION['party']->get_phase() == 0) { echo "id='select'"; }?>>
			Select phase
		</div>
		<div class="phaseview" <?php if ($_SESSION['party']->get_phase() == 1) { echo "id='select'"; }?>>
			PP phase
		</div>
		<div class="phaseview" <?php if ($_SESSION['party']->get_phase() == 2) { echo "id='select'"; }?>>
			Movement phase
		</div>
		<div class="phaseview" <?php if ($_SESSION['party']->get_phase() == 3) { echo "id='select'"; }?>>
			Shoot phase
		</div>
	</footer>
</body>
