<?php
/**
* 
*/
class Course_model extends CI_Model
{
	function listcourse(){
		return $this->db->query("SELECT * FROM course
			ORDER BY id_course DESC
			")->result();
	}

}