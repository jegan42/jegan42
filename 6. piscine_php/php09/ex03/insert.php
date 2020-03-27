<?php
$id = 0;
$file = file("list.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($file as $line) {
	$tmp = explode(";", $line);
	if ($tmp[0] >= $id)
		$id = $tmp[0] + 1;
}
foreach ($_GET as $k => $v) {
	file_put_contents('list.csv', $id.';'.$_GET[$k]."\n", FILE_APPEND);
}

?>
