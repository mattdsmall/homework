<?php
class ThreeWayLamp{
	private $level = 0;

	public function ThreeWayLamp($state = 0)
	{
		$this->level = $state;
	}

	public function change() 
	{
		$this->level = $this->level++ %3;

	}

	public function __toString()
	{
		return "Level: " . $this->level;

	}
}

$twl2 = new ThreeWayLamp();
echo "My lamp is" . $twl2;

$twl1 = new ThreeWayLamp(3);
for($i = 0; $i < 278; $i++)
$twl1->change();
echo "My lamp is " . $twl1;