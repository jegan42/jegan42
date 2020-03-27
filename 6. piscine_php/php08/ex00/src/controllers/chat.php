<?php

session_start();

date_default_timezone_set("Europe/Paris");

$connect = mysqli_connect($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);

if (mysqli_connect_errno($connect)) {
    echo "Problème de connexion à la base de donnée SQL :" . mysqli_connect_error();
}

function get_all_msg() {
  global $connect;

  $res = mysqli_query($connect, "SELECT id, username, text FROM general_chats");
  return $res;
}