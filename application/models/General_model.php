<?php 
/**
* 
*/

class General_model extends CI_Model
{
	function getdirectorate(){
		return $this->db->query(" SELECT id_directorate, directorate_name FROM directorate")->result();
	}

	
}
