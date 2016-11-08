<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Prestasi extends Anggota_Controller {

	public function __construct()
	{
		parent::__construct();		
		
		$this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');	
		$this->load->model('Tingkat_Prestasi_model');
		$this->load->model('Riwayat_Prestasi_model');
	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['prodi']['D3-TI'] = "DIII-Teknik Informatika";
		$data['prodi']['D4-TI'] = "Sarjana Terapan Teknik Informatika";
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
			$ui['page'] = 'Tambah Riwayat Prestasi';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/prestasi/add_riwayat_prestasi',$data);
		} else {
			$insert = $this->Riwayat_Prestasi_model->add_riwayat_prestasi($data['nim']);
			if ($insert){
				redirect('site/success');
			} else echo "Insert Gagal";
		}	
	}

	
	public function get($id = null)
	{
		$nim = $this->session->userdata('user');
		if ($id != null) {
			$data = $this->Riwayat_Prestasi_model->get_id($nim,$id);
		} else {	
			$data = $this->Riwayat_Prestasi_model->get_nim($nim);
		}
		
		return $data;
	}

	
	public function update($id)
	{ 
		$nim = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
			$data['riwayat_prestasi']= $this->get($id);
			$ui['page'] = 'Ubah Riwayat Prestasi';
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/prestasi/update_riwayat_prestasi',$data);
		} else {
			$update = $this->Riwayat_Prestasi_model->update_riwayat_prestasi($nim,$id);
			if ($update){
				  redirect('site/success');
			} else echo "Update Gagal";
		}	
	}

	
	public function delete($id)
	{ 
		$nim = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat']= (array) $this->get($id);
			$ui['page'] = 'Hapus Riwayat Prestasi';
			$data['table']['header'] = ["Tingkat Prestasi","Nama Prestasi","Pencapaian Prestasi","Lembaga Prestasi","Tahun Prestasi","Jenis Prestasi"];
			$data['attribute'] = ["ID_TINGKAT_PRESTASI","NAMA_PRESTASI","PENCAPAIAN_PRESTASI","LEMBAGA_PRESTASI","TAHUN_PRESTASI","JENIS_PRESTASI"];
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_Prestasi_model->delete_riwayat_prestasi($nim,$id);
			if ($delete){
				 redirect('site/success');
			} else echo "Delete Gagal";
		}	
	}

}
