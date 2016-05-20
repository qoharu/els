<?php
/**
* 
*/
class Discussion_model extends CI_Model
{

	function browse($value=''){

	}

	function getvote($id_scope=1){
		return $this->db->query("SELECT id_discussion, fullname, title, (SELECT COUNT(*) FROM discussion_vote where discussion.id_discussion = discussion_vote.id_discussion) as vote
			FROM discussion, profile
			WHERE discussion.id_user = profile.id_user
				AND id_scope = '$id_scope' ")->result();
	}

	function todo(){
		$uid = $this->session->userdata('uid');

		return $this->db->query("SELECT keterangan, id_step, step.id_scope, scope_name
			FROM step, scope
			WHERE step.id_scope = scope.id_scope
				AND step.step = 1
				AND step.id_user = '$uid' ")->result();
	}

	function disc_list(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT title, content, scope_name
			FROM discussion, scope
			WHERE discussion.id_user = '$uid'
				AND discussion.id_scope = scope.id_scope ")->result();
	}

	function getstep($id_step){
		return $this->db->query("SELECT keterangan, id_cop, scope_name, step.id_scope
			FROM step, scope
			WHERE id_step = '$id_step' ")->result();
	}
}