<?php
	class Asteroid extends Obstacle{
		public function __construct(int $x, int $y, int $h,int $w)
		{
			parent::__construct($x, $y ,$h, $w);
		}
	}
