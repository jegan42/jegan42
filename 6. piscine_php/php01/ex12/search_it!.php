#!/usr/bin/php
<?PHP
if ($argc > 2)
{
	$i = 1;
	while (++$i < $argc)
	{
		$str .= $argv[$i];
		if ($i + 1 != $argc)
			$str.= "&";
	}
	parse_str(str_replace(":", "=", $str), $tab);
	if (array_key_exists($argv[1], $tab))
		echo $tab[$argv[1]]."\n";
}
?>