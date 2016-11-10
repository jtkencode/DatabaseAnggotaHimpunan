<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Anggota_Controller {
	
	public function __construct()
	{
		parent::__construct();				
		$this->load->model('Anggota_Model');
	
	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		
		$this->load->view('dashboard.html');
	}

	
}
