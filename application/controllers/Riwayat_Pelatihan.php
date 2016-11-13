<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Pelatihan extends My_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
		$this->load->model('Riwayat_Pelatihan_model');
	}

	public function index()
	{
		redirect('riwayat_pelatihan/view');
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
			$data['riwayat_pelatihan'] = $this->Riwayat_Pelatihan_model->get_nim($nim);
			$ui['navtab']['page'] = 'pelatihan';
			$ui['navtab']['nim'] = $nim;
			
			$this->load->view('guest/header');
			$this->load->view('guest/profile',$data);
			$this->load->view('guest/nav_riwayat',$ui['navtab']);
			$this->load->view('guest/riwayat/riwayat_pelatihan',$data);
			$this->load->view('guest/footer');
		}
	}
}