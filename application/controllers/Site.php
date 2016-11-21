<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('identity');
		$this->load->model('Anggota_Model');
		$this->load->library('session');
	}		
	
	public function index()
	{
		if ($this->identity->is_admin()){
			redirect('admin/dashboard');
		} else if ($this->identity->is_anggota()){
			redirect('anggota/dashboard');
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
					redirect('admin/dashboard');
				} else {
					$id = $this->session->userdata('user_id');
					if ($this->Anggota_Model->is_not_complete($id) || $this->Kontak_model->is_not_complete($id)){
						redirect('anggota/register');
					}
					redirect('anggota/dashboard');
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

	public function success()
	{
		$data['path'] = $this->session->flashdata('success_path');
		$this->load->view('anggota/header');
		$this->load->view('anggota/success',$data);
	}


}



?>