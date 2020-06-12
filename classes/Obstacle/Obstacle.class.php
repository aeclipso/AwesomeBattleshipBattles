<?php
	abstract class Obstacle{
		private $x = 0;
		private $y = 0;
		private $height = 1;
		private $width = 10;

		protected function __construct(int $x, int $y, int $h, int $w)
		{
			$this->x = $x;
			$this->y = $y;
			$this->height = $h;
			$this->width = $w;
		}

		public function __toString(){
			return get_class($this)." x:".$this->x
			. ", y:" . $this->y
			. ", height:" . $this->height
			. ", width:" . $this->width . PHP_EOL;
		}

		public function fight() {
			return "Oops, I am " . get_class($this) . PHP_EOL;
		}
		public function getProperties(){
			return array('x' => $this->x, 'y' => $this->y, 'height' => $this->height, 'width' => $this->width);
		}
	}
