<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('Anggota_Model');
	}

	public function index()
	{
		redirect('admin/anggota/view');
	}

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

		$this->load->view('Admin/header');
		$this->load->view('Admin/body');
		$this->load->view('Admin/anggota/view',$data);
		$this->load->view('Admin/footer');
	}
}
