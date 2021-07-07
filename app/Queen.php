<?php
namespace App;
use App\AbstractChessmen;

class Queen extends AbstractChessmen {
	public function move($x, $y){
		try{
			if($x < 1 || $x > 8 || $y < 1 || $y > 8) throw new \Exception("Недопустимые координаты");
			
			if($this->x != $x && $this->y != $y){
				if(abs($this->x-$x) != abs($this->y - $y)) throw new \Exception("Недопустимый ход");
			}
			
			$this->x = $x;
			$this->y = $y;
			
		} catch (\Exception $e){
			echo $e->getMessage();
		}
	}
}