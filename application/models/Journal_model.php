<?php
/**
* 
*/
class Journal_model extends CI_Model
{
	
	function upload($data){
		$uid = $this->session->userdata('uid');
		$dir = $data['dir'];
		$desc = $data['desc'];
		$title = $data['title'];

		$filename = md5(microtime()).basename($data["file"]["name"]);
		$target_file = "uploads/".$filename;
		
		if (move_uploaded_file($data["file"]["tmp_name"], $target_file)){
			$kirim = $this->db->query("INSERT INTO journal (id_user, id_directorate, title, description, file) 
				VALUES ('$uid','$dir', '$title', '$desc', '$filename' ) ");
			if ($kirim) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}

	function listJournal(){
		return $this->db->query(" SELECT * FROM journal, directorate, user 
			WHERE journal.id_directorate = directorate.id_directorate 
				AND user.id_user = journal.id_user");
	}

	function getDirectorate(){
		return $this->db->query(" SELECT id_directorate, directorate_name FROM directorate")->result();
	}
}