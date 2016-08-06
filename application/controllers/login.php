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
		if ( !empty($this->session->flashdata('error')) ) {
			$data['error'] = $this->session->flashdata('error');
			$this->load->view('login',$data);
		} else {
			$this->load->view('login');
		}
		
	}

	public function authentication(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username == "admin" && $password == "birukandunia"){
			$sess_data['user'] = $username;
			$this->session->set_userdata($sess_data);
			redirect('admin');
		} else if ($this->Login_Model->validate($username,$password)){
			$sess_data['user'] = $username;
			$this->session->set_userdata($sess_data);
			redirect('anggota');
		} else {
			$this->session->set_flashdata('error', 'username / password salah');
			redirect('login');
		}
	}
}



?>
