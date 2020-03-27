<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    
    <?PHP
     $path = "../private";
     $file = $path."/categories";
     $unserialized = unserialize(file_get_contents($file));
   echo "<h2>Boutique</h2>";
   echo "<aside>";
   echo "<p>Catégories :</p>";
   echo "<form method='post' action='check-box-boutique.php'>";
   foreach ($unserialized as $key=>$value)
   {
     foreach ($value as $elem)
     {
       echo "<input type='checkbox' name='".$elem."' checked='checked'> ".$elem."<br/>";
   }
 }
   echo "<input type='submit' name = 'submit' value='Valider' />";
   echo "</form>";
   echo "</aside>";
  ?>

  <?PHP
   $bdd = unserialize(file_get_contents("../bdd/serialized"));
   echo "<table id='boutique-product'>";
   foreach ($bdd as $prod)
   {
     echo "<tr><td class='nom-product'>".$prod[1]."</td></tr>";
     echo "<tr><td><img src='".$prod[6]."'/ style='width:100%;'></td><tr/>";
     echo "<tr><td class='acheter-product'><a href='buy-product.php?product=".$prod[0]."'>J'achète ce produit !</a></td></tr>";
   }
   echo "</table>";

  ?>
</div>
</body>
</html>
