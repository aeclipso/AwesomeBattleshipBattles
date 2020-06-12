<?php
	class SideLaserBatteries extends Weapon{
		private $_direction = "left";
		public function calculateZone()
		{

		}

		public function setDirection($direction)
		{
			if ($direction == "left" || $direction == "right")
			{
				$this->_direction = $direction;
				return true;
			}
			else
				return false;
		}

	}
