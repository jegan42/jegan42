<?php
require_once "db/db_connect.php";
session_start();
if (!$_SESSION['login'])
{
	header("Location: index.html");
	exit;
}
if ($_POST['msg'])
	$tab = $db->query("INSERT INTO chat (`login`, `date`, `msg`) VALUES ('".$_SESSION['login']."', '".time()."', '".$_POST['msg']."')")->fetch_all();
?>
<html>
	<head>
		<script langage='javascript'>top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form action='speak.php' method='post'>
			<input type='text' name='msg' />
		</form>
	</body>
</html>
