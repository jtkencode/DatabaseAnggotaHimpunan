<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Anggota_Controller {
	private $path;
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Pendidikan_model');
		$this->load->model('Riwayat_Org_model');
		$this->load->model('Tingkat_Prestasi_model');
		$this->load->model('Riwayat_Prestasi_model');
		$this->load->model('Riwayat_Kepanitiaan_model');
		$this->load->model('Riwayat_Pelatihan_model');
		$this->load->model('Riwayat_PKM_model');
		$this->path = "anggota/profile";
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);

		$data['kontak'] = $this->Kontak_model->get_id($id);
		$ui['navtab']['page'] = 'overview';
		$ui['nama_anggota'] = $data['anggota']->nama_lengkap;
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/body',$ui);
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/overview');
		$this->load->view('anggota/footer');
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
				$this->session->set_flashdata('success_path', $this->path);
				redirect('site/success');
			} else echo "Update Gagal";
		}
	}

	public function change_password()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['error'] = $this->session->flashdata('error');
			$ui['page'] = 'Ganti Password';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/change_password',$data);
		} else {
			$update = $this->Anggota_Model->update_password($id);

			if ($update){
				$this->session->set_flashdata('success_path', $this->path);
				redirect('site/success');
			} else {
				$wrong_password = $this->session->flashdata('wrong_password');
				if ($wrong_password != null){
					$this->session->set_flashdata('error', $wrong_password);
					redirect('anggota/profile/change_password');
				}
				else {
					$not_match = $this->session->flashdata('not_match');
					if ($not_match != null){
						$this->session->set_flashdata('error', $not_match);
						redirect('anggota/profile/change_password');
					} else echo "update gagal";
				}
			}
		}	
	}

	public function add_contact()
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Kontak';
			$ui['error'] = $this->session->flashdata('error');
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/kontak/add_contact');
			//$this->load->view('anggota/add_contact',$data);
		} else {
			$insert = $this->Kontak_model->add_contact($id);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				redirect('site/success');
			} else echo "Update Gagal";
		}	
	}


	public function update_contact($detil)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Edit Kontak';
			$ui['error'] = $this->session->flashdata('error');
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/kontak/update_contact',$data);
		} else {
			$insert = $this->Kontak_model->update_contact($id,$detil);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				redirect('site/success');
			} else echo "Update Gagal";
		}	
	}
}
