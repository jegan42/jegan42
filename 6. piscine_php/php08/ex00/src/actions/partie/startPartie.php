<?php

  session_start();
  
  include('../../../config.php');
  include('../../controllers/partie.php');

  increment_partie_player($_SESSION['partie_id']);

  if (isset($_SERVER["HTTP_REFERER"])) {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
  } else {
    header('Location: ' . $GLOBALS['PATH']);
  }

?>