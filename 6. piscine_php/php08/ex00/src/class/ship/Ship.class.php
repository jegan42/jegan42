<?php

  class Ship {

    public function getName() {
      return $this->name;
    }
    
    public function getTailleX() {
      return $this->taille['x'];
    }
    
    public function getTailleY() {
      return $this->taille['y'];
    }

    public function getColor() {
      return $this->color;
    }

    public function getVitesse() {
      return $this->vitesse;
    }

    public function getWeapons() {
      return $this->weapons;
    }

    public function getPp() {
      return $this->PP;
    }

    public function getCharges() {
      return $this->charges;
    }
    
  }

?>