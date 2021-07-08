<?php

$listNominals = $_POST['nominals'];
$amount = (int)$_POST['amount'];

//$listNominals = '5, 20, 50, 200';
//$amount = 230;

$arrNomimals = explode(",", $listNominals);
foreach($arrNomimals as $k=>$v){
	$arrNomimals[$k] = trim($v);
	if(!$v) unset($arrNomimals[$k]);
}
rsort($arrNomimals);

//check 
$firstArrNomimals = end($arrNomimals);
/*
проверка на валидность если минимальный номинал равен 5 или номинал 1-го разряда
*/
if($firstArrNomimals == 5 || count($arrNomimals) == 1) $elemCheck = $amount/$firstArrNomimals;
if(isset($elemCheck) && !is_int($elemCheck)){
	
	$data['error'][0] = true;
	$data['error']['min'] = $firstArrNomimals*floor($elemCheck);
	$data['error']['max'] = $firstArrNomimals*ceil($elemCheck);
	echo json_encode($data);
	exit();
}
function ATMrecurs($amount, $arrNominals, $keyCurrent=0, $data = ['error'=>[0=>false]]){
	
	//$nominal = trim(array_pop($arrNominals));
	$nominal = $arrNominals[$keyCurrent];
	
	//если в массиве есть элемент, значит скрипт возвращается назад для подбора оптимального набора купюр  
	if(isset($data['res'][$nominal])){
		
		if($data['res'][$nominal] == 0){
			unset($data['res'][$nominal]);
			return ATMrecurs($amount, $arrNominals, --$keyCurrent, $data);
		} else {
			// если не пустой - возвращаем сумму одного шага назад
			$amount += $nominal;
			$data['res'][$nominal]--;
			//если достигли начала и была ранее предложена 1 купюра - пропускаем
			if($keyCurrent == 0 && $data['res'][$nominal] == 0) return ATMrecurs($amount, $arrNominals, 1, $data);
			
			return ATMrecurs($amount, $arrNominals, ++$keyCurrent, $data);
		}
	} 
	
	$data['res'][$nominal] = intdiv($amount, $nominal);
	
	if(is_int($amount/$nominal)) return $data;

	$newAmount = $amount - $nominal*intdiv($amount, $nominal);
	
	$a = count($arrNominals) - 1;
	if($a == $keyCurrent && !is_int($amount/$nominal)){
		$newAmount += $nominal*$data['res'][$nominal];
		unset($data['res'][$nominal]);
		return ATMrecurs($newAmount, $arrNominals, --$keyCurrent, $data);
	}
	
	return ATMrecurs($newAmount, $arrNominals, ++$keyCurrent, $data);
}


$data = ATMrecurs($amount, $arrNomimals);
echo json_encode($data);
?>