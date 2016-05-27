<?php
/**
* 
*/
class Discussion_model extends CI_Model
{

	function browse($value=''){

	}

	function vote_detail($id_scope=1){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT id_discussion, fullname, title, (SELECT COUNT(*) FROM discussion_vote where discussion.id_discussion = discussion_vote.id_discussion) as vote, (SELECT IF( EXISTS(SELECT * FROM discussion_vote WHERE id_user='$uid' AND discussion.id_discussion = discussion_vote.id_discussion ),1,0)) as voted
			FROM discussion, profile
			WHERE discussion.id_user = profile.id_user
				AND id_scope = '$id_scope'
				AND status = 1 ")->result();
	}

	function todo(){
		$uid = $this->session->userdata('uid');

		return $this->db->query("SELECT keterangan, id_step, step.id_scope, scope_name
			FROM step, scope
			WHERE step.id_scope = scope.id_scope
				AND step.step = 1
				AND step.id_user = '$uid' ")->result();
	}

	function get_discussion($id_scope){
		return $this->db->query("SELECT title, content, id_discussion, fullname, views, discussion.id_user
			FROM discussion, profile
			WHERE discussion.id_user = profile.id_user
				AND discussion.id_scope = '$id_scope'
				AND status = 2 ")->row();
	}

	function get_archive($page){
		$page = ($page * 20);
		return $this->db->query("SELECT title, fullname, content, scope_name, id_discussion, (SELECT COUNT(*) FROM discussion WHERE status = 0) AS count
			FROM discussion, scope, profile
			WHERE discussion.status = 0
				AND discussion.id_scope = scope.id_scope
				AND discussion.id_user = profile.id_user
			LIMIT $page, 20 ")->result();
	}

	function disc_list(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT title, content, scope_name, status, id_step, id_discussion
			FROM discussion, scope
			WHERE discussion.id_user = '$uid'
				AND discussion.id_scope = scope.id_scope ")->result();
	}

	function disc_get_thread($id){
		return $this->db->query("SELECT title, discussion.status, discussion.summary, id_discussion, scope_name, content, user.id_user, discussion.created_at, discussion.updated_at, fullname, expert_name
				FROM discussion, user, profile, expert, scope
				WHERE discussion.id_user = user.id_user
					AND id_discussion = '$id'
					AND discussion.id_scope = scope.id_scope
					AND user.id_user = profile.id_user
					AND profile.id_expert = expert.id_expert
				")->result();
	}

	function post_respond($data){
		return $this->db->insert('discussion_comment', $data);
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

	function vote($data){
		return $this->db->insert('discussion_vote',$data);
	}

	function disc_trigger(){
		$date = date('d');
		$state = $this->db->query("SELECT step FROM state")->row();
		$state = $state->step;

		switch ($date) {
			case ($date <= 7):
				if ($state != 1) {
					$state = $this->db->query("UPDATE state SET step = 1");
					$quota = $this->db->query("UPDATE step SET bp_quota = 0 WHERE step = 1 OR step = 2");
					$fail = $this->db->query("UPDATE step SET step = 9 WHERE step = 1");
					$next = $this->db->query("UPDATE step SET step = 3 WHERE step = 2");
					if ($state && $quota && $fail && $next) {
						return 1;
					}else{
						return 0;
					}
				}
				break;
			case ($date > 7 && $date <= 21):
				if ($state != 2) {
					for ($i=1; $i <=4 ; $i++) { 
						$id_disc[$i] = $this->db->query("
							SELECT id_step, id_discussion,
								(SELECT COUNT(*) 
									FROM discussion_vote 
									WHERE discussion.id_discussion = discussion_vote.id_discussion) AS vote
							FROM discussion
							WHERE id_scope = '$i'
							ORDER BY vote DESC, discussion.created_at ASC
							LIMIT 1
							 ")->row();
						
						if (! empty(@$id_disc[$i]->id_discussion)) {
							$id_dis[$i] = @$id_disc[$i]->id_discussion;
							$id_step[$i] = @$id_disc[$i]->id_step;
						}
						
					}
					$disc = join(',', $id_dis);
					$id_step = join(',', $id_step);
					$update = $this->db->query("UPDATE discussion SET status = 2 WHERE id_discussion IN ($disc) ");
					$updatedis = $this->db->query("UPDATE discussion SET status = 3 WHERE status = 2 ");

					$step = $this->db->query("UPDATE step SET step = 4 WHERE id_step IN ($id_step) ");
					$step2 = $this->db->query("UPDATE step SET step = 8 WHERE step = 3 ");
					$state = $this->db->query("UPDATE state SET step = 2");

					if ($update && $updatedis && $step && $step2 && $state) {
						return 1;
					} else {
						return 0;
					}	
				}
				break;
			case ($date >= 22):
				if ($state != 3) {
					$update = $this->db->query("UPDATE discussion SET status = 0 WHERE status = 2");
					$step = $this->db->query("UPDATE step SET step = 5 WHERE step = 4 ");
					$state = $this->db->query("UPDATE state SET step = 3");
					
					if ($update && $step) {
						return 1;
					} else {
						return 0;
					}
				}
				break;
		}
	}
}