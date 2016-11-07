<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Organisasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		
		if(empty($this->session->userdata('user'))) {
            redirect('login');
        }
		$this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Org_model');
	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['kontak'] = $this->Kontak_model->get_id($nim);
		$data['riwayat_org'] = $this->Riwayat_Org_model->get_nim($nim);
		$ui['navtab']['page'] = 'organisasi';
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/organisasi/content',$data);
		$this->load->view('anggota/footer');
	}

	public function add()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Riwayat Organisasi';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/organisasi/add_riwayat_org',$data);
		} else {
			$insert = $this->Riwayat_Org_model->add_riwayat_org($data['nim']);
			if ($insert){
				  redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}


	public function get($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Org_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Org_model->get_nim($nim);
		}
		
		return $data;
	}


	public function update($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_org']= $this->get($id);
			$ui['page'] = 'Ubah Riwayat Organisasi';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/organisasi/update_riwayat_org',$data);
		} else {
			$update = $this->Riwayat_Org_model->update_riwayat_org($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	
	public function delete($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Hapus Riwayat Organisasi';
			$this->load->view('anggota/crud_header',$ui);
			$data['riwayat_org']= $this->get($id);
			$this->load->view('anggota/riwayat/organisasi/delete_riwayat_org',$data);
		} else {
			$delete = $this->Riwayat_Org_model->delete_riwayat_org($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}

	
}
