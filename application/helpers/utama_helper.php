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

