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

function kelasnotif($tipe){
	switch ($tipe) {
		case 0:
			$ret = 'fa fa-comments text-blue';
			break;
		case 1:
			$ret = 'fa fa-commenting text-green';
			break;
		case 2:
			$ret = 'fa fa-book text-aqua';
			break;
		case 3:
			$ret = 'fa fa-pencil text-red';
			break;
		case 4:
			$ret = 'fa fa-lightbulb-o text-black';
			break;
	}
	return $ret;
}

function getnotif(){
	$ci = & get_instance();
	$uid = $ci->session->userdata('uid');
	return $ci->db->query("SELECT * FROM notif WHERE id_user= '$uid' AND red = 0 ORDER BY id_notif DESC ")->result();
}

function greet(){
	$waktu = date('H');
	switch ($waktu) {
		case ($waktu <= 3 || $waktu >= 18) :
			echo "Malam";
			break;
		case ($waktu <= 10 && $waktu >= 3) :
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

function isbe(){
	$ci = & get_instance();
	$retVal = ($ci->session->userdata('level')=='be') ? 1 : 0 ;
	return $retVal;
}

function iskaryawan(){
	$ci = & get_instance();
	$retVal = ($ci->session->userdata('level')=='karyawan') ? 1 : 0 ;
	return $retVal;
}

function issuperadmin(){
	$ci = & get_instance();
	$retVal = ($ci->session->userdata('level')=='superadmin') ? 1 : 0 ;
	return $retVal;
}

function isadmin(){
	$ci = & get_instance();
	$retVal = ($ci->session->userdata('level')=='admin') ? 1 : 0 ;
	return $retVal;
}