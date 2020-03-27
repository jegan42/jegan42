<?php
function	auth($login, $passwd)
{
	require_once "db_connect.php";
	
	if (!$login || !$passwd || !$db)
		return (FALSE);
	$hash = hash("whirlpool", $passwd.hash("whirlpool", "je suis tellement magnifique, cette phrase serre de sallage"));
	$res = $db->query("SELECT login FROM player WHERE login LIKE '$login' AND passwd LIKE '$hash'");
	$reqtab = $res->fetch_all();
	if (count($reqtab) == 1)
		return (TRUE);
	return (FALSE);
}
?>
