<?php
	interface IShip
	{
		public function __construct($id, $name, $weapon, $coordX, $coordY, $orientation, $length, $hp, $pp, $speed, $owner);
		public function setName($name);
		public function getName();
		public function setWeapon($weapon);
		public function getWeapon();
//		need do it!
		public function setCoord_x($coord_x);
		public function setCoord_y($coord_y);
		public function getCoord_x();
		public function getCoord_y();
		public function doMove();
		public function doRotate($ungle);
//		public function checkRotate();
//      может быть проверять в конкретных кораблях? это условие для унитожения

		public function setUngle($ungle);
		public function getUngle();
		public function setOrientation($orient);
		public function getOrientation();
//		public function
	}