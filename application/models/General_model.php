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
		if (!empty($uid)) {
			$builder = "('$uid[0]', '$title', '$link', '$type')";
			$count = count($uid);
			if ($count > 1) {
				for ($i=1; $i < $count ; $i++) {
					if (!empty($uid[$i])) {
						$builder .= ", ('$uid[$i]', '$title', '$link', '$type')";
					}
				}
			}
			$query = $this->db->query("INSERT INTO notif(id_user, title, link, type) VALUES".$builder);

			return $query;
		}else{
			return 1;
		}
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

	function getuserscope($id){
		return $this->db->query("SELECT scope.scope_name, scope.id_scope 
			FROM user, profile, scope, expert, directorate
			WHERE user.id_user = profile.id_user
				AND profile.id_expert = expert.id_expert
				AND expert.id_directorate = directorate.id_directorate
				AND directorate.id_scope = scope.id_scope
				AND user.id_user = '$id' ")->row();
	}
	function getjournalcount($id_user){
		return $this->db->query("SELECT COUNT(*) AS count FROM journal where id_user = '$id_user' ")->row()->count;
	}

	function getdiscussioncount($id_user){
		return $this->db->query("SELECT COUNT(*) AS count FROM discussion where id_user = '$id_user' ")->row()->count;
	}

	function getcoursecount($id_user){
		return $this->db->query("SELECT COUNT(*) AS count FROM course where id_user = '$id_user' ")->row()->count;
	}

	function cekstep($id_scope){
		return 3 - $this->db->query("SELECT * FROM step where id_scope= '$id_scope' AND bp_quota = 1 ")->num_rows();
	}

	function getadminscope(){
		$username = $this->session->userdata('username');
		switch ($username) {
			case 'adminec':
				return 1;
				break;
			case 'adminem':
				return 2;
				break;
			case 'adminspb':
				return 3;
				break;
			case 'adminict':
				return 4;
				break;
		}
	}

	// function getbe(){
	// 	return $this->db->query("SELECT fullname, email, stat, user.id_user, nik, registered_at
	// 		FROM user, profile
	// 		WHERE user.id_user = profile.id_user
	// 			AND user.id_level = 2")->result();
	// }
	
}
