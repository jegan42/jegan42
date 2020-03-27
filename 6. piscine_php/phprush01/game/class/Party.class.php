<?php

class Party
{
	private $_team1;
	private $_team2;
	private $_map;
	private $_phase = 0;
	private $_currentteam;
	private $_shipselect;

	public function get_team1() { return $this->_team1; }
	public function get_team2() { return $this->_team2; }
	public function get_map() { return $this->_map; }
	public function get_phase() { return $this->_phase; }
	public function get_currentteam() { return $this->_currentteam; }
	public function get_shipselect() { return $this->_shipselect; }

	public function set_shipselect($v) { $this->_shipselect = $v; }
	private function _set_team1($v) { $this->_team1 = $v; }
	private function _set_team2($v) { $this->_team2 = $v; }
	private function _set_map(array $map) { $this->_map = $map; }

	public function nextphase()
	{
		if ($this->_phase == 3)
		{
			$this->_phase = 0;
			$this->get_shipselect()->resetvalue();
			$this->get_currentteam()->resetvalue();
			$this->swapcurrentteam();
		}
		else
			$this->_phase += 1;
	}

	private function swapcurrentteam()
	{
		if ($this->_currentteam === $this->_team1)
			$this->_currentteam = $this->_team2;
		else
			$this->_currentteam = $this->_team1;
	}

	public function __construct(array $kwarg)
	{
		$this->_set_team1($kwarg['team1']);
		$this->_set_team2($kwarg['team2']);
		$this->_currentteam = $kwarg['team1'];
	}

	public function createmap()
	{
		$map = array();
		for ($y = 0; $y < 100; $y++)
		{
			$map[$y] = array();
			for ($x = 0; $x < 150; $x++)
			{
				$map[$y][$x] = array();
			}
		}
		foreach ($this->get_team1()->get_shiplist() as $ship)
		{
			$map[$ship->get_y()][$ship->get_x()]['team'] = $this->get_team1();
			$map[$ship->get_y()][$ship->get_x()]['ship'] = $ship;
		}
		foreach ($this->get_team2()->get_shiplist() as $ship)
		{
			$map[$ship->get_y()][$ship->get_x()]['team'] = $this->get_team2();
			$map[$ship->get_y()][$ship->get_x()]['ship'] = $ship;
		}
		$this->_set_map($map);
	}
}

?>
