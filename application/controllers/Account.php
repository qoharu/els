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
		redirect('account/login');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function logout(){
		session_start();
		session_destroy();
		redirect('home');
	}

	public function post_login(){
		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));
		$validasi = $this->Account_model->validate($data);
		if ($validasi) {
			switch ($this->session->userdata('level')) {
				case 'admin':
					redirect('admin');
					break;
				case 'be':
					if ($this->Account_model->hasprofile($this->session->userdata('uid'))) {
						# code...
					}
					break;
				default:
					# code...
					break;
			}
			if ($this->session->userdata('level')=='admin') {
				redirect('admin');
			}else if(){

				redirect('home/dash');
			}

		}else{
			redirect('account/login');
		}
	}

	public function register(){
		$this->load->view('signup');
	}

	public function editprofile(){
		
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
		$data['profile'] = $this->Account_model->getprofile();
		// $this->load->view('profile',$data);
	}
	
}