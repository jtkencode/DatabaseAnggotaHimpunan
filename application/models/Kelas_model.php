<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_angkatan()
	{	
		$this->db->select('angkatan_kelas');
		$this->db->distinct();
		$query = $this->db->get('kelas');
		return $query->result();
	}

}

?>