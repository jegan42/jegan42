<?php

  session_start();

  date_default_timezone_set("Europe/Paris");

  $connect = mysqli_connect($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);

  if (mysqli_connect_errno($connect)) {
    echo "Problème de connexion à la base de donnée SQL :" . mysqli_connect_error();
  }

  /* ============================ INIT PARTIE ============================= */

  function init_partie($partie) {
    global $connect;
  
    $id = $partie[0]['id'];
    $username_adv = $partie[0]['player1'];
    $username = $_SESSION['username'];

    $reqs = array(
      "UPDATE parties SET status = '$username' WHERE id = '$id'",
      "INSERT INTO ships (id, id_partie, type, x, y, r, username, vie, status) VALUES (NULL, '$id', 'MarcoShip', 107, 21, 3, '$username', 37, 0)",
      "INSERT INTO ships (id, id_partie, type, x, y, r, username, vie, status) VALUES (NULL, '$id', 'FregImperiale', 101, 71, 3, '$username', 16, 0)",
      "INSERT INTO ships (id, id_partie, type, x, y, r, username, vie, status) VALUES (NULL, '$id', 'FregImperiale', 63, 87, 3, '$username', 16, 0)",
      "INSERT INTO ships (id, id_partie, type, x, y, r, username, vie, status) VALUES (NULL, '$id', 'MarcoShip', 7, 73, 1, '$username_adv', 37, 0)",
      "INSERT INTO ships (id, id_partie, type, x, y, r, username, vie, status) VALUES (NULL, '$id', 'FregImperiale', 9, 61, 1, '$username_adv', 16, 0)",
      "INSERT INTO ships (id, id_partie, type, x, y, r, username, vie, status) VALUES (NULL, '$id', 'FregImperiale', 9, 61, 1, '$username_adv', 16, 0)"
    );

    foreach($reqs as $req) {
      if (!mysqli_query($connect, $req) == 1) {
        echo "prob dans query";
      }
    }
  }

  function create_partie($nom) {

  }
 
  /* ============================ TOUR ============================= */

  function check_partie_tour($id) {
    $all_vaiseaux = get_all_vaiseaux($id);

    foreach($all_vaiseaux as $vaiseau) {
      if ($vaiseau['status'] == 0) {
        return 0;
      }
    }

    return 1;
  }

  function change_partie_player() {
    global $connect;

    $username = $_SESSION['username'];
    $info_partie = get_partie_info($_SESSION['partie_id']);
    $id = $info_partie[0]['id'];

    $username_adv;

    if (check_partie_tour($id)) {
      mysqli_query($connect, "UPDATE parties SET tour = tour + 1 WHERE id = '$id'");
      mysqli_query($connect, "UPDATE ships SET status = 0");
    }

    if ($username == $info_partie[0]['player1']) {
      $username_adv = $info_partie[0]['player2'];
    } else {
      $username_adv = $info_partie[0]['player1'];
    }

    mysqli_query($connect, "UPDATE parties SET status = '$username_adv' WHERE id = '$id'");
    return 1;
  }

  function increment_partie_player($id) {
    global $connect;

    $username = $_SESSION['username'];
    $info_partie = get_partie_info($id);

    if($info_partie[0]['nbr_player'] == 1) {
      init_partie($info_partie);
      $res = mysqli_query($connect, "UPDATE parties SET nbr_player = nbr_player + 1, player2 = '$username' WHERE id = '$id'");
    } else {
      $res = mysqli_query($connect, "UPDATE parties SET nbr_player = nbr_player + 1, player1 = '$username' WHERE id = '$id'");
    }

    $_SESSION['ready'] = 1;

    return 1;
  }

   /* ============================ GET ALL ============================= */

  function get_all_parties() {
    global $connect;

    $res = mysqli_query($connect, "SELECT id, creation_date, tour, nbr_player FROM parties");
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $res;
  }

  function get_all_vaiseaux($id) {
    global $connect;

    $res = mysqli_query($connect, "SELECT id, id_partie, type, x, y, r, username, vie, status FROM ships WHERE id_partie = '$id'");
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $res;
  }

  function get_partie_info($id) {
    global $connect;

    $res = mysqli_query($connect, "SELECT id, creation_date, tour, status, nbr_player, player1, player2 FROM parties WHERE id = '$id'");
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $res;
  }

?>