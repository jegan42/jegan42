<?php

  session_start();
  
  include('./config.php');
  include('./src/controllers/partie.php');
  include('./src/controllers/map.php');

  include('./src/class/ship/Ship.class.php');
  include('./src/class/ship/FregImperiale.class.php');
  include('./src/class/ship/MarcoShip.class.php');

  if(!isset($_SESSION['partie_id'])) {
    $parties = get_all_parties();
  } else {
    $partie_info = get_partie_info($_SESSION['partie_id']);
    if (count($partie_info) == 0) {
      $_SESSION['partie_id'] = NULL;
    }
    $vaiseaux_in_parties = get_all_vaiseaux($_SESSION['partie_id']);
  }

  if (!isset($_SESSION['username'])) {
    header("Location: /login.php");
  }

  if(isset($_SESSION['partie_id'])) {
    $all_obstacles = get_obstacles(); 
  }

  $whatIWant = substr($_SERVER['REQUEST_URI'], strpos($data, "/") + 1);

?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="public/global.css">
    <link rel="stylesheet" type="text/css" href="public/map.css">
    <link rel="stylesheet" type="text/css" href="public/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <style>
      <?php
        foreach($vaiseaux_in_parties as $vaiseau) { 
          if ($whatIWant == $vaiseau['id']) { 
            echo " #wrapper" . $vaiseau['id'] ." { display: block; } ";
          } else { 
            echo " #wrapper" . $vaiseau['id'] ." { display: none; } "; } 
          }
      ?>
    </style>

  </head>

  <body>
    <?php if(isset($_SESSION['username']) && isset($_SESSION['partie_id'])) { ?>
      
      <div class="header">
        <div style="display: flex; flex-flow: row wrap;">
          Username: <?= $_SESSION['username']; ?>
          - Partie ID: <?= $_SESSION['partie_id']; ?>
          - TOUR: <?= $partie_info[0]['tour']; ?>
          - <div id="turnEp"></div>
        </div>
        <?php if (isset($_SESSION['msg'])) { ?>
          <div class="msg"><div style="font-weight: 800;">Notification: </div><?= $_SESSION['msg']; ?></div>
        <?php $_SESSION['msg'] = null; } ?>
        <div class="headerDiv">
          <?php if($partie_info[0]['nbr_player'] != 2) { ?>
            <a>Partie en cours</a>
          <?php } else if ($_SESSION['partie'] != 1) { ?>
            <a href="./src/actions/partie/startPartie.php">Se méttre prêt</a>
          <?php } ?>
          <a href="./src/actions/leave_partie.php">Leave Partie</a>
          <a href="./src/actions/logout.php">Logout</a>
        </div>
      </div>

        <div class="divGlobal">
        

        <?php foreach($vaiseaux_in_parties as $vaiseau) {
          
            if($vaiseau['type'] == "MarcoShip") {
              $obj = new MarcoShip(array('color' => '#4c4cff'));
            }

            if($vaiseau['type'] == "FregImperiale") {
              $obj = new FregImperiale(array('color' => '#4c4cff'));
            }

            $final_vitesse = $obj->getVitesse() - $_SESSION['vaiseau_vitesse'];
            $pp = $obj->getPp() - $_SESSION['vaiseau_pp'];
            $charges = $obj->getCharges() - $_SESSION['vaiseau_charge'];
            
          ?>
          
          <div style="width: 200px;">
          <div id="wrapper<?= $vaiseau['id']; ?>" class="vaiseauHub">
            <div><?= $vaiseau['id']; ?> - <?= $vaiseau['type']; ?></div>
              <?php if($_SESSION['username'] == $vaiseau['username']) { ?>
                <div style="font-weight: 800;">C'est votre vaiseau.</div>
                <div style="padding: 10px; margin-top:5px; font-weight: 800;"> Informations </div>
                <div style="display: flex; flex-flow: column;">
                  <div>Point de vie: <?= $vaiseau['vie']; ?></div>
                  <div>Direction: <?= $vaiseau['r']; ?></div>
                  <?php if($_SESSION['actual_vaiseau_id'] == $vaiseau['id']) { ?>
                    <div>Point de vitesse: <?= $final_vitesse; ?></div>
                    <div>PP: <?= $pp; ?></div>
                    <div>Charge: <?= $charges; ?></div>
                  <?php } ?>
                </div>

                <?php if($_SESSION['actual_vaiseau_id'] == $vaiseau['id']) { ?>
                <div style="padding: 10px; margin-top:5px; font-weight: 800;"> Direction <a href="./src/actions/ship/pp.php?idVaiseau=<?= $vaiseau['id']; ?>&action=vitesse">+PP</a></div>
                <div style="display: flex; flex-flow: column;">
                  <?php if($final_vitesse > 0) { ?>
                    <a href="./src/actions/ship/moove.php?direction=right&idVaiseau=<?= $vaiseau['id']; ?>">Right </a>
                    <a href="./src/actions/ship/moove.php?direction=left&idVaiseau=<?= $vaiseau['id']; ?>">Left</a>
                    <a href="./src/actions/ship/moove.php?direction=top&idVaiseau=<?= $vaiseau['id']; ?>">Top</a>
                    <a href="./src/actions/ship/moove.php?direction=down&idVaiseau=<?= $vaiseau['id']; ?>">Down</a>
                  <?php } else { ?>
                    <a>Right </a>
                    <a>Left</a>
                    <a>Top</a>
                    <a>Down</a>
                  <?php } ?>
                </div>
                <div style="padding: 10px; margin-top:5px; font-weight: 800;"> Rotation </div>
                <div style="display: flex; flex-flow: column;">
                  <?php if($final_vitesse > 0) { ?>
                    <a href="./src/actions/ship/turn.php?direction=right&idVaiseau=<?= $vaiseau['id']; ?>">Tourner droite</a>
                    <a href="./src/actions/ship/turn.php?direction=left&idVaiseau=<?= $vaiseau['id']; ?>">Tourner gauche </a>
                  <?php } else { ?>
                    <a>Tourner droite</a>
                    <a>Tourner gauche </a>
                  <?php } ?>
                </div>
                <div style="padding: 10px; margin-top:5px; font-weight: 800;"> Armes Disponibles <a href="./src/actions/ship/pp.php?idVaiseau=<?= $vaiseau['id']; ?>&action=arme">+PP</a><div style="font-size: 10px;">(Toucher l'arme pour l'utiliser.)</div></div>
                <div style="display: flex; flex-flow: column;">
                  <div></div>
                  <?php

                    $res = $obj->getWeapons();

                    foreach($res as $r) {
                  ?>
                    <?php if ($charges > 0) { ?>
                      <a href="./src/actions/ship/useArme.php?idVaiseau=<?= $vaiseau['id']; ?>&idArme=<?= $r['id']; ?>"><?= $r['nom']; ?></a>
                    <?php } else { ?>
                      <a><?= $r['nom']; ?></a>
                    <?php } ?>
                  <?php } ?>
                </div>
                <div style="padding: 10px; margin-top:5px; font-weight: 800;"><a href="./src/actions/ship/hub.php?action=desac&idVaiseau=<?= $vaiseau['id']; ?>">Desactiver le vaiseau</a></div>

                <?php } else { ?>

                  <?php if ($partie_info[0]['status'] == $_SESSION['username']) { ?>
                    <?php if(isset($_SESSION['actual_vaiseau_id']) && $_SESSION['actual_vaiseau_id'] != $vaiseau['id']) { ?>
                      <div style="padding: 10px; margin-top:5px; font-weight: 800;">Vous etes entrain de jouer le vaiseau <?= $_SESSION['actual_vaiseau_id']; ?></div>
                    <?php } else if ($vaiseau['status'] == 0) { ?>
                      <div style="padding: 10px; margin-top:5px; font-weight: 800;"><a href="./src/actions/ship/hub.php?action=activate&idVaiseau=<?= $vaiseau['id']; ?>">Activer le vaiseau</a></div>
                    <?php } else { ?>
                      <div style="padding: 10px; margin-top:5px; font-weight: 800;">Vous avez joué ce vaiseau ce tour.</div>
                    <?php } ?>
                  <?php } else { ?>
                    <div style="padding: 10px; margin-top:5px; font-weight: 800;">Ce n'est pas votre tour.</div>
                  <?php } ?>
              
                <?php } ?>

              <?php 
                } else { 
              ?>
              
              <div style="padding: 10px; margin-top:5px; font-weight: 800;"> Informations </div>
                <div style="display: flex; flex-flow: column;">
                  <div>Point de vie: <?= $vaiseau['vie']; ?></div>
                  <div>Rotation: <?= $vaiseau['r']; ?></div>
                </div>

              <?php
                } 
              ?>
            </div>
            </div>
          <?php } ?>

          <div style="font-size: 30px; align-self: center; padding: 20px;">3</div>
          
          <div class="wrapper1">
            <div style="width: 760px; height: 510px; background: #444; zIndex: 0;">
                <?php
                  include('./src/dynamic/read_map.php');
                ?>
            </div>
            <div style="font-size: 30px; text-align:center; padding: 20px;">2 - x</div>
          </div>
          <div style="font-size: 30px; align-self: center; padding: 20px;">1</div>

        </div>
    <?php } if (isset($_SESSION['username']) && !isset($_SESSION['partie_id'])) { ?>

        <div class="divGlobal2">
          
        <div class="globalIndexRight">
            <a href="./src/actions/logout.php">Logout</a>
          </div>

          <div class="globalIndexLogReg">
            <form action="./src/actions/partie/choose_partie.php" method="POST">
                <label class="logRegLabel">Enter in the partie</label>
              <input type="mail" id="fname" name="partie_id" placeholder="12" class="inputBasic">
              
              <input type="submit" value="Goooooooo" class="buttonSubmit"/>
            </form>

            <div>Parties disponibles</div>

            <?php foreach($parties as $partie) {
              if ($partie['nbr_player'] < 2) {
            ?>
              <div>id: <?= $partie['id']; ?> - date: <?= $partie['creation_date']; ?></div>
            <?php } }?>

          </div>

          <div class="globalIndexRight">
            <div>Bonjour <?= $_SESSION['username']; ?></div>
            <div>Votre id: <?= $_SESSION['id']; ?></div>
          </div>

          

        </div>
    <?php } ?>
  </body>

  <script>
    function myFunction($value) {
      var x = document.getElementById("wrapper" + $value);
      if (x.style.display === "none") {
        x.style.display = "block";
        window.history.pushState('page2', 'Title', '/' + $value);
      } else {
        x.style.display = "none";
        window.history.pushState('page2', 'Title', '/');
      }
    }

    window.setInterval(function(){
        $.ajax(
        {
          url: '/src/dynamic/load_map.php',
          type: "get"
        })
        .done(function(data){
          $("#post-data").replaceWith(data);
        })

        $.ajax(
        {
          url: '/src/dynamic/load_tour.php',
          type: "get"
        })
        .done(function(data){
          $("#turnEp").replaceWith(data);
          console.log(data);
        })
    }, 800);

  </script>
</html>