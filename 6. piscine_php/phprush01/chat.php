<?php
require_once "db/db_connect.php";

date_default_timezone_set("Europe/Paris");
$tab = $db->query("SELECT * FROM chat ORDER BY date")->fetch_all();
foreach ($tab as $elem)
{
	echo "[".date('h:m', $elem['1'])."] <b>".$elem['0']."</b>: ".$elem['2']."<br />\n";
}
?>