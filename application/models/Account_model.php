<?php

class Account_model extends CI_Model
{
	function validate($data){
		$password=$data['password'];
		$email=$data['email'];
		$user = $this->db->query("SELECT * FROM user WHERE email='$email' AND password = '$password' ");

		if($user->num_rows()==1){
			$datauser = $user->row();
			if ($datauser->id_level == 2) {
				$query="SELECT user.id_user, email, level_name, fullname 
					FROM user, level, profile
					WHERE user.email='$email' 
						AND user.password='$password' 
						AND level.id_level = user.id_level
						AND user.id_user = profile.id_user ";
			}else{
				$query="SELECT user.id_user, email, level_name
					FROM user, level
					WHERE user.email='$email' 
						AND user.password='$password' 
						AND level.id_level = user.id_level ";
			}
			$data=$this->db->query($query)->row();
			$this->setsession($data);
			return true;
		}else{
			return false;
		}
	}

	function getprofile($u){
		return $this->db->query("SELECT * FROM user, profile, directorate, expert, scope
			WHERE user.id_user = '$u' ")->result();
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

	function setsession($data){
		$fullname = ($data->level_name == 'be') ? $data->fullname : explode('@',$data->email)[0] ;
		$sesi = array(	'uid' => $data->id_user,
					  	'email' => $data->email,
					  	'level' => $data->level_name,
					  	'fullname' => $fullname,
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

	function register($data){
		$fullname = $data['fullname'];
		$email = $data['email'];
		$username = $data['username'];
		$password = $data['password'];
		// $this->db->query("BEGIN");
		$query = "INSERT INTO user(username,password,email) VALUES('$username','$password','$email')";
		
		// $this->db->query($query);
		// $query = "SELECT LAST_INSERT_ID() as A";
		// $lastid = $this->db->query($query)->row()->A;
		// echo $lastid;
		// $query = "INSERT INTO profile(fullname,user_id) VALUES('$fullname',$lastid)";
	  	$this->db->query($query);
	  	$lastid = $this->db->insert_id();
		$query1 = "INSERT INTO profile(fullname,user_id) VALUES('$fullname','$lastid')";
		if ($this->db->query($query1)) {
			return true;
		}else{
			return false;
		}
	}
}