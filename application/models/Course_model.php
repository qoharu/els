<?php
/**
* 
*/
class Course_model extends CI_Model
{
	function listcourse(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT title, scope_name, description, location, datetime,  id_course,
				(SELECT COUNT(*) FROM course_participant WHERE course_participant.id_course = course.id_course) AS count, quota, fullname, course.id_user, (SELECT COUNT(*) FROM course_participant WHERE course_participant.id_course = course.id_course AND id_user = '$uid') AS enrolled
			FROM course, profile, scope
			WHERE status = 1
				AND course.id_scope = scope.id_scope
				AND course.id_user = profile.id_user
			ORDER BY id_course DESC
			")->result();
	}

	function todo(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT discussion.title, discussion.id_step, discussion.id_discussion, scope.scope_name
			FROM discussion, step, scope
			WHERE scope.id_scope = discussion.id_scope
				AND discussion.id_user = '$uid'
				AND discussion.id_step = step.id_step
				AND step.step = 5 ")->result();
	}

	function mycourse(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT title, datetime, location, status, id_course
			FROM course
			WHERE id_user = '$uid' ")->result();
	}

	function enrolled(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT title, datetime, location, fullname, status, id_course
			FROM course, profile
			WHERE id_course IN (SELECT id_course FROM course_participant WHERE id_user = '$uid')
				AND course.id_user = profile.id_user ")->result();
	}

	function detail_new($id_step){
		return $this->db->query("SELECT id_discussion, scope_name, step.id_scope, step.id_step
			FROM discussion, step, scope
			WHERE discussion.id_step = step.id_step
				AND discussion.id_scope = scope.id_scope
				AND step.id_step = '$id_step' ")->row();
	}

	function post_new($data){
		$insert =  $this->db->insert('course', $data);
		$update = $this->db->query("UPDATE step SET step = 6 WHERE id_step = '$data[id_step]' ");
	}

	function enroll($id_course){
		$uid = $this->session->userdata('uid');
		return $this->db->query("INSERT INTO course_participant(id_course, id_user) VALUES('$id_course', '$uid') ");
	}
}