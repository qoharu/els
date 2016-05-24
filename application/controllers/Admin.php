<?php 
/**
* 
*/
class Admin extends CI_Controller
{
		public function index(){

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('admin/admin');
		}

}