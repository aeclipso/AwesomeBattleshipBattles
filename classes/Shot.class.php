<?php

class Shot {
	public $x;
	public $y;
	public $len;
	public $dir;
	public $type;

	public function __construct($x, $y, $len, $direction, $type) {
		$this->x = $x;
		$this->y = $y;
		$this->len = $len;
		$this->dir = $direction;
		$this->type = $type;
	}
}
