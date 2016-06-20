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
			}else if(isadmin() or issuperadmin()){
				redirect('admin');
			}
		}else{
			$this->load->view('home', $data);
		}
	}

	public function dash(){
		$data['title'] = "Dashboard";
		$data['be'] = $this->General_model->getbe();
		$this->load->view('dash',$data);
	}

}