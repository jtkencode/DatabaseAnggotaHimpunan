<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Organisasi extends My_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Org_model');
	}

	public function index()
	{
		redirect('riwayat_organisasi/view');
	}

	public function view($nim = null)
	{
		if ($nim == null){
			$this->load->view('errors');
		}
		else {
			$data['anggota'] = $this->Anggota_Model->get_id($nim);
			$data['prodi']['D3-TI'] = "DIII-Teknik Informatika";
			$data['prodi']['D4-TI'] = "Sarjana Terapan Teknik Informatika";
			$data['kontak'] = $this->Kontak_model->get_id($nim);
			$data['riwayat_org'] = $this->Riwayat_Org_model->get_nim($nim);
			$ui['navtab']['page'] = 'organisasi';
			$ui['navtab']['nim'] = $nim;
			
			$this->load->view('guest/header');
			$this->load->view('guest/profile',$data);
			$this->load->view('guest/nav_riwayat',$ui['navtab']);
			$this->load->view('guest/riwayat/riwayat_org',$data);
			$this->load->view('guest/footer');
		}
		
	}
	
}
