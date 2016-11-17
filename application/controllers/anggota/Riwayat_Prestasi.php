<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Prestasi extends Anggota_Controller {
	private $path;
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');	
		$this->load->model('Tingkat_Prestasi_model');
		$this->load->model('Riwayat_Prestasi_model');
		$this->path = "anggota/riwayat_prestasi";
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['kontak'] = $this->Kontak_model->get_id($id);
		$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
		$data['riwayat_prestasi'] = $this->Riwayat_Prestasi_model->get_id($id);
		$ui['navtab']['page'] = 'prestasi';
		$ui['nama_anggota'] = $data['anggota']->nama_lengkap;
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/body',$ui);
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/prestasi/content',$data);
		$this->load->view('anggota/footer');
	}

	
	public function add()
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
			$ui['page'] = 'Tambah Riwayat Prestasi';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/prestasi/add_riwayat_prestasi');
		} else {
			$insert = $this->Riwayat_Prestasi_model->add_riwayat_prestasi($id);
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
			$data = $this->Riwayat_Prestasi_model->get_no_urut($id,$no_urut);
		} else {	
			$data = $this->Riwayat_Prestasi_model->get_id($id);
		}
		
		return $data;
	}

	
	public function update($no_urut)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
			$data['riwayat_prestasi']= $this->get($no_urut);
			$ui['page'] = 'Ubah Riwayat Prestasi';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/prestasi/update_riwayat_prestasi',$data);
		} else {
			$update = $this->Riwayat_Prestasi_model->update_riwayat_prestasi($id,$no_urut);
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
			$ui['page'] = 'Hapus Riwayat Prestasi';
			$data['table']['header'] = ["Tingkat Prestasi","Nama Prestasi","Pencapaian Prestasi","Lembaga Prestasi","Tahun Prestasi","Jenis Prestasi"];
			$data['attribute'] = ["id_tingkat_prestasi","nama_prestasi","pencapaian_prestasi","lembaga_prestasi","tahun_prestasi","jenis_prestasi"];
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_Prestasi_model->delete_riwayat_prestasi($id,$no_urut);
			if ($delete){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('site/success');
			} else echo "Delete Gagal";
		}	
	}

}
