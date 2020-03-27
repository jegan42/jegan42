<?php

class Ship
{
	protected $_name = "NewShip";
	protected $_img;
	protected $_style = array();
	protected $_scale_x = 1;
	protected $_scale_y = 1;
	protected $_maxpm = 15;
	protected $_maxpp = 10;

	protected $_angle = 0;
	protected $_ratio = 300;
	protected $_hp = 5;
	protected $_po = 10;
	protected $_pm = 15;
	protected $_pp = 10;
	protected $_ps = 0;
	protected $_x = 0;
	protected $_y = 0;
	protected $_Weapon;

	public function get_name() { return $this->_name; }
	public function get_img() { return $this->_img; }
	public function get_style() { return $this->_style; }
	public function get_scale_x() { return $this->_scale_x; }
	public function get_scale_y()  { return $this->_scale_y; }
	public function get_ratio() { return $this->_ratio; }
	public function get_angle() { return $this->_angle; }
	public function get_hp() { return $this->_hp; }
	public function get_po() { return $this->_po; }
	public function get_pm() { return $this->_pm; }
	public function get_pp() { return $this->_pp; }
	public function get_ps() { return $this->_ps; }
	public function get_x() { return $this->_x; }
	public function get_y() { return $this->_y; }
	public function get_Weapon() { return $this->_Weapon; }

	protected function _set_style($v) { $this->_style = $v; }
	public function set_hp($v) { $this->_hp = $v; }
	public function set_pm($v) { $this->_pm = $v; }
	public function set_pp($v) { $this->_pp = $v; }
	public function set_ps($v) { $this->_ps = $v; }
	public function set_x($v) { $this->_x = $v; }
	public function set_y($v) { $this->_y = $v; }
	public function set_angle($v) { $this->_angle = $v; }
	public function turnright()
	{
		if ($this->_angle + 90 >= 360)
			$this->_angle = 0;
		else
			$this->_angle += 90;
	}
	public function turnleft()
	{
		if ($this->_angle - 90 < 0)
			$this->_angle = 270;
		else
			$this->_angle -= 90;
	}

	public function forward()
	{
		if ($this->get_angle() == 0)
			$this->_y -= 1;
		else if ($this->get_angle() == 180)
			$this->_y += 1;
		else if ($this->get_angle() == 270)
			$this->_x -= 1;
		else if ($this->get_angle() == 90)
			$this->_x += 1;
	}

	public function __construct($kwargs)
	{
		$this->set_x($kwargs['x']);
		$this->set_y($kwargs['y']);
		if (array_key_exists('angle', $kwargs))
			$this->_angle = $kwargs['angle'];
		if (array_key_exists('name', $kwargs))
			$this->_name = $kwargs['name'];
	}

	public function resetvalue()
	{ 
		$this->_pm = $_maxpm = 15;
		$this->_pp = $_maxpp = 15;
	}
}

?>
