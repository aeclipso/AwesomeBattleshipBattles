<?php

class Weapon
{
    public $id;
    private $_name;
    private $_distanceShort;
	private $_distanceMedium;
    private $_distanceLong;
    private $_charge;
    private $_zone;

    function __construct(int $id, string $name, int $short, int $medium, int $long, int $charge, $zone)
    {
        $this->setName($name);
        $this->id = $id;
        $this->_distanceShort = $short;
        $this->_distanceMedium = $medium;
        $this->_distanceLong = $long;
        $this->_zone = $zone;
        $this->_charge = $charge;
    }
    public function setName($name)
    {
        $this->_name = $name;
    }
    public function getName()
    {
        return $this->_name;
    }
}
