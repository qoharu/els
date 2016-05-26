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

		public function register(){
			$this->load->view('admin/register');
		}

		public function journal(){
			$data['title'] = "Admin - Journal";
			$data['active'][2] = 'active';
			$data['pending_journal'] = $this->Admin_model->getpendingjournal();
			$data['journal'] = $this->Admin_model->getjournal();

			$this->load->view('admin/journal', $data);
		}

		public function course(){
			$data['title'] = "Admin - Course";
			$data['active'][3] = 'active';
			$data['course'] = $this->Admin_model->getcourse();

			$this->load->view('admin/course', $data);
		}

		public function group_discussion(){
			# code...
		}

		public function innovation(){
			# code...
		}

		public function best_practice(){
			# code...
		}

}