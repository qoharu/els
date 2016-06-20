<?php

class Account_model extends CI_Model
{
	function validate($data){
		$password=$data['password'];
		$username=$data['username'];
		$user = $this->db->query("SELECT * FROM user WHERE username='$username' AND password = '$password' AND stat = 1 ");

		if($user->num_rows()==1){
			$datauser = $user->row();
			if ($datauser->id_level == 2) {
				$query="SELECT user.id_user,username, email, level_name, fullname, pic 
					FROM user, level, profile
					WHERE user.username='$username' 
						AND user.password='$password'
						AND user.stat = 1
						AND level.id_level = user.id_level
						AND user.id_user = profile.id_user ";
			}else{
				$query="SELECT user.id_user,username, email, level_name
					FROM user, level
					WHERE user.username='$username' 
						AND user.password='$password'
						AND user.stat = 1 
						AND level.id_level = user.id_level ";
			}
			$data=$this->db->query($query)->row();
			$this->setsession($data);
			return true;
		}else{
			return false;
		}
	}
	function getlevel($u){
		return $this->db->query("SELECT level_name, user.id_level 
			FROM user, level 
			WHERE user.id_user = '$u'
				AND user.id_level = level.id_level
			")->row();
	}
	function getprofile($u){
		$uid = (int) $u;
		return $this->db->query("SELECT
			fullname, id_profile, NIK, expert_name, email, directorate_name, scope_name, gender, birthdate, user.id_user, pic, registered_at,
			(SELECT COUNT(*) FROM journal WHERE id_user = '$uid') AS countjournal,
			(SELECT COUNT(*) FROM course WHERE id_user = '$uid') AS countcourse,
			(SELECT COUNT(*) FROM discussion WHERE id_user = '$uid') AS countdisc,
			(SELECT SUM(value) FROM point WHERE id_user='$uid' ) AS point
		FROM user, profile, directorate, expert, scope
		WHERE user.id_user = '$uid'
			AND user.id_user = profile.id_user
			AND profile.id_expert = expert.id_expert
			AND expert.id_directorate = directorate.id_directorate
			AND directorate.id_scope = scope.id_scope
		")->row();
	}

	function point($id){
		return $this->db->query("SELECT * FROM point WHERE id_user = '$id' ")->result();
	}

	function pointdetail($id){
		$hasil['innov'] = $this->db->query("SELECT COUNT(*) as count, SUM(value) as sum 
			FROM point WHERE id_user = '$id' AND keterangan LIKE '%Create Innovation%' ")->row();
		$hasil['bp'] = $this->db->query("SELECT COUNT(*) as count, SUM(value) as sum 
			FROM point WHERE id_user = '$id' AND keterangan LIKE '%Create BP%' ")->row();
		$hasil['gd'] = $this->db->query("SELECT COUNT(*) as count, SUM(value) as sum 
			FROM point WHERE id_user = '$id' AND keterangan LIKE '%Create Discussion%' ")->row();
		$hasil['respond'] = $this->db->query("SELECT COUNT(*) as count, SUM(value) as sum 
			FROM point WHERE id_user = '$id' AND keterangan LIKE '%respond%' ")->row();
		$hasil['journal'] = $this->db->query("SELECT COUNT(*) as count, SUM(value) as sum 
			FROM point WHERE id_user = '$id' AND keterangan LIKE '%Journal%' ")->row();

		return $hasil;
	}

	function hasprofile($uid){
		$db=$this->db->query("SELECT id_profile FROM profile WHERE id_user='$uid' AND login='1' ");
		if ($db->num_rows() != 1) {
			$this->db->query("UPDATE profile SET login='1' WHERE id_user='$uid' ");
			return 0;
		}else{
			return 1;
		}
	}

	function post_edit($data){
		$filename = md5(microtime()).basename($data["pic"]["name"]);
		$target_file = "uploads/profile/".$filename;
				
		if (move_uploaded_file($data["pic"]["tmp_name"], $target_file)){
			$data["pic"] = $filename;
			$insert = $this->db->insert('profile_pending',$data);
			return $insert;
		}else{
			return false;
		}
	}

	function getidprofile($id){
		return $this->db->query("SELECT id_profile FROM profile WHERE id_user = '$id' ")->row()->id_profile;
	}

	function setsession($data){
		$fullname = ($data->level_name == 'be') ? $data->fullname : explode('@',$data->email)[0] ;
		if (empty($data->pic)) {
			$pic = 'default.png';
		}else{
			$pic = $data->pic;
		}
		$sesi = array(	'uid' => $data->id_user,
					  	'email' => $data->email,
					  	'level' => $data->level_name,
					  	'fullname' => $fullname,
					  	'pic' => $pic,
					  	'username' => $data->username,
					  	'islogin' => TRUE
					  	);
		$this->session->set_userdata($sesi);
	}

	function checkaccount($type,$name){
		if ($type=='username') {
			$query="select username
					from user
					where user.username='$name'";
		}else{
			$query="select email
					from user
					where user.email='$name'";
		}
		$db=$this->db->query($query);
		if ($db->num_rows() >=1 ) {
			return false;
		}else{
			return true;
		}
	}

	function getexp($uid){
		return $this->db->query("SELECT * FROM exp WHERE id_user = '$uid' AND status = 1 ")->result();
	}

	function addexp($data){
		// $filename = md5(microtime()).basename($data["file"]["name"]);
		// $target_file = "uploads/experience/".$filename;
				
		// if (move_uploaded_file($data["file"]["tmp_name"], $target_file)){
		if (1){
			// $data["file"] = $filename;
			$insert = $this->db->insert('exp',$data);
			return $insert;
		}else{
			return false;
		}
	}

	function pending($id){
		return $this->db->query("SELECT COUNT(*) AS count FROM profile_pending WHERE id_profile = '$id' ")->row()->count;
	}

	function changepwd($id, $password){
		$password = md5($password);
		return $this->db->query("UPDATE user SET password = '$password' WHERE id_user = '$id' ");
	}
	
}