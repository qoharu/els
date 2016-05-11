<?php 
/**
* 
*/

class General_model extends CI_Model
{
	function getdirectorate(){
		return $this->db->query(" SELECT id_directorate, directorate_name FROM directorate")->result();
	}

	function getjournalcount($id_user){
		return $this->db->query("SELECT * FROM journal where id_user = '$id_user' ")->num_rows();
	}

	function getdiscussioncount($id_user){
		return $this->db->query("SELECT * FROM discussion where id_user = '$id_user' ")->num_rows();
	}

	function getcoursecount($id_user){
		return $this->db->query("SELECT * FROM course where id_user = '$id_user' ")->num_rows();
	}

	
}
