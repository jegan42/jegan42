<?php

  class MarcoShip extends Ship {

    // SUBJECT 

    protected $name = "Marcita Ship";
    protected $taille = array('x' => '2', 'y' => '2');
    protected $sprite = array('x' => '2', 'y' => '2');
    protected $vitesse = 20;
    protected $PP = 3; // puissance moteur
    protected $charges = 2;
    protected $weapons = array(array('id' => 0, 'nom' => "Navale"));
    
    // ME

    protected $color;

    public function __construct(array $tab) {
      $this->color = $tab['color'];
    }

  }

?>