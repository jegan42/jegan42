<?PHP session_start();
include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Retourner à la liste</a><br/><br/>
    <h2>Liste des Produits</h2>
    <?PHP
    $path = "../../bdd";
    $file = $path."/serialized";
    if (!file_exists($file))
    {
      echo "<p>Aucun produit n'est disponible à la vente</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));
      echo "<div id='tab-admin-product'>";
      echo "<table>";
      echo "<tr>
      <th>Id</th>
      <th>Nom Produit</th>
      <th>Groupe</th>
      <th>Goodies</th>
      <th>Quantité</th>
      <th>Prix</th>
      <th>Image</th>
      </tr>";
      foreach ($unserialized as $elem)
      {
        echo "<tr>
        <td>".$elem[0]."</td>
        <td>".$elem[1]."</td>
        <td>".$elem[2]."</td>
        <td>".$elem[3]."</td>
        <td>".$elem[4]."</td>
        <td>".$elem[5]."</td>
        <td>".$elem[6]."</td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    ?>
    <br/>
    <h2>Ajouter un produit</h2>
    <div id="add-user">
      <br/><p> Veuillez indiquer le produit à rajouter :</p>
      <br/>
      <form method="post" action="admin-add-product.php">
        Nom Produit : <input type="text" name="nomproduit"/><br/><br/>
        Groupe : <input type="text" name="groupe"/><br/><br/>
        Goodies : <input type="text" name="goodies"/><br/><br/>
        Quantité : <input type="text" name="quantite"/><br/><br/>
        Prix : <input type="text" name="prix"/><br/><br/>
        Image : <input type="file" name="image"/><br/><br/>
        <input type="submit" name = "submit" value="Envoyer" />
      </form>
    </div>
    <?php
    if ($_SESSION['flagchamps'] == "ko")
    {
      echo "<p id='error'>Erreur : vous devez remplir tous les champs\n</p>";
      $_SESSION['flagchamps'] = NULL;
    }
    else if ($_SESSION['flagcreation'] == "ok")
    {
      echo "<div id='inscription-ok'>Félicitation ! Vous possédez un nouveau produit !</div>";
      $_SESSION['flagcreation'] = NULL;
    }

    ?>
    <br/><h2>Modifier un produit</h2>
    <br/><p>Entrez l'identifiant du produit que vous souhaitez modifier,
      ainsi que les modifications que vous souhaitez apporter :</p><br/>
    <form method="post" action="admin-modif-product.php">
      Identifiant du produit : <input type="text" name="id"/><br/><br/>
      Nom du produit : <input type="text" name="produit"/><br/><br/>
      Groupe : <input type="text" name="groupe"/><br/><br/>
      Goodies : <input type="text" name="goodies"/><br/><br/>
      Quantité : <input type="text" name="quantite"/><br/><br/>
      Prix : <input type="text" name="prix"/><br/><br/>
      Image : <input type="file" name="image"/><br/><br/>
      <input type="submit" name = "submit" value="Envoyer" />
    </form>
<?PHP

if ($_SESSION['flag_modif_product'] == "ko")
{
  echo "<p id='error'>Erreur : aucun produit trouvé avec cet identifiant</p>";
  $_SESSION['flag_modif_product'] = "";
}
else if ($_SESSION['flag_champs_modif_product'] == "ko")
{
  echo "<p id='error'>Erreur : Vous devez remplir tous les champs !</p>";
  $_SESSION['flag_champs_modif_product'] = "";
}
else if ($_SESSION['flag_modif_product'] == "ok")
{
  echo "<p id='inscription-ok'>Votre produit a bien été modifié !</p>";
  $_SESSION['flag_modif_product'] = "";
}
?>
    <br/><h2>Supprimer un produit</h2>
    <br/><p>Entrez l'identifiant du produit que vous souhaitez supprimer :</p><br/>
    <form method="post" action="admin-delete-product.php">
      Identifiant du produit : <input type="text" name="id"/>
      <input type="submit" name = "submit" value="Envoyer" />
    </form>

    <?php
    if ($_SESSION['no-product-to-delete'] == "ko")
    {
      echo "<p id='error'>Erreur : aucun produit présent dans la base de données</p>";
      $_SESSION['no-product-to-delete'] = "";
    }
    else {

      if ($_SESSION['flag_suppression_product'] == "ok")
      {
        echo "<p id='inscription-ok'>Adieu petit produit !</p>";
        $_SESSION['flag_suppression_product'] = "";
      }
      else if ($_SESSION['flag_suppression_product'] == "ko")
      {
        echo "<p id='error'>Erreur : aucun produit trouvé avec cet identifiant</p>";
        $_SESSION['flag_suppression_product'] = "";
      }
    }
    ?>
  </div>
</body>
<br/><br/><br/>

</html>
