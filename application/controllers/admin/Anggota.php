<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('Anggota_Model');
		$this->load->model('Program_Studi_model');
		$this->load->model('Kelas_model');
	}

	public function index()
	{
		redirect('admin/anggota/view');
	}


	/* 
		**Method ini niatnya ingin menampilkan semua anggota berdsaarkan angkatan
		**Butuh paging, silahkan coba eksplorasi penggunaan paging pake CI 
		commented : 17 Desember 2016, IF
	*/
	public function view($page = 1, $angkatan = null)
	{		
		$data['page_size'] = 10;
		$start = 1 + ($page - 1)*$data['page_size'];
		$data['data_anggota'] = $this->Anggota_Model->get_anggota_angkatan_paging($start, $angkatan);
		$data['pages'] = count($data['data_anggota']) / $data['page_size'];
		$data['page_length'] = 5;
		$data['page_active'] = $page;
		$data['page_start'] = 1 + floor(($page-1) / $data['page_length'])*$data['page_length'];
		$data['page_end'] = $data['page_start'] + $data['page_length'];

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/anggota/view',$data);
		$this->load->view('admin/footer');
	}


	/*
		**Menambahkan anggota ke tabel terdaftar di kelas
		**Issue : Masalah interface, butuh ajax, interaksi pemilihan anggota.. silahkan dicoba :)
		17 Desember 2016, IF
	*/
	public function add_anggota_kelas()
	{
		$data['program_studi'] = $this->Program_Studi_model->get_all();
		$data['angkatan_himpunan'] = $this->Anggota_Model->get_angkatan_himpunan();
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/add_anggota_kelas',$data);
		$this->load->view('admin/footer');
	}


	/*
		**Method ini untuk mengambil data anggota berdasarkan angkatan yang dipanggil dengan ajax, untuk kasus meanambah anggota
		17 Desember 2016, IF
	*/
	public function get_anggota_angkatan_ajax()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$angkatan = $this->input->post('angkatan');
			$result = $this->Anggota_Model->get_anggota_angkatan($angkatan);
			echo json_encode($result);
		}
	}

	/**
	 * Mengambalikan password anggota ke DEFAULT
	*/
	public function reset_password()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$data['angkatan_himpunan'] = $this->Anggota_Model->get_angkatan_himpunan();
			$data['error'] = $this->session->flashdata('reset_error');
			$data['success'] = $this->session->flashdata('reset_success');

			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/reset_password',$data);
			$this->load->view('admin/footer');
		} else {
			$id_anggota = $this->input->post('anggota');
			$reset = $this->Anggota_Model->reset_password($id_anggota);

			if ($reset){
				$this->session->set_flashdata('reset_success', "Reset pasword berhasil, password dikembalikan menjadi default");
				redirect('admin/anggota/reset_password');
			} else {
				$this->session->set_flashdata('reset_error', "Reset Passoword Gagal");
				redirect('admin/anggota/reset_password');
			}
		}
		
	}
}
