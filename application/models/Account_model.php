<?php

class Account_model extends CI_Model
{
	function validate($data){
		$password=$data['password'];
		$email=$data['email'];
		$query="select id_user,email,level_name 
				from user,level
				where user.email='$email' 
					and user.password='$password' 
					and level.id_level = user.id_level ";
		$db=$this->db->query($query);
		if($db->num_rows()==1){
			$data=$db->row();
			$this->setsession($data);
			return true;
		}else{
			return false;
		}
	}

	function getprofile($u){
		return $this->db->query("SELECT * FROM user, profile, directorate, expert, scope
			WHERE NIP = '$u' ");
	}

	function hasprofile($uid){
		$db=$this->db->query("SELECT id_profile FROM profile WHERE id_user='$uid' AND login='1' ");
		if ($db->num->rows()!=1) {
			$this->db->query("UPDATE profile SET login='1' WHERE id_user='$uid' ")
		}
	}

	function setsession($data){
		$sesi = array(	'uid' => $data->id_user,
					  	'email' => $data->email,
					  	'level' => $data->level_name,
					  	'isLogin' => FALSE
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