<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Login_Model');
	}		
	
	public function index()
	{
		if ($this->identity->is_admin()){
			redirect('admin/admin');
		} else if ($this->identity->is_anggota()){
			redirect('anggota/profile');
		} else 
			redirect('site/login');

	}

	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->identity->login($username,$password)){
				if ($this->identity->is_admin()){
					redirect('admin/admin');
				} else {
					redirect('anggota/profile');
				}
			} else {
				$data['error'] = $this->session->flashdata('error');
				$this->load->view('login',$data);
			}
		}
		
	}

	public function logout()
	{
		$this->identity->logout();
		redirect('site/login');
	}

}



?>