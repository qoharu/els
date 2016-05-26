<?php 
/**
* 
*/

class General_model extends CI_Model
{
	function getdirectorate(){
		return $this->db->query(" SELECT id_directorate, directorate_name FROM directorate")->result();
	}

	function getbe(){
		return $this->db->query(" SELECT fullname, user.id_user, scope_name, directorate_name, directorate.id_directorate
			FROM directorate, user, profile, scope, expert
			WHERE user.id_user = profile.id_user
				AND user.id_level = 2
				AND user.stat = 1
				AND profile.id_expert = expert.id_expert
				AND expert.id_directorate = directorate.id_directorate 
				AND directorate.id_scope = scope.id_scope
			")->result();
	}

	function getscope(){
		return $this->db->query("SELECT scope_name, id_scope FROM scope")->result();
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

	function cekstep($id_scope, $step){
		return 3 - $this->db->query("SELECT * FROM step where id_scope= '$id_scope' AND step = '$step' ")->num_rows();
	}

	
}
