<?php
namespace App;

interface IChessmen {
	public function move(int $x, int $y);
	public function getPosition();
}