<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_pendidikan extends Anggota_Controller {
	private $path;
	public function __construct()
	{
		parent::__construct();		
		
        $this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Pendidikan_model');
		$this->load->helper('form');
		$this->path = "anggota/riwayat_pendidikan";
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['kontak'] = $this->Kontak_model->get_id($id);
		$data['riwayat_pendidikan'] = $this->Riwayat_Pendidikan_model->get_id($id);
		$ui['navtab']['page'] = 'pendidikan';
		$ui['nama_anggota'] = $data['anggota']->nama_lengkap;
		$this->load->view('anggota/header');
		$this->load->view('anggota/body',$ui);
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/pendidikan/content',$data);
		$this->load->view('anggota/footer');
	}

	public function add()
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Riwayat Pendidikan';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pendidikan/add_riwayat_pendidikan');
		} else {
			$insert = $this->Riwayat_Pendidikan_model->add_riwayat_pendidikan($id);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('anggota/dashboard/success');
			} else echo "Insert Gagal";
		}	
	}

	public function get($no_urut = null)
	{
		$id = $this->session->userdata('user_id');
		if ($no_urut != null) {
			$data = $this->Riwayat_Pendidikan_model->get_no_urut($id,$no_urut);
		} else {
			$data = $this->Riwayat_Pendidikan_model->get_id($id);
		}
		
		return $data;
	}

	public function update($no_urut)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pendidikan']= $this->get($no_urut);
			$ui['page'] = 'Ubah Riwayat Pendidikan';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pendidikan/update_riwayat_pendidikan',$data);
		} else {
			$update = $this->Riwayat_Pendidikan_model->update_riwayat_pendidikan($id,$no_urut);
			if ($update){
				$this->session->set_flashdata('success_path', $this->path);
				  redirect('anggota/dashboard/success');
			} else echo "Update Gagal";
		}	
	}

	public function delete($no_urut)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat']= (array) $this->get($no_urut);
			$ui['page'] = 'Hapus Riwayat Pendidikan';
			$data['table']['header'] = ["Nama Institusi", "Tahun Masuk", "Tahun Lulus","Bidang Pendidikan"];
			$data['attribute'] = ["nama_institusi_pendidikan","tahun_masuk_pendidikan","tahun_lulus_pendidikan","bidang_pendidikan"];
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_Pendidikan_model->delete_riwayat_pendidikan($id,$no_urut);
			if ($delete){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('anggota/dashboard/success');
			} else echo "Delete Gagal";
		}	
	}


}
