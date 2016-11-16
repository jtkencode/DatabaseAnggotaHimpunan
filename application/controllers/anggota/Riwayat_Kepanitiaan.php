<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Kepanitiaan extends Anggota_Controller {
	private $path;
	public function __construct()
	{
		parent::__construct();		
		
        $this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');		
		$this->load->model('Riwayat_Kepanitiaan_model');
		$this->path = "anggota/riwayat_kepanitiaan";
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['kontak'] = $this->Kontak_model->get_id($id);
		$data['prodi']['D3-TI'] = "DIII-Teknik Informatika";
		$data['prodi']['D4-TI'] = "Sarjana Terapan Teknik Informatika";
		$data['riwayat_kepanitiaan'] = $this->Riwayat_Kepanitiaan_model->get_id($id);
		$ui['navtab']['page'] = 'kepanitiaan';
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/body');
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/kepanitiaan/content',$data);
		$this->load->view('anggota/footer');
	}
	
	public function add()
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Riwayat Kepanitiaan';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/kepanitiaan/add_riwayat_kepanitiaan');
		} else {
			$insert = $this->Riwayat_Kepanitiaan_model->add_riwayat_kepanitiaan($id);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('site/success/');
			} else echo "Insert Gagal";
		}	
	}

	public function get($no_urut = null)
	{
		$id = $this->session->userdata('user_id');
		if ($no_urut != null) {
			$data = $this->Riwayat_Kepanitiaan_model->get_no_urut($id,$no_urut);
		} else {
			$id = $this->session->userdata('user_id');
			$data = $this->Riwayat_Kepanitiaan_model->get_id($id);
		}
		
		return $data;
	}

	
	public function update($no_urut)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_kepanitiaan']= $this->get($no_urut);
			$ui['page'] = 'Ubah Riwayat Kepanitiaan';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/kepanitiaan/update_riwayat_kepanitiaan',$data);
		} else {
			$update = $this->Riwayat_Kepanitiaan_model->update_riwayat_kepanitiaan($id,$no_urut);
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
			$ui['page'] = 'Hapus Riwayat Kepanitiaan';
			$data['table']['header'] = ["Nama Kegiatan"	,"Nama Organisasi",	"Jabatan","Tahun Kepanitiaan","Kepanitiaan Kemahasiswaan"];
			$data['attribute'] = ["nama_kegiatan_kepanitiaan","nama_org_kepanitiaan","jabatan_kepanitiaan","tahun_kepanitiaan","kepanitiaan_kemahasiswaan"];
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_Kepanitiaan_model->delete_riwayat_kepanitiaan($id,$no_urut);
			if ($delete){
				$this->session->set_flashdata('success_path', $this->path);
				redirect('site/success');
			} else echo "Delete Gagal";
		}	
	}

}
