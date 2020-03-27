<?php

  session_start();

  date_default_timezone_set("Europe/Paris");

  $connect = mysqli_connect($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);

  if (mysqli_connect_errno($connect)) {
    echo "Problème de connexion à la base de donnée SQL :" . mysqli_connect_error();
  }

  /* ============================ VAISEAU ============================= */

  function get_info_ship($id) {
    global $connect;

    $res = mysqli_query($connect, "SELECT id, id_partie, type, x, y, r, username, vie FROM ships WHERE id = '$id'");
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $res;
  }

  /* ============================ DEGATS ============================= */

  function send_degats($id, $degats) {
    global $connect;

    $res = mysqli_query($connect, "UPDATE ships SET vie = vie - $degats WHERE id = '$id'");

    return 1;
  }

  /* ============================ DEPLACEMENT ============================= */

  function go_right($id) {
    global $connect;

    $res = mysqli_query($connect, "UPDATE ships SET x = x + 1 WHERE id = '$id'");
    $_SESSION['vaiseau_vitesse'] = $_SESSION['vaiseau_vitesse'] + 1;

    return 1;
  }

  function go_left($id) {
    global $connect;

    $res = mysqli_query($connect, "UPDATE ships SET x = x - 1 WHERE id = '$id'");
    $_SESSION['vaiseau_vitesse'] = $_SESSION['vaiseau_vitesse'] + 1;

    return 1;
  }

  function go_top($id) {
    global $connect;

    $res = mysqli_query($connect, "UPDATE ships SET y = y - 1 WHERE id = '$id'");
    $_SESSION['vaiseau_vitesse'] = $_SESSION['vaiseau_vitesse'] + 1;

    return 1;
  }

  function go_down($id) {
    global $connect;

    $res = mysqli_query($connect, "UPDATE ships SET y = y + 1 WHERE id = '$id'");
    $_SESSION['vaiseau_vitesse'] = $_SESSION['vaiseau_vitesse'] + 1;

    return 1;
  } 

  /* ============================ /DEPLACEMENT ============================= */

  function turn_right($id) {
    global $connect;

    $info_vaiseau = get_info_ship($id);

    if ($info_vaiseau[0]['r'] == 3) {
      $res = mysqli_query($connect, "UPDATE ships SET r = 0 WHERE id = '$id'");
    } else {
      $res = mysqli_query($connect, "UPDATE ships SET r = r + 1 WHERE id = '$id'");
    }

    $_SESSION['vaiseau_vitesse'] = $_SESSION['vaiseau_vitesse'] + 1;

    return 1;
  }

  function turn_left($id) {
    global $connect;

    $info_vaiseau = get_info_ship($id);

    if ($info_vaiseau[0]['r'] == 0) {
      $res = mysqli_query($connect, "UPDATE ships SET r = 3 WHERE id = '$id'");
    } else {
      $res = mysqli_query($connect, "UPDATE ships SET r = r - 1 WHERE id = '$id'");
    }

    $_SESSION['vaiseau_vitesse'] = $_SESSION['vaiseau_vitesse'] + 1;

    return 1;
  }
  
  /* ============================ /ACTIVATION ============================= */

  function activate_ship($id) {
    global $connect;

    $res = mysqli_query($connect, "UPDATE ships SET status = 1 WHERE id = '$id'");

    $_SESSION['vaiseau_vitesse'] = null;
    $_SESSION['actual_vaiseau_id'] = $_GET['idVaiseau'];
    $_SESSION['vaiseau_pp'] = null;
    $_SESSION['vaiseau_charge'] = null;
  }

  function desactivate_ship($id) {
    global $connect;
    
    $res = mysqli_query($connect, "UPDATE ships SET status = 2 WHERE id = '$id'");

    $_SESSION['vaiseau_vitesse'] = null;
    $_SESSION['actual_vaiseau_id'] = null;
    $_SESSION['vaiseau_pp'] = null;
    $_SESSION['vaiseau_charge'] = null;
  }

   /* ============================ /PP ============================= */

  function add_pp_vitesse() {
    $rand = rand(1,6);
    $_SESSION['msg'] = "Le pp que vous venez d'utiliser vous donne " . $rand . " points de vitesses en plus.";
    $_SESSION['vaiseau_vitesse'] = $_SESSION['vaiseau_vitesse'] - $rand;
    $_SESSION['vaiseau_pp'] = $_SESSION['vaiseau_pp'] + 1;
  }

  function add_pp_charges() {
    $_SESSION['msg'] = "Le pp que vous venez d'utiliser vous donne 1 de + a votre Charge.";
    $_SESSION['vaiseau_charge'] = $_SESSION['vaiseau_charge'] - 1;
    $_SESSION['vaiseau_pp'] = $_SESSION['vaiseau_pp'] + 1;
  }
?>