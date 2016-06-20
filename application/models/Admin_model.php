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

	function getexp(){
		return $this->db->query("SELECT keterangan, file, fullname, id_exp 
			FROM exp, profile 
			WHERE status = 0 
				AND exp.id_user = profile.id_user ")->result();
	}

	function getpendingjournal(){
		return $this->db->query("SELECT user.*, journal.*, scope.id_scope 
			FROM journal
			LEFT JOIN user ON journal.id_user = user.id_user
			LEFT JOIN directorate ON journal.id_directorate = directorate.id_directorate
			LEFT JOIN scope ON scope.id_scope = directorate.id_scope
			LEFT JOIN profile ON journal.id_user = profile.id_user
			WHERE status = 0
			")->result();
	}

	function getjournal(){
		return $this->db->query("SELECT * 
			FROM journal
			LEFT JOIN user ON journal.id_user = user.id_user
			LEFT JOIN profile ON journal.id_user = profile.id_user
			WHERE status = 1")->result();
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

	function getclosedcourse(){
		return $this->db->query("SELECT title, scope_name, description, location, datetime,  id_course,
				(SELECT COUNT(*) FROM course_participant WHERE course_participant.id_course = course.id_course) AS count, quota, fullname, course.id_user
			FROM course, profile, scope
			WHERE status = 0
				AND course.id_scope = scope.id_scope
				AND course.id_user = profile.id_user
			ORDER BY id_course DESC
			")->result();
	}

	function detailcourse($id){
		return $this->db->query("SELECT title, email, NIK as nik, expert_name, scope_name, description, created_at, summary, status, location, datetime, enddate, id_course,
				(SELECT COUNT(*) FROM course_participant WHERE course_participant.id_course = course.id_course) AS count, quota, fullname, course.id_user
			FROM course, profile, scope, user, expert
			WHERE id_course = '$id'
				AND course.id_scope = scope.id_scope
				AND course.id_user = profile.id_user
				AND profile.id_expert = expert.id_expert
				AND course.id_user = user.id_user")->row();
	}

	function courseparticipant($id){
		return $this->db->query("SELECT fullname, email, expert_name, course_participant.id_user
				FROM course_participant
				LEFT JOIN user ON course_participant.id_user = user.id_user
				LEFT JOIN profile ON course_participant.id_user = profile.id_user
				LEFT JOIN expert ON profile.id_expert = expert.id_expert
				WHERE id_course = '$id' ")->result();
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


	function register($data){
		$fullname = $data['username'];
		$fullname = $data['fullname'];
		$email = $data['email'];
		$password = md5($data['password']);
		$level = $data['level'];

		$insert = $this->db->query("INSERT INTO user(password, email, username, id_level) VALUES('$password','$email','$username', '$level')");
		if ($insert && $level == 2) {
			$id = $this->db->query("SELECT max(id_user) as id_user FROM user ")->row()->id_user;
			$masukin = $this->db->query("INSERT INTO profile(fullname, id_user) VALUES ('$fullname','$id') ");
			return $masukin;
		}else{
			return $insert;
		}
	}

	function deactivate($id_user){
		return $this->db->query("UPDATE user SET stat = 0 WHERE id_user = '$id_user' ");
	}

	function activate($id_user){
		return $this->db->query("UPDATE user SET stat = 1 WHERE id_user = '$id_user' ");
	}

	function disc_get_thread($id){
		return $this->db->query("SELECT title, discussion.status, discussion.summary, NIK as nik, id_discussion, scope_name, content, user.id_user, discussion.created_at, discussion.updated_at, fullname, expert_name, email
				FROM discussion, user, profile, expert, scope
				WHERE discussion.id_user = user.id_user
					AND id_discussion = '$id'
					AND discussion.id_scope = scope.id_scope
					AND user.id_user = profile.id_user
					AND profile.id_expert = expert.id_expert
				")->row();
	}

	function disc_participant($id){
		return $this->db->query("SELECT DISTINCT discussion_comment.id_user, email, fullname, expert_name, (SELECT COUNT(*) FROM discussion_comment WHERE discussion_comment.id_user = user.id_user AND id_discussion='$id') AS count
			FROM discussion_comment
			JOIN user ON user.id_user = discussion_comment.id_user
			LEFT JOIN profile ON user.id_user = profile.id_user
			LEFT JOIN expert ON profile.id_expert = expert.id_expert
			WHERE id_discussion = '$id'
			ORDER BY count DESC
			")->result();
	}

	function cop_get_thread($id){
		return $this->db->query("SELECT cop.title, cop.status, cop.summary, cop.id_cop, cop.content, cop.created_at, cop.updated_at, cop.type,
					scope.scope_name, user.id_user, profile.fullname, expert.expert_name, user.email
				FROM cop
				LEFT JOIN user ON cop.id_user = user.id_user
				LEFT JOIN profile ON user.id_user = profile.id_user
				LEFT JOIN expert ON profile.id_expert = expert.id_expert
				LEFT JOIN scope ON cop.id_scope = scope.id_scope
				WHERE id_cop = '$id'
				")->row();
	}

	function cop_participant($id){
		return $this->db->query("SELECT DISTINCT cop_comment.id_user, email, fullname, expert_name, (SELECT COUNT(*) FROM cop_comment WHERE cop_comment.id_user = user.id_user AND id_cop='$id') AS count
			FROM cop_comment
			JOIN user ON user.id_user = cop_comment.id_user
			LEFT JOIN profile ON user.id_user = profile.id_user
			LEFT JOIN expert ON profile.id_expert = expert.id_expert
			WHERE id_cop = '$id'
			ORDER BY count DESC
			")->result();
	}

	function getpending(){
		return $this->db->query("SELECT profile.fullname, profile.id_profile, user.email, profile.id_user, id_pending 
			FROM user, profile, profile_pending
			WHERE profile_pending.id_profile = profile.id_profile
				AND profile.id_user = user.id_user ")->result();
	}

	function getpendingdetail($id){
		return $this->db->query("SELECT * FROM profile_pending WHERE id_pending = '$id' ")->row();
	}

	function approve_pending($data){
		$update =  $this->db->query("UPDATE profile 
			SET fullname='$data->fullname', NIK='$data->NIK',
				birthdate='$data->birthdate', gender='$data->gender',
				id_expert='$data->id_expert', pic='$data->pic'
			WHERE id_profile = '$data->id_profile'  ");

		$delete = $this->db->query("DELETE FROM profile_pending WHERE id_pending='$data->id_pending' ");

		if ($update && $delete) {
			return 1;
		}else{
			return 0;
		}
	}

	function decline_pending($id){
		$delete = $this->db->query("DELETE FROM profile_pending WHERE id_pending='$id' ");
		return $delete;
	}

	function data_pending($id){
		return $this->db->query("SELECT * FROM profile_pending, expert WHERE id_profile = '$id' AND expert.id_expert = profile_pending.id_expert ")->row();
	}

	function data_profile($id){
		return $this->db->query("SELECT * FROM profile, expert WHERE id_profile = '$id' AND expert.id_expert = profile.id_expert ")->row();
	}

	function approve_exp($id){
		return $this->db->query("UPDATE exp SET status = 1 WHERE id_exp = '$id' ");
	}

	function decline_exp($id){
		return $this->db->query("DELETE FROM exp WHERE id_exp='$id' ");
	}

	function approve_journal($id_journal){
		return $this->db->query("UPDATE journal SET status = 1 WHERE id_journal = '$id_journal' ");
	}

	function decline_journal($id, $keterangan){
		return $this->db->query("UPDATE journal SET status = 2, keterangan = '$keterangan' WHERE id_journal='$id' ");
	}
}