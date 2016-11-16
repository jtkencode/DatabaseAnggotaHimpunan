<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_PKM extends Anggota_Controller {
	private $path;
	public function __construct()
	{
		parent::__construct();		
		
        $this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_PKM_model');
		$this->path = "anggota/riwayat_pkm";
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['prodi']['D3-TI'] = "DIII-Teknik Informatika";
		$data['prodi']['D4-TI'] = "Sarjana Terapan Teknik Informatika";
		$data['kontak'] = $this->Kontak_model->get_id($id);
		$data['riwayat_pkm'] = $this->Riwayat_PKM_model->get_nim($id);
		$ui['navtab']['page'] = 'pkm';
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/body');
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/pkm/content',$data);
		$this->load->view('anggota/footer');
	}

	public function add()
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Riwayat PKM';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pkm/add_riwayat_pkm',$data);
		} else {
			$insert = $this->Riwayat_PKM_model->add_riwayat_pkm($id);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('site/success');
			} else echo "Insert Gagal";
		}	
	}

	public function get($no_urut = null)
	{
		$id = $this->session->userdata('user_id');
		if ($no_urut != null) {
			$data = $this->Riwayat_PKM_model->get_no_urut($id,$no_urut);
		} else {
			$data = $this->Riwayat_PKM_model->get_id($id);
		}
		
		return $data;
	}

	public function update($no_urut)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pkm']= $this->get($no_urut);
			$ui['page'] = 'Ubah Riwayat PKM';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pkm/update_riwayat_pkm',$data);
		} else {
			$update = $this->Riwayat_PKM_model->update_riwayat_pkm($id,$no_urut);
			if ($update){
				$this->session->set_flashdata('success_path', $this->path);
				  redirect('site/success');
			} else echo "Update Gagal";
		}	
	}

	public function delete($no_urut)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat']= (array) $this->get($no_urut);
			$ui['page'] = 'Hapus Riwayat PKM';
			$data['table']['header'] = ["Nama PKM","Nama Penyelenggara","Tahun PKM","PKM Kemahasiswaan"];
			$data['attribute'] = ["NAMA_PKM","NAMA_PENYELENGGARA_PKM","TAHUN_PKM","PKM_KEMAHASISWAAN"];
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_PKM_model->delete_riwayat_pkm($id,$no_urut);
			if ($delete){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('site/success');
			} else echo "Delete Gagal";
		}	
	}

}
