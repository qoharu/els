<?php

/**
* 
*/
class Home extends CI_Controller
{

	public function index(){
		$data['title'] = "Home";
		if ($this->session->userdata('islogin')) {
			if (isbe() or iskaryawan()) {
				redirect('home/dash');
			}else if(isadmin()){
				redirect('admin');
			}
		}else{
			$this->load->view('home', $data);
		}
	}

	public function dash(){
		$data['title'] = "Dashboard";
		$this->load->view('dash',$data);
	}

	public function about(){
		echo "about";
	}
}