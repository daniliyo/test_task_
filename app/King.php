<?php
namespace App;
use App\AbstractChessmen;

class King extends AbstractChessmen {
	public function move($x, $y){
		
		try{
			if($x < 1 || $x > 8 || $y < 1 || $y > 8) throw new \Exception("Недопустимые координаты");
			if((abs($this->x-$x))>1 || (abs($this->y-$y))>1) throw new \Exception("Недопустимый ход");
			
			$this->x = $x;
			$this->y = $y;
		} catch (\Exception $e){
			echo $e->getMessage();
		}
		
	}
}