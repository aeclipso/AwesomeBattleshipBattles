<?php
	include_once("Weapon.class.php");
	include_once("SideLaserBatteries.class.php");
	include_once("NauticalLance.class.php");
	$laser = new SideLaserBatteries(0, "MyLaserBlast", 10, 20, 30, 5);
	// $laser->setDirection("left");
	// $zone = $laser->calculateZone(4, 7, "left", 0);
	// print_r($zone);
	$laser->setDirection("right");
	$zone = $laser->calculateZone(5, 7, "right", 1);
	print_r($zone);

