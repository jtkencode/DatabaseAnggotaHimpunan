<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');

	}		
}

class Admin_Controller extends My_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->identity->is_admin())
			redirect('site/login');

		if ($this->Anggota_Model->is_not_complete($id) || $this->Kontak_model->is_not_complete($id)){
			redirect('anggota/register');
		}
	}		
}

class Anggota_Controller extends My_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->identity->is_anggota())
			redirect('site/login');

		if ($this->Anggota_Model->is_not_complete($id) || $this->Kontak_model->is_not_complete($id)){
			redirect('anggota/register');
		}
	}
}

class Register_Controller extends My_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Anggota_Model');
		if (!$this->identity->is_anggota())
			redirect('site/login');
	}
}

?>