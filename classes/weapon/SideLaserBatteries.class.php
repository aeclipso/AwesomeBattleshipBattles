<?php

	class SideLaserBatteries extends Weapon{
		private $_direction = "left";
		private $_weaponWidth = 4;

		public function calculateZoneXY(int $myShipX, int $myShipY, $myShipOrientation, int $range_type) {
			//Высчитывает зону начиная с координат myX, myY
			//Ориентация головы корабля: up, down, left, right
			//тип дальности стрельбы: 0 - short, 1 - medium, 2 - long
			$zone = [];
			$total_range = $this->getRange($range_type);
			$i = 0;
			$x_offset = 0;
			$y_offset = 0;
			$row_index = 1;
			$points_in_row = 0;
			if ($myShipOrientation == "left")
			{
				if ($this->_direction === "left")
				{
					while ($i <= $total_range)
					{
						//9|      .
						//8|     ..
						//7|   |...
						//6|   |...
						//5|   |...
						//4|   |...
						//3|     ..
						//2|      .
						//1|____________x
						//0 123456789

						array_push($zone,array($x_offset + $myShipX, $y_offset + $myShipY));
						$y_offset--;
						$points_in_row++;
						if ($points_in_row === $this->_weaponWidth / 2 * $row_index + 2){
							$row_index++;
							$x_offset++;
							$y_offset = $myShipY + $row_index - 1;
							$points_in_row = 0;
						}
					}
				}
				else if ($this->_direction === "right"){
					for ($i = 1; $i <= $total_range; $i++)
					{

					}
				}

			}
			else if ($myShipOrientation == "right")
			{
				//Надо реализовать
			}
			else if ($myShipOrientation == "down")
			{
				//Надо реализовать
			}
			else if ($myShipOrientation == "up")
			{
				//Надо реализовать
			}
			else return;

			return $zone;
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

		public function setWeaponWidth(int $width)
		{
			if ($width < 1)
				return;
			$this->_weaponWidth = $width;
		}

	}
