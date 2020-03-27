<?php
require_once "db_connect.php";

if ($_POST['submit'] == "OK" && $_POST['login'] && $_POST['passwd'] && $_POST['conf-passwd']
	&& $_POST['passwd'] == $_POST['conf-passwd'])
{
	$hash = hash("whirlpool", $_POST['passwd'].hash("whirlpool", "je suis tellement magnifique, cette phrase serre de sallage"));
	$name = $_POST['login'];
	$db->query("INSERT INTO player (`login`, `passwd`) VALUE ('$name', '$hash')");
	header("Location: ../index.html");
}
?>