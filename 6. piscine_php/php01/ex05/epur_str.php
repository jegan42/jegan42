#!/usr/bin/php
<?php
	$i = 0;
	while (++$i < $argc)
	{
		$clean = trim($argv[$i]);
		while ((strpos($clean, "  ")))
			$clean = str_replace("  ", " ", $clean);
		echo("$clean\n");
	}
?>