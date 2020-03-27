#!/usr/bin/php
<?php
	$stdin = fopen("php://stdin", "r");
	while ($stdin && !feof($stdin)) {
		echo "Entrez un nombre: ";
		if (fgets($stdin))
		{
			$pile = str_replace("\n", "",fgets($stdin));
			if(!is_numeric($pile))
				echo "'$pile' n'est pas un chiffre\n";
			else if($pile % 2 == 0)
				echo "Le chiffre $pile est Pair\n";
			else
				echo "Le chiffre $pile est Impair\n";
		}
	}
    fclose($stdin);
	echo "\n";
?>