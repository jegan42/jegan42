<?PHP
function ft_is_sort($tab)
{
	$test = $tab;
	sort($test);
	$i = -1;
	$nbw = count($test);
	while (++$i < $nbw)
		if ($test[$i] != $tab[$i])
			return (0);
	return (1);
}
?>
