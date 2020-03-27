<div style="width: 760px; height: 510px; background: #444; zIndex: 0;" id="post-data">
<?php

  function placeVaiseauMap($vaiseaux, $vaiseau_1) {
    if ($vaiseaux['vie'] < 1) {
      return ;
    }

    if ($vaiseaux['r'] == 1 || $vaiseaux['r'] == 3) {
      echo "<div onclick='myFunction(". $vaiseaux['id'] .")' name=" . $vaiseaux['type'] . " style='background-color:" . $vaiseau_1->getColor() ."; margin-top: " . ($vaiseaux['y'] * 5) ."px; margin-left: " . ($vaiseaux['x'] * 5) ."px; width: " . ($vaiseau_1->getTailleY() * 5) . "px; height: " . ($vaiseau_1->getTailleX() * 5) . "px; position: absolute; z-index: 15;'></div>";
    }
    
    if ($vaiseaux['r'] == 0 || $vaiseaux['r'] == 2) {
      echo "<div onclick='myFunction(". $vaiseaux['id'] .")' name=" . $vaiseaux['type'] . " style='background-color:" . $vaiseau_1->getColor() ."; margin-top: " . ($vaiseaux['y'] * 5) ."px; margin-left: " . ($vaiseaux['x'] * 5) ."px; height: " . ($vaiseau_1->getTailleY() * 5) . "px; width: " . ($vaiseau_1->getTailleX() * 5) . "px; position: absolute; z-index: 15;'></div>";
    }
  }

  foreach($all_obstacles as $obstacle) {
    echo "<div style='background-color: #FF69B4; margin-top: " . ($obstacle['y'] * 5) ."px; margin-left: " . ($obstacle['x'] * 5) ."px; width: " . ($obstacle['o_x'] * 5) . "px; height: " . ($obstacle['o_y'] * 5) . "px; position: absolute; z-index: 10;'></div>";
  }

  foreach($vaiseaux_in_parties as $vaiseaux) {
    if($vaiseaux['type'] == "MarcoShip") {
      if ($vaiseaux['username'] == $_SESSION['username']) {
        $vaiseau_1 = new MarcoShip(array('color' => '#4c4cff'));
      } else {
        $vaiseau_1 = new MarcoShip(array('color' => '#b20000'));
      }

      placeVaiseauMap($vaiseaux, $vaiseau_1);
    }

    if($vaiseaux['type'] == "FregImperiale") {
      if ($vaiseaux['username'] == $_SESSION['username']) {
        $vaiseau_1 = new FregImperiale(array('color' => '#4c4cff'));
      } else {
        $vaiseau_1 = new FregImperiale(array('color' => '#b20000'));
      }

      placeVaiseauMap($vaiseaux, $vaiseau_1);
    }
  }

?></div>