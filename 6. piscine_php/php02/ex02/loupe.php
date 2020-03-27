#!/usr/bin/php
<?php
function toup($arr) {
	$str = preg_replace('/'.$arr[1].'/', strtoupper($arr[1]), $arr[0]);
	return ($str);
}

if ($argc < 2)
	exit();
$i = 0;
while ($argv[++$i])
{
	if (file_exists($argv[$i]))
	{
		$str = file_get_contents($argv[$i]);
		$str = preg_replace_callback('/<div.*?>(.*?)</s', 'toup', $str);
		$str = preg_replace_callback('/<span.*?>(.*?)</s', 'toup', $str);
		$str = preg_replace_callback('/\s+title="(.*?)".*?>/s', 'toup', $str);
		$str = preg_replace_callback('/<a.*?>(.*?)</s', 'toup', $str);
		echo $str;
	}
}