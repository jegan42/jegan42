<?php

  session_start();

  if (isset($_SESSION['username'])) {
    header("Location: /index.php");
  }

?>

<html>
    <head>
        <title>register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/global.css">
        <link rel="stylesheet" type="text/css" href="public/map.css">
        <link rel="stylesheet" href="public/form.css">
    </head>
    <body id="body_wrap">
        <div class="divGlobal2">
            <div class="globalIndexLoginReg" id="up_wrap">
                <h2>Sign up</h2>
                <form method="post" action="/src/actions/register.php">
                    <div>Username<input name="username" type="text" required class="inputBasic"></div>
                    <div>Mail <input name="mail" type="email" required class="inputBasic"></div>
                    <div>Password<input name="passwd" type="password" required class="inputBasic"></div>
                    <input type="submit" name="sign_up" value="Sign up" class="buttonSubmit">
                </form>
                <a href="login.php">Login</a>
            </div>
        </div>
      <?php
        if (isset($_SESSION['error'])) {
          ?>
            <script>
                var elem = document.getElementById("up_wrap");
                var n_elem = document.createElement('div');
                var text = document.createTextNode('<?php echo $_SESSION['error'];?>');
                n_elem.appendChild(text);
                elem.appendChild(n_elem);
                console.log('test');
            </script>
          <?php
          $_SESSION['error'] = NULL;
        }
      ?>
    </body>
</html>
