<?php
	include_once('Obstacle.class.php');
	include_once('Asteroid.class.php');
	include_once('SpaceStation.class.php');
	$asteroid = new Asteroid(12,33,45,12);
	$obstacle = new SpaceStation(43,56,43,43);
	print($obstacle->fight());
	print($asteroid->fight());
	print($asteroid->__toString());
	print($asteroid->__toString());
