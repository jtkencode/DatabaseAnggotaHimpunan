<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Login_Model');
	}		
	
	public function index()
	{
		redirect('site/login');
	}

	public function login()
	{
		if ( !empty($this->session->flashdata('error')) ) {
			$data['error'] = $this->session->flashdata('error');
			$this->load->view('login',$data);
		} else {
			$this->load->view('login');
		}
	}

}



?>