<?php

  class Weapon {

    public function getPorteCourte() {
      return $this->porteCourte;
    }
    public function getPorteIntermediaire() {
      return $this->intermediairePorte;
    }
    
    public function getLonguePorte() {
      return $this->longuePorte;
    }

    public function getZoneX() {
      return $this->zoneX;
    }

    public function getZoneY() {
      return $this->zoneY;
    }

    // DEGATS

    public function getDegatsCourte() {
      return $this->degatsCourte;
    }

    public function getDegatsIntermediaire() {
      return $this->degatsIntermediaire;
    }

    public function getDegatsLongue() {
      return $this->degatsLongue;
    }
    
  }

?>