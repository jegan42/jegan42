<?php

  session_start();
  
  include('../../config.php');
  include('../controllers/partie.php');
  include('../controllers/map.php');

  include('../class/ship/Ship.class.php');
  include('../class/ship/FregImperiale.class.php');
  include('../class/ship/MarcoShip.class.php');

  $all_obstacles = get_obstacles(); 

  $vaiseaux_in_parties = get_all_vaiseaux($_SESSION['partie_id']);

  $json = include('read_map.php');

?>