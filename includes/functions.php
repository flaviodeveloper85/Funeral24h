<?php

function getDatetimeNow($t = 0) {
	$tz_object = new DateTimeZone('Brazil/East');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
	if($t == 1){
		return $datetime->format('d/m/Y');	
	}else{
		return str_replace(" "," as ", $datetime->format('d/m/Y H:i:s'));	
	}
}

function FormatMoney($number) {
	setlocale(LC_MONETARY, 'pt_BR', "ptb");
	return money_format('%n', $number);
}

?>