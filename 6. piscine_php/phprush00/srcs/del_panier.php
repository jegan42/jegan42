<?php  session_start(); ?>
<?PHP
$_SESSION = NULL;
$_SESSION['nb_articles'] = 1;
$_SESSION['panier'][] = NULL;
echo "<meta http-equiv='refresh' content='0,url=panier.php'>";
?>
