<?PHP
session_start();
function	get_data()
{
  if ((isset($_POST['id']) && $_POST['id'] != NULL) &&
  (isset($_POST['nom']) && $_POST['nom'] != NULL) &&
  (isset($_POST['categorie1']) && $_POST['categorie1'] != NULL) &&
  (isset($_POST['categorie2']) && $_POST['categorie2'] != NULL) &&
  (isset($_POST['quantite']) && $_POST['quantite'] != NULL) &&
  (isset($_POST['prix']) && $_POST['prix'] != NULL) &&
  (isset($_POST['image']) && $_POST['image'] != NULL) &&
  (isset($_POST['submit']) && $_POST['submit'] === "Envoyer"))
  {
    $tab[0] = $_POST['id'];
    $tab[1] = $_POST['nom'];
    $tab[2] = $_POST['categorie1'];
    $tab[3] = $_POST['categorie2'];
    $tab[4] = $_POST['quantite'];
    $tab[5] = $_POST['prix'];
    $tab[6] = "../img/".$_POST['image'];
  }
  else
  {
    $_SESSION['flag_champs_modif_product'] = "ko";
    header('Location: admin-products.php');
    exit();
  }
  return ($tab);
}

$path = "../../bdd";
$file = $path."/serialized";

$tab = get_data();

$unserialized = unserialize(file_get_contents($file));
$flag = 0;
foreach($unserialized as $key=>$prod)
{
  if ($tab[0] == $prod[0])
  {
    $flag = 1;
    $unserialized[$key][1] = $tab[1];
    $unserialized[$key][2] = $tab[2];
    $unserialized[$key][3] = $tab[3];
    $unserialized[$key][4] = $tab[4];
    $unserialized[$key][5] = $tab[5];
    $unserialized[$key][6] = $tab[6];
  }
}
if ($flag == 0)
{
  $_SESSION['flag_modif_product'] = "ko";
  echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
}
else {
$serialized = serialize($unserialized);
file_put_contents($file, $serialized);
$_SESSION['flag_modif_product'] = "ok";
echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
exit();
}
?>
