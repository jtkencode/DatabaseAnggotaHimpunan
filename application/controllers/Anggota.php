<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{

		parent::__construct();		
		
		if(empty($this->session->userdata('user'))) {
            redirect('login');
        }

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Anggota_Model');
	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$this->load->view('anggota/index',$data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		session_destroy();
		redirect('anggota');
	}

	public function edit_profile()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/edit_profile',$data);

		} else {
			echo $this->input->post('nama_lengkap');
			echo $this->input->post('nama_panggilan');
			echo $this->input->post('tempat_lahir');
			echo $this->input->post('alamat_asal');
			echo $this->input->post('alamat_sekarang');
			$update = $this->Anggota_Model->update_profile();
		}
		
	}


}
