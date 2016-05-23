<?php

function switchstatus($status){
		switch ($status) {
			case 0:
				$ret['title'] = 'closed';
				$ret['class'] = 'bg-red';
				break;
			case 1:
				$ret['title'] = 'On vote';
				$ret['class'] = 'bg-orange';
				break;
			case 2:
				$ret['title'] = 'Ongoing';
				$ret['class'] = 'bg-green';
				break;
			case 3:
				$ret['title'] = 'Disabled';
				$ret['class'] = 'bg-grey';
				break;
		}
		return $ret;
	}

function greet(){
	$waktu = date('H');
	switch ($waktu) {
		case ($waktu <= 3 && $waktu >= 19) :
			echo "Malam";
			break;
		case ($waktu <= 10 && $waktu >= 4) :
			echo "Pagi";
			break;
		case ($waktu <= 14 && $waktu >= 11) :
			echo "Siang";
			break;
		case ($waktu <= 18 && $waktu >= 15) :
			echo "Sore";
			break;
	}
}