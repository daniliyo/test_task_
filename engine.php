<?php

$listNominals = $_POST['nominals'];
$amount = (int)$_POST['amount'];

$arrNomimals = explode(",", $listNominals);
foreach($arrNomimals as $k=>$v){
	if(!$v) unset($arrNomimals[$k]);
}
sort($arrNomimals);

//check 
$firstArrNomimals = $arrNomimals[array_key_first($arrNomimals)];
$elemCheck = $amount/$firstArrNomimals;
if(!is_int($elemCheck)){
	
	$data['error'] = true;
	$data['error']['min'] = $firstArrNomimals*floor($elemCheck);
	$data['error']['max'] = $firstArrNomimals*ceil($elemCheck);
	echo json_encode($data);
	exit();
}

function ATMrecurs($amount, $arrNominals, $data = ['error'=>false]){
	$nominal = trim(array_pop($arrNominals));
	$data['res'][$nominal] = intdiv($amount, $nominal);
	
	if(is_int($amount/$nominal)) return $data;

	$newAmount = $amount - $nominal*intdiv($amount, $nominal);
	
	return ATMrecurs($newAmount, $arrNominals, $data);
}


$data = ATMrecurs($amount, $arrNomimals);
echo json_encode($data);
?>