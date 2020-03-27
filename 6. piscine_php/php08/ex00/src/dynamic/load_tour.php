<?php

  session_start();
  
  include('../../config.php');
  include('../controllers/partie.php');
  include('../controllers/map.php');

  if(isset($_SESSION['partie_id'])) {
    $partie_info = get_partie_info($_SESSION['partie_id']);
  }

  if($partie_info[0]['status'] == $_SESSION['username']) { 
    $json = "<div id='turnEp' style='color:green; margin-left:5px;'>C'est a vous.</div>"; 
  } else if($partie_info[0]['status'] == '') { 
    $json = "<div id='turnEp'>...</div>";
  } else { 
    $json = "<div id='turnEp' style='color:red; margin-left:5px;'>C'est à votre adversaire.</div>"; 
  }

  echo $json;

?>