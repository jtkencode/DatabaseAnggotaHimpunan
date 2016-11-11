<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Pendidikan extends Anggota_Controller {
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
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['prodi']['D3-TI'] = "DIII-Teknik Informatika";
		$data['prodi']['D4-TI'] = "Sarjana Terapan Teknik Informatika";
		$data['kontak'] = $this->Kontak_model->get_id($nim);
		$data['riwayat_pendidikan'] = $this->Riwayat_Pendidikan_model->get_nim($nim);
		$ui['navtab']['page'] = 'pendidikan';
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/body');
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
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pendidikan/add_riwayat_pendidikan',$data);
		} else {
			$insert = $this->Riwayat_Pendidikan_model->add_riwayat_pendidikan($data['nim']);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('site/success');
			} else echo "Insert Gagal";
		}	
	}

	public function get($id = null)
	{
		$nim = $this->session->userdata('user');
		if ($id != null) {
			$data = $this->Riwayat_Pendidikan_model->get_id($nim,$id);
		} else {
			$data = $this->Riwayat_Pendidikan_model->get_nim($nim);
		}
		
		return $data;
	}

	public function update($id)
	{ 
		$nim = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pendidikan']= $this->get($id);
			$ui['page'] = 'Ubah Riwayat Pendidikan';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pendidikan/update_riwayat_pendidikan',$data);
		} else {
			$update = $this->Riwayat_Pendidikan_model->update_riwayat_pendidikan($nim,$id);
			if ($update){
				$this->session->set_flashdata('success_path', $this->path);
				  redirect('site/success');
			} else echo "Update Gagal";
		}	
	}

	public function delete($id)
	{ 
		$nim = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat']= (array) $this->get($id);
			$ui['page'] = 'Hapus Riwayat Pendidikan';
			$data['table']['header'] = ["Jenjang Pendidikan", "Nama Institusi", "Tahun Masuk", "Tahun Lulus","Bidang Pendidikan"];
			$data['attribute'] = ["JENJANG_PENDIDIKAN","NAMA_INSTITUSI_PENDIDIKAN","TAHUN_MASUK_PENDIDIKAN","TAHUN_LULUS_PENDIDIKAN","BIDANG_PENDIDIKAN"];
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_Pendidikan_model->delete_riwayat_pendidikan($nim,$id);
			if ($delete){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('site/success');
			} else echo "Delete Gagal";
		}	
	}


}
