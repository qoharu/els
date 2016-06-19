<?php 
/**
* 
*/
class Admin extends CI_Controller
{
		function __construct(){
			parent::__construct();
			$this->load->model('Admin_model');
			if (!isadmin() && !issuperadmin()) {
				redirect('home');
			}
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
			$data['pending'] = $this->Admin_model->getpending();
			$data['exp'] = $this->Admin_model->getexp();
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

		public function decline_journal($id){
			$data['title'] = "Decline Journal";
			$data['id'] = $id;
			$this->load->view('admin/journal_decline',$data);
		}

		public function decline_journal_post($id){
			$update = $this->Admin_model->decline_journal($id, $this->input->post('keterangan'));
			if ($update) {
				redirect('admin/journal');
			}
		}

		public function course(){
			$data['title'] = "Admin - Course";
			$data['active'][3] = 'active';
			$data['course'] = $this->Admin_model->getcourse();
			$data['closed'] = $this->Admin_model->getclosedcourse();

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

		public function register($warning = "", $success=3){
			$data['title'] = "Admin - Register";
			$data['active'][6] = 'active';
			$data['warning'] = $warning;
			$data['success'] = $success;
			$this->load->view('admin/register', $data);
		}

		public function register_post(){
			$data['email'] = $this->input->post('email');
			$data['fullname'] = $this->input->post('fullname');
			$data['password'] = $this->input->post('password');
			$data['level'] = $this->input->post('level');
			
			$success = $this->Admin_model->register($data);
			
			$this->register(NULL, $success);
		}

		public function upload_post(){
			$i=0;
			$res = "";
			echo "<a href='".site_url('admin/register')."'>BACK </a>";
			if (!empty($_FILES['file_csv']['name'])) {
				if (($handle = fopen($_FILES['file_csv']['tmp_name'], "r")) !== FALSE) {
					$res .= "<table class='table table-bordered' border=1>";
					$res .= "<thead>
						<td>Fullname</td>
						<td>Email</td>
						<td>Password</td>
						<td>Level</td>
						<td>Status</td>
					</thead>";
		            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		            	if ($i != 0) {
							$reg['fullname'] = $data[0];
		            		$reg['email'] = $data[1];
							$reg['password'] = $data[2];
							$reg['level'] = ($data[3] == 2) ? 2 : 3 ;
		            		
		            		$ret[$i] = $this->Admin_model->register($reg);
		            		$ret[$i] = ($ret[$i]) ? "Success" : "Failed";
		                	$res .= "<tr>
		                		<td>$data[0]</td>
		                		<td>$data[1]</td>
		                		<td>$data[2]</td>
		                		<td>$data[3]</td>
		                		<td>$ret[$i]</td>
		                		</tr>";
		            	}
		            	$i++;
		            }
		            fclose($handle);
		            $res .= "</table>";
		        }
			}
			$this->register($res);
		}

		public function print_discussion($id_disc){
			$data['detail'] = $this->Admin_model->disc_get_thread($id_disc);
			$data['participant'] = $this->Admin_model->disc_participant($id_disc);
			$data['title'] = "Discussion Report - ".$data['detail']->title;
			$data['url'] = site_url('discussion/view_discussion/'.$id_disc);
			$this->load->view('admin/print_discussion', $data);
		}

		public function print_cop($id_cop){
			$data['detail'] = $this->Admin_model->cop_get_thread($id_cop);
			$data['participant'] = $this->Admin_model->cop_participant($id_cop);
			$data['title'] = "Discussion Report - ".$data['detail']->title;
			$data['url'] = ($data['detail']->type == 1) ? site_url('cop/innovation_view/'.$id_cop) : site_url('cop/bp_view/'.$id_cop) ;
			$this->load->view('admin/print_cop', $data);
		}

		public function print_course($id){
			$data['detail'] = $this->Admin_model->detailcourse($id);
			$data['participant'] = $this->Admin_model->courseparticipant($id);
			$data['title'] = "Course Report - ".$data['detail']->title;
			$data['url'] = site_url('course/view_course/'.$id);
			$this->load->view('admin/print_course', $data);
		}


		public function approve_pending($id){
			$pending = $this->Admin_model->getpendingdetail($id);
			$update = $this->Admin_model->approve_pending($pending);
			if ($update) {
				redirect('admin/user');
			}

		}

		public function decline_pending($id){
			$delete = $this->Admin_model->decline_pending($id);
			if ($delete) {
				redirect('admin/user');
			}

		}

		public function view_pending($id){
			$data['pending'] = $this->Admin_model->data_pending($id);
			$data['profile'] = $this->Admin_model->data_profile($id);
			$data['title'] = "View Pending Profile";

			$this->load->view('admin/pending',$data);
		}

		public function approve_exp($id){
			$update = $this->Admin_model->approve_exp($id);
			if ($update) {
				redirect('admin/user');
			}
		}

		public function decline_exp($id){
			$update = $this->Admin_model->decline_exp($id);
			if ($update) {
				redirect('admin/user');
			}
		}

}