<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Prestasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		
		if(empty($this->session->userdata('user'))) {
            redirect('login');
        }
	
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');	
		$this->load->model('Tingkat_Prestasi_model');
		$this->load->model('Riwayat_Prestasi_model');
	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['kontak'] = $this->Kontak_model->get_id($nim);
		$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
		$data['riwayat_prestasi'] = $this->Riwayat_Prestasi_model->get_nim($nim);
		$ui['navtab']['page'] = 'prestasi';
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/prestasi/content',$data);
		$this->load->view('anggota/footer');
	}

	
	public function add()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
			$this->load->view('anggota/add_riwayat_prestasi',$data);
		} else {
			$insert = $this->Riwayat_Prestasi_model->add_riwayat_prestasi($data['nim']);
			if ($insert){
				redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	
	public function get_riwayat_prestasi($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Prestasi_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Prestasi_model->get_nim($nim);
		}
		
		return $data;
	}

	
	public function update($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
			$data['riwayat_prestasi']= $this->get_riwayat_prestasi($id);
			$this->load->view('anggota/update_riwayat_prestasi',$data);
		} else {
			$update = $this->Riwayat_Prestasi_model->update_riwayat_prestasi($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	
	public function delete($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_prestasi']= $this->get_riwayat_prestasi($id);
			$this->load->view('anggota/delete_riwayat_prestasi',$data);
		} else {
			$delete = $this->Riwayat_Prestasi_model->delete_riwayat_prestasi($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}

}
