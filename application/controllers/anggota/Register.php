<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Anggota_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Anggota_Model');

		$id = $this->session->userdata('user_id');

		if (!$this->Anggota_Model->is_not_complete($id)){
			redirect('anggota/dashboard');
		}

		$this->load->model('Kontak_Model');
		$this->load->helper('form');
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
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Edit Profile';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/edit_profile',$data);

		} else {
			$update = $this->Anggota_Model->update_profile($id);

			if ($update){
				$this->session->set_flashdata('success', "Update profile berhasil, data profile anda sudah tersimpan. Silahkan lanjutkan tambahkan kontak anda.");
				redirect('anggota/first_time/tambah_kontak');
			} else {
				$this->session->set_flashdata('error', "Update Profile Gagal!");
				redirect('anggota/first_time/edit_profile');
			}
		}
	}

	public function tambah_kontak()
	{
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Kontak';
			$ui['success'] = $this->session->flashdata('success');
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/first_time/add_contact');
			//$this->load->view('anggota/add_contact',$data);
		} else {
			$insert = $this->Kontak_Model->add_contacts($id);
			if ($insert){
				redirect('anggota/first_time/success');
			} else echo "Update Gagal";
		}	
	}

	public function success()
	{
		$this->load->view('anggota/header');
		$this->load->view('anggota/first_time/success');
	}

}
