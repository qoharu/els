<?php
/**
* 
*/
class Course_model extends CI_Model
{
	function listcourse(){
		return $this->db->query("

			")->result();
	}

}