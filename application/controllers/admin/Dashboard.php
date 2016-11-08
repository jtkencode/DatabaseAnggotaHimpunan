<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('Anggota_Model');
	}

	public function index()
	{
		$data['data_not_complete'] = $this->Anggota_Model->get_all_not_complete();
		$data['count_total_anggota'] = $this->Anggota_Model->get_count_anggota();
		$data['count_complete'] = $data['count_total_anggota'] - count($data['data_not_complete']);
		$data['progress'] = (double) $data['count_complete'] / $data['count_total_anggota'];

		$this->load->view('Admin/index',$data);
	}

}
