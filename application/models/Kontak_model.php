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
		$query = $this->db->where('id_anggota', $id)->get('kontak');
		$result = $query->result();

		return $result;
	}

	public function get_detil($id,$detil)
	{
		$this->db->where('detil_kontak', $detil);
		$query = $this->db->where('id_anggota', $id)->get('kontak');
		$result = $query->result();

		return $result[0];
	}

	public function add_contact($id)
	{
		$data = array(
				'id_anggota' => $id,
				'detil_kontak' => $this->input->post('detil_kontak'),
				'jenis_kontak' => $this->input->post('jenis_kontak')
			);

		$query = $this->db->insert('kontak',$data);
		return $query;

	}

	public function update_contact($id,$detil)
	{	
		$data = array(
				'detil_kontak' => $this->input->post('detil_kontak')
			);
		$this->db->where('id_anggota',$id);
		$this->db->where('detil_kontak',$detil);
		
		$query = $this->db->update('kontak',$data);
		return $query;
	}

	public function delete_contact($id,$detil)
	{	
		$this->db->where('id_anggota',$id);
		$this->db->where('detil_kontak',$detil);
		
		$query = $this->db->delete('kontak');
		return $query;
	}
	

}

?>