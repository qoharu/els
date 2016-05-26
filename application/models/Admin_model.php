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
		return $this->db->query("SELECT fullname, email, user.id_user, nik, registered_at
			FROM user, profile
			WHERE user.id_user = profile.id_user
				AND user.id_level = 2")->result();
	}

	function getkaryawan(){
		return $this->db->query("SELECT email, registered_at, id_user
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
		return $this->db->query("SELECT * FROM discussion, profile WHERE discussion.id_user = discussion.id_user AND status = 1")->result();
	}

}