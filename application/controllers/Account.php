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

	public function login(){
		if ($this->session->userdata('islogin')) {
			redirect('home/dash');
		}
		$data['title'] = "Login Page";
		$this->load->view('login', $data);
	}

	public function logout(){
		session_start();
		session_destroy();
		redirect('home');
	}

	public function post_login(){
		if ($this->session->userdata('islogin')) {
			redirect('home/dash');
		}
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
						redirect('home/dash');
					}else{
						redirect('account/edit');
					}
					break;
				case 'karyawan':
					redirect('home/dash');
					break;
			}
		}else{
			redirect('account/login?message=');
		}
	}

	public function edit(){
		$uid = $this->session->userdata('uid');
		$data['user'] = $this->Account_model->getprofile($uid);

	}

	public function register(){
		$data['title'] = "Register Page";
		$this->load->view('signup', $data);
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

	public function user($u){
		$data['profile'] = $this->Account_model->getprofile($u);
		$data['title'] = "Profile";
		$this->load->view('user',$data);
	}
	
}