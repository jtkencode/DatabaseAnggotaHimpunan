<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Prestasi extends My_Controller {
	
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
		redirect('riwayat_prestasi/view');
	}

	public function view($nim = null)
	{
		if ($nim == null){
			$this->load->view('errors');
		}
		else {
			$guest_id = $this->session->userdata('guest_id');
			$data['anggota'] = $this->Anggota_Model->get_nim($nim);
			$id = $data['anggota']->id_anggota;
			$data['kontak'] = $this->Kontak_model->get_id($id);
			$data['tingkat_prestasi'] = $this->Tingkat_Prestasi_model->get_all();
			$data['riwayat_prestasi'] = $this->Riwayat_Prestasi_model->get_id($id);
			$ui['navtab']['page'] = 'prestasi';
			$ui['navtab']['nim'] = $nim;

			$this->load->view('guest/header');
			if ($guest_id == "anggota"){
				$id = $this->session->userdata('user_id');
				$data['anggota_logged_in'] = $this->Anggota_Model->get_id($id);
				$ui['nama_anggota'] = $data['anggota_logged_in']->nama_lengkap;
				$this->load->view('guest/body_anggota',$ui);
			} else if ($guest_id == "guest"){
				$this->load->view('guest/body_guest',$ui);
			} else if ($guest_id == "admin"){
				$this->load->view('guest/body_admin');
			}
			$this->load->view('guest/profile',$data);
			$this->load->view('guest/nav_riwayat',$ui['navtab']);
			$this->load->view('guest/riwayat/riwayat_prestasi',$data);
			$this->load->view('guest/footer');
		}
		
	}
}
