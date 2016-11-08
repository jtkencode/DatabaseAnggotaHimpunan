<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Kepanitiaan extends Anggota_Controller {

	public function __construct()
	{
		parent::__construct();		
		
        $this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');		
		$this->load->model('Riwayat_Kepanitiaan_model');

	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['kontak'] = $this->Kontak_model->get_id($nim);
		$data['prodi']['D3-TI'] = "DIII-Teknik Informatika";
		$data['prodi']['D4-TI'] = "Sarjana Terapan Teknik Informatika";
		$data['riwayat_kepanitiaan'] = $this->Riwayat_Kepanitiaan_model->get_nim($nim);
		$ui['navtab']['page'] = 'kepanitiaan';

		var_dump($data['riwayat_kepanitiaan']);
		
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
			$ui['page'] = 'Tambah Riwayat Kepanitiaan';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/kepanitiaan/add_riwayat_kepanitiaan',$data);
		} else {
			$insert = $this->Riwayat_Kepanitiaan_model->add_riwayat_kepanitiaan($data['nim']);
			if ($insert){
				 redirect('site/success');
			} else echo "Insert Gagal";
		}	
	}

	public function get($id = null)
	{
		$nim = $this->session->userdata('user');
		if ($id != null) {
			$data = $this->Riwayat_Kepanitiaan_model->get_id($nim,$id);
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
			$data['riwayat_kepanitiaan']= $this->get($id);
			$ui['page'] = 'Ubah Riwayat Kepanitiaan';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/kepanitiaan/update_riwayat_kepanitiaan',$data);
		} else {
			$update = $this->Riwayat_Kepanitiaan_model->update_riwayat_kepanitiaan($nim,$id);
			if ($update){
				  redirect('site/success');
			} else echo "Update Gagal";
		}	
	}	

	public function delete($id)
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat']= (array) $this->get($id);
			$ui['page'] = 'Hapus Riwayat Kepanitiaan';
			$data['table']['header'] = ["Nama Kegiatan"	,"Nama Organisasi",	"Jabatan","Tahun Kepanitiaan","Kepanitiaan Kemahasiswaan"];
			$data['attribute'] = ["NAMA_KEGIATAN_KEPANITIAAN","NAMA_ORG_KEPANITIAAN","JABATAN_KEPANITIAAN","TAHUN_KEPANITIAAN","KEPANITIAAN_KEMAHASISWAAN"];
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_Kepanitiaan_model->delete_riwayat_kepanitiaan($nim,$id);
			if ($delete){
				 redirect('site/success');
			} else echo "Delete Gagal";
		}	
	}

}
