<?php
	/**
	* 
	*/
	class Cop_model extends CI_Model
	{
		function getbe(){
			return $this->db->query(" SELECT fullname, user.id_user, scope.scope_name, directorate.directorate_name
				FROM directorate, user, profile, scope, expert
				WHERE user.id_user = profile.id_user
					AND profile.id_expert = expert.id_expert
					AND expert.id_directorate = directorate.id_directorate 
					AND directorate.id_scope = scope.id_scope
				")->result();
		}

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
			$count = count($user);

			for ($i=0; $i < $count ; $i++) { 
				$builder .= ", ('$id_cop', '$user[$i]')";
			}

			$query = $this->db->query("INSERT INTO cop_invitation(id_cop, id_user) VALUES".$builder);

			if ($query) {
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
				")->result();
		}

		function innov_archive(){
			$uid = $this->session->userdata('uid');
			return $this->db->query("SELECT title, id_cop, content, cop.created_at, cop.updated_at, fullname
				FROM cop, user, profile
				WHERE cop.id_user = user.id_user
					AND user.id_user = profile.id_user
					AND id_cop IN (SELECT id_cop FROM cop_invitation WHERE id_user='$uid' )
					AND status = 0
				")->result();
		}

		function get_comment($id, $page=0){
			$page = ($page * 20);

			$hasil['data'] = $this->db->query("SELECT fullname, user.id_user, title, content, expert_name, level_name, created_at 
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

		function innov_get_thread($id){
			return $this->db->query("SELECT title, cop.status, cop.summary, id_cop, content, user.id_user, cop.created_at, cop.updated_at, fullname, expert_name
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

	}