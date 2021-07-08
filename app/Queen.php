<?php
namespace App;
use App\AbstractChessmen;

class Queen extends AbstractChessmen {
	public function move(int $x, int $y){
		try{
			if($x < 1 || $x > 8 || $y < 1 || $y > 8) throw new \Exception("Недопустимые координаты");
			if($this->x == $x && $this->y == $y) throw new \Exception("Фигура не может сделать ход 'остаться на месте'");
			
			/*
			если x и y были изменены, значит было смещение фигуры с обоих диагоналей
			в противном случае фигура сместилась либо по горизонтали, либо по вертикали 
			*/
			if($this->x != $x && $this->y != $y){
				/*
					если есть разница по модулю между x и y, значит фигура отклонилась с диагонали 
				*/
				if(abs($this->x-$x) != abs($this->y - $y)) throw new \Exception("Недопустимый ход");
			}
			
			$this->x = $x;
			$this->y = $y;
			
		} catch (\Exception $e){
			echo $e->getMessage();
		}
	}
}