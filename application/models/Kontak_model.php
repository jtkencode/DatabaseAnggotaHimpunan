<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model{

	public $nim;
	public $detil_kontak;
	public $jenis_kontak;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('nim', $id)->get('kontak');
		$result = $query->result();

		return $result;
	}

	public function add_contact($nim)
	{
		$data = array(
				'NIM' => $nim,
				'DETIL_KONTAK' => $this->input->post('detil_kontak'),
				'JENIS_KONTAK' => $this->input->post('jenis_kontak')
			);

		$query = $this->db->insert('kontak',$data);
		return $query;

	}
	

}

?>