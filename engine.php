<?php

$data = [];
$arr = ['red', 'blue', 'green', 'yellow', 'lime', 'magenta', 'black', 'gold', 'gray', 'tomato'];
for($i = 0; $i < 5; $i++){
	shuffle($arr);
	shuffle($arr);

	$lineArr = array_chunk($arr, 5)[0];
	foreach($lineArr as $k=>$v){
		$colorArr = array_rand($arr, 2);
		$color = $colorArr[0] == $k ? $colorArr[1] : $colorArr[0];
		$data[$i][] = ['word' => $v, 'color' => $arr[$color]];
	}
}
