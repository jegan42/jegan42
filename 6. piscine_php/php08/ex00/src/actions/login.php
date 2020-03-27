<?php
  session_start();

  include("../../config.php");
  include("../controllers/account.php");

  if ($_POST['sign_in'] === 'Sign in')
  {
    if ($res = log_account($_POST['username'], $_POST['passwd']))
    {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['id'] = $res['id'];
      $_SESSION['message'] = 'Login successful !';
      header('Location: /');
    }
    else
    {
      header('Location: ' . '/login.php');
    }
  }

?>