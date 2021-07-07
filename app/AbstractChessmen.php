<?php
namespace App;

use App\IChessmen;

abstract class AbstractChessmen implements IChessmen {
	protected $x;
	protected $y;
	
	public function __construct($x, $y){
		$this->x = $x;
		$this->y = $y;
	}
	
	public function getPosition(){
		$data = "x - {$this->x}, y - {$this->y}";
		return $data;
	}
	
	abstract public function move($x, $y);
}