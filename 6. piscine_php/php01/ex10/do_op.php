#!/usr/bin/php
<?PHP
if ($argc == 4)
{
	$i = 0;
	while (++$i < $argc)
		$argv[$i] = trim($argv[$i]);
	if ($argv[2] == '+')
		$res = $argv[1] + $argv[3];
	else if ($argv[2] == '-')
		$res = $argv[1] - $argv[3];
	else if ($argv[2] == '*')
		$res = $argv[1] * $argv[3];
	else if ($argv[2] == '/')
		$res = $argv[1] / $argv[3];
	else if ($argv[2] == '%')
		$res = $argv[1] % $argv[3];
	echo "$res\n";
}
else
	echo "Incorrect Parameters\n";
?>