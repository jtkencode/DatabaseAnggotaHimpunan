<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');

		/*set session for detect id */
		if ($this->identity->is_anggota())
			$this->session->set_userdata('guest_id', 'anggota');
		else if ($this->identity->is_admin())
			$this->session->set_userdata('guest_id', 'admin');
		else 
			$this->session->set_userdata('guest_id', 'guest');

	}		
}

class Admin_Controller extends My_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->identity->is_admin())
			redirect('site/login');
	}		
}

class Anggota_Controller extends My_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->identity->is_anggota())
			redirect('site/login');

		$id = $this->session->userdata('user_id');
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

class Guest_Controller extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->identity->is_anggota())
			$this->session->set_userdata('guest_id', 'anggota');
		else if ($this->identity->is_admin())
			$this->session->set_userdata('guest_id', 'admin');
		else 
			$this->session->set_userdata('guest_id', 'guest');
	}
}

?>