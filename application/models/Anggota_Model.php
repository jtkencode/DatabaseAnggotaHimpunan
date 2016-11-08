<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_Model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_id($id)
	{
		$query = $this->db->where('nim', $id)->get('anggota');
		$result = $query->result();

		if (count($result))
			return $result[0];

		return FALSE;
	}

	public function get_all()
	{
		$query = $this->db->get('anggota');
		return $query->result();
	}

	public function get_all_not_complete()
	{
		$this->db->where('tempat_lahir', '-');
		$this->db->where('alamat_sekarang','-');
		$this->db->where('angkatan_himpunan >','28');
		$query = $this->db->get('anggota');
		return  $query->result();

	}

	public function get_count_anggota()
	{
		$this->db->where('angkatan_himpunan >','28');
		$this->db->from('anggota'); 
		return $this->db->count_all_results();
	}

	public function update_profile($nim)
	{
		$data = array(
				'NAMA_LENGKAP' => $this->input->post('nama_lengkap'),
				'NAMA_PANGGILAN' => $this->input->post('nama_panggilan'),
				'TEMPAT_LAHIR' => $this->input->post('tempat_lahir'),
				'ALAMAT_ASAL' => $this->input->post('alamat_asal'),
				'ALAMAT_SEKARANG' => $this->input->post('alamat_sekarang')
		);

		/*Update to DB*/
		$this->db->where('NIM', $nim);
		$query = $this->db->update('anggota',$data);
		return $query;
	}	

}

?>