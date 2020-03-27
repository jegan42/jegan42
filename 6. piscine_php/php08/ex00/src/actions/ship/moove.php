<?php

  session_start();

  include('../../../config.php');
  include('../../controllers/ship.php');

  if ($_GET['direction'] == 'right') {
    go_right($_GET['idVaiseau']);
  } else if ($_GET['direction'] == 'left') {
    go_left($_GET['idVaiseau']);
  } else if ($_GET['direction'] == 'top') {
    go_top($_GET['idVaiseau']);
  }  else if ($_GET['direction'] == 'down') {
    go_down($_GET['idVaiseau']);
  }

  if (isset($_SERVER["HTTP_REFERER"])) {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
  } else {
    header('Location: ' . $GLOBALS['PATH']);
  }

?>