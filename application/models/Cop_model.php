<?php
	/**
	* 
	*/
	class Cop_model extends CI_Model
	{

		function insert_innovation($data){
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("INSERT INTO cop(id_user, title, content, type)
				VALUES('$uid', '$data[title]', '$data[description]', 1) ");
			if ($query) {
				$lastid = $this->db->insert_id();
				return $lastid;
			}else{
				return 0;
			}
		}

		function invite($id_cop, $user){
			$uid = $this->session->userdata('uid');
			$builder = "('$id_cop', '$uid')";
			$b_notif = "('$user[0]', 'New Forum Invitation', '".site_url('cop/innovation_view/'.$id_cop)."', '4')";

			$count = count($user);

			for ($i=0; $i < $count ; $i++) { 
				$builder .= ", ('$id_cop', '$user[$i]')";
				if ($i != 0) {
					$b_notif .= ", ('$user[$i]', 'New Forum Invitation', '".site_url('cop/innovation_view/'.$id_cop)."', '4')";
				}
			}

			$query = $this->db->query("INSERT INTO cop_invitation(id_cop, id_user) VALUES".$builder);
			$notif = $this->db->query("INSERT INTO notif(id_user, title, link, type) VALUES".$b_notif);
			if ($query && $notif) {
				return 1;
			}else{
				return 0;
			}
		}

		function list_innov(){
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT title, id_cop, content, cop.created_at, cop.updated_at, fullname
				FROM cop, user, profile
				WHERE cop.id_user = user.id_user
					AND user.id_user = profile.id_user
					AND id_cop IN (SELECT id_cop FROM cop_invitation WHERE id_user='$uid' )
					AND status = 1
					ORDER BY id_cop DESC
				")->result();
		}

		function innov_archive($page, $q=''){
			$page = ($page * 5);
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT title, user.id_user, id_cop, content, cop.created_at, cop.updated_at, fullname, (SELECT COUNT(*) FROM cop WHERE type=1 AND status = 0 AND (title LIKE '%$q%' OR content LIKE '%$q%')) AS count
				FROM cop, user, profile
				WHERE cop.id_user = user.id_user
					AND user.id_user = profile.id_user
					AND type = 1
					AND status = 0
					AND (title LIKE '%$q%' OR content LIKE '%$q%')
				ORDER BY id_cop DESC
				LIMIT $page, 5

				")->result();
		}

		function get_comment($id, $page=0){
			$page = ($page * 20);

			$hasil['data'] = $this->db->query("SELECT fullname, pic, user.id_user, title, content, expert_name, level_name, created_at 
				FROM cop_comment, user, profile, level, expert
				WHERE id_cop = '$id' 
					AND cop_comment.id_user = user.id_user
					AND user.id_user = profile.id_user
					AND user.id_level = level.id_level
					AND profile.id_expert = expert.id_expert
				ORDER BY id_cop ASC
				LIMIT $page, 20
				")->result();

			$hasil['count'] = $this->db->query("SELECT COUNT(*) as count FROM cop_comment WHERE id_cop = '$id' ")->result();
			return $hasil;
		}

		function bp_close($id, $data){
			$summary = $data['summary'];
			$id_scope = $data['scope'];
			$topic = $data['topic'];

			$update =  $this->db->query("UPDATE cop SET summary = '$summary', status = 0 WHERE id_cop = '$id' ");

			$count = 0;
			foreach (@$data['be'] as $be) {
				if (!empty($be)) {
					$keterangan = $topic[$count];
					if ($count == 0) {
						$builder = "('$be', '$id_scope', 1, '$keterangan', '$id' )";
					}else{
						$builder .= ", ('$be', '$id_scope', 1, '$keterangan', '$id' )";
					}
					$count++;
				}
			}

			if ($count >= 1 ) {
				$insert = $this->db->query("INSERT INTO step(id_user, id_scope, step, keterangan, id_cop ) 
					VALUES".$builder);
			}else{
				$insert = 1;
			}
			
			if ($update && $insert) {
				return 1;
			}else{
				return 0;
			}

		}

		function innov_get_thread($id){
			return $this->db->query("SELECT title, cop.status, profile.pic, cop.summary, id_cop, content, user.id_user, cop.created_at, cop.updated_at, fullname, expert_name
				FROM cop, user, profile, expert
				WHERE cop.id_user = user.id_user
					AND id_cop = '$id'
					AND user.id_user = profile.id_user
					AND profile.id_expert = expert.id_expert
				")->result();
		}

		function innov_close($id, $summary){
			return $this->db->query("UPDATE cop SET summary = '$summary', status = 0 WHERE id_cop = '$id' ");
		}

		function innov_post_comment($data){
			return $this->db->insert('cop_comment',$data);
		}

		function bp_get_thread($id){
			return $this->db->query("SELECT scope_name, scope.id_scope, pic, title, cop.status, cop.summary, id_cop, content, user.id_user, cop.created_at, cop.updated_at, fullname, expert_name
				FROM cop, user, profile, expert, scope
				WHERE cop.id_user = user.id_user
					AND cop.id_scope = scope.id_scope
					AND id_cop = '$id'
					AND user.id_user = profile.id_user
					AND profile.id_expert = expert.id_expert
				")->result();
		}

		function list_bp(){
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT title, scope_name, id_cop, content, cop.created_at, cop.updated_at, fullname
				FROM cop, user, profile, scope
				WHERE cop.id_user = user.id_user
					AND cop.id_scope = scope.id_scope
					AND user.id_user = profile.id_user
					AND type = 2
					AND status = 1
					ORDER BY id_cop DESC
				")->result();
		}

		function bp_archive($page, $q=''){
			$page = ($page * 5);
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT title, id_user, scope_name, id_cop, content, cop.created_at, cop.updated_at, fullname, (SELECT COUNT(*) FROM cop WHERE type=2 AND status = 0 AND (title LIKE '%$q%' OR content LIKE '%$q%')) AS count
				FROM cop, user, profile, scope
				WHERE cop.id_user = user.id_user
					AND cop.id_scope = scope.id_scope
					AND user.id_user = profile.id_user
					AND type = 2
					AND status = 0
					AND (title LIKE '%$q%' OR content LIKE '%$q%')
				ORDER BY id_cop DESC
				LIMIT $page, 5
				")->result();
		}

		function bp_post_comment($data){
			return $this->db->insert('cop_comment',$data);
		}

		function insert_bp($data){
			$insert = $this->db->insert('cop',$data);
			if ($insert) {
				$lastid = $this->db->insert_id();
				return $lastid;
			}else{
				return 0;
			}
		}

		function bp_topic($id_scope=1){
			return $this->db->query("SELECT keterangan, fullname, user.id_user, id_cop
				FROM step, user, profile
				WHERE step.id_scope = '$id_scope'
					AND step.id_user = user.id_user
					AND (step.step = 1 OR step.step = 2)
					AND bp_quota = 1
					AND user.id_user = profile.id_user")->result();
		}

		function bp_penugasan($id_cop){
			return $this->db->query("SELECT keterangan, fullname, step.id_user
				FROM step, profile
				WHERE step.id_user = profile.id_user
					AND id_cop = '$id_cop' ")->result();
		}

		function cop_participant($id){
			$uid = $this->session->userdata('uid');
			/*	Select distinct fungsinya untuk mengambil record dari table yang nilainya berbeda
			misal :
			|_id_|_comment_|
			| 1  | asdasd  |
			| 2  | aaa     |
			| 3  | xcvxcv  |
			| 3  | www     |
			SELECT id akan menghasilkan 1,2,3,3
			sedangkan SELECT DISTICT id akan menghasilkan 1,2,3	
			*/
			$cop = $this->db->query("SELECT DISTINCT id_user
				FROM cop_comment
				WHERE id_cop = '$id'
					AND id_user != '$uid'
				")->result();
			foreach ($cop as $data) {
				$hasil[] = $data->id_user;
			}
			return @$hasil;
		}

		function innov_participant($id){
			$uid = $this->session->userdata('uid');
			$cop = $this->db->query("SELECT DISTINCT id_user
				FROM cop_invitation
				WHERE id_cop = '$id'
					AND id_user != '$uid'
				")->result();
			foreach ($cop as $data) {
				$hasil[] = $data->id_user;
			}
			return @$hasil;
		}

		function getidstarter($id){
			return $this->db->query("SELECT id_user, title FROM cop WHERE id_cop = '$id' ")->row();
		}

		function add_attachment($id, $file){
			$filename = md5(microtime()).basename($file["name"]);
			$target_file = "uploads/attachment/".$filename;
			
			if (move_uploaded_file($file["tmp_name"], $target_file)){
				$kirim = $this->db->query("INSERT INTO cop_attachment (id_cop, file) 
					VALUES ('$id', '$filename' ) ");
				if ($kirim) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		public function getattachment($id){
			return $this->db->query("SELECT * FROM cop_attachment WHERE id_cop = '$id' ")->result();
		}

	}