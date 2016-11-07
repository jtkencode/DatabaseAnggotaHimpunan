<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Kepanitiaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		
		if(empty($this->session->userdata('user'))) {
            redirect('login');
        }

		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');		
		$this->load->model('Riwayat_Kepanitiaan_model');

	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['kontak'] = $this->Kontak_model->get_id($nim);
		$data['riwayat_kepanitiaan'] = $this->Riwayat_Kepanitiaan_model->get_nim($nim);
		$ui['navtab']['page'] = 'kepanitiaan';
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/kepanitiaan/content',$data);
		$this->load->view('anggota/footer');
	}
	
	public function add()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/riwayat/kepanitiaan/add_riwayat_kepanitiaan',$data);
		} else {
			$insert = $this->Riwayat_Kepanitiaan_model->add_riwayat_kepanitiaan($data['nim']);
			if ($insert){
				 redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	public function get_riwayat_kepanitiaan($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Kepanitiaan_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Kepanitiaan_model->get_nim($nim);
		}
		
		return $data;
	}

	
	public function update($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_kepanitiaan']= $this->get_riwayat_kepanitiaan($id);
			$this->load->view('anggota/riwayat/kepanitiaan/update_riwayat_kepanitiaan',$data);
		} else {
			$update = $this->Riwayat_Kepanitiaan_model->update_riwayat_kepanitiaan($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}	

	public function delete($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_kepanitiaan']= $this->get_riwayat_kepanitiaan($id);
			$this->load->view('anggota/riwayat/kepanitiaan/delete_riwayat_kepanitiaan',$data);
		} else {
			$delete = $this->Riwayat_Kepanitiaan_model->delete_riwayat_kepanitiaan($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}

}
