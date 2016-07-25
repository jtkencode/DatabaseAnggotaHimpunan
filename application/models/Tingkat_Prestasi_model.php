<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat_Prestasi_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		$query = $this->db->get('tingkat_prestasi');
		return $query->result();
	}

	
}

?>