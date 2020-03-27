#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');
	if (($fd = fopen("/var/run/utmpx", 'r')) === false)
		exit ;
	while ($utmpx = fread($fd, 628)){
		$unpack = unpack("A256name/A4tty/A32tty_complete/iPID/iProcess/Iconnection_date", $utmpx);
		if ($unpack['Process'] == 7)
			$arr[] = $unpack;
	}
	fclose($fd);
	ksort($arr);
	foreach ($arr as $ele){
			echo str_pad(substr($ele['name'], 0, 8), 9, " ");
			echo str_pad(substr($ele['tty_complete'], 0, 8), 9, " ");
			echo date("M j H:i ", $ele['connection_date']);
			echo "\n";
	}
?>