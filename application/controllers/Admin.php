<?php 
/**
* 
*/
class Admin extends CI_Controller
{
		function __construct(){
			parent::__construct();
			$this->load->model('Admin_model');
		}
		public function index(){
			redirect('admin/summary');
		}

		public function summary(){
			$data['title'] = "Summary";
			$data['summary'] = $this->Admin_model->summary();
			$data['active'][0] = 'active';
			$this->load->view('admin/admin',$data);
		}

		public function user(){
			$data['title'] = "Admin - Users";
			$data['active'][1] = 'active';
			$data['be'] = $this->Admin_model->getbe();
			$data['karyawan'] = $this->Admin_model->getkaryawan();

			$this->load->view('admin/user',$data);
		}

		public function deactivate($id_user){
			$deactivate = $this->Admin_model->deactivate($id_user);

			if ($deactivate) {
				redirect('admin/user');
			}
		}

		public function activate($id_user){
			$activate = $this->Admin_model->activate($id_user);

			if ($activate) {
				redirect('admin/user');
			}
		}

		public function journal(){
			$data['title'] = "Admin - Journal";
			$data['active'][2] = 'active';
			$data['pending_journal'] = $this->Admin_model->getpendingjournal();
			$data['journal'] = $this->Admin_model->getjournal();

			$this->load->view('admin/journal', $data);
		}

		public function approve_journal($id_journal){
			$update = $this->Admin_model->approve_journal($id_journal);

			if ($update) {
				redirect('admin/journal');
			}
		}

		public function course(){
			$data['title'] = "Admin - Course";
			$data['active'][3] = 'active';
			$data['course'] = $this->Admin_model->getcourse();

			$this->load->view('admin/course', $data);
		}

		public function discussion(){
			$data['title'] = "Admin - Discussion";
			$data['active'][4] = 'active';
			$data['discussion'] = $this->Admin_model->getdiscussion();

			$this->load->view('admin/discussion', $data);
		}

		public function cop(){
			$data['title'] = "Admin - COP";
			$data['active'][5] = 'active';
			$data['best_practice'] = $this->Admin_model->getbp();
			$data['innovation'] = $this->Admin_model->getinnov();

			$this->load->view('admin/cop', $data);
		}

		public function register(){
			$data['title'] = "Admin - Register";
			$data['active'][1] = 'active';
			$this->load->view('admin/register', $data);
		}

		public function register_post(){
		$data['email'] = $this->input->post('email');
		$data['fullname'] = $this->input->post('fullname');
		$data['password'] = $this->input->post('password');
		$data['level'] = $this->input->post('level');
		
		$input = $this->Admin_model->register($data);
		
		if ($input) {
			redirect('admin/register');
		}
	}

}