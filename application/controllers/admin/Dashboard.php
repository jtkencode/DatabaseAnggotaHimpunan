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
		redirect('admin/dashboard/view');
	}

	public function view()
	{		
		$total_not_complete = $this->Anggota_Model->get_total_not_complete();
		$data['count_anggota_not_complete'] = $this->Anggota_Model->get_count_not_complete();
		$data['count_anggota_complete'] = $this->Anggota_Model->get_count_complete();
		$data['count_anggota_angkatan'] =  $this->Anggota_Model->get_count_anggota_angkatan();
		$data['count_total_anggota'] = $this->Anggota_Model->get_count_anggota();
		$data['count_complete'] = $data['count_total_anggota'] - $total_not_complete;
		$data['progress'] = (double) $data['count_complete'] / $data['count_total_anggota'];

		$data['count_birthday'] = count($this->Anggota_Model->get_birthday_of_week());
		$data['count_pkm'] = 0;
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer');
	}

	public function birthday()
	{
		$data['birthday'] = $this->Anggota_Model->get_birthday_of_week();
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/birthday',$data);
		$this->load->view('admin/footer');
	}

	public function not_complete($page = 1)
	{
		//for pagination
		$count_not_complete = $this->Anggota_Model->get_total_not_complete();
		$data['page_size'] = 10;
		$start = 1 + ($page - 1)*$data['page_size'];
		$data['data_not_complete'] = $this->Anggota_Model->get_not_complete($start);
		$data['pages'] = $count_not_complete / $data['page_size'];
		$data['page_length'] = 5;
		$data['page_active'] = $page;
		$data['page_start'] = 1 + floor(($page-1) / $data['page_length'])*$data['page_length'];
		$data['page_end'] = $data['page_start'] + $data['page_length'];

		//for pagination
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/not_complete',$data);
		$this->load->view('admin/footer');
	}

	public function complete($page = 1)
	{
		//for pagination
		$count_complete = $this->Anggota_Model->get_total_complete();
		$data['page_size'] = 10;
		$start = 1 + ($page - 1)*$data['page_size'];
		$data['data_complete'] = $this->Anggota_Model->get_complete($start);
		$data['pages'] = $count_complete / $data['page_size'];
		$data['page_length'] = 5;
		$data['page_active'] = $page;
		$data['page_start'] = 1 + floor(($page-1) / $data['page_length'])*$data['page_length'];
		$data['page_end'] = $data['page_start'] + (($count_complete-($page*count($data['data_complete'])))/$data['page_size']);

		//for pagination
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/complete',$data);
		$this->load->view('admin/footer');
	}

}
