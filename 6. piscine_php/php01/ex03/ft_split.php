<?PHP
	function ft_split($text)
	{
		$text = array_filter(explode(' ', $text));
		sort($text);
		return($text);
	}
?>