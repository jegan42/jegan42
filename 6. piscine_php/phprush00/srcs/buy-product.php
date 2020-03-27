<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <h2>Mon super Goodies</h2>

    <?PHP
    $bdd = unserialize(file_get_contents("../bdd/serialized"));
    $flag = 0;
    $id = $_GET[product] - 1;
    foreach ($bdd as $num_product)
    {
        if ($num_product[0] == $_GET[product])
          $flag = 1;
    }
    if (isset($_GET[product]) && $_GET[product] != NULL &&
    $_GET[product] >= 0 && is_numeric($_GET[product]) && $flag == 1)
    {
      echo "<a href='boutique.php' class='admin-users'>Revenir à la liste</a><br/><br/>";
      echo "<table id='page-product'>";
      echo "<tr><td class='nom-product'>".$bdd[$id][1]."</td><tr/>";
      echo "<tr><td><img src='".$bdd[$id][6]."'/ style='width:100%;'></td><tr/>";
      echo "<tr><td>Catégories : ".$bdd[$id][2].", ".$bdd[($id)][3]."</td><tr/>";
      echo "<tr><td>Prix : ".$bdd[$id][5]."</td><tr/>";
	  echo "<tr><td><a href='add_panier.php?product=".$bdd[$id][0]."'>Je le mets dans mon panier</a></td><tr/>";
      echo "</table>";
    }
    else {
      echo "<meta http-equiv='refresh' content='0,url=boutique.php'>";
      exit();
    }
    ?>
  </div>
</body>
</html>
