<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Anggota_Model');

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
	}
}
?>