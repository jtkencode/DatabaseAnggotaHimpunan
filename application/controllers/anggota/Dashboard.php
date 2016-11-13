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
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$data['birthday'] = $this->Anggota_Model->get_birthday_of_week();
 		$data['waktu'] = $this->get_time_condition();
		$this->load->view('dashboard.html',$data);
	}

	private function get_time_condition(){
		date_default_timezone_set("Asia/Jakarta");
		$time = localtime(time(), true);
		$time = $time['tm_hour'];
		if ($time >= 0 && $time < 12){
			return "Pagi";
		} else if ($time >= 12 && $time < 18){
			return "Siang";
		} return "Malam";
	}

	
}