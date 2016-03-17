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

	public function profile($u){

	}
	

}