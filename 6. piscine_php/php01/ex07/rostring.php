#!/usr/bin/php
<?PHP
	if (1 < $argc)
	{
		$nbw = str_word_count($argv[1]);
		$str = array_filter(explode(' ', trim($argv[1])));
		$i = 0;
		while (++$i < $nbw)
			echo "$str[$i] ";
		echo "$str[0]\n";
	}
?>