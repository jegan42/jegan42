#!/usr/bin/php
<?PHP
	$i = 0;
	while (++$i < $argc)
		$str = $str." ".$argv[$i];
	$tab = array_filter(explode(' ', $str));
	sort($tab);
	$sort = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	$i = -1;
	$nbw = count($tab);
	while (++$i < 95 && ($j = -1))
		while (++$j < $nbw)
			if ($tab[$j][0] == $sort[$i])
				echo ($tab[$j])."\n";
?>