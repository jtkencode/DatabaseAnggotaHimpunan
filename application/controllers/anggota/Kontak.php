<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends Anggota_Controller {
	private $path;
	public function __construct()
	{
		parent::__construct();				
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_Model');
		$this->load->helper('form');
		$this->path = "anggota/kontak";
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['kontak'] = $this->Kontak_Model->get_id($id);
 
 		$ui['nama_anggota'] = $data['anggota']->nama_lengkap;
 		$this->load->view('anggota/header');
 		$this->load->view('anggota/body',$ui);
		$this->load->view('anggota/kontak/kontak',$data);
		$this->load->view('anggota/footer');

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
			$insert = $this->Kontak_Model->add_contact($id);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				redirect('anggota/dashboard/success');
			} else echo "Update Gagal";
		}	
	}
	
	public function update_contact($id_kontak)
	{ 
		$id = $this->session->userdata('user_id');
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['kontak'] = $this->Kontak_Model->get_id_kontak($id,$id_kontak);
			$ui['page'] = 'Edit Kontak';
			$ui['error'] = $this->session->flashdata('error');
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/kontak/update_contact',$data);
		} else {
			$insert = $this->Kontak_Model->update_contact($id,$id_kontak);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				redirect('anggota/dashboard/success');
			} else echo "Update Gagal";
		}	
	}

	public function delete_contact($id_kontak)
	{ 
		$id = $this->session->userdata('user_id');
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['kontak'] = $this->Kontak_Model->get_id_kontak($id,$id_kontak);
			$ui['page'] = 'Delete Kontak';
			$ui['error'] = $this->session->flashdata('error');
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/kontak/delete_contact',$data);
		} else {
			$delete = $this->Kontak_Model->delete_contact($id,$id_kontak);
			if ($delete){
				$this->session->set_flashdata('success_path', $this->path);
				redirect('anggota/dashboard/success');
			} else echo "Update Gagal";
		}	
	}
}
