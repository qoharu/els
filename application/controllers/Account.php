<?php 
/**
* 
*/
class Account extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Account_model');
	}

	public function index()
	{
		echo "account index page";
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function post_login(){

	}

	public function register(){
		$this->load->view('signup');
	}

	public function post_register(){
		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['nip'] = $this->input->post('nip');
		$data['fullname'] = $this->input->post('fullname');
		$data['posisi'] = $this->input->post('posisi');
		
		$input = $this->Account_model->register($data);
		if ($input) {
			# code...
		}
	}

	public function profile($u){

	}
	

}