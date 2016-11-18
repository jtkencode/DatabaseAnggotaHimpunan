<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class First_Time extends Anggota_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Anggota_Model');

		$id = $this->session->userdata('user_id');
		if (!$this->Anggota_Model->is_not_complete($id)){
			redirect('anggota/dashboard');
		}
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$this->load->view('anggota/header');
		$this->load->view('anggota/first_time/body');
		$this->load->view('anggota/first_time/index',$data);
		$this->load->view('anggota/first_time/footer');
	}

	public function edit_profile()
	{

	}

	public function tambah_kontak()
	{

	}

}
