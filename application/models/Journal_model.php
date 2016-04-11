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

	function edit($data){

	}

	function postcomment($data,$id){
		$content = $data['content'];
		$uid = $this->session->userdata('uid');
		$kirim = $this->db->query("INSERT INTO journal_comment (id_user, id_journal, content) 
				VALUES ('$uid','$id', '$content') ");
		if ($kirim) {
			return true;
		}else{
			return false;
		}
	}

	function listjournal(){
		return $this->db->query(" SELECT * FROM journal, directorate, user 
			WHERE journal.id_directorate = directorate.id_directorate 
				AND user.id_user = journal.id_user");
	}

	function browsejournal($page,$query=""){
		return $this->db->query(" SELECT * FROM journal, directorate, user 
			WHERE journal.id_directorate = directorate.id_directorate 
				AND user.id_user = journal.id_user
				AND (title LIKE %'$query'% OR description LIKE %'$query'%)
			LIMIT '$page',10 ");
	}

	function viewjournal($id){
		return $this->db->query("SELECT * FROM journal, directorate, user 
			WHERE journal.id_directorate = directorate.id_directorate 
				AND user.id_user = journal.id_user
				AND journal.id_journal = '$id'
		");
	}

	function getcomment($id,$page){
		return $this->db->query("SELECT * FROM journal_comment, user, profile
			WHERE journal_comment.id_comment = '$id'
			ORDER BY id_comment DESC
			LIMIT '$page',15
			");
	}


}