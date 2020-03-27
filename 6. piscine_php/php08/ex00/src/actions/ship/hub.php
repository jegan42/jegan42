<?php

  session_start();

  include('../../../config.php');
  include('../../controllers/ship.php');
  include('../../controllers/partie.php');

  $info_ship = get_info_ship($_GET['idVaiseau']);

  if ($_SESSION['username'] == $info_ship[0]['username']) {
    if ($_GET['action'] == 'desac') {
      desactivate_ship($info_ship[0]['id']);
      change_partie_player();
    } else if ($_GET['action'] == 'activate') {
      activate_ship($info_ship[0]['id']);
    }
  }
  
  if (isset($_SERVER["HTTP_REFERER"])) {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
  } else {
    header('Location: ' . $GLOBALS['PATH']);
  }

?>