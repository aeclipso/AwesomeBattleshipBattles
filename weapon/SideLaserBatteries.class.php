<?php

	class SideLaserBatteries extends Weapon{
		private $_direction = "left";
		private $_weaponWidth = 4;

		public function calculateZone(int $myShipX, int $myShipY, $myShipOrientation, int $range_type) {
			//Высчитывает зону поражения начиная с координат myX, myY, которые указывают на голову корабля
			//Ориентация головы корабля: up, down, left, right
			//Тип дальности стрельбы: 0 - short, 1 - medium, 2 - long
			$zone = [];
			$total_range = $this->getRange($range_type);

			$x_offset = 1;
			$y_offset = 0;
			$row_index = 1;
			$points_in_row = 0;
			if ($myShipOrientation == "up" && $this->_direction === "right")
			{
				for ($i = 0; $i < $total_range; $i++)
				{
					// y
					//9|      .
					//8|     ..
					//7| ->X...
					//6|   X...
					//5|   X...
					//4|   X...
					//3|     ..
					//2|      .
					//1|____________x
					//0 123456789
					$x = $x_offset + $myShipX;
					$y = $myShipY - $y_offset;
					if ($x > 150 || $y > 100 || $y <= 0)
						continue;
					array_push($zone,array('x' => $x, 'y' => $y));
					$y_offset++;
					$points_in_row++;
					if ($points_in_row === $this->_weaponWidth / 2 * $row_index + 2){
						$row_index++;
						$x_offset++;
						$y_offset = 1 - $row_index;
						$points_in_row = 0;
					}
				}
			}
			else if ($myShipOrientation == "up" && $this->_direction === "left"){
				for ($i = 1; $i <= $total_range; $i++)
				{
					// y
					//9|.
					//8|..
					//7|...X<-
					//6|...X
					//5|...X
					//4|...X
					//3|..
					//2|.
					//1|____________x
					//0 123456789
					$x =  $myShipX - $x_offset;
					$y = $myShipY - $y_offset;
					if ($x <= 0 || $y > 100 || $y <= 0)
						continue;
					array_push($zone,array('x' => $x, 'y' => $y));
					$y_offset++;
					$points_in_row++;
					if ($points_in_row === $this->_weaponWidth / 2 * $row_index + 2){
						$row_index++;
						$x_offset++;
						$y_offset = 1 - $row_index;
						$points_in_row = 0;
					}
				}
			}
			else if ($myShipOrientation == "right" && $this->_direction == "right")
			{
				$x_offset = 0;
				$y_offset = 1;
				for ($i = 0; $i < $total_range; $i++)
				{
					// y
					//9|
					//8|
					//7|  XXXX<-
					//6|  ....
					//5| ......
					//4|........
					//3|.........
					//2|..........
					//1|...........
					//0|____________x
					//  0123456789
					$x = $myShipX - $x_offset;
					$y = $myShipY - $y_offset;
					if ($x > 150 || $y > 100 || $y <= 0 || $x <= 0)
						continue;
					array_push($zone,array('x' => $x, 'y' => $y));
					$x_offset++;
					$points_in_row++;
					if ($points_in_row === $this->_weaponWidth / 2 * $row_index + 2){
						$row_index++;
						$y_offset++;
						$x_offset = 1 - $row_index;
						$points_in_row = 0;
					}
				}
			}
			else if ($myShipOrientation == "right" && $this->_direction == "left")
			{

			}
			else if ($myShipOrientation == "down" && $this->_direction == "left")
			{
				//Надо реализовать
			}
			else if ($myShipOrientation == "down" && $this->_direction == "right")
			{
				//Надо реализовать
			}
			else if ($myShipOrientation == "up" && $this->_direction == "right")
			{
				//Надо реализовать
			}
			else if ($myShipOrientation == "up" && $this->_direction == "left")
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
