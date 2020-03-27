<?php

  session_start();

  date_default_timezone_set("Europe/Paris");

  $connect = mysqli_connect($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);

  if (mysqli_connect_errno($connect)) {
    echo "Problème de connexion à la base de donnée SQL :" . mysqli_connect_error();
  }

  // OBSTACLES //

  function get_obstacles() {
    $all_obstacles = array();
    $all_obstacles[] = array('x' => 10, 'y' => 10, 'o_x' => 10, 'o_y' => 10);
    $all_obstacles[] = array('x' => 80, 'y' => 60, 'o_x' => 14, 'o_y' => 19);
    $all_obstacles[] = array('x' => 70, 'y' => 20, 'o_x' => 26, 'o_y' => 6);
    $all_obstacles[] = array('x' => 18, 'y' => 60, 'o_x' => 8, 'o_y' => 36);
    $all_obstacles[] = array('x' => 120, 'y' => 70, 'o_x' => 26, 'o_y' => 4);
    
    return $all_obstacles;
  }
?>