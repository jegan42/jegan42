<?php

  include("../../config.php");
  include("../controllers/account.php");

  if ($_POST['sign_up'] === 'Sign up') {
    if ($ret = create_account($_POST['username'], $_POST['mail'], $_POST['passwd'])) {
      header('Location: ' . '/login.php');
    } else {
      header('Location: ' . '/register.php');
    }
  }