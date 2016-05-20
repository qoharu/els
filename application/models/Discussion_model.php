<?php
/**
* 
*/
class Discussion_model extends CI_Model
{

	function browse($value=''){

	}

	function vote_detail($id_scope=1){
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
		return $this->db->query("SELECT title, content, scope_name, status, id_step, id_discussion
			FROM discussion, scope
			WHERE discussion.id_user = '$uid'
				AND discussion.id_scope = scope.id_scope ")->result();
	}

	function disc_get_thread($id){
		return $this->db->query("SELECT title, discussion.status, discussion.summary, scope_name, content, user.id_user, discussion.created_at, discussion.updated_at, fullname, expert_name
				FROM discussion, user, profile, expert, scope
				WHERE discussion.id_user = user.id_user
					AND id_discussion = '$id'
					AND discussion.id_scope = scope.id_scope
					AND user.id_user = profile.id_user
					AND profile.id_expert = expert.id_expert
				")->result();
	}

	function get_disc_comment($id, $page=0){
			$page = ($page * 20);

			$hasil['data'] = $this->db->query("SELECT fullname, user.id_user, title, content, expert_name, level_name, created_at 
				FROM discussion_comment, user, profile, level, expert
				WHERE id_discussion = '$id' 
					AND discussion_comment.id_user = user.id_user
					AND user.id_user = profile.id_user
					AND user.id_level = level.id_level
					AND profile.id_expert = expert.id_expert
				ORDER BY id_discussion ASC
				LIMIT $page, 20
				")->result();

			$hasil['count'] = $this->db->query("SELECT COUNT(*) as count FROM discussion_comment WHERE id_discussion = '$id' ")->result();
			return $hasil;
		}

	function detail_new($id_step){
		return $this->db->query("SELECT keterangan, id_step, id_cop, scope_name, step.id_scope
			FROM step, scope
			WHERE id_step = '$id_step'
				AND step.id_scope = scope.id_scope ")->result();
	}

	function post_new($data){
		$step = $data['id_step'];

		$insert = $this->db->insert('discussion', $data);
		$update = $this->db->query("UPDATE step SET step = 2 WHERE id_step = '$step' ");
		if ($insert && $update) {
			return 1;
		}else{
			return 0;
		}
	}
}