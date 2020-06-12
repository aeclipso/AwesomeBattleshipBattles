<?php

class Ship implements IShip
{
	//все ли поля в этом классе будут подтягиваться из бд?
	private $_id;
    private $_name;
    private $_weapon;
    private $_coordX;
	private $_coordY;
    private $_orientation;
    private $_ungle;
    private $_lenght;
    private $_width;
    private $_hp;
    private $_pp;
    private $_sprite;
    private $_speed;
    private $_shield;
    private $_owner;
    private $_imgUrl;

    function __construct($id, $name, $weapon, $coordX, $coordY, $orientation, $length, $hp, $pp, $speed, $owner, $shield, $width)
    {
    	$this->setId($id);
        $this->setName($name);
        $this->setWeapon($weapon);
        $this->setCoord_x($coordX);
        $this->setCoord_y($coordY);
        $this->setOrientation($orientation);
        $this->setLength($length);
        $this->setHp($hp);
        $this->_pp = $pp;
        $this->_speed = $speed;
        $this->setOwner($owner);
        $this->setWidth($width);
        $this->setShield($shield);
    }

    public function getWidth(){
        return $this->_width;
    }

    public function setWidth($width){
    	$this->_width = $width;
    }

    public function setShield($shield){
    	$this->_shield = $shield;
    }

    public function getShield(){
    	return $this->_shield;
    }

	public function getLength(){
    	return $this->_lenght;
	}

    public function setLength($length){
    	$this->_lenght = $length;
    }

    public function getId(){
    	return $this->_id;
    }

    public function setId($id){
    	$this->_id = $id;
    }

    public function setOwner($owner)
    {
    	$this->_owner = $owner;
    }

    public function getOwner()
    {
    	return $this->_owner;
    }

    public function setHp($hp)
    {
    	$this->_hp = $hp;
    }

    public function getHp()
    {
    	return $this->_hp;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }
    public function getName()
    {
        return $this->_name;
    }

    public function setWeapon($weapon)
    {
        $this->_weapon = $weapon;
    }

    public function getWeapon()
    {
        return $this->_weapon;
    }

    public function setCoord_x($coord_x){
    	$this->_coordX = $coord_x;
    }
	public function setCoord_y($coord_y){
		$this->_coordY = $coord_y;
	}

    public function getCoord_x()
    {
	    return $this->_coordX;
    }

	public function getCoord_y()
	{
		return $this->_coordY;
	}
    public function doMove()
    {
	   if($this->_orientation === "up"){
	   	$this->_coordY--;
	   }
	   elseif($this->_orientation === "down"){
	   	$this->_coordY++;
	   }
	   elseif($this->_orientation === "left"){
	   	$this->_coordX--;
	   }
	   elseif($this->_orientation === "right"){
	   	$this->_coordX++;
	   }
    }

    public function setOrientation($orient)
    {
    	if(isset($orient)){
    		$this->_orientation = $orient;
	    }
    	else{
    		if ($this->_owner == 1){
    		    $this->_orientation = 3;
		    }
    		else{
    			$this->_orientation = 9;
		    }
	    }
    }

    public function getOrientation(){
	    return $this->_orientation;
    }

    public function doRotate($ungle)
    {
	    if ($ungle == 90){
	    	if ($this->getOrientation() == 9){
	    		$this->setOrientation(12);
	    		$this->setCoord_x($this->_coordX - intval(round($this->_lenght/2)));
	    		$this->setCoord_y($this->_coordY + intval(round($this->_lenght/2)));
		    }
	    	elseif ($this->getOrientation() == 12 ){
			    $this->setOrientation(3);
			    $this->setCoord_x($this->_coordX - intval(round($this->_lenght/2)));
			    $this->setCoord_y($this->_coordY - intval(round($this->_lenght/2)));
		    }
	    	elseif($this->getOrientation() == 3){
			    $this->setOrientation(6);
			    $this->setCoord_x($this->_coordX + intval(round($this->_lenght/2)));
			    $this->setCoord_y($this->_coordY - intval(round($this->_lenght/2)));
		    }
	    	elseif($this->getOrientation() == 6) {
			    $this->setOrientation(9);
			    $this->setCoord_x($this->_coordX + intval(round($this->_lenght/2)));
			    $this->setCoord_y($this->_coordY + intval(round($this->_lenght/2)));
		    }
	    }
	    else{
		    if ($this->getOrientation() == 12){
			    $this->setOrientation(9);
			    $this->setCoord_x($this->_coordX + intval(round($this->_lenght/2)));
			    $this->setCoord_y($this->_coordY - intval(round($this->_lenght/2)));
		    }
		    elseif ($this->getOrientation() == 9){
			    $this->setOrientation(6);
			    $this->setCoord_x($this->_coordX - intval(round($this->_lenght/2)));
			    $this->setCoord_y($this->_coordY - intval(round($this->_lenght/2)));
		    }
		    elseif($this->getOrientation() == 6){
			    $this->setOrientation(3);
			    $this->setCoord_x($this->_coordX - intval(round($this->_lenght/2)));
			    $this->setCoord_y($this->_coordY + intval(round($this->_lenght/2)));
		    }
		    elseif($this->getOrientation() == 3){
			    $this->setOrientation(12);
			    $this->setCoord_x($this->_coordX + intval(round($this->_lenght/2)));
			    $this->setCoord_y($this->_coordY + intval(round($this->_lenght/2)));
		    }
	    }
    }

	public function doRotateW($ungle)
	{
		if ($ungle == 90){
			if ($this->getOrientation() == 9){
				$this->setOrientation(12);
				$this->setCoord_x($this->_coordX - intval(round($this->_lenght/2)));
				$this->setCoord_y($this->_coordY + intval(round($this->_lenght/2)) - intval(round($this->_width/2)));
			}
			elseif ($this->getOrientation() == 12 ){
				$this->setOrientation(3);
				$this->setCoord_x($this->_coordX - intval(round($this->_lenght/2)) + intval(round($this->_width/2)));
				$this->setCoord_y($this->_coordY - intval(round($this->_lenght/2)));
			}
			elseif($this->getOrientation() == 3){
				$this->setOrientation(6);
				$this->setCoord_x($this->_coordX + intval(round($this->_lenght/2)));
				$this->setCoord_y($this->_coordY - intval(round($this->_lenght/2)) + intval(round($this->_width/2)));
			}
			elseif($this->getOrientation() == 6) {
				$this->setOrientation(9);
				$this->setCoord_x($this->_coordX + intval(round($this->_lenght/2)) - intval(round($this->_width/2)));
				$this->setCoord_y($this->_coordY + intval(round($this->_lenght/2)));
			}
		}
		else{
			if ($this->getOrientation() == 12){
				$this->setOrientation(9);
				$this->setCoord_x($this->_coordX + intval(round($this->_lenght/2)));
				$this->setCoord_y($this->_coordY - intval(round($this->_lenght/2)) + intval(round($this->_width/2)));
			}
			elseif ($this->getOrientation() == 9){
				$this->setOrientation(6);
				$this->setCoord_x($this->_coordX - intval(round($this->_lenght/2)) + intval(round($this->_width/2)));
				$this->setCoord_y($this->_coordY - intval(round($this->_lenght/2)));
			}
			elseif($this->getOrientation() == 6){
				$this->setOrientation(3);
				$this->setCoord_x($this->_coordX - intval(round($this->_lenght/2)));
				$this->setCoord_y($this->_coordY + intval(round($this->_lenght/2)) - intval(round($this->_width/2)));
			}
			elseif($this->getOrientation() == 3){
				$this->setOrientation(12);
				$this->setCoord_x($this->_coordX + intval(round($this->_lenght/2)) - intval(round($this->_width/2)));
				$this->setCoord_y($this->_coordY + intval(round($this->_lenght/2)));
			}
		}
	}


	public function setUngle($ungle)
    {
    	$this->_ungle = $ungle;
    }

    public function getUngle()
    {
	    return $this->_ungle;
    }
    public static function doc()
    {
		print_r("\n");
		print_r(file_get_contents("./Ship.doc.txt"));
		print_r("\n");
		return;
	}
}

