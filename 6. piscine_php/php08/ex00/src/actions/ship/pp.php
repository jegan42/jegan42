<?php

  session_start();

  include('../../../config.php');
  include('../../controllers/ship.php');

  include('../../class/ship/Ship.class.php');
  include('../../class/ship/FregImperiale.class.php');
  include('../../class/ship/MarcoShip.class.php');

  $res = get_info_ship($_GET['idVaiseau']);

  if($res[0]['type'] == "MarcoShip") {
    $obj = new MarcoShip(array('color' => '#4c4cff'));
  }

  if($res[0]['type'] == "FregImperiale") {
    $obj = new FregImperiale(array('color' => '#4c4cff'));
  }

  if (!isset($obj)) {
    $_SESSION['msg'] = "Impossible de detecter le vaiseau.";
  } else {

    $pp = $obj->getPp() - $_SESSION['vaiseau_pp'];
    
    if ($pp > 0) {
      if ($_GET['action'] == 'vitesse') {
        add_pp_vitesse();
      } else if ($_GET['action'] == 'arme') {
        add_pp_charges();
      }
    } else {
      $_SESSION['msg'] = "Vous ne pouvez plus utiliser de pp sur ce vaiseau.";
    }
  }

  if (isset($_SERVER["HTTP_REFERER"])) {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
  } else {
    header('Location: ' . $GLOBALS['PATH']);
  }

?>