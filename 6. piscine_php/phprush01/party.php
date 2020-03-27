<?php
require_once "db/db_connect.php";
?>
<header>
	<form target='_parent' action="/db/createparty.php" method="post">
		<input type="submit" name="submit" value="Create game" />
	</form>
</header>
<?php
$allparty = $db->query("SELECT * FROM party")->fetch_all();
if (count($allparty) >= 0)
{
	foreach ($allparty as $party)
	{
		$login = $db->query("SELECT login FROM player WHERE id LIKE ".$party[1])->fetch_all();
		echo "
		<form target='_parent' action='/db/joinparty.php' method='post'>
			<input type='submit' name='submit' value='join ".$login[0][0]."' />
		</form>
		";
	}
}
else
	echo "No party sorry :(";
?>
