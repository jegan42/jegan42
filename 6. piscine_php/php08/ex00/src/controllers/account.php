<?php

session_start();

date_default_timezone_set("Europe/Paris");

$connect = mysqli_connect($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);

if (mysqli_connect_errno($connect)) {
    echo "Problème de connexion à la base de donnée SQL :" . mysqli_connect_error();
}

function check_uname_exists($uname) {
    global $connect;

    $uname = "SELECT username FROM accounts WHERE username = '$uname'";
    $uname = mysqli_query($connect, $uname);
    $clean_uname = mysqli_fetch_array($uname, MYSQLI_ASSOC);

    if ($clean_uname)
        return 0;
    return 1;
}

function check_mail_exists($mail) {
    global $connect;

    $mail = "SELECT mail FROM accounts WHERE mail = '$mail'";
    $mail = mysqli_query($connect, $mail);
    $clean_mail = mysqli_fetch_array($mail, MYSQLI_ASSOC);

    if ($clean_mail)
        return 0;
    return 1;
}

function create_account($uname, $mail, $passwd)
{
    global $connect;

    $check_mail = check_uname_exists($uname);
    $check_uname = check_mail_exists($mail);
    if (!$check_mail)
    {
        $_SESSION['error'] = 'username : ' . $uname . " already taken";
        return (0);
    }
    if (!$check_uname)
    {
        $_SESSION['error'] = 'mail :' . $mail . " already taken";
        return (0);
    }
    $hash_pwd = hash('whirlpool', $passwd);
    $request = "INSERT INTO accounts (username, mail, passwd) VALUES ('$uname', '$mail', '$hash_pwd');";
    $ret = mysqli_query($connect, $request);
    if (!$ret) {
        echo("Error sqli: " . mysqli_error($connect));
    }
    return (1);
}

function log_account($uname, $passwd)
{
  global $connect;
  if (check_uname_exists($uname))
  {
    $_SESSION['error'] = 'Wrong username';
    return (0);
  }
  $hashed = hash('whirlpool', $passwd);
  $query = "SELECT username, id FROM accounts WHERE username = '$uname' AND passwd = '$hashed';";
  $res = mysqli_query($connect, $query);
  $ret = mysqli_fetch_array($res, MYSQLI_ASSOC);
  return $ret;
}
