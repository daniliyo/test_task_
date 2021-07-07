<?php
namespace App;

interface IChessmen {
	public function move($x, $y);
	public function getPosition();
}