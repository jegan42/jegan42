#!/usr/bin/php
<?PHP
	$i = 0;
	while (++$i < $argc)
		$str = $str." ".$argv[$i];
	$str = array_filter(explode(' ', $str));
	sort($str);
	$i = -1;
	while ($str[++$i])
		echo "$str[$i]\n";
?>