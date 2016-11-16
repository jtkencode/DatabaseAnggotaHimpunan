<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Pendidikan_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_nim($nim)
	{
		$query = $this->db->where('nim', $nim)->get('riwayat_pendidikan');
		$result = $query->result();

		return $result;
	}

	public function get_id($nim,$id)
	{	
		$this->db->where('nim',$nim);
		$this->db->where('no_urut_pendidikan', $id);
		$query = $this->db->get('riwayat_pendidikan');
		$result = $query->result();

		return $result[0];
	}

	public function get_last_no($id)
	{
		 
		$this->db->where('nim', $id);
		$this->db->order_by('no_urut_pendidikan', 'desc');
		$query = $this->db->limit(1)->get('riwayat_pendidikan');;
		$result = $query->result();
		
		if (!$result){
			return 0;
		}

		return $result[0]->no_urut_pendidikan;
	}

	public function add_riwayat_pendidikan($nim)
	{	

		$no_urut = $this->get_last_no($nim) + 1; //append no
		$data = array(
				'nim' => $nim,
				'no_urut_pendidikan' => $no_urut,
				'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
				'nama_institusi_pendidikan' => $this->input->post('nama_institusi'),
				'tahun_masuk_pendidikan' => $this->input->post('tahun_masuk'),
				'tahun_lulus_pendidikan' => $this->input->post('tahun_lulus'),
				'bidang_pendidikan' => $this->input->post('bidang')
			);

		$query = $this->db->insert('riwayat_pendidikan',$data);
		return $query;
	}

	public function update_riwayat_pendidikan($nim,$id)
	{
		$data = array(
				'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
				'nama_institusi_pendidikan' => $this->input->post('nama_institusi'),
				'tahun_masuk_pendidikan' => $this->input->post('tahun_masuk'),
				'tahun_lulus_pendidikan' => $this->input->post('tahun_lulus'),
				'bidang_pendidikan' => $this->input->post('bidang')
			);

		$this->db->where('nim', $nim);
		$this->db->where('no_urut_pendidikan', $id);
		$query = $this->db->update('riwayat_pendidikan', $data);
		return $query;
	}

	public function delete_riwayat_pendidikan($nim,$id)
	{
		$this->db->where('nim', $nim);
		$this->db->where('no_urut_pendidikan', $id);
		$query = $this->db->delete('riwayat_pendidikan');
		return $query;
	}

}

?>