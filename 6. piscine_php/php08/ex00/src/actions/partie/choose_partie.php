<?php

  session_start();
  
  $_SESSION['partie_id'] = $_POST['partie_id'];

  if (isset($_SERVER["HTTP_REFERER"])) {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
  } else {
    header('Location: ' . $GLOBALS['PATH']);
  }

?>