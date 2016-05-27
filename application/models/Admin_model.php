<?php 

/**
* 
*/
class Admin_model extends CI_Model
{
	function summary(){
		return $this->db->query("SELECT (SELECT COUNT(*) FROM user) as user,
			(SELECT COUNT(*) FROM journal) as journal, 
			(SELECT COUNT(*) FROM discussion) as discussion,
			(SELECT COUNT(*) FROM cop WHERE type = 1) as innovation,
			(SELECT COUNT(*) FROM cop WHERE type = 2) as best_practice,
			(SELECT COUNT(*) FROM course) as course")->row();
	}

	function getbe(){
		return $this->db->query("SELECT fullname, email, stat, user.id_user, nik, registered_at
			FROM user, profile
			WHERE user.id_user = profile.id_user
				AND user.id_level = 2")->result();
	}

	function getkaryawan(){
		return $this->db->query("SELECT email, registered_at, stat, id_user
			FROM user
			WHERE user.id_level = 3")->result();
	}

	function getpendingjournal(){
		return $this->db->query("SELECT * FROM journal, profile WHERE journal.id_user = profile.id_user AND status = 0")->result();
	}

	function getjournal(){
		return $this->db->query("SELECT * FROM journal, profile WHERE journal.id_user = profile.id_user AND status = 1")->result();
	}

	function getcourse(){
		return $this->db->query("SELECT title, scope_name, description, location, datetime,  id_course,
				(SELECT COUNT(*) FROM course_participant WHERE course_participant.id_course = course.id_course) AS count, quota, fullname, course.id_user
			FROM course, profile, scope
			WHERE status = 1
				AND course.id_scope = scope.id_scope
				AND course.id_user = profile.id_user
			ORDER BY id_course DESC
			")->result();
	}

	function getdiscussion(){
		return $this->db->query("SELECT * FROM discussion, profile WHERE discussion.id_user = profile.id_user ")->result();
	}

	function getbp(){
		return $this->db->query("SELECT * FROM cop, profile WHERE type = 2 AND cop.id_user = profile.id_user")->result();
	}
	function getinnov(){
		return $this->db->query("SELECT * FROM cop, profile WHERE type = 1 AND cop.id_user = profile.id_user")->result();
	}

	function approve_journal($id_journal){
		return $this->db->query("UPDATE journal SET status = 1 WHERE id_journal = '$id_journal' ");
	}

	function register($data){
		$fullname = $data['fullname'];
		$email = $data['email'];
		$password = md5($data['password']);
		$level = $data['level'];

		$insert = $this->db->query("INSERT INTO user(password, email, id_level) VALUES('$password','$email', '$level')");
		if ($insert && $level == 2) {
			$id = $this->db->query("SELECT max(id_user) as id_user FROM user ")->row()->id_user;
			$masukin = $this->db->query("INSERT INTO profile(fullname, id_user) VALUES ('$fullname','$id') ");

			return $masukin;
		}else{
			return 1;
		}
	}

	function deactivate($id_user){
		return $this->db->query("UPDATE user SET stat = 0 WHERE id_user = '$id_user' ");
	}

	function activate($id_user){
		return $this->db->query("UPDATE user SET stat = 1 WHERE id_user = '$id_user' ");
	}

}