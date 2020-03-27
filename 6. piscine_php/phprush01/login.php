<?php
require_once "db/auth.php";
session_start();

if (!isset($_SESSION['login']))
{
	if (isset($_POST['submit']) && isset($_POST['submit']) == 'OK')
	{
		if (!auth($_POST['login'], $_POST['passwd']))	
		{
			header("Location: index.html");
			exit ;
		}
		else
			$_SESSION['login'] = $_POST['login'];
	}
	else
	{
		header("Location: index.html");
		exit ;
	}	
}
?>
<html>
	<body>
		<iframe name="chat" src="chat.php" height="550px" width="100%"></iframe>
		<iframe name="speak" src="speak.php" height="50px" width="100%"></iframe>
		<a href="logout.php">Logout here</a><br />
		<iframe name="party" src="party.php" height="50%" width="50%"></iframe>
	</body>
</html>
