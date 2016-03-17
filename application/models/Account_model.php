<?php

class Account_model extends CI_Model
{
	function validate($data){
		$password=$data['password'];
		$username=$data['username'];
		$query="select user_id,username,level_name 
				from user,user_level
				where user.username='$username' 
					and user.password='$password' 
					and user_level.level_id = user.level ";
		$db=$this->db->query($query);
		if($db->num_rows()==1){
			$data=$db->row();
			$this->setsession($data);
			return true;
		}else{
			return false;
		}
	}
	function setsession($data){
		$sesi = array(	'uid' => $data->user_id,
					  	'username' => $data->username,
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