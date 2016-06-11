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

	public function login($success=3){
		if ($this->session->userdata('islogin')) {
			redirect('home/dash');
		}
		$data['success'] = $success;
		$data['title'] = "Login Page";
		$this->load->view('login', $data);
	}

	public function logout(){
		$this->General_model->clearnotif();
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
				case 'superadmin':
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
			$this->login(0);
		}
	}

	public function edit(){
		$uid = $this->session->userdata('uid');
		$data['title'] = "Edit Profile";
		$data['profile'] = $this->Account_model->getprofile($uid);
		$data['expert'] = $this->General_model->getexpert();
		$this->load->view('edit',$data);
	}

	public function register(){
		$data['title'] = "Register Page";
		$this->load->view('signup', $data);
	}

	public function user($uid){
		$data['profile'] = $this->Account_model->getprofile($uid);
		$data['experience'] = $this->Account_model->getexp($uid);
		$data['point'] = $this->Account_model->point($uid);
		$data['pending'] = ($this->Account_model->pending($data['profile']->id_profile) >= 1) ? 1 : 0 ;
		$data['title'] = "Profile";

		$this->load->view('user',$data);
	}

	public function addexp(){
		$this->load->view('addexp');
	}

	public function addexp_post(){
		$data['keterangan'] = $this->input->post('keterangan');
		$data['file'] = $_FILES['file'];
		$data['id_user'] = $this->session->userdata('uid');
		$insert = $this->Account_model->addexp($data);

		if ($insert) {
			redirect("account/user/".$this->session->userdata('uid'));
		}

	}

	public function post_edit(){
		$data['NIK'] = $this->input->post('NIK');
		$data['fullname'] = $this->input->post('fullname');
		$data['gender'] = $this->input->post('gender');
		$data['birthdate'] = $this->input->post('birthdate');
		$data['id_expert'] = $this->input->post('expert');
		$data['id_profile'] = $this->Account_model->getidprofile($this->session->userdata('uid'));
		$data['pic'] = $_FILES['picture'];

		$edit = $this->Account_model->post_edit($data);
		if ($edit) {
			redirect('account/user/'.$this->session->userdata('uid'));
		}
	}

	public function changepwd($uid = 0){
		if ($uid == 0) {
			$uid = $this->session->userdata('uid');
		}

		if (isadmin() || issuperadmin() || $this->session->userdata('uid') == $uid) {
			$data['user'] = $uid;
			$data['title'] = 'Reset Password';
			$this->load->view('changepwd',$data);
		}else{
			redirect('home');
		}

	}
	
	public function changepwd_post($id)
	{
		$newpwd=$this->input->post('password');
		$update=$this->Account_model->changepwd($id,$newpwd);
		if ($update) {
			if (isadmin() || issuperadmin()) {
				redirect('admin/user');
			}else{
				redirect('home');
			}
		}
	}
}