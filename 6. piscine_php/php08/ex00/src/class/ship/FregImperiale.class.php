<?php

  class FregImperiale extends Ship {

    // SUBJECT 

    protected $name = "eL Fregato";
    protected $taille = array('x' => '2', 'y' => '7');
    protected $sprite = array('x' => '2', 'y' => '7');
    protected $vitesse = 10;
    protected $PP = 4; // puissance moteur
    protected $charges = 1;
    protected $weapons = array(array('id' => 0, 'nom' => "Navale"), array('id' => 1, 'nom' => "NavaleLourde"));
    
    // ME

    protected $color;

    public function __construct(array $tab) {
      $this->color = $tab['color'];
    }

  }