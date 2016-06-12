<?php
/**
* 
*/
class Discussion_model extends CI_Model
{

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

	function get_archive($page,$q=''){
		$page = ($page * 20);
		return $this->db->query("SELECT title, fullname, content, scope_name, id_discussion, (SELECT COUNT(*) FROM discussion WHERE status = 0) AS count
			FROM discussion, scope, profile
			WHERE discussion.status = 0
				AND discussion.id_scope = scope.id_scope
				AND discussion.id_user = profile.id_user
				AND (title LIKE '%$q%' OR content LIKE '%$q%')
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

			$hasil['data'] = $this->db->query("SELECT fullname, user.id_user, email, title, content, expert_name, level_name, created_at 
				FROM discussion_comment
				LEFT JOIN user ON discussion_comment.id_user = user.id_user 
				LEFT JOIN profile ON user.id_user = profile.id_user
				LEFT JOIN level ON user.id_level = level.id_level
				LEFT JOIN expert ON profile.id_expert = expert.id_expert
				WHERE id_discussion = '$id'
				ORDER BY id_comment ASC
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

	function cekstate(){
		return $this->db->query("SELECT step FROM state")->row()->step;
	}

	function close_post($id_discussion, $summary){
		$close = $this->db->query("UPDATE discussion SET status = 0, summary = '$summary' WHERE id_discussion = '$id_discussion' ");
		$stepdata = $this->db->query("SELECT id_step FROM discussion WHERE id_discussion = '$id_discussion' ")->row()->id_step;
		$step = $this->db->query("UPDATE step set step = 4 WHERE id_step = '$stepdata' ");
		if ($close && $step) {
			return 1;
		}
	}

	function disc_participant($id){
			$uid = $this->session->userdata('uid');
			$cop = $this->db->query("SELECT DISTINCT id_user
				FROM discussion_comment
				WHERE id_discussion = '$id'
					AND id_user != '$uid'
				")->result();
			foreach ($cop as $data) {
				$hasil[] = $data->id_user;
			}
			return @$hasil;
		}

	function getidstarter($id){
		return $this->db->query("SELECT id_user, title FROM discussion WHERE id_discussion = '$id' ")->row();
	}

	function disc_trigger($date = 0){
		if ($date == 0) {
			$date = date('d');
		}
		$state = $this->db->query("SELECT step FROM state")->row();
		$state = $state->step;

		switch ($date) {
			case ($date <= 7):
				if ($state != 1) {
					// update state waktu
					$state = $this->db->query("UPDATE state SET step = 1");
					
					// Yang belum floor judul discussion otomatis fail
					$fail = $this->db->query("UPDATE step SET step = 9 WHERE step = 1");
					if ($state && $fail) {
						return 1;
					}else{
						return 0;
					}
				}
				break;
			case ($date > 7 && $date <= 21):
				if ($state != 2) {
					// setting quota jadi 0 biar di bp bisa nambah penugasan
					$quota = $this->db->query("UPDATE step SET bp_quota = 0 WHERE step = 2 OR step = 9");
					// ambil id_discussion dengan vote terbesar
					for ($i=1; $i <=4 ; $i++) { 
						$id_disc[$i] = $this->db->query("
							SELECT id_step, id_discussion,
								(SELECT COUNT(*) 
									FROM discussion_vote 
									WHERE discussion.id_discussion = discussion_vote.id_discussion) AS vote
							FROM discussion
							WHERE id_scope = '$i'
								AND status = 1
							ORDER BY vote DESC, discussion.created_at ASC
							LIMIT 1
							 ")->row();
						// Jika ada hasilnya lalu simpan id_discussion dan id_step ke array
						if (! empty(@$id_disc[$i]->id_discussion)) {
							$id_dis[$i] = @$id_disc[$i]->id_discussion;
							$id_step[$i] = @$id_disc[$i]->id_step;
						}
					}

					//convert array jadi string dengan pemisah koma
					// set status discussion dgn vote terbesar jadi open
					if (!empty($id_disc) && !empty($id_step)) {
						$disc = join(',', $id_dis);
						$id_step = join(',', $id_step);
						$update = $this->db->query("UPDATE discussion SET status = 2 WHERE id_discussion IN ($disc) ");
						// sisanya jadi disabled
						$updatedis = $this->db->query("UPDATE discussion SET status = 3 WHERE status = 1 AND id_discussion NOT IN ($disc) ");
						// set step jadi 3 utk pemenang vote
						$step = $this->db->query("UPDATE step SET step = 3 WHERE id_step IN ($id_step) ");
						// set step selesai (8) utk yang kalah
						$step2 = $this->db->query("UPDATE step SET step = 8 WHERE step = 2 ");
					}else{
						$update = 1;
						$updatedis = 1;
						$step = 1;
						$step2 = 1;
					}
					// set state waktu jadi 2 (on going discussion)
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
					// Close semua forum yang masih aktif
					$update = $this->db->query("UPDATE discussion SET status = 0 WHERE status = 2");
					// Wajib buka course untuk BE yang buka diskusi
					$step = $this->db->query("UPDATE step SET step = 4 WHERE step = 3 ");
					// Set state waktu jadi 3 (Selamat berbahagia)
					$state = $this->db->query("UPDATE state SET step = 3");
					
					if ($update && $step && $state) {
						return 1;
					} else {
						return 0;
					}
				}
				break;
		}
	}
}