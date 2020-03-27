<?php

  session_start();

  include('../../../config.php');
  include('../../controllers/ship.php');
  include('../../controllers/partie.php');

  // SHIPS //
  include('../../class/ship/Ship.class.php');
  include('../../class/ship/MarcoShip.class.php');
  include('../../class/ship/FregImperiale.class.php');

  // ARMES //
  include('../../class/weapons/Weapon.class.php');
  include('../../class/weapons/Navale.class.php');
  include('../../class/weapons/NavaleLourde.class.php');

  function get_info_arme($id_arme) {

    $navale = new Navale();
    $navale_lourde = new NavaleLourde();

    if ($id_arme == 0) {
      return $navale;
    } else if ($id_arme == 1) {
      return $navale_lourde;
    }
  }
  
  function get_type_ship($type) {
    if ($type == "MarcoShip") {
      return new MarcoShip(array('color' => '#4c4cff'));
    } else if ($type = "FregImperiale") {
      return new FregImperiale(array('color' => '#4c4cff'));
    }
  }

  function create_area_touched($vaiseau_x, $vaiseau_y, $vaiseau_r, $taille_x, $taille_y, $zone_x, $zone_y){

    $area_touched = array();

    if ($vaiseau_r == 0) {

      // R = 0

      for($i = 0; $i < $zone_y; $i++) {
        $area_touched[] = array('x' => $vaiseau_x + $i);
      }

      for($i = 0; $i < $zone_x; $i++) {
        $area_touched[] = array('y' => $vaiseau_y - ($i));
      }
    } else if ($vaiseau_r == 1) {

      // R = 1

      for($i = 0; $i < $zone_x; $i++) {
        $area_touched[] = array('x' => ($vaiseau_x + ($taille_y + $i)));
      }

      for($i = -1; $i < $zone_y -1; $i++) {
        $area_touched[] = array('y' => $vaiseau_y + $i);
      }
    } else if ($vaiseau_r == 2) {

      // R = 2

      for($i = 0; $i < $zone_y; $i++) {
        $area_touched[] = array('x' => $vaiseau_x + $i);
      }

      for($i = 0; $i < $zone_x; $i++) {
        $area_touched[] = array('y' => $vaiseau_y + ($taille_y + $i));
      }
    } else if ($vaiseau_r == 3) {

      // R = 3

      for($i = 1; $i < $zone_x; $i++) {
        $area_touched[] = array('x' => $vaiseau_x - $i);
      }

      for($i = 0; $i < $zone_y; $i++) {
        $area_touched[] = array('y' => $vaiseau_y + $i);
      }
    }

    return $area_touched;
  }

  function get_area_ship($vaiseau_x, $vaiseau_y, $vaiseau_r, $zone_x, $zone_y) {

    $area_ship = array();

    if ($vaiseau_r == 0) {

      // R = 0

      for($i = 0; $i < $zone_x; $i++) {
        $area_ship[] = array('x' => $vaiseau_x + $i);
      }

      for($i = 0; $i < $zone_y; $i++) {
        $area_ship[] = array('y' => $vaiseau_y + $i);
      }
    } else if ($vaiseau_r == 1) {

      // R = 1

      for($i = -1; $i < $zone_x - 1; $i++) {
        $area_ship[] = array('y' => $vaiseau_y + $i);
      }

      for($i = 0; $i < $zone_y; $i++) {
        $area_ship[] = array('x' => $vaiseau_x + $i);
      }
    } else if ($vaiseau_r == 2) {

      // R = 2

      for($i = 0; $i < $zone_y; $i++) {
        $area_ship[] = array('y' => $vaiseau_y + $i);
      }

      for($i = 0; $i < $zone_x; $i++) {
        $area_ship[] = array('x' => $vaiseau_x + $i);
      }
    } else if ($vaiseau_r == 3) {

      // R = 3

      for($i = 0; $i < $zone_y; $i++) {
        $area_ship[] = array('x' => $vaiseau_x + $i);
      }

      for($i = 0; $i < $zone_x; $i++) {
        $area_ship[] = array('y' => $vaiseau_y - $i);
      }
    }

    return $area_ship;

  }

  function detect_vaiseau($vaiseau, $id_arme, $all_vaiseaux) {

    $instance_arme = get_info_arme($id_arme);
    $enemies_ships = array();
    $area_touched;

    // recuperation de tout les vaiseaux enemis
    foreach($all_vaiseaux as $vaiseau) {
      if ($vaiseau['username'] != $_SESSION['username']) {
        $typeShip = get_type_ship($vaiseau['type']);
        $area_ship = get_area_ship($vaiseau['x'], $vaiseau['y'], $vaiseau['r'], $typeShip->getTailleX(), $typeShip->getTailleY());
        $enemies_ships[] = $area_ship;
      }
    }

    echo '<pre>' . var_export($enemies_ships, true) . '</pre>';
    echo "<br \><br \>";

    // recuperation de la zone ou il y aura des degats
    foreach($all_vaiseaux as $vaiseau) {
      if ($vaiseau['username'] == $_SESSION['username'] && $_GET['idVaiseau'] == $vaiseau['id']) {

        $typeShip = get_type_ship($vaiseau['type']);
        $area_touched = create_area_touched($vaiseau['x'], $vaiseau['y'], $vaiseau['r'],  $typeShip->getTailleX(), $typeShip->getTailleY(), $instance_arme->getZoneX(), $instance_arme->getZoneY());
        
      }
    }

    foreach($enemies_ships as $vaiseau) {

      $x_touched = null;
      $y_touched = null;
      
      foreach($vaiseau as $vaiseauKey => $vaiseauValue) {
        foreach($vaiseauValue as $finalKey => $finalValue) {

          if ($finalKey == 'x') {

            echo $finalValue . ' ';

            if (!isset($x_touched)) {
              foreach($area_touched as $point) {
                foreach($point as $key => $value) {
                  if ($key == 'x') {
                    if ($value == $finalValue) {
                      $x_touched = 1;
                    }
                  }
                }
              }
            }

          } else {

            echo $finalValue . ' ';

            if (!isset($y_touched)) {
              foreach($area_touched as $point) {
                foreach($point as $key => $value) {
                  if ($key == 'y') {
                    if ($value == $finalValue) {
                      $y_touched = 1;
                    }
                  }
                }
              }
            }

          }

        }

      }

      var_dump($x_touched);
      var_dump($y_touched);

    }


    echo "<br \><br \>";

    var_dump($area_touched);


  }
  
  $all_vaiseaux = get_all_vaiseaux($_SESSION['partie_id']);
  $res = get_info_ship($_GET['idVaiseau']);

  detect_vaiseau($res[0], $_GET['idArme'], $all_vaiseaux);

?>