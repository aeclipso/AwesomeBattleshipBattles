<?php

abstract class Weapon
{
    public $id;
    public $currentPP = 0;
    private $_name;
    private $_rangeShort;
	private $_rangeMedium;
    private $_rangeLong;
    private $_charge;

    function __construct(int $id, string $name, int $short, int $medium, int $long, int $charge)
    {
        $this->name = $name;
        $this->id = $id;
        $this->_rangeShort = $short;
        $this->_rangeMedium = $medium;
        $this->_rangeLong = $long;
        $this->_charge = $charge;
    }
    public function getName()
    {
        return $this->_name;
    }

    public function calculateZone(int $myShipX, int $myShipY, $myshipOrintation, int $range_type){
        //calc zone by specification and return zone points x,y
        return [];
    }

    // public function shoot(int $myX, int $myY, int $range_type){
    //     if ($range_type < 0 || $range_type > 2)
    //         return;
    //     if ($this->_charge <= 0)
    //         return;
    //     $result_coords = $this->calculateZone($myX, $myY, $range_type);
    //     $this->_charge--;
    //     $this->resetPP();
    //     return $result_coords;
    // }

    public function upgradePP(int $PP)
    {
        $this->PP = $PP;
        $this->_charge += $PP;
    }

    public function resetPP()
    {
        $this->_charge -= $this->PP;
        $this->PP = 0;
    }

    public function getRange(int $range_type){
        if ($range_type === 0){
            $total_range = $this->_rangeShort;
        }
        else if ($range_type === 1){
            $total_range = $this->_rangeMedium;
        }
        else if ($range_type === 2)
            $total_range = $this->_rangeLong;
        }
    }
}
