#!/usr/bin/php
<?PHP
if ($argc == 2 && count(explode(" ", $argv[1])) == 5)
{
	$fr = ['/[Jj]anvier/', '/[Ff]évrier/', '/[Mm]ars/', '/[Aa]vril/', '/[Mm]ai/', '/[Jj]uin/', '/[Jj]uillet/', '/[Aa]oût/', '/[Ss]eptembre/', '/[Oo]ctobre/', '/[Nn]ovembre/', '/[Dd]écembre/', '/[Ll]undi/', '/[Mm]ardi/', '/[Mm]ercredi/', '/[Jj]eudi/', '/[Vv]endredi/', '/[Ss]amedi/', '/[Dd]imanche/'];
	$eng = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
	date_default_timezone_set("Europe/Paris");
	if ($date = DateTime::createFromFormat("l j M Y H:i:s", preg_replace($fr, $eng, trim($argv[1]))))
		exit(date_timestamp_get($date)."\n");
}
exit("Wrong Format\n");
?>