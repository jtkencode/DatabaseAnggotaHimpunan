<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Anggota_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$id = $this->session->userdata('user_id');		
		$this->load->helper('form');
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');

		if (!$this->Anggota_Model->is_not_complete($id) && !$this->Kontak_model->is_not_complete($id)){
			redirect('anggota/dashboard');
		}

		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$this->load->view('anggota/header');
		$this->load->view('anggota/register/body');
		$this->load->view('anggota/register/index',$data);
		$this->load->view('anggota/register/footer');
	}

	public function edit_profile()
	{
		$id = $this->session->userdata('user_id');

		if (!$this->Anggota_Model->is_not_complete($id)){
			redirect('anggota/register/tambah_kontak');
		}

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
				redirect('anggota/register/tambah_kontak');
			} else {
				$this->session->set_flashdata('error', "Update Profile Gagal!");
				redirect('anggota/register/edit_profile');
			}
		}
	}

	public function tambah_kontak()
	{
		$id = $this->session->userdata('user_id');

		if (!$this->Kontak_model->is_not_complete($id)){
			redirect('anggota/register/success');
		}
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Kontak';
			$ui['success'] = $this->session->flashdata('success');
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/register/add_contact');
			//$this->load->view('anggota/add_contact',$data);
		} else {
			$insert = $this->Kontak_model->add_contacts($id);
			if ($insert){
				redirect('anggota/register/success');
			} else echo "Update Gagal";
		}	
	}

	public function success()
	{
		$this->load->view('anggota/header');
		$this->load->view('anggota/register/success');
	}

}
