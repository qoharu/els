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

	function getexpert(){
		return $this->db->query("SELECT id_expert, expert_name FROM expert")->result();
	}

	function getnotif(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT * FROM notif WHERE id_user= '$uid' AND red = 0 ")->result();
	}

	function setnotif($uid, $title, $link, $type){
		$builder = "('$uid[0]', '$title', '$link', '$type')";
		$count = count($uid);
		if ($count > 1) {
			for ($i=1; $i < $count ; $i++) {
				$builder .= ", ('$uid[$i]', '$title', '$link', '$type')";
			}
		}
		$query = $this->db->query("INSERT INTO notif(id_user, title, link, type) VALUES".$builder);

		return $query;
	}

	function setpoint($id_user, $value, $keterangan ){
		$data['id_user'] = $id_user;
		$data['value'] = $value;
		$data['keterangan'] = $keterangan;

		return $this->db->insert('point', $data);
	}

	function getscope(){
		return $this->db->query("SELECT scope_name, id_scope FROM scope")->result();
	}

	function clearnotif(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("UPDATE notif SET red = 1 WHERE id_user = '$uid' ");
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

	function cekstep($id_scope){
		return 3 - $this->db->query("SELECT * FROM step where id_scope= '$id_scope' AND bp_quota = 1 ")->num_rows();
	}

	
}
