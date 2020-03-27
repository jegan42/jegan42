#!/usr/bin/php
<?PHP
if ($argc == 2)
	if (strpos($argv[1], '+'))
	{
		$res = explode('+', $argv[1]);
		if (count($res) == 2 && is_numeric(trim($res[0])) && is_numeric(trim($res[1])))
			echo $res[0] + $res[1];
		else
			echo "Syntax Error";
	}
	else if (strpos($argv[1], '-'))
	{
		$res = explode('-', $argv[1]);
		if (count($res) == 2 && is_numeric(trim($res[0])) && is_numeric(trim($res[1])))
			echo $res[0] - $res[1];
		else
			echo "Syntax Error";
	}
	else if (strpos($argv[1], '*'))
	{
		$res = explode('*', $argv[1]);
		if (count($res) == 2 && is_numeric(trim($res[0])) && is_numeric(trim($res[1])))
			echo $res[0] * $res[1];
		else
			echo "Syntax Error";
	}
	else if (strpos($argv[1], '/'))
	{
		$res = explode('/', $argv[1]);
		if (count($res) == 2 && is_numeric(trim($res[0])) && is_numeric(trim($res[1])))
			echo $res[0] / $res[1];
		else
			echo "Syntax Error";
	}
	else if (strpos($argv[1], '%'))
	{
		$res = explode('%', $argv[1]);
		if (count($res) == 2 && is_numeric(trim($res[0])) && is_numeric(trim($res[1])))
			echo $res[0] / $res[1];
		else
			echo "Syntax Error";
	}
	else
		echo "Syntax Error";
else
	echo "Incorrect Parameters";
echo "\n";
?>