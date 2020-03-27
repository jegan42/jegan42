<?php

class Team
{
	private $_name = "NewTeam";
	private $_shiplist = array();
	private $_ratio = 0;
	private $_speedthrow = 0;
	private $_weaponthrow = 0;

	public function get_name() { return $this->_name; }
	public function get_shiplist() { return $this->_shiplist; }
	public function get_ratio() { return $this->_ratio; }
	public function get_shipbyname($name) { return ($this->get_shiplist()[$name]); }
	public function get_speedthrow() { return $this->_speedthrow; }
	public function get_weaponthrow() { return $this->_weaponthrow; }

	public function increasespeedthrow() { $this->_speedthrow++; }
	public function increaseweaponthrow() { $this->_weaponthrow++; }
	public function decreasespeedthrow() { $this->_speedthrow--; }
	public function decreaseweaponthrow() { $this->_weaponthrow--; }
	private function _set_ratio($v) { $this->_ratio = $v; }
	private function _set_name($v) { $this->_name = $v; }
	private function _set_shiplist(array $kwargs) { $this->_shiplist[$kwargs['new']] = $kwargs['value']; }
	private function _increaseratio($value) { $this->_set_ratio($this->get_ratio() + $value); }
	private function _decreaseratio($value) { $this->_set_ratio($this->get_ratio() - $value); }

	public function __construct(array $kwargs)
	{
		if (array_key_exists('name', $kwargs))
			$this->_set_name($kwargs['name']);
	}

	public function addship($ship)
	{
		if (is_subclass_of($ship, "Ship"))
		{
			if (!$this->get_shiplist()[$ship->get_name()])
			{
				$this->_set_shiplist(array('new' => $ship->get_name(), 'value' => $ship));
				$this->_increaseratio($ship->get_ratio());
			}
			else
				print ("Error this ship already exist\n");
		}
		else
			print ("Error you don't add a ship\n");
	}

	public function removeship($shipname)
	{
		if ($this->get_shiplist()[$shipname])
		{
			$this->_decreaseratio($this->get_shiplist()[$shipname]->get_ratio());
			unset($this->get_shiplist()[$shipname]);
			if (count($this->get_shiplist()) == 0)
				return (0);
			return (1);
		}
		else
			print ("Error this ship dosen't exist\n");
		return (-1);
	}

	public function resetvalue()
	{ 
		$this->_speedthrow = 0;
		$this->_weaponthrow = 0;
	}
}

?>
