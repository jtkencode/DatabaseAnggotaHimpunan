<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Pelatihan extends Anggota_Controller {
	private $path;
	public function __construct()
	{
		parent::__construct();		
		
        $this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Pelatihan_model');
		$this->path = "anggota/riwayat_pelatihan";

	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['kontak'] = $this->Kontak_model->get_id($id);
		$data['riwayat_pelatihan'] = $this->Riwayat_Pelatihan_model->get_id($id);
		$ui['navtab']['page'] = 'pelatihan';
		$ui['nama_anggota'] = $data['anggota']->nama_lengkap;
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/body',$ui);
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/pelatihan/content',$data);
		$this->load->view('anggota/footer');
	}
	
	public function add()
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Riwayat Pelatihan';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pelatihan/add_riwayat_pelatihan');
		} else {
			$insert = $this->Riwayat_Pelatihan_model->add_riwayat_pelatihan($id);
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
			$data = $this->Riwayat_Pelatihan_model->get_no_urut($id,$no_urut);
		} else {
			$data = $this->Riwayat_Pelatihan_model->get_id($id);
		}
		
		return $data;
	}

	public function update($no_urut)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_pelatihan']= $this->get($no_urut);
			$ui['page'] = 'Ubah Riwayat Pelatihan';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/pelatihan/update_riwayat_pelatihan',$data);
		} else {
			$update = $this->Riwayat_Pelatihan_model->update_riwayat_pelatihan($id,$no_urut);
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
			$ui['page'] = 'Hapus Riwayat Pelatihan';
			$data['table']['header'] = ["Nama Pelatihan","Nama Penyelenggara","Tahun Pelatihan"];
			$data['attribute'] = ["nama_pelatihan","nama_penyelenggara_pelatihan","tahun_pelatihan"];
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_Pelatihan_model->delete_riwayat_pelatihan($id,$no_urut);
			if ($delete){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('anggota/dashboard/success');
			} else echo "Delete Gagal";
		}	
	}

}
