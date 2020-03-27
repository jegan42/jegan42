<?php

  session_start();

  include('../../../config.php');
  include('../../controllers/ship.php');

  if ($_GET['direction'] == 'right') {
    turn_right($_GET['idVaiseau']);
  } else if ($_GET['direction'] == 'left') {
    turn_left($_GET['idVaiseau']);
  }

  if (isset($_SERVER["HTTP_REFERER"])) {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
  } else {
    header('Location: ' . $GLOBALS['PATH']);
  }

?>