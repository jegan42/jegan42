<?php

class Invader extends Ship
{
	protected $_maxpm = 15;
	protected $_maxpp = 10;
	protected $_scale_x = 3;
	protected $_scale_y = 3;
	protected $_ratio = 200;

	protected $_img = "/resources/Invader.jpg";
	protected $_hp = 5;
	protected $_po = 10;
	protected $_pm = 15;
	protected $_pp = 10;
	protected $_Weapon;
}

?>