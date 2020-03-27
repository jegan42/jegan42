<?php
session_start();
$_SESSION['acheter'] = "";
$path = "private";
$file = $path."/passwd";
if (!file_exists($path))
{
  mkdir ($path);
}
  $my_file = fopen("$file", "x");

  $tab[0][nom] = 'admin';
  $tab[0][prenom] = 'admin';
  $tab[0][mail] = 'admin';
  $tab[0][passwd] = hash(sha512, "admin");

  $serialized[] = serialize($tab);
  file_put_contents($file, $serialized);
include("srcs/boutique_get_bdd.php");

$file_cat = $path."/categories";
if (!file_exists($file_cat))
{
  $my_file_cat = fopen("$file_cat", "x");

  $tab_cat[cat1][0] = 'blackpink';
  $tab_cat[cat1][1] = 'bts';
  $tab_cat[cat1][2] = 'girlsgeneration';
  $tab_cat[cat1][3] = 'got7';
  $tab_cat[cat2][0] = 'poster';
  $tab_cat[cat2][1] = 'sac';
  $tab_cat[cat2][2] = 'sweet';
  $tab_cat[cat2][3] = 'coussin';

  $serialized_cat[] = serialize($tab_cat);
  file_put_contents($file_cat, $serialized_cat);
}

echo "<meta http-equiv='refresh' content='0,url=index.php'>";
?>
