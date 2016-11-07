<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Org extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		
		if(empty($this->session->userdata('user'))) {
            redirect('login');
        }
		
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
		$this->load->view('anggota/riwayat/organisasi/riwayat_organisasi',$data);
	}

	public function add()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_riwayat_org',$data);
		} else {
			$insert = $this->Riwayat_Org_model->add_riwayat_org($data['nim']);
			if ($insert){
				  redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}


	public function get_riwayat_org($id = null)
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
			$data['riwayat_org']= $this->get_riwayat_org($id);
			$this->load->view('anggota/update_riwayat_org',$data);
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
			$data['riwayat_org']= $this->get_riwayat_org($id);
			$this->load->view('anggota/delete_riwayat_org',$data);
		} else {
			$delete = $this->Riwayat_Org_model->delete_riwayat_org($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}

	
}
