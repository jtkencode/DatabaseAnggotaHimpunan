<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Pendidikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		
		if(empty($this->session->userdata('user'))) {
            redirect('login');
        }
        $this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Pendidikan_model');
		$this->load->helper('form');

	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['kontak'] = $this->Kontak_model->get_id($nim);
		$data['riwayat_pendidikan'] = $this->Riwayat_Pendidikan_model->get_nim($nim);
		$ui['navtab']['page'] = 'pendidikan';
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/pendidikan/content',$data);
		$this->load->view('anggota/footer');
	}

	public function add()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Riwayat Pendidikan';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pendidikan/add_riwayat_pendidikan',$data);
		} else {
			$insert = $this->Riwayat_Pendidikan_model->add_riwayat_pendidikan($data['nim']);
			if ($insert){
				 redirect('anggota/success');
			} else echo "Insert Gagal";
		}	
	}

	public function get($id = null)
	{
		if ($id != null) {
			$data = $this->Riwayat_Pendidikan_model->get_id($id);
		} else {
			$nim = $this->session->userdata('user');
			$data = $this->Riwayat_Pendidikan_model->get_nim($nim);
		}
		
		return $data;
	}

	public function update($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pendidikan']= $this->get($id);
			$ui['page'] = 'Ubah Riwayat Pendidikan';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pendidikan/update_riwayat_pendidikan',$data);
		} else {
			//$id = $this->input->post('no_urut_pendidikan');
			$update = $this->Riwayat_Pendidikan_model->update_riwayat_pendidikan($id);
			if ($update){
				  redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	public function delete($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pendidikan']= $this->get($id);
			$ui['page'] = 'Hapus Riwayat Pendidikan';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pendidikan/delete_riwayat_pendidikan',$data);
		} else {
			$delete = $this->Riwayat_Pendidikan_model->delete_riwayat_pendidikan($id);
			if ($delete){
				 redirect('anggota/success');
			} else echo "Delete Gagal";
		}	
	}


}
