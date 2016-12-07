<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Organisasi extends Anggota_Controller {

	private $path;
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Org_model');
		$this->path = "anggota/riwayat_organisasi";
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['kontak'] = $this->Kontak_model->get_id($id);
		$data['riwayat_org'] = $this->Riwayat_Org_model->get_id($id);
		$ui['navtab']['page'] = 'organisasi';
		$ui['nama_anggota'] = $data['anggota']->nama_lengkap;
		
		$this->load->view('anggota/header');
		$this->load->view('anggota/body',$ui);
		$this->load->view('anggota/profile',$data);
		$this->load->view('anggota/nav_riwayat',$ui['navtab']);
		$this->load->view('anggota/riwayat/organisasi/content',$data);
		$this->load->view('anggota/footer');
	}

	public function add()
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$ui['page'] = 'Tambah Riwayat Organisasi';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/organisasi/add_riwayat_org');
		} else {
			$insert = $this->Riwayat_Org_model->add_riwayat_org($id);
			if ($insert){
				$this->session->set_flashdata('success_path', $this->path);
				  redirect('anggota/dashboard/success');
			} else echo "Insert Gagal";
		}	
	}


	public function get($no_urut = null)
	{
		$id= $this->session->userdata('user_id');
		if ($no_urut != null) {
			$data = $this->Riwayat_Org_model->get_no_urut($id,$no_urut);
		} else {
			$data = $this->Riwayat_Org_model->get_id($id);
		}
		
		return $data;
	}


	public function update($no_urut)
	{ 
		$id = $this->session->userdata('user_id');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$data['riwayat_org']= $this->get($no_urut);
			$ui['page'] = 'Ubah Riwayat Organisasi';
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/riwayat/organisasi/update_riwayat_org',$data);
		} else {
			$update = $this->Riwayat_Org_model->update_riwayat_org($id,$no_urut);
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
			$ui['page'] = 'Hapus Riwayat Organisasi';
			$data['table']['header'] = ["Nama Organisasi","Jabatan","Tahun Mulai","Tahun Selesai"];
			$data['attribute'] = ["nama_org","jabatan_org","tahun_mulai_org","tahun_selesai_org"];
			$data['riwayat']= (array) $this->get($no_urut);
			$this->load->view('anggota/header');
			$this->load->view('anggota/crud_header',$ui);
			$this->load->view('anggota/hapus_riwayat',$data);
		} else {
			$delete = $this->Riwayat_Org_model->delete_riwayat_org($id,$no_urut);
			if ($delete){
				$this->session->set_flashdata('success_path', $this->path);
				 redirect('anggota/dashboard/success');
			} else echo "Delete Gagal";
		}	
	}

	
}
