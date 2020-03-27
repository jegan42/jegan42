<?php

  include('./config.php');
  date_default_timezone_set("Europe/Paris");

  function get_date()
  {
    return (date("d M Y H:i", time()));
  }

  function disError($state, $err)
  {
    echo "== " . $state . ": ERROR : " . $err . " =\n";
  }

  function disSuccess($res)
  {
    echo "== " . $res . ": OK =\n";
  }

  $connect = mysqli_connect($config['db_address'], $config['db_username'], $config['db_password']);

  if (mysqli_connect_errno($connect)) {
    echo "Problème de connexion à la base de donnée SQL :" . mysqli_connect_error();
  }

  $create_db = "CREATE DATABASE " . $config['db_name'] . ";";

  if (mysqli_query($connect, $create_db) == 1) {
    disSuccess("Create DB");
  } else {
    disError("Create DB", mysqli_error($connect));
  }

  // USE DB RUSH
  mysqli_select_db($connect, $config['db_name']);

  // CREATE PARTIES
  $accounts = "CREATE TABLE parties (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, creation_date VARCHAR(20) NOT NULL, status VARCHAR(20) NOT NULL, tour INT NOT NULL, nbr_player INT NOT NULL, player1 VARCHAR(20), player2 VARCHAR(20), nom VARCHAR(30));";

  if (mysqli_query($connect, $accounts) == 1) {
    disSuccess("PARTIES");
  } else {
    disError("PARTIES", mysqli_error($connect));
  }

  // CREATE SHIP
  $ships = "CREATE TABLE ships (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, id_partie VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, x INT NOT NULL, y  INT NOT NULL, r  INT NOT NULL, username VARCHAR(30) NOT NULL, vie INT NOT NULL, status INT NOT NULL);";

  if (mysqli_query($connect, $ships) == 1) {
    disSuccess("Insert Partie");
  } else {
    disError("Insert Partie", mysqli_error($connect));
  }

  $date = get_date();
  $party = "INSERT INTO parties (id, creation_date, tour, nbr_player, status) VALUES (NULL, '$date', 0, 0, '')";

  if (mysqli_query($connect, $party) == 1) {
    disSuccess("Insert Partie");
  } else {
    disError("Insert Partie", mysqli_error($connect));
  }

  $accounts = "CREATE TABLE accounts (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, `username` VARCHAR(50) NOT NULL, `mail` VARCHAR(50) NOT NULL, `passwd` VARCHAR(128) NOT NULL);";
  if (mysqli_query($connect, $accounts) == 1) {
    disSuccess("Insert Partie");
  } else {
    disError("Insert Partie", mysqli_error($connect));
  }
?>