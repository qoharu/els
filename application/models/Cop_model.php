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

	}