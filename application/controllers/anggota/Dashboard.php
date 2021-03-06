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
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['birthday'] = $this->Anggota_Model->get_birthday_of_week();
 		$data['waktu'] = $this->get_time_condition();
 		$ui['nama_anggota'] = $data['anggota']->nama_lengkap;
 		$this->load->view('anggota/header');
 		$this->load->view('anggota/body',$ui);
		$this->load->view('anggota/dashboard',$data);
		$this->load->view('anggota/footer');

	}

	public function success()
	{
		$id = $this->session->userdata('user_id');
		$data['anggota'] = $this->Anggota_Model->get_id($id);
		$data['nama_anggota'] = $data['anggota']->nama_lengkap;
		$data['path'] = $this->session->flashdata('success_path');
		$this->load->view('anggota/header');
		$this->load->view('anggota/success',$data);
		$this->load->view('anggota/footer');
	}

	private function get_time_condition(){
		date_default_timezone_set("Asia/Jakarta");
		$time = localtime(time(), true);
		$time = $time['tm_hour'];
		if ($time >= 0 && $time < 12){
			return "Pagi";
		} else if ($time >= 12 && $time < 15){
			return "Siang";
		}else if ($time >= 15 && $time < 18){
			return "Sore";
		} return "Malam";
	}

	
}
